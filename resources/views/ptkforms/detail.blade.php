@extends('default')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-1 fw-bold text-dark">Vacancy Details</h4>
                    <p class="text-muted mb-0">Reviewing Position: <span
                            class="text-primary fw-bold">{{ $ptkform->jobtitle->jobtitle_name }}</span></p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('ptkforms.index') }}" class="btn btn-outline-secondary d-flex align-items-center gap-2">
                        <i class="ti ti-arrow-left"></i> Back to List
                    </a>
                    <a href="{{ route('ptkforms.edit', $ptkform->id) }}"
                        class="btn btn-warning d-flex align-items-center gap-2">
                        <i class="ti ti-edit"></i> Edit
                    </a>
                </div>
            </div>

            <div class="row">
                <!-- Left Info Column -->
                <div class="col-lg-8">
                    <div class="card card-modern border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-4">
                                <div>
                                    <h3 class="mb-1 fw-bold">{{ $ptkform->jobtitle->jobtitle_name }}</h3>
                                    <span
                                        class="badge {{ $ptkform->status == 1 ? 'bg-success-subtle text-success' : ($ptkform->status == 0 ? 'bg-danger-subtle text-danger' : 'bg-warning-subtle text-warning') }} rounded-pill px-3 py-1">
                                        {{ $ptkform->status == 1 ? 'Open' : ($ptkform->status == 0 ? 'Closed' : 'Draft') }}
                                    </span>
                                </div>
                                <div class="text-end">
                                    <span class="d-block text-muted small">Created on</span>
                                    <span
                                        class="fw-semibold">{{ \Carbon\Carbon::parse($ptkform->created_at)->format('d M Y') }}</span>
                                </div>
                            </div>

                            <hr class="border-light my-4">

                            <!-- Job Description -->
                            <div class="mb-5">
                                <h5 class="text-primary fw-bold mb-3"><i class="ti ti-list-details me-2"></i>Job
                                    Responsibilities</h5>
                                <div class="text-dark">
                                    {!! $ptkform->responsibility !!}
                                </div>
                            </div>

                            <!-- Requirements -->
                            <div class="mb-5">
                                <h5 class="text-primary fw-bold mb-3"><i class="ti ti-school me-2"></i>Requirements</h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="bg-light p-3 rounded h-100">
                                            <small class="text-muted d-block">Education</small>
                                            <span class="fw-bold">{{ $ptkform->education->education_name ?? '-' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="bg-light p-3 rounded h-100">
                                            <small class="text-muted d-block">Major</small>
                                            <span class="fw-bold">{{ $ptkform->major->major_name ?? 'Any' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="bg-light p-3 rounded h-100">
                                            <small class="text-muted d-block">Min GPA (IPK)</small>
                                            <span class="fw-bold">{{ $ptkform->ipk ?? '-' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="bg-light p-3 rounded h-100">
                                            <small class="text-muted d-block">Gender</small>
                                            <span class="fw-bold">
                                                @if ($ptkform->gender == 1)
                                                    Male
                                                @elseif($ptkform->gender == 2)
                                                    Female
                                                @else
                                                    Any
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                @if (isset($ptkform->ptkfields) && count($ptkform->ptkfields) > 0)
                                    <div class="mt-4">
                                        <h6 class="fw-bold">Experience Required:</h6>
                                        <div class="d-flex flex-wrap gap-2 mt-2">
                                            @foreach ($ptkform->ptkfields as $field)
                                                <span class="badge bg-secondary-subtle text-secondary px-3 py-2">
                                                    {{ $field->field->field_name }}: {{ $field->year }} Yrs
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- Additional Info -->
                            @if ($ptkform->special_conditions || $ptkform->general_others)
                                <div class="mb-4">
                                    <h5 class="text-primary fw-bold mb-3"><i class="ti ti-info-circle me-2"></i>Other
                                        Information</h5>
                                    @if ($ptkform->special_conditions)
                                        <div
                                            class="alert alert-warning mb-3 border-0 bg-warning-subtle text-warning-emphasis">
                                            <strong>Special Conditions:</strong>
                                            <div class="mt-1">{!! $ptkform->special_conditions !!}</div>
                                        </div>
                                    @endif
                                    @if ($ptkform->general_others)
                                        <div class="p-3 bg-light rounded">
                                            <strong>Remarks:</strong>
                                            <div class="mt-1">{!! $ptkform->general_others !!}</div>
                                        </div>
                                    @endif
                                </div>
                            @endif

                        </div>
                    </div>
                </div>

                <!-- Right Sidebar Info -->
                <div class="col-lg-4">
                    <div class="card card-modern border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">Internal Details</h5>

                            <div class="mb-3">
                                <label class="small text-muted mb-1">Division</label>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="ti ti-building text-primary"></i>
                                    <span class="fw-semibold">{{ $ptkform->division->division_name ?? '-' }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="small text-muted mb-1">Department</label>
                                <div class="fw-semibold">{{ $ptkform->department->department_name ?? '-' }}</div>
                            </div>
                            <div class="mb-3">
                                <label class="small text-muted mb-1">Section</label>
                                <div class="fw-semibold">{{ $ptkform->section->section_name ?? '-' }}</div>
                            </div>

                            <hr class="border-light">

                            <div class="row g-2">
                                <div class="col-6">
                                    <label class="small text-muted mb-1">Headcount</label>
                                    <div class="fw-bold fs-5">{{ $ptkform->jumlah_kebutuhan_pegawai }}</div>
                                </div>
                                <div class="col-6">
                                    <label class="small text-muted mb-1">Start Date</label>
                                    <div class="fw-bold">{{ date('d/m/Y', strtotime($ptkform->date_startwork)) }}</div>
                                </div>
                                <div class="col-12 mt-3">
                                    <label class="small text-muted mb-1">Direct Supervisor</label>
                                    <div class="fw-semibold">{{ $ptkform->direct_superior ?? '-' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm bg-primary text-white">
                        <div class="card-body p-4 text-center">
                            <h2 class="display-6 fw-bold mb-0 text-white">{{ $ptkform->count_candidate ?? 0 }}</h2>
                            <span class="opacity-75">Total Applicants</span>
                            <hr class="border-white opacity-25 my-3">
                            <div class="d-grid">
                                <a href="#" class="btn btn-light text-primary fw-bold"
                                    onclick="alert('Feature coming soon: View Candidate List')">
                                    <i class="ti ti-users me-2"></i> View Candidates
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('addJs')
    <style>
        .card-modern {
            background: white;
            border-radius: 12px;
        }
    </style>
@endsection
