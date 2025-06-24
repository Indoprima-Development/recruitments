<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indoprima Gemilang | Future Careers</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('package/landing/dist/images/logos/favicon.ico') }}">

    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('package/landing/dist/libs/aos/dist/aos.css') }}">
    <link rel="stylesheet"
        href="{{ asset('package/landing/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('package/landing/dist/css/style.min.css') }}">

    <style>
        :root {
            --primary: #00f7ff;
            --primary-dark: #00c2cb;
            --secondary: #7b2cbf;
            --dark: #0a0a1a;
            --darker: #050510;
            --light: #f0f8ff;
            --glass: rgba(255, 255, 255, 0.05);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--darker);
            color: var(--light);
            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Space Grotesk', sans-serif;
        }

        /* Navbar */
        .navbar {
            backdrop-filter: blur(10px);
            background-color: rgba(10, 10, 26, 0.8) !important;
            border-bottom: 1px solid rgba(0, 247, 255, 0.1);
        }

        .nav-link,
        .navbar-brand {
            color: var(--light) !important;
        }

        .btn-nav {
            border: 1px solid var(--primary);
            color: var(--primary);
            transition: all 0.3s ease;
        }

        .btn-nav:hover {
            background-color: var(--primary);
            color: var(--darker);
            box-shadow: 0 0 15px var(--primary);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--darker), var(--dark));
            position: relative;
            overflow: hidden;
            padding: 120px 0;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(0, 247, 255, 0.05) 0%, transparent 70%);
            animation: pulse 15s infinite alternate;
        }

        @keyframes pulse {
            0% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(10%, 10%);
            }

            100% {
                transform: translate(-10%, -10%);
            }
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(to right, var(--light), var(--primary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            line-height: 1.2;
        }

        .hero-title2 {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(to right, var(--light), var(--primary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            line-height: 1.2;
        }

        .hero-subtitle {
            position: relative;
            display: inline-block;
        }

        .hero-subtitle::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(to right, var(--primary), transparent);
        }

        /* Buttons */
        .btn-primary-accent {
            background-color: var(--primary);
            color: var(--darker);
            font-weight: 600;
            padding: 12px 28px;
            border-radius: 50px;
            transition: all 0.3s ease;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .btn-primary-accent:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 247, 255, 0.3);
        }

        .btn-primary-accent::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }

        .btn-primary-accent:hover::before {
            left: 100%;
        }

        .btn-outline-accent {
            border: 2px solid var(--primary);
            color: var(--primary);
            background: transparent;
            font-weight: 600;
            padding: 12px 28px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-outline-accent:hover {
            background-color: var(--primary);
            color: var(--darker);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 247, 255, 0.3);
        }

        /* Cards */
        .glass-card {
            background: var(--glass);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        .glass-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 50% 0%, rgba(0, 247, 255, 0.1), transparent 70%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .glass-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 247, 255, 0.15);
            border-color: rgba(0, 247, 255, 0.3);
        }

        .glass-card:hover::before {
            opacity: 1;
        }

        /* Job Cards */
        .job-card {
            height: 100%;
            transition: all 0.3s ease;
        }

        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 247, 255, 0.2);
        }

        /* Process Steps */
        .process-step {
            position: relative;
            padding: 30px 20px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .process-step::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 30px;
            background-color: var(--primary);
            border-radius: 50%;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .process-step:hover {
            transform: translateY(-10px);
        }

        .process-step:hover::after {
            opacity: 1;
            bottom: -20px;
        }

        /* Floating Elements */
        .floating-element {
            position: absolute;
            border-radius: 50%;
            filter: blur(40px);
            opacity: 0.3;
            z-index: 0;
        }

        .element-1 {
            width: 300px;
            height: 300px;
            background-color: var(--primary);
            top: 10%;
            left: 10%;
            animation: float 8s ease-in-out infinite;
        }

        .element-2 {
            width: 200px;
            height: 200px;
            background-color: var(--secondary);
            bottom: 10%;
            right: 10%;
            animation: float 10s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(20px, 20px);
            }

            100% {
                transform: translate(0, 0);
            }
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-section {
                padding: 80px 0;
            }
        }

        /* Futuristic Card Styles */
        .futuristic-card {
            background: rgba(15, 23, 42, 0.5) !important;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(0, 247, 255, 0.1);
            border-radius: 12px;
            transition: all 0.4s ease;
            cursor: pointer;
            overflow: hidden;
            z-index: 1;
        }

        .futuristic-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 10px 30px rgba(0, 247, 255, 0.15);
            border-color: rgba(0, 247, 255, 0.3);
        }

        /* Border Animation Effect */
        .border-animation {
            border: 1px solid transparent;
            border-radius: 12px;
            animation: borderPulse 3s infinite;
        }

        @keyframes borderPulse {
            0% {
                border-color: rgba(0, 247, 255, 0.1);
            }

            50% {
                border-color: rgba(0, 247, 255, 0.4);
            }

            100% {
                border-color: rgba(0, 247, 255, 0.1);
            }
        }

        /* Hover Effects */
        .futuristic-card:hover .hover-effect {
            height: 100%;
            opacity: 0.1;
        }

        .futuristic-card:hover h6 span {
            opacity: 1;
            width: 50px;
        }

        /* Grid Adjustment */
        .col-lg-2-4 {
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }

        @media (min-width: 992px) {
            .col-lg-2-4 {
                flex: 0 0 20%;
                max-width: 20%;
            }
        }
    </style>
