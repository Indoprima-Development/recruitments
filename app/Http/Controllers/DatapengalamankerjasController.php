<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Datapengalamankerja;
use App\Http\Requests\DatapengalamankerjaRequest;

class DatapengalamankerjasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $datapengalamankerjas= Datapengalamankerja::all();
        return view('datapengalamankerjas.index', ['datapengalamankerjas'=>$datapengalamankerjas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('datapengalamankerjas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DatapengalamankerjaRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DatapengalamankerjaRequest $request)
    {
        $datapengalamankerja = new Datapengalamankerja;
		$datapengalamankerja->user_id = $request->input('user_id');
		$datapengalamankerja->perusahaan = $request->input('perusahaan');
		$datapengalamankerja->jabatan_awal = $request->input('jabatan_awal');
		$datapengalamankerja->jabatan_terakhir = $request->input('jabatan_terakhir');
		$datapengalamankerja->gaji_awal = $request->input('gaji_awal');
		$datapengalamankerja->gaji_akhir = $request->input('gaji_akhir');
		$datapengalamankerja->date_start = $request->input('date_start');
		$datapengalamankerja->date_end = $request->input('date_end');
		$datapengalamankerja->alasan_keluar = $request->input('alasan_keluar');
        $datapengalamankerja->surat_pengalaman = "-";
        $datapengalamankerja->save();

        $file = $request->file('surat_pengalaman');
        if ($file != null) {
            $extension = $file->getClientOriginalExtension();
            $filename = $datapengalamankerja->id.".".$extension;
            UploadFile($file,"suratpengalaman",$filename);

            $datapengalamankerja->update([
                "surat_pengalaman" => "surat_pengalaman/".$filename,
            ]);
        }

        return redirect('forms?section=pengalaman');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $datapengalamankerja = Datapengalamankerja::findOrFail($id);
        return view('datapengalamankerjas.show',['datapengalamankerja'=>$datapengalamankerja]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $datapengalamankerja = Datapengalamankerja::findOrFail($id);
        return view('datapengalamankerjas.edit',['datapengalamankerja'=>$datapengalamankerja]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DatapengalamankerjaRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DatapengalamankerjaRequest $request, $id)
    {
        $datapengalamankerja = Datapengalamankerja::findOrFail($id);
		$datapengalamankerja->user_id = $request->input('user_id');
		$datapengalamankerja->perusahaan = $request->input('perusahaan');
		$datapengalamankerja->jabatan_awal = $request->input('jabatan_awal');
		$datapengalamankerja->jabatan_terakhir = $request->input('jabatan_terakhir');
		$datapengalamankerja->gaji_awal = $request->input('gaji_awal');
		$datapengalamankerja->gaji_akhir = $request->input('gaji_akhir');
		$datapengalamankerja->date_start = $request->input('date_start');
		$datapengalamankerja->date_end = $request->input('date_end');
		$datapengalamankerja->alasan_keluar = $request->input('alasan_keluar');
		$datapengalamankerja->surat_pengalaman = $request->input('surat_pengalaman');
        $datapengalamankerja->save();

        return to_route('datapengalamankerjas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $datapengalamankerja = Datapengalamankerja::findOrFail($id);
        $datapengalamankerja->delete();

        return to_route('datapengalamankerjas.index');
    }
}
