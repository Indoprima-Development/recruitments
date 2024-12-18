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
</head>

<body>
    <div class="page-wrapper p-0 overflow-hidden">
        <header class="header">
            <nav class="navbar navbar-expand-lg py-0">
                <div class="container">
                    <a class="navbar-brand me-0 py-0" href="index.html">
                        <img src="{{ asset('package/dist/images/logos/logo.png') }}" height="60" alt="img-fluid">
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
                        <ul class="navbar-nav align-items-center mb-2 mb-lg-0 ms-auto">
                            <li class="nav-item ms-2">
                                <a class="btn btn-outline-primary fs-3 rounded btn-hover-shadow px-3 py-2"
                                    href="{{ url('vacancies') }}">Lowongan</a>
                            </li>
                            @if (!Auth::check())
                                <li class="nav-item ms-2">
                                    <a class="btn btn-primary fs-3 rounded btn-hover-shadow px-3 py-2"
                                        href="{{ url('auth/login') }}">Masuk</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="body-wrapper overflow-hidden">
            <section class="hero-section overflow-hidden mb-0">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-sm-6 h-100">
                            <div class="hero-content my-11 my-xl-0">
                                <h6 class="d-flex align-items-center gap-2 fs-4 fw-semibold mb-3" data-aos="fade-up"
                                    data-aos-delay="200" data-aos-duration="1000"><i
                                        class="ti ti-rocket text-secondary fs-6"></i></h6>
                                <h1 class="fw-bolder mb-8 fs-13" data-aos="fade-up" data-aos-delay="400"
                                    data-aos-duration="1000">Indoprima Gemilang<span class="text-primary"> <br>Recruitment</span>
                                    <br>
                                    System</h1>
                                <p class="fs-5 mb-3 text-dark fw-normal">
                                    Empowering growth, fostering potential. <b class="text-primary">Your bright future starts here!</b>
                                </p>
                                <div class="d-sm-flex align-items-center gap-3">
                                    @if (!Auth::check())
                                        <a class="btn btn-primary px-5 btn-hover-shadow d-block mb-3 mb-sm-0"
                                            href="{{ url('auth/login') }}">Masuk</a>
                                        <a class="btn btn-outline-primary d-block scroll-link"
                                            href="{{ url('auth/register') }}">Daftar</a>
                                    @else
                                        <a class="btn btn-primary px-5 btn-hover-shadow d-block mb-3 mb-sm-0"
                                            href="{{ url('vacancies') }}">Masuk</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-6" style="height: 90vh; width:100wh;">
                            <div class="hero-img-slide">
                                <div class="banner-img-1 slideup">
                                    <img src="{{ asset('photo/landing.png') }}" alt="" style="width:30%"
                                        class="rounded">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-light review-section pt-5 pt-lg-10 pt-xl-12 pb-8 pb-lg-9">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <h2 class="fs-9 text-center mb-lg-5 fw-bolder" data-aos="fade-up" data-aos-delay="200"
                                data-aos-duration="1000">Lowongan Terbaru</h2>
                        </div>
                    </div>
                    <div class="review-slider" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                        <div class="owl-carousel owl-theme">
                            @foreach ($jobs as $job)
                                <div class="item">
                                    <div class="card card-body border-1 border-primary">
                                        <span class="side-stick"></span>
                                        <h6 class="note-title text-truncate w-75 mb-0"
                                            data-noteHeading="Book a Ticket for Movie">
                                            {{ $job->jobtitle->jobtitle_name ?? '-' }}</h6>
                                        <p class="note-date fs-2">{{ $job->division->division_name ?? '-' }}</p>
                                        <div class="note-content">
                                            <p>
                                                <i class="ti ti-school btn btn-sm btn-outline-dark"></i>
                                                {{ $job->education->education_name }}
                                                &nbsp;&nbsp;&nbsp;
                                                <i class="ti ti-gender-bigender btn btn-sm btn-outline-dark"></i>
                                                @if ($job->gender == 1)
                                                    Laki-laki
                                                @elseif ($job->gender == 2)
                                                    Perempuan
                                                @else
                                                    Laki-laki/Perempuan
                                                @endif
                                            </p>
                                            <p>Mulai Bekerja : {{ $job->date_startwork }}</p>
                                        </div>
                                        <hr>
                                        <div class="d-flex align-items-center mt-2">
                                            <a href="javascript:void(0)"
                                                class="btn btn-outline-success border-2 btn-sm">
                                                <i class="ti ti-medal"></i>{{ $job->status_pegawai }}
                                            </a>


                                            <div class="ms-auto">
                                                <div class="category-selector btn-group">

                                                    <a class="btn btn-outline-primary border-2 btn-sm"
                                                        href="{{ url('vacancies', $job->id) }}">
                                                        <div class="category">
                                                            <span class="more-options">
                                                                Lamar <i class="ti ti-arrow-big-right-line"></i>
                                                            </span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="w-100 text-center mt-5">
                        <a href="{{ url('vacancies') }}" class="btn btn-sm btn-primary">Buka Semua Lowongan</a>
                    </div>
                </div>
            </section>

            <section class="features-section py-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center" data-aos="fade-up" data-aos-delay="600"
                                data-aos-duration="1000">
                                <h2 class="fs-9 text-center mb-4 mb-lg-9 fw-bolder">
                                    Alur Rekrutmen
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800"
                            data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <i class="d-block ti ti-square-number-1 text-primary fs-10"></i>
                                <h5 class="fs-5 fw-semibold mt-8">Buat Akun</h5>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800"
                            data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <i class="d-block ti ti-square-number-2 text-primary fs-10"></i>
                                <h5 class="fs-5 fw-semibold mt-8">Verifikasi</h5>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800"
                            data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <i class="d-block ti ti-square-number-3 text-primary fs-10"></i>
                                <h5 class="fs-5 fw-semibold mt-8">Masuk</h5>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800"
                            data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <i class="d-block ti ti-square-number-2 text-primary fs-10"></i>
                                <h5 class="fs-5 fw-semibold mt-8">Lamar Lowongan</h5>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800"
                            data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <i class="d-block ti ti-square-number-5 text-primary fs-10"></i>
                                <h5 class="fs-5 fw-semibold mt-8">Tes Teknis</h5>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800"
                            data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <i class="d-block ti ti-square-number-6 text-primary fs-10"></i>
                                <h5 class="fs-5 fw-semibold mt-8">Wawancara Human Capital</h5>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800"
                            data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <i class="d-block ti ti-square-number-7 text-primary fs-10"></i>
                                <h5 class="fs-5 fw-semibold mt-8">Psikotes</h5>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1000"
                            data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <i class="d-block ti ti-square-number-8 text-primary fs-10"></i>
                                <h5 class="fs-5 fw-semibold mt-8">Wawancara Akhir</h5>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1200"
                            data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <i class="d-block ti ti-square-number-9 text-primary fs-10"></i>
                                <h5 class="fs-5 fw-semibold mt-8">Pemeriksaan Kesehatan</h5>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1200"
                            data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <i class="d-block ti ti-heart-handshake text-primary fs-10"></i>
                                <h5 class="fs-5 fw-semibold mt-8">Finalisasi</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="bg-primary pt-5 pt-xl-9 pb-8">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-7 col-xl-5 pt-lg-5 mb-5 mb-lg-0">
                            <h2 class="fs-12 text-white text-center text-lg-start fw-bolder mb-8">Daftarkan Diri Anda
                                Segera !</h2>
                            <div
                                class="d-sm-flex align-items-center justify-content-center justify-content-lg-start gap-3">
                                <a href="{{ url('auth/login') }}"
                                    class="btn bg-white text-primary fw-semibold d-block mb-3 mb-sm-0 btn-hover-shadow">Masuk</a>
                                <a href="{{ url('auth/register') }}"
                                    class="btn border-white text-white fw-semibold btn-hover-white d-block">Daftar</a>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-5">
                            <div class="text-center text-lg-end">
                                <img src="{{ asset('package/landing/dist/images/backgrounds/business-woman-checking-her-mail.jpg') }}"
                                    alt="" class="img-fluid">
                            </div>
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
                                <img src="{{ asset('package/dist/images/logos/logo.png') }}" alt=""
                                    class="mb-3" height="30">
                            </a>
                            <p class="mb-0 text-dark">Hak cipta dilindungi oleh PT. Indoprima Gemilang. Dirancang & Dikembangkan oleh <a class="text-dark text-hover-primary border-bottom border-primary"
                                    href="https://indoprimagemilang.com">Information System</a></p>
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
