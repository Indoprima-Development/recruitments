@extends('default')

@section('addCss')
    <link id="themeColors" rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" />
    <link id="themeColors" rel="stylesheet"
        href="https://cdn.datatables.net/fixedcolumns/5.0.1/css/fixedColumns.dataTables.min.css" />
    <style>
        :root {
            --primary-blue: #0066cc;
            --success-green: #00b894;
            --warning-orange: #f39c12;
            --danger-red: #e74c3c;
            --text-grey: #636e72;
            --border-light: #dfe6e9;
        }

        body {
            font-family: 'Inter', 'Segoe UI', sans-serif;
            background-color: #f8fbff;
        }

        /* Card & Layout */
        .card-custom {
            background: #fff;
            border-radius: 8px;
            border: 1px solid #eef2f6;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
            padding: 1rem;
        }

        /* Typography */
        h4 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #2d3436;
        }

        .text-small {
            font-size: 0.75rem !important;
            /* ~12px */
        }

        .text-medium {
            font-size: 0.8125rem !important;
            /* ~13px */
        }

        /* Table Styling */
        #recruitmentTable {
            border-collapse: collapse;
            margin: 0 auto;
        }

        #recruitmentTable thead th {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #b2bec3;
            font-weight: 700;
            padding: 12px 10px;
            border-bottom: 1px solid var(--border-light);
            border-right: 1px solid var(--border-light);
            background: #fff;
            white-space: nowrap;
            box-sizing: border-box;
        }

        #recruitmentTable tbody td {
            font-size: 0.78rem;
            padding: 8px 10px;
            color: #2d3436;
            vertical-align: middle;
            border-bottom: 1px solid #f1f2f6;
            border-right: 1px solid #f1f2f6;
            white-space: nowrap;
            box-sizing: border-box;
        }

        #recruitmentTable tbody tr:hover {
            background-color: #f9fbfd;
        }

        /* Columns specific */
        .col-candidate {
            color: var(--primary-blue);
            font-weight: 600;
        }

        .col-position {
            font-weight: 500;
            color: #2d3436;
        }

        /* Badges */
        .badge-score {
            font-weight: 700;
            font-size: 0.75rem;
        }

        .text-high {
            color: #00b894;
        }

        .text-med {
            color: #f39c12;
        }

        .text-low {
            color: #e74c3c;
        }

        .badge-status {
            padding: 4px 10px;
            border-radius: 50px;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: capitalize;
        }

        .status-new {
            background: #e3f2fd;
            color: #2196f3;
        }

        .status-approved {
            background: #e6fffa;
            color: #00b894;
        }

        .status-hold {
            background: #fff7ed;
            color: #f39c12;
        }

        .status-rejected {
            background: #fff5f5;
            color: #e74c3c;
        }

        /* Days Badge */
        .days-badge {
            font-weight: 600;
            font-size: 0.7rem;
            padding: 2px 6px;
            border-radius: 4px;
        }

        .days-green {
            color: #00b894;
            background: #e6fffa;
        }

        .days-yellow {
            color: #f39c12;
            background: #fff7ed;
        }

        .days-red {
            color: #e74c3c;
            background: #fff5f5;
        }

        .editable-note {
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .editable-note:hover {
            background-color: #f1f2f6;
        }

        .btn-icon {
            border: none;
            background: transparent;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.2s;
            margin: 0 2px;
        }

        .btn-icon:hover {
            background: #f1f2f6;
        }

        .btn-check {
            color: #00b894;
            border: 1px solid #00b894;
        }

        .btn-clock {
            color: #f39c12;
            border: 1px solid #f39c12;
        }

        .btn-cross {
            color: #e74c3c;
            border: 1px solid #e74c3c;
        }

        .link-blue {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.75rem;
        }

        .link-blue:hover {
            text-decoration: underline;
        }

        /* Custom Scrollbar for the table container */
        .dataTables_scrollBody::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        .dataTables_scrollBody::-webkit-scrollbar-thumb {
            background: #dfe6e9;
            border-radius: 4px;
        }

        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 10px;
        }

        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #dfe6e9;
            border-radius: 20px;
            padding: 5px 15px;
            font-size: 13px;
            width: 250px;
        }

        /* Sticky Header Fixes */
        .table-responsive,
        .dataTables_wrapper,
        .dataTables_scroll {
            overflow: visible !important;
        }

        .dataTables_scrollHead {
            position: -webkit-sticky !important;
            position: sticky !important;
            top: 70px !important;
            z-index: 1000 !important;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        table.dataTable thead th,
        table.dataTable tbody td {
            white-space: nowrap !important;
            box-sizing: border-box !important;
            vertical-align: middle;
        }

        .dataTables_scrollHeadInner,
        .dataTables_scrollHeadInner table,
        .dataTables_scrollBody table {
            width: 100% !important;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endsection

@section('content2')
    <div class="card-custom">
        <div class="row mb-4 align-items-center">
            <div class="col">
                <a href="{{ url('vacancies/' . $ptkform_id) }}" class="text-decoration-none text-muted mb-2 d-inline-block text-small">
                    <i class="ti ti-arrow-left me-1"></i> Kembali ke Detail Lowongan
                </a>
                <h4>Pelamar: {{ $ptkform->jobtitle->jobtitle_name }}</h4>
                <p class="text-muted text-small mb-0">Kelola dan pantau pelamar untuk lowongan ini</p>
            </div>
        </div>

        <!-- Custom Tabs -->
        <div class="tabs-container mb-4 overflow-auto">
            <div class="d-flex flex-nowrap gap-2 pb-2">
                @php
                    $tabs = [
                        ['id' => 'all', 'label' => 'Semua', 'icon' => 'ti ti-file', 'count' => array_sum($counts)],
                        ['id' => '0', 'label' => 'Lamaran (CV Masuk)', 'icon' => 'ti ti-file-text', 'count' => $counts['0'] ?? 0],
                        ['id' => '1', 'label' => 'Interview HC', 'icon' => 'ti ti-users', 'count' => $counts['1'] ?? 0],
                        ['id' => '3', 'label' => 'Interview User', 'icon' => 'ti ti-user-check', 'count' => $counts['3'] ?? 0],
                        ['id' => '2', 'label' => 'Psikotes', 'icon' => 'ti ti-brain', 'count' => $counts['2'] ?? 0],
                        ['id' => '4', 'label' => 'Interview Direksi', 'icon' => 'ti ti-building-skyscraper', 'count' => $counts['4'] ?? 0],
                        ['id' => '6', 'label' => 'MCU', 'icon' => 'ti ti-heart-rate-monitor', 'count' => $counts['6'] ?? 0],
                        ['id' => '5', 'label' => 'Offering', 'icon' => 'ti ti-cash', 'count' => $counts['5'] ?? 0],
                        ['id' => '7', 'label' => 'Masuk (Join)', 'icon' => 'ti ti-user-plus', 'count' => $counts['7'] ?? 0],
                    ];
                @endphp

                @foreach ($tabs as $tab)
                    @php
                        $isActive =
                            (isset($status) && $status == $tab['id']) ||
                            (!isset($status) && $tab['id'] == 'all') ||
                            (isset($status) && $status == 'all' && $tab['id'] == 'all');
                        $activeClass = $isActive ? 'bg-primary text-white shadow-sm' : 'bg-white text-muted border';
                        
                        // Red badge for active counts, light for zero counts
                        $badgeBgClass = $tab['count'] > 0 ? 'bg-danger text-white' : 'bg-light text-muted border';
                    @endphp
                    <a href="{{ url('ptkformtransactions/vacancy/' . $ptkform_id . '/' . $tab['id'] . '/data') }}"
                        class="text-decoration-none px-3 py-2 rounded-pill d-flex align-items-center gap-2 text-small fw-bold {{ $activeClass }}"
                        style="white-space: nowrap; transition: all 0.2s;">
                        <i class="{{ $tab['icon'] }}"></i> {{ $tab['label'] }}
                        <span class="badge rounded-pill {{ $badgeBgClass }}" 
                              style="font-size: 0.65rem; padding: 2.5px 6.5px; font-weight: 800;">
                            {{ $tab['count'] }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Filters -->
        <div class="filter-bar mb-3 p-3" style="background: #f8fafc; border-radius: 10px; border: 1px solid #eef2f6;">
            <div class="d-flex align-items-center gap-2 mb-2">
                <i class="ti ti-filter text-primary" style="font-size: 1rem;"></i>
                <span class="fw-bold text-small text-muted text-uppercase" style="letter-spacing: 0.5px;">Filter
                    Kandidat</span>
            </div>
            <div class="row g-2">
                <div class="col-6 col-md">
                    <select id="filterGpa" class="form-select form-select-sm text-small"
                        style="border-radius: 8px; border-color: #dfe6e9;">
                        <option value="">📊 Semua GPA</option>
                        <option value="3.50">GPA ≥ 3.50</option>
                        <option value="3.00">GPA ≥ 3.00</option>
                    </select>
                </div>
                <div class="col-6 col-md">
                    <select id="filterUniversity" class="form-select form-select-sm text-small"
                        style="border-radius: 8px; border-color: #dfe6e9;">
                        <option value="">🏫 Semua Universitas</option>
                    </select>
                </div>
                <div class="col-6 col-md">
                    <select id="filterEducation" class="form-select form-select-sm text-small"
                        style="border-radius: 8px; border-color: #dfe6e9;">
                        <option value="">🎓 Semua Pendidikan</option>
                        <option value="SMA/SMK">SMA / SMK</option>
                        <option value="D3">D3</option>
                        <option value="S1/D4">S1 / D4</option>
                        <option value="S2">S2</option>
                    </select>
                </div>
                <div class="col-6 col-md">
                    <select id="filterExperience" class="form-select form-select-sm text-small"
                        style="border-radius: 8px; border-color: #dfe6e9;">
                        <option value="">💼 Semua Pengalaman</option>
                        <option value="Ya">Berpengalaman</option>
                        <option value="Tidak">Tanpa Pengalaman</option>
                    </select>
                </div>
                <div class="col-6 col-md">
                    <select id="filterDomicile" class="form-select form-select-sm text-small"
                        style="border-radius: 8px; border-color: #dfe6e9;">
                        <option value="">📍 Semua Domisili</option>
                    </select>
                </div>
                <div class="col-6 col-md">
                    <select id="filterPosition" class="form-select form-select-sm text-small"
                        style="border-radius: 8px; border-color: #dfe6e9;">
                        <option value="">🎯 Semua Posisi</option>
                    </select>
                </div>
            </div>
        </div>

        <table id="recruitmentTable" class="stripe row-border order-column" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center"><input type="checkbox"></th>
                    <th>Nama</th>
                    <th>Last Modified</th>
                    <th>Total Days</th>
                    <th>Posisi</th>
                    <th>Date Applied</th>
                    <th>Universitas</th>
                    <th class="text-center">GPA</th>
                    <th class="text-center">Pengalaman</th>
                    <th>Durasi</th>
                    <th>Domisili</th>
                    <th class="text-center">Source</th>
                    <th class="text-center">CV</th>
                    <th class="text-center">AI Rev</th>
                    <th class="text-center">Score</th>
                    <th>Notes</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ptkformtransactions as $item)
                    @php
                        $user = $item->user ?? null;
                        
                        // Name Display
                        $displayName = $user && $user->name ? (strlen($user->name) > 20 ? substr($user->name, 0, 20) . '...' : $user->name) : '-';

                        // Days Calculation
                        $created = \Carbon\Carbon::parse($item->created_at);
                        $diffDays = $created->diffInDays(now());
                        $daysClass = 'days-green';
                        if ($diffDays > 7) $daysClass = 'days-yellow';
                        if ($diffDays > 14) $daysClass = 'days-red';

                        // Education
                        $latestEdu = $user->latestEducation ?? null;
                        $eduLevel = $latestEdu->tingkat ?? '';
                        $eduInst = $latestEdu->instansi ?? '-';

                        // Experience Duration Calculation
                        $totalMonths = 0;
                        if ($user) {
                            $experiences = $user->datapengalamankerja ?? collect();
                            foreach($experiences as $exp) {
                                $start = $exp->tgl_masuk ? \Carbon\Carbon::parse($exp->tgl_masuk) : ($exp->start_date ? \Carbon\Carbon::parse($exp->start_date) : null);
                                $end = $exp->tgl_keluar ? \Carbon\Carbon::parse($exp->tgl_keluar) : ($exp->end_date ? \Carbon\Carbon::parse($exp->end_date) : \Carbon\Carbon::now());
                                if ($start && $end) {
                                    $months = $start->diffInMonths($end);
                                    if ($months > 0) {
                                        $totalMonths += $months;
                                    }
                                }
                            }
                        }
                        $duration = '-';
                        if ($totalMonths > 0) {
                            $years = floor($totalMonths / 12);
                            $months = $totalMonths % 12;
                            if ($years > 0) {
                                $duration = $years . ' Y ' . $months . ' M';
                            } else {
                                $duration = $months . ' Months';
                            }
                        } elseif ($user && ($user->datapengalamankerja_count ?? 0) > 0) {
                            $duration = $user->datapengalamankerja_count . ' Jobs';
                        }

                        // Domicile
                        $datadiri = $user->datadiri ?? null;
                        $city = $datadiri->cities ?? $datadiri->kota_ktp ?? '';
                        $province = $datadiri->provinces ?? '';
                        $domisiliFull = '';
                        if ($city) $domisiliFull .= $city;
                        if ($city && $province) $domisiliFull .= ', ';
                        if ($province) $domisiliFull .= $province;
                        if (!$domisiliFull) $domisiliFull = '-';
                        $domisiliShort = strlen($domisiliFull) > 20 ? substr($domisiliFull, 0, 20) . '...' : $domisiliFull;

                        // Score
                        $score = $item->score_candidate ?? 0;
                        $scoreClass = 'text-low';
                        if ($score >= 80) $scoreClass = 'text-high';
                        elseif ($score >= 60) $scoreClass = 'text-med';

                        // Status
                        $statusVal = (int)$item->status;
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
                    @endphp
                    <tr>
                        <td class="text-center"><input type="checkbox"></td>
                        <td>
                            <a href="#" class="col-candidate" onclick="viewCandidate({{ $item->user_id }})" title="{{ $user->name ?? '-' }}">{{ $displayName }}</a>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('d M Y') }}</td>
                        <td><span class="days-badge {{ $daysClass }}">{{ $diffDays }} hari</span></td>
                        <td>{{ $item->ptkform->jobtitle->jobtitle_name ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
                        <td>
                            <span class="edu-level d-none">{{ $eduLevel }}</span>
                            <span title="{{ $eduInst }}">{{ $eduInst }}</span>
                        </td>
                        <td class="text-center">{{ $user->ipk ?? '-' }}</td>
                        <td class="text-center">
                            @if($user && ($user->datapengalamankerja_count ?? 0) > 0)
                                <span class="badge bg-light text-success border border-success px-2 py-1" style="font-size: 0.65rem;">Ya</span>
                            @else
                                <span class="badge bg-light text-muted border px-2 py-1" style="font-size: 0.65rem;">Tidak</span>
                            @endif
                        </td>
                        <td>{{ $duration }}</td>
                        <td><span title="{{ $domisiliFull }}">{{ $domisiliShort }}</span></td>
                        <td class="text-center">
                            <span class="badge bg-light text-primary border border-primary px-2" style="font-size: 0.65rem;">Web</span>
                        </td>
                        <td class="text-center">
                            @if($user && !empty($user->cv))
                                <a href="{{ asset($user->cv) }}" target="_blank" class="link-blue"><i class="fas fa-eye me-1"></i> View</a>
                            @else
                                <span class="text-muted text-small">-</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if(!is_null($item->ai_score))
                                @php
                                    $aiScore = (float)$item->ai_score;
                                    $aiScoreFormatted = number_format($aiScore, 2);
                                    if ($aiScore < 50) {
                                        // merah (red)
                                        $badgeStyle = 'color: #dc3545; background-color: #fde8e8; border: 1px solid #f8b4b4;';
                                    } elseif ($aiScore <= 70) {
                                        // kuning (yellow)
                                        $badgeStyle = 'color: #856404; background-color: #fff3cd; border: 1px solid #ffeeba;';
                                    } elseif ($aiScore <= 85) {
                                        // hijau muda (light green)
                                        $badgeStyle = 'color: #198754; background-color: #e8f5e9; border: 1px solid #c3e6cb;';
                                    } else {
                                        // hijau tua (dark green)
                                        $badgeStyle = 'color: #0f5132; background-color: #d1e7dd; border: 1px solid #badbcc;';
                                    }
                                @endphp
                                <span class="badge px-2 py-1 fw-bold" style="font-size: 0.65rem; {{ $badgeStyle }}">
                                    <i class="fas fa-robot me-1"></i> {{ $aiScoreFormatted }}
                                </span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <span class="badge-score {{ $scoreClass }}">{{ $score }}/100</span>
                        </td>
                        <td>
                            <div class="editable-note text-muted text-small" data-id="{{ $item->id }}" title="Double click to edit">
                                {{ $item->notes ?? '-' }}
                            </div>
                        </td>
                        <td class="text-center">
                            <span class="badge-status {{ $statusBadgeClass }}">{{ $statusLabel }}</span>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <button class="btn-icon btn-check btnApproveDirect" ptkformtrid="{{ $item->id }}" status="{{ $item->status }}" data-bs-toggle="tooltip" title="Approve & Next Stage"><i class="fas fa-arrow-right text-primary"></i></button>
                                <button class="btn-icon btnEditStatus" ptkformtrid="{{ $item->id }}" status="{{ $item->status }}" data-bs-toggle="tooltip" title="Update Status (Modal)"><i class="fas fa-edit text-secondary"></i></button>
                                <button class="btn-icon btn-clock btnHold" ptkformtrid="{{ $item->id }}" status="{{ $item->status }}" title="Hold"><i class="fas fa-clock"></i></button>
                                <button class="btn-icon btn-cross btnReject" ptkformtrid="{{ $item->id }}" status="{{ $item->status }}" title="Reject"><i class="fas fa-times"></i></button>
                                <button class="btn-icon btn-cross btnDeleteLamaran" ptkformtrid="{{ $item->id }}" title="Hapus Lamaran" style="border-color: #6c757d;"><i class="fas fa-trash text-danger"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Shared Modal -->
    <div class="modal fade" id="modalEditStatus" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title">Update Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formEditStatus">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="ptkformtrid" id="ptkformtridModalEditStatus">
                        <input type="hidden" name="status" id="statusModalEditStatus">
                        <input type="hidden" name="type" id="typeModalEditStatus">

                        <div class="mb-3">
                            <label class="form-label">Candidate Name</label>
                            <input type="text" id="nameModalEditStatus" class="form-control" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Decision</label>
                            <select name="statusokornot" class="form-select">
                                <option value="OK">Approve (Next Stage)</option>
                                <option value="NOT OK">Reject</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Score</label>
                            <input type="number" name="score" class="form-control" min="0" max="100"
                                value="0">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" name="keterangan" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('addJs')
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/5.0.1/js/dataTables.fixedColumns.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            // Init Select2 on Filters
            $('#filterUniversity').select2({
                theme: 'bootstrap-5',
                width: '100%',
                placeholder: "Cari Universitas...",
                allowClear: true
            });

            $('#filterDomicile').select2({
                theme: 'bootstrap-5',
                width: '100%',
                placeholder: "Cari Domisili...",
                allowClear: true
            });

            console.log("Vacancy PTKForm Transaction Script Loaded - Server Side Data");

            // Custom Filtering Function for GPA and Education
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    // GPA Filter
                    var minGpa = parseFloat($('#filterGpa').val());
                    var gpa = parseFloat(data[7]) || 0;
                    if (!isNaN(minGpa) && gpa < minGpa) {
                        return false;
                    }

                    // Education Filter
                    var filterEdu = $('#filterEducation').val();
                    if (filterEdu) {
                        var cellText = data[6].toUpperCase(); // column 6 is University / Education

                        if (filterEdu === 'SMA/SMK') {
                            if (!(cellText.includes('SMA') || cellText.includes('SMK') || cellText.includes(
                                    'SLTA') || cellText.includes('STM'))) return false;
                        } else if (filterEdu === 'S1/D4') {
                            if (!(cellText.includes('S1') || cellText.includes('D4'))) return false;
                        } else {
                            if (!cellText.includes(filterEdu.toUpperCase())) return false;
                        }
                    }

                    // Position Filter
                    var filterPos = $('#filterPosition').val();
                    if (filterPos) {
                        var posText = data[4] || ""; // column 4 is Position
                        if (posText !== filterPos) {
                            return false;
                        }
                    }

                    return true;
                }
            );

            // Trigger search when Position changes
            $('#filterPosition').on('change', function() {
                table.draw();
            });

            var table = $('#recruitmentTable').DataTable({
                paging: false,
                deferRender: true,
                scrollX: true,
                fixedColumns: {
                    start: 2
                },
                language: {
                    search: "",
                    searchPlaceholder: "Cari kandidat, universitas, posisi...",
                    info: "Showing _TOTAL_ candidates"
                },
                columnDefs: [{
                        orderable: false,
                        targets: [0, 17]
                    },
                    {
                        width: '30px',
                        targets: 0
                    }
                ],
                initComplete: function() {
                    this.api().columns.adjust();
                }
            });

            // Adjust columns on window resize
            $(window).on('resize', function() {
                table.columns.adjust();
            });

            // Populate filters and adjust columns after render
            populateFilters();
            table.columns.adjust();
            setTimeout(function() {
                table.columns.adjust();
            }, 200);

            function populateFilters() {
                var uniColumn = table.column(6);
                var uniSelect = $('#filterUniversity');
                uniSelect.html('<option value="">All Universities</option>');

                var uniData = [];
                uniColumn.data().unique().sort().each(function(d, j) {
                    var tmp = document.createElement("DIV");
                    tmp.innerHTML = d;
                    var hiddenLevel = tmp.querySelector('.edu-level');
                    if (hiddenLevel) hiddenLevel.remove();

                    var text = tmp.textContent || tmp.innerText || "";
                    text = text.trim();

                    if (text !== '' && text !== '-') {
                        uniData.push(text);
                    }
                });

                uniData = [...new Set(uniData)].sort();
                uniData.forEach(function(text) {
                    uniSelect.append(new Option(text, text));
                });


                var domColumn = table.column(10);
                var domSelect = $('#filterDomicile');
                domSelect.html('<option value="">All Domiciles</option>');

                var domData = [];
                domColumn.data().unique().sort().each(function(d, j) {
                    var tmp = document.createElement("DIV");
                    tmp.innerHTML = d;
                    var text = tmp.textContent || tmp.innerText || "";
                    text = text.trim();

                    if (text !== '' && text !== '-') {
                        domData.push(text);
                    }
                });

                domData = [...new Set(domData)].sort();
                domData.forEach(function(text) {
                    domSelect.append(new Option(text, text));
                });

                var posColumn = table.column(4);
                var posSelect = $('#filterPosition');
                posSelect.html('<option value="">All Positions</option>');

                var posData = [];
                posColumn.data().unique().sort().each(function(d, j) {
                    var tmp = document.createElement("DIV");
                    tmp.innerHTML = d;
                    var text = tmp.textContent || tmp.innerText || "";
                    text = text.trim();

                    if (text !== '' && text !== '-') {
                        posData.push(text);
                    }
                });

                posData = [...new Set(posData)].sort();
                posData.forEach(function(text) {
                    posSelect.append(new Option(text, text));
                });
            }


            // Listeners for triggers
            $('#filterGpa').on('change', function() {
                table.draw();
            });

            $('#filterEducation').on('change', function() {
                table.draw();
            });

            $('#filterUniversity').on('change', function() {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                table.column(6).search(val ? val : '', true, false).draw();
            });

            $('#filterExperience').on('change', function() {
                var val = $(this).val();
                table.column(8).search(val).draw();
            });

            $('#filterDomicile').on('change', function() {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                table.column(10).search(val ? val : '', true, false).draw();
            });

            $(document).on("click", ".btnEditStatus", function() {
                var tr = $(this).closest('tr');
                var name = tr.find('.col-candidate').text().trim();
                var id = $(this).attr('ptkformtrid');
                var status = $(this).attr('status');

                $('#ptkformtridModalEditStatus').val(id);
                $('#statusModalEditStatus').val(status);
                $('#nameModalEditStatus').val(name);

                var types = ['cv_review', 'interview_hc', 'psikotest', 'interview_user',
                    'interview_direksi', 'finalisasi', 'mcu', 'join'
                ];
                var currentStatusIdx = parseInt(status);
                var nextType = types[currentStatusIdx] || 'update';

                $('#typeModalEditStatus').val(nextType);
                $('#modalEditStatus').modal('show');
            });

            window.viewCandidate = function(id) {
                window.location.href = "{{ url('datadiris/data-users') }}/" + id;
            };

            // Double click to edit note
            $(document).on('dblclick', '.editable-note', function() {
                var $this = $(this);
                if ($this.find('input').length > 0) return;

                var currentText = $this.text().trim();
                if (currentText === '-') currentText = '';

                var id = $this.data('id');
                var input = $(
                        '<input type="text" class="form-control form-control-sm" style="width: 150px;">')
                    .val(currentText)
                    .on('blur keypress', function(e) {
                        if (e.type === 'keypress' && e.which !== 13) return;

                        var newNote = $(this).val();
                        var $container = $(this).parent();

                        $.ajax({
                            url: "{{ url('ptkformtransactions/update-note') }}",
                            method: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: id,
                                note: newNote
                            },
                            success: function(response) {
                                $container.text(newNote || '-');
                            },
                            error: function() {
                                alert('Failed to save note');
                                $container.text(currentText || '-');
                            }
                        });
                    });

                $this.empty().append(input);
                input.focus();
            });

            // Direct Approve Button
            $(document).on('click', '.btnApproveDirect', function(e) {
                e.preventDefault();
                if (!confirm('Are you sure you want to approve and move to next stage?')) return;

                var id = $(this).attr('ptkformtrid');
                var currentStatus = $(this).attr('status');
                var $row = $(this).closest('tr');

                $.ajax({
                    url: "{{ url('ptkformtransactions/change-status') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        ptkformtrid: id,
                        status: currentStatus,
                        statusokornot: 'OK',
                        keterangan: 'Direct Approved',
                        score: 0
                    },
                    success: function(response) {
                        table.row($row).remove().draw();
                    },
                    error: function() {
                        alert('Failed to approve');
                    }
                });
            });

            // Hold Button
            $(document).on('click', '.btnHold', function(e) {
                e.preventDefault();
                var reason = prompt('Reason for holding this candidate?');
                if (!reason) return;

                var id = $(this).attr('ptkformtrid');
                var currentStatus = $(this).attr('status');
                var $row = $(this).closest('tr');

                $.ajax({
                    url: "{{ url('ptkformtransactions/change-status') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        ptkformtrid: id,
                        status: currentStatus,
                        statusokornot: 'HOLD',
                        keterangan: 'On Hold: ' + reason,
                        score: 0
                    },
                    success: function(response) {
                        table.row($row).remove().draw();
                    },
                    error: function() {
                        alert('Failed to hold');
                    }
                });
            });

            // Reject Button
            $(document).on('click', '.btnReject', function(e) {
                e.preventDefault();
                if (!confirm('Are you sure you want to REJECT this candidate?')) return;

                var reason = prompt('Reason for rejection?');
                if (!reason) return;

                var id = $(this).attr('ptkformtrid');
                var currentStatus = $(this).attr('status');
                var $row = $(this).closest('tr');

                $.ajax({
                    url: "{{ url('ptkformtransactions/change-status') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        ptkformtrid: id,
                        status: currentStatus,
                        statusokornot: 'NOT OK',
                        keterangan: 'Rejected: ' + reason,
                        score: 0
                    },
                    success: function(response) {
                        table.row($row).remove().draw();
                    },
                    error: function() {
                        alert('Failed to reject');
                    }
                });
            });

            // Handle Review Modal Submission via AJAX
            $('#formEditStatus').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                var btn = $(this).find('button[type="submit"]');
                var originalText = btn.text();
                var ptkformtrid = $('#ptkformtridModalEditStatus').val();

                btn.prop('disabled', true).text('Saving...');

                $.ajax({
                    url: "{{ url('ptkformtransactions/change-status') }}",
                    method: "POST",
                    data: formData,
                    success: function(response) {
                        $('#modalEditStatus').modal('hide');
                        var $row = $('.btnEditStatus[ptkformtrid="' + ptkformtrid + '"]')
                            .closest('tr');
                        table.row($row).remove().draw();
                    },
                    error: function(xhr) {
                        alert('Failed to update status');
                        console.error(xhr);
                    },
                    complete: function() {
                        btn.prop('disabled', false).text(originalText);
                    }
                });
            });

            // Delete Lamaran Button
            $(document).on('click', '.btnDeleteLamaran', function(e) {
                e.preventDefault();
                if (!confirm(
                        'Apakah anda yakin ingin MENGHAPUS lamaran ini? Data tidak dapat dikembalikan!'))
                    return;

                var id = $(this).attr('ptkformtrid');
                var $row = $(this).closest('tr');

                $.ajax({
                    url: "{{ url('ptkformtransactions') }}/" + id + "/delete-lamaran",
                    method: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        table.row($row).remove().draw();
                    },
                    error: function() {
                        alert('Gagal menghapus lamaran');
                    }
                });
            });
        });
    </script>
@endsection
