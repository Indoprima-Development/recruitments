<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Exam_transaction;
use App\Http\Requests\Exam_transactionRequest;

class Exam_transactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $exam_transactions= Exam_transaction::all();
        return view('exam_transactions.index', ['exam_transactions'=>$exam_transactions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('exam_transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Exam_transactionRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Exam_transactionRequest $request)
    {
        $exam_transaction = new Exam_transaction;
		$exam_transaction->exam_id = $request->input('exam_id');
		$exam_transaction->user_id = $request->input('user_id');
		$exam_transaction->is_open = $request->input('is_open');
		$exam_transaction->score = $request->input('score');
        $exam_transaction->save();

        return to_route('exam_transactions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $exam_transaction = Exam_transaction::findOrFail($id);
        return view('exam_transactions.show',['exam_transaction'=>$exam_transaction]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $exam_transaction = Exam_transaction::findOrFail($id);
        return view('exam_transactions.edit',['exam_transaction'=>$exam_transaction]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Exam_transactionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Exam_transactionRequest $request, $id)
    {
        $exam_transaction = Exam_transaction::findOrFail($id);
		$exam_transaction->exam_id = $request->input('exam_id');
		$exam_transaction->user_id = $request->input('user_id');
		$exam_transaction->is_open = $request->input('is_open');
		$exam_transaction->score = $request->input('score');
        $exam_transaction->save();

        return to_route('exam_transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $exam_transaction = Exam_transaction::findOrFail($id);
        $exam_transaction->delete();

        return to_route('exam_transactions.index');
    }
}
