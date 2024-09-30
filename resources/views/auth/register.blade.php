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
</head>

<body>
    <!-- Preloader -->
    @include('sweetalert::alert')
    <div class="preloader">
        <img src="{{ asset('package/dist/images/logos/favicon.ico') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!-- Body Wrapper -->
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="page-wrapper" id="main-wrapper" data-layout="horizontal" data-navbarbg="skin6"
            data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
            <div class="position-relative overflow-hidden radial-gradient">
                <div class="position-relative">
                    <div class="row">
                        <div class="col-xl-6 col-xxl-6">
                            <a href="#" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                                <img src="{{ asset('package/dist/images/logos/logo.png') }}" width="300"
                                    alt="">
                            </a>
                            <div class="d-none d-xl-flex align-items-center justify-content-center"
                                style="height: calc(100vh - 80px);">
                                <img src="{{ asset('package/dist/images/backgrounds/login-security.svg') }}"
                                    alt="" class="img-fluid" width="500">
                            </div>
                        </div>
                        <div class="col-xl-6 col-xxl-6">
                            <div
                                class="row justify-content-center align-items-center p-4">
                                <div class="col-sm-12 col-md-12 col-xl-12">
                                    <h2 class="mb-3 fs-7 fw-bolder">Welcome to Recruitment</h2>
                                    <p class=" mb-9">PT. Indoprima Gemilang</p>
                                    <div class="position-relative text-center my-4">
                                        <p
                                            class="mb-0 fs-4 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">
                                            Please insert the form below</p>
                                        <span
                                            class="border-top position-absolute top-50 start-50 translate-middle"></span>
                                    </div>

                                    <div class="card border-1 border-primary">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="ktp" class="form-label">Email</label>
                                                    <div class="input-group border rounded-1 border-1 border-dark">
                                                        <span class="input-group-text bg-transparent px-6 border-0"
                                                            id="basic-addon1"><i class="ti ti-mail fs-6"></i></span>
                                                        <input name="email" type="email" class="form-control border-0 ps-2"
                                                            placeholder="example@gmail.com">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="ktp" class="form-label">Password</label>
                                                    <div class="input-group border rounded-1 border-1 border-dark">
                                                        <span class="input-group-text bg-transparent px-6 border-0"
                                                            id="basic-addon1">
                                                            <i class="ti ti-key fs-6"></i>
                                                        </span>
                                                        <input name="password" type="password"
                                                            class="form-control border-0 ps-2" placeholder="****">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 mt-2">
                                                    <label for="ktp" class="form-label">Nama Lengkap</label>

                                                    <div class="input-group border rounded-1 border-1 border-dark">
                                                        <span class="input-group-text bg-transparent px-6 border-0"
                                                            id="basic-addon1">
                                                            <i class="ti ti-user fs-6"></i>
                                                        </span>
                                                        <input name="name" type="text" class="form-control border-0 ps-2"
                                                            placeholder="John Deo">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 mt-2">
                                                    <label for="ktp" class="form-label">NIK</label>
                                                    <div class="input-group border rounded-1 border-1 border-dark">
                                                        <span class="input-group-text bg-transparent px-6 border-0"
                                                            id="basic-addon1">
                                                            <i class="ti ti-file fs-6"></i>
                                                        </span>
                                                        <input name="ktp" type="text"
                                                            class="form-control border-0 ps-2" placeholder="3577******">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 mt-2">
                                                    <label for="ktp" class="form-label">No. Whatsapp</label>
                                                    <div class="input-group border rounded-1 border-1 border-dark">
                                                        <span class="input-group-text bg-transparent px-6 border-0"
                                                            id="basic-addon1">
                                                            <i class="ti ti-phone fs-6"></i>
                                                        </span>
                                                        <input name="no_wa" type="text"
                                                            class="form-control border-0 ps-2" placeholder="081****">
                                                    </div>
                                                </div>

                                                <hr class="mt-3 border-1">

                                                <div class="col-sm-2">
                                                    <label for="ktp" class="form-label text-primary">Pendidikan</label>
                                                    <select name="pendidikan_terakhir"
                                                        class="form-select border-1 border-primary" required>
                                                        <option value="" selected disabled>Pilih</option>
                                                        <option value="D4">D4</option>
                                                        <option value="S1">S1</option>
                                                        <option value="S2">S2</option>
                                                    </select>
                                                </div>

                                                <div class="col-sm-5">
                                                    <label for="ktp" class="form-label text-primary">Asal Instansi</label>
                                                    <input type="text" name="asal_instansi"
                                                        class="form-control border-1 border-primary"
                                                        aria-describedby="emailHelp" required>
                                                </div>

                                                <div class="col-sm-5">
                                                    <label for="ktp" class="form-label text-primary">Jurusan</label>
                                                    <input type="ktp" name="jurusan"
                                                        class="form-control border-1 border-primary"
                                                        aria-describedby="emailHelp" required>
                                                </div>

                                                <hr class="mt-3 border-1">

                                                <div class="col-sm-6">
                                                    <label for="ktp" class="form-label text-success">Berat Badan (kg)</label>
                                                    <input type="number" name="berat_badan"
                                                        class="form-control border-1 border-success" required>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label for="ktp" class="form-label text-success">Tinggi Badan (cm)</label>
                                                    <input type="number" name="tinggi_badan"
                                                        class="form-control border-1 border-success" required>
                                                </div>

                                                <div class="col-sm-12 mt-3 text-end">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal">
                                                        Daftar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-2" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                Data yang dikirimkan adalah benar.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button id="btnSubmit" type="submit"
                                    class="btn btn-primary rounded-2">Daftar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

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
