<!DOCTYPE html>
<html lang="en">

<head>
    <!-- --------------------------------------------------- -->
    <!-- Title -->
    <!-- --------------------------------------------------- -->
    <title>Recruitment</title>

    <!-- --------------------------------------------------- -->
    <!-- Required Meta Tag -->
    <!-- --------------------------------------------------- -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- --------------------------------------------------- -->
    <!-- Favicon -->
    <!-- --------------------------------------------------- -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('package/dist/images/logos/favicon.ico') }}" />

    <!-- --------------------------------------------------- -->
    <!-- Owl Carousel -->
    <!-- --------------------------------------------------- -->
    <link rel="stylesheet" href="{{ asset('package/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">

    <!-- --------------------------------------------------- -->
    <!-- Prism Js -->
    <!-- --------------------------------------------------- -->
    <link rel="stylesheet" href="{{ asset('package/dist/libs/prismjs/themes/prism-okaidia.min.css') }}">

    <!-- --------------------------------------------------- -->
    <!-- Core Css -->
    <!-- --------------------------------------------------- -->

    <link id="themeColors" rel="stylesheet" href="{{ asset('package/dist/css/style.min.css') }}" />
</head>

<body>
    <!-- --------------------------------------------------- -->
    <!-- Body Wrapper -->
    <!-- --------------------------------------------------- -->
    <div class="page-wrapper" id="main-wrapper" data-layout="horizontal" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Header Start -->

        @include('layouts.parts.headbar')
        @include('layouts.parts.sidebar')
        @include('sweetalert::alert')
        <!-- Sidebar End -->

        <!-- Main wrapper -->
        <div class="body-wrapper">
            <div class="container-fluid note-has-grid">
                <div class="card border-primary border-2 shadow-none position-relative overflow-hidden">
                    <div class="card-body px-4 py-3">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h4 class="fw-semibold mb-8 ">Job Vacancy</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a class="text-muted" href="#">Daftarkan segera diri anda</a>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-3">
                                <div class="text-center mb-n5">
                                    <img src="{{ asset('package/dist/images/backgrounds/track-bg.png') }}"
                                        alt="" class="img-fluid mb-n4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-9">
                        <ul class="nav nav-pills p-3 mb-3 rounded align-items-center  flex-row">
                            <li class="nav-item">
                                <a href="javascript:void(0)"
                                    class="
                              nav-link

                              note-link
                              d-flex
                              align-items-center
                              justify-content-center
                              active
                              px-3 px-md-3
                              me-0 me-md-2 text-body-color
                            "
                                    id="all-category">
                                    <i class="ti ti-list fill-white me-0 me-md-1"></i>
                                    <span class="d-none d-md-block font-weight-medium">All Vacancies</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)"
                                    class="
                              nav-link

                              note-link
                              d-flex
                              align-items-center
                              justify-content-center
                              px-3 px-md-3
                              me-0 me-md-2 text-body-color
                            "
                                    id="note-business">
                                    <i class="ti ti-briefcase fill-white me-0 me-md-1"></i>
                                    <span class="d-none d-md-block font-weight-medium">Staff</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)"
                                    class="
                              nav-link

                              note-link
                              d-flex
                              align-items-center
                              justify-content-center
                              px-3 px-md-3
                              me-0 me-md-2 text-body-color
                            "
                                    id="note-social">
                                    <i class="ti ti-share fill-white me-0 me-md-1"></i>
                                    <span class="d-none d-md-block font-weight-medium">Non Staff</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)"
                                    class="
                              nav-link

                              note-link
                              d-flex
                              align-items-center
                              justify-content-center
                              px-3 px-md-3
                              me-0 me-md-2 text-body-color
                            "
                                    id="note-important">
                                    <i class="ti ti-star fill-white me-0 me-md-1"></i>
                                    <span class="d-none d-md-block font-weight-medium">Internship</span>
                                </a>
                            </li>
                        </ul>
                    </div>


                    @if (Auth::check() && (Auth::user()->role == 'ADMIN' || Auth::user()->email == 'findryankurnia@gmail.com'))
                        <div class="col-sm-3 text-end">
                            <a href="{{ url('ptkforms/create') }}" class="btn btn-outline-primary w-100">
                                <b> Vacancy</b> <i class="ti ti-plus"></i>
                            </a>
                        </div>
                    @endif
                </div>
                <hr>
                <div class="tab-content">
                    <div id="note-full-container" class="note-has-grid row">
                        @foreach ($jobs as $job)
                            <div class="col-md-4 single-note-item all-category hover-img">
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
                                        <a href="javascript:void(0)" class="btn btn-outline-success border-2 btn-sm">
                                            <i class="ti ti-medal"></i>{{ $job->status_pegawai }}
                                        </a>


                                        <div class="ms-auto">
                                            <div class="category-selector btn-group">
                                                @if (Auth::check() && (Auth::user()->role == 'ADMIN' || Auth::user()->email == 'findryankurnia@gmail.com'))
                                                    <button data-id="{{ $job->id }}" type="button"
                                                        class="btn btn-outline-danger border-2 btn-sm btnDelete"
                                                        href="{{ url('vacancies', $job->id) }}">
                                                        <div class="category">
                                                            <span class="more-options">
                                                                Delete <i class="ti ti-trash"></i>
                                                            </span>
                                                        </div>
                                                    </button>
                                                    &nbsp;
                                                @endif
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
            </div>
        </div>
        <div class="dark-transparent sidebartoggler"></div>
    </div>

    <!--  Shopping Cart -->
    <div class="offcanvas offcanvas-end shopping-cart" tabindex="-1" id="offcanvasRight"
        aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header py-4">
            <h5 class="offcanvas-title fs-5 fw-semibold" id="offcanvasRightLabel">Shopping Cart</h5>
            <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
        </div>
        <div class="offcanvas-body h-100 px-4 pt-0" data-simplebar>
            <ul class="mb-0">
                <li class="pb-7">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('package/dist/images/products/product-1.jpg') }}" width="95"
                            height="75" class="rounded-1 me-9 flex-shrink-0" alt="" />
                        <div>
                            <h6 class="mb-1">Supreme toys cooker</h6>
                            <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                                <div class="input-group input-group-sm w-50">
                                    <button class="btn border-0 round-20 minus p-0 bg-light-success text-success "
                                        type="button" id="add1"> - </button>
                                    <input type="text"
                                        class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty"
                                        placeholder="" aria-label="Example text with button addon"
                                        aria-describedby="add1" value="1" />
                                    <button class="btn text-success bg-light-success  p-0 round-20 border-0 add"
                                        type="button" id="addo2"> + </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="pb-7">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('package/dist/images/products/product-2.jpg') }}" width="95"
                            height="75" class="rounded-1 me-9 flex-shrink-0" alt="" />
                        <div>
                            <h6 class="mb-1">Supreme toys cooker</h6>
                            <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                                <div class="input-group input-group-sm w-50">
                                    <button class="btn border-0 round-20 minus p-0 bg-light-success text-success "
                                        type="button" id="add2"> - </button>
                                    <input type="text"
                                        class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty"
                                        placeholder="" aria-label="Example text with button addon"
                                        aria-describedby="add2" value="1" />
                                    <button class="btn text-success bg-light-success  p-0 round-20 border-0 add"
                                        type="button" id="addon34"> + </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="pb-7">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('package/dist/images/products/product-3.jpg') }}" width="95"
                            height="75" class="rounded-1 me-9 flex-shrink-0" alt="" />
                        <div>
                            <h6 class="mb-1">Supreme toys cooker</h6>
                            <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                                <div class="input-group input-group-sm w-50">
                                    <button class="btn border-0 round-20 minus p-0 bg-light-success text-success "
                                        type="button" id="add3"> - </button>
                                    <input type="text"
                                        class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty"
                                        placeholder="" aria-label="Example text with button addon"
                                        aria-describedby="add3" value="1" />
                                    <button class="btn text-success bg-light-success  p-0 round-20 border-0 add"
                                        type="button" id="addon3"> + </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="align-bottom">
                <div class="d-flex align-items-center pb-7">
                    <span class="text-dark fs-3">Sub Total</span>
                    <div class="ms-auto">
                        <span class="text-dark fw-semibold fs-3">$2530</span>
                    </div>
                </div>
                <div class="d-flex align-items-center pb-7">
                    <span class="text-dark fs-3">Total</span>
                    <div class="ms-auto">
                        <span class="text-dark fw-semibold fs-3">$6830</span>
                    </div>
                </div>
                <a href="./eco-checkout.html" class="btn btn-outline-primary w-100">Go to shopping cart</a>
            </div>
        </div>
    </div>

    <!--  Mobilenavbar -->
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Vacancy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin menghapus data?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a id="linkDelete" href="#" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('package/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!-- ---------------------------------------------- -->
    <!-- core files -->
    <!-- ---------------------------------------------- -->
    <script src="{{ asset('package/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('package/dist/js/app.horizontal.init.js') }}"></script>
    <script src="{{ asset('package/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('package/dist/js/sidebarmenu.js') }}"></script>

    <script src="{{ asset('package/dist/js/custom.js') }}"></script>
    <script src="{{ asset('package/dist/libs/prismjs/prism.js') }}"></script>

    <!-- ---------------------------------------------- -->
    <!-- current page js files -->
    <!-- ---------------------------------------------- -->
    <script src="{{ asset('package/dist/js/apps/notes.js') }}"></script>

    <script>
        $(".btnDelete").on("click", function() {
            $('#modalDelete').modal('show')
            $('#linkDelete').attr('href', '{{url("off-vacancy")}}/'+$(this).data('id'))
        });
    </script>
</body>

</html>
