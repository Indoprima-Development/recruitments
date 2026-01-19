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
            width: 100% !important;
            border-collapse: separate;
            border-spacing: 0;
        }

        #recruitmentTable thead th {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #b2bec3;
            font-weight: 700;
            padding: 12px 10px;
            border-bottom: 1px solid var(--border-light);
            background: #fff;
            white-space: nowrap;
        }

        #recruitmentTable tbody td {
            font-size: 0.78rem;
            /* Small text */
            padding: 8px 10px;
            color: #2d3436;
            vertical-align: middle;
            border-bottom: 1px solid #f1f2f6;
            white-space: nowrap;
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
    </style>
@endsection

@section('content2')
    <div class="card-custom">
        <div class="row mb-4 align-items-center">
            <div class="col">
                <h4>Riwayat Aktivitas</h4>
                <p class="text-muted text-small mb-0">Kelola dan pantau proses recruitment kandidat</p>
            </div>
        </div>

        <!-- Custom Tabs -->
        <div class="tabs-container mb-4 overflow-auto">
            <div class="d-flex flex-nowrap gap-2 pb-2">
                @php
                    $tabs = [
                        ['id' => 'all', 'label' => 'Semua', 'icon' => 'ti ti-file'],
                        ['id' => '0', 'label' => 'Lamaran (CV Masuk)', 'icon' => 'ti ti-file-text'],
                        ['id' => '1', 'label' => 'Interview HC', 'icon' => 'ti ti-users'],
                        ['id' => '3', 'label' => 'Interview User', 'icon' => 'ti ti-user-check'],
                        ['id' => '2', 'label' => 'Psikotes', 'icon' => 'ti ti-brain'],
                        ['id' => '4', 'label' => 'Interview Direksi', 'icon' => 'ti ti-building-skyscraper'],
                        ['id' => '6', 'label' => 'MCU', 'icon' => 'ti ti-heart-rate-monitor'],
                        ['id' => '5', 'label' => 'Offering', 'icon' => 'ti ti-cash'],
                        ['id' => '7', 'label' => 'Masuk (Join)', 'icon' => 'ti ti-user-plus'],
                    ];
                    // Mapping "Interview Committee" if needed, but current specific codes are 0-7.
                    // Assuming standard flow: 0=CV, 1=HC, 2=Psiko, 3=User, 4=Dir, 5=Final/Offer, 6=MCU, 7=Join
                    // Note: In controller previously: 0=CV, 1=HC, 2=Psiko, 3=User, 4=Dir, 5=Final, 6=MCU, 7=Join
                    // So tabs above match mostly.
                @endphp

                @foreach ($tabs as $tab)
                    @php
                        $isActive =
                            (isset($status) && $status == $tab['id']) ||
                            (!isset($status) && $tab['id'] == 'all') ||
                            (isset($status) && $status == 'all' && $tab['id'] == 'all');
                        $activeClass = $isActive ? 'bg-primary text-white shadow-sm' : 'bg-white text-muted border';
                    @endphp
                    <a href="{{ url('ptkformtransactions/' . $tab['id'] . '/data') }}"
                        class="text-decoration-none px-3 py-2 rounded-pill d-flex align-items-center gap-2 text-small fw-bold {{ $activeClass }}"
                        style="white-space: nowrap; transition: all 0.2s;">
                        <i class="{{ $tab['icon'] }}"></i> {{ $tab['label'] }}
                        @if ($isActive)
                            <!-- Badge count could go here if we had counts passed from controller -->
                        @endif
                    </a>
                @endforeach
            </div>
        </div>

        <table id="recruitmentTable" class="stripe row-border order-column" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center" width="20"><input type="checkbox"></th>
                    <th>Date Applied</th>
                    <th>Last Modified</th>
                    <th>Total Days</th>
                    <th>Posisi</th>
                    <th>Nama</th>
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
                        // Calculate days
                        $created = \Carbon\Carbon::parse($item->created_at);
                        $updated = \Carbon\Carbon::parse($item->updated_at);
                        $diffDays = $created->diffInDays(now());

                        $daysClass = 'days-green';
                        if ($diffDays > 7) {
                            $daysClass = 'days-yellow';
                        }
                        if ($diffDays > 14) {
                            $daysClass = 'days-red';
                        }

                        // Experience logic
                        $expCount = $item->user->datapengalamankerja_count ?? 0;
                        $hasExp = $expCount > 0;

                        // Duration (placeholder logic: sum of years?)
                        // For display purpose using random or real if available.
                        // We will try to sum up duration if we had start/end dates, but let's just show count "X Exp" for now or "-"
$duration = $expCount > 0 ? $expCount . ' Jobs' : '-';

// Education
$lastEdu = $item->user->latestEducation;
$uni = $lastEdu ? $lastEdu->instansi : '-';

// Status
$statusBadge = 'status-new';
$statusLabel = 'New';
switch ($item->status) {
    case 0:
        $statusBadge = 'status-new';
        $statusLabel = 'New';
        break;
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
    case 6:
        $statusBadge = 'status-hold';
        $statusLabel = 'In Progress';
        break;
    case 7:
    case 8:
        $statusBadge = 'status-approved';
        $statusLabel = 'Approved';
        break;
    case 9:
        $statusBadge = 'status-rejected';
        $statusLabel = 'Rejected';
        break;
}

