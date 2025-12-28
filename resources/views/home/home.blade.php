@extends('layouts.default')

@section('content2')
    <!-- Welcome Banner -->
    <div class="card bg-primary-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Recruitment Dashboard</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted" href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('package/dist/images/backgrounds/welcome-bg.png') }}" alt=""
                            class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="d-flex justify-content-end mb-4 gap-2">
        <a href="{{ url('ptkformtransactions', 'all') }}/data"
            class="btn btn-outline-primary shadow-sm d-flex align-items-center">
            <i class="ti ti-database me-2"></i> View All Data
        </a>
        <a href="{{ url('ptkformtransactions', 9) }}/data"
            class="btn btn-outline-danger shadow-sm d-flex align-items-center">
            <i class="ti ti-ban me-2"></i> Canceled Applications
        </a>
    </div>

    <!-- Stats Grid -->
    <div class="row">
        <!-- Applicants -->
        <div class="col-sm-6 col-lg-3">
            <div class="card hover-img position-relative overflow-hidden">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div
                            class="bg-primary-subtle text-primary rounded-circle p-3 d-flex align-items-center justify-content-center">
                            <i class="ti ti-user-plus fs-6"></i>
                        </div>
                        <h4 class="mb-0 fw-bold border-bottom border-primary border-2 pb-1">{{ $dataResults[0] }}</h4>
                    </div>
                    <h6 class="text-muted mb-0">Total Applicants</h6>
                    <a href="{{ url('ptkformtransactions', 0) }}/data" class="stretched-link"></a>
                </div>
            </div>
        </div>

        <!-- Interview HC -->
        <div class="col-sm-6 col-lg-3">
            <div class="card hover-img position-relative overflow-hidden">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div
                            class="bg-warning-subtle text-warning rounded-circle p-3 d-flex align-items-center justify-content-center">
                            <i class="ti ti-clipboard-check fs-6"></i>
                        </div>
                        <h4 class="mb-0 fw-bold border-bottom border-warning border-2 pb-1">{{ $dataResults[1] }}</h4>
                    </div>
                    <h6 class="text-muted mb-0">Interview HC</h6>
                    <a href="{{ url('ptkformtransactions', 1) }}/data" class="stretched-link"></a>
                </div>
            </div>
        </div>

        <!-- Psikotest -->
        <div class="col-sm-6 col-lg-3">
            <div class="card hover-img position-relative overflow-hidden">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div
                            class="bg-info-subtle text-info rounded-circle p-3 d-flex align-items-center justify-content-center">
                            <i class="ti ti-brain fs-6"></i>
                        </div>
                        <h4 class="mb-0 fw-bold border-bottom border-info border-2 pb-1">{{ $dataResults[2] }}</h4>
                    </div>
                    <h6 class="text-muted mb-0">Psikotest</h6>
                    <a href="{{ url('ptkformtransactions', 2) }}/data" class="stretched-link"></a>
                </div>
            </div>
        </div>

        <!-- Interview User -->
        <div class="col-sm-6 col-lg-3">
            <div class="card hover-img position-relative overflow-hidden">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div
                            class="bg-danger-subtle text-danger rounded-circle p-3 d-flex align-items-center justify-content-center">
                            <i class="ti ti-users fs-6"></i>
                        </div>
                        <h4 class="mb-0 fw-bold border-bottom border-danger border-2 pb-1">{{ $dataResults[3] }}</h4>
                    </div>
                    <h6 class="text-muted mb-0">Interview User</h6>
                    <a href="{{ url('ptkformtransactions', 3) }}/data" class="stretched-link"></a>
                </div>
            </div>
        </div>

        <!-- Director Interview -->
        <div class="col-sm-6 col-lg-3">
            <div class="card hover-img position-relative overflow-hidden">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div
                            class="bg-success-subtle text-success rounded-circle p-3 d-flex align-items-center justify-content-center">
                            <i class="ti ti-user-check fs-6"></i>
                        </div>
                        <h4 class="mb-0 fw-bold border-bottom border-success border-2 pb-1">{{ $dataResults[4] }}</h4>
                    </div>
                    <h6 class="text-muted mb-0">Director Interview</h6>
                    <a href="{{ url('ptkformtransactions', 4) }}/data" class="stretched-link"></a>
                </div>
            </div>
        </div>

        <!-- Finalization -->
        <div class="col-sm-6 col-lg-3">
            <div class="card hover-img position-relative overflow-hidden">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div
                            class="bg-primary-subtle text-primary rounded-circle p-3 d-flex align-items-center justify-content-center">
                            <i class="ti ti-flag fs-6"></i>
                        </div>
                        <h4 class="mb-0 fw-bold border-bottom border-primary border-2 pb-1">{{ $dataResults[5] }}</h4>
                    </div>
                    <h6 class="text-muted mb-0">Finalization</h6>
                    <a href="{{ url('ptkformtransactions', 5) }}/data" class="stretched-link"></a>
                </div>
            </div>
        </div>

        <!-- Medical Checkup -->
        <div class="col-sm-6 col-lg-3">
            <div class="card hover-img position-relative overflow-hidden">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div
                            class="bg-danger-subtle text-danger rounded-circle p-3 d-flex align-items-center justify-content-center">
                            <i class="ti ti-activity fs-6"></i>
                        </div>
                        <h4 class="mb-0 fw-bold border-bottom border-danger border-2 pb-1">{{ $dataResults[6] }}</h4>
                    </div>
                    <h6 class="text-muted mb-0">Medical Checkup</h6>
                    <a href="{{ url('ptkformtransactions', 6) }}/data" class="stretched-link"></a>
                </div>
            </div>
        </div>

        <!-- Joined -->
        <div class="col-sm-6 col-lg-3">
            <div class="card hover-img position-relative overflow-hidden">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div
                            class="bg-success-subtle text-success rounded-circle p-3 d-flex align-items-center justify-content-center">
                            <i class="ti ti-star fs-6"></i>
                        </div>
                        <h4 class="mb-0 fw-bold border-bottom border-success border-2 pb-1">{{ $dataResults[7] }}</h4>
                    </div>
                    <h6 class="text-muted mb-0">Joined Candidates</h6>
                    <a href="{{ url('ptkformtransactions', 7) }}/data" class="stretched-link"></a>
                </div>
            </div>
        </div>
    </div>
@endsection
