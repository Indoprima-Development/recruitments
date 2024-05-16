<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Education;
use App\Http\Requests\EducationRequest;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $education= Education::all();
        return view('education.index', ['education'=>$education]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('education.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EducationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EducationRequest $request)
    {
        $education = new Education;
		$education->education_name = $request->input('education_name');
        $education->save();

        return to_route('education.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $education = Education::findOrFail($id);
        return view('education.show',['education'=>$education]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $education = Education::findOrFail($id);
        return view('education.edit',['education'=>$education]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EducationRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EducationRequest $request, $id)
    {
        $education = Education::findOrFail($id);
		$education->education_name = $request->input('education_name');
        $education->save();

        return to_route('education.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $education = Education::findOrFail($id);
        $education->delete();

        return to_route('education.index');
    }
}
