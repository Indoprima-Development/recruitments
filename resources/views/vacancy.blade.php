<!DOCTYPE html>
<html lang="en">

<head>
    <!-- --------------------------------------------------- -->
    <!-- Title -->
    <!-- --------------------------------------------------- -->
    <title>Recruitment</title>

    <!-- --------------------------------------------------- -->
    <!-- Required Meta Tag -->
    <!-- --------------------------------------------------- -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- --------------------------------------------------- -->
    <!-- Favicon -->
    <!-- --------------------------------------------------- -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('package/dist/images/logos/favicon.ico') }}" />

    <!-- --------------------------------------------------- -->
    <!-- Owl Carousel -->
    <!-- --------------------------------------------------- -->
    <link rel="stylesheet" href="{{ asset('package/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">

    <!-- --------------------------------------------------- -->
    <!-- Prism Js -->
    <!-- --------------------------------------------------- -->
    <link rel="stylesheet" href="{{ asset('package/dist/libs/prismjs/themes/prism-okaidia.min.css') }}">

    <!-- --------------------------------------------------- -->
    <!-- Core Css -->
    <!-- --------------------------------------------------- -->

    <link id="themeColors" rel="stylesheet" href="{{ asset('package/dist/css/style.min.css') }}" />
    <style>
        /* Base Styles */
        :root {
            --primary-color: #6366f1;
            --primary-light: #818cf8;
            --primary-dark: #4f46e5;
            --dark-bg: #0f172a;
            --darker-bg: #020617;
            --card-bg: rgba(15, 23, 42, 0.7);
            --text-light: #e2e8f0;
            --text-muted: #94a3b8;
            --neon-accent: #00f5d4;
            --neon-pink: #f72585;
        }

        body {
            background-color: var(--darker-bg);
            color: var(--text-light);
            font-family: 'Inter', sans-serif;
        }

        /* Glassmorphism Card */
        .glassmorphism-card {
            background: rgba(15, 23, 42, 0.5);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
            overflow: hidden;
            position: relative;
        }

        .glassmorphism-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
            z-index: -1;
        }

        /* Text Gradient */
        .text-gradient-primary {
            background: linear-gradient(90deg, var(--primary-light), var(--neon-accent));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* Floating Orb */
        .floating-orb {
            position: relative;
            width: 120px;
            height: 120px;
            margin-left: auto;
        }

        .orb-core {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, var(--primary-light), var(--primary-dark));
            box-shadow: 0 0 30px var(--primary-light);
            animation: pulse 4s infinite alternate;
        }

        .orb-glow {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: transparent;
            box-shadow: 0 0 60px var(--primary-light);
            opacity: 0.7;
            animation: pulse 3s infinite alternate-reverse;
        }

        /* Neon Tabs */
        .neon-tab-container {
            background: rgba(15, 23, 42, 0.5);
            border-radius: 12px;
            padding: 8px;
            backdrop-filter: blur(10px);
        }

        .nav-pills .nav-link {
            color: var(--text-muted);
            background: transparent;
            border: none;
            position: relative;
            padding: 12px 20px;
            margin-right: 8px;
            transition: all 0.3s ease;
        }

        .nav-pills .nav-link.active {
            color: var(--text-light);
            background: transparent;
        }

        .nav-pills .nav-link.active .tab-underline {
            width: 100%;
            background: linear-gradient(90deg, var(--primary-color), var(--neon-accent));
            box-shadow: 0 0 15px var(--primary-light);
        }

        .tab-underline {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 2px;
            width: 0;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        /* Holographic Button */
        .btn-holographic {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.2), rgba(0, 245, 212, 0.2));
            border: 1px solid rgba(99, 102, 241, 0.3);
            color: var(--text-light);
            border-radius: 10px;
            padding: 12px 20px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }

        .btn-holographic:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(99, 102, 241, 0.3);
        }

        .btn-holographic .btn-hover-effect {
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(to bottom right,
                    transparent,
                    transparent,
                    transparent,
                    rgba(99, 102, 241, 0.1),
                    transparent,
                    transparent,
                    transparent);
            transform: rotate(30deg);
            transition: all 0.7s ease;
        }

        .btn-holographic:hover .btn-hover-effect {
            left: 100%;
            top: 100%;
        }

        /* Divider Line */
        .divider-line {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(99, 102, 241, 0.5), transparent);
        }

        /* Job Cards */
        .job-card {
            background: var(--card-bg);
            border-radius: 16px;
            padding: 24px;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(99, 102, 241, 0.1);
            transition: all 0.3s ease;
            height: 100%;
        }

        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(99, 102, 241, 0.2);
            border-color: rgba(99, 102, 241, 0.3);
        }

        .job-card-glow {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 50% 0%, rgba(99, 102, 241, 0.1), transparent 70%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .job-card:hover .job-card-glow {
            opacity: 1;
        }

        .job-card-header {
            margin-bottom: 20px;
            position: relative;
        }

        .job-title {
            color: var(--text-light);
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .job-department {
            display: inline-block;
            background: rgba(99, 102, 241, 0.1);
            color: var(--primary-light);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .job-card-body {
            margin-bottom: 20px;
        }

        .job-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 16px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        .meta-item i {
            margin-right: 6px;
            font-size: 1rem;
        }

        .job-start-date {
            display: flex;
            align-items: center;
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        .job-start-date i {
            margin-right: 6px;
        }

        .job-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .job-type {
            background: rgba(0, 245, 212, 0.1);
            color: var(--neon-accent);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .job-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-icon-danger {
            background: rgba(247, 37, 133, 0.1);
            color: var(--neon-pink);
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .btn-icon-danger:hover {
            background: rgba(247, 37, 133, 0.2);
            transform: translateY(-2px);
        }

        .btn-apply {
            display: flex;
            align-items: center;
            background: linear-gradient(90deg, var(--primary-color), var(--primary-dark));
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-apply i {
            margin-left: 6px;
            transition: transform 0.3s ease;
        }

        .btn-apply:hover {
            box-shadow: 0 5px 15px rgba(99, 102, 241, 0.4);
            transform: translateY(-2px);
        }

        .btn-apply:hover i {
            transform: translateX(3px);
        }

        /* Animations */
        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            100% {
                transform: scale(1.05);
                opacity: 0.8;
            }
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Hover Float Effect */
        .hover-float {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-float:hover {
            transform: translateY(-8px);
        }
    </style>
</head>

<body>
    <!-- --------------------------------------------------- -->
    <!-- Body Wrapper -->
    <!-- --------------------------------------------------- -->
    <div class="page-wrapper" id="main-wrapper" data-layout="horizontal" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Header Start -->

        @include('layouts.parts.headbar')
        @include('layouts.parts.sidebar')
        @include('sweetalert::alert')

        <div class="body-wrapper">
            <div class="container-fluid">
                <!-- Hero Header Section -->
                <div class="card glassmorphism-card position-relative overflow-hidden mb-5">
                    <div class="card-body px-5 py-4">
                        <div class="row align-items-center">
                            <div class="col-md-9">
                                <h1 class="fw-bold mb-3 text-gradient-primary">Career Opportunities</h1>
                                <p class="text-muted-light mb-0">Join our innovative team and shape the future with us
                                </p>
                            </div>
                            <div class="col-md-3">
                                <div class="floating-orb">
                                    <div class="orb-core"></div>
                                    <div class="orb-glow"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Tabs -->
                <div class="row mb-4">
                    <div class="col-md-9">
                        <div class="neon-tab-container">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="all-tab" data-bs-toggle="pill"
                                        data-bs-target="#all" type="button" role="tab">
                                        <i class="ti ti-list me-2"></i>
                                        <span>All Positions</span>
                                        <div class="tab-underline"></div>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="staff-tab" data-bs-toggle="pill"
                                        data-bs-target="#staff" type="button" role="tab">
                                        <i class="ti ti-briefcase me-2"></i>
                                        <span>Staff</span>
                                        <div class="tab-underline"></div>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="nonstaff-tab" data-bs-toggle="pill"
                                        data-bs-target="#nonstaff" type="button" role="tab">
                                        <i class="ti ti-users me-2"></i>
                                        <span>Non-Staff</span>
                                        <div class="tab-underline"></div>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="intern-tab" data-bs-toggle="pill"
                                        data-bs-target="#intern" type="button" role="tab">
                                        <i class="ti ti-star me-2"></i>
                                        <span>Internship</span>
                                        <div class="tab-underline"></div>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    @if (Auth::check() && (Auth::user()->role == 'ADMIN' || Auth::user()->email == 'findryankurnia@gmail.com'))
                        <div class="col-md-3 text-end">
                            <button class="btn btn-holographic w-100" id="create-vacancy-btn">
                                <span class="btn-text">Create Vacancy</span>
                                <span class="btn-icon"><i class="ti ti-plus"></i></span>
                                <span class="btn-hover-effect"></span>
                            </button>
                        </div>
                    @endif
                </div>

                <!-- Divider -->
                <div class="divider-line mb-5"></div>

                <!-- Job Listings -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="all" role="tabpanel">
                        <div class="row gy-4">
                            @foreach ($jobs as $job)
                                <div class="col-lg-4 col-md-6">
                                    <div class="job-card hover-float">
                                        <div class="job-card-header">
                                            <h3 class="job-title">{{ $job->jobtitle->jobtitle_name ?? '-' }}</h3>
                                            <div class="job-department neon-badge">
                                                {{ $job->division->division_name ?? '-' }}</div>
                                        </div>

                                        <div class="job-card-body">
                                            <div class="job-meta">
                                                <div class="meta-item">
                                                    <i class="ti ti-school"></i>
                                                    <span>{{ $job->education->education_name }}</span>
                                                </div>
                                                <div class="meta-item">
                                                    <i class="ti ti-gender-bigender"></i>
                                                    @if ($job->gender == 1)
                                                        <span>Male</span>
                                                    @elseif ($job->gender == 2)
                                                        <span>Female</span>
                                                    @else
                                                        <span>Any Gender</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="job-start-date">
                                                <i class="ti ti-calendar"></i>
                                                <span>Start Date: {{ $job->date_startwork }}</span>
                                            </div>
                                        </div>

                                        <div class="job-card-footer">
                                            <div class="job-type neon-badge-accent">{{ $job->status_pegawai }}</div>

                                            <div class="job-actions">
                                                @if (Auth::check() && (Auth::user()->role == 'ADMIN' || Auth::user()->email == 'findryankurnia@gmail.com'))
                                                    <button data-id="{{ $job->id }}" type="button"
                                                        class="btn-icon-danger btn-delete">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                @endif

                                                <a href="{{ url('vacancies', $job->id) }}" class="btn-apply">
                                                    <span>Apply Now</span>
                                                    <i class="ti ti-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="job-card-glow"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Other tab panes would go here -->
                </div>
            </div>
        </div>

        <footer class="footer-part pt-8 pb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="text-center">
                            <a href="index-new.html">
                                <img src="{{ asset('photo/white-logo.png') }}" alt=""
                                    class="mb-3" height="30">
                            </a>
                            <p class="mb-0 small">
                                © {{ date('Y') }} <span class="fw-semibold text-info">PT. Indoprima
                                    Gemilang</span><br>
                                Dirancang & Dikembangkan oleh
                                <a href="https://indoprimagemilang.com"
                                    class="text-decoration-none text-info fw-semibold">Information System</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <script>
        // Add interactive animations
        document.addEventListener('DOMContentLoaded', function() {
            // Animate job cards on load
            const jobCards = document.querySelectorAll('.job-card');
            jobCards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });

            // Add hover effect to tabs
            const tabs = document.querySelectorAll('.nav-link');
            tabs.forEach(tab => {
                tab.addEventListener('mouseenter', function() {
                    if (!this.classList.contains('active')) {
                        this.querySelector('.tab-underline').style.width = '50%';
                        this.querySelector('.tab-underline').style.backgroundColor =
                            'var(--text-muted)';
                    }
                });

                tab.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('active')) {
                        this.querySelector('.tab-underline').style.width = '0';
                    }
                });
            });
        });
    </script>

    <!--  Mobilenavbar -->
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Vacancy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin menghapus data?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a id="linkDelete" href="#" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('package/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!-- ---------------------------------------------- -->
    <!-- core files -->
    <!-- ---------------------------------------------- -->
    <script src="{{ asset('package/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('package/dist/js/app.horizontal.init.js') }}"></script>
    <script src="{{ asset('package/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('package/dist/js/sidebarmenu.js') }}"></script>

    <script src="{{ asset('package/dist/js/custom.js') }}"></script>
    <script src="{{ asset('package/dist/libs/prismjs/prism.js') }}"></script>

    <!-- ---------------------------------------------- -->
    <!-- current page js files -->
    <!-- ---------------------------------------------- -->
    <script src="{{ asset('package/dist/js/apps/notes.js') }}"></script>

    <script>
        $(".btnDelete").on("click", function() {
            $('#modalDelete').modal('show')
            $('#linkDelete').attr('href', '{{ url('off-vacancy') }}/' + $(this).data('id'))
        });
    </script>
</body>

</html>
