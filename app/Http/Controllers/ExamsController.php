<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Project;
use App\Models\Exam;
use App\Models\Qna;
use App\Http\Requests\ExamRequest;
use App\Models\Ptkform;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $exams= Exam::all();
        return view('exams.index', ['exams'=>$exams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $projects= Project::all();
        $ptkforms= Ptkform::all();
        return view('exams.create',compact('projects','ptkforms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ExamRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ExamRequest $request)
    {
        $exam = new Exam;
		$exam->project_id = $request->input('project_id');
		$exam->user_id = $request->input('user_id');
		$exam->exam_name = $request->input('exam_name');
		$exam->date_start = $request->input('date_start');
		$exam->date_end = $request->input('date_end');
        $exam->ptkform_id = $request->input('ptkform_id');
        $exam->save();

        return to_route('exams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $exam = Exam::findOrFail($id);
        return view('exams.show',['exam'=>$exam]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $projects= Project::all();
        $ptkforms= Ptkform::all();
        $exam = Exam::findOrFail($id);
        return view('exams.edit',compact('exam','projects','ptkforms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ExamRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ExamRequest $request, $id)
    {
        $exam = Exam::findOrFail($id);
		$exam->project_id = $request->input('project_id');
		$exam->user_id = $request->input('user_id');
		$exam->exam_name = $request->input('exam_name');
		$exam->date_start = $request->input('date_start');
		$exam->date_end = $request->input('date_end');
        $exam->ptkform_id = $request->input('ptkform_id');
        $exam->save();

        return to_route('exams.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);
        $exam->delete();

        return to_route('exams.index');
    }

    public function qnasByExamId($id){
        $examId = DecryptData($id);
        $qnas = Qna::where('exam_id',$examId)->get();
        return view('exams.qnasByExamId', compact('qnas'));
    }
}
