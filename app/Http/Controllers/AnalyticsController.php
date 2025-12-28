<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ptkform;
use App\Models\Ptkformtransaction;
use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnalyticsController extends Controller
{
    public function index()
    {
        // 1. Key Metrics
        $totalVacancies = Ptkform::count();
        $activeVacancies = Ptkform::where('status', 1)->count();
        $totalApplicants = Ptkformtransaction::count();

        // Assuming 'join' column signifies hired when it has a value/date
        $hiredCandidates = Ptkformtransaction::whereNotNull('join')->count();

        // 2. Recruitment Funnel Data
        $funnelData = [
            'applied' => $totalApplicants,
            'screened' => Ptkformtransaction::whereNotNull('cv_review')->count(),
            'psychotest' => Ptkformtransaction::whereNotNull('psikotest')->count(),
            'interview' => Ptkformtransaction::where(function($q) {
                $q->whereNotNull('interview_hc')
                  ->orWhereNotNull('interview_user')
                  ->orWhereNotNull('interview_direksi');
            })->count(),
            'mcu' => Ptkformtransaction::whereNotNull('mcu')->count(),
            'offering' => Ptkformtransaction::whereNotNull('finalisasi')->count(),
            'hired' => $hiredCandidates
        ];

        // 3. Applications Trend (Last 6 Months)
        $trendData = Ptkformtransaction::select(
            DB::raw('count(id) as count'),
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month_year"),
            DB::raw("DATE_FORMAT(created_at, '%M') as month_name")
        )
        ->where('created_at', '>=', Carbon::now()->subMonths(6))
        ->groupBy('month_year', 'month_name')
        ->orderBy('month_year', 'asc')
        ->get();

        $trendLabels = $trendData->pluck('month_name');
        $trendCounts = $trendData->pluck('count');

        // 4. Applicants by Department (Top 5)
        $deptData = Ptkformtransaction::join('ptkforms', 'ptkformtransactions.ptkform_id', '=', 'ptkforms.id')
            ->join('departments', 'ptkforms.department_id', '=', 'departments.id')
            ->select('departments.department_name', DB::raw('count(ptkformtransactions.id) as count'))
            ->groupBy('departments.department_name')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->get();

        $deptLabels = $deptData->pluck('department_name');
        $deptCounts = $deptData->pluck('count');

        // 5. Recent Activity
        $recentActivities = Ptkformtransaction::with(['user', 'ptkform.jobtitle'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('analytics.index', compact(
            'totalVacancies',
            'activeVacancies',
            'totalApplicants',
            'hiredCandidates',
            'funnelData',
            'trendLabels',
            'trendCounts',
            'deptLabels',
            'deptCounts',
            'recentActivities'
        ));
    }
}
