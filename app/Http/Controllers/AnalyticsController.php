<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ptkform;
use App\Models\Ptkformtransaction;
use App\Models\User;
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

        // 3. Applications Trend (Last 12 Months)
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

        // 4. Applicants by Department
        $deptData = Ptkformtransaction::join('ptkforms', 'ptkformtransactions.ptkform_id', '=', 'ptkforms.id')
            ->join('departments', 'ptkforms.department_id', '=', 'departments.id')
            ->select('departments.department_name', DB::raw('count(ptkformtransactions.id) as count'))
            ->groupBy('departments.department_name')
            ->orderBy('count', 'desc')
            ->limit(10)
            ->get();
        $deptLabels = $deptData->pluck('department_name');
        $deptCounts = $deptData->pluck('count');

        // 4b. Applicants by Section
        $sectionData = Ptkformtransaction::join('ptkforms', 'ptkformtransactions.ptkform_id', '=', 'ptkforms.id')
            ->join('sections', 'ptkforms.section_id', '=', 'sections.id')
            ->select('sections.section_name', DB::raw('count(ptkformtransactions.id) as count'))
            ->groupBy('sections.section_name')
            ->orderBy('count', 'desc')
            ->limit(10)
            ->get();
        $sectionLabels = $sectionData->pluck('section_name');
        $sectionCounts = $sectionData->pluck('count');

        // 5. Gender (Updated from User->Datadiri per request "gender datanya diambil dari datadiris.gender")
        $genderData = DB::table('ptkformtransactions')
            ->join('datadiris', 'ptkformtransactions.user_id', '=', 'datadiris.user_id')
            ->select('datadiris.gender', DB::raw('count(*) as count'))
            ->groupBy('datadiris.gender')
            ->get();
        // Assuming Datadiris gender: 1 = Male, 2 = Female
        $genderCounts = [
            'male' => $genderData->where('gender', 1)->first()->count ?? 0,
            'female' => $genderData->where('gender', 2)->first()->count ?? 0
        ];

        // 6. Education Level
        $eduData = DB::table('ptkformtransactions')
            ->join('datapendidikanformals', 'ptkformtransactions.user_id', '=', 'datapendidikanformals.user_id')
            ->select('datapendidikanformals.tingkat', DB::raw('count(distinct ptkformtransactions.user_id) as count'))
            ->groupBy('datapendidikanformals.tingkat')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->get();
        $eduLabels = $eduData->pluck('tingkat');
        $eduCounts = $eduData->pluck('count');

        // 7. Institute Origin (Asal Instansi)
        $instansiData = DB::table('users')
            ->whereNotNull('asal_instansi')
            ->select('asal_instansi', DB::raw('count(*) as count'))
            ->groupBy('asal_instansi')
            ->orderBy('count', 'desc')
            ->limit(7)
            ->get();
        $instansiLabels = $instansiData->pluck('asal_instansi');
        $instansiCounts = $instansiData->pluck('count');

        // 8. Majors (Jurusan)
        $jurusanData = DB::table('users')
             ->whereNotNull('jurusan')
             ->select('jurusan', DB::raw('count(*) as count'))
             ->groupBy('jurusan')
             ->orderBy('count', 'desc')
             ->limit(8)
             ->get();
        $jurusanLabels = $jurusanData->pluck('jurusan');
        $jurusanCounts = $jurusanData->pluck('count');

         // 10. Geography (Provinces & Cities from datadiris)
        $provinceData = DB::table('users')
             ->join('datadiris', 'users.id', '=', 'datadiris.user_id')
             ->whereNotNull('datadiris.provinces')
             ->select('datadiris.provinces', DB::raw('count(*) as count'))
             ->groupBy('datadiris.provinces')
             ->orderBy('count', 'desc')
             ->limit(10)
             ->get();
        $provinceLabels = $provinceData->pluck('provinces');
        $provinceCounts = $provinceData->pluck('count');

        $cityData = DB::table('users')
             ->join('datadiris', 'users.id', '=', 'datadiris.user_id')
             ->whereNotNull('datadiris.cities')
             ->select('datadiris.cities', DB::raw('count(*) as count'))
             ->groupBy('datadiris.cities')
             ->orderBy('count', 'desc')
             ->limit(10)
             ->get();
        $cityLabels = $cityData->pluck('cities');
        $cityCounts = $cityData->pluck('count');


        // 9. Ranges (GPA, Weight, Height)
        // Handle potential comma usage in IPK (e.g. 3,50) and ensure numeric validity
        // Using ISNUMERIC since TRY_CAST is not available in older SQL Server versions
        $gpaRanges = DB::select("
            SELECT
                CASE
                    WHEN ISNUMERIC(REPLACE(ipk, ',', '.')) = 1 AND CAST(REPLACE(ipk, ',', '.') AS FLOAT) < 2.5 THEN '< 2.5'
                    WHEN ISNUMERIC(REPLACE(ipk, ',', '.')) = 1 AND CAST(REPLACE(ipk, ',', '.') AS FLOAT) BETWEEN 2.5 AND 3.0 THEN '2.5 - 3.0'
                    WHEN ISNUMERIC(REPLACE(ipk, ',', '.')) = 1 AND CAST(REPLACE(ipk, ',', '.') AS FLOAT) BETWEEN 3.0 AND 3.5 THEN '3.0 - 3.5'
                    WHEN ISNUMERIC(REPLACE(ipk, ',', '.')) = 1 AND CAST(REPLACE(ipk, ',', '.') AS FLOAT) > 3.5 THEN '> 3.5'
                    ELSE 'Unknown'
                END as range_label,
                COUNT(*) as count
            FROM users
            WHERE ipk IS NOT NULL
              AND LEN(ipk) > 0
              AND ISNUMERIC(REPLACE(ipk, ',', '.')) = 1
              AND CAST(REPLACE(ipk, ',', '.') AS FLOAT) > 0
            GROUP BY
                 CASE
                    WHEN ISNUMERIC(REPLACE(ipk, ',', '.')) = 1 AND CAST(REPLACE(ipk, ',', '.') AS FLOAT) < 2.5 THEN '< 2.5'
                    WHEN ISNUMERIC(REPLACE(ipk, ',', '.')) = 1 AND CAST(REPLACE(ipk, ',', '.') AS FLOAT) BETWEEN 2.5 AND 3.0 THEN '2.5 - 3.0'
                    WHEN ISNUMERIC(REPLACE(ipk, ',', '.')) = 1 AND CAST(REPLACE(ipk, ',', '.') AS FLOAT) BETWEEN 3.0 AND 3.5 THEN '3.0 - 3.5'
                    WHEN ISNUMERIC(REPLACE(ipk, ',', '.')) = 1 AND CAST(REPLACE(ipk, ',', '.') AS FLOAT) > 3.5 THEN '> 3.5'
                    ELSE 'Unknown'
                END
        ");
        $gpaData = collect($gpaRanges)->pluck('count', 'range_label');

        $weightRanges = DB::select("
            SELECT
                CASE
                    WHEN ISNUMERIC(REPLACE(berat_badan, ',', '.')) = 1 AND CAST(REPLACE(berat_badan, ',', '.') AS FLOAT) < 50 THEN '< 50 kg'
                    WHEN ISNUMERIC(REPLACE(berat_badan, ',', '.')) = 1 AND CAST(REPLACE(berat_badan, ',', '.') AS FLOAT) BETWEEN 50 AND 60 THEN '50 - 60 kg'
                    WHEN ISNUMERIC(REPLACE(berat_badan, ',', '.')) = 1 AND CAST(REPLACE(berat_badan, ',', '.') AS FLOAT) BETWEEN 60 AND 70 THEN '60 - 70 kg'
                    WHEN ISNUMERIC(REPLACE(berat_badan, ',', '.')) = 1 AND CAST(REPLACE(berat_badan, ',', '.') AS FLOAT) BETWEEN 70 AND 80 THEN '70 - 80 kg'
                    WHEN ISNUMERIC(REPLACE(berat_badan, ',', '.')) = 1 AND CAST(REPLACE(berat_badan, ',', '.') AS FLOAT) > 80 THEN '> 80 kg'
                    ELSE 'Unknown'
                END as range_label,
                COUNT(*) as count
            FROM users
            WHERE berat_badan IS NOT NULL
              AND LEN(berat_badan) > 0
              AND ISNUMERIC(REPLACE(berat_badan, ',', '.')) = 1
              AND CAST(REPLACE(berat_badan, ',', '.') AS FLOAT) > 0
            GROUP BY
                 CASE
                    WHEN ISNUMERIC(REPLACE(berat_badan, ',', '.')) = 1 AND CAST(REPLACE(berat_badan, ',', '.') AS FLOAT) < 50 THEN '< 50 kg'
                    WHEN ISNUMERIC(REPLACE(berat_badan, ',', '.')) = 1 AND CAST(REPLACE(berat_badan, ',', '.') AS FLOAT) BETWEEN 50 AND 60 THEN '50 - 60 kg'
                    WHEN ISNUMERIC(REPLACE(berat_badan, ',', '.')) = 1 AND CAST(REPLACE(berat_badan, ',', '.') AS FLOAT) BETWEEN 60 AND 70 THEN '60 - 70 kg'
                    WHEN ISNUMERIC(REPLACE(berat_badan, ',', '.')) = 1 AND CAST(REPLACE(berat_badan, ',', '.') AS FLOAT) BETWEEN 70 AND 80 THEN '70 - 80 kg'
                    WHEN ISNUMERIC(REPLACE(berat_badan, ',', '.')) = 1 AND CAST(REPLACE(berat_badan, ',', '.') AS FLOAT) > 80 THEN '> 80 kg'
                    ELSE 'Unknown'
                END
        ");
        $weightData = collect($weightRanges)->pluck('count', 'range_label');

        $heightRanges = DB::select("
            SELECT
                CASE
                    WHEN ISNUMERIC(REPLACE(tinggi_badan, ',', '.')) = 1 AND CAST(REPLACE(tinggi_badan, ',', '.') AS FLOAT) < 150 THEN '< 150 cm'
                    WHEN ISNUMERIC(REPLACE(tinggi_badan, ',', '.')) = 1 AND CAST(REPLACE(tinggi_badan, ',', '.') AS FLOAT) BETWEEN 150 AND 160 THEN '150 - 160 cm'
                    WHEN ISNUMERIC(REPLACE(tinggi_badan, ',', '.')) = 1 AND CAST(REPLACE(tinggi_badan, ',', '.') AS FLOAT) BETWEEN 160 AND 170 THEN '160 - 170 cm'
                    WHEN ISNUMERIC(REPLACE(tinggi_badan, ',', '.')) = 1 AND CAST(REPLACE(tinggi_badan, ',', '.') AS FLOAT) BETWEEN 170 AND 180 THEN '170 - 180 cm'
                    WHEN ISNUMERIC(REPLACE(tinggi_badan, ',', '.')) = 1 AND CAST(REPLACE(tinggi_badan, ',', '.') AS FLOAT) > 180 THEN '> 180 cm'
                    ELSE 'Unknown'
                END as range_label,
                COUNT(*) as count
            FROM users
            WHERE tinggi_badan IS NOT NULL
              AND LEN(tinggi_badan) > 0
              AND ISNUMERIC(REPLACE(tinggi_badan, ',', '.')) = 1
              AND CAST(REPLACE(tinggi_badan, ',', '.') AS FLOAT) > 0
            GROUP BY
                 CASE
                    WHEN ISNUMERIC(REPLACE(tinggi_badan, ',', '.')) = 1 AND CAST(REPLACE(tinggi_badan, ',', '.') AS FLOAT) < 150 THEN '< 150 cm'
                    WHEN ISNUMERIC(REPLACE(tinggi_badan, ',', '.')) = 1 AND CAST(REPLACE(tinggi_badan, ',', '.') AS FLOAT) BETWEEN 150 AND 160 THEN '150 - 160 cm'
                    WHEN ISNUMERIC(REPLACE(tinggi_badan, ',', '.')) = 1 AND CAST(REPLACE(tinggi_badan, ',', '.') AS FLOAT) BETWEEN 160 AND 170 THEN '160 - 170 cm'
                    WHEN ISNUMERIC(REPLACE(tinggi_badan, ',', '.')) = 1 AND CAST(REPLACE(tinggi_badan, ',', '.') AS FLOAT) BETWEEN 170 AND 180 THEN '170 - 180 cm'
                    WHEN ISNUMERIC(REPLACE(tinggi_badan, ',', '.')) = 1 AND CAST(REPLACE(tinggi_badan, ',', '.') AS FLOAT) > 180 THEN '> 180 cm'
                    ELSE 'Unknown'
                END
        ");
        $heightData = collect($heightRanges)->pluck('count', 'range_label');

        // Recent Activity
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
            'sectionLabels',
            'sectionCounts',
            'genderCounts',
            'eduLabels',
            'eduCounts',
            'instansiLabels',
            'instansiCounts',
            'jurusanLabels',
            'jurusanCounts',
            'gpaData',
            'weightData',
            'heightData',
            'recentActivities',
            'provinceLabels',
            'provinceCounts',
            'cityLabels',
            'cityCounts'
        ));
    }
}
