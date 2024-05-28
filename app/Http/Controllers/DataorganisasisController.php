<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Dataorganisasi;
use App\Http\Requests\DataorganisasiRequest;

class DataorganisasisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $dataorganisasis= Dataorganisasi::all();
        return view('dataorganisasis.index', ['dataorganisasis'=>$dataorganisasis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('dataorganisasis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DataorganisasiRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DataorganisasiRequest $request)
    {
        $dataorganisasi = new Dataorganisasi;
		$dataorganisasi->user_id = $request->input('user_id');
		$dataorganisasi->nama_organisasi = $request->input('nama_organisasi');
		$dataorganisasi->tingkat = $request->input('tingkat');
		$dataorganisasi->start_date = $request->input('start_date');
		$dataorganisasi->end_date = $request->input('end_date');
        $dataorganisasi->save();

        return to_route('dataorganisasis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $dataorganisasi = Dataorganisasi::findOrFail($id);
        return view('dataorganisasis.show',['dataorganisasi'=>$dataorganisasi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $dataorganisasi = Dataorganisasi::findOrFail($id);
        return view('dataorganisasis.edit',['dataorganisasi'=>$dataorganisasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DataorganisasiRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DataorganisasiRequest $request, $id)
    {
        $dataorganisasi = Dataorganisasi::findOrFail($id);
		$dataorganisasi->user_id = $request->input('user_id');
		$dataorganisasi->nama_organisasi = $request->input('nama_organisasi');
		$dataorganisasi->tingkat = $request->input('tingkat');
		$dataorganisasi->start_date = $request->input('start_date');
		$dataorganisasi->end_date = $request->input('end_date');
        $dataorganisasi->save();

        return to_route('dataorganisasis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $dataorganisasi = Dataorganisasi::findOrFail($id);
        $dataorganisasi->delete();

        return to_route('dataorganisasis.index');
    }
}
