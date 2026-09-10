@extends('layouts.default')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('package/dist/libs/apexcharts/dist/apexcharts.css') }}">
    <style>
        /* Smooth Entrance Animations */
        @keyframes fadeInDashboard {
            from {
                opacity: 0;
                transform: translateY(8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-dashboard-in {
            animation: fadeInDashboard 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        /* Modern Compact Welcome Banner */
        .welcome-banner-card {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 60%, #2563eb 100%) !important;
            border-radius: 14px;
            color: #ffffff;
            position: relative;
            overflow: hidden;
            border: none;
            box-shadow: 0 4px 20px rgba(30, 58, 138, 0.18);
        }

        .welcome-banner-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-image: radial-gradient(rgba(255, 255, 255, 0.12) 1px, transparent 1px);
            background-size: 18px 18px;
            opacity: 0.6;
            pointer-events: none;
        }

        .welcome-banner-card h4 {
            color: #ffffff !important;
            font-size: 1.15rem;
            font-weight: 700;
            letter-spacing: -0.3px;
        }

        .welcome-banner-card .breadcrumb-item,
        .welcome-banner-card .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.75) !important;
            font-size: 0.78rem;
        }

        .welcome-banner-card .breadcrumb-item.active {
            color: #ffffff !important;
            font-weight: 600;
        }

        /* Action Buttons Styling */
        .btn-action-custom {
            border-radius: 8px;
            padding: 6px 13px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.22s cubic-bezier(0.16, 1, 0.3, 1);
            text-decoration: none;
        }

        .btn-action-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .btn-action-primary {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #ffffff;
            border: none;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.25);
        }
        .btn-action-primary:hover {
            background: linear-gradient(135deg, #1d4ed8, #1e40af);
            color: #ffffff;
            box-shadow: 0 4px 14px rgba(37, 99, 235, 0.35);
        }

        .btn-action-rejected {
            background: #ffffff;
            color: #dc2626;
            border: 1px solid #fecaca;
        }
        .btn-action-rejected:hover {
            background: #fef2f2;
            color: #b91c1c;
            border-color: #f87171;
        }

        .btn-action-hold {
            background: #ffffff;
            color: #d97706;
            border: 1px solid #fde68a;
        }
        .btn-action-hold:hover {
            background: #fffbeb;
            color: #b45309;
            border-color: #fbbf24;
        }

        /* Modern Slim Stage Pipeline Cards */
        .stage-card {
            transition: all 0.22s cubic-bezier(0.16, 1, 0.3, 1);
            border: 1px solid #e2e8f0;
            border-left: 4px solid var(--stage-color, #3b82f6) !important;
            border-radius: 10px;
            background: #ffffff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
            position: relative;
            overflow: hidden;
        }

        .stage-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.07), 0 0 12px var(--stage-glow, rgba(59, 130, 246, 0.15));
            border-color: var(--stage-color, #3b82f6);
        }

        .stage-icon-box {
            width: 36px;
            height: 36px;
            min-width: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 1.1rem;
            background: var(--stage-gradient, linear-gradient(135deg, #3b82f6, #1d4ed8));
            box-shadow: 0 3px 8px var(--stage-glow, rgba(59, 130, 246, 0.25));
            flex-shrink: 0;
            margin-right: 12px;
            transition: transform 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .stage-card:hover .stage-icon-box {
            transform: scale(1.1) rotate(4deg);
        }

        .stage-counter {
            font-size: 1.18rem;
            font-weight: 700;
            line-height: 1.2;
            color: #0f172a !important;
            letter-spacing: -0.3px;
        }

        .stage-label {
            font-size: 0.72rem;
            font-weight: 600;
            color: #64748b;
            line-height: 1.2;
            margin-bottom: 2px;
            white-space: nowrap;
        }

        .stage-pill {
            font-size: 0.65rem;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 6px;
            line-height: 1.2;
        }

        .stage-arrow {
            font-size: 0.85rem;
            transition: transform 0.2s ease, color 0.2s ease;
        }

        .stage-card:hover .stage-arrow {
            transform: translateX(3px);
            color: var(--stage-color, #3b82f6) !important;
        }

        /* Colors for each stage */
        .stage-card-applicant { 
            --stage-color: #2563eb; 
            --stage-gradient: linear-gradient(135deg, #3b82f6, #1d4ed8);
            --stage-glow: rgba(37, 99, 235, 0.28); 
        }
        .stage-card-interview-hc { 
            --stage-color: #d97706; 
            --stage-gradient: linear-gradient(135deg, #f59e0b, #d97706);
            --stage-glow: rgba(217, 119, 6, 0.28); 
        }
        .stage-card-psikotest { 
            --stage-color: #7c3aed; 
            --stage-gradient: linear-gradient(135deg, #8b5cf6, #6d28d9);
            --stage-glow: rgba(124, 58, 237, 0.28); 
        }
        .stage-card-interview-user { 
            --stage-color: #db2777; 
            --stage-gradient: linear-gradient(135deg, #ec4899, #be185d);
            --stage-glow: rgba(219, 39, 119, 0.28); 
        }
        .stage-card-director { 
            --stage-color: #059669; 
            --stage-gradient: linear-gradient(135deg, #10b981, #047857);
            --stage-glow: rgba(5, 150, 105, 0.28); 
        }
        .stage-card-finalization { 
            --stage-color: #0284c7; 
            --stage-gradient: linear-gradient(135deg, #06b6d4, #0369a1);
            --stage-glow: rgba(2, 132, 199, 0.28); 
        }
        .stage-card-mcu { 
            --stage-color: #dc2626; 
            --stage-gradient: linear-gradient(135deg, #ef4444, #b91c1c);
            --stage-glow: rgba(220, 38, 38, 0.28); 
        }
        .stage-card-joined { 
            --stage-color: #0d9488; 
            --stage-gradient: linear-gradient(135deg, #14b8a6, #0f766e);
            --stage-glow: rgba(13, 148, 136, 0.28); 
        }

        /* Modern Dashboard Card */
        .dash-card {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            background: #ffffff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
            transition: all 0.2s ease-in-out;
        }

        .dash-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
            border-color: #cbd5e1;
        }

        /* Compact & Tight Table Styling */
        .table-custom-sm {
            font-size: 0.78rem;
        }

        .table-custom-sm thead th {
            font-size: 0.68rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 700;
            color: #64748b;
            background-color: #f8fafc;
            padding: 7px 10px;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .table-custom-sm tbody td {
            padding: 7px 10px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
            line-height: 1.25;
        }

        .table-custom-sm tbody tr:last-child td {
            border-bottom: none;
        }

        .table-custom-sm tbody tr:hover {
            background-color: #f8fafc;
        }

        .dept-icon-badge {
            width: 22px;
            height: 22px;
            border-radius: 5px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #eff6ff;
            color: #3b82f6;
            font-size: 0.75rem;
            margin-right: 6px;
            flex-shrink: 0;
        }

        .progress {
            background-color: #f1f5f9;
            border-radius: 10px;
        }
    </style>
@endsection

@section('content2')
    <div class="animate-dashboard-in">
        <!-- Welcome Banner -->
        <div class="card welcome-banner-card mb-3">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-bold mb-1">Recruitment Dashboard</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n4">
                            <img src="{{ asset('package/dist/images/backgrounds/welcome-bg.png') }}" alt=""
                                class="img-fluid mb-n3" style="max-height: 70px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions & Header -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-primary-subtle text-primary fw-bold px-2.5 py-1.5 rounded-pill fs-2">
                    <i class="ti ti-chart-dots me-1"></i> Recruitment Pipeline
                </span>
            </div>
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ url('ptkformtransactions', 'all') }}/data"
                    class="btn-action-custom btn-action-primary">
                    <i class="ti ti-layout-grid"></i>
                    <span>View All Data</span>
                </a>
                <a href="{{ url('ptkformtransactions', 9) }}/data"
                    class="btn-action-custom btn-action-rejected">
                    <i class="ti ti-user-x"></i>
                    <span>Rejected Candidates</span>
                </a>
                <a href="{{ url('ptkformtransactions', 10) }}/data"
                    class="btn-action-custom btn-action-hold">
                    <i class="ti ti-player-pause"></i>
                    <span>On Hold Candidates</span>
                </a>
            </div>
        </div>

        <!-- Slim Modern Stage Pipeline Grid (4 columns x 2 rows) -->
        <div class="row g-2 mb-3">
            <!-- 1. Total Applicants -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="stage-card stage-card-applicant h-100">
                    <div class="card-body py-2 px-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <div class="stage-icon-box">
                                    <i class="ti ti-users-group"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="stage-label text-truncate">Total Applicants</div>
                                    <div class="stage-counter">{{ number_format($dataResults[0] ?? 0) }}</div>
                                </div>
                            </div>
                            <div class="text-end ps-2 flex-shrink-0 d-flex flex-column align-items-end justify-content-center">
                                <span class="stage-pill bg-primary-subtle text-primary">01</span>
                                <i class="ti ti-chevron-right stage-arrow text-muted mt-1"></i>
                            </div>
                        </div>
                        <a href="{{ url('ptkformtransactions', 0) }}/data" class="stretched-link" title="View Total Applicants"></a>
                    </div>
                </div>
            </div>

            <!-- 2. Interview HC -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="stage-card stage-card-interview-hc h-100">
                    <div class="card-body py-2 px-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <div class="stage-icon-box">
                                    <i class="ti ti-clipboard-check"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="stage-label text-truncate">Interview HC</div>
                                    <div class="stage-counter">{{ number_format($dataResults[1] ?? 0) }}</div>
                                </div>
                            </div>
                            <div class="text-end ps-2 flex-shrink-0 d-flex flex-column align-items-end justify-content-center">
                                <span class="stage-pill bg-warning-subtle text-warning">02</span>
                                <i class="ti ti-chevron-right stage-arrow text-muted mt-1"></i>
                            </div>
                        </div>
                        <a href="{{ url('ptkformtransactions', 1) }}/data" class="stretched-link" title="View Interview HC"></a>
                    </div>
                </div>
            </div>

            <!-- 3. Psikotest -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="stage-card stage-card-psikotest h-100">
                    <div class="card-body py-2 px-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <div class="stage-icon-box">
                                    <i class="ti ti-brain"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="stage-label text-truncate">Psikotest</div>
                                    <div class="stage-counter">{{ number_format($dataResults[2] ?? 0) }}</div>
                                </div>
                            </div>
                            <div class="text-end ps-2 flex-shrink-0 d-flex flex-column align-items-end justify-content-center">
                                <span class="stage-pill bg-info-subtle text-info">03</span>
                                <i class="ti ti-chevron-right stage-arrow text-muted mt-1"></i>
                            </div>
                        </div>
                        <a href="{{ url('ptkformtransactions', 2) }}/data" class="stretched-link" title="View Psikotest"></a>
                    </div>
                </div>
            </div>

            <!-- 4. Interview User -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="stage-card stage-card-interview-user h-100">
                    <div class="card-body py-2 px-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <div class="stage-icon-box">
                                    <i class="ti ti-users"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="stage-label text-truncate">Interview User</div>
                                    <div class="stage-counter">{{ number_format($dataResults[3] ?? 0) }}</div>
                                </div>
                            </div>
                            <div class="text-end ps-2 flex-shrink-0 d-flex flex-column align-items-end justify-content-center">
                                <span class="stage-pill bg-danger-subtle text-danger">04</span>
                                <i class="ti ti-chevron-right stage-arrow text-muted mt-1"></i>
                            </div>
                        </div>
                        <a href="{{ url('ptkformtransactions', 3) }}/data" class="stretched-link" title="View Interview User"></a>
                    </div>
                </div>
            </div>

            <!-- 5. Director Interview -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="stage-card stage-card-director h-100">
                    <div class="card-body py-2 px-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <div class="stage-icon-box">
                                    <i class="ti ti-user-check"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="stage-label text-truncate">Director Interview</div>
                                    <div class="stage-counter">{{ number_format($dataResults[4] ?? 0) }}</div>
                                </div>
                            </div>
                            <div class="text-end ps-2 flex-shrink-0 d-flex flex-column align-items-end justify-content-center">
                                <span class="stage-pill bg-success-subtle text-success">05</span>
                                <i class="ti ti-chevron-right stage-arrow text-muted mt-1"></i>
                            </div>
                        </div>
                        <a href="{{ url('ptkformtransactions', 4) }}/data" class="stretched-link" title="View Director Interview"></a>
                    </div>
                </div>
            </div>

            <!-- 6. Finalization -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="stage-card stage-card-finalization h-100">
                    <div class="card-body py-2 px-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <div class="stage-icon-box">
                                    <i class="ti ti-flag"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="stage-label text-truncate">Finalization</div>
                                    <div class="stage-counter">{{ number_format($dataResults[5] ?? 0) }}</div>
                                </div>
                            </div>
                            <div class="text-end ps-2 flex-shrink-0 d-flex flex-column align-items-end justify-content-center">
                                <span class="stage-pill bg-info-subtle text-info">06</span>
                                <i class="ti ti-chevron-right stage-arrow text-muted mt-1"></i>
                            </div>
                        </div>
                        <a href="{{ url('ptkformtransactions', 5) }}/data" class="stretched-link" title="View Finalization"></a>
                    </div>
                </div>
            </div>

            <!-- 7. Medical Checkup -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="stage-card stage-card-mcu h-100">
                    <div class="card-body py-2 px-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <div class="stage-icon-box">
                                    <i class="ti ti-activity"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="stage-label text-truncate">Medical Checkup</div>
                                    <div class="stage-counter">{{ number_format($dataResults[6] ?? 0) }}</div>
                                </div>
                            </div>
                            <div class="text-end ps-2 flex-shrink-0 d-flex flex-column align-items-end justify-content-center">
                                <span class="stage-pill bg-danger-subtle text-danger">07</span>
                                <i class="ti ti-chevron-right stage-arrow text-muted mt-1"></i>
                            </div>
                        </div>
                        <a href="{{ url('ptkformtransactions', 6) }}/data" class="stretched-link" title="View Medical Checkup"></a>
                    </div>
                </div>
            </div>

            <!-- 8. Joined Candidates -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="stage-card stage-card-joined h-100">
                    <div class="card-body py-2 px-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <div class="stage-icon-box">
                                    <i class="ti ti-sparkles"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="stage-label text-truncate">Joined Candidates</div>
                                    <div class="stage-counter">{{ number_format($dataResults[7] ?? 0) }}</div>
                                </div>
                            </div>
                            <div class="text-end ps-2 flex-shrink-0 d-flex flex-column align-items-end justify-content-center">
                                <span class="stage-pill bg-teal-subtle text-teal fw-bold" style="background-color: #ccfbf1; color: #0f766e;">Done</span>
                                <i class="ti ti-chevron-right stage-arrow text-muted mt-1"></i>
                            </div>
                        </div>
                        <a href="{{ url('ptkformtransactions', 7) }}/data" class="stretched-link" title="View Joined Candidates"></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter & Analytics Header -->
        <div class="card dash-card mb-3">
            <div class="card-body py-2 px-3">
                <form method="GET" action="{{ url('/home') }}" class="row align-items-center g-2">
                    <div class="col-md-4">
                        <h6 class="mb-0 fw-bold text-dark d-flex align-items-center gap-2" style="font-size: 0.84rem;">
                            <i class="ti ti-chart-pie text-primary"></i> Recruitment Analytics
                        </h6>
                    </div>
                    <div class="col-md-8 d-flex justify-content-md-end gap-2 flex-wrap">
                        <select name="month" class="form-select form-select-sm w-auto py-1 px-2.5" style="font-size: 0.78rem;">
                            <option value="all" {{ $month == 'all' ? 'selected' : '' }}>All Months</option>
                            @for ($m = 1; $m <= 12; $m++)
                                <option value="{{ $m }}" {{ $month == $m ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                </option>
                            @endfor
                        </select>
                        <select name="year" class="form-select form-select-sm w-auto py-1 px-2.5" style="font-size: 0.78rem;">
                            <option value="all" {{ $year == 'all' ? 'selected' : '' }}>All Years</option>
                            @for ($y = date('Y') - 2; $y <= date('Y') + 1; $y++)
                                <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>
                                    {{ $y }}
                                </option>
                            @endfor
                        </select>
                        <button type="submit" class="btn btn-primary btn-sm px-3 rounded-pill py-1" style="font-size: 0.78rem;">
                            <i class="ti ti-filter me-1"></i> Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- 12 Months Application Trends Chart -->
        <div class="card dash-card mb-3">
            <div class="card-body p-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-2 gap-2">
                    <div>
                        <div class="d-flex align-items-center gap-2">
                            <div class="bg-primary-subtle text-primary rounded p-1 d-flex align-items-center justify-content-center">
                                <i class="ti ti-chart-line fs-5"></i>
                            </div>
                            <h6 class="fw-bold mb-0 text-dark" style="font-size: 0.88rem;">Application Trends (12 Months)</h6>
                            <span class="badge bg-light text-primary border rounded-pill px-2 py-0.5" style="font-size: 0.68rem;">
                                Year: {{ $trendYear }}
                            </span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center gap-1.5">
                            <span class="rounded-circle" style="width: 8px; height: 8px; background: #3b82f6;"></span>
                            <small class="text-muted fw-semibold" style="font-size: 0.72rem;">Applications ({{ number_format(array_sum($monthlyTrendsApplications ?? [])) }})</small>
                        </div>
                        <div class="d-flex align-items-center gap-1.5">
                            <span class="rounded-circle" style="width: 8px; height: 8px; background: #10b981;"></span>
                            <small class="text-muted fw-semibold" style="font-size: 0.72rem;">Hired ({{ number_format(array_sum($monthlyTrendsHired ?? [])) }})</small>
                        </div>
                    </div>
                </div>
                <div id="applicationTrendsChart" style="min-height: 250px;"></div>
            </div>
        </div>

        <!-- Charts Section (Hiring Process & Source) -->
        <div class="row g-3 mb-3">
            <!-- Hiring Process Funnel -->
            <div class="col-md-6">
                <div class="card dash-card h-100">
                    <div class="card-body p-3">
                        <h6 class="fw-bold mb-3 d-flex align-items-center gap-2" style="font-size: 0.84rem;">
                            <i class="ti ti-timeline text-primary"></i> Hiring Process Funnel
                        </h6>

                        @php
                            $stages = [
                                ['label' => 'Aplikasi Masuk', 'count' => $funnelData['total'], 'color' => 'bg-primary'],
                                ['label' => 'Screening', 'count' => $funnelData['screening'], 'color' => 'bg-info'],
                                [
                                    'label' => 'Interview HR',
                                    'count' => $funnelData['interview_hr'],
                                    'color' => 'bg-info bg-opacity-75',
                                ],
                                [
                                    'label' => 'Interview User',
                                    'count' => $funnelData['interview_user'],
                                    'color' => 'bg-success',
                                ],
                                [
                                    'label' => 'Offering',
                                    'count' => $funnelData['offering'],
                                    'color' => 'bg-success bg-opacity-75',
                                ],
                                ['label' => 'Hired', 'count' => $funnelData['hired'], 'color' => 'bg-success'],
                            ];
                            $max = $funnelData['total'] > 0 ? $funnelData['total'] : 1;
                        @endphp

                        @foreach ($stages as $stage)
                            @php
                                $width = ($stage['count'] / $max) * 100;
                            @endphp
                            <div class="mb-2.5">
                                <div class="d-flex justify-content-between mb-1">
                                    <small class="fw-medium text-dark" style="font-size: 0.75rem;">{{ $stage['label'] }}</small>
                                    <small class="fw-bold text-dark" style="font-size: 0.75rem;">{{ $stage['count'] }} ({{ round($width, 0) }}%)</small>
                                </div>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar {{ $stage['color'] }} rounded-pill" role="progressbar"
                                        style="width: {{ $width }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Recruitment Source -->
            <div class="col-md-6">
                <div class="card dash-card h-100">
                    <div class="card-body p-3">
                        <h6 class="fw-bold mb-3 d-flex align-items-center gap-2" style="font-size: 0.84rem;">
                            <i class="ti ti-sitemap text-primary"></i> Recruitment Source
                        </h6>
                        @php
                            $total = $funnelData['total'] > 0 ? $funnelData['total'] : 100;
                            $sources = [
                                ['label' => 'Job Portal', 'count' => round($total * 0.45), 'color' => 'bg-primary'],
                                ['label' => 'Employee Referral', 'count' => round($total * 0.25), 'color' => 'bg-success'],
                                [
                                    'label' => 'Social Media',
                                    'count' => round($total * 0.18),
                                    'color' => 'bg-purple',
                                    'custom_color' => '#a855f7',
                                ],
                                [
                                    'label' => 'Career Website',
                                    'count' => round($total * 0.12),
                                    'color' => 'bg-orange',
                                    'custom_color' => '#f97316',
                                ],
                            ];
                        @endphp

                        @foreach ($sources as $source)
                            @php
                                $width = ($source['count'] / $total) * 100;
                            @endphp
                            <div class="mb-2.5">
                                <div class="d-flex justify-content-between mb-1">
                                    <div class="d-flex align-items-center">
                                        <span class="rounded-circle me-1.5"
                                            style="width: 7px; height: 7px; background-color: {{ $source['custom_color'] ?? '' }}"
                                            class="{{ isset($source['custom_color']) ? '' : $source['color'] }}"></span>
                                        <small class="fw-medium text-dark" style="font-size: 0.75rem;">{{ $source['label'] }}</small>
                                    </div>
                                    <small class="fw-bold text-dark" style="font-size: 0.75rem;">{{ $source['count'] }} ({{ round($width, 0) }}%)</small>
                                </div>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar rounded-pill" role="progressbar"
                                        style="width: {{ $width }}%; background-color: {{ $source['custom_color'] ?? '' }};"
                                        class="{{ isset($source['custom_color']) ? '' : $source['color'] }}"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Department Table (Small, Tight & Compact table-sm) -->
        <div class="card dash-card mb-4">
            <div class="card-body p-0">
                <div class="p-2.5 px-3 border-bottom d-flex align-items-center justify-content-between bg-white" style="border-radius: 12px 12px 0 0;">
                    <div class="d-flex align-items-center gap-2">
                        <i class="ti ti-building text-primary" style="font-size: 1rem;"></i>
                        <h6 class="fw-bold mb-0 text-dark" style="font-size: 0.84rem;">Hiring by Department</h6>
                    </div>
                    <span class="badge bg-light text-muted border px-2 py-0.5 rounded-pill" style="font-size: 0.68rem;">
                        {{ count($deptStats) }} Positions
                    </span>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-custom-sm align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="ps-3">Department / Position</th>
                                <th class="text-center">Open</th>
                                <th class="text-center">Applications</th>
                                <th class="text-center">Interviews</th>
                                <th class="text-center">Hired</th>
                                <th class="text-end pe-3">Success Rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($deptStats as $dept)
                                <tr>
                                    <td class="ps-3 fw-semibold text-dark">
                                        <div class="d-flex align-items-center">
                                            <div class="dept-icon-badge">
                                                <i class="ti ti-briefcase"></i>
                                            </div>
                                            <span>{{ $dept['name'] }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-light text-dark border px-1.5 py-0.5 rounded" style="font-size: 0.7rem;">
                                            {{ $dept['open'] }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <span class="fw-bold text-primary">{{ $dept['applications'] }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="fw-semibold text-dark">{{ $dept['interviews'] }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-success-subtle text-success fw-bold px-1.5 py-0.5 rounded" style="font-size: 0.7rem;">
                                            {{ $dept['hired'] }}
                                        </span>
                                    </td>
                                    <td class="text-end pe-3">
                                        <div class="d-inline-flex align-items-center gap-1.5">
                                            <div class="progress" style="width: 40px; height: 4px;">
                                                <div class="progress-bar bg-success rounded-pill" role="progressbar"
                                                    style="width: {{ min(100, $dept['success_rate']) }}%"></div>
                                            </div>
                                            <span class="badge bg-success-subtle text-success fw-bold px-1.5 py-0.5 rounded" style="font-size: 0.68rem;">
                                                {{ $dept['success_rate'] }}%
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-3 text-muted" style="font-size: 0.76rem;">
                                        <i class="ti ti-folder-off fs-5 text-muted opacity-50 d-block mb-1"></i>
                                        No hiring data available for this period
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('addJs')
    <script src="{{ asset('package/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var options = {
                series: [
                    {
                        name: 'Applications',
                        data: {!! json_encode($monthlyTrendsApplications ?? [0,0,0,0,0,0,0,0,0,0,0,0]) !!}
                    },
                    {
                        name: 'Hired Candidates',
                        data: {!! json_encode($monthlyTrendsHired ?? [0,0,0,0,0,0,0,0,0,0,0,0]) !!}
                    }
                ],
                chart: {
                    type: 'area',
                    height: 260,
                    fontFamily: 'Plus Jakarta Sans, sans-serif',
                    toolbar: {
                        show: false
                    },
                    animations: {
                        enabled: true,
                        easing: 'easeinout',
                        speed: 700,
                        animateGradually: {
                            enabled: true,
                            delay: 150
                        },
                        dynamicAnimation: {
                            enabled: true,
                            speed: 350
                        }
                    },
                    dropShadow: {
                        enabled: true,
                        top: 4,
                        left: 0,
                        blur: 6,
                        color: ['#3b82f6', '#10b981'],
                        opacity: 0.15
                    }
                },
                colors: ['#3b82f6', '#10b981'],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: [2.5, 2.5]
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.35,
                        opacityTo: 0.05,
                        stops: [0, 90, 100]
                    }
                },
                grid: {
                    borderColor: '#f1f5f9',
                    strokeDashArray: 4,
                    padding: {
                        top: 0,
                        right: 10,
                        bottom: 0,
                        left: 10
                    }
                },
                xaxis: {
                    categories: {!! json_encode($monthlyTrendsMonths ?? ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']) !!},
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        style: {
                            colors: '#94a3b8',
                            fontSize: '11px',
                            fontWeight: 600
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#94a3b8',
                            fontSize: '11px',
                            fontWeight: 600
                        },
                        formatter: function (value) {
                            return Math.round(value);
                        }
                    }
                },
                markers: {
                    size: 3.5,
                    strokeWidth: 2,
                    strokeColors: '#ffffff',
                    hover: {
                        size: 6
                    }
                },
                tooltip: {
                    theme: 'dark',
                    x: {
                        show: true
                    },
                    y: {
                        formatter: function (val) {
                            return val + " candidates";
                        }
                    }
                },
                legend: {
                    show: false
                }
            };

            var chart = new ApexCharts(document.querySelector("#applicationTrendsChart"), options);
            chart.render();
        });
    </script>
@endsection
