@extends('layouts.default')

@section('content2')
    <!-- Filter Section -->
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
            <div class="card text-white border-0 shadow-sm" style="background: linear-gradient(135deg, #3b82f6, #2563eb);">
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
            <div class="card text-white border-0 shadow-sm" style="background: linear-gradient(135deg, #22c55e, #16a34a);">
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
            <div class="card text-white border-0 shadow-sm" style="background: linear-gradient(135deg, #a855f7, #9333ea);">
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
            <div class="card text-white border-0 shadow-sm" style="background: linear-gradient(135deg, #f97316, #ea580c);">
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
