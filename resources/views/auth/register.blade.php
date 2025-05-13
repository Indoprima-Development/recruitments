<!DOCTYPE html>
<html lang="en" data-theme="future">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruitment - PT. Indoprima Gemilang</title>
    <meta name="description" content="Join our team of exceptional talents">
    <link rel="shortcut icon" type="image/png" href="{{ asset('package/dist/images/logos/favicon.ico') }}">

    <style>
        :root {
            --primary: #6366f1;
            --primary-light: #818cf8;
            --primary-dark: #4f46e5;
            --accent: #00f5d4;
            --success: #10b981;
            --dark-bg: #0f172a;
            --darker-bg: #020617;
            --card-bg: rgba(15, 23, 42, 0.7);
            --text-light: #e2e8f0;
            --text-muted: #94a3b8;
            --neon-glow: 0 0 10px rgba(99, 102, 241, 0.7);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--darker-bg);
            color: var(--text-light);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* NEW: Enhanced Layout Container */
        .registration-container {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }

        /* NEW: Asymmetric Grid Layout */
        @media (max-width: 1200px) {
            .registration-container {
                grid-template-columns: 1fr 1.5fr;
            }
        }

        @media (max-width: 992px) {
            .registration-container {
                grid-template-columns: 1fr;
            }
        }

        /* NEW: Visual Section Layout */
        .visual-section {
            position: relative;
            display: flex;
            flex-direction: column;
            padding: 3rem 4rem;
            justify-content: space-between;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.9), rgba(2, 6, 23, 0.95));
            backdrop-filter: blur(12px);
            z-index: 2;
            border-right: 1px solid rgba(99, 102, 241, 0.15);
        }

        /* NEW: Form Section Layout */
        .form-section {
            padding: 3rem 4rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: rgba(2, 6, 23, 0.85);
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }

        /* NEW: Background Elements Layout */
        .bg-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        /* NEW: Orb Positioning */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.2;
        }

        .orb-1 {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, var(--primary), transparent 70%);
            top: -150px;
            left: -150px;
            animation: float-orb 15s infinite alternate ease-in-out;
        }

        .orb-2 {
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, var(--accent), transparent 70%);
            bottom: -250px;
            right: -250px;
            animation: float-orb 20s infinite alternate-reverse ease-in-out;
        }

        /* NEW: Grid Pattern Layout */
        .grid-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                linear-gradient(rgba(99, 102, 241, 0.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(99, 102, 241, 0.08) 1px, transparent 1px);
            background-size: 50px 50px;
            opacity: 0.6;
        }

        /* NEW: Logo Container Layout */
        .logo-container {
            position: relative;
            margin-bottom: 3rem;
            width: fit-content;
        }

        .logo-img {
            width: 280px;
            filter: drop-shadow(0 0 20px rgba(99, 102, 241, 0.6));
            transition: transform 0.5s ease;
        }

        .logo-img:hover {
            transform: scale(1.05);
        }

        .logo-glow {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 350px;
            height: 350px;
            background: radial-gradient(circle, var(--primary-light), transparent 70%);
            opacity: 0.25;
            z-index: -1;
            animation: pulse-glow 4s infinite alternate;
        }

        /* NEW: Visual Content Layout */
        .visual-content {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 0;
            position: relative;
        }

        .visual-img {
            max-width: 100%;
            height: auto;
            filter: drop-shadow(0 15px 30px rgba(0, 0, 0, 0.4));
            animation: float 6s infinite alternate ease-in-out;
        }

        .image-reflection {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            height: 30px;
            background: radial-gradient(ellipse at center,
                rgba(99, 102, 241, 0.25) 0%,
                transparent 80%);
            filter: blur(10px);
        }

        /* NEW: Form Header Layout */
        .form-header {
            margin-bottom: 3rem;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .form-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(90deg, var(--text-light), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 0 15px rgba(99, 102, 241, 0.4);
        }

        .form-subtitle {
            color: var(--text-muted);
            font-size: 1.1rem;
            margin-bottom: 2rem;
            letter-spacing: 0.5px;
        }

        /* NEW: Divider Layout */
        .divider {
            display: flex;
            align-items: center;
            margin: 2rem 0;
            position: relative;
        }

        .divider-line {
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg,
                transparent,
                rgba(99, 102, 241, 0.6),
                transparent);
        }

        .divider-text {
            padding: 0 1.5rem;
            font-size: 0.9rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 2px;
            background: var(--darker-bg);
            position: relative;
        }

        /* NEW: Form Card Layout */
        .form-card {
            background: var(--card-bg);
            border-radius: 16px;
            padding: 2.5rem;
            border: 1px solid rgba(99, 102, 241, 0.25);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(8px);
            z-index: 2;
        }

        .form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 70% 30%, rgba(99, 102, 241, 0.15), transparent 70%);
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: -1;
        }

        .form-card:hover::before {
            opacity: 1;
        }

        /* NEW: Form Grid Layout */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .form-section-title {
            grid-column: 1 / -1;
            font-size: 1.2rem;
            color: var(--primary-light);
            margin-bottom: 0.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid rgba(99, 102, 241, 0.3);
            display: flex;
            align-items: center;
        }

        .form-section-title i {
            margin-right: 0.75rem;
        }

        /* NEW: Input Group Layout */
        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 1.1rem;
            transition: all 0.3s ease;
            z-index: 2;
        }

        .form-control {
            width: 100%;
            padding: 1rem 1rem 1rem 1rem;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(99, 102, 241, 0.3);
            border-radius: 50px;
            color: var(--text-light);
            font-size: 1rem;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.3);
        }

        .form-control:focus + .input-icon {
            color: var(--primary);
            transform: translateY(-50%) scale(1.1);
        }

        /* NEW: Select Input Layout */
        .form-select {
            width: 100%;
            padding: 1rem;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(99, 102, 241, 0.3);
            border-radius: 10px;
            color: var(--text-light);
            font-size: 1rem;
            transition: all 0.3s ease;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%2394a3b8' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 12px;
        }

        .form-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.3);
        }

        /* NEW: Button Layout */
        .btn-submit {
            padding: 1rem 2rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 500;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            margin-top: 1rem;
            width: 100%;
            max-width: 300px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.5);
        }

        .btn-submit .btn-icon {
            transition: transform 0.3s ease;
        }

        .btn-submit:hover .btn-icon {
            transform: translateX(5px);
        }

        .btn-glow {
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.3),
                transparent
            );
            transition: all 0.8s ease;
            z-index: -1;
        }

        .btn-submit:hover .btn-glow {
            left: 100%;
        }

        /* NEW: Modal Layout */
        .modal-future {
            background-color: rgba(2, 6, 23, 0.9);
        }

        .modal-future .modal-content {
            background: var(--card-bg);
            border: 1px solid rgba(99, 102, 241, 0.3);
            border-radius: 16px;
            backdrop-filter: blur(15px);
            color: var(--text-light);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .modal-future .modal-header {
            border-bottom: 1px solid rgba(99, 102, 241, 0.2);
            padding: 1.5rem;
        }

        .modal-future .modal-body {
            padding: 2rem;
            font-size: 1.1rem;
        }

        .modal-future .modal-footer {
            border-top: 1px solid rgba(99, 102, 241, 0.2);
            padding: 1.5rem;
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }

        /* NEW: Animations */
        @keyframes float {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-20px);
            }
        }

        @keyframes float-orb {
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

        @keyframes pulse-glow {
            0% {
                opacity: 0.2;
            }
            100% {
                opacity: 0.35;
            }
        }

        /* NEW: Responsive Adjustments */
        @media (max-width: 1200px) {
            .registration-container {
                grid-template-columns: 1fr 1.5fr;
            }

            .visual-section {
                padding: 2rem 3rem;
            }

            .form-section {
                padding: 2rem 3rem;
            }
        }

        @media (max-width: 992px) {
            .registration-container {
                grid-template-columns: 1fr;
            }

            .visual-section {
                display: none;
            }

            .form-section {
                padding: 3rem 2rem;
            }
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-card {
                padding: 1.5rem;
            }

            .form-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .form-section {
                padding: 2rem 1.5rem;
            }

            .btn-submit {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="registration-container">
        <!-- Background Elements -->
        <div class="bg-elements">
            <div class="grid-pattern"></div>
            <div class="orb orb-1"></div>
            <div class="orb orb-2"></div>
        </div>

        <!-- Visual Section -->
        <div class="visual-section">
            <div class="logo-container">
                <img src="{{ asset('package/dist/images/logos/logo.png') }}" alt="Company Logo" class="logo-img">
                <div class="logo-glow"></div>
            </div>

            <div class="visual-content">
                <img src="{{ asset('package/dist/images/backgrounds/login-security.svg') }}" alt="Registration Visual" class="visual-img">
                <div class="image-reflection"></div>
            </div>

            <div class="visual-footer">
                <h3>Shape Your Future With Us</h3>
                <p>Join PT. Indoprima Gemilang's innovative team</p>
            </div>
        </div>

        <!-- Form Section -->
        <form action="{{ route('store') }}" method="POST" class="form-section">
            @csrf

            <div class="form-header">
                <h1 class="form-title">Join Our Talent Network</h1>
                <p class="form-subtitle">PT. Indoprima Gemilang Recruitment Portal</p>

                <div class="divider">
                    <span class="divider-line"></span>
                    <span class="divider-text">Registration Form</span>
                    <span class="divider-line"></span>
                </div>
            </div>

            <div class="form-card">
                <!-- Personal Information Section -->
                <div class="form-section-title">
                    <i class="ti ti-user-circle"></i>
                    <span>Personal Information</span>
                </div>

                <div class="form-grid">
                    <div class="input-group">
                        <label for="email" class="form-label">Email</label>
                        <i class="input-icon ti ti-mail"></i>
                        <input type="email" name="email" id="email" class="form-control" placeholder="example@gmail.com" required>
                    </div>

                    <div class="input-group">
                        <label for="password" class="form-label">Password</label>
                        <i class="input-icon ti ti-key"></i>
                        <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                    </div>

                    <div class="input-group">
                        <label for="name" class="form-label">Full Name</label>
                        <i class="input-icon ti ti-user"></i>
                        <input type="text" name="name" id="name" class="form-control" placeholder="John Doe" required>
                    </div>

                    <div class="input-group">
                        <label for="ktp" class="form-label">NIK</label>
                        <i class="input-icon ti ti-id"></i>
                        <input type="text" name="ktp" id="ktp" class="form-control" placeholder="3577******" required>
                    </div>

                    <div class="input-group">
                        <label for="no_wa" class="form-label">WhatsApp Number</label>
                        <i class="input-icon ti ti-phone"></i>
                        <input type="text" name="no_wa" id="no_wa" class="form-control" placeholder="081****" required>
                    </div>
                </div>

                <!-- Education Section -->
                <div class="form-section-title">
                    <i class="ti ti-school"></i>
                    <span>Education Background</span>
                </div>

                <div class="form-grid">
                    <div class="input-group">
                        <label for="pendidikan_terakhir" class="form-label">Education Level</label>
                        <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-select" required>
                            <option value="" selected disabled>Select</option>
                            <option value="SMA SMK">SMA/SMK</option>
                            <option value="D4">D4</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                        </select>
                    </div>

                    <div class="input-group">
                        <label for="asal_instansi" class="form-label">Institution</label>
                        <input type="text" name="asal_instansi" id="asal_instansi" class="form-control" required>
                    </div>

                    <div class="input-group">
                        <label for="jurusan" class="form-label">Major</label>
                        <input type="text" name="jurusan" id="jurusan" class="form-control" required>
                    </div>

                    <div class="input-group">
                        <label for="ipk" class="form-label">GPA</label>
                        <input type="number" name="ipk" id="ipk" class="form-control" step="0.01" min="0" max="4" placeholder="4.00" required>
                    </div>
                </div>

                <!-- Physical Information Section -->
                <div class="form-section-title">
                    <i class="ti ti-heartbeat"></i>
                    <span>Physical Information</span>
                </div>

                <div class="form-grid">
                    <div class="input-group">
                        <label for="berat_badan" class="form-label">Weight (kg)</label>
                        <input type="number" name="berat_badan" id="berat_badan" class="form-control" step="0.1" required>
                    </div>

                    <div class="input-group">
                        <label for="tinggi_badan" class="form-label">Height (cm)</label>
                        <input type="number" name="tinggi_badan" id="tinggi_badan" class="form-control" step="0.1" required>
                    </div>
                </div>

                <div class="form-footer">
                    <button type="button" class="btn-submit" data-bs-toggle="modal" data-bs-target="#confirmationModal">
                        <span class="btn-text">Complete Registration</span>
                        <span class="btn-icon"><i class="ti ti-arrow-right"></i></span>
                        <span class="btn-glow"></span>
                    </button>
                </div>
            </div>

            <!-- Confirmation Modal -->
            <div class="modal fade modal-future" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirm Your Information</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Please verify that all the information you've provided is accurate and complete. Once submitted, you won't be able to make changes to this application.</p>
                            <div class="d-flex align-items-center mt-3">
                                <i class="ti ti-alert-circle fs-4 me-2 text-warning"></i>
                                <small class="text-muted">All fields are required and must be truthful</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="ti ti-arrow-left me-1"></i> Review
                            </button>
                            <button type="submit" class="btn-submit">
                                <span class="btn-text">Confirm & Submit</span>
                                <span class="btn-icon"><i class="ti ti-check"></i></span>
                                <span class="btn-glow"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('package/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        // Enhanced input interactions
        document.querySelectorAll('.form-control').forEach(input => {
            // Add focus effect
            input.addEventListener('focus', function() {
                this.style.borderColor = 'var(--primary)';
                this.style.boxShadow = '0 0 0 3px rgba(99, 102, 241, 0.3)';
                this.parentElement.querySelector('.input-icon').style.color = 'var(--primary)';
                this.parentElement.querySelector('.input-icon').style.transform = 'translateY(-50%) scale(1.2)';
            });

            // Remove focus effect
            input.addEventListener('blur', function() {
                this.style.borderColor = 'rgba(99, 102, 241, 0.3)';
                this.style.boxShadow = 'none';
                this.parentElement.querySelector('.input-icon').style.color = 'var(--text-muted)';
                this.parentElement.querySelector('.input-icon').style.transform = 'translateY(-50%) scale(1)';
            });

            // Add floating label effect
            input.addEventListener('input', function() {
                if (this.value !== '') {
                    this.style.paddingTop = '1.5rem';
                    this.style.paddingBottom = '0.5rem';
                } else {
                    this.style.paddingTop = '1rem';
                    this.style.paddingBottom = '1rem';
                }
            });
        });

        // Initialize tooltips
        $(function () {
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
</body>
</html>