$score = $item->score_candidate ?? 0;
$scoreClass = 'text-low';
if ($score >= 80) {
    $scoreClass = 'text-high';
} elseif ($score >= 60) {
    $scoreClass = 'text-med';
}

$domisili = $item->user->datadiri->alamat_domisili ?? ($item->user->datadiri->kota_ktp ?? '-');

                        // Truncate Name to 20 chars
                        $displayName = \Illuminate\Support\Str::limit($item->user->name, 20);
                    @endphp
                    <tr>
                        <td class="text-center"><input type="checkbox"></td>
                        <td>{{ $created->format('d M Y') }}</td>
                        <td>{{ $updated->format('d M Y') }}</td>
                        <td><span class="days-badge {{ $daysClass }}">{{ $diffDays }} hari</span></td>
                        <td class="col-position">{{ $item->ptkform->jobtitle->jobtitle_name ?? '-' }}</td>
                        <td>
                            <a href="#" class="col-candidate" onclick="viewCandidate({{ $item->id }})"
                                title="{{ $item->user->name }}">
                                {{ $displayName }}
                            </a>
                        </td>
                        <td title="{{ $uni }}">{{ \Illuminate\Support\Str::limit($uni, 25) }}</td>
                        <td class="text-center">{{ $item->user->ipk ?? '-' }}</td>
                        <td class="text-center">
                            @if ($hasExp)
                                <span class="badge bg-light text-success border border-success px-2 py-1"
                                    style="font-size: 0.65rem;">Ya</span>
                            @else
                                <span class="badge bg-light text-muted border px-2 py-1"
                                    style="font-size: 0.65rem;">Tidak</span>
                            @endif
                        </td>
                        <td>{{ $duration }}</td>
                        <td title="{{ $domisili }}">{{ \Illuminate\Support\Str::limit($domisili, 15) }}</td>
                        <td class="text-center">
                            <span class="badge bg-light text-primary border border-primary px-2"
                                style="font-size: 0.65rem;">Web</span>
                        </td>
                        <td class="text-center">
                            <a href="#" class="link-blue"><i class="fas fa-eye me-1"></i> View</a>
                        </td>
                        <td class="text-center">
                            <a href="#" class="link-blue text-success"><i class="fas fa-robot me-1"></i> Check</a>
                        </td>
                        <td class="text-center">
                            <span class="badge-score {{ $scoreClass }}">{{ $score }}/100</span>
                        </td>
                        <td><span class="text-muted">-</span></td>
                        <td class="text-center">
                            <span class="badge-status {{ $statusBadge }}">{{ $statusLabel }}</span>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center">
                                <button class="btn-icon btn-check btnEditStatus" ptkformtrid="{{ $item->id }}"
                                    status="{{ $item->status }}" types="approve" data-bs-toggle="tooltip"
                                    title="Approve / Next Stage"><i class="fas fa-check"></i></button>
                                <button class="btn-icon btn-clock" title="Hold"><i class="fas fa-clock"></i></button>
                                <button class="btn-icon btn-cross" title="Reject"><i class="fas fa-times"></i></button>
                            </div>
                        </td>
                    </tr>

                    <!-- Include Modal Trigger Logic inside loop is not efficient for DOM but standard in this project structure -->
                    <!-- We will use a shared modal outside -->
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
                <form method="POST" action="{{ url('ptkformtransactions/change-status') }}">
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

    <script>
        $(document).ready(function() {
            var table = $('#recruitmentTable').DataTable({
                paging: false,
                scrollY: '600px',
                scrollCollapse: true,
                scrollX: true,
                fixedColumns: {
                    start: 2 // Fix checkbox and date
                },
                language: {
                    search: "",
                    searchPlaceholder: "Cari kandidat, universitas, posisi...",
                    info: "Showing _TOTAL_ candidates"
                },
                columnDefs: [{
                        orderable: false,
                        targets: [0, 17]
                    } // Disable sort for checkbox and action
                ]
            });

            // Status Edit Click
            $(document).on("click", ".btnEditStatus", function() {
                var tr = $(this).closest('tr');
                var name = tr.find('.col-candidate').text().trim();
                var id = $(this).attr('ptkformtrid');
                var status = $(this).attr('status');

                $('#ptkformtridModalEditStatus').val(id);
                $('#statusModalEditStatus').val(status);
                $('#nameModalEditStatus').val(name);

                // Determine next step type based on status
                var types = ['cv_review', 'interview_hc', 'psikotest', 'interview_user',
                    'interview_direksi', 'finalisasi', 'mcu', 'join'
                ];
                var currentStatusIdx = parseInt(status);
                var nextType = types[currentStatusIdx] || 'udpate';

                $('#typeModalEditStatus').val(nextType);

                $('#modalEditStatus').modal('show');
            });
        });

        function viewCandidate(id) {
            // Check if there is a route for showing user detail
            // Based on previous code:
            window.location.href = "{{ url('datadiris/data-users') }}/" + id;
        }
    </script>
@endsection
