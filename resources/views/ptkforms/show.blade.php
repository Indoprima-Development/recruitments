@extends('default')

@section('content')

    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Form PTK</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted text-decoration-none" href="./index.html">
                                        Permintaan Tenaga Kerja
                                    </a></li>
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
        <div class="card rounded-2 overflow-hidden">
            <div class="position-relative">
                <a href="javascript:void(0)"><img src="{{ asset('package/dist/images/blog/blog-img5.jpg') }}"
                        class="card-img-top rounded-0 object-fit-cover" alt="..." height="200"></a>
                <span
                    class="badge bg-white text-dark fs-5 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">
                    {{ $ptkform->status == 0 ? 'Dibuat' : 'Disetujui' }}
                </span>

                <img src="{{ asset('package/dist/images/profile/user-5.jpg') }}" alt=""
                    class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40"
                    height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Esther Lindsey">
            </div>

            <div class="card-body p-4">
                <span class="badge bg-light-primary text-dark fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">
                    {{ $ptkform->division->division_name }}
                </span>
                <span class="badge bg-light-success text-dark fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">
                    {{ $ptkform->department->department_name }}
                </span>
                <span class="badge bg-light-warning text-dark fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">
                    {{ $ptkform->section->section_name }}
                </span>

                <h2 class="fs-9 fw-semibold my-4">
                    {{ $ptkform->jobtitle->jobtitle_name }}
                </h2>
                <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center gap-2">
                        <i class="ti ti-calendar text-dark fs-5"></i>
                        Mulai Bekerja :
                        {{ $ptkform->date_startwork }}
                    </div>

                    <div class="d-flex align-items-center fs-2 ms-auto">
                        @if ($ptkform->status == 0)
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="ti ti-pencil"></i> Approve
                            </button>
                        @else
                            <a class="btn btn-success" href="#">
                                <i class="ti ti-pencil"></i> Disetujui
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body border-top p-4">
                <h3 class="fw-semibold mb-3">Tugas dan Pekerjaan</h3>
                <p class="text-dark mb-0"><strong>Atasan Langsung</strong></p>
                <p class="mb-3">
                    {{ $ptkform->direct_superior }}
                </p>

                <p class="text-dark mb-0"><strong>Bawahan Langsung</strong></p>
                <p class="mb-3">
                    {{ $ptkform->direct_junior }}
                </p>

                <p class="text-dark mb-0"><strong>Tanggung Jawab</strong></p>
                <p class="mb-3">
                    {{ $ptkform->responsibility }}
                </p>

                <div class="border-top mt-7 pt-7">
                    <h3 class="fw-semibold">Pendidikan dan Pengalaman</h3>
                    <ul class="my-3 ps-4 text-dark">
                        <li class="d-flex align-items-center gap-2"><span class="p-1 bg-dark rounded-circle"></span> Gigure
                            out what it is or</li>
                        <li class="d-flex align-items-center gap-2"><span class="p-1 bg-dark rounded-circle"></span> The
                            links it currently</li>
                        <li class="d-flex align-items-center gap-2"><span class="p-1 bg-dark rounded-circle"></span> It
                            allows you to start your bid</li>
                        <li class="d-flex align-items-center gap-2"><span class="p-1 bg-dark rounded-circle"></span> Gigure
                            out what it is or</li>
                        <li class="d-flex align-items-center gap-2"><span class="p-1 bg-dark rounded-circle"></span> The
                            links it currently</li>
                        <li class="d-flex align-items-center gap-2"><span class="p-1 bg-dark rounded-circle"></span> It
                            allows you to start your bid</li>
                    </ul>
                </div>
                <div class="border-top mt-7 pt-7">
                    <h3 class="fw-semibold">Syarat Khusus</h3>
                    <ol class="my-3 text-dark">
                        <li>Gigure out what it is or</li>
                        <li>The links it currently</li>
                        <li>It allows you to start your bid</li>
                        <li>Gigure out what it is or</li>
                        <li>The links it currently</li>
                        <li>It allows you to start your bid</li>
                    </ol>
                </div>
                <div class="border-top mt-7 pt-7">
                    <h3 class="fw-semibold">Lain-lain</h3>
                    <div class="p-3">
                        <h6 class="mb-0 fs-4 fw-semibold"><i class="ti ti-quote fs-7"></i>Life is short, Smile while you
                            still have teeth!</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Persetujuan PTK</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ url('ptkforms/change-status', $ptkform->id) }}">
                    @csrf
                    <div class="modal-body">
                        <p>Dengan mengisi ini saya <b class="text-danger">{{ Auth::user()->name }}</b> menyetujui form ptk
                            berikut</p>
                        <label>Date Start Vacancy</label>
                        <input type="date" name="date_start" class="form-control mb-3" />

                        <label>Date End Vacancy</label>
                        <input type="date" name="date_end" class="form-control" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Setujui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
