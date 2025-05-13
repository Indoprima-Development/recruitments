<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Recruitment - PT. Indoprima Gemilang</title>
    <!-- Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('package/dist/images/logos/favicon.ico') }}" />
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('package/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{ asset('package/dist/css/style.min.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Orbitron:wght@500;700&display=swap"
        rel="stylesheet">

    <style>
        .hero-quote {
            font-family: 'Orbitron', 'Audiowide', sans-serif;
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    @include('sweetalert::alert')
    <div class="preloader">
        <img src="{{ asset('package/dist/images/logos/favicon.ico') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!-- Body Wrapper -->
    <div class="login-wrapper" data-theme="future">
        <div class="login-container">
            <!-- Background Elements -->
            <div class="bg-grid"></div>
            <div class="floating-orb orb-1"></div>
            <div class="floating-orb orb-2"></div>
            <div class="particles-container"></div>

            <div class="login-content">
                <div class="login-hero">
                    <div class="logo-container">
                        <img src="{{ asset('photo/white-logo.png') }}" alt="Company Logo" class="holographic-logo">
                        <div class="logo-glow"></div>
                    </div>
                    <div class="hero-image">
                        <img src="{{ asset('photo/login.png') }}" alt="Login Visual" class="floating-img">
                        <div class="image-reflection"></div>
                    </div>
                    <div class="hero-quote">
                        <h3>Unlock Your Potential</h3>
                        <p>Join our network of exceptional talents shaping the future</p>
                    </div>
                </div>

                <div class="login-form-container">
                    <div class="form-wrapper">
                        <div class="form-header" style="font-family: 'Orbitron', 'Audiowide', sans-serif">
                            <h2 class="text-white">Welcome Back</h2>
                            <p class="subtext">PT. Indoprima Gemilang</p>

                            <div class="divider">
                                <span class="divider-line"></span>
                                <span class="divider-text">Secure Login</span>
                                <span class="divider-line"></span>
                            </div>
                        </div>

                        <form action="{{ route('authenticate') }}" method="POST" class="auth-form" style="font-family: 'Orbitron', 'Audiowide', sans-serif">
                            @csrf

                            <div class="input-field floating-input">
                                <input type="email" name="email" id="email" required>
                                <label for="email">Email Address</label>
                                <div class="input-highlight"></div>
                                <i class="input-icon ti ti-mail"></i>
                            </div>

                            <div class="input-field floating-input">
                                <input type="password" name="password" id="password" required>
                                <label for="password">Password</label>
                                <div class="input-highlight"></div>
                                <i class="input-icon ti ti-lock"></i>
                            </div>

                            <button type="submit" class="login-btn">
                                <span class="btn-text">Sign In</span>
                                <span class="btn-icon">
                                    <i class="ti ti-arrow-right"></i>
                                </span>
                                <span class="btn-glow"></span>
                            </button>

                            <div class="form-footer" style="font-family: 'Orbitron', 'Audiowide', sans-serif">
                                <p>Don't have an account?
                                    <a href="{{ url('auth/register') }}" class="register-link">
                                        <span>Create Account</span>
                                        <i class="ti ti-arrow-up-right"></i>
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Base Variables */
        :root {
            --primary: #6366f1;
            --primary-light: #818cf8;
            --primary-dark: #4f46e5;
            --accent: #00f5d4;
            --dark-bg: #0f172a;
            --darker-bg: #020617;
            --card-bg: rgba(15, 23, 42, 0.6);
            --text-light: #e2e8f0;
            --text-muted: #94a3b8;
            --neon-glow: 0 0 10px rgba(99, 102, 241, 0.7);
        }

        /* Base Styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--darker-bg);
            color: var(--text-light);
            overflow-x: hidden;
        }

        /* Login Container */
        .login-wrapper {
            min-height: 100vh;
            display: flex;
            position: relative;
            overflow: hidden;
        }

        .login-container {
            display: flex;
            width: 100%;
            min-height: 100vh;
            position: relative;
            z-index: 2;
        }

        /* Background Elements */
        .bg-grid {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                linear-gradient(rgba(99, 102, 241, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(99, 102, 241, 0.1) 1px, transparent 1px);
            background-size: 40px 40px;
            opacity: 0.3;
            z-index: 1;
        }

        .floating-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(40px);
            opacity: 0.3;
            z-index: 1;
        }

        .orb-1 {
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, var(--primary), transparent 70%);
            top: -100px;
            left: -100px;
            animation: float 15s infinite alternate ease-in-out;
        }

        .orb-2 {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, var(--accent), transparent 70%);
            bottom: -200px;
            right: -200px;
            animation: float 20s infinite alternate-reverse ease-in-out;
        }

        .particles-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            overflow: hidden;
        }

        /* Login Content Layout */
        .login-content {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        .login-hero {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 3rem;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.8), rgba(2, 6, 23, 0.9));
            backdrop-filter: blur(10px);
            z-index: 2;
            position: relative;
        }

        .login-form-container {
            width: 100%;
            max-width: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background: rgba(2, 6, 23, 0.7);
            backdrop-filter: blur(10px);
            border-left: 1px solid rgba(99, 102, 241, 0.1);
            z-index: 3;
        }

        /* Logo Styles */
        .logo-container {
            position: relative;
            margin-bottom: 3rem;
        }

        .holographic-logo {
            width: 250px;
            height: auto;
            filter: drop-shadow(0 0 15px rgba(99, 102, 241, 0.5));
            position: relative;
            z-index: 2;
        }

        .logo-glow {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, var(--primary-light), transparent 70%);
            opacity: 0.3;
            z-index: 1;
        }

        /* Hero Image */
        .hero-image {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .floating-img {
            max-width: 80%;
            height: auto;
            animation: float 6s infinite alternate ease-in-out;
            filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.3));
        }

        .image-reflection {
            position: absolute;
            bottom: -50px;
            left: 50%;
            transform: translateX(-50%);
            width: 70%;
            height: 20px;
            background: radial-gradient(ellipse at center,
                    rgba(99, 102, 241, 0.3) 0%,
                    transparent 70%);
            filter: blur(5px);
        }

        /* Hero Quote */
        .hero-quote {
            text-align: center;
            margin-top: 2rem;
        }

        .hero-quote h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            background: linear-gradient(90deg, var(--text-light), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero-quote p {
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        /* Form Styles */
        .form-wrapper {
            width: 100%;
            max-width: 400px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .form-header h2 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .neon-text {
            text-shadow: 0 0 10px rgba(99, 102, 241, 0.7),
                0 0 20px rgba(99, 102, 241, 0.5),
                0 0 30px rgba(99, 102, 241, 0.3);
            animation: neon-pulse 2s infinite alternate;
        }

        .subtext {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
        }

        .divider-line {
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(99, 102, 241, 0.5), transparent);
        }

        .divider-text {
            padding: 0 1rem;
            font-size: 0.8rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Input Fields */
        .input-field {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .floating-input {
            position: relative;
        }

        .floating-input input {
            width: 100%;
            padding: 1rem 1rem 1rem 2.5rem;
            background: rgba(15, 23, 42, 0.5);
            border: 1px solid rgba(99, 102, 241, 0.3);
            border-radius: 8px;
            color: var(--text-light);
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .floating-input input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.2);
        }

        .floating-input label {
            position: absolute;
            top: 1rem;
            left: 2.5rem;
            color: var(--text-muted);
            font-size: 0.95rem;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .floating-input input:focus+label,
        .floating-input input:not(:placeholder-shown)+label {
            top: -0.6rem;
            left: 1rem;
            font-size: 0.75rem;
            background: var(--dark-bg);
            padding: 0 0.5rem;
            color: var(--primary-light);
        }

        .input-highlight {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: width 0.3s ease;
        }

        .floating-input input:focus~.input-highlight {
            width: 100%;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 1rem;
        }

        /* Login Button */
        .login-btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin: 2rem 0 1rem;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            z-index: 1;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(99, 102, 241, 0.4);
        }

        .login-btn .btn-icon {
            transition: transform 0.3s ease;
        }

        .login-btn:hover .btn-icon {
            transform: translateX(3px);
        }

        .btn-glow {
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg,
                    transparent,
                    rgba(255, 255, 255, 0.2),
                    transparent);
            transition: all 0.7s ease;
            z-index: -1;
        }

        .login-btn:hover .btn-glow {
            left: 100%;
        }

        /* Form Footer */
        .form-footer {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .register-link {
            color: var(--accent);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            transition: all 0.3s ease;
        }

        .register-link:hover {
            color: var(--primary-light);
        }

        .register-link i {
            font-size: 0.8rem;
            transition: transform 0.3s ease;
        }

        .register-link:hover i {
            transform: translate(2px, -2px);
        }

        /* Animations */
        @keyframes float {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-15px);
            }
        }

        @keyframes neon-pulse {
            0% {
                text-shadow: 0 0 10px rgba(99, 102, 241, 0.7),
                    0 0 20px rgba(99, 102, 241, 0.5),
                    0 0 30px rgba(99, 102, 241, 0.3);
            }

            100% {
                text-shadow: 0 0 15px rgba(99, 102, 241, 0.8),
                    0 0 25px rgba(99, 102, 241, 0.6),
                    0 0 35px rgba(99, 102, 241, 0.4);
            }
        }

        /* Responsive Adjustments */
        @media (max-width: 1024px) {
            .login-content {
                flex-direction: column;
            }

            .login-hero {
                display: none;
            }

            .login-form-container {
                max-width: 100%;
                border-left: none;
                border-top: 1px solid rgba(99, 102, 241, 0.1);
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Create floating particles
            const particlesContainer = document.querySelector('.particles-container');
            const particleCount = 30;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';

                // Random properties
                const size = Math.random() * 3 + 1;
                const posX = Math.random() * 100;
                const posY = Math.random() * 100;
                const delay = Math.random() * 5;
                const duration = Math.random() * 10 + 10;

                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${posX}%`;
                particle.style.top = `${posY}%`;
                particle.style.animationDelay = `${delay}s`;
                particle.style.animationDuration = `${duration}s`;
                particle.style.opacity = Math.random() * 0.5 + 0.1;

                particlesContainer.appendChild(particle);
            }

            // Add input focus effects
            const inputs = document.querySelectorAll('.floating-input input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.querySelector('.input-icon').style.color = 'var(--primary)';
                });

                input.addEventListener('blur', function() {
                    this.parentElement.querySelector('.input-icon').style.color =
                        'var(--text-muted)';
                });
            });
        });
    </script>

    <!-- Import Js Files -->
    <script src="{{ asset('package/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- core files -->
    <script src="{{ asset('package/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('package/dist/js/app.horizontal.init.js') }}"></script>
    <script src="{{ asset('package/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('package/dist/js/sidebarmenu.js') }}"></script>

    <script src="{{ asset('package/dist/js/custom.js') }}"></script>
</body>

</html>
