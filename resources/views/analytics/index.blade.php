@extends('layouts.default')

@section('addCss')
    <style>
        .analytics-card {
            border: none;
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        .analytics-card:hover {
            transform: translateY(-5px);
        }

        .icon-box {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
        }

        .bg-gradient-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }

        .bg-gradient-warning {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        }

        .bg-gradient-info {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        }

        .text-val {
            font-size: 1.75rem;
            font-weight: 800;
            color: #1e293b;
        }

        .text-label {
            color: #64748b;
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .chart-container {
            background: #fff;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
            height: 100%;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .chart-title {
            font-weight: 700;
            font-size: 1.1rem;
            color: #0f172a;
        }

        .activity-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .activity-item {
            padding: 1rem 0;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            gap: 1rem;
            align-items: flex-start;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
            flex-shrink: 0;
        }
    </style>
@endsection

@section('content2')
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="fw-bold text-dark mb-1">Talent Acquisition Analytics</h2>
            <p class="text-muted">Real-time insights into your recruitment pipeline and performance.</p>
        </div>
    </div>

    <!-- Key Metrics Row -->
    <div class="row g-4 mb-4">
        <!-- Total Applicants -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="analytics-card p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <span class="text-label">Total Applicants</span>
                        <div class="text-val mt-1">{{ number_format($totalApplicants) }}</div>
                        <div class="mt-2 text-success small fw-bold">
                            <i class="ti ti-trending-up me-1"></i> Lifetime
                        </div>
                    </div>
                    <div class="icon-box bg-gradient-primary text-white">
                        <i class="ti ti-users"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Vacancies -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="analytics-card p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <span class="text-label">Active Vacancies</span>
                        <div class="text-val mt-1">{{ number_format($activeVacancies) }}</div>
                        <div class="mt-2 text-muted small">
                            out of {{ $totalVacancies }} Total Created
                        </div>
                    </div>
                    <div class="icon-box bg-gradient-info text-white">
                        <i class="ti ti-briefcase"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hired Candidates -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="analytics-card p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <span class="text-label">Hired Candidates</span>
                        <div class="text-val mt-1">{{ number_format($hiredCandidates) }}</div>
                        <div class="mt-2 text-success small fw-bold">
                            @if ($totalApplicants > 0)
                                {{ number_format(($hiredCandidates / $totalApplicants) * 100, 1) }}% Conversion
                            @else
                                0% Conversion
                            @endif
                        </div>
                    </div>
                    <div class="icon-box bg-gradient-success text-white">
                        <i class="ti ti-user-check"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Reviews (Calculated Estimate) -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="analytics-card p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <span class="text-label">In Pipeline</span>
                        <div class="text-val mt-1">{{ number_format($funnelData['applied'] - $funnelData['hired']) }}</div>
                        <div class="mt-2 text-warning small fw-bold">
                            Needs Action
                        </div>
                    </div>
                    <div class="icon-box bg-gradient-warning text-white">
                        <i class="ti ti-clock"></i>
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
                    <h5 class="chart-title">Application Trends (Last 6 Months)</h5>
                    <button class="btn btn-sm btn-light border"><i class="ti ti-download"></i></button>
                </div>
                <div id="trendChart"></div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="chart-container">
                <div class="chart-header">
                    <h5 class="chart-title">Recruitment Funnel</h5>
                </div>
                <div id="funnelChart"></div>
            </div>
        </div>
    </div>

    <!-- Charts Row 2 -->
    <div class="row g-4">
        <div class="col-lg-5">
            <div class="chart-container">
                <div class="chart-header">
                    <h5 class="chart-title">Applicants by Department</h5>
                </div>
                <div id="deptChart"></div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="chart-container">
                <div class="chart-header">
                    <h5 class="chart-title">Recent Activity</h5>
                    <a href="{{ route('ptkformtransactions.index') }}" class="btn btn-sm btn-primary">View All</a>
                </div>
                <ul class="activity-list">
                    @forelse($recentActivities as $activity)
                        <li class="activity-item">
                            <div class="activity-icon">
                                <i class="ti ti-file-text"></i>
                            </div>
                            <div>
                                <div class="fw-bold text-dark">{{ $activity->user->name ?? 'Unknown User' }}</div>
                                <div class="small text-muted">Applied for <span
                                        class="text-primary">{{ $activity->ptkform->jobtitle->jobtitle_name ?? 'Unknown Job' }}</span>
                                </div>
                                <small class="text-muted"><i class="ti ti-clock me-1"></i>
                                    {{ $activity->created_at->diffForHumans() }}</small>
                            </div>
                        </li>
                    @empty
                        <li class="py-3 text-center text-muted">No recent activity found.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('addJs')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // Theme Colors
        const primaryColor = '#4f46e5';
        const successColor = '#10b981';
        const warningColor = '#f59e0b';
        const infoColor = '#3b82f6';
        const greyColor = '#94a3b8';

        // 1. Trend Chart (Area)
        var trendOptions = {
            series: [{
                name: 'Applications',
                data: {!! json_encode($trendCounts) !!}
            }],
            chart: {
                height: 350,
                type: 'area',
                toolbar: {
                    show: false
                },
                fontFamily: 'Plus Jakarta Sans, sans-serif'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 3
            },
            xaxis: {
                categories: {!! json_encode($trendLabels) !!},
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                }
            },
            yaxis: {
                show: true
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.2,
                    stops: [0, 90, 100]
                }
            },
            colors: [primaryColor],
            grid: {
                borderColor: '#f1f5f9',
                strokeDashArray: 4,
            }
        };
        new ApexCharts(document.querySelector("#trendChart"), trendOptions).render();

        // 2. Funnel Chart (Bar)
        var funnelOptions = {
            series: [{
                name: 'Candidates',
                data: [
                    {{ $funnelData['applied'] }},
                    {{ $funnelData['screened'] }},
                    {{ $funnelData['psychotest'] }},
                    {{ $funnelData['interview'] }},
                    {{ $funnelData['mcu'] }},
                    {{ $funnelData['offering'] }},
                    {{ $funnelData['hired'] }}
                ]
            }],
            chart: {
                type: 'bar',
                height: 350,
                toolbar: {
                    show: false
                },
                fontFamily: 'Plus Jakarta Sans, sans-serif'
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                    distributed: true,
                    barHeight: '70%'
                }
            },
            colors: [
                '#6366f1', '#818cf8', '#3b82f6', '#0ea5e9', '#06b6d4', '#22c55e', '#10b981'
            ],
            dataLabels: {
                enabled: true,
                textAnchor: 'start',
                style: {
                    colors: ['#fff']
                },
                formatter: function(val, opt) {
                    return val
                },
                offsetX: 0,
            },
            xaxis: {
                categories: ['Applied', 'CV Screen', 'Psychotest', 'Interview', 'MCU', 'Offering', 'Hired'],
            },
            legend: {
                show: false
            }
        };
        new ApexCharts(document.querySelector("#funnelChart"), funnelOptions).render();

        // 3. Department Chart (Donut)
        var deptOptions = {
            series: {!! json_encode($deptCounts) !!},
            labels: {!! json_encode($deptLabels) !!},
            chart: {
                type: 'donut',
                height: 320,
                fontFamily: 'Plus Jakarta Sans, sans-serif'
            },
            colors: [primaryColor, successColor, warningColor, infoColor, '#ec4899', greyColor],
            plotOptions: {
                pie: {
                    donut: {
                        size: '70%',
                        labels: {
                            show: true,
                            total: {
                                show: true,
                                label: 'Total',
                                formatter: function(w) {
                                    return w.globals.seriesTotals.reduce((a, b) => {
                                        return a + b
                                    }, 0)
                                }
                            }
                        }
                    }
                }
            },
            legend: {
                position: 'bottom'
            },
            dataLabels: {
                enabled: false
            }
        };
        new ApexCharts(document.querySelector("#deptChart"), deptOptions).render();
    </script>
@endsection
