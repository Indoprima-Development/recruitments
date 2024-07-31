<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Datakeluarga;
use App\Http\Requests\DatakeluargaRequest;

class DatakeluargasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $datakeluargas= Datakeluarga::all();
        return view('datakeluargas.index', ['datakeluargas'=>$datakeluargas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('datakeluargas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DatakeluargaRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DatakeluargaRequest $request)
    {
        $datakeluarga = new Datakeluarga;
		$datakeluarga->user_id = $request->input('user_id');
		$datakeluarga->status_hubungan = $request->input('status_hubungan');
		$datakeluarga->nama_keluarga = $request->input('nama_keluarga');
		$datakeluarga->tempat_lahir_keluarga = $request->input('tempat_lahir_keluarga');
		$datakeluarga->tanggal_lahir_keluarga = $request->input('tanggal_lahir_keluarga');
		$datakeluarga->pekerjaan = $request->input('pekerjaan');
		$datakeluarga->alamat = $request->input('alamat');
        $datakeluarga->save();

        return redirect('forms?section=keluarga');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $datakeluarga = Datakeluarga::findOrFail($id);
        return view('datakeluargas.show',['datakeluarga'=>$datakeluarga]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $datakeluarga = Datakeluarga::findOrFail($id);
        return view('datakeluargas.edit',['datakeluarga'=>$datakeluarga]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DatakeluargaRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DatakeluargaRequest $request, $id)
    {
        $datakeluarga = Datakeluarga::findOrFail($id);
		$datakeluarga->user_id = $request->input('user_id');
		$datakeluarga->status_hubungan = $request->input('status_hubungan');
		$datakeluarga->nama_keluarga = $request->input('nama_keluarga');
		$datakeluarga->tempat_lahir_keluarga = $request->input('tempat_lahir_keluarga');
		$datakeluarga->tanggal_lahir_keluarga = $request->input('tanggal_lahir_keluarga');
		$datakeluarga->pekerjaan = $request->input('pekerjaan');
		$datakeluarga->alamat = $request->input('alamat');
        $datakeluarga->save();

        return redirect('forms?section=keluarga');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $datakeluarga = Datakeluarga::findOrFail($id);
        $datakeluarga->delete();

        return to_route('datakeluargas.index');
    }
}
