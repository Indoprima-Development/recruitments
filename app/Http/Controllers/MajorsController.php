<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Major;
use App\Http\Requests\MajorRequest;

class MajorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $majors= Major::all();
        return view('majors.index', ['majors'=>$majors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('majors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MajorRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MajorRequest $request)
    {
        $major = new Major;
		$major->major_name = $request->input('major_name');
        $major->save();

        return to_route('majors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $major = Major::findOrFail($id);
        return view('majors.show',['major'=>$major]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $major = Major::findOrFail($id);
        return view('majors.edit',['major'=>$major]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MajorRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MajorRequest $request, $id)
    {
        $major = Major::findOrFail($id);
		$major->major_name = $request->input('major_name');
        $major->save();

        return to_route('majors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $major = Major::findOrFail($id);
        $major->delete();

        return to_route('majors.index');
    }
}
