@extends('default')

@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">User Profile</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted " href="./index.html">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">User Profile</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{ asset('package/dist/images/breadcrumb/ChatBc.png') }}" alt=""
                                class="img-fluid mb-n4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card overflow-hidden">
            <div class="card-body p-0">
                <img src="{{ asset('package/dist/images/backgrounds/profilebg.jpg') }}" alt="" class="img-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-4 order-lg-1 order-2">
                        <div class="d-flex align-items-center justify-content-around m-4">
                            <div class="text-center">
                                <i class="ti ti-file-description fs-6 d-block mb-2"></i>
                                <h4 class="mb-0 fw-semibold lh-1">90</h4>
                                <p class="mb-0 fs-4">Technical</p>
                            </div>
                            <div class="text-center">
                                <i class="ti ti-user-circle fs-6 d-block mb-2"></i>
                                <h4 class="mb-0 fw-semibold lh-1">90</h4>
                                <p class="mb-0 fs-4">Psikotest</p>
                            </div>
                            <div class="text-center">
                                <i class="ti ti-user-check fs-6 d-block mb-2"></i>
                                <h4 class="mb-0 fw-semibold lh-1">OK</h4>
                                <p class="mb-0 fs-4">Interview 1</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-n3 order-lg-2 order-1">
                        <div class="mt-n5">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <div class="linear-gradient d-flex align-items-center justify-content-center rounded-circle"
                                    style="width: 110px; height: 110px;";>
                                    <div class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden"
                                        style="width: 100px; height: 100px;";>
                                        <img src="{{ asset($users->photo) }}" alt="" class="w-100 h-100">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h5 class="fs-5 mb-0 fw-semibold">{{ $users->name }}</h5>
                                <p class="mb-0 fs-4">{{ $users->ktp }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 order-last">
                        <ul
                            class="list-unstyled d-flex align-items-center justify-content-center justify-content-lg-start my-3 gap-3">
                            <li class="position-relative">
                                <a class="text-white d-flex align-items-center justify-content-center bg-primary p-2 fs-4 rounded-circle"
                                    href="javascript:void(0)" width="30" height="30">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-white bg-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle "
                                    href="javascript:void(0)">
                                    <i class="ti ti-brand-twitter"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-white bg-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle "
                                    href="javascript:void(0)">
                                    <i class="ti ti-brand-dribbble"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-white bg-danger d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle "
                                    href="javascript:void(0)">
                                    <i class="ti ti-brand-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <button class="btn btn-primary">Update Status</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <ul class="nav nav-pills user-profile-tab justify-content-end mt-2 bg-light-info rounded-2" id="pills-tab"
                    role="tablist">
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                            id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button"
                            role="tab" aria-controls="pills-profile" aria-selected="true">
                            <i class="ti ti-user-circle me-2 fs-6"></i>
                            <span class="d-none d-md-block">Profile</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                            id="pills-followers-tab" data-bs-toggle="pill" data-bs-target="#pills-followers" type="button"
                            role="tab" aria-controls="pills-followers" aria-selected="false">
                            <i class="ti ti-heart me-2 fs-6"></i>
                            <span class="d-none d-md-block">Keluarga</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                            id="pills-friends-tab" data-bs-toggle="pill" data-bs-target="#pills-friends" type="button"
                            role="tab" aria-controls="pills-friends" aria-selected="false">
                            <i class="ti ti-user-circle me-2 fs-6"></i>
                            <span class="d-none d-md-block">Pengalaman</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                            id="pills-gallery-tab" data-bs-toggle="pill" data-bs-target="#pills-gallery" type="button"
                            role="tab" aria-controls="pills-gallery" aria-selected="false">
                            <i class="ti ti-photo-plus me-2 fs-6"></i>
                            <span class="d-none d-md-block">Gallery</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                aria-labelledby="pills-profile-tab" tabindex="0">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card shadow-none border bg-light-info">
                            <div class="card-body">
                                <h4 class="fw-semibold mb-3">Data diri</h4>
                                <p>{{ $datadiri->alamat }}</p>
                                <ul class="list-unstyled mb-0">
                                    <li class="d-flex align-items-center gap-3 mb-4">
                                        <i class="ti ti-user text-dark fs-6"></i>
                                        <h6 class="fs-4 fw-semibold mb-0">
                                            Laki-laki
                                        </h6>
                                    </li>
                                    <li class="d-flex align-items-center gap-3 mb-4">
                                        <i class="ti ti-pray text-dark fs-6"></i>
                                        <h6 class="fs-4 fw-semibold mb-0">{{ $datadiri->agama }}</h6>
                                    </li>
                                    <li class="d-flex align-items-center gap-3 mb-4">
                                        <i class="ti ti-home text-dark fs-6"></i>
                                        <h6 class="fs-4 fw-semibold mb-0">{{ $datadiri->status_rumah }}</h6>
                                    </li>
                                    <li class="d-flex align-items-center gap-3 mb-2">
                                        <i class="ti ti-a-b-2 text-dark fs-6"></i>
                                        <h6 class="fs-4 fw-semibold mb-0">{{ $datadiri->tempat_lahir }},
                                            {{ $datadiri->tanggal_lahir }}</h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card shadow-none border">
                            <div class="card-body">
                                <h4 class="fw-semibold mb-3">Files</h4>
                                <div class="row">
                                    <div class="col-4">
                                        <img src="{{ asset('package/dist/images/profile/user-1.jpg') }}" alt=""
                                            class="rounded-2 img-fluid mb-9">
                                    </div>
                                    <div class="col-4">
                                        <img src="{{ asset('package/dist/images/profile/user-2.jpg') }}" alt=""
                                            class="rounded-2 img-fluid mb-9">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card shadow-none border">
                            <div class="card-body row">
                                <h4 class="">Data Pendidikan</h4>
                                @foreach ($datapendidikanformals as $datapendidikanformal)
                                <div class="col-sm-6 col-lg-6">
                                    <div class="card hover-img bg-light-primary">
                                        <div class="card-body p-4 text-center border-bottom">
                                            <h5 class="fw-semibold mb-0">{{ $datapendidikanformal->instansi }}</h5>
                                            <span class="text-dark fs-2">{{ $datapendidikanformal->tingkat }}</span>
                                        </div>
                                        <ul
                                            class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                                            <li class="position-relative">
                                                <i class="ti ti-school"></i>
                                                {{ $datapendidikanformal->lulus_tahun }}
                                            </li>
                                            &nbsp; &nbsp; &nbsp; &nbsp;
                                            <li class="position-relative">
                                                <i class="ti ti-file"></i>
                                                {{ $datapendidikanformal->nilai }}
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-followers" role="tabpanel" aria-labelledby="pills-followers-tab"
                tabindex="0">
                <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
                    <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">Keluarga <span
                            class="badge text-bg-secondary fs-2 rounded-4 py-1 px-2 ms-2">20</span></h3>
                    <form class="position-relative">
                        <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh"
                            placeholder="Search Followers">
                        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y text-dark ms-3"></i>
                    </form>
                </div>
                <div class="row">
                    @foreach ($datakeluargas as $i => $datakeluarga)
                        <div class="col-md-6 col-xl-4">
                            <div class="card bg-light-info">
                                <div class="card-body p-4 d-flex align-items-center gap-3">
                                    <img src="{{ asset('package/dist/images/profile/user-1.jpg') }}" alt=""
                                        class="rounded-circle" width="40" height="40">
                                    <div>
                                        <h5 class="fw-semibold mb-0">{{ $datakeluarga->nama_keluarga }}</h5>
                                        <span class="fs-2 d-flex align-items-center"><i
                                                class="ti ti-map-pin text-dark fs-3 me-1"></i>{{ $datakeluarga->status_hubungan }}</span>
                                    </div>
                                    <button class="btn btn-outline-primary py-1 px-2 ms-auto">
                                        {{ $datakeluarga->pekerjaan }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="tab-pane fade" id="pills-friends" role="tabpanel" aria-labelledby="pills-friends-tab"
                tabindex="0">
                <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
                    <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">Pengalaman <span
                            class="badge text-bg-secondary fs-2 rounded-4 py-1 px-2 ms-2">20</span></h3>
                    <form class="position-relative">
                        <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh"
                            placeholder="Search Friends">
                        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y text-dark ms-3"></i>
                    </form>
                </div>

                <div class="row">
                    @foreach ($datapengalamankerjas as $datapengalamankerja)
                        <div class="col-sm-6 col-lg-4">
                            <div class="card hover-img bg-light-primary">
                                <div class="card-body p-4 text-center border-bottom">
                                    <h5 class="fw-semibold mb-0">{{ $datapengalamankerja->perusahaan }}</h5>
                                    <span class="text-dark fs-2">{{ $datapengalamankerja->jabatan_terakhir }}</span>
                                </div>
                                <ul
                                    class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                                    <li class="position-relative">
                                        <i class="ti ti-calendar"></i>
                                        {{ $datapengalamankerja->date_start }}
                                        <b class="text-danger">s/d</b>
                                        {{ $datapengalamankerja->date_end }}
                                    </li>

                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="pills-gallery" role="tabpanel" aria-labelledby="pills-gallery-tab"
                tabindex="0">
                <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
                    <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">Gallery <span
                            class="badge text-bg-secondary fs-2 rounded-4 py-1 px-2 ms-2">12</span></h3>
                    <form class="position-relative">
                        <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh"
                            placeholder="Search Friends">
                        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y text-dark ms-3"></i>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="{{ asset('package/dist/images/products/s1.jpg') }}" alt=""
                                    class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Isuava wakceajo fe.jpg')}}</h6>
                                        <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1"
                                            href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Isuava wakceajo
                                                    fe.jpg')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="{{ asset('package/dist/images/products/s2.jpg') }}" alt=""
                                    class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Ip docmowe vemremrif.jpg')}}</h6>
                                        <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1"
                                            href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Ip docmowe
                                                    vemremrif.jpg')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="{{ asset('package/dist/images/products/s3.jpg') }}" alt=""
                                    class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Duan cosudos utaku.jpg')}}</h6>
                                        <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1"
                                            href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Duan cosudos
                                                    utaku.jpg')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="{{ asset('package/dist/images/products/s4.jpg') }}" alt=""
                                    class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Fu netbuv oggu.jpg')}}</h6>
                                        <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1"
                                            href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Fu netbuv
                                                    oggu.jpg')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="{{ asset('package/dist/images/products/s5.jpg') }}" alt=""
                                    class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Di sekog do.jpg')}}</h6>
                                        <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1"
                                            href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Di sekog do.jpg')}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="{{ asset('package/dist/images/products/s6.jpg') }}" alt=""
                                    class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Lo jogu camhiisi.jpg')}}</h6>
                                        <span class="text-dark fs-2">Thu, Dec 15, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1"
                                            href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Lo jogu
                                                    camhiisi.jpg')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="{{ asset('package/dist/images/products/s7.jpg') }}" alt=""
                                    class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Orewac huosazud robuf.jpg')}}</h6>
                                        <span class="text-dark fs-2">Fri, Dec 16, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1"
                                            href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Orewac huosazud
                                                    robuf.jpg')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="{{ asset('package/dist/images/products/s8.jpg') }}" alt=""
                                    class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Nira biolaizo tuzi.jpg')}}</h6>
                                        <span class="text-dark fs-2">Sat, Dec 17, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1"
                                            href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Nira biolaizo
                                                    tuzi.jpg')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="{{ asset('package/dist/images/products/s9.jpg') }}" alt=""
                                    class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Peri metu ejvu.jpg')}}</h6>
                                        <span class="text-dark fs-2">Sun, Dec 18, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1"
                                            href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Peri metu
                                                    ejvu.jpg')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="{{ asset('package/dist/images/products/s10.jpg') }}" alt=""
                                    class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Vurnohot tajraje isusufuj.jpg')}}</h6>
                                        <span class="text-dark fs-2">Mon, Dec 19, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1"
                                            href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Vurnohot tajraje
                                                    isusufuj.jpg')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="{{ asset('package/dist/images/products/s11.jpg') }}" alt=""
                                    class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Juc oz ma.jpg')}}</h6>
                                        <span class="text-dark fs-2">Tue, Dec 20, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1"
                                            href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Juc oz ma.jpg')}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="{{ asset('package/dist/images/products/s12.jpg') }}" alt=""
                                    class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Povipvez marjelliz zuuva.jpg')}}</h6>
                                        <span class="text-dark fs-2">Wed, Dec 21, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1"
                                            href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Povipvez marjelliz
                                                    zuuva.jpg')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
