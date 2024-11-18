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
    <link rel="shortcut icon" type="image/png" href="{{asset('package/dist/images/logos/favicon.ico')}}" />
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('package/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css')}}">
    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{asset('package/dist/css/style.min.css')}}" />
</head>

<body>
    <!-- Preloader -->
    @include('sweetalert::alert')
    <div class="preloader">
        <img src="{{asset('package/dist/images/logos/favicon.ico')}}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="horizontal" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100">
            <div class="position-relative z-index-5">
                <div class="row">
                    <div class="col-xl-7 col-xxl-8">
                        <a href="#" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                            <img src="{{asset('package/dist/images/logos/logo.png')}}" width="300" alt="">
                        </a>
                        <div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(100vh - 80px);">
                            <img src="{{asset('photo/login.png')}}" alt="" class="img-fluid" width="100%">
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-4">
                        <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                            <div class="col-sm-8 col-md-6 col-xl-9">
                                <h2 class="mb-3 fs-7 fw-bolder">Halo Talenta Luar Biasa, Yuk Mulai!</h2>
                                <p class=" mb-9">PT. Indoprima Gemilang</p>
                                <div class="position-relative text-center my-4">
                                    <p class="mb-0 fs-4 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">Isikan form di bawah ini</p>
                                    <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                                </div>
                                <form action="{{ route('authenticate') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="ktp" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="ktp" class="form-label">Kata Sandi</label>
                                        <input type="password" name="password" class="form-control" aria-describedby="emailHelp">
                                    </div>

                                    <button id="btnSubmit" type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Masuk</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-medium">Belum memiliki akun?
                                            <a class="text-primary" href="{{url("auth/register")}}"> Daftarkan disini!</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Import Js Files -->
    <script src="{{asset('package/dist/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('package/dist/libs/simplebar/dist/simplebar.min.js')}}"></script>
    <script src="{{asset('package/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- core files -->
    <script src="{{asset('package/dist/js/app.min.js')}}"></script>
    <script src="{{asset('package/dist/js/app.horizontal.init.js')}}"></script>
    <script src="{{asset('package/dist/js/app-style-switcher.js')}}"></script>
    <script src="{{asset('package/dist/js/sidebarmenu.js')}}"></script>

    <script src="{{asset('package/dist/js/custom.js')}}"></script>
</body>

</html>
