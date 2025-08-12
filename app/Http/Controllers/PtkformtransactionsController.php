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
        ini_set('max_execution_time', 10000);
        ini_set('memory_limit', '256M');

        $ptkformtransactions = Ptkformtransaction::with([
            'user.datapendidikanformal',
            'ptkform.jobtitle'
        ])
            ->when($status !== "all", function ($query) use ($status) {
                return $query->where("status", $status);
            })
            ->orderBy('id', 'desc') // penting untuk SQL Server
            ->get();

        return view('ptkformtransactions.data', compact('ptkformtransactions'));
    }

    public function changeStatus(Request $request)
    {
        $status = 9;
        if ($request->statusokornot == 'OK') {
            $status = $request->status + 1;
        }

        $data = Ptkformtransaction::where("id", $request->ptkformtrid)->first();
        if ($data->pic == "") {
            $update["pic"] = Auth::user()->name;
        }

        $update["status"] = $status;
        $update[$request->type] = date("Y-m-d");
        $update["score_" . $request->type] = $request->score;

        $data->update($update);

        Ptkformactivity::create([
            "user_id" => Auth::user()->id,
            "ptkformtransaction_id"  => $request->ptkformtrid,
            "keterangan"    => $request->keterangan
        ]);

        AlertSuccess("Success", "Status berhasil diubah");
        return redirect()->back();
    }
}
