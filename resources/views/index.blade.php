<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  Title -->
    <title>Recruitments</title>
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('package/landing/dist/images/logos/favicon.ico') }}">
    <!--  Aos -->
    <link rel="stylesheet" href="{{ asset('package/landing/dist/libs/aos/dist/aos.css') }}">
    <link rel="stylesheet"
        href="{{ asset('package/landing/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('package/landing/dist/css/style.min.css') }}">

    <style>
        .hover-glow:hover {
            box-shadow: 0 0 20px #00f0ff, 0 0 40px rgba(0, 255, 255, 0.3);
            transition: all 0.3s ease-in-out;
        }

        .glow-circle {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 12px;
            height: 12px;
            background: #00f0ff;
            border-radius: 50%;
            box-shadow: 0 0 10px #00f0ff, 0 0 20px #00f0ff;
        }
    </style>
</head>

<body>
    <div class="page-wrapper p-0 overflow-hidden">
        <header class="header">
            <nav class="navbar navbar-expand-lg py-0">
                <div class="container">
                    <a class="navbar-brand me-0 py-0" href="index.html">
                        <img src="{{ asset('photo/white-logo.png') }}" height="60" alt="img-fluid">
                    </a>
                    <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti ti-menu-2 fs-9"></i>
                    </button>
                    <button class="navbar-toggler border-0 p-0 shadow-none" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <i class="ti ti-menu-2 fs-9"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center ms-auto">
                            <li class="nav-item ms-2">
                                <a class="btn btn-outline-dark btn-xs rounded-pill px-3 py-1 text-nowrap"
                                    href="{{ url('vacancies') }}">
                                    <i class="ti ti-briefcase me-1"></i> Lowongan
                                </a>
                            </li>
                            @if (!Auth::check())
                                <li class="nav-item ms-2">
                                    <a class="btn btn-dark btn-xs rounded-pill px-3 py-1 text-white text-nowrap"
                                        href="{{ url('auth/login') }}">
                                        <i class="ti ti-login me-1"></i> Masuk
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="body-wrapper overflow-hidden">
            <section class="hero-section position-relative overflow-hidden py-5"
                style="background: linear-gradient(135deg, #0f0c29, #302b63, #24243e); color: #fff;">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Text Section -->
                        <div class="col-lg-6 text-light" data-aos="fade-up" data-aos-delay="200">
                            <div class="hero-content py-5">
                                <h6 class="d-flex align-items-center gap-2 fs-5 fw-medium mb-3 text-info"  style="text-shadow: 0 0 10px #00f0ff;">
                                    <i class="ti ti-rocket fs-5"></i> Welcome to the Future
                                </h6>
                                <h1 class="fw-bold mb-4 display-4 text-white"  style="text-shadow: 0 0 10px #00f0ff;">
                                    Indoprima Gemilang<br>
                                    <span class="text-primary"
                                        style="text-shadow: 0 0 10px #00f0ff;">Recruitment</span><br>System
                                </h1>
                                <p class="fs-5 mb-4 fw-light">
                                    Empowering growth, fostering potential. <span class="text-info fw-semibold">Your
                                        bright future starts here!</span>
                                </p>

                                <div class="d-flex gap-3 flex-wrap">
                                    @if (!Auth::check())
                                        <a class="btn btn-lg btn-info px-4 text-white shadow"
                                            href="{{ url('auth/login') }}">
                                            <i class="ti ti-login me-2"></i>Masuk
                                        </a>
                                        <a class="btn btn-lg btn-outline-light border-info px-4"
                                            href="{{ url('auth/register') }}">
                                            Daftar
                                        </a>
                                    @else
                                        <a class="btn btn-lg btn-info px-5 text-white shadow"
                                            href="{{ url('vacancies') }}">
                                            Masuk
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Image Section -->
                        <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-delay="400">
                            <div class="hero-img">
                                <img src="{{ asset('photo/landing.png') }}" alt="Hero Image"
                                    class="img-fluid rounded shadow-lg"
                                    style="max-width: 80%; filter: drop-shadow(0 0 10px #00f0ff);">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Futuristic Glow Elements -->
                <div class="position-absolute top-0 start-0 w-100 h-100" style="pointer-events: none;">
                    <div
                        style="position: absolute; width: 300px; height: 300px; background: radial-gradient(circle, rgba(0,255,255,0.2), transparent); top: 10%; left: -10%; border-radius: 50%;">
                    </div>
                    <div
                        style="position: absolute; width: 200px; height: 200px; background: radial-gradient(circle, rgba(0,255,255,0.2), transparent); bottom: 20%; right: -5%; border-radius: 50%;">
                    </div>
                </div>
            </section>

            <section class="pt-5 pb-8"
                style="background: linear-gradient(135deg, #0f2027, #203a43, #2c5364); color: #fff;">
                <div class="container">
                    <!-- Header -->
                    <div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-lg-8 text-center">
                            <h2 class="display-6 fw-bold text-white">
                                🔍 <span class="text-white">Lowongan</span> <span class="text-info">Terbaru</span>
                            </h2>
                            <p class="text-light fs-5 mt-2">Peluang terbaik untuk karier masa depan Anda</p>
                        </div>
                    </div>

                    <!-- Slider -->
                    <div class="review-slider" data-aos="fade-up" data-aos-delay="400">
                        <div class="owl-carousel owl-theme">
                            @foreach ($jobs as $job)
                                <div class="item me-2">
                                    <div class="card job-card border-0 bg-white bg-opacity-10 text-white shadow-lg rounded-4 p-4 position-relative h-100"
                                        style="backdrop-filter: blur(6px); min-height: 320px;">
                                        <!-- Status badge -->
                                        <div class="position-absolute top-0 end-0 mt-3 me-3">
                                            <span
                                                class="badge bg-info text-dark small fw-semibold px-3 py-1 rounded-pill">
                                                {{ $job->status_pegawai }}
                                            </span>
                                        </div>

                                        <!-- Job Info -->
                                        <h5 class="fw-bold text-white mb-1">
                                            {{ $job->jobtitle->jobtitle_name ?? '-' }}
                                        </h5>
                                        <h6 class="text-light mb-3 small">
                                            {{ $job->division->division_name ?? '-' }}
                                        </h6>

                                        <ul class="list-unstyled small mb-3">
                                            <li class="mb-1">
                                                <i class="ti ti-school text-info me-1"></i>
                                                {{ $job->education->education_name ?? '-' }}
                                            </li>
                                            <li class="mb-1">
                                                <i class="ti ti-gender-bigender text-info me-1"></i>
                                                @if ($job->gender == 1)
                                                    Laki-laki
                                                @elseif ($job->gender == 2)
                                                    Perempuan
                                                @else
                                                    Laki-laki / Perempuan
                                                @endif
                                            </li>
                                            <li>
                                                <i class="ti ti-calendar-time text-info me-1"></i>
                                                Mulai: {{ $job->date_startwork }}
                                            </li>
                                        </ul>

                                        <!-- CTA Button -->
                                        <div class="mt-auto text-start">
                                            <a href="{{ url('vacancies', $job->id) }}"
                                                class="btn btn-outline-info btn-sm rounded-pill px-3 text-white border-white border-opacity-50">
                                                Lamar <i class="ti ti-arrow-big-right-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Lihat Semua -->
                    <div class="text-center mt-5">
                        <a href="{{ url('vacancies') }}"
                            class="btn btn-info text-white px-4 py-2 rounded-pill shadow-sm">
                            Buka Semua Lowongan
                        </a>
                    </div>
                </div>
            </section>



            <section class="py-5"
                style="background: radial-gradient(circle at top left, #1f1f2e, #12121c); color: #fff;">
                <div class="container">
                    <!-- Section Title -->
                    <div class="row justify-content-center mb-5">
                        <div class="col-lg-6 text-center" data-aos="fade-up" data-aos-delay="300">
                            <h2 class="fw-bold display-6 text-white" style="text-shadow: 0 0 10px #00f7ff, 0 0 20px #00f7ff, 0 0 30px #00f7ff;">🧭 Alur Rekrutmen</h2>

                            <p class="text-primary fs-5">Langkah demi langkah menuju masa depan kariermu</p>
                        </div>
                    </div>

                    <!-- Steps Section -->
                    <div class="row g-4">
                        @php
                            $steps = [
                                ['icon' => 'ti ti-square-number-1', 'label' => 'Buat Akun'],
                                ['icon' => 'ti ti-square-number-2', 'label' => 'Verifikasi'],
                                ['icon' => 'ti ti-square-number-3', 'label' => 'Masuk'],
                                ['icon' => 'ti ti-square-number-4', 'label' => 'Lamar Lowongan'],
                                ['icon' => 'ti ti-square-number-5', 'label' => 'Tes Teknis'],
                                ['icon' => 'ti ti-square-number-6', 'label' => 'Wawancara Human Capital'],
                                ['icon' => 'ti ti-square-number-7', 'label' => 'Psikotes'],
                                ['icon' => 'ti ti-square-number-8', 'label' => 'Wawancara Akhir'],
                                ['icon' => 'ti ti-square-number-9', 'label' => 'Pemeriksaan Kesehatan'],
                                ['icon' => 'ti ti-heart-handshake', 'label' => 'Finalisasi'],
                            ];
                        @endphp

                        @foreach ($steps as $index => $step)
                            <div class="col-6 col-md-4 col-lg-3" data-aos="zoom-in"
                                data-aos-delay="{{ 400 + $index * 100 }}">
                                <div
                                    class="bg-dark rounded-4 p-4 text-center h-100 border border-info position-relative hover-glow">
                                    <i class="d-block {{ $step['icon'] }} fs-8 mb-3 text-info"></i>
                                    <h6 class="fw-semibold fs-5 text-white">{{ $step['label'] }}</h6>
                                    <span class="glow-circle"></span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>


            <section class="pt-5 pt-xl-9 pb-8"
                style="background: linear-gradient(135deg, #0d0d2b, #1a1a40); color: #fff;">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-7 col-xl-5 pt-lg-5 mb-5 mb-lg-0 text-center text-lg-start">
                            <h2 class="display-6 fw-bold mb-4 text-white" style="text-shadow: 0 0 8px #00f7ff;">
                                🚀 Daftarkan Diri Anda Sekarang!
                            </h2>
                            <p class="fs-5 text-muted mb-4">Jangan lewatkan kesempatan untuk bergabung dan berkembang
                                bersama kami.</p>
                            <div
                                class="d-flex flex-column flex-sm-row align-items-center justify-content-center justify-content-lg-start gap-3">
                                <a href="{{ url('auth/login') }}"
                                    class="btn btn-outline-info fw-semibold px-4 py-2 shadow-sm border-2 rounded-pill">Masuk</a>
                                <a href="{{ url('auth/register') }}"
                                    class="btn btn-info text-dark fw-bold px-4 py-2 shadow-sm border-0 rounded-pill">Daftar</a>
                            </div>
                        </div>
                        {{-- C:\Projects\laravel\recruitments\public\photo --}}
                        <div class="col-lg-5 col-xl-5 text-center text-lg-end">
                            <img src="{{ asset('photo/Picture1.png') }}"
                                alt="Woman Registering" class="img-fluid rounded-4 border border-info shadow-lg"
                                style="max-height: 250px;">
                        </div>
                    </div>
                </div>
            </section>


        </div>
        <footer class="footer-part pt-8 pb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="text-center">
                            <a href="index-new.html">
                                <img src="{{ asset('photo/white-logo.png') }}" alt=""
                                    class="mb-3" height="30">
                            </a>
                            <p class="mb-0 small">
                                © {{ date('Y') }} <span class="fw-semibold text-info">PT. Indoprima
                                    Gemilang</span><br>
                                Dirancang & Dikembangkan oleh
                                <a href="https://indoprimagemilang.com"
                                    class="text-decoration-none text-info fw-semibold">Information System</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{ asset('package/landing/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('package/landing/dist/libs/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('package/landing/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('package/landing/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('package/landing/dist/js/custom.js') }}"></script>
    <script>
        // change URL Js
        $(function() {
            let currentURL =
                window.location != window.parent.location ?
                document.referrer :
                document.location.href;
            if (currentURL == "https://themeforest.net/") {
                $("a.download-link").attr(
                    "href",
                    "#"
                );
            } else {
                $("a.download-link").attr(
                    "href",
                    "https://adminmart.com/product/modernize-react-mui-dashboard-template/"
                );
            }
        });
    </script>
</body>

</html>
