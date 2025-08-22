<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Indoprima Gemilang</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('package/dist/images/logos/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap"
        rel="stylesheet">

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
            --border-radius: 12px;
            --transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--darker);
            color: var(--light);
            line-height: 1.6;
            min-height: 100vh;
            overflow-x: hidden;
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

        /* Preloader */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--darker);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.6s ease;
        }

        .preloader.fade-out {
            opacity: 0;
            pointer-events: none;
        }

        /* Main Layout */
        .login-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 100vh;
            position: relative;
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            padding: 4rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.8), rgba(2, 6, 23, 0.9));
            overflow: hidden;
            z-index: 1;
        }

        .hero-section::before {
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

        .logo-container {
            margin-bottom: 3rem;
        }

        .logo {
            height: 48px;
            width: auto;
            filter: drop-shadow(0 0 20px rgba(0, 247, 255, 0.3));
        }

        .hero-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-grow: 1;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .hero-illustration {
            max-width: 80%;
            height: auto;
            margin: 2rem 0;
            filter: drop-shadow(0 20px 30px rgba(0, 0, 0, 0.3));
            animation: float 6s ease-in-out infinite;
        }

        .hero-text h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            background: linear-gradient(to right, var(--light), var(--primary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero-text p {
            color: var(--light-muted);
            font-size: 1.1rem;
            max-width: 80%;
            margin: 0 auto;
        }

        /* Form Section */
        .form-section {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4rem;
            background: rgba(2, 6, 23, 0.7);
            backdrop-filter: blur(20px);
            position: relative;
            z-index: 2;
        }

        .form-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(2, 6, 23, 0.9), rgba(15, 23, 42, 0.7));
            z-index: -1;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
        }

        .form-header {
            margin-bottom: 2.5rem;
            text-align: center;
        }

        .form-header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            color: var(--light);
        }

        .form-header p {
            color: var(--light-muted);
            font-size: 0.95rem;
        }

        /* Form Elements */
        .auth-form {
            width: 100%;
        }

        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-label {
            position: absolute;
            top: 1rem;
            left: 1rem;
            color: var(--light-muted);
            pointer-events: none;
            transition: var(--transition);
            font-size: 0.95rem;
        }

        .form-input {
            width: 100%;
            padding: 1rem;
            padding-left: 3rem;
            background: rgba(15, 23, 42, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius);
            color: var(--light);
            font-size: 0.95rem;
            transition: var(--transition);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 247, 255, 0.1);
        }

        .form-input:focus+.form-label,
        .form-input:not(:placeholder-shown)+.form-label {
            top: -0.6rem;
            left: 0.8rem;
            font-size: 0.75rem;
            background: var(--darker);
            padding: 0 0.5rem;
            color: var(--primary);
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--light-muted);
            transition: var(--transition);
        }

        .form-input:focus~.input-icon {
            color: var(--primary);
        }

        /* Button */
        .login-btn {
            width: 100%;
            padding: 1rem;
            background: var(--primary);
            color: var(--darker);
            border: none;
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin: 2rem 0 1.5rem;
            position: relative;
            overflow: hidden;
            transition: var(--transition);
            z-index: 1;
        }

        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 247, 255, 0.2);
        }

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: var(--transition);
            z-index: -1;
        }

        .login-btn:hover::before {
            left: 100%;
        }

        /* Form Footer */
        .form-footer {
            text-align: center;
            color: var(--light-muted);
            font-size: 0.9rem;
        }

        .register-link {
            color: var(--primary);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            transition: var(--transition);
        }

        .register-link:hover {
            color: var(--light);
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            margin: 2rem 0;
            color: var(--light-muted);
            font-size: 0.8rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        }

        .divider::before {
            margin-right: 1rem;
        }

        .divider::after {
            margin-left: 1rem;
        }

        /* Floating Elements */
        .floating-element {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0.1;
            z-index: 0;
        }

        .element-1 {
            width: 300px;
            height: 300px;
            background-color: var(--primary);
            top: 20%;
            left: 20%;
            animation: float 8s ease-in-out infinite;
        }

        .element-2 {
            width: 400px;
            height: 400px;
            background-color: var(--secondary);
            bottom: 10%;
            right: 10%;
            animation: float 10s ease-in-out infinite reverse;
        }

        /* Animations */
        @keyframes float {

            0%,
            100% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(0, 15px);
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
        @media (max-width: 1024px) {
            .login-container {
                grid-template-columns: 1fr;
            }

            .hero-section {
                display: none;
            }

            .form-section {
                padding: 2rem;
            }
        }

        @media (max-width: 576px) {
            .form-section {
                padding: 1.5rem;
            }

            .form-header h1 {
                font-size: 1.8rem;
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
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('package/dist/images/logos/favicon.ico') }}" alt="Loading..." class="lds-ripple img-fluid">
    </div>

    <!-- Floating Elements -->
    <div class="floating-element element-1"></div>
    <div class="floating-element element-2"></div>

    <!-- Main Container -->
    <div class="login-container">
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="logo-container">
                <img src="{{ asset('photo/white-logo.png') }}" alt="Indoprima Gemilang" class="logo">
            </div>

            <div class="hero-content">
                <img src="{{ asset('photo/login.png') }}" alt="Career Illustration" class="hero-illustration">

                <div class="hero-text">
                    <h2>Unlock Your Potential</h2>
                    <p>Join our elite team of professionals shaping the future of automotive manufacturing</p>
                </div>
            </div>
        </section>

        <!-- Form Section -->
        <section class="form-section">
            <div class="form-container">
                <div class="form-header">
                    <h1>Welcome Back</h1>
                    <p>Sign in to access your recruitment portal</p>
                </div>

                <div class="divider">Secure Login</div>

                <form action="{{ route('authenticate') }}" method="POST" class="auth-form">
                    @csrf

                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-input" placeholder=" " required>
                        <label for="email" class="form-label">Email Address</label>
                        <i class="input-icon ti ti-mail"></i>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-input" placeholder=" "
                            required>
                        <label for="password" class="form-label">Password</label>
                        <i class="input-icon ti ti-lock"></i>
                    </div>

                    <button type="submit" class="login-btn">
                        <span>Sign In</span>
                        <i class="ti ti-arrow-right"></i>
                    </button>

                    <div class="form-footer">
                        <p>Don't have an account? <a href="{{ url('auth/register') }}" class="register-link">Register
                                now</a></p>
                        <hr>
                        <p>Forget your password? <a href="{{ url('auth/forget-password') }}"
                                class="register-link">Reset</a></p>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('package/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('package/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('package/dist/js/custom.js') }}"></script>

    <script>
        // Remove preloader when page loads
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.querySelector('.preloader').classList.add('fade-out');
            }, 500);
        });

        // Input focus effects
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.previousElementSibling.style.color = 'var(--primary)';
                this.nextElementSibling.style.color = 'var(--primary)';
            });

            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.previousElementSibling.style.color = 'var(--light-muted)';
                }
                this.nextElementSibling.style.color = 'var(--light-muted)';
            });
        });
    </script>
</body>

</html>
