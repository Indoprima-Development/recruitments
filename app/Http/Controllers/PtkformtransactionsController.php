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
        $ptkformId = request('ptkform_id');

        $cacheKey = sprintf(
            'ptkform_data_v%d_status_%s_ptkform_%s',
            $this->getCacheVersion(),
            $status,
            $ptkformId ?: 'none'
        );

        return Cache::remember($cacheKey, now()->addMinutes(self::DATA_CACHE_TTL_MINUTES), function () use ($status, $ptkformId) {
            return $this->buildQueryData($status, $ptkformId);
        });
    }

    private function buildQueryData($status, $ptkformId)
    {
        $rawTransactions = Ptkformtransaction::query()
            ->join('users', 'ptkformtransactions.user_id', '=', 'users.id')
            ->join('ptkforms', 'ptkformtransactions.ptkform_id', '=', 'ptkforms.id')
            ->leftJoin('jobtitles', 'ptkforms.jobtitle_id', '=', 'jobtitles.id')
            ->leftJoin('datadiris', 'users.id', '=', 'datadiris.user_id')
            ->select([
                'ptkformtransactions.id',
                'ptkformtransactions.ptkform_id',
                'ptkformtransactions.user_id',
                'ptkformtransactions.status',
                'ptkformtransactions.score_candidate',
                'ptkformtransactions.ai_score',
                'ptkformtransactions.created_at',
                'ptkformtransactions.updated_at',
                'users.name as user_name',
                'users.ipk as user_ipk',
                'users.cv as user_cv',
                'jobtitles.jobtitle_name as jobtitle_name',
                'datadiris.cities as cities',
                'datadiris.provinces as provinces',
            ])
            ->when($status !== 'all', function ($query) use ($status) {
                return $query->where('ptkformtransactions.status', $status);
            })
            ->when($ptkformId, function ($query) use ($ptkformId) {
                return $query->where('ptkformtransactions.ptkform_id', $ptkformId);
            })
            ->where('ptkformtransactions.created_at', '>=', date('Y') . '-01-01 00:00:00')
            ->orderBy('ptkformtransactions.id', 'desc')
            ->limit(50)
            ->get();

        $userIds = $rawTransactions->pluck('user_id')->unique();

        $latestEducations = \DB::table('datapendidikanformals')
            ->whereIn('user_id', $userIds)
            ->whereIn('id', function ($query) use ($userIds) {
                $query->selectRaw('MAX(id)')
                    ->from('datapendidikanformals')
                    ->whereIn('user_id', $userIds)
                    ->groupBy('user_id');
            })
            ->select(['user_id', 'tingkat', 'instansi'])
            ->get()
            ->keyBy('user_id');

        $experiences = \DB::table('datapengalamankerjas')
            ->whereIn('user_id', $userIds)
            ->select(['user_id', 'date_start', 'date_end'])
            ->get()
            ->groupBy('user_id');

        $ptkformtransactions = [];
        foreach ($rawTransactions as $row) {
            $item = new \stdClass();
            $item->id = $row->id;
            $item->ptkform_id = $row->ptkform_id;
            $item->user_id = $row->user_id;
            $item->status = $row->status;
            $item->score_candidate = $row->score_candidate;
            $item->ai_score = $row->ai_score;
            $item->created_at = $row->created_at;
            $item->updated_at = $row->updated_at;
            $item->notes = null;

            $user = new \stdClass();
            $user->id = $row->user_id;
            $user->name = $row->user_name;
            $user->ipk = $row->user_ipk;
            $user->cv = $row->user_cv;

            $edu = $latestEducations->get($row->user_id);
            if ($edu) {
                $latestEdu = new \stdClass();
                $latestEdu->tingkat = $edu->tingkat;
                $latestEdu->instansi = $edu->instansi;
                $user->latestEducation = $latestEdu;
            } else {
                $user->latestEducation = null;
            }

            $dd = new \stdClass();
            $dd->cities = $row->cities;
            $dd->provinces = $row->provinces;
            $user->datadiri = $dd;

            $userExps = $experiences->get($row->user_id) ?? collect();
            $user->datapengalamankerja = collect($userExps);
            $user->datapengalamankerja_count = $user->datapengalamankerja->count();

            $item->user = $user;

            $ptkform = new \stdClass();
            $ptkform->id = $row->ptkform_id;

            $jobtitle = new \stdClass();
            $jobtitle->jobtitle_name = $row->jobtitle_name;
            $ptkform->jobtitle = $jobtitle;

            $item->ptkform = $ptkform;

            $ptkformtransactions[] = $item;
        }

        return collect($ptkformtransactions);
    }

    /**
     * Current cache "generation" for the data listing. Bumping it makes every
     * previously cached key for this listing unreachable, which is a cheap
     * way to invalidate on the file cache driver (no tag support).
     */
    private function getCacheVersion()
    {
        return Cache::get('ptkform_cache_version', 1);
    }

    private function clearDataCache($statuses = null)
    {
        Cache::put('ptkform_cache_version', $this->getCacheVersion() + 1, now()->addDay());
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
        $vacancies = $this->getVacanciesForFilter();
        return view('ptkformtransactions.data', compact('status', 'ptkformtransactions', 'vacancies'));
    }

    /**
     * Lightweight vacancy list ("id" + "jobtitle_name") for the position filter dropdown.
     */
    private function getVacanciesForFilter()
    {
        return Cache::remember('ptkform_vacancies_filter_list', now()->addMinutes(self::DATA_CACHE_TTL_MINUTES), function () {
            return \DB::table('ptkforms')
                ->leftJoin('jobtitles', 'ptkforms.jobtitle_id', '=', 'jobtitles.id')
                ->select(['ptkforms.id', 'jobtitles.jobtitle_name'])
                ->orderBy('jobtitles.jobtitle_name')
                ->get();
        });
    }

    /**
     * JSON feed powering the "Riwayat Aktivitas" table.
     * Backed by the same cached, indexed query as dataByStatus().
     */
    public function dataJsonApi($status)
    {
        return response()->json($this->getQueryData($status));
    }

    /**
     * Invalidate the cached listing for all statuses (e.g. cron/manual warm-up trigger).
     */
    public function saveDataJson($specificStatuses = null)
    {
        $this->clearDataCache($specificStatuses);

        return response()->json(['message' => 'Cache invalidated, next request will rebuild it.']);
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
