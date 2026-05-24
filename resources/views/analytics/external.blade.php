@extends('layouts.default')

@section('addCss')
    <style>
        .page-title-box {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            padding: 2rem;
            border-radius: 16px;
            color: white;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .page-title-pattern {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            opacity: 0.1;
            background-image: radial-gradient(#fff 1px, transparent 1px);
            background-size: 20px 20px;
        }

        .analytics-card {
            border: none;
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            height: 100%;
            border: 1px solid rgba(241, 245, 249, 1);
        }

        .analytics-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            border-color: rgba(99, 102, 241, 0.2);
        }

        .icon-box {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
        }

        /* Gradients */
        .bg-gradient-primary { background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); }
        .bg-gradient-success { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
        .bg-gradient-warning { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); }
        .bg-gradient-info { background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); }
        .bg-gradient-purple { background: linear-gradient(135deg, #a855f7 0%, #9333ea 100%); }
        .bg-gradient-teal { background: linear-gradient(135deg, #14b8a6 0%, #0d9488 100%); }

        .text-val {
            font-size: 1.5rem;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.2;
            letter-spacing: -0.02em;
        }

        .text-label {
            color: #64748b;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            display: block;
            margin-bottom: 0.25rem;
        }

        .chart-container {
            background: #fff;
            border-radius: 16px;
            padding: 1.25rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
            height: 100%;
            border: 1px solid #f1f5f9;
            min-height: 320px;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .chart-title {
            font-weight: 700;
            font-size: 1rem;
            color: #0f172a;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
    </style>
@endsection

@section('content2')
    <div class="row mb-4">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-pattern"></div>
                <div class="position-relative">
                    <h3 class="fw-bold mb-1 text-white">External Talent Analytics</h3>
                    <p class="text-white-50 mb-0 fs-6">Interactive dashboard for external recruitment performance.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Metrics Row -->
    <div class="row g-4 mb-4">
        <!-- Total Candidates -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="analytics-card p-3">
                <div class="d-flex flex-column h-100 justify-content-between">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="icon-box bg-gradient-primary text-white mb-2">
                            <i class="ti ti-users"></i>
                        </div>
                    </div>
                    <div>
                        <div class="text-val">{{ number_format($totalCandidates) }}</div>
                        <span class="text-label">Total Candidates</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Connect Sent -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="analytics-card p-3">
                <div class="d-flex flex-column h-100 justify-content-between">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="icon-box bg-gradient-info text-white mb-2">
                            <i class="ti ti-mail-forward"></i>
                        </div>
                    </div>
                    <div>
                        <div class="text-val">{{ number_format($funnelData['connect_sent']) }}</div>
                        <span class="text-label">Connect Sent</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Connected -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="analytics-card p-3">
                <div class="d-flex flex-column h-100 justify-content-between">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="icon-box bg-gradient-success text-white mb-2">
                            <i class="ti ti-link"></i>
                        </div>
                    </div>
                    <div>
                        <div class="text-val">{{ number_format($funnelData['connected']) }}</div>
                        <span class="text-label">Connected</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Responded -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="analytics-card p-3">
                <div class="d-flex flex-column h-100 justify-content-between">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="icon-box bg-gradient-warning text-white mb-2">
                            <i class="ti ti-messages"></i>
                        </div>
                    </div>
                    <div>
                        <div class="text-val">{{ number_format($funnelData['responded']) }}</div>
                        <span class="text-label">Responded</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row 1 -->
    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="chart-container">
                <div class="chart-header">
                    <h5 class="chart-title"><i class="ti ti-chart-area-line text-primary"></i> Application Trends</h5>
                </div>
                <div id="trendChart"></div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="chart-container">
                <div class="chart-header">
                    <h5 class="chart-title"><i class="ti ti-school text-success"></i> Education Level</h5>
                </div>
                <div id="eduChart"></div>
            </div>
        </div>
    </div>

    <!-- Charts Row 2 -->
    <div class="row g-4 mb-4">
        <div class="col-lg-4">
            <div class="chart-container">
                <div class="chart-header">
                    <h5 class="chart-title"><i class="ti ti-search text-purple"></i> Candidate Sources</h5>
                </div>
                <div id="sourceChart"></div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="chart-container">
                <div class="chart-header">
                    <h5 class="chart-title"><i class="ti ti-books text-teal"></i> Top Majors (Jurusan)</h5>
                </div>
                <div id="jurusanChart"></div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="chart-container">
                <div class="chart-header">
                    <h5 class="chart-title"><i class="ti ti-building-arch text-info"></i> Top Campuses</h5>
                </div>
                <div id="campusChart"></div>
            </div>
        </div>
    </div>
@endsection

@section('addJs')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        const primaryColor = '#4f46e5';
        const successColor = '#10b981';
        const warningColor = '#f59e0b';
        const infoColor = '#3b82f6';
        const purpleColor = '#a855f7';
        const tealColor = '#14b8a6';
        const pinkColor = '#ec4899';
        const greyColor = '#94a3b8';

        const chartFontFamily = 'Plus Jakarta Sans, sans-serif';

        // 1. Trend Chart
        new ApexCharts(document.querySelector("#trendChart"), {
            series: [{
                name: 'Candidates',
                data: {!! json_encode($trendCounts) !!}
            }],
            chart: {
                height: 300,
                type: 'area',
                toolbar: { show: false },
                fontFamily: chartFontFamily
            },
            dataLabels: { enabled: false },
            stroke: {
                curve: 'smooth',
                width: 3,
                colors: [primaryColor]
            },
            xaxis: {
                categories: {!! json_encode($trendLabels) !!},
                labels: { style: { colors: greyColor, fontSize: '11px' } },
                axisBorder: { show: false },
                axisTicks: { show: false }
            },
            yaxis: { show: true, labels: { style: { colors: greyColor, fontSize: '11px' } } },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.1,
                    stops: [0, 90, 100]
                }
            },
            colors: [primaryColor],
            grid: { borderColor: '#f1f5f9', strokeDashArray: 4 },
        }).render();

        // 2. Education Chart
        new ApexCharts(document.querySelector("#eduChart"), {
            series: {!! json_encode($eduCounts) !!},
            labels: {!! json_encode($eduLabels) !!},
            chart: { type: 'donut', height: 280, fontFamily: chartFontFamily },
            colors: [successColor, primaryColor, warningColor, infoColor, pinkColor],
            plotOptions: {
                pie: {
                    donut: { size: '65%' }
                }
            },
            legend: { position: 'bottom', fontSize: '11px' },
            dataLabels: { enabled: false }
        }).render();

        // 3. Source Chart
        new ApexCharts(document.querySelector("#sourceChart"), {
            series: {!! json_encode($sumberCounts) !!},
            labels: {!! json_encode($sumberLabels) !!},
            chart: { type: 'donut', height: 280, fontFamily: chartFontFamily },
            colors: [purpleColor, tealColor, infoColor, warningColor],
            plotOptions: { pie: { donut: { size: '65%' } } },
            legend: { position: 'bottom', fontSize: '11px' },
            dataLabels: { enabled: false }
        }).render();

        // 4. Jurusan Chart
        new ApexCharts(document.querySelector("#jurusanChart"), {
            series: [{
                name: 'Candidates',
                data: {!! json_encode($jurusanCounts) !!}
            }],
            chart: { type: 'bar', height: 280, toolbar: { show: false }, fontFamily: chartFontFamily },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                    distributed: true,
                    barHeight: '70%'
                }
            },
            colors: [tealColor, primaryColor, successColor, infoColor, purpleColor],
            dataLabels: { enabled: true, style: { fontSize: '10px' } },
            xaxis: {
                categories: {!! json_encode($jurusanLabels) !!},
                labels: { show: false },
                axisBorder: { show: false }
            },
            grid: { show: false },
            legend: { show: false }
        }).render();

        // 5. Campus Chart
        new ApexCharts(document.querySelector("#campusChart"), {
            series: [{
                name: 'Candidates',
                data: {!! json_encode($campusCounts) !!}
            }],
            chart: { type: 'bar', height: 280, toolbar: { show: false }, fontFamily: chartFontFamily },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                    distributed: true,
                    barHeight: '70%'
                }
            },
            colors: [infoColor, warningColor, purpleColor, successColor, pinkColor],
            dataLabels: { enabled: true, style: { fontSize: '10px' } },
            xaxis: {
                categories: {!! json_encode($campusLabels) !!},
                labels: { show: false },
                axisBorder: { show: false }
            },
            grid: { show: false },
            legend: { show: false }
        }).render();
    </script>
@endsection
