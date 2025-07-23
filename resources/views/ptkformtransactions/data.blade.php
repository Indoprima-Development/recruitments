@extends('default')

@section('addCss')
    <link id="themeColors" rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" />
    <link id="themeColors" rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.min.css" />
    <style>
        :root {
            --primary-color: #3a7bd5;
            --secondary-color: #00d2ff;
            --card-bg: #ffffff;
            --text-dark: #2c3e50;
            --text-light: #7f8c8d;
            --border-color: #e0e6ed;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: var(--text-dark);
        }

        .card-header-gradient {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 8px 8px 0 0 !important;
        }

        .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s;
        }

        .breadcrumb-item a:hover {
            color: white;
            text-decoration: underline;
        }

        .breadcrumb-item.active {
            color: white;
        }

        .table-container {
            background: var(--card-bg);
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-top: 20px;
        }

        #recruitmentTable {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }

        #recruitmentTable thead th {
            background-color: #f8f9fa;
            color: var(--text-dark);
            font-weight: 600;
            border-bottom: 2px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        #recruitmentTable tbody tr {
            transition: all 0.2s;
        }

        #recruitmentTable tbody tr:hover {
            background-color: #f8fafc;
        }

        #recruitmentTable td,
        #recruitmentTable th {
            padding: 12px 15px;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
        }

        .status-btn {
            border: none;
            border-radius: 20px;
            padding: 5px 12px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 80px;
        }

        .status-btn i {
            margin-right: 5px;
        }

        .status-btn-pending {
            background-color: #fff4e5;
            color: #f2994a;
        }

        .status-btn-completed {
            background-color: #e6f7ee;
            color: #27ae60;
        }

        .status-btn-rejected {
            background-color: #fde8e8;
            color: #eb5757;
        }

        .candidate-link {
            color: var(--primary-color);
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s;
        }

        .candidate-link:hover {
            color: #2c5db1;
            text-decoration: underline;
        }

        .score-badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
            min-width: 40px;
            text-align: center;
        }

        .score-high {
            background-color: #e3f5ff;
            color: #0066cc;
        }

        .score-medium {
            background-color: #fff8e6;
            color: #ff9500;
        }

        .score-low {
            background-color: #ffebee;
            color: #d32f2f;
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 8px 8px 0 0;
        }

        .dataTables_wrapper .dt-buttons {
            margin-bottom: 20px;
        }

        .fixed-column {
            background-color: white;
            z-index: 1;
        }

        @media (max-width: 768px) {
            .table-container {
                padding: 10px;
            }

            #recruitmentTable td,
            #recruitmentTable th {
                padding: 8px 10px;
            }
        }
    </style>
@endsection

@section('cardClass')
@endsection