</head>

<body>
    <!-- Floating Background Elements -->
    <div class="floating-element element-1"></div>
    <div class="floating-element element-2"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="{{ asset('photo/white-logo.png') }}" height="40" alt="Indoprima Gemilang">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="fas fa-bars text-light"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ url('vacancies') }}">Explore Jobs</a>
                    </li>
                    @if (!Auth::check())
                        <li class="nav-item mx-2">
                            <a class="btn btn-nav rounded-pill px-4" href="{{ url('auth/login') }}">
                                <i class="fas fa-sign-in-alt me-2"></i> Sign In
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                    <h6 class="text-primary mb-3 d-flex align-items-center">
                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 me-3">
                            <i class="fas fa-rocket me-2"></i> We're Hiring
                        </span>
                    </h6>


                    <h3 class="hero-title2">Build Your Future With</h3>
                    <h1 class="hero-title mb-4">
                        <span class="hero-subtitle text-white">Indoprima Gemilang</span>
                    </h1>

                    <p class="lead mb-5 text-light opacity-75">
                        Join our innovative team and shape the future of automotive manufacturing.
                        Your next career adventure starts here.
                    </p>

                    <div class="d-flex flex-wrap gap-3">
                        @if (!Auth::check())
                            <a href="{{ url('auth/login') }}" class="btn btn-primary-accent">
                                <i class="fas fa-sign-in-alt me-2"></i> Get Started
                            </a>
                            <a href="{{ url('auth/register') }}" class="btn btn-outline-accent">
                                Create Account
                            </a>
                        @else
                            <a href="{{ url('vacancies') }}" class="btn btn-primary-accent">
                                View Openings
                            </a>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="400">
                    <div class="position-relative">
                        <div class="glass-card p-3">
                            <div class="ratio ratio-16x9 rounded-3 overflow-hidden">
                                <iframe src="https://www.youtube.com/embed/e4HFE2XAGkk"
                                    title="Indoprima Gemilang Recruitment" allowfullscreen
                                    style="border: none;"></iframe>
                            </div>
                        </div>

                        <!-- Decorative elements -->
                        <div class="position-absolute top-0 start-0 translate-middle">
                            <div class="bg-primary rounded-circle p-2" style="width: 20px; height: 20px;"></div>
                        </div>
                        <div class="position-absolute bottom-0 end-0 translate-middle">
                            <div class="bg-secondary rounded-circle p-2" style="width: 20px; height: 20px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Jobs Section -->
    <section class="py-8 position-relative overflow-hidden">
        <div class="container position-relative">
            <div class="row justify-content-center mb-6" data-aos="fade-up">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-3">
                        <span
                            style="
                            background: linear-gradient(90deg, #00f0ff, #0088ff);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                            font-weight: bold;
                            display: inline-block;
                            ">
                            Current Opportunities
                        </span>

                    </h2>
                    <p class="text-light opacity-75">
                        Explore our latest job openings and find your perfect match
                    </p>
                </div>
            </div>

            <div class="row g-4" data-aos="fade-up" data-aos-delay="200">
                @foreach ($jobs as $job)
                    <div class="col-md-6 col-lg-4">
                        <div class="glass-card job-card h-100 p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h5 class="fw-bold mb-1 text-primary">{{ $job->jobtitle->jobtitle_name ?? '-' }}</h5>
                                    <p class="text-primary mb-0 small">{{ $job->division->division_name ?? '-' }}</p>
                                </div>
                                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-1">
                                    {{ $job->status_pegawai }}
                                </span>
                            </div>

                            <ul class="list-unstyled small mb-4">
                                <li class="mb-2 d-flex align-items-center">
                                    <i class="fas fa-graduation-cap text-primary me-2"></i>
                                    {{ $job->education->education_name ?? '-' }}
                                </li>
                                <li class="mb-2 d-flex align-items-center">
                                    <i class="fas fa-venus-mars text-primary me-2"></i>
                                    @if ($job->gender == 1)
                                        Male
                                    @elseif ($job->gender == 2)
                                        Female
                                    @else
                                        Male/Female
                                    @endif
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="fas fa-calendar-alt text-primary me-2"></i>
                                    Start: {{ $job->date_startwork }}
                                </li>
                            </ul>

                            <div class="mt-auto">
                                <a href="{{ url('vacancies', $job->id) }}"
                                    class="btn btn-sm btn-outline-primary w-100">
                                    Apply Now <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-6" data-aos="fade-up" data-aos-delay="300">
                <a href="{{ url('vacancies') }}" class="btn btn-primary-accent px-5">
                    View All Positions
                </a>
            </div>
        </div>
    </section>

    <!-- Recruitment Process -->
    <section class="py-8 bg-dark position-relative overflow-hidden">
        <div class="container position-relative">
            <div class="row justify-content-center mb-6" data-aos="fade-up">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-3 text-white">
                        Our <span
                            style="
                            background: linear-gradient(90deg, #00f0ff, #0088ff);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                            display: inline-block;
                        ">Hiring</span>
                        Process
                    </h2>

                    <p class="text-light opacity-75">
                        Transparent steps to join our innovative team
                    </p>
                </div>
            </div>

            <div class="row g-4" data-aos="fade-up" data-aos-delay="200">
                @php
                    $steps = [
                        ['icon' => 'fas fa-user-plus', 'label' => 'Create Account'],
                        ['icon' => 'fas fa-check-circle', 'label' => 'Verify Account'],
                        ['icon' => 'fas fa-sign-in-alt', 'label' => 'Login'],
                        ['icon' => 'fas fa-briefcase', 'label' => 'Apply for Job'],
                        ['icon' => 'fas fa-laptop-code', 'label' => 'Technical Test'],
                        ['icon' => 'fas fa-users', 'label' => 'HR Interview'],
                        ['icon' => 'fas fa-brain', 'label' => 'Psychological Test'],
                        ['icon' => 'fas fa-user-tie', 'label' => 'Final Interview'],
                        ['icon' => 'fas fa-heartbeat', 'label' => 'Medical Check-up'],
                        ['icon' => 'fas fa-handshake', 'label' => 'Onboarding'],
                    ];
                @endphp

                @foreach ($steps as $index => $step)
                    <div class="col-6 col-md-4 col-lg-2-4" data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}">
                        <div class="process-step futuristic-card h-100 p-4 position-relative overflow-hidden">
                            <!-- Glowing border effect -->
                            <div class="position-absolute top-0 left-0 w-100 h-100 border-animation"
                                style="z-index: 1;"></div>

                            <!-- Step number with futuristic design -->
                            <div class="step-number position-absolute top-0 start-0 translate-middle bg-dark rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 30px; height: 30px; border: 2px solid var(--primary);">
                                <span class="text-primary fw-bold small">{{ $index + 1 }}</span>
                            </div>

                            <!-- Icon with glowing effect -->
                            <div class="icon-wrapper bg-dark bg-opacity-50 rounded-circle p-3 mb-3 mx-auto d-flex align-items-center justify-content-center"
                                style="width: 70px; height: 70px; border: 1px solid rgba(0, 247, 255, 0.3);">
                                <i class="{{ $step['icon'] }} text-white fs-4"
                                    style="filter: drop-shadow(0 0 5px rgba(0, 247, 255, 0.5));"></i>
                            </div>

                            <!-- Step label with subtle animation -->
                            <h6 class="fw-semibold mb-0 text-white text-center position-relative" style="z-index: 2;">
                                {{ $step['label'] }}
                                <span class="position-absolute bottom-0 start-50 translate-middle-x bg-primary"
                                    style="width: 30px; height: 2px; opacity: 0; transition: all 0.3s ease;"></span>
                            </h6>

                            <!-- Hover effect element -->
                            <div class="hover-effect position-absolute bottom-0 start-0 w-100 bg-primary"
                                style="height: 0%; z-index: 0; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-8 position-relative overflow-hidden">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                    <h2 class="display-5 fw-bold mb-4">
                        <span class="text-primary">About</span> <span
                            style="
                            background: linear-gradient(90deg, #00f0ff, #0088ff);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                            display: inline-block;
                        ">Indoprima
                            Gemilang</span>
                    </h2>

                    <p class="lead mb-4">
                        PT Indoprima Gemilang is a leading manufacturer of motorized vehicle components, serving
                        international automotive companies with excellence and innovation.
                    </p>
                    <p>
                        We are fully committed to maintaining the highest quality standards in production. From material
                        selection to quality control, every process is meticulously executed to ensure perfection in our
                        products.
                    </p>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <div class="glass-card p-4">
                        <div class="ratio ratio-16x9 rounded-3 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1485827404703-89b55fcc595e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                                alt="Indoprima Gemilang Factory" class="object-fit-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-6 bg-dark position-relative">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <a href="index.html" class="d-inline-block mb-4">
                        <img src="{{ asset('photo/white-logo.png') }}" height="40" alt="Indoprima Gemilang">
                    </a>

                    <p class="small text-light opacity-75 mb-4">
                        © {{ date('Y') }} PT. Indoprima Gemilang. All rights reserved.<br>
                        Designed and Developed by Information System Team
                    </p>

                    <div class="d-flex justify-content-center gap-3">
                        <a href="#" class="text-light opacity-75 hover-opacity-100">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="text-light opacity-75 hover-opacity-100">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-light opacity-75 hover-opacity-100">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('package/landing/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('package/landing/dist/libs/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('package/landing/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('package/landing/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('package/landing/dist/js/custom.js') }}"></script>

    <script>
        // Initialize AOS animation
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Change navbar style on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.backgroundColor = 'rgba(10, 10, 26, 0.95)';
                navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
            } else {
                navbar.style.backgroundColor = 'rgba(10, 10, 26, 0.8)';
                navbar.style.boxShadow = 'none';
            }
        });
    </script>
</body>

</html>
