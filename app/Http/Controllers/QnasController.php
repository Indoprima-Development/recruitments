<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Exam;
use App\Models\Qna;
use App\Http\Requests\QnaRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class QnasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $qnas= Qna::all();
        return view('qnas.index', ['qnas'=>$qnas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $exams = Exam::all();
        return view('qnas.create',compact('exams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  QnaRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(QnaRequest $request)
    {
        $qna = new Qna;
		$qna->exam_id = $request->input('exam_id');
		$qna->user_id = $request->input('user_id');
		$qna->question = $request->input('question');
		$qna->answer1 = $request->input('answer1');
		$qna->answer2 = $request->input('answer2');
		$qna->answer3 = $request->input('answer3');
		$qna->answer4 = $request->input('answer4');
		$qna->answer5 = $request->input('answer5');
		$qna->key = $request->input('key');
		$qna->question_img = $request->input('question_img');
		$qna->answer1_img = $request->input('answer1_img');
		$qna->answer2_img = $request->input('answer2_img');
		$qna->answer3_img = $request->input('answer3_img');
		$qna->answer4_img = $request->input('answer4_img');
		$qna->answer5_img = $request->input('answer5_img');
        $qna->save();

        return to_route('qnas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $qna = Qna::findOrFail($id);
        return view('qnas.show',['qna'=>$qna]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $qna = Qna::findOrFail($id);
        return view('qnas.edit',['qna'=>$qna]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  QnaRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(QnaRequest $request, $id)
    {
        $qna = Qna::findOrFail($id);
		$qna->exam_id = $request->input('exam_id');
		$qna->user_id = $request->input('user_id');
		$qna->question = $request->input('question');
		$qna->answer1 = $request->input('answer1');
		$qna->answer2 = $request->input('answer2');
		$qna->answer3 = $request->input('answer3');
		$qna->answer4 = $request->input('answer4');
		$qna->answer5 = $request->input('answer5');
		$qna->key = $request->input('key');
		$qna->question_img = $request->input('question_img');
		$qna->answer1_img = $request->input('answer1_img');
		$qna->answer2_img = $request->input('answer2_img');
		$qna->answer3_img = $request->input('answer3_img');
		$qna->answer4_img = $request->input('answer4_img');
		$qna->answer5_img = $request->input('answer5_img');
        $qna->save();

        return to_route('qnas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $qna = Qna::findOrFail($id);
        $qna->delete();

        return to_route('qnas.index');
    }

    public function qnaUploadImage(Request $request){
        $filename = "$request->type.png";
        $pathUpload = "qna/$request->qna_id";
        UploadFile($request->file,$pathUpload,$filename);
        
        Qna::where('id',$request->qna_id)->update([
            $request->type => $pathUpload.'/'.$filename
        ]);

        Alert::success('Success', 'Upload image success');
        return redirect()->back();
    }
}
