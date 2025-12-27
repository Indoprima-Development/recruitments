<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Indoprima Gemilang</title>
    <meta name="description" content="Login to your Indoprima Gemilang recruitment portal">
    <link rel="shortcut icon" type="image/png" href="{{ asset('package/dist/images/logos/favicon.ico') }}" />

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
            background-color: var(--bg-white);
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

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Main Layout */
        .login-wrapper {
            min-height: 100vh;
            display: flex;
            position: relative;
        }

        /* Hero Section - Desktop Only */
        .hero-section {
            flex: 1;
            background: var(--primary-gradient);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 3rem;
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
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
            color: white;
            max-width: 480px;
        }

        .hero-logo {
            width: 180px;
            margin-bottom: 2rem;
            /* filter: brightness(0) invert(1); */
        }

        .hero-illustration {
            width: 100%;
            max-width: 350px;
            margin: 2rem 0;
            animation: float 6s ease-in-out infinite;
            filter: drop-shadow(0 20px 40px rgba(0, 0, 0, 0.2));
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        .hero-title {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 1rem;
            letter-spacing: -0.02em;
        }

        .hero-subtitle {
            font-size: 1rem;
            opacity: 0.9;
            line-height: 1.7;
        }

        .hero-features {
            margin-top: 2.5rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .feature-icon {
            width: 32px;
            height: 32px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        /* Form Section */
        .form-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            background: var(--bg-white);
            min-height: 100vh;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
        }

        /* Mobile Header */
        .mobile-header {
            display: none;
            text-align: center;
            margin-bottom: 2rem;
        }

        .mobile-logo {
            width: 140px;
            margin-bottom: 1rem;
        }

        /* Form Header */
        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-header h1 {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            letter-spacing: -0.02em;
        }

        .form-header p {
            color: var(--text-secondary);
            font-size: 0.95rem;
        }

        /* Security Badge */
        .security-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: linear-gradient(135deg, #ecfdf5, #d1fae5);
            border: 1px solid #a7f3d0;
            border-radius: 100px;
            color: #047857;
            font-size: 0.8rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
        }

        .security-badge i {
            font-size: 0.9rem;
        }

        /* Form Elements */
        .auth-form {
            width: 100%;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .input-wrapper {
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 0.875rem 1rem 0.875rem 2.75rem;
            background: var(--bg-white);
            border: 2px solid var(--border-color);
            border-radius: 12px;
            color: var(--text-primary);
            font-size: 0.95rem;
            transition: var(--transition);
        }

        .form-input::placeholder {
            color: var(--text-muted);
        }

        .form-input:hover {
            border-color: #d1d5db;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 1.1rem;
            transition: var(--transition);
            pointer-events: none;
        }

        .form-input:focus~.input-icon {
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

        /* Remember & Forgot */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .checkbox-wrapper input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--primary);
            cursor: pointer;
        }

        .checkbox-wrapper label {
            font-size: 0.875rem;
            color: var(--text-secondary);
            cursor: pointer;
        }

        .forgot-link {
            font-size: 0.875rem;
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .forgot-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        /* Submit Button */
        .login-btn {
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

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg), 0 0 20px rgba(37, 99, 235, 0.3);
        }

        .login-btn:hover::before {
            left: 100%;
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .login-btn i {
            transition: transform 0.3s ease;
        }

        .login-btn:hover i {
            transform: translateX(4px);
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: var(--text-muted);
            font-size: 0.8rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border-color);
        }

        .divider::before {
            margin-right: 1rem;
        }

        .divider::after {
            margin-left: 1rem;
        }

        /* Register Link */
        .register-section {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border-color);
        }

        .register-section p {
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        .register-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .register-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        /* Info Cards */
        .info-cards {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-top: 1.5rem;
        }

        .info-card {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            background: var(--bg-light);
            border-radius: 12px;
            transition: var(--transition);
        }

        .info-card:hover {
            background: #f1f5f9;
            transform: translateX(4px);
        }

        .info-card-icon {
            width: 36px;
            height: 36px;
            background: var(--primary-gradient);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .info-card-content {
            flex: 1;
        }

        .info-card-title {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .info-card-text {
            font-size: 0.75rem;
            color: var(--text-secondary);
        }

        /* Footer */
        .form-footer {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1rem;
        }

        .form-footer p {
            color: var(--text-muted);
            font-size: 0.8rem;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .hero-section {
                display: none;
            }

            .form-section {
                flex: none;
                width: 100%;
            }

            .mobile-header {
                display: block;
            }
        }

        @media (max-width: 576px) {
            .form-section {
                padding: 1.5rem;
            }

            .form-header h1 {
                font-size: 1.5rem;
            }

            .form-options {
                flex-direction: column;
                align-items: flex-start;
            }

            .info-cards {
                gap: 0.5rem;
            }
        }

        /* Animation */
        .fade-in-up {
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
    </div>

    <!-- Main Wrapper -->
    <div class="login-wrapper">
        <!-- Hero Section - Desktop Only -->
        <section class="hero-section">
            <div class="hero-content">
                <img src="{{ asset('photo/white-logo.png') }}" alt="Indoprima Gemilang" class="hero-logo">

                <img src="{{ asset('photo/login.png') }}" alt="Career Illustration" class="hero-illustration">

                <h2 class="hero-title">Unlock Your Potential</h2>
                <p class="hero-subtitle">Join our elite team of professionals shaping the future of automotive
                    manufacturing</p>

                <div class="hero-features">
                    <div class="feature-item">
                        <span class="feature-icon"><i class="ti ti-rocket"></i></span>
                        <span>Fast-track your career growth</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon"><i class="ti ti-users"></i></span>
                        <span>Join 500+ talented professionals</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon"><i class="ti ti-award"></i></span>
                        <span>Industry-leading benefits package</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Form Section -->
        <section class="form-section">
            <div class="form-container">
                <!-- Mobile Header -->
                <div class="mobile-header fade-in-up">
                    <img src="{{ asset('photo/logo-indoprima.webp') }}" alt="Indoprima Gemilang" class="mobile-logo">
                </div>

                <!-- Form Header -->
                <div class="form-header fade-in-up delay-1">
                    <h1>Welcome Back! 👋</h1>
                    <p>Sign in to access your recruitment portal</p>
                </div>

                <!-- Security Badge -->
                <div class="text-center fade-in-up delay-2" style="text-align: center;">
                    <span class="security-badge">
                        <i class="ti ti-shield-check"></i>
                        Secure SSL Encrypted Login
                    </span>
                </div>

                <!-- Login Form -->
                <form action="{{ route('authenticate') }}" method="POST" class="auth-form">
                    @csrf

                    <div class="form-group fade-in-up delay-2">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-wrapper">
                            <input type="email" name="email" id="email" class="form-input"
                                placeholder="yourname@example.com" required>
                            <i class="ti ti-mail input-icon"></i>
                        </div>
                    </div>

                    <div class="form-group fade-in-up delay-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-wrapper">
                            <input type="password" name="password" id="password" class="form-input"
                                placeholder="Enter your password" required>
                            <i class="ti ti-lock input-icon"></i>
                            <button type="button" class="password-toggle" onclick="togglePassword()">
                                <i class="ti ti-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-options fade-in-up delay-3">
                        <div class="checkbox-wrapper">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">Remember me</label>
                        </div>
                        <a href="{{ url('auth/forget-password') }}" class="forgot-link">Forgot password?</a>
                    </div>

                    <button type="submit" class="login-btn fade-in-up delay-4">
                        <span>Sign In</span>
                        <i class="ti ti-arrow-right"></i>
                    </button>
                </form>

                <!-- Register Section -->
                <div class="register-section fade-in-up delay-4">
                    <p>Don't have an account? <a href="{{ url('auth/register') }}" class="register-link">Create one
                            now</a></p>
                </div>

                <!-- Info Cards -->
                <div class="info-cards fade-in-up delay-5">
                    <div class="info-card">
                        <span class="info-card-icon"><i class="ti ti-briefcase"></i></span>
                        <div class="info-card-content">
                            <div class="info-card-title">Browse Open Positions</div>
                            <div class="info-card-text">Explore career opportunities</div>
                        </div>
                    </div>
                    <div class="info-card">
                        <span class="info-card-icon"><i class="ti ti-clipboard-check"></i></span>
                        <div class="info-card-content">
                            <div class="info-card-title">Track Your Application</div>
                            <div class="info-card-text">Monitor your progress in real-time</div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="form-footer fade-in-up delay-5">
                    <p>&copy; {{ date('Y') }} PT. Indoprima Gemilang. All rights reserved.</p>
                </div>
            </div>
        </section>
    </div>

    <!-- Scripts -->
    <script>
        // Remove preloader when page loads
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.getElementById('preloader').classList.add('fade-out');
            }, 300);
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

        // Enhanced input focus effects
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.closest('.form-group').classList.add('focused');
            });

            input.addEventListener('blur', function() {
                this.closest('.form-group').classList.remove('focused');
            });
        });

        // Add ripple effect to button
        document.querySelector('.login-btn').addEventListener('click', function(e) {
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
