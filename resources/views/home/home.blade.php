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

    <!-- Original Stats Grid -->
    <div class="row mb-5">
        <!-- Applicants -->
        <div class="col-sm-6 col-lg-3">
            <div class="card hover-img position-relative overflow-hidden">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div
                            class="bg-primary-subtle text-primary rounded-circle p-3 d-flex align-items-center justify-content-center">
                            <i class="ti ti-user-plus fs-6"></i>
                        </div>
                        <h4 class="mb-0 fw-bold border-bottom border-primary border-2 pb-1">{{ $dataResults[0] ?? 0 }}</h4>
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
                        <h4 class="mb-0 fw-bold border-bottom border-warning border-2 pb-1">{{ $dataResults[1] ?? 0 }}</h4>
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
                        <h4 class="mb-0 fw-bold border-bottom border-info border-2 pb-1">{{ $dataResults[2] ?? 0 }}</h4>
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
                        <h4 class="mb-0 fw-bold border-bottom border-danger border-2 pb-1">{{ $dataResults[3] ?? 0 }}</h4>
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
                        <h4 class="mb-0 fw-bold border-bottom border-success border-2 pb-1">{{ $dataResults[4] ?? 0 }}</h4>
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
                        <h4 class="mb-0 fw-bold border-bottom border-primary border-2 pb-1">{{ $dataResults[5] ?? 0 }}</h4>
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
                        <h4 class="mb-0 fw-bold border-bottom border-danger border-2 pb-1">{{ $dataResults[6] ?? 0 }}</h4>
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
                        <h4 class="mb-0 fw-bold border-bottom border-success border-2 pb-1">{{ $dataResults[7] ?? 0 }}
                        </h4>
                    </div>
                    <h6 class="text-muted mb-0">Joined Candidates</h6>
                    <a href="{{ url('ptkformtransactions', 7) }}/data" class="stretched-link"></a>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5 border-2">

    <!-- Filter Section (New Analytics) -->
    <div class="card mb-4 shadow-sm border-0">
        <div class="card-body py-3">
            <form method="GET" action="{{ url('/home') }}" class="row align-items-center g-3">
                <div class="col-md-3">
                    <h5 class="mb-0 fw-bold text-dark">Analytics Dashboard</h5>
                </div>
                <div class="col-md-9 d-flex justify-content-end gap-2">
                    <select name="month" class="form-select form-select-sm w-auto">
                        @for ($m = 1; $m <= 12; $m++)
                            <option value="{{ $m }}" {{ $month == $m ? 'selected' : '' }}>
                                {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                            </option>
                        @endfor
                    </select>
                    <select name="year" class="form-select form-select-sm w-auto">
                        @for ($y = date('Y') - 2; $y <= date('Y') + 1; $y++)
                            <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>
                                {{ $y }}
                            </option>
                        @endfor
                    </select>
                    <button type="submit" class="btn btn-primary btn-sm px-3">Filter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-3 mb-4">
        <!-- Application Rate -->
        <div class="col-md-3">
            <div class="card text-white border-0 shadow-sm"
                style="background: linear-gradient(135deg, #3b82f6, #2563eb);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <i class="ti ti-chart-bar fs-4 mb-2"></i>
                            <h6 class="text-white-50 text-uppercase fw-bold" style="font-size: 0.75rem;">Application Rate
                            </h6>
                            <h2 class="mb-0 fw-bold">{{ $totalApplications }}</h2>
                            <small class="text-white-50"><i class="ti ti-arrow-up"></i> +28% dari bulan lalu</small>
                        </div>
                        <div class="bg-white bg-opacity-25 rounded px-2 py-1">
                            <small class="fw-bold">Apps</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hire Rate -->
        <div class="col-md-3">
            <div class="card text-white border-0 shadow-sm"
                style="background: linear-gradient(135deg, #22c55e, #16a34a);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <i class="ti ti-users fs-4 mb-2"></i>
                            <h6 class="text-white-50 text-uppercase fw-bold" style="font-size: 0.75rem;">Hire Rate</h6>
                            <h2 class="mb-0 fw-bold">{{ $hireRate }}%</h2>
                            <small class="text-white-50"><i class="ti ti-arrow-up"></i> +3.2% dari quarter lalu</small>
                        </div>
                        <div class="bg-white bg-opacity-25 rounded px-2 py-1">
                            <small class="fw-bold">Hired</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Time to Hire -->
        <div class="col-md-3">
            <div class="card text-white border-0 shadow-sm"
                style="background: linear-gradient(135deg, #a855f7, #9333ea);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <i class="ti ti-clock fs-4 mb-2"></i>
                            <h6 class="text-white-50 text-uppercase fw-bold" style="font-size: 0.75rem;">Time to Hire</h6>
                            <h2 class="mb-0 fw-bold">{{ $avgTimeToHire }} hari</h2>
                            <small class="text-white-50">-5 hari dari target</small>
                        </div>
                        <div class="bg-white bg-opacity-25 rounded px-2 py-1">
                            <small class="fw-bold">Avg</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Offer Acceptance -->
        <div class="col-md-3">
            <div class="card text-white border-0 shadow-sm"
                style="background: linear-gradient(135deg, #f97316, #ea580c);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <i class="ti ti-check fs-4 mb-2"></i>
                            <h6 class="text-white-50 text-uppercase fw-bold" style="font-size: 0.75rem;">Offer Acceptance
                            </h6>
                            <h2 class="mb-0 fw-bold">{{ $offerAcceptance }}%</h2>
                            <small class="text-white-50">Target: 85%</small>
                        </div>
                        <div class="bg-white bg-opacity-25 rounded px-2 py-1">
                            <small class="fw-bold">Offer</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="row g-4 mb-4">
        <!-- Hiring Process -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h6 class="fw-semibold mb-4">Hiring Process</h6>

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
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <small class="fw-medium">{{ $stage['label'] }}</small>
                                <small class="fw-bold">{{ $stage['count'] }} ({{ round($width, 0) }}%)</small>
                            </div>
                            <div class="progress" style="height: 6px;">
                                <div class="progress-bar {{ $stage['color'] }} rounded-pill" role="progressbar"
                                    style="width: {{ $width }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Recruitment Funnel (Source) -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h6 class="fw-semibold mb-4">Recruitment Source</h6>
                    <!-- Dummy Data for Visuals as requested -->
                    @php
                        // Proportional Dummy Data relative to Total Apps
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
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-1">
                                <div class="d-flex align-items-center">
                                    <span class="rounded-circle me-2"
                                        style="width: 8px; height: 8px; background-color: {{ $source['custom_color'] ?? '' }}"
                                        class="{{ isset($source['custom_color']) ? '' : $source['color'] }}"></span>
                                    <small class="fw-medium">{{ $source['label'] }}</small>
                                </div>
                                <small class="fw-bold">{{ $source['count'] }} ({{ round($width, 0) }}%)</small>
                            </div>
                            <div class="progress" style="height: 6px;">
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

    <!-- Department Table -->
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h6 class="fw-semibold mb-3">Hiring by Department</h6>
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0 ps-3 text-muted text-uppercase fw-bold" style="font-size: 0.75rem;">
                                Department</th>
                            <th class="border-0 text-muted text-uppercase fw-bold" style="font-size: 0.75rem;">Open
                                Positions</th>
                            <th class="border-0 text-muted text-uppercase fw-bold" style="font-size: 0.75rem;">
                                Applications</th>
                            <th class="border-0 text-muted text-uppercase fw-bold" style="font-size: 0.75rem;">Interviews
                            </th>
                            <th class="border-0 text-muted text-uppercase fw-bold" style="font-size: 0.75rem;">Hired</th>
                            <th class="border-0 text-muted text-uppercase fw-bold" style="font-size: 0.75rem;">Success
                                Rate</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($deptStats as $dept)
                            <tr>
                                <td class="ps-3 fw-medium">{{ $dept['name'] }}</td>
                                <td>{{ $dept['open'] }}</td>
                                <td>{{ $dept['applications'] }}</td>
                                <td>{{ $dept['interviews'] }}</td>
                                <td>{{ $dept['hired'] }}</td>
                                <td>
                                    <span class="badge bg-opacity-10 text-success bg-success px-2 rounded-pill">
                                        {{ $dept['success_rate'] }}%
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">No data available for this period
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
