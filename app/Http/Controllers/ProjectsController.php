<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Project;
use App\Models\Exam;
use App\Http\Requests\ProjectRequest;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $projects= Project::all();
        return view('projects.index', ['projects'=>$projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProjectRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProjectRequest $request)
    {
        $project = new Project;
		$project->project_name = $request->input('project_name');
		$project->created_by = $request->input('created_by');
		$project->is_can_take_multiple = $request->input('is_can_take_multiple');
		$project->is_open = $request->input('is_open');
        $project->save();

        return to_route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.show',['project'=>$project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit',['project'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProjectRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProjectRequest $request, $id)
    {
        $project = Project::findOrFail($id);
		$project->project_name = $request->input('project_name');
		$project->created_by = $request->input('created_by');
		$project->is_can_take_multiple = $request->input('is_can_take_multiple');
		$project->is_open = $request->input('is_open');
        $project->save();

        return to_route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return to_route('projects.index');
    }

    public function examsByProjectId($id){
        $projectId = DecryptData($id);
        $project = Project::where('id',$projectId)->first();
        $exams = Exam::where('project_id',$projectId)->get();
        return view('projects.examsByProjectId',compact('exams','project'));
    }
}
