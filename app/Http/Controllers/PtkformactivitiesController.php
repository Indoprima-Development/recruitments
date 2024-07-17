<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Ptkformactivity;
use App\Http\Requests\PtkformactivityRequest;

class PtkformactivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $ptkformactivities= Ptkformactivity::all();
        return view('ptkformactivities.index', ['ptkformactivities'=>$ptkformactivities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('ptkformactivities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PtkformactivityRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PtkformactivityRequest $request)
    {
        $ptkformactivity = new Ptkformactivity;
		$ptkformactivity->ptkform_id = $request->input('ptkform_id');
		$ptkformactivity->user_id = $request->input('user_id');
		$ptkformactivity->keterangan = $request->input('keterangan');
        $ptkformactivity->save();

        return to_route('ptkformactivities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $ptkformactivity = Ptkformactivity::findOrFail($id);
        return view('ptkformactivities.show',['ptkformactivity'=>$ptkformactivity]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $ptkformactivity = Ptkformactivity::findOrFail($id);
        return view('ptkformactivities.edit',['ptkformactivity'=>$ptkformactivity]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PtkformactivityRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PtkformactivityRequest $request, $id)
    {
        $ptkformactivity = Ptkformactivity::findOrFail($id);
		$ptkformactivity->ptkform_id = $request->input('ptkform_id');
		$ptkformactivity->user_id = $request->input('user_id');
		$ptkformactivity->keterangan = $request->input('keterangan');
        $ptkformactivity->save();

        return to_route('ptkformactivities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $ptkformactivity = Ptkformactivity::findOrFail($id);
        $ptkformactivity->delete();

        return to_route('ptkformactivities.index');
    }
}
