<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Ptkformtransaction;
use App\Http\Requests\PtkformtransactionRequest;
use App\Models\Datadiri;
use App\Models\Ptkformactivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PtkformtransactionsController extends Controller
{
    /**
     * All status codes used for the "Riwayat Aktivitas" listing, plus 'all'.
     */
    private const DATA_STATUSES = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10'];

    private const DATA_CACHE_TTL_MINUTES = 15;

    private function getQueryData($status)
    {
        $ptkformId = request('ptkform_id');

        $cacheKey = sprintf(
            'ptkform_data_v%d_status_%s_ptkform_%s',
            $this->getCacheVersion(),
            $status,
            $ptkformId ?: 'none'
        );

        return Cache::remember($cacheKey, now()->addMinutes(self::DATA_CACHE_TTL_MINUTES), function () use ($status, $ptkformId) {
            return $this->buildQueryData($status, $ptkformId);
        });
    }

    private function buildQueryData($status, $ptkformId)
    {
        $rawTransactions = Ptkformtransaction::query()
            ->join('users', 'ptkformtransactions.user_id', '=', 'users.id')
            ->join('ptkforms', 'ptkformtransactions.ptkform_id', '=', 'ptkforms.id')
            ->leftJoin('jobtitles', 'ptkforms.jobtitle_id', '=', 'jobtitles.id')
            ->leftJoin('datadiris', 'users.id', '=', 'datadiris.user_id')
            ->select([
                'ptkformtransactions.id',
                'ptkformtransactions.ptkform_id',
                'ptkformtransactions.user_id',
                'ptkformtransactions.status',
                'ptkformtransactions.score_candidate',
                'ptkformtransactions.ai_score',
                'ptkformtransactions.created_at',
                'ptkformtransactions.updated_at',
                'users.name as user_name',
                'users.ipk as user_ipk',
                'users.cv as user_cv',
                'jobtitles.jobtitle_name as jobtitle_name',
                'datadiris.cities as cities',
                'datadiris.provinces as provinces',
            ])
            ->when($status !== 'all', function ($query) use ($status) {
                return $query->where('ptkformtransactions.status', $status);
            })
            ->when($ptkformId, function ($query) use ($ptkformId) {
                return $query->where('ptkformtransactions.ptkform_id', $ptkformId);
            })
            ->where('ptkformtransactions.created_at', '>=', date('Y') . '-01-01 00:00:00')
            ->orderBy('ptkformtransactions.id', 'desc')
            ->limit(50)
            ->get();

        $userIds = $rawTransactions->pluck('user_id')->unique();

        $latestEducations = DB::table('datapendidikanformals')
            ->whereIn('user_id', $userIds)
            ->whereIn('id', function ($query) use ($userIds) {
                $query->selectRaw('MAX(id)')
                    ->from('datapendidikanformals')
                    ->whereIn('user_id', $userIds)
                    ->groupBy('user_id');
            })
            ->select(['user_id', 'tingkat', 'instansi'])
            ->get()
            ->keyBy('user_id');

        $experiences = DB::table('datapengalamankerjas')
            ->whereIn('user_id', $userIds)
            ->select(['user_id', 'date_start', 'date_end'])
            ->get()
            ->groupBy('user_id');

        $ptkformtransactions = [];
        foreach ($rawTransactions as $row) {
            $item = new \stdClass();
            $item->id = $row->id;
            $item->ptkform_id = $row->ptkform_id;
            $item->user_id = $row->user_id;
            $item->status = $row->status;
            $item->score_candidate = $row->score_candidate;
            $item->ai_score = $row->ai_score;
            $item->created_at = $row->created_at;
            $item->updated_at = $row->updated_at;
            $item->notes = null;

            $user = new \stdClass();
            $user->id = $row->user_id;
            $user->name = $row->user_name;
            $user->ipk = $row->user_ipk;
            $user->cv = $row->user_cv;

            $edu = $latestEducations->get($row->user_id);
            if ($edu) {
                $latestEdu = new \stdClass();
                $latestEdu->tingkat = $edu->tingkat;
                $latestEdu->instansi = $edu->instansi;
                $user->latestEducation = $latestEdu;
            } else {
                $user->latestEducation = null;
            }

            $dd = new \stdClass();
            $dd->cities = $row->cities;
            $dd->provinces = $row->provinces;
            $user->datadiri = $dd;

            $userExps = $experiences->get($row->user_id) ?? collect();
            $user->datapengalamankerja = collect($userExps);
            $user->datapengalamankerja_count = $user->datapengalamankerja->count();

            $item->user = $user;

            $ptkform = new \stdClass();
            $ptkform->id = $row->ptkform_id;

            $jobtitle = new \stdClass();
            $jobtitle->jobtitle_name = $row->jobtitle_name;
            $ptkform->jobtitle = $jobtitle;

            $item->ptkform = $ptkform;

            $ptkformtransactions[] = $item;
        }

        return collect($ptkformtransactions);
    }

    /**
     * Current cache "generation" for the data listing. Bumping it makes every
     * previously cached key for this listing unreachable, which is a cheap
     * way to invalidate on the file cache driver (no tag support).
     */
    private function getCacheVersion()
    {
        return Cache::get('ptkform_cache_version', 1);
    }

    private function clearDataCache($statuses = null)
    {
        Cache::put('ptkform_cache_version', $this->getCacheVersion() + 1, now()->addDay());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $ptkformtransactions = Ptkformtransaction::all();
        return view('ptkformtransactions.index', ['ptkformtransactions' => $ptkformtransactions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('ptkformtransactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PtkformtransactionRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PtkformtransactionRequest $request)
    {
        $questions = json_decode($request->questions);
        $score = 0;

        if ($questions && isset($questions->score)) {
            for ($i = 0; $i < count($questions->score); $i++) {
                $var = "jawaban_" . $i;
                if (isset($questions->type[$i]) && $questions->type[$i] == 'Rating') {
                    $score += (int)$request->$var / 5 * (int)$questions->score[$i];
                } else {
                    if (isset($questions->jawaban[$i]) && $questions->jawaban[$i] == $request->$var) {
                        $score += (int)$questions->score[$i];
                    }
                }
            }
        }

        $ptkformtransaction = new Ptkformtransaction;
        $ptkformtransaction->ptkform_id = $request->input('ptkform_id');
        $ptkformtransaction->status = 0;
        $ptkformtransaction->score_candidate = $score;
        $ptkformtransaction->user_id = Auth::user()->id;
        $ptkformtransaction->experience_years = $request->input('experience_years');
        $ptkformtransaction->experience_months = $request->input('experience_months');
        $ptkformtransaction->save();

        // Handle CV Upload
        if ($request->hasFile('cv')) {
            $user = Auth::user();
            $file = $request->file('cv');
            $filename = $user->id . ".pdf";
            $pathUpload = "cv";
            
            $publicPath = public_path($pathUpload);
            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0755, true);
            }

            // Hapus file lama jika ada (baik di storage maupun di public/cv)
            if ($user->cv && file_exists(public_path($user->cv))) {
                @unlink(public_path($user->cv));
            }
            if ($user->cv && file_exists(public_path('storage/cv/' . $user->cv))) {
                @unlink(public_path('storage/cv/' . $user->cv));
            }
            
            $file->move($publicPath, $filename);

            $user->cv = "$pathUpload/$filename";
            $user->save();
        }

        $this->clearDataCache(['0']);

        AlertSuccess("Success", "Berhasil melamar pekerjaan");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $ptkformtransaction = Ptkformtransaction::findOrFail($id);
        return view('ptkformtransactions.show', ['ptkformtransaction' => $ptkformtransaction]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $ptkformtransaction = Ptkformtransaction::findOrFail($id);
        return view('ptkformtransactions.edit', ['ptkformtransaction' => $ptkformtransaction]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PtkformtransactionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PtkformtransactionRequest $request, $id)
    {
        $ptkformtransaction = Ptkformtransaction::findOrFail($id);
        $oldStatus = $ptkformtransaction->status;
        $ptkformtransaction->ptkform_id = $request->input('ptkform_id');
        $ptkformtransaction->status = $request->input('status');
        $ptkformtransaction->user_id = $request->input('user_id');
        $ptkformtransaction->save();

        $this->clearDataCache([$oldStatus, $ptkformtransaction->status]);

        return to_route('ptkformtransactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $ptkformtransaction = Ptkformtransaction::findOrFail($id);
        $status = $ptkformtransaction->status;
        $ptkformtransaction->delete();

        $this->clearDataCache([$status]);

        return to_route('ptkformtransactions.index');
    }

    public function dataByStatus($status)
    {
        // The table itself is now populated via AJAX (dataTableAjax) with
        // real server-side paging/filtering, so this only renders the shell.
        $vacancies = $this->getVacanciesForFilter();
        $filterOptions = $this->getFilterOptions();
        return view('ptkformtransactions.data', compact('status', 'vacancies', 'filterOptions'));
    }

    /**
     * DataTables server-side processing endpoint. Paginates and filters at the
     * database level so "all" data is reachable (not capped), and the
     * GPA/University/Education/Experience/Domicile filters run against the
     * full matching dataset instead of just whatever page happened to be loaded.
     */
    public function dataTableAjax($status, Request $request)
    {
        $query = $this->buildFilteredQuery($status, $request);

        $recordsTotal = (clone $query)->count();

        $searchValue = trim((string) $request->input('search.value'));
        if ($searchValue !== '') {
            $query->where(function ($q) use ($searchValue) {
                $q->where('users.name', 'like', "%{$searchValue}%")
                    ->orWhere('jobtitles.jobtitle_name', 'like', "%{$searchValue}%")
                    ->orWhere('latest_edu.instansi', 'like', "%{$searchValue}%")
                    ->orWhere('datadiris.cities', 'like', "%{$searchValue}%")
                    ->orWhere('datadiris.provinces', 'like', "%{$searchValue}%");
            });
        }

        $recordsFiltered = (clone $query)->count();

        $start = max((int) $request->input('start', 0), 0);
        $length = (int) $request->input('length', 50);
        if ($length <= 0) {
            $length = 50;
        }

        // SQL Server 2008 predates OFFSET/FETCH (added in 2012), so Eloquent's
        // ->offset()/->limit() (which always emit OFFSET/FETCH on sqlsrv) can't
        // be used here. Page manually with ROW_NUMBER() OVER(), which SQL Server
        // has supported since 2005.
        $query->selectRaw(
            'ROW_NUMBER() OVER (ORDER BY ptkformtransactions.id DESC) AS row_num, '
            . 'ptkformtransactions.id, ptkformtransactions.ptkform_id, ptkformtransactions.user_id, '
            . 'ptkformtransactions.status, ptkformtransactions.score_candidate, ptkformtransactions.ai_score, '
            . 'ptkformtransactions.created_at, ptkformtransactions.updated_at, '
            . 'users.name as user_name, users.ipk as user_ipk, users.cv as user_cv, '
            . 'jobtitles.jobtitle_name as jobtitle_name, datadiris.cities as cities, datadiris.provinces as provinces, '
            . 'latest_edu.instansi as edu_instansi'
        );

        $rows = DB::query()
            ->fromSub($query, 'numbered')
            ->whereBetween('row_num', [$start + 1, $start + $length])
            ->orderBy('row_num')
            ->get();

        $userIds = $rows->pluck('user_id')->unique();

        $experiences = DB::table('datapengalamankerjas')
            ->whereIn('user_id', $userIds)
            ->select(['user_id', 'date_start', 'date_end'])
            ->get()
            ->groupBy('user_id');

        $data = $rows->map(function ($row) use ($experiences) {
            return $this->formatRow($row, $experiences->get($row->user_id) ?? collect());
        })->values();

        return response()->json([
            'draw' => (int) $request->input('draw', 1),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data,
        ]);
    }

    /**
     * Base joined query for the "Riwayat Aktivitas" listing, with every
     * Filter Kandidat criterion applied at the database level.
     */
    private function buildFilteredQuery($status, Request $request)
    {
        $ptkformId = $request->input('ptkform_id');
        $gpa = $request->input('gpa');
        $education = $request->input('education');
        $experience = $request->input('experience');
        $university = $request->input('university');
        $domicile = $request->input('domicile');

        $latestEdu = DB::table('datapendidikanformals as e1')
            ->select('e1.user_id', 'e1.tingkat', 'e1.instansi')
            ->whereRaw('e1.id = (SELECT MAX(e2.id) FROM datapendidikanformals e2 WHERE e2.user_id = e1.user_id)');

        $expCount = DB::table('datapengalamankerjas')
            ->select('user_id', DB::raw('COUNT(*) as exp_count'))
            ->groupBy('user_id');

        return Ptkformtransaction::query()
            ->join('users', 'ptkformtransactions.user_id', '=', 'users.id')
            ->join('ptkforms', 'ptkformtransactions.ptkform_id', '=', 'ptkforms.id')
            ->leftJoin('jobtitles', 'ptkforms.jobtitle_id', '=', 'jobtitles.id')
            ->leftJoin('datadiris', 'users.id', '=', 'datadiris.user_id')
            ->leftJoinSub($latestEdu, 'latest_edu', 'users.id', '=', 'latest_edu.user_id')
            ->leftJoinSub($expCount, 'exp', 'users.id', '=', 'exp.user_id')
            ->when($status !== 'all', function ($q) use ($status) {
                return $q->where('ptkformtransactions.status', $status);
            })
            ->when($ptkformId, function ($q) use ($ptkformId) {
                return $q->where('ptkformtransactions.ptkform_id', $ptkformId);
            })
            // The "this year only" scope only makes sense for the global listing;
            // when a specific vacancy is targeted we want every applicant it ever had.
            ->when(!$ptkformId, function ($q) {
                return $q->where('ptkformtransactions.created_at', '>=', date('Y') . '-01-01 00:00:00');
            })
            ->when($gpa, function ($q) use ($gpa) {
                return $q->where('users.ipk', '>=', (float) $gpa);
            })
            ->when($university, function ($q) use ($university) {
                return $q->where('latest_edu.instansi', 'like', "%{$university}%");
            })
            ->when($domicile, function ($q) use ($domicile) {
                return $q->where(function ($qq) use ($domicile) {
                    $qq->where('datadiris.cities', 'like', "%{$domicile}%")
                        ->orWhere('datadiris.provinces', 'like', "%{$domicile}%");
                });
            })
            ->when($experience === 'Ya', function ($q) {
                return $q->where('exp.exp_count', '>', 0);
            })
            ->when($experience === 'Tidak', function ($q) {
                return $q->where(function ($qq) {
                    $qq->whereNull('exp.exp_count')->orWhere('exp.exp_count', 0);
                });
            })
            ->when($education, function ($q) use ($education) {
                return $q->where(function ($qq) use ($education) {
                    switch ($education) {
                        case 'SMA/SMK':
                            $qq->where('latest_edu.tingkat', 'like', '%SMA%')
                                ->orWhere('latest_edu.tingkat', 'like', '%SMK%')
                                ->orWhere('latest_edu.tingkat', 'like', '%SLTA%')
                                ->orWhere('latest_edu.tingkat', 'like', '%STM%');
                            break;
                        case 'D3':
                            $qq->where('latest_edu.tingkat', 'like', '%D3%');
                            break;
                        case 'S1/D4':
                            $qq->where('latest_edu.tingkat', 'like', '%S1%')
                                ->orWhere('latest_edu.tingkat', 'like', '%D4%');
                            break;
                        case 'S2':
                            $qq->where('latest_edu.tingkat', 'like', '%S2%');
                            break;
                    }
                });
            });
    }

    /**
     * Renders one row's cells (as HTML strings, mirroring the old Blade markup)
     * for the server-side DataTables response.
     */
    private function formatRow($row, $userExperiences)
    {
        $displayName = $row->user_name
            ? (strlen($row->user_name) > 20 ? substr($row->user_name, 0, 20) . '...' : $row->user_name)
            : '-';

        $created = \Carbon\Carbon::parse($row->created_at);
        $diffDays = $created->diffInDays(now());
        $daysClass = 'days-green';
        if ($diffDays > 7) $daysClass = 'days-yellow';
        if ($diffDays > 14) $daysClass = 'days-red';

        $eduInst = $row->edu_instansi ?: '-';

        $totalMonths = 0;
        foreach ($userExperiences as $exp) {
            $start = $exp->date_start ? \Carbon\Carbon::parse($exp->date_start) : null;
            $end = $exp->date_end ? \Carbon\Carbon::parse($exp->date_end) : \Carbon\Carbon::now();
            if ($start) {
                $months = $start->diffInMonths($end);
                if ($months > 0) {
                    $totalMonths += $months;
                }
            }
        }
        $expCount = $userExperiences->count();
        $duration = '-';
        if ($totalMonths > 0) {
            $years = floor($totalMonths / 12);
            $months = $totalMonths % 12;
            $duration = $years > 0 ? "{$years} Y {$months} M" : "{$months} Months";
        } elseif ($expCount > 0) {
            $duration = "{$expCount} Jobs";
        }

        $city = $row->cities ?? '';
        $province = $row->provinces ?? '';
        $domisiliFull = trim(implode(', ', array_filter([$city, $province])));
        if ($domisiliFull === '') $domisiliFull = '-';
        $domisiliShort = strlen($domisiliFull) > 20 ? substr($domisiliFull, 0, 20) . '...' : $domisiliFull;

        $score = $row->score_candidate ?? 0;
        $scoreClass = 'text-low';
        if ($score >= 80) $scoreClass = 'text-high';
        elseif ($score >= 60) $scoreClass = 'text-med';

        $statusVal = (int) $row->status;
        $statusBadgeClass = 'status-new';
        $statusLabel = 'New';
        if (in_array($statusVal, [1, 2, 3, 4, 5, 6])) {
            $statusBadgeClass = 'status-hold';
            $statusLabel = 'In Progress';
        } elseif (in_array($statusVal, [7, 8])) {
            $statusBadgeClass = 'status-approved';
            $statusLabel = 'Approved';
        } elseif ($statusVal === 9) {
            $statusBadgeClass = 'status-rejected';
            $statusLabel = 'Rejected';
        } elseif ($statusVal === 10) {
            $statusBadgeClass = 'status-hold';
            $statusLabel = 'On Hold';
        }

        $aiRevHtml = '<span class="text-muted">-</span>';
        if (!is_null($row->ai_score)) {
            $aiScore = (float) $row->ai_score;
            $aiScoreFormatted = number_format($aiScore, 2);
            if ($aiScore < 50) {
                $badgeStyle = 'color: #dc3545; background-color: #fde8e8; border: 1px solid #f8b4b4;';
            } elseif ($aiScore <= 70) {
                $badgeStyle = 'color: #856404; background-color: #fff3cd; border: 1px solid #ffeeba;';
            } elseif ($aiScore <= 85) {
                $badgeStyle = 'color: #198754; background-color: #e8f5e9; border: 1px solid #c3e6cb;';
            } else {
                $badgeStyle = 'color: #0f5132; background-color: #d1e7dd; border: 1px solid #badbcc;';
            }
            $aiRevHtml = '<span class="badge px-2 py-1 fw-bold" style="font-size: 0.65rem; ' . $badgeStyle . '"><i class="fas fa-robot me-1"></i> ' . $aiScoreFormatted . '</span>';
        }

        $cvHtml = '<span class="text-muted text-small">-</span>';
        if (!empty($row->user_cv)) {
            $cvHtml = '<a href="' . e(asset($row->user_cv)) . '" target="_blank" class="link-blue" title="View CV"><i class="fas fa-file-alt"></i></a>';
        }

        $experienceHtml = $expCount > 0
            ? '<span class="badge bg-light text-success border border-success px-2 py-1" style="font-size: 0.65rem;">Ya</span>'
            : '<span class="badge bg-light text-muted border px-2 py-1" style="font-size: 0.65rem;">Tidak</span>';

        return [
            'cb' => '<input type="checkbox">',
            'name' => '<a href="#" class="col-candidate" onclick="viewCandidate(' . (int) $row->user_id . ')" title="' . e($row->user_name ?? '-') . '">' . e($displayName) . '</a>',
            'cv' => $cvHtml,
            'last_modified' => \Carbon\Carbon::parse($row->updated_at)->format('d M Y'),
            'total_days' => '<span class="days-badge ' . $daysClass . '">' . $diffDays . ' hari</span>',
            'position' => e($row->jobtitle_name ?? '-'),
            'date_applied' => $created->format('d M Y'),
            'university' => e($eduInst),
            'gpa' => e($row->user_ipk ?? '-'),
            'experience' => $experienceHtml,
            'duration' => e($duration),
            'domicile' => '<span title="' . e($domisiliFull) . '">' . e($domisiliShort) . '</span>',
            'source' => '<span class="badge bg-light text-primary border border-primary px-2" style="font-size: 0.65rem;">Web</span>',
            'ai_rev' => $aiRevHtml,
            'score' => '<span class="badge-score ' . $scoreClass . '">' . $score . '/100</span>',
            'notes' => '<div class="editable-note text-muted text-small" data-id="' . (int) $row->id . '" title="Double click to edit">-</div>',
            'status' => '<span class="badge-status ' . $statusBadgeClass . '">' . $statusLabel . '</span>',
            'action' => '<div class="d-flex justify-content-center gap-1">'
                . '<button class="btn-icon btn-check btnApproveDirect" ptkformtrid="' . (int) $row->id . '" status="' . $statusVal . '" data-bs-toggle="tooltip" title="Approve & Next Stage"><i class="fas fa-arrow-right text-primary"></i></button>'
                . '<button class="btn-icon btnEditStatus" ptkformtrid="' . (int) $row->id . '" status="' . $statusVal . '" data-bs-toggle="tooltip" title="Update Status (Modal)"><i class="fas fa-edit text-secondary"></i></button>'
                . '<button class="btn-icon btn-clock btnHold" ptkformtrid="' . (int) $row->id . '" status="' . $statusVal . '" title="Hold"><i class="fas fa-clock"></i></button>'
                . '<button class="btn-icon btn-cross btnReject" ptkformtrid="' . (int) $row->id . '" status="' . $statusVal . '" title="Reject"><i class="fas fa-times"></i></button>'
                . '<button class="btn-icon btn-cross btnDeleteLamaran" ptkformtrid="' . (int) $row->id . '" title="Hapus Lamaran" style="border-color: #6c757d;"><i class="fas fa-trash text-danger"></i></button>'
                . '</div>',
        ];
    }

    /**
     * Lightweight vacancy list ("id" + "jobtitle_name") for the position filter dropdown.
     */
    private function getVacanciesForFilter()
    {
        return Cache::remember('ptkform_vacancies_filter_list', now()->addMinutes(self::DATA_CACHE_TTL_MINUTES), function () {
            return DB::table('ptkforms')
                ->leftJoin('jobtitles', 'ptkforms.jobtitle_id', '=', 'jobtitles.id')
                ->select(['ptkforms.id', 'jobtitles.jobtitle_name'])
                ->orderBy('jobtitles.jobtitle_name')
                ->get();
        });
    }

    /**
     * Distinct value lists (university, domicile) that back the Filter Kandidat dropdowns.
     * Sourced from the full table, not just the currently loaded page.
     */
    private function getFilterOptions()
    {
        return Cache::remember('ptkform_filter_options', now()->addMinutes(self::DATA_CACHE_TTL_MINUTES), function () {
            $universities = DB::table('datapendidikanformals')
                ->whereNotNull('instansi')
                ->where('instansi', '<>', '')
                ->distinct()
                ->orderBy('instansi')
                ->pluck('instansi');

            $cities = DB::table('datadiris')
                ->whereNotNull('cities')
                ->where('cities', '<>', '')
                ->distinct()
                ->orderBy('cities')
                ->pluck('cities');

            return [
                'universities' => $universities,
                'cities' => $cities,
            ];
        });
    }

    /**
     * JSON feed powering the "Riwayat Aktivitas" table.
     * Backed by the same cached, indexed query as dataByStatus().
     */
    public function dataJsonApi($status)
    {
        return response()->json($this->getQueryData($status));
    }

    /**
     * Invalidate the cached listing for all statuses (e.g. cron/manual warm-up trigger).
     */
    public function saveDataJson($specificStatuses = null)
    {
        $this->clearDataCache($specificStatuses);

        return response()->json(['message' => 'Cache invalidated, next request will rebuild it.']);
    }

    public function changeStatus(Request $request)
    {
        $status = 9; // Default Rejected
        if ($request->statusokornot == 'OK') {
            // Approve: Lanjut ke tahap berikutnya
            $status = $request->status + 1;
        } elseif ($request->statusokornot == 'HOLD') {
            $status = 10;
        }

        $data = Ptkformtransaction::where("id", $request->ptkformtrid)->firstOrFail();

        if ($data->pic == "") {
            $update["pic"] = Auth::user()->name;
        }

        $update["status"] = $status;

        // Log tanggal dan score untuk tahap ini
        if ($request->has('type') && $request->type) {
            $update[$request->type] = date("Y-m-d");
            $update["score_" . $request->type] = $request->score;
        }

        $data->update($update);

        Ptkformactivity::create([
            "user_id" => Auth::user()->id,
            "ptkformtransaction_id"  => $request->ptkformtrid,
            "keterangan"    => $request->keterangan
        ]);

        $this->clearDataCache([$request->status, $status]);

        AlertSuccess("Success", "Status berhasil diubah (Lanjut tahap berikutnya)");

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Status berhasil diubah']);
        }

        return redirect()->back();
    }

    public function updateNote(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:ptkformtransactions,id',
            'note' => 'nullable|string'
        ]);

        $transaction = Ptkformtransaction::findOrFail($request->id);
        // Assuming 'notes' column exists. If not, this needs a migration.
        // For now, we update it as if it exists.
        $transaction->notes = $request->note;
        $transaction->save();

        $this->clearDataCache([$transaction->status]);

        return response()->json(['success' => true, 'message' => 'Note updated successfully']);
    }

    /**
     * Delete lamaran (application) by admin.
     * Menghapus lamaran dan activity terkait.
     */
    public function deleteLamaran($id)
    {
        $ptkformtransaction = Ptkformtransaction::findOrFail($id);
        $status = $ptkformtransaction->status;

        // Hapus activity logs terkait
        Ptkformactivity::where('ptkformtransaction_id', $id)->delete();

        // Hapus lamaran
        $ptkformtransaction->delete();

        $this->clearDataCache([$status]);

        if (request()->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Lamaran berhasil dihapus']);
        }

        AlertSuccess("Terhapus", "Lamaran berhasil dihapus");
        return redirect()->back();
    }

    public function vacancyData($ptkform_id, $status = 'all')
    {
        // Just like dataByStatus(), the applicant table is populated via the
        // shared dataTableAjax endpoint (ptkform_id fixed), so this only
        // renders the shell. Some vacancies have 1000+ applicants, so eagerly
        // loading them all with nested relations here used to be very slow.
        $ptkform = \App\Models\Ptkform::with('jobtitle')->findOrFail($ptkform_id);

        $counts = $this->getVacancyStatusCounts($ptkform_id);

        $filterOptions = $this->getFilterOptions();

        return view('ptkformtransactions.vacancy_data', compact('ptkform_id', 'status', 'ptkform', 'counts', 'filterOptions'));
    }

    /**
     * Per-status applicant counts for one vacancy's tab badges.
     */
    private function getVacancyStatusCounts($ptkform_id)
    {
        $cacheKey = sprintf('ptkform_vacancy_counts_v%d_%s', $this->getCacheVersion(), $ptkform_id);

        return Cache::remember($cacheKey, now()->addMinutes(self::DATA_CACHE_TTL_MINUTES), function () use ($ptkform_id) {
            return Ptkformtransaction::where('ptkform_id', $ptkform_id)
                ->selectRaw('status, count(*) as total')
                ->groupBy('status')
                ->pluck('total', 'status')
                ->toArray();
        });
    }

    public function vacancyJson($ptkform_id, $status)
    {
        $ptkformtransactions = Ptkformtransaction::with([
            'user' => function ($q) {
                $q->with('latestEducation', 'datadiri', 'datapengalamankerja')
                    ->withCount('datapengalamankerja');
            },
            'ptkform.jobtitle'
        ])
            ->where('ptkform_id', $ptkform_id)
            ->when($status !== "all", function ($query) use ($status) {
                return $query->where("status", $status);
            })
            ->orderBy('id', 'desc')
            ->get();

        return response()->json($ptkformtransactions);
    }
}
