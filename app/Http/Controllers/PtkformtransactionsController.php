<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Ptkformtransaction;
use App\Http\Requests\PtkformtransactionRequest;
use App\Models\Datadiri;
use App\Models\Ptkformactivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PtkformtransactionsController extends Controller
{
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
        for ($i = 0; $i < count($questions->score); $i++) {
            $var = "jawaban_" . $i;
            if ($questions->type[$i] == 'Rating') {
                $score += (int)$request->$var / 5 * (int)$questions->score[$i];
            } else {
                if ($questions->jawaban[$i] == $request->$var) {
                    $score += (int)$questions->score[$i];
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
        $ptkformtransaction->ptkform_id = $request->input('ptkform_id');
        $ptkformtransaction->status = $request->input('status');
        $ptkformtransaction->user_id = $request->input('user_id');
        $ptkformtransaction->save();

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
        $ptkformtransaction->delete();

        return to_route('ptkformtransactions.index');
    }

    public function dataByStatus($status)
    {
        return view('ptkformtransactions.data', compact('status'));
    }

    public function saveDataJson()
    {
        $statuses = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        foreach ($statuses as $status) {
            $ptkformtransactions = Ptkformtransaction::with([
                'user' => function ($q) {
                    $q->with('latestEducation', 'datadiri')
                        ->withCount('datapengalamankerja');
                },
                'ptkform.jobtitle'
            ])
                ->when($status !== "all", function ($query) use ($status) {
                    return $query->where("status", $status);
                })
                ->whereYear('created_at', date('Y'))
                ->orderBy('id', 'desc')
                ->get();

            $filename = "ptkformtransactions-{$status}.json";
            $path = public_path("data/{$filename}");

            if (!file_exists(dirname($path))) {
                mkdir(dirname($path), 0755, true);
            }

            // encode JSON tanpa escape yang tidak perlu
            $jsonData = json_encode($ptkformtransactions, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

            // simpan versi terkompresi
            file_put_contents($path . '.gz', gzencode($jsonData, 9));
        }

        return response()->json(['message' => 'Data ptkformtransactions generated successfully for all statuses']);
    }

    public function changeStatus(Request $request)
    {
        $status = 9; // Default Rejected
        if ($request->statusokornot == 'OK') {
            // Approve: Lanjut ke tahap berikutnya
            $status = $request->status + 1;
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

        return response()->json(['success' => true, 'message' => 'Note updated successfully']);
    }
}
