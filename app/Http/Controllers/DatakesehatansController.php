<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Datakesehatan;
use App\Http\Requests\DatakesehatanRequest;

class DatakesehatansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $datakesehatans= Datakesehatan::all();
        return view('datakesehatans.index', ['datakesehatans'=>$datakesehatans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('datakesehatans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DatakesehatanRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DatakesehatanRequest $request)
    {
        $datakesehatan = new Datakesehatan;
		$datakesehatan->user_id = $request->input('user_id');
		$datakesehatan->kesehatan = $request->input('kesehatan');
		$datakesehatan->keterangan = $request->input('keterangan');
        $datakesehatan->save();

        return to_route('datakesehatans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $datakesehatan = Datakesehatan::findOrFail($id);
        return view('datakesehatans.show',['datakesehatan'=>$datakesehatan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $datakesehatan = Datakesehatan::findOrFail($id);
        return view('datakesehatans.edit',['datakesehatan'=>$datakesehatan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DatakesehatanRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DatakesehatanRequest $request, $id)
    {
        $datakesehatan = Datakesehatan::findOrFail($id);
		$datakesehatan->user_id = $request->input('user_id');
		$datakesehatan->kesehatan = $request->input('kesehatan');
		$datakesehatan->keterangan = $request->input('keterangan');
        $datakesehatan->save();

        return to_route('datakesehatans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $datakesehatan = Datakesehatan::findOrFail($id);
        $datakesehatan->delete();

        return to_route('datakesehatans.index');
    }
}
