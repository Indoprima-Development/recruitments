<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Our Team | PT. Indoprima Gemilang</title>
    <meta name="description" content="Start your career journey with PT. Indoprima Gemilang">
    <link rel="shortcut icon" type="image/png" href="{{ asset('package/dist/images/logos/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-light: #6366f1;
            --primary-dark: #4338ca;
            --accent: #10b981;
            --dark: #1e293b;
            --light: #f8fafc;
            --light-muted: #94a3b8;
            --border-radius: 12px;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f1f5f9;
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            color: var(--dark);
        }

        /* Main Container */
        .registration-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 100vh;
        }

        /* Visual Section */
        .visual-section {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            color: white;
            padding: 4rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .visual-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: gradient-pulse 15s infinite alternate;
        }

        .logo-container {
            position: relative;
            z-index: 2;
        }

        .logo {
            height: 48px;
            filter: brightness(0) invert(1);
        }

        .visual-content {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 2;
        }

        .illustration {
            max-width: 80%;
            height: auto;
            filter: drop-shadow(0 20px 30px rgba(0, 0, 0, 0.3));
        }

        .visual-footer {
            position: relative;
            z-index: 2;
        }

        .visual-footer h3 {
            color: white;
            font-size: 1.75rem;
            margin-bottom: 1rem;
        }

        .visual-footer p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.1rem;
        }

        /* Form Section */
        .form-section {
            padding: 4rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: white;
        }

        .form-header {
            margin-bottom: 3rem;
            text-align: center;
        }

        .form-title {
            font-size: 2.25rem;
            margin-bottom: 1rem;
            color: var(--primary-dark);
        }

        .form-subtitle {
            color: var(--light-muted);
            font-size: 1.1rem;
            max-width: 80%;
            margin: 0 auto;
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 2rem 0;
            color: var(--light-muted);
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
        }

        .divider::before {
            margin-right: 1rem;
        }

        .divider::after {
            margin-left: 1rem;
        }

        /* Form Card */
        .form-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-lg);
            padding: 2.5rem;
        }

        .form-section-title {
            font-size: 1.25rem;
            color: var(--primary-dark);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .form-section-title i {
            color: var(--primary);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        /* Form Elements */
        .input-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: white;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }

        .form-select {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: var(--border-radius);
            font-size: 1rem;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%2394a3b8' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 12px;
            transition: all 0.3s ease;
        }

        .form-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }

        /* Button */
        .btn-primary {
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            padding: 1rem 2rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            width: 100%;
            box-shadow: var(--shadow);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-primary i {
            transition: transform 0.3s ease;
        }

        .btn-primary:hover i {
            transform: translateX(3px);
        }

        /* Modal */
        .modal-content {
            border-radius: var(--border-radius);
            border: none;
            box-shadow: var(--shadow-lg);
        }

        .modal-header {
            border-bottom: 1px solid #e2e8f0;
            padding: 1.5rem;
        }

        .modal-title {
            font-weight: 700;
            color: var(--dark);
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-footer {
            border-top: 1px solid #e2e8f0;
            padding: 1.5rem;
        }

        /* Animations */
        @keyframes gradient-pulse {
            0% { transform: translate(0, 0); }
            50% { transform: translate(10%, 10%); }
            100% { transform: translate(0, 0); }
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .registration-container {
                grid-template-columns: 1fr 1.5fr;
            }

            .visual-section,
            .form-section {
                padding: 3rem;
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
                padding: 4rem 2rem;
            }
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-title {
                font-size: 2rem;
            }

            .form-subtitle {
                max-width: 100%;
            }
        }

        @media (max-width: 576px) {
            .form-section {
                padding: 2rem 1.5rem;
            }

            .form-card {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="registration-container">
        <!-- Visual Section -->
        <div class="visual-section">
            <div class="logo-container">
                <img src="{{ asset('package/dist/images/logos/logo.png') }}" alt="PT. Indoprima Gemilang" class="logo">
            </div>

            <div class="visual-content">
                <img src="{{ asset('package/dist/images/backgrounds/login-security.svg') }}" alt="Career Illustration" class="illustration">
            </div>

            <div class="visual-footer">
                <h3>Build Your Future With Us</h3>
                <p>Join our team of innovators and industry leaders</p>
            </div>
        </div>

        <!-- Form Section -->
        <form action="{{ route('store') }}" method="POST" class="form-section">
            @csrf

            <div class="form-header">
                <h1 class="form-title">Join Our Team</h1>
                <p class="form-subtitle">Complete the form below to start your application process</p>

                <div class="divider">
                    Application Form
                </div>
            </div>

            <div class="form-card">
                <!-- Personal Information -->
                <h3 class="form-section-title">
                    <i class="ti ti-user-circle"></i>
                    Personal Information
                </h3>

                <div class="form-grid">
                    <div class="input-group">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="John Doe" required>
                    </div>

                    <div class="input-group">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="your@email.com" required>
                    </div>

                    <div class="input-group">
                        <label for="ktp" class="form-label">ID Number (NIK)</label>
                        <input type="text" name="ktp" id="ktp" class="form-control" placeholder="3577******" required>
                    </div>

                    <div class="input-group">
                        <label for="no_wa" class="form-label">WhatsApp Number</label>
                        <input type="tel" name="no_wa" id="no_wa" class="form-control" placeholder="0812*******" required>
                    </div>

                    <div class="input-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                    </div>
                </div>

                <!-- Education Background -->
                <h3 class="form-section-title">
                    <i class="ti ti-school"></i>
                    Education Background
                </h3>

                <div class="form-grid">
                    <div class="input-group">
                        <label for="pendidikan_terakhir" class="form-label">Highest Education</label>
                        <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-select" required>
                            <option value="" selected disabled>Select your education</option>
                            <option value="SMA SMK">High School/Vocational</option>
                            <option value="D4">Diploma 4</option>
                            <option value="S1">Bachelor's Degree</option>
                            <option value="S2">Master's Degree</option>
                        </select>
                    </div>

                    <div class="input-group">
                        <label for="asal_instansi" class="form-label">Institution Name</label>
                        <input type="text" name="asal_instansi" id="asal_instansi" class="form-control" required>
                    </div>

                    <div class="input-group">
                        <label for="jurusan" class="form-label">Major/Field of Study</label>
                        <input type="text" name="jurusan" id="jurusan" class="form-control" required>
                    </div>

                    <div class="input-group">
                        <label for="ipk" class="form-label">GPA Score</label>
                        <input type="number" name="ipk" id="ipk" class="form-control" step="0.01" min="0" max="4" placeholder="3.50" required>
                    </div>
                </div>

                <!-- Physical Information -->
                <h3 class="form-section-title">
                    <i class="ti ti-heartbeat"></i>
                    Physical Information
                </h3>

                <div class="form-grid">
                    <div class="input-group">
                        <label for="tinggi_badan" class="form-label">Height (cm)</label>
                        <input type="number" name="tinggi_badan" id="tinggi_badan" class="form-control" placeholder="170" required>
                    </div>

                    <div class="input-group">
                        <label for="berat_badan" class="form-label">Weight (kg)</label>
                        <input type="number" name="berat_badan" id="berat_badan" class="form-control" placeholder="65" required>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="button" class="btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#confirmationModal">
                    Submit Application
                    <i class="ti ti-arrow-right"></i>
                </button>
            </div>

            <!-- Confirmation Modal -->
            <div class="modal fade" id="confirmationModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirm Your Application</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Please review all information before submitting. You won't be able to make changes after submission.</p>
                            <div class="alert alert-light mt-3">
                                <i class="ti ti-info-circle me-2"></i>
                                Ensure all data is accurate and complete
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                Back to Form
                            </button>
                            <button type="submit" class="btn-primary">
                                Confirm & Submit
                                <i class="ti ti-check"></i>
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
        // Enhanced form interactions
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.querySelector('.form-label').style.color = 'var(--primary)';
                this.style.borderColor = 'var(--primary)';
            });

            input.addEventListener('blur', function() {
                this.parentElement.querySelector('.form-label').style.color = 'var(--dark)';
                if (!this.value) {
                    this.style.borderColor = '#e2e8f0';
                }
            });
        });
    </script>
</body>
</html>
