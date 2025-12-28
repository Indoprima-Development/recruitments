<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $job->jobtitle->jobtitle_name }} | Indoprima Gemilang Careers</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('package/dist/images/logos/favicon.ico') }}" />

    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('package/landing/dist/libs/aos/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('package/landing/dist/css/style.min.css') }}">

    <style>
        :root {
            --primary: #2563eb;
            --primary-light: #3b82f6;
            --primary-dark: #1d4ed8;
            --text-primary: #111827;
            --text-secondary: #4b5563;
            --bg-light: #f8fafc;
            --border-color: #e5e7eb;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-primary);
            line-height: 1.6;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-primary);
        }

        /* Navbar */
        .navbar {
            backdrop-filter: blur(12px);
            background-color: rgba(255, 255, 255, 0.95) !important;
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 0;
            transition: var(--transition);
        }

        .navbar-brand img {
            height: 40px;
        }

        .nav-link {
            color: var(--text-secondary) !important;
            font-weight: 500;
            transition: var(--transition);
            margin: 0 0.5rem;
        }

        .nav-link:hover {
            color: var(--primary) !important;
        }

        .btn-nav {
            background-color: var(--primary);
            color: white !important;
            padding: 0.5rem 1.25rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .btn-nav:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        /* Job Header */
        .job-header {
            background: white;
            padding: 140px 0 3rem;
            border-bottom: 1px solid var(--border-color);
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 1.5rem;
            transition: var(--transition);
        }

        .back-link:hover {
            color: var(--primary);
            transform: translateX(-4px);
        }

        .job-title {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        .job-badge {
            display: inline-block;
            padding: 0.35rem 1rem;
            background: #eff6ff;
            color: var(--primary);
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
            margin-bottom: 1rem;
            text-transform: uppercase;
        }

        .job-meta-row {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-top: 1rem;
            color: var(--text-secondary);
        }

        .job-meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.95rem;
        }

        .job-meta-item i {
            color: var(--primary);
            font-size: 1.1rem;
        }

        /* Content Layout */
        .content-card {
            background: white;
            border-radius: 16px;
            padding: 2.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border-color);
        }

        .content-section {
            margin-bottom: 3rem;
        }

        .content-section:last-child {
            margin-bottom: 0;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid #f1f5f9;
        }

        .section-title i {
            color: var(--primary);
        }

        .req-box {
            background: #f8fafc;
            border-radius: 12px;
            padding: 1.25rem;
            height: 100%;
            border: 1px solid var(--border-color);
        }

        /* Sidebar */
        .sidebar {
            position: sticky;
            top: 120px;
        }

        .sidebar-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            border: 1px solid var(--border-color);
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .sidebar-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.9rem;
        }

        .sidebar-row:last-child {
            border-bottom: none;
        }

        .sidebar-label {
            color: var(--text-secondary);
        }

        .sidebar-value {
            font-weight: 600;
            color: var(--text-primary);
            text-align: right;
        }

        .btn-apply {
            width: 100%;
            padding: 1rem;
            font-size: 1rem;
            font-weight: 700;
        }

        /* Footer */
        .footer {
            background: #0f172a;
            color: white;
            padding: 60px 0 20px;
        }

        .footer-logo {
            filter: brightness(0) invert(1);
            height: 35px;
            margin-bottom: 1.5rem;
        }

        .social-link {
            width: 35px;
            height: 35px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: var(--transition);
        }

        .social-link:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('photo/white-logo.png') }}" alt="Indoprima Gemilang">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('vacancies') }}">Career Opportunities</a>
                    </li>
                    @if (!Auth::check())
                        <li class="nav-item ms-lg-3">
                            <a class="btn-nav" href="{{ url('auth/login') }}">
                                <i class="fas fa-sign-in-alt me-2"></i>Sign In
                            </a>
                        </li>
                    @else
                        <li class="nav-item ms-lg-3">
                            <a class="btn-nav" href="{{ url('dashboard') }}">
                                <i class="fas fa-columns me-2"></i>Dashboard
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Job Header -->
    <header class="job-header">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div data-aos="fade-up">
                        <a href="{{ url('vacancies') }}" class="back-link">
                            <i class="ti ti-arrow-left me-2"></i> Back to All Jobs
                        </a>

                        <div>
                            <span class="job-badge">{{ $job->status_pegawai }}</span>
                            <h1 class="job-title">{{ $job->jobtitle->jobtitle_name }}</h1>

                            <div class="job-meta-row">
                                <div class="job-meta-item">
                                    <i class="ti ti-building"></i>
                                    <span>{{ $job->division->division_name }}</span>
                                </div>
                                <div class="job-meta-item">
                                    <i class="ti ti-map-pin"></i>
                                    <span>Surabaya, Indonesia</span>
                                </div>
                                <div class="job-meta-item">
                                    <i class="ti ti-clock"></i>
                                    <span>Full Time</span>
                                </div>
                                <div class="job-meta-item">
                                    <i class="ti ti-calendar"></i>
                                    <span>Posted {{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row g-4">

                        <!-- Left Content -->
                        <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                            <div class="content-card">

                                <!-- Requirements -->
                                <div class="content-section">
                                    <h3 class="section-title"><i class="ti ti-certificate"></i> Qualifications</h3>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="req-box">
                                                <small class="text-secondary d-block mb-1">Education Level</small>
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="ti ti-school text-primary"></i>
                                                    <span
                                                        class="fw-bold">{{ str_replace('Bachelor Degree', 'S1', $job->education->education_name ?? '-') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="req-box">
                                                <small class="text-secondary d-block mb-1">Major Focus</small>
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="ti ti-book text-primary"></i>
                                                    <span
                                                        class="fw-bold">{{ $job->major->major_name ?? 'Any Major' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="req-box">
                                                <small class="text-secondary d-block mb-1">Min. GPA</small>
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="ti ti-chart-bar text-primary"></i>
                                                    <span class="fw-bold">{{ $job->ipk ?? '-' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="req-box">
                                                <small class="text-secondary d-block mb-1">Gender Requirement</small>
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="ti ti-users text-primary"></i>
                                                    <span class="fw-bold">
                                                        @if ($job->gender == 1)
                                                            Male
                                                        @elseif ($job->gender == 2)
                                                            Female
                                                        @else
                                                            Male / Female
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Responsibilities -->
                                <div class="content-section">
                                    <h3 class="section-title"><i class="ti ti-list-details"></i> Job Responsibilities
                                    </h3>
                                    <div class="text-secondary" style="font-size: 1rem; line-height: 1.8;">
                                        {!! $job->responsibility !!}
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Right Sidebar -->
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="sidebar">
                                <div class="sidebar-card">
                                    <h5 class="fw-bold mb-3">Job Overview</h5>
                                    <div class="sidebar-row">
                                        <span class="sidebar-label">Department</span>
                                        <span
                                            class="sidebar-value">{{ $job->department->department_name ?? '-' }}</span>
                                    </div>
                                    <div class="sidebar-row">
                                        <span class="sidebar-label">Section</span>
                                        <span class="sidebar-value">{{ $job->section->section_name ?? '-' }}</span>
                                    </div>
                                    <div class="sidebar-row">
                                        <span class="sidebar-label">Start Date</span>
                                        <span
                                            class="sidebar-value">{{ date('d M Y', strtotime($job->date_startwork)) }}</span>
                                    </div>
                                    <div class="sidebar-row">
                                        <span class="sidebar-label">Job Type</span>
                                        <span class="sidebar-value">{{ $job->status_pegawai }}</span>
                                    </div>
                                </div>

                                <div class="sidebar-card text-center p-4" style="background: #f1f5f9; border: none;">
                                    @if (Auth::check())
                                        <button type="button"
                                            class="btn btn-primary btn-apply rounded-pill shadow-lg mb-3"
                                            data-bs-toggle="modal" data-bs-target="#applyModal">
                                            Apply Now <i class="ti ti-arrow-right ms-2"></i>
                                        </button>
                                        <p class="small text-muted mb-0">You are applying as
                                            <strong>{{ Auth::user()->name }}</strong></p>
                                    @else
                                        <i class="ti ti-lock text-muted fs-8 mb-3 d-block"></i>
                                        <h6 class="fw-bold mb-2">Login Required</h6>
                                        <p class="small text-muted mb-3">Please sign in to apply for this position.</p>
                                        <a href="{{ url('auth/login') }}"
                                            class="btn btn-primary w-100 rounded-pill mb-2">Sign In</a>
                                        <a href="{{ url('auth/register') }}"
                                            class="btn btn-outline-primary w-100 rounded-pill">Create Account</a>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <img src="{{ asset('photo/white-logo.png') }}" class="footer-logo" alt="Logo">
                    <h3 class="fw-bold mb-4 fs-4">Start your journey with us</h3>

                    <div class="d-flex justify-content-center gap-3 mb-4">
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                    </div>

                    <div class="border-top border-secondary border-opacity-25 pt-4">
                        <p class="small opacity-50 mb-0">
                            © {{ date('Y') }} PT. Indoprima Gemilang. All rights reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Apply Modal -->
    <div class="modal fade" id="applyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
                <div class="modal-header bg-primary text-white border-0 p-4">
                    <h5 class="modal-title fw-bold"><i class="ti ti-send me-2"></i> Submit Application</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ url('ptkformtransactions') }}">
                    @csrf
                    <div class="modal-body p-4 text-center">
                        <div class="avatar avatar-xl rounded-circle bg-primary-subtle text-primary mx-auto mb-3 d-flex align-items-center justify-content-center"
                            style="width: 80px; height: 80px;">
                            <i class="ti ti-briefcase fs-1"></i>
                        </div>
                        <h4 class="fw-bold mb-1">{{ $job->jobtitle->jobtitle_name }}</h4>
                        <p class="text-muted mb-4">{{ $job->division->division_name }}</p>

                        <div class="alert alert-light border border-primary-subtle text-primary text-start d-flex align-items-center mb-0"
                            role="alert">
                            <i class="ti ti-info-circle fs-5 me-3"></i>
                            <div class="small">
                                You are about to apply for this position. Please ensure your profile and CV are up to
                                date.
                            </div>
                        </div>

                        <input type="hidden" name="ptkform_id" value="{{ $job->id }}" />
                    </div>
                    <div class="modal-footer border-0 bg-light p-3 justify-content-center">
                        <button type="button" class="btn btn-link text-muted text-decoration-none me-3"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-5 fw-bold">Confirm
                            Application</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('package/landing/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('package/landing/dist/libs/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('package/landing/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true
        });

        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $('.navbar').addClass('shadow-sm');
            } else {
                $('.navbar').removeClass('shadow-sm');
            }
        });
    </script>
</body>

</html>
