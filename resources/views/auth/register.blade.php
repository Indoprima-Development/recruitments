<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Our Team | PT. Indoprima Gemilang</title>
    <meta name="description" content="Start your career journey with PT. Indoprima Gemilang">
    <link rel="shortcut icon" type="image/png" href="{{ asset('package/dist/images/logos/favicon.ico') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        :root {
            --primary: #6366f1;
            --primary-light: #818cf8;
            --primary-dark: #4f46e5;
            --accent: #10b981;
            --accent-light: #34d399;
            --dark: #0f172a;
            --darker: #020617;
            --light: #f8fafc;
            --light-muted: #94a3b8;
            --border-radius: 16px;
            --border-radius-lg: 24px;
            --glow: 0 0 15px rgba(99, 102, 241, 0.5);
            --glow-accent: 0 0 15px rgba(16, 185, 129, 0.5);
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.2), 0 2px 4px -1px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.2), 0 4px 6px -2px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.2), 0 10px 10px -5px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--darker);
            color: var(--light);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            color: var(--light);
        }

        /* Glassmorphism Effect */
        .glass {
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Main Container */
        .registration-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        /* Background Elements */
        .bg-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .bg-circle {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0.15;
        }

        .circle-1 {
            width: 300px;
            height: 300px;
            background: var(--primary);
            top: -100px;
            left: -100px;
            animation: float 8s ease-in-out infinite;
        }

        .circle-2 {
            width: 400px;
            height: 400px;
            background: var(--accent);
            bottom: -150px;
            right: -150px;
            animation: float 10s ease-in-out infinite reverse;
        }

        .circle-3 {
            width: 200px;
            height: 200px;
            background: var(--primary-light);
            top: 50%;
            left: 30%;
            animation: float 6s ease-in-out infinite 2s;
        }

        .logo-container {
            position: absolute;
            top: 2rem;
            left: 2rem;
            z-index: 2;
        }

        .logo {
            height: 48px;
            transition: var(--transition);
        }

        .logo:hover {
            transform: scale(1.05);
        }

        /* Form Section */
        .form-section {
            padding: 4rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header {
            margin-bottom: 3rem;
            text-align: center;
        }

        .form-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: var(--glow);
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
            position: relative;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(148, 163, 184, 0.3), transparent);
        }

        .divider::before {
            margin-right: 1rem;
        }

        .divider::after {
            margin-left: 1rem;
        }

        /* Form Card */
        .form-card {
            background: rgba(15, 23, 42, 0.7);
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-lg);
            padding: 2.5rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: var(--transition);
        }

        .form-card:hover {
            box-shadow: 0 0 30px rgba(99, 102, 241, 0.3);
            border-color: rgba(99, 102, 241, 0.3);
        }

        .form-section-title {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .form-section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), transparent);
            border-radius: 3px;
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
            color: var(--light);
            transition: var(--transition);
        }

        .form-control {
            width: 90%;
            padding: 1rem 1.25rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: var(--transition);
            background-color: rgba(2, 6, 23, 0.5);
            color: var(--light);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.3);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: var(--glow);
            background-color: rgba(2, 6, 23, 0.8);
        }

        .form-select {
            width: 100%;
            padding: 1rem 1.25rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius);
            font-size: 1rem;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23e2e8f0' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1.25rem center;
            background-size: 12px;
            transition: var(--transition);
            background-color: rgba(2, 6, 23, 0.5);
            color: var(--light);
        }

        .form-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: var(--glow);
            background-color: rgba(2, 6, 23, 0.8);
        }

        /* Button */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            border-radius: var(--border-radius);
            padding: 1.25rem 2rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            width: 100%;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            opacity: 0;
            transition: var(--transition);
            z-index: -1;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md), var(--glow);
        }

        .btn-primary:hover::before {
            opacity: 1;
        }

        .btn-primary i {
            transition: var(--transition);
        }

        .btn-primary:hover i {
            transform: translateX(5px);
        }

        /* Modal */
        .modal-content {
            border-radius: var(--border-radius-lg);
            border: none;
            box-shadow: var(--shadow-lg);
            background: var(--dark);
            color: var(--light);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .modal-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1.5rem;
        }

        .modal-title {
            font-weight: 700;
            color: var(--light);
            font-size: 1.5rem;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-footer {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1.5rem;
        }

        .btn-light {
            background: rgba(255, 255, 255, 0.1);
            color: var(--light);
            border: none;
            border-radius: var(--border-radius);
            padding: 0.75rem 1.5rem;
            transition: var(--transition);
        }

        .btn-light:hover {
            background: rgba(255, 255, 255, 0.2);
            color: var(--light);
        }

        .alert {
            padding: 1rem;
            border-radius: var(--border-radius);
            background: rgba(2, 6, 23, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .alert-light {
            color: var(--light-muted);
        }

        /* Animations */
        @keyframes float {
            0% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(10px, 10px);
            }

            100% {
                transform: translate(0, 0);
            }
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(99, 102, 241, 0.7);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(99, 102, 241, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(99, 102, 241, 0);
            }
        }

        /* Responsive */
        @media (max-width: 992px) {
            .form-section {
                padding: 2rem;
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

            .form-section {
                padding: 1.5rem;
            }

            .form-card {
                padding: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .registration-container {
                padding: 1rem;
            }

            .form-section {
                padding: 1rem 0;
            }

            .form-title {
                font-size: 1.75rem;
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
    <div class="bg-elements">
        <div class="bg-circle circle-1"></div>
        <div class="bg-circle circle-2"></div>
        <div class="bg-circle circle-3"></div>
    </div>

    <div class="registration-container">
        <form action="{{ route('store') }}" method="POST" class="form-section">
            @csrf

            <div class="form-header">
                <img src="{{ asset('photo/white-logo.png') }}" alt="PT. Indoprima Gemilang" class="logo">
                <h1 class="form-title animate__animated animate__fadeInDown">Join Our Team</h1>
                <p class="form-subtitle animate__animated animate__fadeInDown animate__delay-1s">Complete the form below
                    to start your application process</p>

                <div class="divider animate__animated animate__fadeIn animate__delay-2s">
                    <span>Application Form</span>
                </div>
            </div>

            <div class="form-card glass">
                <!-- Personal Information -->
                <h3 class="form-section-title animate__animated animate__fadeIn animate__delay-2s">
                    <i class="ti ti-user-circle"></i>
                    Personal Information
                </h3>

                <div class="form-grid">
                    <div class="input-group animate__animated animate__fadeIn animate__delay-3s">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="John Doe"
                            required>
                    </div>

                    <div class="input-group animate__animated animate__fadeIn animate__delay-3s">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="your@email.com" required>
                    </div>

                    <div class="input-group animate__animated animate__fadeIn animate__delay-4s">
                        <label for="ktp" class="form-label">ID Number (NIK)</label>
                        <input type="text" name="ktp" id="ktp" class="form-control"
                            placeholder="3577******" required>
                    </div>

                    <div class="input-group animate__animated animate__fadeIn animate__delay-4s">
                        <label for="no_wa" class="form-label">WhatsApp Number</label>
                        <input type="tel" name="no_wa" id="no_wa" class="form-control"
                            placeholder="0812*******" required>
                    </div>

                    <div class="input-group animate__animated animate__fadeIn animate__delay-5s">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="••••••••" required>
                    </div>
                </div>

                <!-- Education Background -->
                <h3 class="form-section-title animate__animated animate__fadeIn animate__delay-5s">
                    <i class="ti ti-school"></i>
                    Education Background
                </h3>

                <div class="form-grid">
                    <div class="input-group animate__animated animate__fadeIn animate__delay-6s">
                        <label for="pendidikan_terakhir" class="form-label">Highest Education</label>
                        <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-select" required>
                            <option value="" selected disabled>Select your education</option>
                            <option value="SMA SMK">High School/Vocational</option>
                            <option value="D4">Diploma 4</option>
                            <option value="S1">Bachelor's Degree</option>
                            <option value="S2">Master's Degree</option>
                        </select>
                    </div>

                    <div class="input-group animate__animated animate__fadeIn animate__delay-6s">
                        <label for="asal_instansi" class="form-label">Institution Name</label>
                        <select name="asal_instansi" id="asal_instansi" class="form-select">
                            <option value="">Select</option>
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

                    <div class="input-group animate__animated animate__fadeIn animate__delay-7s">
                        <label for="jurusan" class="form-label">Major/Field of Study</label>
                        <select name="jurusan" id="jurusan" class="form-select">
                            <option value="">Select Major/Field</option>
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Kimia">Kimia</option>
                            <option value="Manajemen">Manajemen</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Matematika">Matematika</option>
                            <option value="Others">Others</option>
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

                    <div class="input-group animate__animated animate__fadeIn animate__delay-7s">
                        <label for="ipk" class="form-label">GPA Score</label>
                        <input type="number" name="ipk" id="ipk" class="form-control" step="0.01"
                            min="0" max="4" placeholder="3.50" required>
                    </div>
                </div>

                <!-- Physical Information -->
                <h3 class="form-section-title animate__animated animate__fadeIn animate__delay-8s">
                    <i class="ti ti-heartbeat"></i>
                    Physical Information
                </h3>

                <div class="form-grid">
                    <div class="input-group animate__animated animate__fadeIn animate__delay-9s">
                        <label for="tinggi_badan" class="form-label">Height (cm)</label>
                        <input type="number" name="tinggi_badan" id="tinggi_badan" class="form-control"
                            placeholder="170" step="any" required>
                    </div>

                    <div class="input-group animate__animated animate__fadeIn animate__delay-9s">
                        <label for="berat_badan" class="form-label">Weight (kg)</label>
                        <input type="number" name="berat_badan" id="berat_badan" class="form-control"
                            placeholder="65" step="any" required>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-primary mt-4 animate__animated animate__fadeIn animate__delay-10s"
                    data-bs-toggle="modal" data-bs-target="#confirmationModal">
                    Submit Application
                    <i class="ti ti-arrow-right"></i>
                </button>
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
                this.parentElement.querySelector('.form-label').style.color = 'var(--primary-light)';
                this.style.borderColor = 'var(--primary)';
                this.style.boxShadow = 'var(--glow)';
            });

            input.addEventListener('blur', function() {
                this.parentElement.querySelector('.form-label').style.color = 'var(--light)';
                if (!this.value) {
                    this.style.borderColor = 'rgba(255, 255, 255, 0.1)';
                    this.style.boxShadow = 'none';
                }
            });
        });

        // Animate elements when they come into view
        const animateOnScroll = () => {
            const elements = document.querySelectorAll('.animate__animated');

            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                if (elementPosition < windowHeight - 100) {
                    const animationClass = element.classList[1];
                    element.classList.add(animationClass);
                }
            });
        };

        window.addEventListener('scroll', animateOnScroll);
        window.addEventListener('load', animateOnScroll);
    </script>
</body>

</html>
