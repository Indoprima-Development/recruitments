<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Ptk_approval;
use App\Http\Requests\Ptk_approvalRequest;

class Ptk_approvalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $ptk_approvals= Ptk_approval::all();
        return view('ptk_approvals.index', ['ptk_approvals'=>$ptk_approvals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('ptk_approvals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Ptk_approvalRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Ptk_approvalRequest $request)
    {
        $ptk_approval = new Ptk_approval;
		$ptk_approval->department = $request->input('department');
		$ptk_approval->divisi = $request->input('divisi');
		$ptk_approval->noreg = $request->input('noreg');
        $ptk_approval->save();

        return to_route('ptk_approvals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $ptk_approval = Ptk_approval::findOrFail($id);
        return view('ptk_approvals.show',['ptk_approval'=>$ptk_approval]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $ptk_approval = Ptk_approval::findOrFail($id);
        return view('ptk_approvals.edit',['ptk_approval'=>$ptk_approval]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Ptk_approvalRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Ptk_approvalRequest $request, $id)
    {
        $ptk_approval = Ptk_approval::findOrFail($id);
		$ptk_approval->department = $request->input('department');
		$ptk_approval->divisi = $request->input('divisi');
		$ptk_approval->noreg = $request->input('noreg');
        $ptk_approval->save();

        return to_route('ptk_approvals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $ptk_approval = Ptk_approval::findOrFail($id);
        $ptk_approval->delete();

        return to_route('ptk_approvals.index');
    }
}
