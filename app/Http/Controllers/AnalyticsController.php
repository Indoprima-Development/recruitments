<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ptkform;
use App\Models\Ptkformtransaction;
use App\Models\User;
use App\Models\Datadiri;
use App\Models\Datapendidikanformal;
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

        // 3. Applications Trend (Last 12 Months) - REQ_UPDATED: 12 Months
        $trendData = Ptkformtransaction::select(
            DB::raw('count(id) as count'),
            DB::raw("LEFT(CONVERT(varchar, created_at, 120), 7) as month_year"),
            DB::raw("DATENAME(month, created_at) as month_name")
        )
        ->where('created_at', '>=', Carbon::now()->subMonths(12))
        ->groupBy(DB::raw("LEFT(CONVERT(varchar, created_at, 120), 7)"), DB::raw("DATENAME(month, created_at)"))
        ->orderBy(DB::raw("LEFT(CONVERT(varchar, created_at, 120), 7)"), 'asc')
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

        // 5. Demographics: Gender (from Datadiri linked via User)
        // Note: Joining across DB might be complex if relationships are not standard, assuming standard join
        // Ptkformtransaction -> User (user_id) -> Datadiri (user_id)
        $genderData = DB::table('ptkformtransactions')
            ->join('datadiris', 'ptkformtransactions.user_id', '=', 'datadiris.user_id')
            ->select('datadiris.gender', DB::raw('count(*) as count'))
            ->groupBy('datadiris.gender')
            ->get();

        $genderCounts = [
            'male' => $genderData->where('gender', 1)->first()->count ?? 0,
            'female' => $genderData->where('gender', 2)->first()->count ?? 0
        ];

        // 6. Education Level Demographics
        // Ptkformtransaction -> User -> Datapendidikanformal (latest?)
        // Simplifying by taking the highest level from applicants
        // This query might be heavy, so we limit or aggregate efficiently
        $eduData = DB::table('ptkformtransactions')
            ->join('datapendidikanformals', 'ptkformtransactions.user_id', '=', 'datapendidikanformals.user_id')
            // To avoid duplicates if user has multiple degrees, we might need a subquery or just basic distribution of all entered degrees
            // Using a simple approximation for now: listing distinct users or just all degrees in pool
            ->select('datapendidikanformals.tingkat', DB::raw('count(distinct ptkformtransactions.user_id) as count')) // Count unique users per degree level
            ->groupBy('datapendidikanformals.tingkat')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->get();

        $eduLabels = $eduData->pluck('tingkat');
        $eduCounts = $eduData->pluck('count');

        // 7. Recent Activity
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
            'genderCounts',
            'eduLabels',
            'eduCounts',
            'recentActivities'
        ));
    }
}
