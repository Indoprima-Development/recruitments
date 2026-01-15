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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <!-- Libraries -->
    <link rel="stylesheet"
        href="{{ asset('package/landing/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('package/landing/dist/libs/aos/dist/aos.css') }}">

    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --secondary: #0ea5e9;
            --accent: #3b82f6;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --bg-light: #f8fafc;
            --white: #ffffff;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-light);
            margin: 0;
            overflow-x: hidden;
        }

        /* Preloader */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: white;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: opacity 0.5s ease;
        }

        .loader {
            width: 48px;
            height: 48px;
            border: 5px solid #ececec;
            border-bottom-color: var(--primary);
            border-radius: 50%;
            animation: rotation 1s linear infinite;
        }

        @keyframes rotation {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .preloader.fade-out {
            opacity: 0;
            pointer-events: none;
        }

        /* Main Container */
        .login-container {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        /* Left Side - Slider */
        .info-side {
            width: 50%;
            background: linear-gradient(135deg, #1e40af 0%, #2563eb 100%);
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 4rem;
            color: white;
            overflow: hidden;
        }

        .info-side::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M50 50c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10s-10-4.477-10-10 4.477-10 10-10zM10 10c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10S0 25.523 0 20s4.477-10 10-10zm10 8c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm40 40c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.7;
        }

        .abstract-shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            backdrop-filter: blur(10px);
        }

        .shape-1 {
            width: 300px;
            height: 300px;
            top: -50px;
            right: -50px;
        }

        .shape-2 {
            width: 200px;
            height: 200px;
            bottom: 50px;
            left: -50px;
        }

        .brand-logo {
            position: relative;
            z-index: 2;
        }

        .brand-logo img {
            height: 40px;
            /* filter: brightness(0) invert(1); */
        }

        .slider-content {
            position: relative;
            z-index: 2;
            max-width: 500px;
        }

        .slide-item h2 {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .slide-item p {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        .slider-dots .owl-dots {
            display: flex;
            gap: 0.5rem;
            margin-top: 2rem;
        }

        .slider-dots .owl-dot span {
            width: 10px;
            height: 10px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            display: block;
            transition: var(--transition);
        }

        .slider-dots .owl-dot.active span {
            background: white;
            width: 30px;
            border-radius: 10px;
        }

        .info-footer {
            position: relative;
            z-index: 2;
            font-size: 0.9rem;
            opacity: 0.7;
        }

        /* Right Side - Form */
        .form-side {
            width: 50%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
        }

        .form-wrapper {
            width: 100%;
            max-width: 450px;
            padding: 2rem;
        }

        .mobile-logo {
            display: none;
            margin-bottom: 2rem;
            text-align: center;
        }

        .mobile-logo img {
            height: 40px;
        }

        .welcome-text h1 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--text-main);
            margin-bottom: 0.5rem;
        }

        .welcome-text p {
            color: var(--text-muted);
            margin-bottom: 2rem;
        }

        /* Floating Label Input */
        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .input-field {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            color: var(--text-main);
            background: white;
            transition: var(--transition);
            outline: none;
        }

        .input-field:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1.25rem;
            transition: var(--transition);
        }

        .input-field:focus~.input-icon {
            color: var(--primary);
        }

        .toggle-password {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            cursor: pointer;
            padding: 0.25rem;
            transition: var(--transition);
        }

        .toggle-password:hover {
            color: var(--text-main);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
        }

        .remember-me input {
            width: 18px;
            height: 18px;
            accent-color: var(--primary);
            cursor: pointer;
        }

        .remember-me label {
            color: var(--text-muted);
            font-size: 0.9rem;
            cursor: pointer;
            user-select: none;
        }

        .forgot-pass {
            color: var(--primary);
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            transition: var(--transition);
        }

        .forgot-pass:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .btn-submit {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -5px rgba(37, 99, 235, 0.4);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .register-text {
            text-align: center;
            margin-top: 2rem;
            color: var(--text-muted);
            font-size: 0.95rem;
        }

        .register-text a {
            color: var(--primary);
            font-weight: 700;
            text-decoration: none;
            margin-left: 0.25rem;
        }

        .register-text a:hover {
            text-decoration: underline;
        }

        .feature-cards {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-top: 2.5rem;
            padding-top: 2.5rem;
            border-top: 1px solid #f1f5f9;
        }

        .f-card {
            padding: 1rem;
            border-radius: 12px;
            background: #f8fafc;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: var(--transition);
            border: 1px solid transparent;
        }

        .f-card:hover {
            background: #eff6ff;
            border-color: #dbeafe;
            transform: translateY(-2px);
        }

        .f-icon {
            width: 36px;
            height: 36px;
            background: white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.25rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .f-text span {
            display: block;
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--text-main);
        }

        .f-text small {
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        /* Responsive */
        @media (max-width: 991px) {
            .info-side {
                display: none;
            }

            .form-side {
                width: 100%;
                background: #f8fafc;
            }

            .form-wrapper {
                background: white;
                padding: 2.5rem;
                border-radius: 24px;
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            }

            .mobile-logo {
                display: block;
            }
        }

        @media (max-width: 480px) {
            .form-wrapper {
                padding: 1.5rem;
                box-shadow: none;
                background: transparent;
            }

            .feature-cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')

    <div class="preloader" id="preloader">
        <div class="loader"></div>
    </div>

    <div class="login-container">
        <!-- Left Side: Interactive Slider -->
        <div class="info-side">
            <div class="abstract-shape shape-1"></div>
            <div class="abstract-shape shape-2"></div>

            <div class="brand-logo" data-aos="fade-down">
                <img src="{{ asset('photo/white-logo.png') }}" alt="Logo">
            </div>

            <div class="slider-content" data-aos="fade-up" data-aos-delay="200">
                <div class="owl-carousel" id="infoSlider">
                    <div class="slide-item">
                        <h2>Grow Your Career with<br>Industry Leaders</h2>
                        <p>Join a team that values innovation, dedication, and professional growth. Your journey to
                            excellence starts here.</p>
                    </div>
                    <div class="slide-item">
                        <h2>Inclusive & Dynamic<br>Work Culture</h2>
                        <p>Experience a workplace where every voice matters. We foster collaboration, creativity, and
                            mutual respect.</p>
                    </div>
                    <div class="slide-item">
                        <h2>Impactful Work<br>Global Reach</h2>
                        <p>Contribute to projects that move the world. Our automotive solutions are trusted globally.
                        </p>
                    </div>
                </div>
            </div>

            <div class="info-footer">
                &copy; {{ date('Y') }} Indoprima Gemilang. All Rights Reserved.
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="form-side">
            <div class="form-wrapper">
                <div class="mobile-logo">
                    <img src="{{ asset('package/dist/images/logos/dark-logo.svg') }}" alt="Logo">
                </div>

                <div class="welcome-text" data-aos="fade-up">
                    <h1>Welcome Back 👋</h1>
                    <p>Enter your credentials to access your account.</p>
                </div>

                <form action="{{ route('authenticate') }}" method="POST" class="mt-4">
                    @csrf

                    <div class="input-group" data-aos="fade-up" data-aos-delay="100">
                        <input type="email" name="email" class="input-field" placeholder="Email Address" required>
                        <i class="ti ti-mail input-icon"></i>
                    </div>

                    <div class="input-group" data-aos="fade-up" data-aos-delay="200">
                        <input type="password" name="password" id="password" class="input-field" placeholder="Password"
                            required>
                        <i class="ti ti-lock input-icon"></i>
                        <i class="ti ti-eye toggle-password" onclick="togglePassword()"></i>
                    </div>

                    <div class="form-options" data-aos="fade-up" data-aos-delay="300">
                        <div class="remember-me">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">Remember me</label>
                        </div>
                        <a href="{{ url('auth/forget-password') }}" class="forgot-pass">Forgot Password?</a>
                    </div>

                    <button type="submit" class="btn-submit" data-aos="fade-up" data-aos-delay="400">
                        Sign In <i class="ti ti-arrow-right"></i>
                    </button>

                    <div class="register-text" data-aos="fade-up" data-aos-delay="500">
                        Don't have an account? <a href="{{ url('auth/register') }}">Create Account</a>
                    </div>
                </form>

                <div class="feature-cards" data-aos="fade-up" data-aos-delay="600">
                    <div class="f-card">
                        <div class="f-icon">
                            <i class="ti ti-briefcase"></i>
                        </div>
                        <div class="f-text">
                            <span>Open Positions</span>
                            <small>Explore Jobs</small>
                        </div>
                    </div>
                    <div class="f-card">
                        <div class="f-icon">
                            <i class="ti ti-file-check"></i>
                        </div>
                        <div class="f-text">
                            <span>Application</span>
                            <small>Check Status</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('package/landing/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('package/landing/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('package/landing/dist/libs/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('package/dist/js/sweetalert2@11.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Remove Preloader
            setTimeout(function() {
                $('#preloader').addClass('fade-out');
            }, 500);

            // Initialize AOS
            AOS.init({
                duration: 800,
                once: true,
                offset: 50
            });

            // Initialize Slider
            $('#infoSlider').owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                animateOut: 'fadeOut',
                dots: true,
                dotsClass: 'slider-dots owl-dots',
                dotClass: 'owl-dot'
            });
        });

        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const icon = document.querySelector('.toggle-password');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('ti-eye');
                icon.classList.add('ti-eye-off');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('ti-eye-off');
                icon.classList.add('ti-eye');
            }
        }
    </script>
</body>

</html>
