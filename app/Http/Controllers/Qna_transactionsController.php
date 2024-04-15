<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Qna_transaction;
use App\Http\Requests\Qna_transactionRequest;

class Qna_transactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $qna_transactions= Qna_transaction::all();
        return view('qna_transactions.index', ['qna_transactions'=>$qna_transactions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('qna_transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Qna_transactionRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Qna_transactionRequest $request)
    {
        $qna_transaction = new Qna_transaction;
		$qna_transaction->qna_id = $request->input('qna_id');
		$qna_transaction->user_id = $request->input('user_id');
		$qna_transaction->answer = $request->input('answer');
		$qna_transaction->is_true = $request->input('is_true');
        $qna_transaction->save();

        return to_route('qna_transactions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $qna_transaction = Qna_transaction::findOrFail($id);
        return view('qna_transactions.show',['qna_transaction'=>$qna_transaction]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $qna_transaction = Qna_transaction::findOrFail($id);
        return view('qna_transactions.edit',['qna_transaction'=>$qna_transaction]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Qna_transactionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Qna_transactionRequest $request, $id)
    {
        $qna_transaction = Qna_transaction::findOrFail($id);
		$qna_transaction->qna_id = $request->input('qna_id');
		$qna_transaction->user_id = $request->input('user_id');
		$qna_transaction->answer = $request->input('answer');
		$qna_transaction->is_true = $request->input('is_true');
        $qna_transaction->save();

        return to_route('qna_transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $qna_transaction = Qna_transaction::findOrFail($id);
        $qna_transaction->delete();

        return to_route('qna_transactions.index');
    }
}
