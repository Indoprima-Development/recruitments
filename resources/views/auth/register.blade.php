<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Our Team | PT. Indoprima Gemilang</title>
    <meta name="description" content="Start your career journey with PT. Indoprima Gemilang - Register now">
    <link rel="shortcut icon" type="image/png" href="{{ asset('package/dist/images/logos/favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <style>
        :root {
            --primary: #2563eb;
            --primary-light: #3b82f6;
            --primary-dark: #1d4ed8;
            --primary-gradient: linear-gradient(135deg, #2563eb, #7c3aed);
            --accent: #06b6d4;
            --success: #10b981;
            --success-light: #d1fae5;
            --warning: #f59e0b;
            --text-primary: #111827;
            --text-secondary: #4b5563;
            --text-muted: #9ca3af;
            --bg-white: #ffffff;
            --bg-light: #f8fafc;
            --bg-card: #ffffff;
            --border-color: #e5e7eb;
            --border-radius: 16px;
            --border-radius-lg: 24px;
            --border-radius-xl: 32px;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --shadow-xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-fast: all 0.15s ease;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Preloader */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--bg-white);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        .preloader.fade-out {
            opacity: 0;
            visibility: hidden;
        }

        .preloader-spinner {
            width: 48px;
            height: 48px;
            border: 3px solid var(--border-color);
            border-top-color: var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        .preloader-text {
            margin-top: 1rem;
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Header */
        .register-header {
            background: var(--bg-white);
            padding: 1rem 1.5rem;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: var(--shadow-sm);
            border-bottom: 1px solid var(--border-color);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header-logo {
            height: 40px;
            transition: var(--transition);
        }

        .header-logo:hover {
            transform: scale(1.05);
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .login-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.625rem 1.25rem;
            background: var(--primary-gradient);
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.875rem;
            transition: var(--transition);
        }

        .login-link:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* Progress Bar */
        .progress-container {
            background: var(--bg-white);
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--border-color);
        }

        .progress-wrapper {
            max-width: 800px;
            margin: 0 auto;
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.75rem;
        }

        .progress-text {
            font-size: 0.85rem;
            color: var(--text-secondary);
        }

        .progress-percentage {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--primary);
        }

        .progress-bar {
            height: 6px;
            background: #e5e7eb;
            border-radius: 100px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: var(--primary-gradient);
            border-radius: 100px;
            width: 0%;
            transition: width 0.5s ease;
        }

        /* Main Container */
        .register-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem 1.5rem 3rem;
        }

        /* Hero Section */
        .register-hero {
            text-align: center;
            margin-bottom: 2rem;
            padding: 2rem;
            background: var(--primary-gradient);
            border-radius: var(--border-radius-lg);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .register-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 100px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-bottom: 1rem;
            position: relative;
        }

        .register-hero h1 {
            font-size: 1.75rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            position: relative;
        }

        .register-hero p {
            opacity: 0.9;
            font-size: 0.95rem;
            position: relative;
        }

        /* Benefits Grid */
        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .benefit-card {
            background: var(--bg-white);
            padding: 1.25rem;
            border-radius: var(--border-radius);
            border: 1px solid var(--border-color);
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            transition: var(--transition);
        }

        .benefit-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
            border-color: var(--primary-light);
        }

        .benefit-icon {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        .benefit-content h3 {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.25rem;
        }

        .benefit-content p {
            font-size: 0.8rem;
            color: var(--text-secondary);
        }

        /* Form Card */
        .form-card {
            background: var(--bg-white);
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow);
            overflow: hidden;
            border: 1px solid var(--border-color);
        }

        .form-section {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-color);
        }

        .form-section:last-of-type {
            border-bottom: none;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.25rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid var(--bg-light);
        }

        .section-icon {
            width: 40px;
            height: 40px;
            background: var(--primary-gradient);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.1rem;
        }

        .section-title {
            flex: 1;
        }

        .section-title h2 {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        .section-title p {
            font-size: 0.8rem;
            color: var(--text-secondary);
            margin-top: 0.125rem;
        }

        .section-number {
            width: 28px;
            height: 28px;
            background: var(--bg-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--primary);
        }

        /* Form Grid */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .form-grid.single {
            grid-template-columns: 1fr;
        }

        .form-group {
            margin-bottom: 0;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        /* Form Elements */
        .form-label {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .required-badge {
            color: #ef4444;
            font-size: 0.75rem;
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            font-size: 0.95rem;
            transition: var(--transition);
            background-color: var(--bg-white);
            color: var(--text-primary);
        }

        .form-control::placeholder {
            color: var(--text-muted);
        }

        .form-control:hover {
            border-color: #d1d5db;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        .form-select {
            width: 100%;
            padding: 0.875rem 2.5rem 0.875rem 1rem;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            font-size: 0.95rem;
            transition: var(--transition);
            background-color: var(--bg-white);
            color: var(--text-primary);
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%234b5563' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 12px;
        }

        .form-select:hover {
            border-color: #d1d5db;
        }

        .form-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        /* Input with icon */
        .input-with-icon {
            position: relative;
        }

        .input-with-icon .form-control {
            padding-left: 2.75rem;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 1.1rem;
            pointer-events: none;
            transition: var(--transition);
        }

        .form-control:focus~.input-icon {
            color: var(--primary);
        }

        /* Password Toggle */
        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            padding: 0.25rem;
            transition: var(--transition);
        }

        .password-toggle:hover {
            color: var(--primary);
        }

        /* Form Helper */
        .form-helper {
            font-size: 0.75rem;
            color: var(--text-secondary);
            margin-top: 0.375rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .form-helper i {
            font-size: 0.8rem;
        }

        /* Submit Section */
        .submit-section {
            padding: 1.5rem;
            background: var(--bg-light);
        }

        .submit-wrapper {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .terms-checkbox {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .terms-checkbox input[type="checkbox"] {
            width: 20px;
            height: 20px;
            accent-color: var(--primary);
            cursor: pointer;
            margin-top: 2px;
        }

        .terms-checkbox label {
            font-size: 0.85rem;
            color: var(--text-secondary);
            cursor: pointer;
            line-height: 1.5;
        }

        .terms-checkbox a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .terms-checkbox a:hover {
            text-decoration: underline;
        }

        /* Submit Button */
        .btn-submit {
            width: 100%;
            padding: 1rem 1.5rem;
            background: var(--primary-gradient);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            position: relative;
            overflow: hidden;
            transition: var(--transition);
        }

        .btn-submit::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg), 0 0 20px rgba(37, 99, 235, 0.3);
        }

        .btn-submit:hover::before {
            left: 100%;
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .btn-submit i {
            transition: transform 0.3s ease;
        }

        .btn-submit:hover i {
            transform: translateX(4px);
        }

        .btn-submit:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        /* Security Note */
        .security-note {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem;
            background: var(--success-light);
            border-radius: 10px;
            font-size: 0.8rem;
            color: #047857;
        }

        .security-note i {
            font-size: 1rem;
        }

        /* Footer */
        .register-footer {
            text-align: center;
            margin-top: 2rem;
        }

        .register-footer p {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .register-container {
                padding: 1.5rem 1rem 2rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .benefits-grid {
                grid-template-columns: 1fr;
            }

            .register-hero h1 {
                font-size: 1.5rem;
            }

            .header-right span {
                display: none;
            }

            .form-section {
                padding: 1.25rem;
            }

            .section-header {
                flex-wrap: wrap;
            }

            .section-title {
                order: 1;
                width: 100%;
                margin-top: 0.5rem;
            }
        }

        @media (max-width: 480px) {
            .register-header {
                padding: 0.875rem 1rem;
            }

            .header-logo {
                height: 32px;
            }

            .login-link {
                padding: 0.5rem 1rem;
                font-size: 0.8rem;
            }

            .register-hero {
                padding: 1.5rem 1rem;
            }

            .register-hero h1 {
                font-size: 1.25rem;
            }

            .section-icon {
                width: 36px;
                height: 36px;
            }

            .form-control,
            .form-select {
                padding: 0.75rem 1rem;
            }
        }

        /* Animation */
        .fade-in-up {
            opacity: 0;
            animation: fadeInUp 0.6s ease forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .delay-1 {
            animation-delay: 0.1s;
        }

        .delay-2 {
            animation-delay: 0.2s;
        }

        .delay-3 {
            animation-delay: 0.3s;
        }

        .delay-4 {
            animation-delay: 0.4s;
        }

        .delay-5 {
            animation-delay: 0.5s;
        }

        /* Form validation states */
        .form-control.is-valid,
        .form-select.is-valid {
            border-color: var(--success);
        }

        .form-control.is-invalid,
        .form-select.is-invalid {
            border-color: #ef4444;
        }

        /* Tooltip */
        .tooltip-wrapper {
            position: relative;
            display: inline-flex;
        }

        .tooltip-icon {
            width: 16px;
            height: 16px;
            background: var(--bg-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.65rem;
            color: var(--text-muted);
            cursor: help;
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
    <!-- Preloader -->
    <div class="preloader" id="preloader">
        <div class="preloader-spinner"></div>
        <p class="preloader-text">Loading application form...</p>
    </div>

    <!-- Header -->
    <header class="register-header">
        <div class="header-content">
            <a href="{{ url('/') }}">
                <img src="{{ asset('photo/white-logo.png') }}" alt="PT. Indoprima Gemilang" class="header-logo">
            </a>
            <div class="header-right">
                <span style="color: var(--text-secondary); font-size: 0.9rem;">Already have an account?</span>
                <a href="{{ url('auth/login') }}" class="login-link">
                    <i class="ti ti-login"></i>
                    Sign In
                </a>
            </div>
        </div>
    </header>

    <!-- Progress Bar -->
    <div class="progress-container">
        <div class="progress-wrapper">
            <div class="progress-header">
                <span class="progress-text">Application Progress</span>
                <span class="progress-percentage" id="progressPercentage">0%</span>
            </div>
            <div class="progress-bar">
                <div class="progress-fill" id="progressFill"></div>
            </div>
        </div>
    </div>

    <!-- Main Container -->
    <div class="register-container">
        <!-- Hero Section -->
        <div class="register-hero fade-in-up">
            <span class="hero-badge">
                <i class="ti ti-sparkles"></i>
                Join Our Team
            </span>
            <h1>Start Your Career Journey 🚀</h1>
            <p>Complete the form below to begin your application process</p>
        </div>

        <!-- Benefits Grid -->
        <div class="benefits-grid fade-in-up delay-1">
            <div class="benefit-card">
                <span class="benefit-icon"><i class="ti ti-clock"></i></span>
                <div class="benefit-content">
                    <h3>Quick Process</h3>
                    <p>5 minutes to complete</p>
                </div>
            </div>
            <div class="benefit-card">
                <span class="benefit-icon"><i class="ti ti-shield-check"></i></span>
                <div class="benefit-content">
                    <h3>Secure & Private</h3>
                    <p>Your data is protected</p>
                </div>
            </div>
            <div class="benefit-card">
                <span class="benefit-icon"><i class="ti ti-bell-ringing"></i></span>
                <div class="benefit-content">
                    <h3>Instant Updates</h3>
                    <p>Real-time notifications</p>
                </div>
            </div>
        </div>

        <!-- Registration Form -->
        <form action="{{ route('store') }}" method="POST" class="form-card fade-in-up delay-2" id="registerForm">
            @csrf

            <!-- Section 1: Personal Information -->
            <div class="form-section">
                <div class="section-header">
                    <span class="section-icon"><i class="ti ti-user"></i></span>
                    <div class="section-title">
                        <h2>Personal Information</h2>
                        <p>Tell us about yourself</p>
                    </div>
                    <span class="section-number">1</span>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="name" class="form-label">
                            Full Name
                            <span class="required-badge">*</span>
                        </label>
                        <div class="input-with-icon">
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter your full name" required>
                            <i class="ti ti-user input-icon"></i>
                        </div>
                        <p class="form-helper"><i class="ti ti-info-circle"></i> As shown on your ID card</p>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">
                            Email Address
                            <span class="required-badge">*</span>
                        </label>
                        <div class="input-with-icon">
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="your@email.com" required>
                            <i class="ti ti-mail input-icon"></i>
                        </div>
                        <p class="form-helper"><i class="ti ti-info-circle"></i> We'll send updates here</p>
                    </div>

                    <div class="form-group">
                        <label for="ktp" class="form-label">
                            ID Number (NIK)
                            <span class="required-badge">*</span>
                        </label>
                        <div class="input-with-icon">
                            <input type="text" name="ktp" id="ktp" class="form-control"
                                placeholder="3577xxxxxxxxxxxx" maxlength="16" required>
                            <i class="ti ti-id input-icon"></i>
                        </div>
                        <p class="form-helper"><i class="ti ti-info-circle"></i> 16-digit National ID number</p>
                    </div>

                    <div class="form-group">
                        <label for="no_wa" class="form-label">
                            WhatsApp Number
                            <span class="required-badge">*</span>
                        </label>
                        <div class="input-with-icon">
                            <input type="tel" name="no_wa" id="no_wa" class="form-control"
                                placeholder="08xxxxxxxxxx" required>
                            <i class="ti ti-brand-whatsapp input-icon"></i>
                        </div>
                        <p class="form-helper"><i class="ti ti-info-circle"></i> Active WhatsApp number</p>
                    </div>

                    <div class="form-group full-width">
                        <label for="password" class="form-label">
                            Password
                            <span class="required-badge">*</span>
                        </label>
                        <div class="input-with-icon">
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Create a secure password" required minlength="8">
                            <i class="ti ti-lock input-icon"></i>
                            <button type="button" class="password-toggle" onclick="togglePassword()">
                                <i class="ti ti-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                        <p class="form-helper"><i class="ti ti-info-circle"></i> Minimum 8 characters</p>
                    </div>
                </div>
            </div>

            <!-- Section 2: Education Background -->
            <div class="form-section">
                <div class="section-header">
                    <span class="section-icon"><i class="ti ti-school"></i></span>
                    <div class="section-title">
                        <h2>Education Background</h2>
                        <p>Your academic qualifications</p>
                    </div>
                    <span class="section-number">2</span>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="pendidikan_terakhir" class="form-label">
                            Highest Education
                            <span class="required-badge">*</span>
                        </label>
                        <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-select" required>
                            <option value="" selected disabled>Select your education level</option>
                            <option value="SMA SMK">High School / Vocational</option>
                            <option value="D3">Diploma 3</option>
                            <option value="D4">Diploma 4</option>
                            <option value="S1">Bachelor's Degree (S1)</option>
                            <option value="S2">Master's Degree (S2)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ipk" class="form-label">
                            GPA Score
                            <span class="required-badge">*</span>
                        </label>
                        <div class="input-with-icon">
                            <input type="number" name="ipk" id="ipk" class="form-control" step="0.01"
                                min="0" max="4" placeholder="e.g. 3.50" required>
                            <i class="ti ti-chart-bar input-icon"></i>
                        </div>
                        <p class="form-helper"><i class="ti ti-info-circle"></i> Scale 0 - 4.00</p>
                    </div>

                    <div class="form-group">
                        <label for="asal_instansi" class="form-label">
                            Institution Name
                        </label>
                        <select name="asal_instansi" id="asal_instansi" class="form-select">
                            <option value="">Select your institution</option>
                            <option value="Universitas Indonesia">Universitas Indonesia</option>
                            <option value="Institut Teknologi Bandung">Institut Teknologi Bandung</option>
                            <option value="Universitas Gadjah Mada">Universitas Gadjah Mada</option>
                            <option value="Institut Pertanian Bogor">Institut Pertanian Bogor</option>
                            <option value="Institut Teknologi Sepuluh Nopember">Institut Teknologi Sepuluh Nopember
                            </option>
                            <option value="Universitas Airlangga">Universitas Airlangga</option>
                            <option value="Universitas Padjadjaran">Universitas Padjadjaran</option>
                            <option value="Universitas Diponegoro">Universitas Diponegoro</option>
                            <option value="Universitas Hasanuddin">Universitas Hasanuddin</option>
                            <option value="Universitas Brawijaya">Universitas Brawijaya</option>
                            <option value="Universitas Negeri Surabaya">Universitas Negeri Surabaya</option>
                            <option value="Universitas Trunojoyo Madura">Universitas Trunojoyo Madura</option>
                            <option value="Universitas Jember">Universitas Jember</option>
                            <option value="Universitas Negeri Malang">Universitas Negeri Malang</option>
                            <option value="Universitas Bina Nusantara">Universitas Bina Nusantara</option>
                            <option value="Universitas Pelita Harapan">Universitas Pelita Harapan</option>
                            <option value="Universitas Katolik Parahyangan">Universitas Katolik Parahyangan</option>
                            <option value="Universitas Tarumanagara">Universitas Tarumanagara</option>
                            <option value="Universitas Atma Jaya Yogyakarta">Universitas Atma Jaya Yogyakarta</option>
                            <option value="Universitas Kristen Petra">Universitas Kristen Petra</option>
                            <option value="Universitas Muhammadiyah Malang">Universitas Muhammadiyah Malang</option>
                            <option value="Universitas Surabaya">Universitas Surabaya</option>
                            <option value="Universitas Ciputra">Universitas Ciputra</option>
                            <option value="Universitas Wijaya Kusuma Surabaya">Universitas Wijaya Kusuma Surabaya
                            </option>
                            <option value="Politeknik Manufaktur Ceper">Politeknik Manufaktur Ceper</option>
                            <option value="Politeknik ATK Yogyakarta">Politeknik ATK Yogyakarta</option>
                            <option value="Politeknik Perkapalan Negeri Surabaya">Politeknik Perkapalan Negeri Surabaya
                            </option>
                            <option value="Politeknik Elektronika Negeri Surabaya">Politeknik Elektronika Negeri
                                Surabaya</option>
                            <option value="Politeknik Negeri Malang">Politeknik Negeri Malang</option>
                            <option value="Politeknik Negeri Jember">Politeknik Negeri Jember</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jurusan" class="form-label">
                            Major / Field of Study
                        </label>
                        <select name="jurusan" id="jurusan" class="form-select">
                            <option value="">Select your major</option>
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Kimia">Kimia</option>
                            <option value="Manajemen">Manajemen</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Matematika">Matematika</option>
                            <option value="Psikologi">Psikologi</option>
                            <option value="Sastra Inggris">Sastra Inggris</option>
                            <option value="Sastra Mandarin">Sastra Mandarin</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Statistika">Statistika</option>
                            <option value="Teknik Desain Manufaktur">Teknik Desain Manufaktur</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Teknik Fisika">Teknik Fisika</option>
                            <option value="Teknik Industri">Teknik Industri</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik K3">Teknik K3</option>
                            <option value="Teknik Kimia">Teknik Kimia</option>
                            <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                            <option value="Teknik Material">Teknik Material</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                            <option value="Teknik Metalurgi">Teknik Metalurgi</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Section 3: Physical Information -->
            <div class="form-section">
                <div class="section-header">
                    <span class="section-icon"><i class="ti ti-heart-rate-monitor"></i></span>
                    <div class="section-title">
                        <h2>Physical Information</h2>
                        <p>Basic physical details</p>
                    </div>
                    <span class="section-number">3</span>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="tinggi_badan" class="form-label">
                            Height
                            <span class="required-badge">*</span>
                        </label>
                        <div class="input-with-icon">
                            <input type="number" name="tinggi_badan" id="tinggi_badan" class="form-control"
                                placeholder="e.g. 170" step="any" required>
                            <i class="ti ti-ruler input-icon"></i>
                        </div>
                        <p class="form-helper"><i class="ti ti-info-circle"></i> In centimeters (cm)</p>
                    </div>

                    <div class="form-group">
                        <label for="berat_badan" class="form-label">
                            Weight
                            <span class="required-badge">*</span>
                        </label>
                        <div class="input-with-icon">
                            <input type="number" name="berat_badan" id="berat_badan" class="form-control"
                                placeholder="e.g. 65" step="any" required>
                            <i class="ti ti-scale input-icon"></i>
                        </div>
                        <p class="form-helper"><i class="ti ti-info-circle"></i> In kilograms (kg)</p>
                    </div>
                </div>
            </div>

            <!-- Submit Section -->
            <div class="submit-section">
                <div class="submit-wrapper">
                    <div class="terms-checkbox">
                        <input type="checkbox" id="terms" required>
                        <label for="terms">
                            I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy
                                Policy</a>.
                            I confirm that all information provided is accurate and truthful.
                        </label>
                    </div>

                    <button type="submit" class="btn-submit" id="submitBtn">
                        <span>Submit Application</span>
                        <i class="ti ti-arrow-right"></i>
                    </button>

                    <div class="security-note">
                        <i class="ti ti-shield-lock"></i>
                        <span>Your data is encrypted and securely stored</span>
                    </div>
                </div>
            </div>
        </form>

        <!-- Footer -->
        <div class="register-footer fade-in-up delay-3">
            <p>&copy; {{ date('Y') }} PT. Indoprima Gemilang. All rights reserved.</p>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Remove preloader when page loads
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.getElementById('preloader').classList.add('fade-out');
            }, 500);
        });

        // Toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('ti-eye');
                toggleIcon.classList.add('ti-eye-off');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('ti-eye-off');
                toggleIcon.classList.add('ti-eye');
            }
        }

        // Calculate progress
        function updateProgress() {
            const form = document.getElementById('registerForm');
            const requiredFields = form.querySelectorAll('[required]');
            let filledCount = 0;

            requiredFields.forEach(field => {
                if (field.type === 'checkbox') {
                    if (field.checked) filledCount++;
                } else if (field.value.trim() !== '') {
                    filledCount++;
                }
            });

            const percentage = Math.round((filledCount / requiredFields.length) * 100);
            document.getElementById('progressPercentage').textContent = percentage + '%';
            document.getElementById('progressFill').style.width = percentage + '%';
        }

        // Add event listeners to all form fields
        document.querySelectorAll('#registerForm input, #registerForm select').forEach(field => {
            field.addEventListener('input', updateProgress);
            field.addEventListener('change', updateProgress);
        });

        // Initialize progress
        updateProgress();

        // Enhanced input focus effects
        document.querySelectorAll('.form-control, .form-select').forEach(input => {
            input.addEventListener('focus', function() {
                this.closest('.form-group')?.classList.add('focused');
            });

            input.addEventListener('blur', function() {
                this.closest('.form-group')?.classList.remove('focused');
                // Add validation class
                if (this.hasAttribute('required') && this.value.trim() !== '') {
                    this.classList.add('is-valid');
                    this.classList.remove('is-invalid');
                }
            });
        });

        // NIK input formatting (numbers only)
        document.getElementById('ktp').addEventListener('input', function(e) {
            this.value = this.value.replace(/\D/g, '').slice(0, 16);
        });

        // Phone number formatting
        document.getElementById('no_wa').addEventListener('input', function(e) {
            this.value = this.value.replace(/\D/g, '');
        });

        // Form submission
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.innerHTML =
                '<i class="ti ti-loader" style="animation: spin 1s linear infinite;"></i> Submitting...';
            submitBtn.disabled = true;
        });

        // Add ripple effect to submit button
        document.querySelector('.btn-submit').addEventListener('click', function(e) {
            if (!this.disabled) {
                const button = this;
                const ripple = document.createElement('span');
                const rect = button.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;

                ripple.style.cssText = `
                    position: absolute;
                    width: ${size}px;
                    height: ${size}px;
                    left: ${x}px;
                    top: ${y}px;
                    background: rgba(255, 255, 255, 0.3);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: ripple 0.6s ease-out;
                    pointer-events: none;
                `;

                button.appendChild(ripple);

                setTimeout(() => ripple.remove(), 600);
            }
        });
    </script>

    <style>
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    </style>
</body>

</html>