@section('content2')
    <div class="card card-header-gradient shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-2 text-white">Recruitment Dashboard</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-white-50" href="./index.html">Dashboard</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Recruitment Pipeline</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3 text-end">
                    <i class="fas fa-users fa-3x opacity-25"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="table-container">
        <table id="recruitmentTable" class="table display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Candidate</th>
                    <th>Position</th>
                    <th>University</th>
                    <th>Major</th>
                    <th>PIC</th>
                    <th>GPA</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ptkformtransactions as $i => $ptkformtransaction)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>
                            @if ($ptkformtransaction->user)
                                <a href="{{ url('datadiris/data-users', $ptkformtransaction->user->id) }}"
                                    class="candidate-link">
                                    {{ $ptkformtransaction->user->name }}
                                </a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if ($ptkformtransaction->ptkform)
                                {{ $ptkformtransaction->ptkform->jobtitle->jobtitle_name ?? '-' }}
                            @else
                                -
                            @endif
                        </td>

                        <?php
                        $a = $ptkformtransaction->user->datapendidikanformal ?? [];
                        ?>

                        @if (count($a) > 0)
                            <td>{{ $ptkformtransaction->user->datapendidikanformal[count($a) - 1]->instansi }}</td>
                            <td>{{ $ptkformtransaction->user->datapendidikanformal[count($a) - 1]->jurusan }}</td>
                        @else
                            <td>-</td>
                            <td>-</td>
                        @endif
                        <td>{{ $ptkformtransaction->pic }}</td>
                        <td>
                            <span
                                class="score-badge @if (($ptkformtransaction->user->ipk ?? 0) >= 3.5) score-high @elseif(($ptkformtransaction->user->ipk ?? 0) >= 3.0) score-medium @else score-low @endif">
                                {{ $ptkformtransaction->user->ipk ?? '-' }}
                            </span>
                        </td>
                        <td>
                            @php
                                $statusText = '';
                                $statusClass = '';
                                switch ($ptkformtransaction->status) {
                                    case 0:
                                        $statusText = 'CV Review';
                                        $statusClass = 'status-btn-pending';
                                        break;
                                    case 1:
                                        $statusText = 'HC Interview';
                                        $statusClass = 'status-btn-pending';
                                        break;
                                    case 2:
                                        $statusText = 'Psikotest';
                                        $statusClass = 'status-btn-pending';
                                        break;
                                    case 3:
                                        $statusText = 'User Interview';
                                        $statusClass = 'status-btn-pending';
                                        break;
                                    case 4:
                                        $statusText = 'Director Interview';
                                        $statusClass = 'status-btn-pending';
                                        break;
                                    case 5:
                                        $statusText = 'Finalization';
                                        $statusClass = 'status-btn-pending';
                                        break;
                                    case 6:
                                        $statusText = 'MCU';
                                        $statusClass = 'status-btn-pending';
                                        break;
                                    case 7:
                                        $statusText = 'Joining';
                                        $statusClass = 'status-btn-pending';
                                        break;
                                    default:
                                        $statusText = 'Completed';
                                        $statusClass = 'status-btn-completed';
                                }
                            @endphp
                            <span class="status-btn {{ $statusClass }}">
                                <i class="fas fa-circle-notch"></i> {{ $statusText }}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#candidateModal{{ $ptkformtransaction->id }}">
                                <i class="fas fa-eye"></i> View
                            </button>
                        </td>
                    </tr>

                    <!-- Candidate Detail Modal -->
                    <div class="modal fade" id="candidateModal{{ $ptkformtransaction->id }}" tabindex="-1"
                        aria-labelledby="candidateModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="candidateModalLabel">Candidate Details -
                                        {{ $ptkformtransaction->user->name ?? 'N/A' }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="fw-semibold">Basic Information</h6>
                                            <ul class="list-unstyled">
                                                <li class="mb-2"><strong>Position:</strong>
                                                    {{ $ptkformtransaction->ptkform->jobtitle->jobtitle_name ?? '-' }}</li>
                                                <li class="mb-2"><strong>University:</strong>
                                                    {{ count($a) > 0 ? $ptkformtransaction->user->datapendidikanformal[count($a) - 1]->instansi : '-' }}
                                                </li>
                                                <li class="mb-2"><strong>Major:</strong>
                                                    {{ count($a) > 0 ? $ptkformtransaction->user->datapendidikanformal[count($a) - 1]->jurusan : '-' }}
                                                </li>
                                                <li class="mb-2"><strong>GPA:</strong>
                                                    {{ $ptkformtransaction->user->ipk ?? '-' }}</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="fw-semibold">Physical Attributes</h6>
                                            <ul class="list-unstyled">
                                                <li class="mb-2"><strong>Height:</strong>
                                                    {{ $ptkformtransaction->user->tinggi_badan ?? '-' }} cm</li>
                                                <li class="mb-2"><strong>Weight:</strong>
                                                    {{ $ptkformtransaction->user->berat_badan ?? '-' }} kg</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <hr>

                                    <h6 class="fw-semibold">Recruitment Progress</h6>
                                    <div class="progress-container">
                                        <div class="progress mb-3" style="height: 10px;">
                                            @php
                                                $progress = ($ptkformtransaction->status + 1) * 12.5;
                                            @endphp
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                style="width: {{ $progress }}%" aria-valuenow="{{ $progress }}"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col">
                                                <small
                                                    class="d-block {{ $ptkformtransaction->status >= 0 ? 'text-primary fw-bold' : 'text-muted' }}">CV
                                                    Review</small>
                                                <small>{{ $ptkformtransaction->cv_review != null ? substr($ptkformtransaction->cv_review, 0, 10) : '-' }}</small>
                                            </div>
                                            <div class="col">
                                                <small
                                                    class="d-block {{ $ptkformtransaction->status >= 1 ? 'text-primary fw-bold' : 'text-muted' }}">HC
                                                    Intv</small>
                                                <small>{{ $ptkformtransaction->interview_hc != null ? substr($ptkformtransaction->interview_hc, 0, 10) : '-' }}</small>
                                            </div>
                                            <div class="col">
                                                <small
                                                    class="d-block {{ $ptkformtransaction->status >= 2 ? 'text-primary fw-bold' : 'text-muted' }}">Psikotest</small>
                                                <small>{{ $ptkformtransaction->psikotest != null ? substr($ptkformtransaction->psikotest, 0, 10) : '-' }}</small>
                                            </div>
                                            <div class="col">
                                                <small
                                                    class="d-block {{ $ptkformtransaction->status >= 3 ? 'text-primary fw-bold' : 'text-muted' }}">User
                                                    Intv</small>
                                                <small>{{ $ptkformtransaction->interview_user != null ? substr($ptkformtransaction->interview_user, 0, 10) : '-' }}</small>
                                            </div>
                                            <div class="col">
                                                <small
                                                    class="d-block {{ $ptkformtransaction->status >= 4 ? 'text-primary fw-bold' : 'text-muted' }}">Director
                                                    Intv</small>
                                                <small>{{ $ptkformtransaction->interview_direksi != null ? substr($ptkformtransaction->interview_direksi, 0, 10) : '-' }}</small>
                                            </div>
                                            <div class="col">
                                                <small
                                                    class="d-block {{ $ptkformtransaction->status >= 5 ? 'text-primary fw-bold' : 'text-muted' }}">Finalization</small>
                                                <small>{{ $ptkformtransaction->finalisasi != null ? substr($ptkformtransaction->finalisasi, 0, 10) : '-' }}</small>
                                            </div>
                                            <div class="col">
                                                <small
                                                    class="d-block {{ $ptkformtransaction->status >= 6 ? 'text-primary fw-bold' : 'text-muted' }}">MCU</small>
                                                <small>{{ $ptkformtransaction->mcu != null ? substr($ptkformtransaction->mcu, 0, 10) : '-' }}</small>
                                            </div>
                                            <div class="col">
                                                <small
                                                    class="d-block {{ $ptkformtransaction->status >= 7 ? 'text-primary fw-bold' : 'text-muted' }}">Join</small>
                                                <small>{{ $ptkformtransaction->join != null ? substr($ptkformtransaction->join, 0, 10) : '-' }}</small>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="fw-semibold">Scores</h6>
                                            <ul class="list-unstyled">
                                                <li class="mb-2"><strong>Candidate Score:</strong>
                                                    <span
                                                        class="score-badge @if (($ptkformtransaction->score_candidate ?? 0) >= 80) score-high @elseif(($ptkformtransaction->score_candidate ?? 0) >= 60) score-medium @else score-low @endif">
                                                        {{ $ptkformtransaction->score_candidate ?? 0 }}
                                                    </span>
                                                </li>
                                                <li class="mb-2"><strong>Technical Test:</strong>
                                                    {{ $ptkformtransaction->score_technical_test ?? '-' }}</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            @if ($ptkformtransaction->status < 7)
                                                <button ptkformtrid="{{ $ptkformtransaction->id }}"
                                                    status="{{ $ptkformtransaction->status }}" type="button"
                                                    types="@php
switch($ptkformtransaction->status) {
                                                                case 0: echo 'cv_review'; break;
                                                                case 1: echo 'interview_hc'; break;
                                                                case 2: echo 'psikotest'; break;
                                                                case 3: echo 'interview_user'; break;
                                                                case 4: echo 'interview_direksi'; break;
                                                                case 5: echo 'finalisasi'; break;
                                                                case 6: echo 'mcu'; break;
                                                                case 7: echo 'join'; break;
                                                            } @endphp"
                                                    class="btnEditStatus btn btn-primary">
                                                    <i class="fas fa-edit me-2"></i>Update Status
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Status Update Modal -->
    <div class="modal fade" id="modalEditStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <b>Update Recruitment Status</b>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ url('ptkformtransactions/change-status') }}">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="ptkformtrid" id="ptkformtridModalEditStatus">
                        <input type="hidden" name="status" id="statusModalEditStatus">
                        <input type="hidden" name="type" id="typeModalEditStatus">

                        <div class="mb-3">
                            <label class="form-label">Candidate</label>
                            <input type="text" id="nameModalEditStatus" class="form-control" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="statusokornot" class="form-select">
                                <option value="OK" selected>Approved</option>
                                <option value="NOT OK">Rejected</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Score</label>
                            <input type="number" value="0" name="score" class="form-control" min="0"
                                max="100">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" name="keterangan" rows="3" placeholder="Add any additional notes..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('addJs')
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/5.0.4/js/dataTables.fixedColumns.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            var table = $('#recruitmentTable').DataTable({
                scrollX: true,
                scrollY: '60vh',
                paging: false,
                scrollCollapse: true,
                scrollCollapse: true,
                fixedColumns: {
                    start: 3,
                },
                dom: '<"top"Bf>rt<"bottom"lip><"clear">',
                buttons: [{
                        extend: 'copy',
                        className: 'btn btn-sm btn-outline-secondary'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-sm btn-outline-primary'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm btn-outline-success'
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-sm btn-outline-danger'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-sm btn-outline-info'
                    }
                ],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search candidates...",
                },
                initComplete: function() {
                    $('.dataTables_filter input').addClass('form-control');
                    $('.dt-buttons button').removeClass('dt-button');
                }
            });

            // Make the first column sticky
            new $.fn.dataTable.FixedColumns(table, {
                leftColumns: 3
            });

            $(".btnEditStatus").on("click", function() {
                $('#typeModalEditStatus').val($(this).attr('types'));
                $('#ptkformtridModalEditStatus').val($(this).attr('ptkformtrid'));
                $('#statusModalEditStatus').val($(this).attr('status'));
                $('#nameModalEditStatus').val($(this).closest('.modal-content').find('.modal-title').text()
                    .replace('Candidate Details - ', ''));
                $('#modalEditStatus').modal('show');
            });
        });
    </script>
@endsection
