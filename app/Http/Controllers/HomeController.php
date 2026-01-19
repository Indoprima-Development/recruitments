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
use League\OAuth2\Client\Provider\Google;

use Google\Client as Google_Client;
use Google\Service\Gmail as Google_Service_Gmail;
use Google\Service\Gmail\Message as Google_Service_Gmail_Message;



class HomeController extends Controller
{
    public function home(Request $request)
    {
        if (Auth::user()->role != 'ADMIN') {
            return redirect('vacancies');
        }

        $month = $request->input('month', date('m'));
        $year = $request->input('year', date('Y'));

        // Base Query
        $query = Ptkformtransaction::query()
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month);

        $totalApplications = $query->count();

        // Hired Count (Status 7 = Joined)
        $hiredCount = (clone $query)->where('status', 7)->count();

        // Hire Rate
        $hireRate = $totalApplications > 0 ? round(($hiredCount / $totalApplications) * 100, 1) : 0;

        // Time to Hire
        // Fetch hired candidates for this month and calculate avg days
        $hiredCandidates = (clone $query)->where('status', 7)->get();
        $totalDays = 0;
        foreach($hiredCandidates as $candidate) {
            $created = \Carbon\Carbon::parse($candidate->created_at);
            $updated = \Carbon\Carbon::parse($candidate->updated_at); // Assuming updated_at is the join date
            $totalDays += $created->diffInDays($updated);
        }
        $avgTimeToHire = $hiredCount > 0 ? round($totalDays / $hiredCount) : 0;


        // Offer Acceptance
        // Assume Status 5 = Offering (Sent), Status 7 = Joined (Accepted)
        // This is a rough estimate. Ideally we track Offer Sent vs Offer Accepted.
        // Let's assume Status 5 and above means Offer was reached.
        $offersReached = (clone $query)->where('status', '>=', 5)->count();
        $offerAcceptance = $offersReached > 0 ? round(($hiredCount / $offersReached) * 100, 1) : 0;

        // Funnel Data
        // 0: App, 1: HC, 3: User, 5: Offer, 7: Hired
        // Note: The flow codes might skip some numbers based on visual but let's map standard ones.
        // The visual shows: Aplikasi Masuk, Screening, Interview HR, Interview User, Offering, Hired.
        $funnelData = [
            'total' => $totalApplications,
            'screening' => (clone $query)->where('status', '>=', 0)->count(), // All entered are screened
            'interview_hr' => (clone $query)->where('status', '>=', 1)->count(),
            'interview_user' => (clone $query)->where('status', '>=', 3)->count(),
            'offering' => $offersReached,
            'hired' => $hiredCount
        ];

        // Hiring by Department
        // Group by ptkform.jobtitle.department (if exists) or just jobtitle name for now simple
        $departmentData = Ptkformtransaction::select('ptkforms.id', DB::raw('count(*) as apps'))
            ->join('ptkforms', 'ptkforms.id', 'ptkformtransactions.ptkform_id')
            ->join('jobtitles', 'jobtitles.id', 'ptkforms.jobtitle_id') // Corrected column name to jobtitle_id
            ->whereYear('ptkformtransactions.created_at', $year)
            ->whereMonth('ptkformtransactions.created_at', $month)
            ->groupBy('ptkforms.id')
            ->with('ptkform.jobtitle') // Load relationship
            ->get();

        // Refine department data
        // Since groupBy ptkforms.id might split same job title if different PTK forms, we will aggregate in PHP or improve query.
        // Let's use the Collection to aggregate by JobTitle Name.
        $deptStats = [];
        $rawDept = Ptkformtransaction::with(['ptkform.jobtitle'])
             ->whereYear('created_at', $year)
             ->whereMonth('created_at', $month)
             ->get();

        foreach($rawDept as $item) {
            $name = $item->ptkform->jobtitle->jobtitle_name ?? 'Unknown';
            if(!isset($deptStats[$name])) {
                $deptStats[$name] = [
                    'name' => $name,
                    'open' => 0, // Placeholder
                    'applications' => 0,
                    'interviews' => 0,
                    'hired' => 0
                ];
                // Try to get open positions count? Ptkform has 'jumlah'?
                // For now just 1 per form or summation.
                // This is complex, let's simplify: existing PTK forms open.
            }
            $deptStats[$name]['applications']++;
            if($item->status >= 1) $deptStats[$name]['interviews']++;
            if($item->status == 7) $deptStats[$name]['hired']++;
        }

        // Calculate success rate
        foreach($deptStats as &$stat) {
            $stat['success_rate'] = $stat['applications'] > 0 ? round(($stat['hired'] / $stat['applications']) * 100, 1) : 0;
            // Get Open positions.
            // We can Count PTKForms for this jobtitle that are OPEN (is_open=1 works?)
            // This is a bit outside transaction scope, but let's just create a nice table.
            $stat['open'] = Ptkform::whereHas('jobtitle', function($q) use ($stat) {
                $q->where('jobtitle_name', $stat['name']);
            })->sum('jumlah');
        }

        return view("home.home", compact("totalApplications", "hireRate", "avgTimeToHire", "offerAcceptance", "funnelData", "deptStats", "month", "year"));
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
        Ptkformtransaction::where('user_id', Auth::user()->id)->where('ptkform_id', $ptkFormId)->update([
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

    public function offVacancy($id)
    {
        Ptkform::where('id', $id)->update([
            'status' => 9
        ]);

        AlertSuccess("Terhapus", "Lowongan berhasil dihapus");
        return redirect()->back();
    }

    public function examUsers()
    {
        $lamarans = Ptkformtransaction::where('user_id', Auth::user()->id)->whereNull('score_technical_test')->get();
        $ids = [];

        foreach ($lamarans as $key => $d) {
            array_push($ids, $d->ptkform_id);
        }
        $exams = Exam::whereIn('ptkform_id', $ids)->get();

        $data['exam']       = $exams;
        return view('home.examination', compact('data', 'exams'));
    }

    public function sendMail()
    {

    }
}
