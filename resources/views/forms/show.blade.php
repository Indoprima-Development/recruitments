@extends('default')

@section('content')
    <div class="container-fluid">
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
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-none border">
                    <div class="card-body row">
                        <h4>Data Diri</h4>
                        <div class="col-6">
                            <p>Tempat, Tanggal Lahir :</p>
                            <p>Alamat :</p>
                            <p>Telepon : </p>
                            <p>Golongan Darah :</p>
                            <p>NIK :</p>
                            <p>Jabatan yang Dilamar : </p>
                            <p>Kendaraan yang Dipakai :</p>
                            <p>Riwayat Kesehatan</p>
                        </div>
                        <div class="col-6">
                            <p>Jenis Kelamin</p>
                            <p>Status Rumah</p>
                            <p>No. Wa</p>
                            <p>Agama :</p>
                            <p>Tinggi Badan</p>
                            <p>Berat Badan</p>
                            <p>SIM : </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card shadow-none border">
                    <div class="card-body row">
                        <h4>Pendidikan Formal</h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card shadow-none border">
                    <div class="card-body row">
                        <h4>Pendidikan Informal</h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card shadow-none border">
                    <div class="card-body row">
                        <h4>Keluarga</h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card shadow-none border">
                    <div class="card-body row">
                        <h4>Pengalaman Kerja</h4>
                    </div>
                </div>

                <div class="card shadow-none border">
                    <div class="card-body row">
                        <h4>Kemampuan dan Hobi</h4>
                    </div>
                </div>

                <div class="card shadow-none border">
                    <div class="card-body row">
                        <h4>Bidang yang diminati</h4>
                    </div>
                </div>

                <div class="card shadow-none border">
                    <div class="card-body row">
                        <h4>Gaji Dll</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
