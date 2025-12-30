<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Opportunities | Indoprima Gemilang</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('package/dist/images/logos/favicon.ico') }}" />

    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('package/landing/dist/libs/aos/dist/aos.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('package/landing/dist/css/style.min.css') }}">

    <style>
        :root {
            --primary: #2563eb;
            --primary-light: #3b82f6;
            --primary-dark: #1d4ed8;
            --secondary: #06b6d4;
            --text-primary: #111827;
            --text-secondary: #4b5563;
            --bg-white: #ffffff;
            --bg-light: #f8fafc;
            --border-color: #e5e7eb;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-primary);
            overflow-x: hidden;
            line-height: 1.6;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-primary);
        }

        /* Navbar & Hero */
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
            margin: 0 0.5rem;
            transition: var(--transition);
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
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .btn-nav:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .page-header-section {
            padding: 140px 0 60px;
            background: radial-gradient(circle at top center, #eff6ff 0%, #ffffff 70%);
            text-align: center;
        }

        .page-subtitle {
            font-size: 1.1rem;
            color: var(--text-secondary);
            max-width: 600px;
            margin: 0 auto;
        }

        /* Filters */
        .filter-container {
            background: white;
            padding: 0.5rem;
            border-radius: 50px;
            display: inline-flex;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
            margin-bottom: 3rem;
            flex-wrap: wrap;
            justify-content: center;
        }

        .nav-pills .nav-link {
            border-radius: 50px;
            color: var(--text-secondary) !important;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            margin: 0;
            transition: var(--transition);
        }

        .nav-pills .nav-link.active {
            background-color: var(--primary);
            color: white !important;
            box-shadow: var(--shadow-sm);
        }

        /* Slim Horizontal Job Card */
        .job-card-horizontal {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: var(--transition);
            text-decoration: none;
            color: inherit;
            height: 100%;
        }

        .job-card-horizontal:hover {
            border-color: var(--primary-light);
            transform: translateX(4px);
            box-shadow: var(--shadow);
            background: #f8fafc;
        }

        .job-card-icon-wrapper {
            flex-shrink: 0;
        }

        .job-icon-slim {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            background: #eff6ff;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
        }

        .job-card-content {
            flex-grow: 1;
            min-width: 0;
            /* Prevent overflow */
        }

        .job-title-slim {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .job-dept-slim {
            font-size: 0.85rem;
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            margin-bottom: 0.25rem;
        }

        .job-status-slim {
            font-size: 0.7rem;
            font-weight: 600;
            padding: 0.15rem 0.6rem;
            border-radius: 4px;
            text-transform: uppercase;
            display: inline-block;
        }

        .status-staff {
            background: #e0f2fe;
            color: #0284c7;
        }

        .status-nonstaff {
            background: #f1f5f9;
            color: #475569;
        }

        .status-intern {
            background: #f0fdf4;
            color: #16a34a;
        }

        .job-card-action {
            flex-shrink: 0;
        }

        .btn-icon-action {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: white;
            border: 1px solid var(--border-color);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .job-card-horizontal:hover .btn-icon-action {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        /* Footer */
        .footer {
            background: #0f172a;
            color: white;
            padding: 60px 0 20px;
        }

        .footer-logo {
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

        @media (max-width: 768px) {
            .job-card-horizontal {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
            }

            .job-card-action {
                align-self: flex-end;
                margin-top: -30px;
            }
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
                        <a class="nav-link" href="{{ url('vacancies') }}"
                            style="color: var(--primary) !important;">Career Opportunities</a>
                    </li>
                    @if (!Auth::check())
                        <li class="nav-item ms-lg-3">
                            <a class="btn-nav" href="{{ url('auth/login') }}">
                                <i class="fas fa-sign-in-alt me-2"></i>Sign In
                            </a>
                        </li>
                    @else
                        <li class="nav-item ms-lg-3 dropdown">
                            <a class="btn btn-light rounded-pill border py-1 px-2 d-flex align-items-center gap-2 dropdown-toggle"
                                href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                @if (Auth::user()->photo)
                                    <img src="{{ asset(Auth::user()->photo) }}" class="rounded-circle object-fit-cover"
                                        width="32" height="32" alt="" />
                                @else
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold"
                                        style="width: 32px; height: 32px; font-size: 0.8rem;">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                @endif
                                <span class="fw-semibold small text-dark me-1">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-4 mt-2 p-2"
                                aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item rounded-3 py-2" href="{{ url('dashboard') }}">
                                        <i class="ti ti-layout-dashboard me-2 text-primary"></i> Dashboard User
                                    </a>
                                </li>
                                @if (Auth::user()->role == 'ADMIN')
                                    <li>
                                        <a class="dropdown-item rounded-3 py-2" href="{{ url('home') }}">
                                            <i class="ti ti-chart-pie me-2 text-primary"></i> Admin Page
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item rounded-3 py-2 text-danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="ti ti-logout me-2"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="page-header-section">
        <div class="container" data-aos="fade-up">
            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3 fw-bold">Grow With
                Us</span>
            <h1 class="display-5 fw-bold mb-3">Explore Opportunities</h1>
            <p class="page-subtitle">
                Join our team of innovators and shape the future of the automotive industry.
                Find the perfect role that matches your passion and skills.
            </p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="pb-5">
        <div class="container">

            <!-- Filters -->
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="filter-container">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="all-tab" data-bs-toggle="pill" data-bs-target="#all"
                                type="button" role="tab">
                                <i class="ti ti-layout-grid me-1"></i> All Jobs
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="staff-tab" data-bs-toggle="pill" data-bs-target="#staff"
                                type="button" role="tab">
                                Staff
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nonstaff-tab" data-bs-toggle="pill"
                                data-bs-target="#nonstaff" type="button" role="tab">
                                Non Staff
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="intern-tab" data-bs-toggle="pill" data-bs-target="#intern"
                                type="button" role="tab">
                                Internship
                            </button>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Admin Create Button (Only if Admin) -->
            @if (Auth::check() && Auth::user()->role == 'ADMIN')
                <div class="text-end mb-4">
                    <a href="{{ url('ptkforms/create') }}" class="btn btn-sm btn-primary rounded-pill px-3">
                        <i class="ti ti-plus me-1"></i> Create Position
                    </a>
                </div>
            @endif

            <!-- Job Listings -->
            <div class="tab-content" id="pills-tabContent">

                <!-- Helper for rendering cards -->
                @php
                    function renderJobCard($job)
                    {
                        $badgeClass = 'bg-light text-dark';
                        if ($job->status_pegawai == 'Staff') {
                            $badgeClass = 'status-staff';
                        } elseif ($job->status_pegawai == 'Non Staff') {
                            $badgeClass = 'status-nonstaff';
                        } elseif ($job->status_pegawai == 'Internship') {
                            $badgeClass = 'status-intern';
                        }

                        $icon = 'ti-briefcase';
                        if ($job->status_pegawai == 'Non Staff') {
                            $icon = 'ti-tool';
                        }
                        if ($job->status_pegawai == 'Internship') {
                            $icon = 'ti-school';
                        }

                        // Encrypt ID
                        try {
                            $encryptedId = Crypt::encryptString($job->id);
                        } catch (\Exception $e) {
                            $encryptedId = $job->id; // Fallback
                        }

                        return '
                        <div class="col-lg-6" data-aos="fade-up">
                            <a href="' .
                            url('vacancies', $encryptedId) .
                            '" class="job-card-horizontal">
                                <div class="job-card-icon-wrapper">
                                    <div class="job-icon-slim">
                                        <i class="ti ' .
                            $icon .
                            '"></i>
                                    </div>
                                </div>
                                <div class="job-card-content">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                         <h3 class="job-title-slim">' .
                            ($job->jobtitle->jobtitle_name ?? '-') .
                            '</h3>
                                         <span class="job-status-slim ' .
                            $badgeClass .
                            '">' .
                            $job->status_pegawai .
                            '</span>
                                    </div>
                                    <div class="job-dept-slim mb-2">
                                        <i class="ti ti-building me-1"></i> ' .
                            ($job->division->division_name ?? '-') .
                            '
                                        <span class="mx-2">•</span>
                                        <i class="ti ti-map-pin me-1"></i> Surabaya
                                    </div>
                                    <div class="d-flex gap-3 text-muted small">
                                         <span title="Education"><i class="ti ti-certificate me-1"></i> ' .
                            str_replace('Bachelor Degree', 'S1', $job->education->education_name ?? '-') .
                            '</span>
                                         <span title="Gender"><i class="ti ti-users me-1"></i> ' .
                            ($job->gender == 1 ? 'Male' : ($job->gender == 2 ? 'Female' : 'Any')) .
                            '</span>
                                    </div>
                                </div>
                                <div class="job-card-action">
                                    <div class="btn-icon-action">
                                        <i class="ti ti-chevron-right"></i>
                                    </div>
                                </div>
                            </a>
                        </div>';
                    }
                @endphp

                <!-- All Jobs -->
                <div class="tab-pane fade show active" id="all" role="tabpanel">
                    <div class="row g-3">
                        @foreach ($jobs as $job)
                            {!! renderJobCard($job) !!}
                        @endforeach
                    </div>
                </div>

                <!-- Staff -->
                <div class="tab-pane fade" id="staff" role="tabpanel">
                    <div class="row g-3">
                        @foreach ($jobs->where('status_pegawai', 'Staff') as $job)
                            {!! renderJobCard($job) !!}
                        @endforeach
                    </div>
                </div>

                <!-- Non Staff -->
                <div class="tab-pane fade" id="nonstaff" role="tabpanel">
                    <div class="row g-3">
                        @foreach ($jobs->where('status_pegawai', 'Non Staff') as $job)
                            {!! renderJobCard($job) !!}
                        @endforeach
                    </div>
                </div>

                <!-- Internship -->
                <div class="tab-pane fade" id="intern" role="tabpanel">
                    <div class="row g-3">
                        @foreach ($jobs->where('status_pegawai', 'Internship') as $job)
                            {!! renderJobCard($job) !!}
                        @endforeach
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
