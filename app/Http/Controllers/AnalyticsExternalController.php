<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecruitmentExternal;
use Illuminate\Support\Facades\DB;

class AnalyticsExternalController extends Controller
{
    public function index()
    {
        $query = RecruitmentExternal::query();
        
        $totalCandidates = $query->count();
        
        // 1. Trend by Month
        $trendData = RecruitmentExternal::select('month_1', DB::raw('count(*) as count'))
            ->whereNotNull('month_1')
            ->groupBy('month_1')
            ->orderBy('month_1')
            ->get();
        $trendLabels = $trendData->pluck('month_1');
        $trendCounts = $trendData->pluck('count');

        // 2. Education Level
        $eduData = RecruitmentExternal::select('level_pendidikan', DB::raw('count(*) as count'))
            ->whereNotNull('level_pendidikan')
            ->groupBy('level_pendidikan')
            ->orderBy('count', 'desc')
            ->get();
        $eduLabels = $eduData->pluck('level_pendidikan');
        $eduCounts = $eduData->pluck('count');

        // 3. Campuses
        $campusData = RecruitmentExternal::select('campus', DB::raw('count(*) as count'))
            ->whereNotNull('campus')
            ->groupBy('campus')
            ->orderBy('count', 'desc')
            ->limit(10)
            ->get();
        $campusLabels = $campusData->pluck('campus');
        $campusCounts = $campusData->pluck('count');

        // 4. Majors (Jurusan)
        $jurusanData = RecruitmentExternal::select('jurusan', DB::raw('count(*) as count'))
            ->whereNotNull('jurusan')
            ->groupBy('jurusan')
            ->orderBy('count', 'desc')
            ->limit(10)
            ->get();
        $jurusanLabels = $jurusanData->pluck('jurusan');
        $jurusanCounts = $jurusanData->pluck('count');

        // 5. Source (Sumber)
        $sumberData = RecruitmentExternal::select('sumber', DB::raw('count(*) as count'))
            ->whereNotNull('sumber')
            ->groupBy('sumber')
            ->orderBy('count', 'desc')
            ->get();
        $sumberLabels = $sumberData->pluck('sumber');
        $sumberCounts = $sumberData->pluck('count');
        
        // 6. Result Director
        $resultDirectorRaw = RecruitmentExternal::whereNotNull('result_director')->get();
        $resultDirectorData = $resultDirectorRaw->groupBy('result_director')->map(function ($group) {
            return $group->count();
        })->sortDesc();
        
        $resultDirectorLabels = $resultDirectorData->keys();
        $resultDirectorCounts = $resultDirectorData->values();

        // 7. Funnel (Approached vs Responded vs Connected)
        $funnelConnectSent = RecruitmentExternal::whereNotNull('connect_sent')->where('connect_sent', '!=', '')->count();
        $funnelConnected = RecruitmentExternal::whereNotNull('connected')->where('connected', '!=', '')->count();
        $funnelApproached = RecruitmentExternal::whereNotNull('approached')->where('approached', '!=', '')->count();
        $funnelResponded = RecruitmentExternal::whereNotNull('responded')->where('responded', '!=', '')->count();
        
        $funnelData = [
            'connect_sent' => $funnelConnectSent,
            'connected'    => $funnelConnected,
            'approached'   => $funnelApproached,
            'responded'    => $funnelResponded,
        ];

        return view('analytics.external', compact(
            'totalCandidates',
            'trendLabels', 'trendCounts',
            'eduLabels', 'eduCounts',
            'campusLabels', 'campusCounts',
            'jurusanLabels', 'jurusanCounts',
            'sumberLabels', 'sumberCounts',
            'resultDirectorLabels', 'resultDirectorCounts',
            'funnelData'
        ));
    }
}
