<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Datadiri;
use App\Http\Requests\DatadiriRequest;

class DatadirisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $datadiris= Datadiri::all();
        return view('datadiris.index', ['datadiris'=>$datadiris]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('datadiris.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DatadiriRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DatadiriRequest $request)
    {
        $datadiri = new Datadiri;
		$datadiri->user_id = $request->input('user_id');
		$datadiri->name = $request->input('name');
		$datadiri->gender = $request->input('gender');
		$datadiri->tempat_lahir = $request->input('tempat_lahir');
		$datadiri->tanggal_lahir = $request->input('tanggal_lahir');
		$datadiri->agama = $request->input('agama');
		$datadiri->alamat = $request->input('alamat');
		$datadiri->no_hp = $request->input('no_hp');
		$datadiri->no_wa = $request->input('no_wa');
		$datadiri->status_rumah = $request->input('status_rumah');
		$datadiri->golongan_darah = $request->input('golongan_darah');
		$datadiri->tinggi_badan = $request->input('tinggi_badan');
		$datadiri->berat_badan = $request->input('berat_badan');
		$datadiri->ktp = $request->input('ktp');
		$datadiri->kendaraan = $request->input('kendaraan');
		$datadiri->sim = $request->input('sim');
		$datadiri->ekspektasi_gaji = $request->input('ekspektasi_gaji');
		$datadiri->fasilitas_harapan = $request->input('fasilitas_harapan');
		$datadiri->kesediaan_penempatan = $request->input('kesediaan_penempatan');
		$datadiri->kesediaan_mulai_bekerja = $request->input('kesediaan_mulai_bekerja');
		$datadiri->image_jabatan_terakhir = $request->input('image_jabatan_terakhir');
		$datadiri->keterangan_jabatan_terakhir = $request->input('keterangan_jabatan_terakhir');
        $datadiri->save();

        return to_route('datadiris.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $datadiri = Datadiri::findOrFail($id);
        return view('datadiris.show',['datadiri'=>$datadiri]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $datadiri = Datadiri::findOrFail($id);
        return view('datadiris.edit',['datadiri'=>$datadiri]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DatadiriRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DatadiriRequest $request, $id)
    {
        $datadiri = Datadiri::findOrFail($id);
		$datadiri->user_id = $request->input('user_id');
		$datadiri->name = $request->input('name');
		$datadiri->gender = $request->input('gender');
		$datadiri->tempat_lahir = $request->input('tempat_lahir');
		$datadiri->tanggal_lahir = $request->input('tanggal_lahir');
		$datadiri->agama = $request->input('agama');
		$datadiri->alamat = $request->input('alamat');
		$datadiri->no_hp = $request->input('no_hp');
		$datadiri->no_wa = $request->input('no_wa');
		$datadiri->status_rumah = $request->input('status_rumah');
		$datadiri->golongan_darah = $request->input('golongan_darah');
		$datadiri->tinggi_badan = $request->input('tinggi_badan');
		$datadiri->berat_badan = $request->input('berat_badan');
		$datadiri->ktp = $request->input('ktp');
		$datadiri->kendaraan = $request->input('kendaraan');
		$datadiri->sim = $request->input('sim');
		$datadiri->ekspektasi_gaji = $request->input('ekspektasi_gaji');
		$datadiri->fasilitas_harapan = $request->input('fasilitas_harapan');
		$datadiri->kesediaan_penempatan = $request->input('kesediaan_penempatan');
		$datadiri->kesediaan_mulai_bekerja = $request->input('kesediaan_mulai_bekerja');
		$datadiri->image_jabatan_terakhir = $request->input('image_jabatan_terakhir');
		$datadiri->keterangan_jabatan_terakhir = $request->input('keterangan_jabatan_terakhir');
        $datadiri->save();

        return to_route('datadiris.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $datadiri = Datadiri::findOrFail($id);
        $datadiri->delete();

        return to_route('datadiris.index');
    }
}