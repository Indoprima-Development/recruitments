<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indoprima Gemilang | Future Careers</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('package/dist/images/logos/favicon.ico') }}" />

    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('package/landing/dist/libs/aos/dist/aos.css') }}">
    <link rel="stylesheet"
        href="{{ asset('package/landing/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">

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
            --bg-surface: #ffffff;
            --border-color: #e5e7eb;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-white);
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

        /* Navbar */
        .navbar {
            backdrop-filter: blur(12px);
            background-color: rgba(255, 255, 255, 0.9) !important;
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
            font-size: 0.95rem;
            transition: var(--transition);
            margin: 0 0.5rem;
        }

        .nav-link:hover {
            color: var(--primary) !important;
        }

        .btn-nav {
            background-color: var(--primary);
            color: white !important;
            padding: 0.625rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: var(--transition);
            border: none;
            box-shadow: var(--shadow);
        }

        .btn-nav:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        /* Hero Section */
        .hero-section {
            padding: 160px 0 100px;
            background: radial-gradient(circle at top right, #eff6ff 0%, #ffffff 40%, #f0f9ff 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%232563eb' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--text-primary) 0%, var(--primary-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: var(--text-secondary);
            margin-bottom: 2.5rem;
            max-width: 540px;
        }

        /* Buttons */
        .btn-primary-hero {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            border: none;
            transition: var(--transition);
            box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.3);
        }

        .btn-primary-hero:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.4);
            color: white;
        }

        .btn-outline-hero {
            background: white;
            color: var(--text-primary);
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            border: 1px solid var(--border-color);
            transition: var(--transition);
        }

        .btn-outline-hero:hover {
            border-color: var(--primary);
            color: var(--primary);
            transform: translateY(-2px);
        }

        /* Video Card */
        .video-card {
            background: white;
            border-radius: 24px;
            padding: 1rem;
            box-shadow: var(--shadow-xl);
            position: relative;
            transform: perspective(1000px) rotateY(-5deg);
            transition: var(--transition);
        }

        .video-card:hover {
            transform: perspective(1000px) rotateY(0deg);
        }

        .video-wrapper {
            border-radius: 16px;
            overflow: hidden;
            position: relative;
            background: #000;
        }

        /* Stats */
        .hero-stats {
            display: flex;
            gap: 3rem;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border-color);
        }

        .stat-item h3 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 0.25rem;
        }

        .stat-item p {
            font-size: 0.9rem;
            color: var(--text-secondary);
            font-weight: 500;
        }

        /* Job Cards */
        .section-title {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title span {
            color: var(--primary);
            font-weight: 700;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: block;
            margin-bottom: 1rem;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 800;
        }

        .job-card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 2rem;
            transition: var(--transition);
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .job-card:hover {
            border-color: var(--primary-light);
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .job-badge {
            background: #eff6ff;
            color: var(--primary);
            padding: 0.35rem 1rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .job-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
        }

        .job-dept {
            color: var(--text-secondary);
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .job-features {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: var(--text-secondary);
        }

        .feature-item i {
            color: var(--primary);
        }

        .btn-job {
            width: 100%;
            padding: 0.875rem;
            border: 1px solid var(--border-color);
            background: white;
            color: var(--text-primary);
            border-radius: 12px;
            font-weight: 600;
            transition: var(--transition);
            text-align: center;
        }

        .btn-job:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        /* Process Section */
        .process-section {
            background: var(--bg-light);
            padding: 100px 0;
            position: relative;
        }

        .process-card {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            text-align: center;
            transition: var(--transition);
            height: 100%;
            position: relative;
            z-index: 1;
            box-shadow: var(--shadow-sm);
        }

        .process-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
        }

        .process-icon-wrapper {
            width: 70px;
            height: 70px;
            background: #eff6ff;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: var(--primary);
            font-size: 1.75rem;
            transition: var(--transition);
        }

        .process-card:hover .process-icon-wrapper {
            background: var(--primary);
            color: white;
            transform: rotateY(360deg);
        }

        .process-number {
            position: absolute;
            top: 1rem;
            right: 1.5rem;
            font-size: 3rem;
            font-weight: 800;
            color: #f1f5f9;
            z-index: -1;
        }

        /* About Section */
        .about-section {
            padding: 100px 0;
        }

        .about-image {
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow-xl);
            position: relative;
        }

        .about-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .about-image:hover img {
            transform: scale(1.05);
        }

        /* Footer */
        .footer {
            background: #0f172a;
            color: white;
            padding: 80px 0 30px;
        }

        .footer-logo {
            height: 40px;
            margin-bottom: 2rem;
        }

        .social-link {
            width: 40px;
            height: 40px;
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

        /* Responsive */
        @media (max-width: 991px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-section {
                padding: 120px 0 80px;
            }

            .video-card {
                transform: none;
                margin-top: 3rem;
            }

            .hero-stats {
                justify-content: center;
            }
        }
    </style>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KG6TYXERDJ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-KG6TYXERDJ');
    </script>
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

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="d-inline-flex align-items-center rounded-pill bg-blue-50 px-3 py-1 mb-4"
                        style="background: #eff6ff; border: 1px solid #dbeafe;">
                        <span class="badge rounded-pill bg-primary me-2">NEW</span>
                        <span class="text-primary fw-bold small">We are hiring multiple positions!</span>
                    </div>

                    <h1 class="hero-title">Build Your Future With Indoprima Gemilang</h1>
                    <p class="hero-subtitle">
                        Join our elite team of professionals shaping the future of automotive manufacturing.
                        Innovate, grow, and succeed with us.
                    </p>

                    <div class="d-flex flex-wrap gap-3 mb-5">
                        <a href="{{ url('vacancies') }}" class="btn-primary-hero">
                            Explore Careers <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        @if (!Auth::check())
                            <a href="{{ url('auth/register') }}" class="btn-outline-hero">
                                Create Account
                            </a>
                        @endif
                    </div>

                    <div class="hero-stats">
                        <div class="stat-item">
                            <h3>500+</h3>
                            <p>Employees</p>
                        </div>
                        <div class="stat-item">
                            <h3>30+</h3>
                            <p>Years Experience</p>
                        </div>
                        <div class="stat-item">
                            <h3>Global</h3>
                            <p>Market Reach</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                    <div class="video-card">
                        <div class="video-wrapper ratio ratio-16x9">
                            <iframe
                                src="https://www.youtube.com/embed/e4HFE2XAGkk?rel=0&autoplay=1&mute=1&loop=1&playlist=e4HFE2XAGkk"
                                title="Indoprima Gemilang Company Profile"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen style="border: none;">
                            </iframe>
                        </div>
                        <div class="mt-3 d-flex align-items-center justify-content-between">
                            <div>
                                <h5 class="fw-bold mb-1">Company Profile</h5>
                                <p class="text-muted small mb-0">Get to know us better</p>
                            </div>
                            <a href="https://www.youtube.com/watch?v=e4HFE2XAGkk" target="_blank"
                                class="btn btn-sm btn-outline-primary rounded-pill">
                                Watch Full Video
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Jobs Section -->
    <section class="py-5 position-relative">
        <div class="container py-lg-5">
            <div class="section-title" data-aos="fade-up">
                <span>OPPORTUNITIES</span>
                <h2>Latest Job Openings</h2>
                <p class="text-muted mt-2">Find the perfect role for you</p>
            </div>

            <div class="row g-4">
                @foreach ($jobs as $job)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="job-card">
                            <span class="job-badge">{{ $job->status_pegawai }}</span>
                            <h3 class="job-title">{{ $job->jobtitle->jobtitle_name ?? '-' }}</h3>
                            <div class="job-dept">
                                <i class="ti ti-building-skyscraper"></i>
                                {{ $job->division->division_name ?? '-' }}
                            </div>

                            <div class="job-features">
                                <div class="feature-item">
                                    <i class="ti ti-school"></i>
                                    {{ $job->education->education_name ?? '-' }}
                                </div>
                                <div class="feature-item">
                                    <i class="ti ti-calendar"></i>
                                    {{ $job->date_startwork }}
                                </div>
                                <div class="feature-item">
                                    <i class="ti ti-users"></i>
                                    @if ($job->gender == 1)
                                        Male
                                    @elseif ($job->gender == 2)
                                        Female
                                    @else
                                        Male/Female
                                    @endif
                                </div>
                            </div>

                            <div class="mt-auto">
                                <a href="{{ url('vacancies', $job->id) }}"
                                    class="btn-job d-block text-decoration-none">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-5" data-aos="fade-up">
                <a href="{{ url('vacancies') }}" class="btn-primary-hero px-5 text-decoration-none d-inline-block">
                    View All Positions <i class="ti ti-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Recruitment Process -->
    <section class="process-section">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <span>HOW IT WORKS</span>
                <h2>Admission Process</h2>
                <p class="text-muted mt-2">Smooth and transparent recruitment journey</p>
            </div>

            <div class="row g-4">
                @php
                    $steps = [
                        ['icon' => 'ti ti-user-plus', 'label' => 'Create Account'],
                        ['icon' => 'ti ti-file-text', 'label' => 'Apply & Test'],
                        ['icon' => 'ti ti-users', 'label' => 'Interview'],
                        ['icon' => 'ti ti-check', 'label' => 'Onboarding'],
                    ];
                @endphp

                @foreach ($steps as $index => $step)
                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="process-card">
                            <span class="process-number">{{ $index + 1 }}</span>
                            <div class="process-icon-wrapper">
                                <i class="{{ $step['icon'] }}"></i>
                            </div>
                            <h4 class="fw-bold mb-2">{{ $step['label'] }}</h4>
                            <p class="text-muted small mb-0">Completing step {{ $index + 1 }} of the process</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                    <span class="text-primary fw-bold text-uppercase letter-spacing-1 mb-2 d-block">About Us</span>
                    <h2 class="fw-bold mb-4 display-6">Excellence in Automotive Components</h2>
                    <p class="lead text-secondary mb-4">
                        PT Indoprima Gemilang is a leading manufacturer of motorized vehicle components, serving
                        international automotive companies with excellence and innovation.
                    </p>
                    <p class="text-secondary mb-4">
                        We are fully committed to maintaining the highest quality standards in production. From material
                        selection to quality control, every process is meticulously executed to ensure perfection.
                    </p>
                    <a href="#" class="btn btn-outline-primary rounded-pill px-4">Learn More</a>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="about-image">
                        <img src="https://images.unsplash.com/photo-1565514020176-db9318b76dfb?q=80&w=2070&auto=format&fit=crop"
                            alt="Modern Office" class="img-fluid">
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
                    <h3 class="fw-bold mb-4">Ready to start your journey?</h3>
                    <p class="opacity-75 mb-5">
                        Join us and be part of a company that values innovation, integrity, and growth.
                        Your future starts here.
                    </p>

                    <div class="d-flex justify-content-center gap-3 mb-5">
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
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
    <script src="{{ asset('package/landing/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>

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
