<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Project_transaction;
use App\Http\Requests\Project_transactionRequest;

class Project_transactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $project_transactions= Project_transaction::all();
        return view('project_transactions.index', ['project_transactions'=>$project_transactions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('project_transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Project_transactionRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Project_transactionRequest $request)
    {
        $project_transaction = new Project_transaction;
		$project_transaction->project_id = $request->input('project_id');
		$project_transaction->user_id = $request->input('user_id');
		$project_transaction->is_open = $request->input('is_open');
        $project_transaction->save();

        return to_route('project_transactions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $project_transaction = Project_transaction::findOrFail($id);
        return view('project_transactions.show',['project_transaction'=>$project_transaction]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $project_transaction = Project_transaction::findOrFail($id);
        return view('project_transactions.edit',['project_transaction'=>$project_transaction]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Project_transactionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Project_transactionRequest $request, $id)
    {
        $project_transaction = Project_transaction::findOrFail($id);
		$project_transaction->project_id = $request->input('project_id');
		$project_transaction->user_id = $request->input('user_id');
		$project_transaction->is_open = $request->input('is_open');
        $project_transaction->save();

        return to_route('project_transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $project_transaction = Project_transaction::findOrFail($id);
        $project_transaction->delete();

        return to_route('project_transactions.index');
    }
}
