<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Jobtitle;
use App\Models\Section;
use App\Http\Requests\JobtitleRequest;
use Illuminate\Http\Request;

class JobtitlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $jobtitles = Jobtitle::all();
        return view('jobtitles.index', ['jobtitles' => $jobtitles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $sections = Section::all();
        return view('jobtitles.create', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  JobtitleRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $jobtitle = new Jobtitle;
        $jobtitle->section_id = $request->input('section_id');
        $jobtitle->jobtitle_name = $request->input('jobtitle_name');

        //data from form question
        if ($request->input('pertanyaan') != null) {
            $dataQuestion = [
                'type'      => $request->input('type'),
                'pertanyaan' => $request->input('pertanyaan'),
                'jawaban'   => $request->input('jawaban'),
                'score'     => $request->input('score'),
            ];
            $jobtitle->questions = json_encode($dataQuestion);
        }

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
        return view('jobtitles.show', ['jobtitle' => $jobtitle]);
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
        $sections = Section::all();
        return view('jobtitles.edit', compact('jobtitle', 'sections'));
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
        if ($request->input('pertanyaan') != null) {
            $dataQuestion = [
                'type'      => $request->input('type'),
                'pertanyaan' => $request->input('pertanyaan'),
                'jawaban'   => $request->input('jawaban'),
                'score'     => $request->input('score'),
            ];
            $jobtitle->questions = json_encode($dataQuestion);
        }
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
