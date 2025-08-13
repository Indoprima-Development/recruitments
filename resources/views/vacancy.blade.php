<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Opportunities | Indoprima Gemilang</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('package/dist/images/logos/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('package/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('package/dist/css/style.min.css') }}">

    <style>
        :root {
            --primary: #00f7ff;
            --primary-light: rgba(0, 247, 255, 0.1);
            --primary-dark: #00c2cb;
            --secondary: #7b2cbf;
            --dark: #0f172a;
            --darker: #020617;
            --light: #f8fafc;
            --light-muted: #94a3b8;
            --glass: rgba(255, 255, 255, 0.05);
            --border-radius: 16px;
            --transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        body {
            font-family: 'Manrope', sans-serif;
            background-color: var(--darker);
            color: var(--light);
            line-height: 1.6;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 600;
            line-height: 1.2;
        }

        /* Glass Card */
        .glass-card {
            background: rgba(15, 23, 42, 0.5);
            backdrop-filter: blur(10px);
            border-radius: var(--border-radius);
            border: 1px solid rgba(255, 255, 255, 0.1);
            overflow: hidden;
            position: relative;
            transition: var(--transition);
        }

        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 247, 255, 0.1);
        }

        /* Header Section */
        .hero-header {
            position: relative;
            overflow: hidden;
            padding: 3rem 0;
        }

        .hero-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, var(--primary-light) 0%, transparent 70%);
            animation: gradient-pulse 15s infinite alternate;
            z-index: -1;
        }

        .hero-title {
            font-size: 2.5rem;
            background: linear-gradient(to right, var(--light), var(--primary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 1rem;
        }

        /* Floating Orb */
        .floating-orb {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, var(--primary), var(--primary-dark));
            box-shadow: 0 0 40px var(--primary);
            position: relative;
            animation: pulse 4s infinite alternate;
        }

        .floating-orb::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: transparent;
            box-shadow: 0 0 60px var(--primary);
            opacity: 0.7;
            animation: pulse 3s infinite alternate-reverse;
        }

        /* Tabs */
        .modern-tabs {
            background: rgba(15, 23, 42, 0.5);
            border-radius: 12px;
            padding: 8px;
            backdrop-filter: blur(10px);
        }

        .modern-tabs .nav-link {
            color: var(--light-muted);
            background: transparent;
            border: none;
            padding: 12px 24px;
            margin-right: 8px;
            position: relative;
            transition: var(--transition);
        }

        .modern-tabs .nav-link.active {
            color: var(--light);
        }

        .modern-tabs .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 2px;
        }

        /* Job Cards */
        .job-card {
            height: 100%;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .job-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 50% 0%, rgba(0, 247, 255, 0.1), transparent 70%);
            opacity: 0;
            transition: var(--transition);
            z-index: -1;
            /* Ensure pseudo-element stays behind */
            pointer-events: none;
            /* Add this */
        }

        .job-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 247, 255, 0.15);
            border-color: rgba(0, 247, 255, 0.3);
        }

        .job-card:hover::before {
            opacity: 1;
        }

        .job-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .job-department {
            display: inline-block;
            background: rgba(0, 247, 255, 0.1);
            color: var(--primary);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .job-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 1rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            color: var(--light-muted);
            font-size: 0.875rem;
        }

        .meta-item i {
            margin-right: 6px;
            color: var(--primary);
        }

        .job-type {
            background: rgba(123, 44, 191, 0.1);
            color: var(--secondary);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .btn-apply {
            display: inline-flex;
            align-items: center;
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            color: var(--darker);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            z-index: 2;
            /* Higher than parent */
        }

        .btn-apply:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 247, 255, 0.3);
        }

        /* Create Button */
        .btn-create {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--light);
            padding: 12px 20px;
            border-radius: 12px;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .btn-create:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .btn-create::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: var(--transition);
        }

        .btn-create:hover::before {
            left: 100%;
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

        @keyframes gradient-pulse {
            0% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(10%, 10%);
            }

            100% {
                transform: translate(0, 0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }

            .modern-tabs .nav-link {
                padding: 10px 15px;
                font-size: 0.875rem;
            }
        }
    </style>

    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-KG6TYXERDJ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-KG6TYXERDJ');
</script>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('package/dist/images/logos/favicon.ico') }}" alt="Loading..." class="lds-ripple img-fluid">
    </div>

    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="horizontal" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @include('layouts.parts.headbar')
        @include('layouts.parts.sidebar')
        @include('sweetalert::alert')

        <div class="body-wrapper">
            <div class="container-fluid">
                <!-- Hero Header -->
                <div class="glass-card mb-5">
                    <div class="card-body p-5">
                        <div class="row align-items-center">
                            <div class="col-lg-9">
                                <h1 class="hero-title mb-3">Join Our Team</h1>
                                <p class="text-light-muted mb-0">Discover exciting career opportunities and be part of
                                    our innovative journey</p>
                            </div>
                            <div class="col-lg-3 text-lg-end">
                                <div class="floating-orb mx-auto mx-lg-0"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Tabs -->
                <div class="row mb-4">
                    <div class="{{ Auth::check() && (Auth::user()->role == 'ADMIN') ? 'col-lg-9' : 'col-12' }}"">
                        <div class="modern-tabs">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="all-tab" data-bs-toggle="pill"
                                        data-bs-target="#all" type="button" role="tab">
                                        <i class="ti ti-list me-2"></i>
                                        All Positions
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="staff-tab" data-bs-toggle="pill"
                                        data-bs-target="#staff" type="button" role="tab">
                                        <i class="ti ti-briefcase me-2"></i>
                                        Staff
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="nonstaff-tab" data-bs-toggle="pill"
                                        data-bs-target="#nonstaff" type="button" role="tab">
                                        <i class="ti ti-users me-2"></i>
                                        Non Staff
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="intern-tab" data-bs-toggle="pill"
                                        data-bs-target="#intern" type="button" role="tab">
                                        <i class="ti ti-star me-2"></i>
                                        Internship
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="ltc-tab" data-bs-toggle="pill" data-bs-target="#ltc"
                                        type="button" role="tab">
                                        <i class="ti ti-star me-2"></i>
                                        LTC
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    @if (Auth::check() && (Auth::user()->role == 'ADMIN'))
                        <div class="col-lg-3 text-lg-end">
                            <a target="_blank" class="btn btn-create w-100 w-lg-auto"
                                href="{{ url('ptkforms/create') }}">
                                <i class="ti ti-plus me-2"></i>
                                Create Position
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Job Listings -->
                <div class="tab-content" id="pills-tabContent">
                    <!-- All -->
                    <div class="tab-pane fade show active" id="all" role="tabpanel">
                        <div class="row gy-4">
                            @foreach ($jobs as $job)
                                @include('job-card', ['job' => $job])
                            @endforeach
                        </div>
                    </div>

                    <!-- Staff -->
                    <div class="tab-pane fade" id="staff" role="tabpanel">
                        <div class="row gy-4">
                            @foreach ($jobs->where('status_pegawai', 'Staff') as $job)
                                @include('job-card', ['job' => $job])
                            @endforeach
                        </div>
                    </div>

                    <!-- Non Staff -->
                    <div class="tab-pane fade" id="nonstaff" role="tabpanel">
                        <div class="row gy-4">
                            @foreach ($jobs->where('status_pegawai', 'Non Staff') as $job)
                                @include('job-card', ['job' => $job])
                            @endforeach
                        </div>
                    </div>

                    <!-- Internship -->
                    <div class="tab-pane fade" id="intern" role="tabpanel">
                        <div class="row gy-4">
                            @foreach ($jobs->where('status_pegawai', 'Internship') as $job)
                                @include('job-card', ['job' => $job])
                            @endforeach
                        </div>
                    </div>

                    <!-- LTC -->
                    <div class="tab-pane fade" id="ltc" role="tabpanel">
                        <div class="row gy-4">
                            @foreach ($jobs->where('status_pegawai', 'LTC') as $job)
                                @include('job-card', ['job' => $job])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <img src="{{ asset('photo/white-logo.png') }}" alt="Indoprima Gemilang" height="40"
                            class="mb-3">
                        <p class="small text-light-muted">
                            © {{ date('Y') }} <span class="text-primary">PT. Indoprima Gemilang</span><br>
                            Designed & Developed by <span class="text-primary">Information Systems Team</span>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this position?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a id="linkDelete" href="#" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalCV" tabindex="-1" aria-labelledby="cvModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-light border-0"
                style="
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 212, 255, 0.3);
            overflow: hidden;
            border: 1px solid rgba(0, 212, 255, 0.2);
        ">
                <!-- Animated header with gradient -->
                <div class="modal-header border-0 position-relative"
                    style="
                background: linear-gradient(90deg, rgba(0,212,255,0.2) 0%, rgba(9,9,121,0.3) 50%, rgba(0,212,255,0.2) 100%);
                padding: 1.5rem;
            ">
                    <h5 class="modal-title fs-4 fw-bold" id="cvModalLabel"
                        style="
                    background: linear-gradient(90deg, #00d4ff 0%, #5e72eb 100%);
                    -webkit-background-clip: text;
                    background-clip: text;
                    color: transparent;
                    letter-spacing: 1px;
                ">
                        <i class="bi bi-file-earmark-person-fill me-2"></i>
                        CV UPDATE REQUIRED
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"
                        style="
                    filter: brightness(0) invert(1);
                    opacity: 0.8;
                    transition: all 0.3s;
                "
                        onmouseover="this.style.opacity='1'; this.style.transform='scale(1.2)'"
                        onmouseout="this.style.opacity='0.8'; this.style.transform='scale(1)'"></button>
                </div>

                <!-- Glowing body content -->
                <div class="modal-body py-4 px-4" style="position: relative;">
                    <div class="d-flex align-items-start">
                        <div class="me-3"
                            style="
                        font-size: 2rem;
                        background: linear-gradient(135deg, #00d4ff 0%, #5e72eb 100%);
                        -webkit-background-clip: text;
                        background-clip: text;
                        color: transparent;
                    ">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                        </div>
                        <div>
                            <p class="mb-3" style="font-size: 1.1rem; line-height: 1.6;">
                                <span class="d-block mb-2" style="color: #00d4ff; font-weight: 500;">Important
                                    Application Requirement</span>
                                Please ensure your professional profile is fully updated in the <span
                                    style="color: #5e72eb; font-weight: 500;">Account > CV</span> section before
                                submitting your application.
                            </p>
                        </div>
                    </div>

                    <!-- Animated border effect -->
                    <div
                        style="
                    position: absolute;
                    top: 0;
                    left: 0;
                    right: 0;
                    bottom: 0;
                    border: 1px solid transparent;
                    border-radius: 15px;
                    background: linear-gradient(135deg, rgba(0,212,255,0.3) 0%, rgba(9,9,121,0.1) 50%, rgba(0,212,255,0.3) 100%);
                    pointer-events: none;
                    animation: borderPulse 4s infinite;
                ">
                    </div>
                </div>

                <!-- Hover effect buttons -->
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-outline-light me-2" data-bs-dismiss="modal"
                        style="
                    border: 1px solid rgba(0, 212, 255, 0.5);
                    border-radius: 8px;
                    transition: all 0.3s;
                    position: relative;
                    overflow: hidden;
                "
                        onmouseover="this.style.boxShadow='0 0 15px rgba(0, 212, 255, 0.5)'; this.style.borderColor='rgba(0, 212, 255, 1)'"
                        onmouseout="this.style.boxShadow='none'; this.style.borderColor='rgba(0, 212, 255, 0.5)'">
                        I'll Update Later
                    </button>
                    <button type="button" class="btn btn-primary" onclick="location.href='/forms'"
                        style="
                    background: linear-gradient(135deg, #00d4ff 0%, #5e72eb 100%);
                    border: none;
                    border-radius: 8px;
                    padding: 8px 20px;
                    font-weight: 500;
                    transition: all 0.3s;
                    position: relative;
                    overflow: hidden;
                "
                        onmouseover="this.style.boxShadow='0 0 20px rgba(0, 212, 255, 0.7)'; this.style.transform='translateY(-2px)'"
                        onmouseout="this.style.boxShadow='none'; this.style.transform='translateY(0)'">
                        Update CV Now <i class="bi bi-arrow-right ms-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes borderPulse {
            0% {
                opacity: 0.5;
            }

            50% {
                opacity: 1;
            }

            100% {
                opacity: 0.5;
            }
        }

        .modal-content {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
    </style>

    <!-- Scripts -->
    <script src="{{ asset('package/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('package/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('package/dist/js/app.horizontal.init.js') }}"></script>
    <script src="{{ asset('package/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('package/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('package/dist/js/custom.js') }}"></script>

    <script>
        // Delete confirmation
        $(document).ready(function() {
            $('#modalCV').modal('show');

            $(".btn-delete").on("click", function() {
                $('#modalDelete').modal('show');
                $('#linkDelete').attr('href', '{{ url('off-vacancy') }}/' + $(this).data('id'));
            });

            // Remove preloader when page loads
            window.addEventListener('load', function() {
                setTimeout(function() {
                    document.querySelector('.preloader').style.opacity = '0';
                    document.querySelector('.preloader').style.visibility = 'hidden';
                }, 500);
            });

            // Animate job cards on scroll
            const jobCards = document.querySelectorAll('.job-card');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1
            });

            jobCards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(card);
            });
        });
    </script>
</body>

</html>
