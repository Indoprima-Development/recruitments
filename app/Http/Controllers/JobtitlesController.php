<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Jobtitle;
use App\Http\Requests\JobtitleRequest;

class JobtitlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $jobtitles= Jobtitle::all();
        return view('jobtitles.index', ['jobtitles'=>$jobtitles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('jobtitles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  JobtitleRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(JobtitleRequest $request)
    {
        $jobtitle = new Jobtitle;
		$jobtitle->section_id = $request->input('section_id');
		$jobtitle->jobtitle_name = $request->input('jobtitle_name');
        $jobtitle->save();

        return to_route('jobtitles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $jobtitle = Jobtitle::findOrFail($id);
        return view('jobtitles.show',['jobtitle'=>$jobtitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $jobtitle = Jobtitle::findOrFail($id);
        return view('jobtitles.edit',['jobtitle'=>$jobtitle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  JobtitleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(JobtitleRequest $request, $id)
    {
        $jobtitle = Jobtitle::findOrFail($id);
		$jobtitle->section_id = $request->input('section_id');
		$jobtitle->jobtitle_name = $request->input('jobtitle_name');
        $jobtitle->save();

        return to_route('jobtitles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $jobtitle = Jobtitle::findOrFail($id);
        $jobtitle->delete();

        return to_route('jobtitles.index');
    }
}
