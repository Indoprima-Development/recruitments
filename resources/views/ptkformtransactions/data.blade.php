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
        /* Table Styling */
        #recruitmentTable {
            width: 100% !important;
            border-collapse: collapse;
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
            /* Small text */
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

        /* Loading Overlay */
        #loadingOverlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.85);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            backdrop-filter: blur(2px);
        }

        .loading-spinner {
            width: 3rem;
            height: 3rem;
            border-width: 0.25em;
        }
    </style>
@endsection

@section('content2')
    <!-- Loading Overlay -->
    <div id="loadingOverlay">
        <div class="spinner-border text-primary loading-spinner" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="mt-3 fw-bold text-primary">Memuat Data...</div>
    </div>

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

        <!-- Filters -->
        <div class="row mb-3 g-2">
            <div class="col-md-3">
                <select id="filterGpa" class="form-select text-small">
                    <option value="">All GPA</option>
                    <option value="3.50">GPA >= 3.50</option>
                </select>
            </div>
            <div class="col-md-3">
                <select id="filterUniversity" class="form-select text-small">
                    <option value="">All Universities</option>
                    <!-- Populated by JS -->
                </select>
            </div>
            <div class="col-md-3">
                <select id="filterExperience" class="form-select text-small">
                    <option value="">All Experience</option>
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </select>
            </div>
            <div class="col-md-3">
                <select id="filterDomicile" class="form-select text-small">
                    <option value="">All Domiciles</option>
                    <!-- Populated by JS -->
                </select>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pako/2.1.0/pako.min.js"></script>

    <script>
        $(document).ready(function() {
            console.log("PTKForm Transaction Script Loaded");

            // Custom Filtering Function for GPA
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var minGpa = parseFloat($('#filterGpa').val());
                    var gpa = parseFloat(data[7]) || 0;
                    if (!isNaN(minGpa) && gpa < minGpa) {
                        return false;
                    }
                    return true;
                }
            );

            var table = $('#recruitmentTable').DataTable({
                paging: false,
                deferRender: true,
                scrollY: '60vh',
                scrollCollapse: true,
                scrollX: true,
                autoWidth: false,
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
                    // Adjust columns after init
                    this.api().columns.adjust();
                }
            });

            // Fetch and Render Data
            var status = "{{ $status }}";
            var dataUrl = "{{ asset('data/ptkformtransactions-') }}" + status + ".json.gz?t=" + new Date()
                .getTime();

            // Show loading
            $('#loadingOverlay').fadeIn(200);

            fetch(dataUrl)
                .then(response => response.arrayBuffer())
                .then(buffer => {
                    try {
                        // Decompress
                        const decompressed = pako.inflate(buffer);
                        const stringData = new TextDecoder().decode(decompressed);
                        const jsonData = JSON.parse(stringData);

                        populateTable(jsonData);
                    } catch (err) {
                        console.error("Error processing data:", err);
                        alert("Failed to load data. Please try again.");
                    }
                })
                .catch(err => {
                    console.error("Fetch error:", err);
                    alert("Failed to fetch data.");
                })
                .finally(() => {
                    // Hide loading
                    $('#loadingOverlay').fadeOut(300);
                });


            function populateTable(data) {
                table.clear();

                var rows = [];

                data.forEach(item => {
                    // Logic Logic Logic
                    var user = item.user || {};
                    var ptkform = item.ptkform || {};
                    var jobtitle = ptkform.jobtitle || {};
                    var latestEducation = user.latest_education ||
                    {}; // Note: JSON might have snake_case depending on serialization or relation name.
                    // Eloquent `latestEducation` relation usually serializes as `latest_education` key if appended, or `latestEducation` if loaded?
                    // Actually standard serialization uses snake_case for attributes, but camelCase for relations?
                    // Wait, `json_encode` on model uses `toArray()`. `toArray()` converts keys to snake_case usually.
                    // Let's check: `latestEducation` relation. In array it becomes `latest_education` if it's following convention.
                    // But if it was `with('latestEducation')`, the key in array is `latest_education`.

                    var eduInst = latestEducation ? latestEducation.instansi : '-';
                    // User name
                    var displayName = user.name ? (user.name.length > 20 ? user.name.substring(0, 20) +
                        '...' : user.name) : '-';
                    var uniName = eduInst;

                    // Date Diff
                    var created = new Date(item.created_at);
                    var updated = new Date(item.updated_at);
                    var now = new Date();
                    var diffTime = Math.abs(now - created);
                    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

                    var daysClass = 'days-green';
                    if (diffDays > 7) daysClass = 'days-yellow';
                    if (diffDays > 14) daysClass = 'days-red';

                    // Formats
                    var dateFormat = {
                        day: '2-digit',
                        month: 'short',
                        year: 'numeric'
                    };
                    var createdStr = created.toLocaleDateString('en-GB', dateFormat);
                    var updatedStr = updated.toLocaleDateString('en-GB', dateFormat);

                    // Posisi
                    var position = jobtitle.jobtitle_name || '-';

                    // GPA
                    var gpa = user.ipk || '-';

                    // Experience
                    var expCount = user.datapengalamankerja_count || 0;
                    var hasExp = expCount > 0;
                    var expBadge = hasExp ?
                        '<span class="badge bg-light text-success border border-success px-2 py-1" style="font-size: 0.65rem;">Ya</span>' :
                        '<span class="badge bg-light text-muted border px-2 py-1" style="font-size: 0.65rem;">Tidak</span>';

                    var duration = expCount > 0 ? expCount + ' Jobs' : '-';

                    // Domicile
                    var datadiri = user.datadiri || {};
                    var domisili = datadiri.alamat_domisili || datadiri.kota_ktp || '-';
                    var domisiliShort = domisili.length > 15 ? domisili.substring(0, 15) + '...' : domisili;

                    // Source - static 'Web'
                    var sourceBadge =
                        '<span class="badge bg-light text-primary border border-primary px-2" style="font-size: 0.65rem;">Web</span>';

                    // CV
                    var cvLink = user.cv ?
                        '<a href="{{ asset('') }}' + user.cv +
                        '" target="_blank" class="link-blue"><i class="fas fa-eye me-1"></i> View</a>' :
                        '<span class="text-muted text-small">-</span>';

                    // Score
                    var score = item.score_candidate || 0;
                    var scoreClass = 'text-low';
                    if (score >= 80) scoreClass = 'text-high';
                    else if (score >= 60) scoreClass = 'text-med';
                    var scoreBadge = '<span class="badge-score ' + scoreClass + '">' + score +
                        '/100</span>';

                    // Notes
                    var noteText = item.notes || '-';
                    var noteHtml =
                        `<div class="editable-note text-muted text-small" data-id="${item.id}" title="Double click to edit">${noteText}</div>`;

                    // Status
                    var status = parseInt(item.status);
                    var statusBadgeClass = 'status-new';
                    var statusLabel = 'New';
                    if ([1, 2, 3, 4, 5, 6].includes(status)) {
                        statusBadgeClass = 'status-hold';
                        statusLabel = 'In Progress';
                    } else if ([7, 8].includes(status)) {
                        statusBadgeClass = 'status-approved';
                        statusLabel = 'Approved';
                    } else if (status === 9) {
                        statusBadgeClass = 'status-rejected';
                        statusLabel = 'Rejected';
                    }
                    var statusHtml = '<span class="badge-status ' + statusBadgeClass + '">' + statusLabel +
                        '</span>';

                    // Actions
                    var actions = `
                        <div class="d-flex justify-content-center gap-1">
                            <button class="btn-icon btn-check btnApproveDirect" ptkformtrid="${item.id}" status="${item.status}" data-bs-toggle="tooltip" title="Approve & Next Stage"><i class="fas fa-arrow-right text-primary"></i></button>
                            <button class="btn-icon btnEditStatus" ptkformtrid="${item.id}" status="${item.status}" data-bs-toggle="tooltip" title="Update Status (Modal)"><i class="fas fa-edit text-secondary"></i></button>
                            <button class="btn-icon btn-clock btnHold" ptkformtrid="${item.id}" status="${item.status}" title="Hold"><i class="fas fa-clock"></i></button>
                            <button class="btn-icon btn-cross btnReject" ptkformtrid="${item.id}" status="${item.status}" title="Reject"><i class="fas fa-times"></i></button>
                        </div>
                    `;

                    // Checkbox
                    var checkbox = '<div class="text-center"><input type="checkbox"></div>';

                    // Name Link
                    var nameLink =
                        `<a href="#" class="col-candidate" onclick="viewCandidate(${item.user_id})" title="${user.name}">${displayName}</a>`;

                    // Add Row Data (Must match column order!)
                    // 0: Checkbox
                    // 1: Name
                    // 2: Modified
                    // 3: Total Days
                    // 4: Position
                    // 5: Date Applied
                    // 6: University
                    // 7: GPA
                    // 8: Experience
                    // 9: Duration
                    // 10: Domicile
                    // 11: Source
                    // 12: CV
                    // 13: AI Rev
                    // 14: Score
                    // 15: Notes
                    // 16: Status
                    // 17: Action

                    rows.push([
                        checkbox,
                        nameLink,
                        updatedStr,
                        `<span class="days-badge ${daysClass}">${diffDays} hari</span>`,
                        position,
                        createdStr,
                        `<span title="${eduInst}">${uniName}</span>`,
                        gpa,
                        expBadge,
                        duration,
                        `<span title="${domisili}">${domisiliShort}</span>`,
                        sourceBadge,
                        cvLink,
                        '<a href="#" class="link-blue text-success"><i class="fas fa-robot me-1"></i> Check</a>',
                        scoreBadge,
                        noteHtml,
                        statusHtml,
                        actions
                    ]);
                });

                table.rows.add(rows).draw();

                // Adjust columns to fix alignment issues
                table.columns.adjust();

                // Extra adjustment for FixedColumns and ScrollY
                setTimeout(function() {
                    table.columns.adjust();
                }, 200);

                populateFilters();
            }

            function populateFilters() {
                // Populate University Filter
                var uniColumn = table.column(6);
                var uniSelect = $('#filterUniversity');
                uniSelect.empty().append('<option value="">All Universities</option>');

                uniColumn.data().unique().sort().each(function(d, j) {
                    var val = $.fn.dataTable.util.escapeRegex(d);
                    var text = $('<div>').html(val).text(); // stripping html
                    if (text.trim() !== '' && text !== '-') {
                        uniSelect.append('<option value="' + text + '">' + text + '</option>');
                    }
                });

                // Populate Domicile Filter
                var domColumn = table.column(10);
                var domSelect = $('#filterDomicile');
                domSelect.empty().append('<option value="">All Domiciles</option>');

                domColumn.data().unique().sort().each(function(d, j) {
                    var val = $.fn.dataTable.util.escapeRegex(d);
                    var text = $('<div>').html(val).text();
                    if (text.trim() !== '' && text !== '-') {
                        domSelect.append('<option value="' + text + '">' + text + '</option>');
                    }
                });
            }


            // Listeners
            $('#filterGpa').on('change', function() {
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

            $(window).on('resize', function() {
                table.columns.adjust();
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
                var nextType = types[currentStatusIdx] || 'udpate';

                $('#typeModalEditStatus').val(nextType);
                $('#modalEditStatus').modal('show');
            });

            // Global function for viewCandidate
            window.viewCandidate = function(id) {
                window.location.href = "{{ url('datadiris/data-users') }}/" + id;
            };

            // Double click to edit note
            $(document).on('dblclick', '.editable-note', function() {
                var $this = $(this);
                if ($this.find('input').length > 0) return; // Already editing

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

                        // Save via AJAX
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
                        // Remove row from DataTable
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
                        // Remove row from DataTable
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
                        // Remove row from DataTable
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
                        // Find and remove the row
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
        });
    </script>
@endsection
