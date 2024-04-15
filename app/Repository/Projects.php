<?php

namespace App\Repository;
use Illuminate\Http\Request;
use App\Models\Project;

class Projects
{
    public function GetAll(){
        return Project::all();
    }

    public function GetById($id){
        return Project::findOrFail($id);
    }

    public function GetByRequest(Request $request){
        $projects = Project::select('*');

        if ($request->project_id != "" && $request->project_id != null) {
            $projects = $projects->where('project_id',$request->project_id);
        }

        return $projects->get();
    }

    public function Create(Request $request){
        $project = new Project;
		$project->project_name = $request->input('project_name');
		$project->created_by_user_id = $request->input('created_by_user_id');
		$project->is_can_take_multiple = $request->input('isCanTakeMultiple');
		$project->is_open = $request->input('isOpen');
        $project->save();

        return $project;
    }

    public function Update(Request $request,$id){
        $project = Project::findOrFail($id);
		$project->project_name = $request->input('project_name');
		$project->created_by_user_id = $request->input('created_by_user_id');
		$project->is_can_take_multiple = $request->input('isCanTakeMultiple');
		$project->is_open = $request->input('isOpen');
        $project->save();

        return $project;
    }

    public function Delete($id){
        $project = Project::findOrFail($id);
        $project->delete();
        return true;
    }
}
