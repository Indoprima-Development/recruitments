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
                                <a class="btn btn-success fs-3 rounded btn-hover-shadow px-3 py-2"
                                    href="../package/html/main/authentication-login.html">Opening Jobs</a>
                            </li>
                            <li class="nav-item ms-2">
                                <a class="btn btn-primary fs-3 rounded btn-hover-shadow px-3 py-2"
                                    href="../package/html/main/authentication-login.html">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="body-wrapper overflow-hidden">
            <section class="hero-section position-relative overflow-hidden mb-0">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6">
                            <div class="hero-content my-11 my-xl-0">
                                <h6 class="d-flex align-items-center gap-2 fs-4 fw-semibold mb-3" data-aos="fade-up"
                                    data-aos-delay="200" data-aos-duration="1000"><i
                                        class="ti ti-rocket text-secondary fs-6"></i>Start your career</h6>
                                <h1 class="fw-bolder mb-8 fs-13" data-aos="fade-up" data-aos-delay="400"
                                    data-aos-duration="1000">Smart<span class="text-primary"> <br>Recruitment</span>
                                    System</h1>
                                <p class="fs-5 mb-3 text-dark fw-normal">
                                    Temukan Pekerjaan anda di <b class="text-danger">PT. Indoprima Gemilang</b>
                                </p>
                                <div class="d-sm-flex align-items-center gap-3">
                                    <a class="btn btn-primary px-5 btn-hover-shadow d-block mb-3 mb-sm-0"
                                        href="../package/html/main/authentication-login.html">Login</a>
                                    <a class="btn btn-outline-primary d-block scroll-link"
                                        href="#production-template">Register</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 d-none d-xl-block">
                            <div class="hero-img-slide position-relative bg-light-primary p-4 rounded">
                                <div class="d-flex flex-row">
                                    <div class="">
                                        <div class="banner-img-1 slideup">
                                            <img src="{{ asset('package/landing/dist/images/hero-img/bannerimg1.svg') }}"
                                                alt="" class="img-fluid">
                                        </div>
                                        <div class="banner-img-1 slideup">
                                            <img src="{{ asset('package/landing/dist/images/hero-img/bannerimg1.svg') }}"
                                                alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="banner-img-2 slideDown">
                                            <img src="{{ asset('package/landing/dist/images/hero-img/bannerimg2.svg') }}"
                                                alt="" class="img-fluid">
                                        </div>
                                        <div class="banner-img-2 slideDown">
                                            <img src="{{ asset('package/landing/dist/images/hero-img/bannerimg2.svg') }}"
                                                alt="" class="img-fluid">
                                        </div>
                                    </div>
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
                                data-aos-duration="1000">Opening Jobs</h2>
                        </div>
                    </div>
                    <div class="review-slider" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Jenny Wilson</h6>
                                                    <p class="mb-0 text-dark">Features avaibility</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul
                                                    class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <span class="badge bg-primary">Staff</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 mb-0 text-dark">The dashboard template from adminmart has helped
                                            me provide a clean
                                            and sleek look to my dashboard and made it look exactly the way I wanted it
                                            to, mainly without
                                            having.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('package/landing/dist/images/profile/user-2.jpg') }}"
                                                    alt="" class="w-auto me-3 rounded-circle" width="40"
                                                    height="40">
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Minshan Cui</h6>
                                                    <p class="mb-0 text-dark">Features avaibility</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul
                                                    class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 text-dark mb-0">The quality of design is excellent,
                                            customizability and flexibility
                                            much better than the other products available in the market. I strongly
                                            recommend the AdminMart to
                                            other buyers.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('package/landing/dist/images/profile/user-3.jpg') }}"
                                                    alt="" class="w-auto me-3 rounded-circle" width="40"
                                                    height="40">
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Eminson Mendoza</h6>
                                                    <p class="mb-0 fw-normal">Features avaibility</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul
                                                    class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 text-dark mb-0">This template is great, UI-rich and up-to-date.
                                            Although it is pretty
                                            much complete, I suggest to improve a bit of documentation. Thanks & Highly
                                            recomended!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('package/landing/dist/images/profile/user-1.jpg') }}"
                                                    alt="" class="w-auto me-3 rounded-circle" width="40"
                                                    height="40">
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Jenny Wilson</h6>
                                                    <p class="mb-0 text-dark">Features avaibility</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul
                                                    class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 mb-0 text-dark">The dashboard template from adminmart has helped
                                            me provide a clean
                                            and sleek look to my dashboard and made it look exactly the way I wanted it
                                            to, mainly without
                                            having.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('package/landing/dist/images/profile/user-2.jpg') }}"
                                                    alt="" class="w-auto me-3 rounded-circle" width="40"
                                                    height="40">
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Minshan Cui</h6>
                                                    <p class="mb-0 text-dark">Features avaibility</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul
                                                    class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 text-dark mb-0">The quality of design is excellent,
                                            customizability and flexibility
                                            much better than the other products available in the market. I strongly
                                            recommend the AdminMart to
                                            other buyers.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('package/landing/dist/images/profile/user-3.jpg') }}"
                                                    alt="" class="w-auto me-3 rounded-circle" width="40"
                                                    height="40">
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Eminson Mendoza</h6>
                                                    <p class="mb-0 fw-normal">Features avaibility</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul
                                                    class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 text-dark mb-0">This template is great, UI-rich and up-to-date.
                                            Although it is pretty
                                            much complete, I suggest to improve a bit of documentation. Thanks & Highly
                                            recomended!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('package/landing/dist/images/profile/user-1.jpg') }}"
                                                    alt="" class="w-auto me-3 rounded-circle" width="40"
                                                    height="40">
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Jenny Wilson</h6>
                                                    <p class="mb-0 text-dark">Features avaibility</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul
                                                    class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 mb-0 text-dark">The dashboard template from adminmart has helped
                                            me provide a clean
                                            and sleek look to my dashboard and made it look exactly the way I wanted it
                                            to, mainly without
                                            having.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('package/landing/dist/images/profile/user-2.jpg') }}"
                                                    alt="" class="w-auto me-3 rounded-circle" width="40"
                                                    height="40">
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Minshan Cui</h6>
                                                    <p class="mb-0 text-dark">Features avaibility</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul
                                                    class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 text-dark mb-0">The quality of design is excellent,
                                            customizability and flexibility
                                            much better than the other products available in the market. I strongly
                                            recommend the AdminMart to
                                            other buyers.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('package/landing/dist/images/profile/user-3.jpg') }}"
                                                    alt="" class="w-auto me-3 rounded-circle" width="40"
                                                    height="40">
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Eminson Mendoza</h6>
                                                    <p class="mb-0 fw-normal">Features avaibility</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul
                                                    class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 text-dark mb-0">This template is great, UI-rich and up-to-date.
                                            Although it is pretty
                                            much complete, I suggest to improve a bit of documentation. Thanks & Highly
                                            recomended!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('package/landing/dist/images/profile/user-1.jpg') }}"
                                                    alt="" class="w-auto me-3 rounded-circle" width="40"
                                                    height="40">
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Jenny Wilson</h6>
                                                    <p class="mb-0 text-dark">Features avaibility</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul
                                                    class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 mb-0 text-dark">The dashboard template from adminmart has helped
                                            me provide a clean
                                            and sleek look to my dashboard and made it look exactly the way I wanted it
                                            to, mainly without
                                            having.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('package/landing/dist/images/profile/user-2.jpg') }}"
                                                    alt="" class="w-auto me-3 rounded-circle" width="40"
                                                    height="40">
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Minshan Cui</h6>
                                                    <p class="mb-0 text-dark">Features avaibility</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul
                                                    class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 text-dark mb-0">The quality of design is excellent,
                                            customizability and flexibility
                                            much better than the other products available in the market. I strongly
                                            recommend the AdminMart to
                                            other buyers.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('package/landing/dist/images/profile/user-3.jpg') }}"
                                                    alt="" class="w-auto me-3 rounded-circle" width="40"
                                                    height="40">
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Eminson Mendoza</h6>
                                                    <p class="mb-0 fw-normal">Features avaibility</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul
                                                    class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 text-dark mb-0">This template is great, UI-rich and up-to-date.
                                            Although it is pretty
                                            much complete, I suggest to improve a bit of documentation. Thanks & Highly
                                            recomended!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('package/landing/dist/images/profile/user-1.jpg') }}"
                                                    alt="" class="w-auto me-3 rounded-circle" width="40"
                                                    height="40">
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Jenny Wilson</h6>
                                                    <p class="mb-0 text-dark">Features avaibility</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul
                                                    class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 mb-0 text-dark">The dashboard template from adminmart has helped
                                            me provide a clean
                                            and sleek look to my dashboard and made it look exactly the way I wanted it
                                            to, mainly without
                                            having.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('package/landing/dist/images/profile/user-2.jpg') }}"
                                                    alt="" class="w-auto me-3 rounded-circle" width="40"
                                                    height="40">
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Minshan Cui</h6>
                                                    <p class="mb-0 text-dark">Features avaibility</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul
                                                    class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 text-dark mb-0">The quality of design is excellent,
                                            customizability and flexibility
                                            much better than the other products available in the market. I strongly
                                            recommend the AdminMart to
                                            other buyers.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('package/landing/dist/images/profile/user-3.jpg') }}"
                                                    alt="" class="w-auto me-3 rounded-circle" width="40"
                                                    height="40">
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Eminson Mendoza</h6>
                                                    <p class="mb-0 fw-normal">Features avaibility</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul
                                                    class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 text-dark mb-0">This template is great, UI-rich and up-to-date.
                                            Although it is pretty
                                            much complete, I suggest to improve a bit of documentation. Thanks & Highly
                                            recomended!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('package/landing/dist/images/profile/user-1.jpg') }}"
                                                    alt="" class="w-auto me-3 rounded-circle" width="40"
                                                    height="40">
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Jenny Wilson</h6>
                                                    <p class="mb-0 text-dark">Features avaibility</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul
                                                    class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 mb-0 text-dark">The dashboard template from adminmart has helped
                                            me provide a clean
                                            and sleek look to my dashboard and made it look exactly the way I wanted it
                                            to, mainly without
                                            having.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('package/landing/dist/images/profile/user-2.jpg') }}"
                                                    alt="" class="w-auto me-3 rounded-circle" width="40"
                                                    height="40">
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Minshan Cui</h6>
                                                    <p class="mb-0 text-dark">Features avaibility</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul
                                                    class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 text-dark mb-0">The quality of design is excellent,
                                            customizability and flexibility
                                            much better than the other products available in the market. I strongly
                                            recommend the AdminMart to
                                            other buyers.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('package/landing/dist/images/profile/user-3.jpg') }}"
                                                    alt="" class="w-auto me-3 rounded-circle" width="40"
                                                    height="40">
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Eminson Mendoza</h6>
                                                    <p class="mb-0 fw-normal">Features avaibility</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul
                                                    class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{ asset('package/landing/dist/images/svgs/icon-star.svg') }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 text-dark mb-0">This template is great, UI-rich and up-to-date.
                                            Although it is pretty
                                            much complete, I suggest to improve a bit of documentation. Thanks & Highly
                                            recomended!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 text-center mt-5">
                        <a href="#" class="btn btn-sm btn-primary">Show All Jobs Opening</a>
                    </div>
                </div>
            </section>

            <section class="features-section py-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center" data-aos="fade-up" data-aos-delay="600"
                                data-aos-duration="1000">
                                <small class="text-primary fw-bold mb-2 d-block fs-3">ALMOST COVERED EVERYTHING</small>
                                <h2 class="fs-9 text-center mb-4 mb-lg-9 fw-bolder">
                                    Alur Recruitment
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800"
                            data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <i class="d-block ti ti-wand text-primary fs-10"></i>
                                <h5 class="fs-5 fw-semibold mt-8">Register</h5>
                                <p class="mb-0 text-dark">Daftarkan diri anda jika belum memiliki akun</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800"
                            data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <i class="d-block ti ti-layout-sidebar text-primary fs-10"></i>
                                <h5 class="fs-5 fw-semibold mt-8">Login</h5>
                                <p class="mb-0 text-dark">
                                    Masukan username dan password yang sudah dibuat untuk masuk dalam sistem
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800"
                            data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <i class="d-block ti ti-archive text-primary fs-10"></i>
                                <h5 class="fs-5 fw-semibold mt-8">Isi CV</h5>
                                <p class="mb-0 text-dark">
                                    Lengkapi data diri,pengalaman, dan data lain sebelum melakukan pendaftaran
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800"
                            data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <i class="d-block ti ti-adjustments text-primary fs-10"></i>
                                <h5 class="fs-5 fw-semibold mt-8">Lamar</h5>
                                <p class="mb-0 text-dark">
                                    Lamar pekerjaan yang sesuai dengan anda
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1000"
                            data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <i class="d-block ti ti-tag text-primary fs-10"></i>
                                <h5 class="fs-5 fw-semibold mt-8">Technical Test</h5>
                                <p class="mb-0 text-dark">Its been made with Bootstrap 5 and full responsive layout.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1000"
                            data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <i class="d-block ti ti-diamond text-primary fs-10"></i>
                                <h5 class="fs-5 fw-semibold mt-8">Psikologi Test</h5>
                                <p class="mb-0 text-dark">Lots of Icon Fonts are included here in the package of
                                    Elegant Admin.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1000"
                            data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <i class="d-block ti ti-device-desktop text-primary fs-10"></i>
                                <h5 class="fs-5 fw-semibold mt-8">Interview 1</h5>
                                <p class="mb-0 text-dark">All the layout of Modernize Admin is Fully Responsive and
                                    widely tested.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1000"
                            data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <i class="d-block ti ti-database text-primary fs-10"></i>
                                <h5 class="fs-5 fw-semibold mt-8">Interview 2</h5>
                                <p class="mb-0 text-dark">Our Css is written Sass Base to make your life easier.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1200"
                            data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <i class="d-block ti ti-arrows-shuffle text-primary fs-10"></i>
                                <h5 class="fs-5 fw-semibold mt-8">Medical Checkup</h5>
                                <p class="mb-0 text-dark">Customization will be easy as we understand your pain.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1200"
                            data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <i class="d-block ti ti-chart-pie text-primary fs-10"></i>
                                <h5 class="fs-5 fw-semibold mt-8">Offering</h5>
                                <p class="mb-0 text-dark">You name it and we have it, Yes lots of variations for
                                    Charts.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1200"
                            data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <i class="d-block ti ti-layers-intersect text-primary fs-10"></i>
                                <h5 class="fs-5 fw-semibold mt-8">Join with us</h5>
                                <p class="mb-0 text-dark">Data Tables are initial requirement and we added them.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="bg-primary pt-5 pt-xl-9 pb-8">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-7 col-xl-5 pt-lg-5 mb-5 mb-lg-0">
                            <h2 class="fs-12 text-white text-center text-lg-start fw-bolder mb-8">Daftarkan Diri Anda Segera !</h2>
                            <div
                                class="d-sm-flex align-items-center justify-content-center justify-content-lg-start gap-3">
                                <a href="../package/html/main/authentication-login.html"
                                    class="btn bg-white text-primary fw-semibold d-block mb-3 mb-sm-0 btn-hover-shadow">Login</a>
                                <a href="../package/html/main/authentication-register.html"
                                    class="btn border-white text-white fw-semibold btn-hover-white d-block">Register</a>
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
                                <img src="{{ asset('package/dist/images/logos/logo.png') }}"
                                    alt="" class="mb-3" height="30">
                            </a>
                            <p class="mb-0 text-dark">All rights reserved by PT. Indoprima Gemilang. Designed & Developed by <a
                                    class="text-dark text-hover-primary border-bottom border-primary"
                                    href="https://adminmart.com/">Information System</a></p>
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
