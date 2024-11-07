<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Exam;
use App\Models\Exam_transaction;
use App\Models\Jobtitle;
use App\Models\Ptkform;
use App\Models\Ptkformtransaction;
use App\Models\Qna;
use App\Models\Qna_transaction;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(){
        if (Auth::user()->role != 'ADMIN') {
            return redirect('vacancies');
        }

        $data = Ptkformtransaction::select(DB::raw('count(id) as jumlah, status'))
        ->orderBy('status','ASC')
        ->groupBy('status')
        ->get();

        $dataResults = [0,0,0,0,0,0,0,0];
        foreach ($data as $key => $d) {
            $dataResults[$d->status] = $d->jumlah;
        }

        return view("home.home",compact("dataResults"));
    }

    public function index()
    {
        $data['projects'] = Project::where('is_open', true)->get();
        return view('home.index', compact('data'));
    }

    public function examination($project_id)
    {
        $project_id = DecryptData($project_id);

        $data['examTransaction'] = Exam_transaction::select('exam_transactions.*')
            ->where('exam_transactions.user_id', Auth::user()->id)
            ->join('exams', 'exams.id', 'exam_transactions.exam_id')
            ->where('exams.project_id', $project_id)
            ->first();

        if (!empty($data['examTransaction'])) {
            return redirect('qna/' . EncryptData($data['examTransaction']->exam_id));
        }

        $data['projects']   = Project::findOrFail($project_id);
        $data['exam']       = Exam::where('project_id', $project_id)->get();
        return view('home.examination', compact('data'));
    }

    public function qna($exam_id)
    {
        $exam_id = DecryptData($exam_id);
        //store if not exist in transaction
        $data['examTransaction'] = Exam_transaction::where('user_id', Auth::user()->id)
            ->where('exam_id', $exam_id)
            ->first();

        //store answer saved
        if (empty($data['examTransaction'])) {
            $data['examTransaction'] = Exam_transaction::create([
                "exam_id"               => $exam_id,
                "user_id"               => Auth::user()->id,
                "is_open"               => true,
                "score"                 => -1,
                "time_remaining"        => 30,
            ]);
        }

        if (!$data['examTransaction']->is_open) {
            return redirect('submit-test/' . EncryptData($exam_id));
        }

        //get qna
        $data['qna'] = Qna::select('*')
            ->where('exam_id', $exam_id)
            ->with('qnaTransaction')
            ->get();

        $data['qna'] = collect($data['qna'])->shuffle()->values();

        $data['exam'] = Exam::findOrFail($exam_id);

        return view('home.qna', compact('data'));
    }

    public function qnaTransaction($code)
    {
        $array = explode("_", DecryptData($code));
        $qna_id     = $array[0];
        $answer     = $array[1];
        $key        = $array[2];

        $is_true    = true;
        if ($answer != $key) {
            $is_true    = false;
        }

        $qna_transaction = Qna_transaction::where('user_id', Auth::user()->id)->where('qna_id', $qna_id)->first();
        if (empty($qna_transaction)) {
            $qna_transaction = Qna_transaction::create([
                "qna_id"    => $qna_id,
                "user_id"   => Auth::user()->id,
                "answer"    => $answer,
                "is_true"   => $is_true,
            ]);
        } else {
            $qna_transaction->update([
                "answer"    => $answer,
                "is_true"   => $is_true,
            ]);
        }

        return true;
    }

    public function submitTest($exam_id)
    {
        $exam_id = DecryptData($exam_id);

        $data['examTransaction'] = Exam_transaction::where('exam_id', $exam_id)
            ->where('user_id', Auth::user()->id)->first();

        if (!$data['examTransaction']->is_open) {
            return view('home.submitTest', compact('data'));
        }

        //count score
        $qnaTransactions = Qna_transaction::select('qna_transactions.*')
            ->join('qnas', 'qnas.id', 'qna_transactions.qna_id')
            ->where('qna_transactions.user_id', Auth::user()->id)
            ->where('qnas.exam_id', $exam_id)
            ->get();

        $score = 0;
        foreach ($qnaTransactions as $t) {
            if ($t->is_true) {
                $score += 5;
            }
        }
        //end count

        //update transaction
        $data['examTransaction']->update([
            "is_open"   => false,
            "score"     => $score,
        ]);

        $ptkFormId = $data['examTransaction']->exam->ptkform_id;
        Ptkformtransaction::where('user_id',Auth::user()->id)->where('ptkform_id',$ptkFormId)->update([
            'score_technical_test' => $score,
            'technical_test'    => date('Y-m-d H:i:s'),
        ]);

        return view('home.submitTest', compact('data'));
    }

    public function rankTestByProjectId($project_id)
    {
        $project_id = DecryptData($project_id);
        $data['project'] = Project::findOrFail($project_id);
        $data['exams'] = Exam::where('project_id', $project_id)->get();

        $data['examTransaction'] = Exam_transaction::select('exam_transactions.*')
            ->join('exams', 'exams.id', 'exam_transactions.exam_id')
            ->where('exams.project_id', $project_id)
            ->orderBy('exam_transactions.score', 'DESC')
            ->orderBy('exam_transactions.updated_at', 'ASC')
            ->with('user', 'exam')
            ->get();

        return view('home.rankTest', compact('data'));
    }

    public function rankTest($exam_id)
    {
        $exam_id = DecryptData($exam_id);
        $data['exam'] = Exam::findOrFail($exam_id);
        $data['exams'] = Exam::where('project_id', $data['exam']->project_id)->get();
        $data['examTransaction'] = Exam_transaction::where('exam_id', $exam_id)
            ->orderBy('score', 'DESC')
            ->orderBy('updated_at', 'ASC')
            ->with('user', 'exam')
            ->get();

        return view('home.rankTest', compact('data'));
    }

    public function updateTimeRemaining($exam_id)
    {
        $data['examTransaction'] = Exam_transaction::where('exam_id', $exam_id)
            ->where('user_id', Auth::user()->id)->first();

        $time = $data['examTransaction']->time_remaining - 0.5;

        if ($time <= 0) {
            return false;
        }

        $data['examTransaction']->update([
            "time_remaining" => $time
        ]);

        return true;
    }

    public function examHistories()
    {
        $data['examTransaction'] = Exam_transaction::where('user_id', Auth::user()->id)
            ->with('exam')
            ->get();

        return view('home.examHistories', compact('data'));
    }

    public function offVacancy($id){
        Ptkform::where('id',$id)->update([
            'status' => 9
        ]);

        AlertSuccess("Deleted", "Vacancy is set to off");
        return redirect()->back();
    }

    public function examUsers(){
        $lamarans = Ptkformtransaction::where('user_id',Auth::user()->id)->whereNull('score_technical_test')->get();
        $ids = [];

        foreach ($lamarans as $key => $d) {
            array_push($ids,$d->ptkform_id);
        }
        $exams = Exam::whereIn('ptkform_id',$ids)->get();

        $data['exam']       = $exams;
        return view('home.examination', compact('data','exams'));
    }
}
