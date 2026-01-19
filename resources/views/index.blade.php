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
            background: rgba(255, 255, 255, 0.85) !important;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.03);
            padding: 1rem 0;
            transition: var(--transition);
            position: sticky;
            top: 0;
            z-index: 1020;
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
            padding: 80px 0 100px;
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

        /* Job Cards Redesign */
        .job-card {
            background: #ffffff;
            border: 1px solid #f1f5f9;
            border-radius: 24px;
            padding: 2rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .job-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            opacity: 0;
            transition: var(--transition);
        }

        .job-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -5px rgba(0, 0, 0, 0.1);
            border-color: transparent;
        }

        .job-card:hover::before {
            opacity: 1;
        }

        .job-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }

        .job-icon {
            width: 50px;
            height: 50px;
            background: #eff6ff;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.5rem;
            transition: var(--transition);
        }

        .job-card:hover .job-icon {
            background: var(--primary);
            color: white;
            transform: rotate(15deg);
        }

        .job-type-badge {
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.4rem 0.8rem;
            border-radius: 50px;
            background: #f8fafc;
            color: var(--text-secondary);
            border: 1px solid var(--border-color);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .job-title {
            font-size: 1.35rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
            transition: var(--transition);
        }

        .job-card:hover .job-title {
            color: var(--primary);
        }

        .job-dept {
            color: var(--text-secondary);
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
        }

        .job-meta {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 0.85rem;
            color: var(--text-secondary);
        }

        .meta-item i {
            color: var(--primary);
            opacity: 0.7;
        }

        .btn-job-apply {
            margin-top: auto;
            width: 100%;
            padding: 1rem;
            border-radius: 14px;
            background: var(--text-primary);
            color: white;
            font-weight: 600;
            text-align: center;
            border: none;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-job-apply:hover {
            background: var(--primary);
            color: white;
            transform: scale(1.02);
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

        /* Why Us Slider */
        .why-us-section {
            padding: 100px 0;
            background: #ffffff;
            overflow: hidden;
            position: relative;
        }

        .why-us-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            height: 100%;
            background: radial-gradient(circle at top right, #eff6ff 0%, #ffffff 70%);
            z-index: 0;
        }

        .why-us-card {
            padding: 1rem;
            position: relative;
            z-index: 1;
        }

        .why-us-content {
            padding-right: 2rem;
        }

        .why-us-title {
            font-size: 3rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--text-primary) 0%, var(--primary-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .why-us-desc {
            font-size: 1.15rem;
            color: var(--text-secondary);
            margin-bottom: 2.5rem;
            line-height: 1.8;
        }

        .detail-features {
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem;
            margin-bottom: 3rem;
        }

        .feature-pill {
            background: white;
            color: var(--primary);
            padding: 0.6rem 1.4rem;
            border-radius: 50px;
            font-size: 0.95rem;
            font-weight: 600;
            transition: var(--transition);
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .feature-pill i {
            font-size: 1.1rem;
        }

        .feature-pill:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
            transform: translateY(-3px);
            box-shadow: var(--shadow);
        }

        /* Image Collage - Reverted to Step 18 */
        .image-collage {
            position: relative;
            height: 550px;
            width: 100%;
        }

        .collage-img {
            position: absolute;
            border-radius: 24px;
            box-shadow: var(--shadow-xl);
            object-fit: cover;
            transition: all 0.5s ease;
            border: 4px solid white;
        }

        .collage-img:hover {
            z-index: 10;
            transform: scale(1.05);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .img-main {
            width: 65%;
            height: 75%;
            top: 12.5%;
            left: 0;
            z-index: 2;
        }

        .img-sub-1 {
            width: 45%;
            height: 45%;
            top: 0;
            right: 0;
            z-index: 1;
        }

        .img-sub-2 {
            width: 45%;
            height: 45%;
            bottom: 0;
            right: 0;
            z-index: 1;
        }

        /* About Us Redesign */
        .about-section {
            padding: 120px 0;
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
            position: relative;
            overflow: hidden;
        }

        .about-content {
            position: relative;
            z-index: 2;
        }

        .about-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1.25rem;
            background: rgba(37, 99, 235, 0.1);
            color: var(--primary);
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 1.5rem;
        }

        .about-title {
            font-size: 3rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            color: var(--text-primary);
        }

        .about-text {
            color: var(--text-secondary);
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 2.5rem;
        }

        /* About Features Grid */
        .about-features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .feature-card {
            background: white;
            padding: 1.5rem;
            border-radius: 16px;
            border: 1px solid var(--border-color);
            transition: var(--transition);
        }

        .feature-card:hover {
            border-color: var(--primary);
            box-shadow: var(--shadow-lg);
            transform: translateY(-5px);
        }

        .feature-icon-box {
            width: 48px;
            height: 48px;
            background: #eff6ff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.5rem;
            margin-bottom: 1rem;
            transition: var(--transition);
        }

        .feature-card:hover .feature-icon-box {
            background: var(--primary);
            color: white;
        }

        .feature-card h5 {
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .feature-card p {
            font-size: 0.9rem;
            color: var(--text-secondary);
            margin: 0;
            line-height: 1.5;
        }

        /* About Image Styling */
        .about-img-wrapper {
            position: relative;
            padding-left: 2rem;
        }

        .about-main-img {
            border-radius: 24px;
            width: 100%;
            height: auto;
            position: relative;
            z-index: 1;
            box-shadow: var(--shadow-xl);
        }

        .experience-badge {
            position: absolute;
            bottom: -30px;
            left: 0;
            background: var(--primary);
            color: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            z-index: 2;
            text-align: center;
            min-width: 200px;
            border: 4px solid white;
        }

        .experience-years {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1;
            display: block;
            margin-bottom: 0.25rem;
        }

        .experience-label {
            font-size: 1rem;
            font-weight: 500;
            opacity: 0.9;
        }

        /* Decorative Background */
        .bg-pattern {
            position: absolute;
            top: 0;
            right: 0;
            width: 40%;
            height: 100%;
            background-image: radial-gradient(#e0e7ff 1px, transparent 1px);
            background-size: 24px 24px;
            opacity: 0.5;
            z-index: 0;
        }

        /* Custom Nav Buttons */
        .owl-nav-custom {
            display: flex;
            gap: 1rem;
        }

        .owl-btn {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 2px solid var(--border-color);
            background: white;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            transition: var(--transition);
            cursor: pointer;
        }

        .owl-btn:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
            transform: scale(1.1);
        }

        @media (max-width: 991px) {
            .why-us-title {
                font-size: 2rem;
            }

            .image-collage {
                height: 400px;
                margin-top: 2rem;
            }

            .why-us-content {
                padding-right: 0;
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
    <nav class="navbar navbar-expand-lg">
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
                    <div class="col-md-6 col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="job-card w-100">
                            <span class="job-badge d-none">{{ $job->status_pegawai }}</span>
                            <!-- Hidden for now, using new badge -->

                            <div class="job-header">
                                <div class="job-icon">
                                    <i class="ti ti-briefcase"></i>
                                </div>
                                <span class="job-type-badge">{{ $job->status_pegawai }}</span>
                            </div>

                            <h3 class="job-title">{{ $job->jobtitle->jobtitle_name ?? '-' }}</h3>

                            <div class="job-dept">
                                <i class="ti ti-building-skyscraper text-primary"></i>
                                {{ $job->division->division_name ?? '-' }}
                            </div>

                            <div class="job-meta">
                                <div class="meta-item">
                                    <i class="ti ti-school"></i>
                                    {{ $job->education->education_name ?? '-' }}
                                </div>
                                <div class="meta-item">
                                    <i class="ti ti-calendar"></i>
                                    {{ \Carbon\Carbon::parse($job->date_startwork)->format('M d, Y') }}
                                </div>
                                <div class="meta-item">
                                    <i class="ti ti-users"></i>
                                    @if ($job->gender == 1)
                                        Male
                                    @elseif ($job->gender == 2)
                                        Female
                                    @else
                                        All Gender
                                    @endif
                                </div>
                                <div class="meta-item">
                                    <i class="ti ti-map-pin"></i>
                                    Java, ID
                                </div>
                            </div>

                            <a href="{{ url('vacancies', $job->id) }}" class="btn-job-apply">
                                Apply Now <i class="ti ti-arrow-right"></i>
                            </a>
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

    <!-- Why Us Section -->
    <section class="why-us-section">
        <div class="container">
            <div class="section-title text-start mb-5" data-aos="fade-up">
                <span>WHY CHOOSE US</span>
                <h2>Why Indoprima Gemilang?</h2>
            </div>

            <div class="why-us-carousel owl-carousel owl-theme">

                <!-- Slide 1 -->
                <div class="item">
                    <div class="why-us-card">
                        <div class="row align-items-center">
                            <div class="col-lg-6" data-aos="fade-right">
                                <div class="why-us-content">
                                    <h3 class="why-us-title">Development That Grows With You</h3>
                                    <p class="why-us-desc">
                                        At IPG, development is not a one-time program. It is a continuous journey
                                        designed
                                        to prepare our people for their future career paths. We cultivate an
                                        always-learning
                                        environment supported by structured people development, regular training, and
                                        individualized learning paths.
                                    </p>
                                    <div class="detail-features">
                                        <div class="feature-pill">
                                            <i class="ti ti-book"></i> Always Learning Environment
                                        </div>
                                        <div class="feature-pill">
                                            <i class="ti ti-users-group"></i> People Development
                                        </div>
                                        <div class="feature-pill">
                                            <i class="ti ti-certificate"></i> Regular Training
                                        </div>
                                        <div class="feature-pill">
                                            <i class="ti ti-stairs-up"></i> Individual Training Path
                                        </div>
                                    </div>
                                    <div class="owl-nav-custom">
                                        <button class="owl-btn owl-prev-btn"><i class="ti ti-arrow-left"></i></button>
                                        <button class="owl-btn owl-next-btn"><i
                                                class="ti ti-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6" data-aos="fade-left">
                                <div class="image-collage">
                                    <img src="{{ asset('photo/slides1/1.jpg') }}" class="collage-img img-main"
                                        alt="Development">
                                    <img src="{{ asset('photo/slides1/2.jpg') }}" class="collage-img img-sub-1"
                                        alt="Training">
                                    <img src="{{ asset('photo/slides1/3.jpg') }}" class="collage-img img-sub-2"
                                        alt="Growth">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="item">
                    <div class="why-us-card">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="why-us-content">
                                    <h3 class="why-us-title">Learning Through Real Impact</h3>
                                    <p class="why-us-desc">
                                        At IPG, development goes beyond training programs. We provide opportunities for
                                        employees to grow through project-based development, where learning happens by
                                        solving real business challenges and delivering meaningful impact.
                                    </p>
                                    <div class="detail-features">
                                        <div class="feature-pill">
                                            <i class="ti ti-bulb"></i> Project Based Development
                                        </div>
                                        <div class="feature-pill">
                                            <i class="ti ti-target"></i> Real Business Challenges
                                        </div>
                                        <div class="feature-pill">
                                            <i class="ti ti-trophy"></i> Meaningful Impact
                                        </div>
                                    </div>
                                    <div class="owl-nav-custom">
                                        <button class="owl-btn owl-prev-btn"><i class="ti ti-arrow-left"></i></button>
                                        <button class="owl-btn owl-next-btn"><i
                                                class="ti ti-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="image-collage">
                                    <img src="{{ asset('photo/slides2/1.jpg') }}" class="collage-img img-main"
                                        alt="Project">
                                    <img src="{{ asset('photo/slides2/2.jpg') }}" class="collage-img img-sub-1"
                                        alt="Impact">
                                    <img src="{{ asset('photo/slides2/3.jpg') }}" class="collage-img img-sub-2"
                                        alt="Challenge">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="item">
                    <div class="why-us-card">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="why-us-content">
                                    <h3 class="why-us-title">Building Connection Beyond Work</h3>
                                    <p class="why-us-desc">
                                        At IPG, we believe strong engagement creates a strong culture. Through various
                                        employee engagement activities, we encourage collaboration, togetherness, and a
                                        sense of belonging across the organization.
                                    </p>
                                    <div class="detail-features">
                                        <div class="feature-pill">
                                            <i class="ti ti-flag"></i> 17 Agustusan
                                        </div>
                                        <div class="feature-pill">
                                            <i class="ti ti-friends"></i> All Hands
                                        </div>
                                        <div class="feature-pill">
                                            <i class="ti ti-ball-football"></i> Sports Competitions
                                        </div>
                                        <div class="feature-pill">
                                            <i class="ti ti-music"></i> Dance Competitions
                                        </div>
                                    </div>
                                    <div class="owl-nav-custom">
                                        <button class="owl-btn owl-prev-btn"><i class="ti ti-arrow-left"></i></button>
                                        <button class="owl-btn owl-next-btn"><i
                                                class="ti ti-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="image-collage">
                                    <img src="{{ asset('photo/slides3/1.jpg') }}" class="collage-img img-main"
                                        alt="Engagement">
                                    <img src="{{ asset('photo/slides3/2.jpg') }}" class="collage-img img-sub-1"
                                        alt="Culture">
                                    <img src="{{ asset('photo/slides3/3.jpg') }}" class="collage-img img-sub-2"
                                        alt="Activity">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="bg-pattern"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                    <div class="about-content">
                        <div class="about-badge">
                            <i class="ti ti-building-factory-2"></i> About Us
                        </div>
                        <h2 class="about-title">Excellence in Automotive Components</h2>
                        <p class="about-text">
                            PT Indoprima Gemilang is a leading manufacturer of motorized vehicle components, serving
                            international automotive companies with excellence and innovation since its inception.
                            We combine advanced technology with human expertise to deliver products that set industry
                            standards.
                        </p>

                        <div class="about-features">
                            <div class="feature-card">
                                <div class="feature-icon-box">
                                    <i class="ti ti-award"></i>
                                </div>
                                <h5>World Class Quality</h5>
                                <p>Strict quality control ensuring 99.9% product precisions.</p>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon-box">
                                    <i class="ti ti-world"></i>
                                </div>
                                <h5>Global Reach</h5>
                                <p>Exporting to major automotive markets worldwide.</p>
                            </div>
                        </div>

                        <a href="{{ url('/') }}" class="btn-primary-hero text-decoration-none d-inline-block">
                            Learn More About Us <i class="ti ti-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <div class="about-img-wrapper">
                        <img src="{{ asset('home.avif') }}" alt="Indoprima Factory" class="about-main-img">
                        <div class="experience-badge bounce-in">
                            <span class="experience-years">30+</span>
                            <span class="experience-label">Years of<br>Excellence</span>
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

        // Why Us Slider Init
        $(document).ready(function() {
            var whyUsOwl = $('.why-us-carousel');
            whyUsOwl.owlCarousel({
                items: 1,
                loop: true,
                nav: false,
                dots: true,
                autoplay: true,
                autoplayTimeout: 8000,
                smartSpeed: 1000,
                margin: 0,
                touchDrag: true,
                mouseDrag: true
            });

            // Custom Navigation Events
            $('.owl-next-btn').click(function() {
                whyUsOwl.trigger('next.owl.carousel');
            });
            $('.owl-prev-btn').click(function() {
                whyUsOwl.trigger('prev.owl.carousel');
            });
        });
    </script>
</body>

</html>
