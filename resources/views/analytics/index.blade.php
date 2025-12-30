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
            overflow: hidden;
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
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        /* Gradients */
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

        .bg-gradient-purple {
            background: linear-gradient(135deg, #a855f7 0%, #9333ea 100%);
        }

        .bg-gradient-pink {
            background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
        }

        .bg-gradient-teal {
            background: linear-gradient(135deg, #14b8a6 0%, #0d9488 100%);
        }

        .bg-gradient-orange {
            background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
        }

        .bg-gradient-indigo {
            background: linear-gradient(135deg, #6366f1 0%, #4338ca 100%);
        }

        .text-val {
            font-size: 1.8rem;
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
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
            height: 100%;
            border: 1px solid #f1f5f9;
            min-height: 350px;
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
            display: flex;
            align-items: center;
            gap: 0.5rem;
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
            align-items: center;
            transition: background 0.2s;
        }

        .activity-item:hover {
            background: #f8fafc;
            padding-left: 0.5rem;
            padding-right: 0.5rem;
            border-radius: 8px;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #eff6ff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #3b82f6;
            flex-shrink: 0;
            font-size: 1.1rem;
        }

        .badge-subtle {
            background-color: rgba(241, 245, 249, 1);
            color: #475569;
            padding: 0.35em 0.65em;
            font-size: 0.75em;
            font-weight: 600;
            border-radius: 0.25rem;
        }
    </style>
@endsection

@section('content2')
    <div class="row mb-4">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-pattern"></div>
                <div class="position-relative">
                    <h2 class="fw-bold mb-1 text-white">Talent Acquisition Analytics</h2>
                    <p class="text-white-50 mb-0">Overview of your recruitment performance and pipeline statistics.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Metrics Row -->
    <div class="row g-4 mb-4">
        <!-- Total Applicants -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="analytics-card p-4">
                <div class="d-flex flex-column h-100 justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="icon-box bg-gradient-primary text-white mb-0">
                            <i class="ti ti-users"></i>
                        </div>
                        <span class="badge bg-primary bg-opacity-10 text-primary">All Time</span>
                    </div>
                    <div>
                        <div class="text-val">{{ number_format($totalApplicants) }}</div>
                        <span class="text-label">Total Applicants</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Vacancies -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="analytics-card p-4">
                <div class="d-flex flex-column h-100 justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="icon-box bg-gradient-info text-white mb-0">
                            <i class="ti ti-briefcase"></i>
                        </div>
                        <span class="badge bg-info bg-opacity-10 text-info">{{ $activeVacancies }} Active</span>
                    </div>
                    <div>
                        <div class="text-val">{{ number_format($totalVacancies) }}</div>
                        <span class="text-label">Total Jobs Postings</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hired Candidates -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="analytics-card p-4">
                <div class="d-flex flex-column h-100 justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="icon-box bg-gradient-success text-white mb-0">
                            <i class="ti ti-user-check"></i>
                        </div>
                        <span class="badge bg-success bg-opacity-10 text-success">
                            @if ($totalApplicants > 0)
                                {{ number_format(($hiredCandidates / $totalApplicants) * 100, 1) }}% Conv.
                            @else
                                0%
                            @endif
                        </span>
                    </div>
                    <div>
                        <div class="text-val">{{ number_format($hiredCandidates) }}</div>
                        <span class="text-label">Successfully Hired</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending/Pipeline -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="analytics-card p-4">
                <div class="d-flex flex-column h-100 justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="icon-box bg-gradient-warning text-white mb-0">
                            <i class="ti ti-loader"></i>
                        </div>
                        <span class="badge bg-warning bg-opacity-10 text-warning">Action Needed</span>
                    </div>
                    <div>
                        <div class="text-val">{{ number_format($funnelData['applied'] - $funnelData['hired']) }}</div>
                        <span class="text-label">Candidates in Pipeline</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row 1: Trend & Funnel -->
    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="chart-container">
                <div class="chart-header">
                    <h5 class="chart-title"><i class="ti ti-chart-area-line text-primary"></i> Application Trends (12
                        Months)</h5>
                    <span class="badge badge-subtle">Recent Activity</span>
                </div>
                <div id="trendChart"></div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="chart-container">
                <div class="chart-header">
                    <h5 class="chart-title"><i class="ti ti-filter text-success"></i> Recruitment Funnel</h5>
                </div>
                <div id="funnelChart"></div>
            </div>
        </div>
    </div>

    <!-- Row 2: Demographics (Gender, Edu, Major) -->
    <div class="row g-4 mb-4">
        <div class="col-lg-4">
            <div class="chart-container">
                <div class="chart-header">
                    <h5 class="chart-title"><i class="ti ti-gender-intergender text-purple"></i> Gender Diversity</h5>
                </div>
                <div id="genderChart"></div>
                <div class="d-flex justify-content-center gap-4 mt-3">
                    <div class="text-center">
                        <h4 class="fw-bold mb-0 text-dark">{{ $genderCounts['male'] ?? 0 }}</h4>
                        <small class="text-muted"><i class="ti ti-gender-male text-info"></i> Male</small>
                    </div>
                    <div class="text-center">
                        <h4 class="fw-bold mb-0 text-dark">{{ $genderCounts['female'] ?? 0 }}</h4>
                        <small class="text-muted"><i class="ti ti-gender-female text-danger"></i> Female</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="chart-container">
                <div class="chart-header">
                    <h5 class="chart-title"><i class="ti ti-school text-warning"></i> Education Level</h5>
                </div>
                <div id="educationChart"></div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="chart-container">
                <div class="chart-header">
                    <h5 class="chart-title">
                        <i class="ti ti-books text-teal"></i> Top Majors
                        @if ($jurusanOtherCount > 0)
                            <span class="badge bg-light text-dark border ms-2">+{{ $jurusanOtherCount }} Others</span>
                        @endif
                    </h5>
                </div>
                <div id="jurusanChart"></div>
            </div>
        </div>
    </div>

    <!-- Row 3: Geography -->
    <div class="row g-4 mb-4">
        <div class="col-lg-6">
            <div class="chart-container">
                <div class="chart-header">
                    <h5 class="chart-title">
                        <i class="ti ti-map-pin text-danger"></i> Top Provinces
                        @if ($provinceOtherCount > 0)
                            <span class="badge bg-light text-dark border ms-2">+{{ $provinceOtherCount }} Others</span>
                        @endif
                    </h5>
                </div>
                <div id="provinceChart"></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="chart-container">
                <div class="chart-header">
                    <h5 class="chart-title">
                        <i class="ti ti-map text-info"></i> Top Cities
                        @if ($cityOtherCount > 0)
                            <span class="badge bg-light text-dark border ms-2">+{{ $cityOtherCount }} Others</span>
                        @endif
                    </h5>
                </div>
                <div id="cityChart"></div>
            </div>
        </div>
    </div>

    <!-- Row 4: Physical & Academic Stats -->
    <div class="row g-4 mb-4">
        <div class="col-lg-4">
            <div class="chart-container">
                <div class="chart-header">
                    <h5 class="chart-title"><i class="ti ti-ruler-2 text-info"></i> Height Distribution</h5>
                </div>
                <div id="heightChart"></div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="chart-container">
                <div class="chart-header">
                    <h5 class="chart-title"><i class="ti ti-scale text-orange"></i> Weight Distribution</h5>
                </div>
                <div id="weightChart"></div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="chart-container">
                <div class="chart-header">
                    <h5 class="chart-title"><i class="ti ti-certificate text-danger"></i> GPA Range</h5>
                </div>
                <div id="gpaChart"></div>
            </div>
        </div>
    </div>

    <!-- Row 5: Organizational Data -->
    <div class="row g-4 mb-4">
        <div class="col-lg-6">
            <div class="chart-container">
                <div class="chart-header">
                    <h5 class="chart-title">
                        <i class="ti ti-building text-info"></i> Applications by Dept
                        @if ($deptOtherCount > 0)
                            <span class="badge bg-light text-dark border ms-2">+{{ $deptOtherCount }} Others</span>
                        @endif
                    </h5>
                </div>
                <div id="deptChart"></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="chart-container">
                <div class="chart-header">
                    <h5 class="chart-title">
                        <i class="ti ti-layout-grid text-primary"></i> Applications by Section
                        @if ($sectionOtherCount > 0)
                            <span class="badge bg-light text-dark border ms-2">+{{ $sectionOtherCount }} Others</span>
                        @endif
                    </h5>
                </div>
                <div id="sectionChart"></div>
            </div>
        </div>
    </div>

    <!-- Row 6: Recent Activity & Institute -->
    <div class="row g-4 mt-1">
        <div class="col-lg-6">
            <div class="chart-container">
                <div class="chart-header">
                    <h5 class="chart-title">
                        <i class="ti ti-building-arch text-secondary"></i> Institute Origin
                        @if ($instansiOtherCount > 0)
                            <span class="badge bg-light text-dark border ms-2">+{{ $instansiOtherCount }} Others</span>
                        @endif
                    </h5>
                </div>
                <div id="instansiChart"></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="chart-container" style="min-height: auto;">
                <div class="chart-header">
                    <h5 class="chart-title"><i class="ti ti-activity text-danger"></i> Recent Activity</h5>
                    <a href="{{ route('ptkformtransactions.index') }}"
                        class="btn btn-sm btn-outline-primary rounded-pill px-3">View All Transaction</a>
                </div>
                <ul class="activity-list">
                    @forelse($recentActivities as $activity)
                        <li class="activity-item">
                            <div class="activity-icon">
                                @if ($activity->join)
                                    <i class="ti ti-check text-white bg-success rounded-circle p-1"></i>
                                @elseif($activity->finalisasi)
                                    <i class="ti ti-file-certificate"></i>
                                @else
                                    <i class="ti ti-user-plus"></i>
                                @endif
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-dark">{{ $activity->user->name ?? 'Unknown User' }}</span>
                                    <span class="small text-muted">{{ $activity->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="small text-muted">Applied for <span
                                        class="text-primary fw-medium">{{ $activity->ptkform->jobtitle->jobtitle_name ?? 'Unknown Job' }}</span>
                                </div>
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
        const purpleColor = '#a855f7';
        const pinkColor = '#ec4899';
        const tealColor = '#14b8a6';
        const orangeColor = '#f97316';
        const greyColor = '#94a3b8';
        const indigoColor = '#6366f1';

        // 1. Trend Chart
        new ApexCharts(document.querySelector("#trendChart"), {
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
                fontFamily: 'Plus Jakarta Sans'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 3,
                colors: [primaryColor]
            },
            xaxis: {
                categories: {!! json_encode($trendLabels) !!},
                labels: {
                    style: {
                        colors: greyColor,
                        fontSize: '11px'
                    }
                },
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                }
            },
            yaxis: {
                show: true,
                labels: {
                    style: {
                        colors: greyColor
                    }
                }
            },
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
            grid: {
                borderColor: '#f1f5f9',
                strokeDashArray: 4
            },
            tooltip: {
                theme: 'light'
            }
        }).render();

        // 2. Funnel Chart
        new ApexCharts(document.querySelector("#funnelChart"), {
            series: [{
                name: 'Candidates',
                data: [{{ $funnelData['applied'] }}, {{ $funnelData['screened'] }},
                    {{ $funnelData['psychotest'] }}, {{ $funnelData['interview'] }},
                    {{ $funnelData['mcu'] }}, {{ $funnelData['offering'] }},
                    {{ $funnelData['hired'] }}
                ]
            }],
            chart: {
                type: 'bar',
                height: 350,
                toolbar: {
                    show: false
                },
                fontFamily: 'Plus Jakarta Sans'
            },
            plotOptions: {
                bar: {
                    borderRadius: 6,
                    horizontal: true,
                    distributed: true,
                    barHeight: '65%',
                    dataLabels: {
                        position: 'bottom'
                    }
                }
            },
            colors: ['#6366f1', '#818cf8', '#3b82f6', '#0ea5e9', '#06b6d4', '#22c55e', '#10b981'],
            dataLabels: {
                enabled: true,
                textAnchor: 'start',
                style: {
                    colors: ['#1e293b'],
                    fontSize: '12px',
                    fontWeight: 600
                },
                formatter: function(val) {
                    return val
                },
                offsetX: 0
            },
            xaxis: {
                categories: ['Applied', 'CV Screen', 'Psychotest', 'Interview', 'MCU', 'Offering', 'Hired'],
                labels: {
                    show: false
                },
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                }
            },
            grid: {
                show: false
            },
            legend: {
                show: false
            }
        }).render();

        // 3. Dept Chart
        new ApexCharts(document.querySelector("#deptChart"), {
            series: {!! json_encode($deptCounts) !!},
            labels: {!! json_encode($deptLabels) !!},
            chart: {
                type: 'donut',
                height: 320,
                fontFamily: 'Plus Jakarta Sans'
            },
            stroke: {
                show: true,
                colors: ['#fff'],
                width: 2
            },
            colors: [primaryColor, successColor, warningColor, infoColor, pinkColor, greyColor],
            plotOptions: {
                pie: {
                    donut: {
                        size: '70%',
                        labels: {
                            show: true,
                            total: {
                                show: true,
                                label: 'Total',
                                color: greyColor,
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
                position: 'bottom',
                fontSize: '12px'
            },
            dataLabels: {
                enabled: false
            }
        }).render();

        // 4. Section Chart
        new ApexCharts(document.querySelector("#sectionChart"), {
            series: {!! json_encode($sectionCounts) !!},
            labels: {!! json_encode($sectionLabels) !!},
            chart: {
                type: 'donut',
                height: 320,
                fontFamily: 'Plus Jakarta Sans'
            },
            stroke: {
                show: true,
                colors: ['#fff'],
                width: 2
            },
            colors: [purpleColor, orangeColor, tealColor, infoColor, pinkColor],
            plotOptions: {
                pie: {
                    donut: {
                        size: '70%',
                        labels: {
                            show: true,
                            total: {
                                show: true,
                                label: 'Total',
                                color: greyColor,
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
                position: 'bottom',
                fontSize: '12px'
            },
            dataLabels: {
                enabled: false
            }
        }).render();

        // 5. Gender Chart
        new ApexCharts(document.querySelector("#genderChart"), {
            series: [{{ $genderCounts['male'] ?? 0 }}, {{ $genderCounts['female'] ?? 0 }}],
            labels: ['Male', 'Female'],
            chart: {
                type: 'pie',
                height: 260,
                fontFamily: 'Plus Jakarta Sans'
            },
            colors: [infoColor, pinkColor],
            legend: {
                position: 'bottom'
            },
            dataLabels: {
                enabled: true,
                dropShadow: {
                    enabled: false
                }
            },
            stroke: {
                show: true,
                colors: ['#fff'],
                width: 2
            }
        }).render();

        // 6. Education Chart
        new ApexCharts(document.querySelector("#educationChart"), {
            series: [{
                name: 'Candidates',
                data: {!! json_encode($eduCounts) !!}
            }],
            chart: {
                type: 'bar',
                height: 280,
                toolbar: {
                    show: false
                },
                fontFamily: 'Plus Jakarta Sans'
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    columnWidth: '50%',
                    distributed: true,
                    dataLabels: {
                        position: 'top'
                    }
                }
            },
            colors: [primaryColor, purpleColor, infoColor, warningColor, successColor],
            dataLabels: {
                enabled: true,
                offsetY: -20,
                style: {
                    colors: ['#000000']
                }
            },
            xaxis: {
                categories: {!! json_encode($eduLabels) !!},
                labels: {
                    style: {
                        colors: greyColor,
                        fontSize: '11px'
                    }
                },
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                }
            },
            yaxis: {
                show: false
            },
            grid: {
                show: false
            },
            legend: {
                show: false
            }
        }).render();

        // 7. Majors (Jurusan) Chart
        new ApexCharts(document.querySelector("#jurusanChart"), {
            series: [{
                name: 'Candidates',
                data: {!! json_encode($jurusanCounts) !!}
            }],
            chart: {
                type: 'bar',
                height: 280,
                toolbar: {
                    show: false
                },
                fontFamily: 'Plus Jakarta Sans'
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                    barHeight: '50%'
                }
            },
            colors: [tealColor],
            dataLabels: {
                enabled: true,
                style: {
                    fontSize: '10px',
                    colors: ['#000000']
                }
            },
            xaxis: {
                categories: {!! json_encode($jurusanLabels) !!},
                labels: {
                    show: false
                },
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                }
            },
            grid: {
                show: false
            },
        }).render();

        // 8. Height Chart (Updated styling)
        new ApexCharts(document.querySelector("#heightChart"), {
            series: [{
                name: 'Candidates',
                data: {!! json_encode($heightData->values()) !!}
            }],
            chart: {
                type: 'bar',
                height: 250,
                toolbar: {
                    show: false
                },
                fontFamily: 'Plus Jakarta Sans'
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    columnWidth: '40%',
                    dataLabels: {
                        position: 'top'
                    }
                }
            },
            colors: [infoColor],
            dataLabels: {
                enabled: true,
                offsetY: -20,
                style: {
                    fontSize: '12px',
                    colors: ["#304758"]
                }
            },
            xaxis: {
                categories: {!! json_encode($heightData->keys()) !!},
                labels: {
                    style: {
                        fontSize: '11px'
                    }
                }
            },
            yaxis: {
                show: false
            },
            grid: {
                show: false
            }
        }).render();

        // 9. Weight Chart (Updated styling)
        new ApexCharts(document.querySelector("#weightChart"), {
            series: [{
                name: 'Candidates',
                data: {!! json_encode($weightData->values()) !!}
            }],
            chart: {
                type: 'bar',
                height: 250,
                toolbar: {
                    show: false
                },
                fontFamily: 'Plus Jakarta Sans'
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    columnWidth: '40%',
                    dataLabels: {
                        position: 'top'
                    }
                }
            },
            colors: [orangeColor],
            dataLabels: {
                enabled: true,
                offsetY: -20,
                style: {
                    fontSize: '12px',
                    colors: ["#304758"]
                }
            },
            xaxis: {
                categories: {!! json_encode($weightData->keys()) !!},
                labels: {
                    style: {
                        fontSize: '11px'
                    }
                }
            },
            yaxis: {
                show: false
            },
            grid: {
                show: false
            }
        }).render();

        // 10. GPA Chart
        new ApexCharts(document.querySelector("#gpaChart"), {
            series: {!! json_encode($gpaData->values()) !!},
            labels: {!! json_encode($gpaData->keys()) !!},
            chart: {
                type: 'donut',
                height: 250,
                fontFamily: 'Plus Jakarta Sans'
            },
            colors: [successColor, warningColor, primaryColor, pinkColor],
            plotOptions: {
                pie: {
                    donut: {
                        size: '65%'
                    }
                }
            },
            legend: {
                position: 'bottom',
                fontSize: '11px'
            },
            dataLabels: {
                enabled: false
            }
        }).render();

        // 11. Institute Chart (using Bar) (Updated Layout and Labels)
        new ApexCharts(document.querySelector("#instansiChart"), {
            series: [{
                name: 'Candidates',
                data: {!! json_encode($instansiCounts) !!}
            }],
            chart: {
                type: 'bar',
                height: 320,
                toolbar: {
                    show: false
                },
                fontFamily: 'Plus Jakarta Sans'
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                    barHeight: '60%',
                    distributed: true
                }
            },
            colors: [primaryColor, successColor, infoColor, warningColor, purpleColor, pinkColor, tealColor,
                orangeColor
            ],
            dataLabels: {
                enabled: true,
                style: {
                    fontSize: '10px',
                    colors: ['#000']
                }
            },
            xaxis: {
                categories: {!! json_encode($instansiLabels) !!},
                labels: {
                    show: false
                }
            },
            grid: {
                show: false
            },
            legend: {
                show: false
            }
        }).render();

        // 12. Province Chart
        new ApexCharts(document.querySelector("#provinceChart"), {
            series: [{
                name: 'Candidates',
                data: {!! json_encode($provinceCounts) !!}
            }],
            chart: {
                type: 'bar',
                height: 300,
                toolbar: {
                    show: false
                },
                fontFamily: 'Plus Jakarta Sans'
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                    barHeight: '60%'
                }
            },
            colors: [indigoColor],
            dataLabels: {
                enabled: true,
                style: {
                    fontSize: '10px'
                }
            },
            xaxis: {
                categories: {!! json_encode($provinceLabels) !!},
                labels: {
                    show: false
                }
            },
            grid: {
                show: false
            }
        }).render();

        // 13. City Chart
        new ApexCharts(document.querySelector("#cityChart"), {
            series: [{
                name: 'Candidates',
                data: {!! json_encode($cityCounts) !!}
            }],
            chart: {
                type: 'bar',
                height: 300,
                toolbar: {
                    show: false
                },
                fontFamily: 'Plus Jakarta Sans'
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                    barHeight: '60%'
                }
            },
            colors: [infoColor],
            dataLabels: {
                enabled: true,
                style: {
                    fontSize: '10px'
                }
            },
            xaxis: {
                categories: {!! json_encode($cityLabels) !!},
                labels: {
                    show: false
                }
            },
            grid: {
                show: false
            }
        }).render();
    </script>
@endsection
