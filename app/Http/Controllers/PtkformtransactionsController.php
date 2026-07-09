<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Ptkformtransaction;
use App\Http\Requests\PtkformtransactionRequest;
use App\Models\Datadiri;
use App\Models\Ptkformactivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PtkformtransactionsController extends Controller
{
    /**
     * All status codes used for the "Riwayat Aktivitas" listing, plus 'all'.
     */
    private const DATA_STATUSES = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10'];

    private const DATA_CACHE_TTL_MINUTES = 15;

    private function getQueryData($status)
    {
        return Ptkformtransaction::query()
            ->select(['id', 'ptkform_id', 'user_id', 'status', 'score_candidate', 'ai_score', 'created_at', 'updated_at'])
            ->with([
                'user' => function ($q) {
                    $q->select(['id', 'name', 'ipk', 'cv'])
                        ->with([
                            'latestEducation' => function ($q) {
                                $q->select(['datapendidikanformals.id', 'datapendidikanformals.user_id', 'datapendidikanformals.tingkat', 'datapendidikanformals.instansi']);
                            },
                            'datadiri' => function ($q) {
                                $q->select(['id', 'user_id', 'cities', 'provinces']);
                            },
                            'datapengalamankerja' => function ($q) {
                                $q->select(['datapengalamankerjas.id', 'datapengalamankerjas.user_id', 'datapengalamankerjas.date_start', 'datapengalamankerjas.date_end']);
                            }
                        ])
                        ->withCount('datapengalamankerja');
                },
                'ptkform' => function ($q) {
                    $q->select(['id', 'jobtitle_id'])
                        ->with(['jobtitle' => function ($q) {
                            $q->select(['id', 'jobtitle_name']);
                        }]);
                },
            ])
            ->when($status !== 'all', function ($query) use ($status) {
                return $query->where('status', $status);
            })
            ->whereYear('created_at', date('Y'))
            ->orderBy('id', 'desc')
            ->get();
    }

    private function clearDataCache($statuses = null)
    {
        // No-op: cache disabled to optimize speed and query directly
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $ptkformtransactions = Ptkformtransaction::all();
        return view('ptkformtransactions.index', ['ptkformtransactions' => $ptkformtransactions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('ptkformtransactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PtkformtransactionRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PtkformtransactionRequest $request)
    {
        $questions = json_decode($request->questions);
        $score = 0;

        if ($questions && isset($questions->score)) {
            for ($i = 0; $i < count($questions->score); $i++) {
                $var = "jawaban_" . $i;
                if (isset($questions->type[$i]) && $questions->type[$i] == 'Rating') {
                    $score += (int)$request->$var / 5 * (int)$questions->score[$i];
                } else {
                    if (isset($questions->jawaban[$i]) && $questions->jawaban[$i] == $request->$var) {
                        $score += (int)$questions->score[$i];
                    }
                }
            }
        }

        $ptkformtransaction = new Ptkformtransaction;
        $ptkformtransaction->ptkform_id = $request->input('ptkform_id');
        $ptkformtransaction->status = 0;
        $ptkformtransaction->score_candidate = $score;
        $ptkformtransaction->user_id = Auth::user()->id;
        $ptkformtransaction->experience_years = $request->input('experience_years');
        $ptkformtransaction->experience_months = $request->input('experience_months');
        $ptkformtransaction->save();

        // Handle CV Upload
        if ($request->hasFile('cv')) {
            $user = Auth::user();
            $file = $request->file('cv');
            $filename = $user->id . ".pdf";
            $pathUpload = "cv";
            
            $publicPath = public_path($pathUpload);
            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0755, true);
            }

            // Hapus file lama jika ada (baik di storage maupun di public/cv)
            if ($user->cv && file_exists(public_path($user->cv))) {
                @unlink(public_path($user->cv));
            }
            if ($user->cv && file_exists(public_path('storage/cv/' . $user->cv))) {
                @unlink(public_path('storage/cv/' . $user->cv));
            }
            
            $file->move($publicPath, $filename);

            $user->cv = "$pathUpload/$filename";
            $user->save();
        }

        $this->clearDataCache(['0']);

        AlertSuccess("Success", "Berhasil melamar pekerjaan");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $ptkformtransaction = Ptkformtransaction::findOrFail($id);
        return view('ptkformtransactions.show', ['ptkformtransaction' => $ptkformtransaction]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $ptkformtransaction = Ptkformtransaction::findOrFail($id);
        return view('ptkformtransactions.edit', ['ptkformtransaction' => $ptkformtransaction]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PtkformtransactionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PtkformtransactionRequest $request, $id)
    {
        $ptkformtransaction = Ptkformtransaction::findOrFail($id);
        $oldStatus = $ptkformtransaction->status;
        $ptkformtransaction->ptkform_id = $request->input('ptkform_id');
        $ptkformtransaction->status = $request->input('status');
        $ptkformtransaction->user_id = $request->input('user_id');
        $ptkformtransaction->save();

        $this->clearDataCache([$oldStatus, $ptkformtransaction->status]);

        return to_route('ptkformtransactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $ptkformtransaction = Ptkformtransaction::findOrFail($id);
        $status = $ptkformtransaction->status;
        $ptkformtransaction->delete();

        $this->clearDataCache([$status]);

        return to_route('ptkformtransactions.index');
    }

    public function dataByStatus($status)
    {
        $ptkformtransactions = $this->getQueryData($status);
        return view('ptkformtransactions.data', compact('status', 'ptkformtransactions'));
    }

    /**
     * JSON feed powering the "Riwayat Aktivitas" table.
     * Served directly from the optimized query without caching.
     */
    public function dataJsonApi($status)
    {
        return response()->json($this->getQueryData($status)->toArray());
    }

    /**
     * Warm/refresh the cached listing. Now a no-op as caching is disabled.
     */
    public function saveDataJson($specificStatuses = null)
    {
        return response()->json(['message' => 'Cache disabled, query loaded directly.']);
    }

    public function changeStatus(Request $request)
    {
        $status = 9; // Default Rejected
        if ($request->statusokornot == 'OK') {
            // Approve: Lanjut ke tahap berikutnya
            $status = $request->status + 1;
        } elseif ($request->statusokornot == 'HOLD') {
            $status = 10;
        }

        $data = Ptkformtransaction::where("id", $request->ptkformtrid)->firstOrFail();

        if ($data->pic == "") {
            $update["pic"] = Auth::user()->name;
        }

        $update["status"] = $status;

        // Log tanggal dan score untuk tahap ini
        if ($request->has('type') && $request->type) {
            $update[$request->type] = date("Y-m-d");
            $update["score_" . $request->type] = $request->score;
        }

        $data->update($update);

        Ptkformactivity::create([
            "user_id" => Auth::user()->id,
            "ptkformtransaction_id"  => $request->ptkformtrid,
            "keterangan"    => $request->keterangan
        ]);

        $this->clearDataCache([$request->status, $status]);

        AlertSuccess("Success", "Status berhasil diubah (Lanjut tahap berikutnya)");

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Status berhasil diubah']);
        }

        return redirect()->back();
    }

    public function updateNote(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:ptkformtransactions,id',
            'note' => 'nullable|string'
        ]);

        $transaction = Ptkformtransaction::findOrFail($request->id);
        // Assuming 'notes' column exists. If not, this needs a migration.
        // For now, we update it as if it exists.
        $transaction->notes = $request->note;
        $transaction->save();

        $this->clearDataCache([$transaction->status]);

        return response()->json(['success' => true, 'message' => 'Note updated successfully']);
    }

    /**
     * Delete lamaran (application) by admin.
     * Menghapus lamaran dan activity terkait.
     */
    public function deleteLamaran($id)
    {
        $ptkformtransaction = Ptkformtransaction::findOrFail($id);
        $status = $ptkformtransaction->status;

        // Hapus activity logs terkait
        Ptkformactivity::where('ptkformtransaction_id', $id)->delete();

        // Hapus lamaran
        $ptkformtransaction->delete();

        $this->clearDataCache([$status]);

        if (request()->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Lamaran berhasil dihapus']);
        }

        AlertSuccess("Terhapus", "Lamaran berhasil dihapus");
        return redirect()->back();
    }

    public function vacancyData($ptkform_id, $status = 'all')
    {
        $ptkform = \App\Models\Ptkform::with('jobtitle')->findOrFail($ptkform_id);

        $ptkformtransactions = Ptkformtransaction::with([
            'user' => function ($q) {
                $q->with('latestEducation', 'datadiri', 'datapengalamankerja')
                    ->withCount('datapengalamankerja');
            },
            'ptkform.jobtitle'
        ])
            ->where('ptkform_id', $ptkform_id)
            ->when($status !== "all", function ($query) use ($status) {
                return $query->where("status", $status);
            })
            ->orderBy('id', 'desc')
            ->get();

        $counts = Ptkformtransaction::where('ptkform_id', $ptkform_id)
            ->selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status')
            ->toArray();

        return view('ptkformtransactions.vacancy_data', compact('ptkform_id', 'status', 'ptkform', 'ptkformtransactions', 'counts'));
    }

    public function vacancyJson($ptkform_id, $status)
    {
        $ptkformtransactions = Ptkformtransaction::with([
            'user' => function ($q) {
                $q->with('latestEducation', 'datadiri', 'datapengalamankerja')
                    ->withCount('datapengalamankerja');
            },
            'ptkform.jobtitle'
        ])
            ->where('ptkform_id', $ptkform_id)
            ->when($status !== "all", function ($query) use ($status) {
                return $query->where("status", $status);
            })
            ->orderBy('id', 'desc')
            ->get();

        return response()->json($ptkformtransactions);
    }
}
