@extends('layouts.default')

@section('cardClass', 'border-0')

@section('addCss')
<style>
    /* Custom Styles */
    .bg-gradient-primary {
        background: linear-gradient(135deg, #3a7bd5 0%, #00d2ff 100%);
    }

    .breadcrumb-light .breadcrumb-item a {
        color: rgba(255, 255, 255, 0.8);
    }

    .breadcrumb-light .breadcrumb-item.active {
        color: white;
    }

    .breadcrumb-light .breadcrumb-item+.breadcrumb-item::before {
        color: rgba(255, 255, 255, 0.5);
    }

    .stat-card {
        transition: all 0.3s ease;
        border-radius: 10px;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }

    .icon-circle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }

    .bg-primary-light {
        background-color: rgba(58, 123, 213, 0.1);
    }

    .bg-warning-light {
        background-color: rgba(255, 193, 7, 0.1);
    }

    .bg-info-light {
        background-color: rgba(23, 162, 184, 0.1);
    }

    .bg-danger-light {
        background-color: rgba(220, 53, 69, 0.1);
    }

    .bg-success-light {
        background-color: rgba(40, 167, 69, 0.1);
    }

    .btn-light-primary {
        background-color: rgba(58, 123, 213, 0.1);
        color: #3a7bd5;
        border: none;
    }

    .btn-light-danger {
        background-color: rgba(220, 53, 69, 0.1);
        color: #dc3545;
        border: none;
    }

    .btn-light-primary:hover, .btn-light-danger:hover {
        color: white;
    }

    .btn-light-primary:hover {
        background-color: #3a7bd5;
    }

    .btn-light-danger:hover {
        background-color: #dc3545;
    }
</style>
@endsection


@section('content')
    <div class="card bg-gradient-primary position-relative overflow-hidden">
        <div class="card-body px-4 py-4">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <h4 class="fw-semibold text-white mb-2">Recruitment Pipeline</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-light">
                            <li class="breadcrumb-item"><a class="text-white-50" href="./index.html">Dashboard</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Recruitment</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-5 text-md-end mt-3 mt-md-0">
                    <a href="{{ url('ptkformtransactions', 'all') }}/data" class="btn btn-light-primary me-2 text-white">
                        <i class="fas fa-database me-2"></i>All Data
                    </a>
                    <a href="{{ url('ptkformtransactions', 9) }}/data" class="btn btn-light-danger text-white">
                        <i class="fas fa-times me-2"></i>Canceled
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Applicant Card -->
        <div class="col-sm-6 col-lg-3 mb-4">
            <a href="{{ url('ptkformtransactions', 0) }}/data" class="card stat-card h-100 border-0 shadow-sm hover-lift">
                <div class="card-body text-center p-4">
                    <div class="icon-circle bg-primary-light text-primary mb-3">
                        <i class="fas fa-paper-plane fs-4"></i>
                    </div>
                    <h6 class="text-uppercase text-muted mb-1">Applicants</h6>
                    <h3 class="fw-bold text-primary mb-0">{{ $dataResults[0] }}</h3>
                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"></div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Interview HC Card -->
        <div class="col-sm-6 col-lg-3 mb-4">
            <a href="{{ url('ptkformtransactions', 1) }}/data" class="card stat-card h-100 border-0 shadow-sm hover-lift">
                <div class="card-body text-center p-4">
                    <div class="icon-circle bg-warning-light text-warning mb-3">
                        <i class="fas fa-clipboard-check fs-4"></i>
                    </div>
                    <h6 class="text-uppercase text-muted mb-1">Interview HC</h6>
                    <h3 class="fw-bold text-warning mb-0">{{ $dataResults[1] }}</h3>
                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 100%"></div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Psikotes Card -->
        <div class="col-sm-6 col-lg-3 mb-4">
            <a href="{{ url('ptkformtransactions', 2) }}/data" class="card stat-card h-100 border-0 shadow-sm hover-lift">
                <div class="card-body text-center p-4">
                    <div class="icon-circle bg-info-light text-info mb-3">
                        <i class="fas fa-graduation-cap fs-4"></i>
                    </div>
                    <h6 class="text-uppercase text-muted mb-1">Psikotest</h6>
                    <h3 class="fw-bold text-info mb-0">{{ $dataResults[2] }}</h3>
                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 100%"></div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Interview User Card -->
        <div class="col-sm-6 col-lg-3 mb-4">
            <a href="{{ url('ptkformtransactions', 3) }}/data" class="card stat-card h-100 border-0 shadow-sm hover-lift">
                <div class="card-body text-center p-4">
                    <div class="icon-circle bg-danger-light text-danger mb-3">
                        <i class="fas fa-users fs-4"></i>
                    </div>
                    <h6 class="text-uppercase text-muted mb-1">Interview User</h6>
                    <h3 class="fw-bold text-danger mb-0">{{ $dataResults[3] }}</h3>
                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%"></div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Interview Direksi Card -->
        <div class="col-sm-6 col-lg-3 mb-4">
            <a href="{{ url('ptkformtransactions', 4) }}/data" class="card stat-card h-100 border-0 shadow-sm hover-lift">
                <div class="card-body text-center p-4">
                    <div class="icon-circle bg-success-light text-success mb-3">
                        <i class="fas fa-user fs-4"></i>
                    </div>
                    <h6 class="text-uppercase text-muted mb-1">Director Interview</h6>
                    <h3 class="fw-bold text-success mb-0">{{ $dataResults[4] }}</h3>
                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Finalisasi Card -->
        <div class="col-sm-6 col-lg-3 mb-4">
            <a href="{{ url('ptkformtransactions', 5) }}/data" class="card stat-card h-100 border-0 shadow-sm hover-lift">
                <div class="card-body text-center p-4">
                    <div class="icon-circle bg-primary-light text-primary mb-3">
                        <i class="fas fa-flag-checkered fs-4"></i>
                    </div>
                    <h6 class="text-uppercase text-muted mb-1">Finalization</h6>
                    <h3 class="fw-bold text-primary mb-0">{{ $dataResults[5] }}</h3>
                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"></div>
                    </div>
                </div>
            </a>
        </div>

        <!-- MCU Card -->
        <div class="col-sm-6 col-lg-3 mb-4">
            <a href="{{ url('ptkformtransactions', 6) }}/data" class="card stat-card h-100 border-0 shadow-sm hover-lift">
                <div class="card-body text-center p-4">
                    <div class="icon-circle bg-danger-light text-danger mb-3">
                        <i class="fas fa-heartbeat fs-4"></i>
                    </div>
                    <h6 class="text-uppercase text-muted mb-1">Medical Checkup</h6>
                    <h3 class="fw-bold text-danger mb-0">{{ $dataResults[6] }}</h3>
                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%"></div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Join Card -->
        <div class="col-sm-6 col-lg-3 mb-4">
            <a href="{{ url('ptkformtransactions', 7) }}/data" class="card stat-card h-100 border-0 shadow-sm hover-lift">
                <div class="card-body text-center p-4">
                    <div class="icon-circle bg-success-light text-success mb-3">
                        <i class="fas fa-handshake fs-4"></i>
                    </div>
                    <h6 class="text-uppercase text-muted mb-1">Joined</h6>
                    <h3 class="fw-bold text-success mb-0">{{ $dataResults[7] }}</h3>
                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection


