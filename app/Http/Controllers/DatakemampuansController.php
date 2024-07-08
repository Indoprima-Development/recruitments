<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Datakemampuan;
use App\Http\Requests\DatakemampuanRequest;

class DatakemampuansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $datakemampuans= Datakemampuan::all();
        return view('datakemampuans.index', ['datakemampuans'=>$datakemampuans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('datakemampuans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DatakemampuanRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DatakemampuanRequest $request)
    {
        $datakemampuan = new Datakemampuan;
		$datakemampuan->user_id = $request->input('user_id');
		$datakemampuan->kemampuan = $request->input('kemampuan');
		$datakemampuan->level = $request->input('level');
        $datakemampuan->save();

        return redirect('forms?section=organisasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $datakemampuan = Datakemampuan::findOrFail($id);
        return view('datakemampuans.show',['datakemampuan'=>$datakemampuan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $datakemampuan = Datakemampuan::findOrFail($id);
        return view('datakemampuans.edit',['datakemampuan'=>$datakemampuan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DatakemampuanRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DatakemampuanRequest $request, $id)
    {
        $datakemampuan = Datakemampuan::findOrFail($id);
		$datakemampuan->user_id = $request->input('user_id');
		$datakemampuan->kemampuan = $request->input('kemampuan');
		$datakemampuan->level = $request->input('level');
        $datakemampuan->save();

        return to_route('datakemampuans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $datakemampuan = Datakemampuan::findOrFail($id);
        $datakemampuan->delete();

        return to_route('datakemampuans.index');
    }
}
