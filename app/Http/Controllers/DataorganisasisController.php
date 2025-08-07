<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Dataorganisasi;
use App\Http\Requests\DataorganisasiRequest;
use Illuminate\Support\Facades\Crypt;

class DataorganisasisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        redirect('forms?section=organisasi');
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
        $dataorganisasi->jabatan = $request->input('jabatan');
		$dataorganisasi->start_date = $request->input('start_date');
		$dataorganisasi->end_date = $request->input('end_date');
        $dataorganisasi->save();

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
        $id = Crypt::decryptString($id);
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
        $id = Crypt::decryptString($id);
        $dataorganisasi = Dataorganisasi::findOrFail($id);
        return redirect('forms?section=organisasi');
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
        $id = Crypt::decryptString($id);
        $dataorganisasi = Dataorganisasi::findOrFail($id);
		$dataorganisasi->user_id = $request->input('user_id');
		$dataorganisasi->nama_organisasi = $request->input('nama_organisasi');
		$dataorganisasi->tingkat = $request->input('tingkat');
        $dataorganisasi->jabatan = $request->input('jabatan');
		$dataorganisasi->start_date = $request->input('start_date');
		$dataorganisasi->end_date = $request->input('end_date');
        $dataorganisasi->save();

        return redirect('forms?section=organisasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $id = Crypt::decryptString($id);
        $dataorganisasi = Dataorganisasi::findOrFail($id);
        $dataorganisasi->delete();

        return redirect('forms?section=organisasi');
    }
}
