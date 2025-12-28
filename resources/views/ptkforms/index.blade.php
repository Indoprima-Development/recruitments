@extends('default')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="mb-0 fw-bold text-dark">PTK Forms Management</h4>
                <a href="{{ route('ptkforms.create') }}" class="btn btn-primary d-flex align-items-center gap-2 shadow-sm">
                    <i class="ti ti-plus"></i> Create New PTK
                </a>
            </div>

            <div class="card card-modern w-100 border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table id="example" class="table align-middle table-hover w-100" style="table-layout: fixed;">
                            <thead class="bg-light text-uppercase text-muted fs-2">
                                <tr>
                                    <th class="ps-4 rounded-start" style="width: 5%;">No</th>
                                    <th class="text-center" style="width: 10%;">Action</th>
                                    <th style="width: 25%;">Job Title</th>
                                    <th style="width: 25%;">Department / Division</th>
                                    <th style="width: 15%;">Section</th>
                                    <th style="width: 10%;">Status</th>
                                    <th class="text-center rounded-end" style="width: 10%;">Candidates</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ptkforms as $ptkform)
                                    <tr>
                                        <td class="ps-4 fw-semibold">{{ $loop->iteration }}</td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button class="btn btn-light btn-sm rounded-circle shadow-none"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ti ti-dots-vertical fs-5"></i>
                                                </button>
                                                <ul class="dropdown-menu border-0 shadow-lg">
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                                            href="{{ route('ptkforms.show', $ptkform->id) }}">
                                                            <i class="ti ti-eye text-info fs-4"></i> View Details
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                                            href="{{ route('ptkforms.edit', $ptkform->id) }}">
                                                            <i class="ti ti-edit text-warning fs-4"></i> Edit Vacancy
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('ptkforms.destroy', $ptkform->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="dropdown-item d-flex align-items-center gap-2 py-2 text-danger confirm-delete">
                                                                <i class="ti ti-archive fs-4"></i> Close/Hide
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column text-wrap">
                                                <h6 class="mb-0 fw-bold text-dark text-break">
                                                    {{ $ptkform->jobtitle->jobtitle_name ?? '-' }}</h6>
                                                <small class="text-muted">ID: {{ $ptkform->id }}</small>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column text-wrap">
                                                <span
                                                    class="fw-semibold text-dark text-break">{{ $ptkform->department->department_name ?? '-' }}</span>
                                                <span
                                                    class="text-muted small text-break">{{ $ptkform->division->division_name ?? '-' }}</span>
                                            </div>
                                        </td>
                                        <td class="text-wrap">
                                            <span class="text-break">{{ $ptkform->section->section_name ?? '-' }}</span>
                                        </td>
                                        <td>
                                            @if ($ptkform->status == 1)
                                                <span
                                                    class="badge bg-success-subtle text-success fw-bold rounded-pill px-3 py-2">Open</span>
                                            @elseif($ptkform->status == 0)
                                                <span
                                                    class="badge bg-danger-subtle text-danger fw-bold rounded-pill px-3 py-2">Closed</span>
                                            @else
                                                <span
                                                    class="badge bg-warning-subtle text-warning fw-bold rounded-pill px-3 py-2">Draft</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center justify-content-center gap-2">
                                                <span
                                                    class="badge bg-primary rounded-circle p-2 d-flex align-items-center justify-content-center"
                                                    style="width: 32px; height: 32px; font-size: 12px;">
                                                    {{ $ptkform->count_candidate }}
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('addJs')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "order": [],
                "language": {
                    "search": "",
                    "searchPlaceholder": "Search vacancies...",
                    "lengthMenu": "_MENU_ per page"
                },
                "dom": '<"d-flex justify-content-between align-items-center mb-3"fl>rt<"d-flex justify-content-between align-items-center mt-3"ip>'
            });

            // Custom styling for Datatables
            $('.dataTables_filter input').addClass('form-control shadow-sm border-0 bg-light my-1');
            $('.dataTables_length select').addClass('form-select shadow-sm border-0 bg-light my-1');

            // Allow sweetalert confirmation
            $('.confirm-delete').click(function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                Swal.fire({
                    title: 'Close this vacancy?',
                    text: "It will be hidden from the public job board.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, close it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                })
            });
        });
    </script>
    <style>
        .card-modern {
            background: white;
            border-radius: 16px;
        }

        .table thead th {
            font-weight: 600;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #f1f5f9;
            background-color: #f8fafc;
        }

        .table tbody td {
            vertical-align: middle;
            padding: 1rem 0.75rem;
            border-bottom: 1px solid #f8fafc;
        }

        .table-hover tbody tr:hover {
            background-color: #f8fafc;
        }

        .btn-light {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
        }

        .btn-light:hover {
            background: #e2e8f0;
        }
    </style>
@endsection
