<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Division;
use App\Http\Requests\DivisionRequest;

class DivisionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $divisions= Division::all();
        return view('divisions.index', ['divisions'=>$divisions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('divisions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DivisionRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DivisionRequest $request)
    {
        $division = new Division;
		$division->division_name = $request->input('division_name');
        $division->save();

        return to_route('divisions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $division = Division::findOrFail($id);
        return view('divisions.show',['division'=>$division]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $division = Division::findOrFail($id);
        return view('divisions.edit',['division'=>$division]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DivisionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DivisionRequest $request, $id)
    {
        $division = Division::findOrFail($id);
		$division->division_name = $request->input('division_name');
        $division->save();

        return to_route('divisions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $division = Division::findOrFail($id);
        $division->delete();

        return to_route('divisions.index');
    }
}
