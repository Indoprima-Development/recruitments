<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Datapendidikannonformal;
use App\Http\Requests\DatapendidikannonformalRequest;
use Illuminate\Support\Facades\Crypt;

class DatapendidikannonformalsController extends Controller
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
        return view('datapendidikannonformals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DatapendidikannonformalRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DatapendidikannonformalRequest $request)
    {
        $datapendidikannonformal = new Datapendidikannonformal;
		$datapendidikannonformal->user_id = $request->input('user_id');
		$datapendidikannonformal->jenis = $request->input('jenis');
		$datapendidikannonformal->tingkat = $request->input('tingkat');
		$datapendidikannonformal->instansi = $request->input('instansi');
		$datapendidikannonformal->jurusan = $request->input('jurusan');
		$datapendidikannonformal->date_start = $request->input('date_start');
		$datapendidikannonformal->date_end = $request->input('date_end');
        $datapendidikannonformal->save();

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
        $datapendidikannonformal = Datapendidikannonformal::findOrFail($id);
        return view('datapendidikannonformals.show',['datapendidikannonformal'=>$datapendidikannonformal]);
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
        $datapendidikannonformal = Datapendidikannonformal::findOrFail($id);
        return view('datapendidikannonformals.edit',['datapendidikannonformal'=>$datapendidikannonformal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DatapendidikannonformalRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DatapendidikannonformalRequest $request, $id)
    {
        $id = Crypt::decryptString($id);
        $datapendidikannonformal = Datapendidikannonformal::findOrFail($id);
		$datapendidikannonformal->user_id = $request->input('user_id');
		$datapendidikannonformal->jenis = $request->input('jenis');
		$datapendidikannonformal->tingkat = $request->input('tingkat');
		$datapendidikannonformal->instansi = $request->input('instansi');
		$datapendidikannonformal->jurusan = $request->input('jurusan');
		$datapendidikannonformal->date_start = $request->input('date_start');
		$datapendidikannonformal->date_end = $request->input('date_end');
        $datapendidikannonformal->save();

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
        $datapendidikannonformal = Datapendidikannonformal::findOrFail($id);
        $datapendidikannonformal->delete();

        return to_route('datapendidikannonformals.index');
    }
}
