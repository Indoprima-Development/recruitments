<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Section;
use App\Http\Requests\SectionRequest;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $sections= Section::all();
        return view('sections.index', ['sections'=>$sections]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('sections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SectionRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SectionRequest $request)
    {
        $section = new Section;
		$section->department_id = $request->input('department_id');
		$section->section_name = $request->input('section_name');
        $section->save();

        return to_route('sections.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $section = Section::findOrFail($id);
        return view('sections.show',['section'=>$section]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $section = Section::findOrFail($id);
        return view('sections.edit',['section'=>$section]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SectionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SectionRequest $request, $id)
    {
        $section = Section::findOrFail($id);
		$section->department_id = $request->input('department_id');
		$section->section_name = $request->input('section_name');
        $section->save();

        return to_route('sections.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        $section->delete();

        return to_route('sections.index');
    }
}
