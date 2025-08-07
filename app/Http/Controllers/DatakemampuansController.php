<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Datakemampuan;
use App\Http\Requests\DatakemampuanRequest;
use Illuminate\Support\Facades\Crypt;

class DatakemampuansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return redirect('forms?section=ketrampilan');
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

        return redirect('forms?section=ketrampilan');
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
        return redirect('forms?section=ketrampilan');
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
        $id = Crypt::decryptString($id);
        $datakemampuan = Datakemampuan::findOrFail($id);
		$datakemampuan->user_id = $request->input('user_id');
		$datakemampuan->kemampuan = $request->input('kemampuan');
		$datakemampuan->level = $request->input('level');
        $datakemampuan->save();

        return redirect('forms?section=ketrampilan');
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
        $datakemampuan = Datakemampuan::findOrFail($id);
        $datakemampuan->delete();

        return redirect('forms?section=ketrampilan');
    }
}
