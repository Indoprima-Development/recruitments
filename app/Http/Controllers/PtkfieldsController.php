<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Ptkfield;
use App\Http\Requests\PtkfieldRequest;

class PtkfieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $ptkfields= Ptkfield::all();
        return view('ptkfields.index', ['ptkfields'=>$ptkfields]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('ptkfields.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PtkfieldRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PtkfieldRequest $request)
    {
        $ptkfield = new Ptkfield;
		$ptkfield->field_id = $request->input('field_id');
		$ptkfield->ptkform_id = $request->input('ptkform_id');
		$ptkfield->year = $request->input('year');
        $ptkfield->save();

        return to_route('ptkfields.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $ptkfield = Ptkfield::findOrFail($id);
        return view('ptkfields.show',['ptkfield'=>$ptkfield]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $ptkfield = Ptkfield::findOrFail($id);
        return view('ptkfields.edit',['ptkfield'=>$ptkfield]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PtkfieldRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PtkfieldRequest $request, $id)
    {
        $ptkfield = Ptkfield::findOrFail($id);
		$ptkfield->field_id = $request->input('field_id');
		$ptkfield->ptkform_id = $request->input('ptkform_id');
		$ptkfield->year = $request->input('year');
        $ptkfield->save();

        return to_route('ptkfields.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $ptkfield = Ptkfield::findOrFail($id);
        $ptkfield->delete();

        return to_route('ptkfields.index');
    }
}
