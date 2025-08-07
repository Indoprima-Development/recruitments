<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Datapendidikanformal;
use App\Http\Requests\DatapendidikanformalRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class DatapendidikanformalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return redirect('forms?section=pendidikan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('datapendidikanformals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DatapendidikanformalRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DatapendidikanformalRequest $request)
    {
        $datapendidikanformal = new Datapendidikanformal;
		$datapendidikanformal->user_id = Auth::user()->id;
		$datapendidikanformal->tingkat = $request->input('tingkat');
		$datapendidikanformal->instansi = $request->input('instansi');
		$datapendidikanformal->jurusan = $request->input('jurusan');
		$datapendidikanformal->lulus_tahun = $request->input('lulus_tahun');
		$datapendidikanformal->nilai = $request->input('nilai');
        $datapendidikanformal->save();

        return redirect('forms?section=pendidikan');
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
        $datapendidikanformal = Datapendidikanformal::findOrFail($id);
        return view('datapendidikanformals.show',['datapendidikanformal'=>$datapendidikanformal]);
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
        $datapendidikanformal = Datapendidikanformal::findOrFail($id);
        return view('datapendidikanformals.edit',['datapendidikanformal'=>$datapendidikanformal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DatapendidikanformalRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DatapendidikanformalRequest $request, $id)
    {
        $id = Crypt::decryptString($id);
        $datapendidikanformal = Datapendidikanformal::findOrFail($id);
		$datapendidikanformal->tingkat = $request->input('tingkat');
		$datapendidikanformal->instansi = $request->input('instansi');
		$datapendidikanformal->jurusan = $request->input('jurusan');
		$datapendidikanformal->lulus_tahun = $request->input('lulus_tahun');
		$datapendidikanformal->nilai = $request->input('nilai');
        $datapendidikanformal->save();

        return redirect('forms?section=pendidikan');
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
        $datapendidikanformal = Datapendidikanformal::findOrFail($id);
        $datapendidikanformal->delete();

        return redirect('forms?section=pendidikan');
    }
}
