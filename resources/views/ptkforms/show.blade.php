<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $ptkform->jobtitle->jobtitle_name }} | Indoprima Gemilang Careers</title>
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

        /* Admin Action Buttons */
        .modern-btn {
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
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

                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
                            <div>
                                <span class="job-badge">{{ $ptkform->status_pegawai }}</span>
                                <h1 class="job-title mb-0">{{ $ptkform->jobtitle->jobtitle_name }}</h1>
                            </div>
                            <button type="button" class="btn btn-outline-primary rounded-pill px-4" id="btnShare">
                                <i class="ti ti-share me-2"></i> Share
                            </button>
                        </div>

                        <div class="job-meta-row">
                            <div class="job-meta-item">
                                <div class="icon-box-sm bg-blue-light text-primary rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 32px; height: 32px;">
                                    <i class="ti ti-building fs-5"></i>
                                </div>
                                <span>{{ $ptkform->division->division_name }}</span>
                            </div>
                            <div class="job-meta-item">
                                <div class="icon-box-sm bg-green-light text-success rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 32px; height: 32px;">
                                    <i class="ti ti-map-pin fs-5"></i>
                                </div>
                                <span>Surabaya, Indonesia</span>
                            </div>
                            <div class="job-meta-item">
                                <div class="icon-box-sm bg-orange-light text-warning rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 32px; height: 32px;">
                                    <i class="ti ti-clock fs-5"></i>
                                </div>
                                <span>Full Time</span>
                            </div>
                            <div class="job-meta-item">
                                <div class="icon-box-sm bg-purple-light text-info rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 32px; height: 32px;">
                                    <i class="ti ti-calendar fs-5"></i>
                                </div>
                                <span>Posted {{ \Carbon\Carbon::parse($ptkform->created_at)->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>

    <!-- Share Toast -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="shareToast" class="toast align-items-center text-white bg-success border-0" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="ti ti-check me-2"></i> Link copied to clipboard!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row g-4">

                        <!-- Left Content -->
                        <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                            <div class="content-card">

                                <!-- Admin Approval (Only for Admin) -->
                                @if (Auth::check() && Auth::user()->role == 'Admin')
                                    <div class="alert alert-light border border-primary-subtle text-primary mb-4">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <i class="ti ti-shield-lock me-2"></i>
                                                <strong>Admin Control</strong>
                                            </div>
                                            <button type="button" class="btn btn-primary btn-sm rounded-pill"
                                                data-bs-toggle="modal" data-bs-target="#approvalModal">
                                                <i class="ti ti-check me-1"></i> Approve/Status
                                            </button>
                                        </div>
                                    </div>
                                @endif

                                <!-- Qualifications -->
                                <div class="content-section">
                                    <h3 class="section-title"><i class="ti ti-certificate"></i> Qualifications</h3>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="req-box">
                                                <small class="text-secondary d-block mb-1">Education Level</small>
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="ti ti-school text-primary"></i>
                                                    <span
                                                        class="fw-bold">{{ str_replace('Bachelor Degree', 'S1', $ptkform->education->education_name ?? '-') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="req-box">
                                                <small class="text-secondary d-block mb-1">Major Focus</small>
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="ti ti-book text-primary"></i>
                                                    <span
                                                        class="fw-bold">{{ $ptkform->major->major_name ?? 'Any Major' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="req-box">
                                                <small class="text-secondary d-block mb-1">Min. GPA</small>
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="ti ti-chart-bar text-primary"></i>
                                                    <span class="fw-bold">{{ $ptkform->ipk ?? '-' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="req-box">
                                                <small class="text-secondary d-block mb-1">Gender Requirement</small>
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="ti ti-users text-primary"></i>
                                                    <span class="fw-bold">
                                                        @if ($ptkform->gender == 1)
                                                            Male
                                                        @elseif ($ptkform->gender == 2)
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

                                <!-- Experience Requirements -->
                                @if (count($ptkfields) > 0)
                                    <div class="content-section">
                                        <h3 class="section-title"><i class="ti ti-briefcase"></i> Experience Required
                                        </h3>
                                        <div class="bg-light p-3 rounded-4 border border-light-subtle">
                                            <ul class="mb-0 ps-3">
                                                @foreach ($ptkfields as $d)
                                                    <li class="mb-2">
                                                        <span
                                                            class="fw-semibold text-dark">{{ $d->field->field_name }}</span>:
                                                        {{ $d->year }} Years
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif

                                <!-- Responsibilities -->
                                <div class="content-section">
                                    <h3 class="section-title"><i class="ti ti-list-details"></i> Job Responsibilities
                                    </h3>
                                    <div class="text-secondary" style="font-size: 1rem; line-height: 1.8;">
                                        {!! $ptkform->responsibility !!}
                                    </div>
                                </div>

                                <!-- Additional Info -->
                                <div class="content-section">
                                    <h3 class="section-title"><i class="ti ti-info-circle"></i> Additional Information
                                    </h3>
                                    <div class="text-secondary">
                                        {!! $ptkform->general_others ?? 'No additional information provided.' !!}
                                        @if ($ptkform->special_conditions)
                                            <div class="mt-3 p-3 bg-warning-subtle rounded-3 text-warning-emphasis">
                                                <strong>Special Conditions:</strong> <br>
                                                {!! $ptkform->special_conditions !!}
                                            </div>
                                        @endif
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
                                            class="sidebar-value">{{ $ptkform->department->department_name ?? '-' }}</span>
                                    </div>
                                    <div class="sidebar-row">
                                        <span class="sidebar-label">Section</span>
                                        <span
                                            class="sidebar-value">{{ $ptkform->section->section_name ?? '-' }}</span>
                                    </div>
                                    <div class="sidebar-row">
                                        <span class="sidebar-label">Start Date</span>
                                        <span
                                            class="sidebar-value">{{ date('d M Y', strtotime($ptkform->date_startwork)) }}</span>
                                    </div>
                                    <div class="sidebar-row">
                                        <span class="sidebar-label">Job Type</span>
                                        <span class="sidebar-value">{{ $ptkform->status_pegawai }}</span>
                                    </div>
                                </div>

                                <div class="sidebar-card text-center p-4" style="background: #f1f5f9; border: none;">
                                    @if (Auth::check())
                                        @if (!$isApplied)
                                            <button type="button"
                                                class="btn btn-primary btn-apply rounded-pill shadow-lg mb-3"
                                                data-bs-toggle="modal" data-bs-target="#applicationModal">
                                                Apply Now <i class="ti ti-arrow-right ms-2"></i>
                                            </button>
                                            <p class="small text-muted mb-0">You are applying as
                                                <strong>{{ Auth::user()->name }}</strong>
                                            </p>
                                        @else
                                            <button type="button"
                                                class="btn btn-success btn-apply rounded-pill shadow-lg mb-3" disabled>
                                                <i class="ti ti-check me-2"></i> Application Submitted
                                            </button>
                                            <p class="small text-muted mb-0">You have already applied for this
                                                position.</p>
                                        @endif
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

    <!-- Application Modal (Questionnaire) -->
    @if (Auth::check() && !$isApplied)
        <div class="modal fade" id="applicationModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 rounded-4 shadow-lg">
                    <div class="modal-header border-bottom p-4">
                        <h5 class="modal-title fw-bold"><i class="ti ti-clipboard-list me-2"></i> Pre-Screening
                            Questions</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ url('ptkformtransactions') }}" id="formApplication">
                        @csrf
                        <div class="modal-body p-4">
                            <input type="hidden" name="questions" value="{{ $jobtitle->questions }}">

                            @if ($jobtitle->questions && json_decode($jobtitle->questions))
                                <div class="alert alert-light border-primary-subtle text-primary mb-4">
                                    <i class="ti ti-info-circle me-2"></i> Please answer the following questions to
                                    complete your application.
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <thead class="bg-light rounded-3">
                                            <tr>
                                                <th class="ps-3 rounded-start">No</th>
                                                <th>Question</th>
                                                <th class="pe-3 rounded-end" style="min-width: 150px;">Answer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (json_decode($jobtitle->questions)->pertanyaan as $index => $question)
                                                <tr>
                                                    <td class="ps-3">{{ $index + 1 }}</td>
                                                    <td>{{ $question }}</td>
                                                    <td class="pe-3">
                                                        @if (json_decode($jobtitle->questions)->type[$index] == 'Rating')
                                                            <div class="d-flex gap-2">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    <div class="form-check form-check-inline m-0">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="jawaban_{{ $index }}"
                                                                            id="q{{ $index }}_{{ $i }}"
                                                                            value="{{ $i }}" required>
                                                                        <label class="form-check-label"
                                                                            for="q{{ $index }}_{{ $i }}">{{ $i }}</label>
                                                                    </div>
                                                                @endfor
                                                            </div>
                                                        @else
                                                            <select name="jawaban_{{ $index }}"
                                                                class="form-select form-select-sm" required>
                                                                <option value="" selected disabled>Select...
                                                                </option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-4">
                                    <div
                                        class="avatar avatar-xl bg-primary-subtle text-primary rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-check fs-1"></i>
                                    </div>
                                    <h5>Ready to Apply?</h5>
                                    <p class="text-muted">Click the button below to confirm your application for
                                        <strong>{{ $ptkform->jobtitle->jobtitle_name }}</strong>.
                                    </p>
                                </div>
                            @endif

                            <div class="form-check mt-3 bg-light p-3 rounded-3">
                                <input class="form-check-input" type="checkbox" id="agreementCheck" required>
                                <label class="form-check-label small" for="agreementCheck">
                                    I, <strong>{{ Auth::user()->name }}</strong>, agree to participate in the entire
                                    selection process in accordance with company policies and declare that the data
                                    provided is true.
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer p-3 bg-light border-0">
                            <input type="hidden" name="ptkform_id" value="{{ $ptkform->id }}">
                            <button type="button" class="btn btn-link text-muted text-decoration-none me-2"
                                data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold"
                                id="btnSubmitApplication">Submit Application</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <!-- Admin Approval Modal -->
    @if (Auth::check() && Auth::user()->role == 'Admin')
        <div class="modal fade" id="approvalModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 rounded-4 shadow-lg">
                    <div class="modal-header border-bottom">
                        <h5 class="modal-title fw-bold">Admin Approval</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ url('ptkforms/change-status', $ptkform->id) }}">
                        @csrf
                        <div class="modal-body p-4">
                            <p>Approve this vacancy as <strong>{{ Auth::user()->name }}</strong>?</p>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Start Date</label>
                                <input type="date" name="date_start" class="form-control" required
                                    value="{{ date('Y-m-d') }}">
                                <input type="hidden" name="date_end" value="31-12-2099">
                            </div>
                        </div>
                        <div class="modal-footer border-0 bg-light">
                            <button type="button" class="btn btn-link text-muted"
                                data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success rounded-pill px-4">Approve Vacancy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

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

        $("#formApplication").submit(function() {
            var btn = $("#btnSubmitApplication");
            btn.html('<span class="spinner-border spinner-border-sm me-2"></span>Processing...');
            btn.prop("disabled", true);
        });

        // Share Button Logic
        document.getElementById('btnShare').addEventListener('click', function() {
            var dummy = document.createElement('input'),
                text = window.location.href;
            document.body.appendChild(dummy);
            dummy.value = text;
            dummy.select();
            document.execCommand('copy');
            document.body.removeChild(dummy);

            var toastEl = document.getElementById('shareToast');
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        });
    </script>
</body>

</html>
