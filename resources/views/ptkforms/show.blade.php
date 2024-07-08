@extends('default')

@section('content')

    <div class="container-fluid">
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
                        @if (Auth::user()->role == 'Admin')
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="ti ti-pencil"></i> Approve PM/GM
                            </button>
                            &nbsp;
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="ti ti-pencil"></i> Approve Director
                            </button>
                            &nbsp;
                            @if ($ptkform->status == 0)
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="ti ti-pencil"></i> Approve
                                </button>
                            @else
                                <a class="btn btn-success" href="#">
                                    <i class="ti ti-pencil"></i> Disetujui
                                </a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body border-top p-4">
                <h3 class="fw-semibold mb-3">Jabatan</h3>
                <div class="row">
                    <div class="col-3">
                        <p class="text-dark mb-0"><strong>Divisi</strong></p>
                        <p class="mb-3">
                            {{ $ptkform->division->division_name }}
                        </p>
                    </div>

                    <div class="col-3">
                        <p class="text-dark mb-0"><strong>Departement</strong></p>
                        <p class="mb-3">
                            {{ $ptkform->department->department_name }}
                        </p>
                    </div>

                    <div class="col-3">
                        <p class="text-dark mb-0"><strong>Section</strong></p>
                        <p class="mb-3">
                            {{ $ptkform->section->section_name }}
                        </p>
                    </div>

                    <div class="col-3">
                        <p class="text-dark mb-0"><strong>Jobtitle</strong></p>
                        <p class="mb-3">
                            {{ $ptkform->jobtitle->jobtitle_name }}
                        </p>
                    </div>

                    <div class="col-3 mt-2">
                        <p class="text-dark mb-0"><strong>Dipekerjakan Tanggal</strong></p>
                        <p class="mb-3">
                            {{ $ptkform->date_startwork }}
                        </p>
                    </div>
                </div>

                <div class="border-top mt-7 pt-7">
                    <h3 class="fw-semibold">Uraian Tugas dan Pekerjaan</h3>
                    <div class="row">
                        <div class="col-6">
                            <p class="text-dark mb-0"><strong>Atasan Langsung</strong></p>
                            <p class="mb-3">
                                {{ $ptkform->direct_superior }}
                            </p>
                        </div>

                        <div class="col-6">
                            <p class="text-dark mb-0"><strong>Jumlah Bawahan Langsung</strong></p>
                            <p class="mb-3">
                                {{ $ptkform->direct_junior }}
                            </p>
                        </div>

                        <div class="col-8">
                            <p class="text-dark mb-0"><strong>Tanggung Jawab</strong></p>
                            <p class="mb-3">
                                <?php echo $ptkform->responsibility; ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="border-top mt-7 pt-7">
                    <h3 class="fw-semibold">Persyaratan</h3>
                    <div class="row">
                        <div class="col-4">
                            <p class="text-dark mb-0"><strong>Jenis Kelamin</strong></p>
                            <p class="mb-3">
                                @if ($ptkform->gender == 0)
                                    Laki-laki/Perempuan
                                @elseif($ptkform->gender == 1)
                                    Laki-laki
                                @else
                                    Perempuan
                                @endif
                            </p>
                        </div>

                        <div class="col-4">
                            <p class="text-dark mb-0"><strong>Pendidikan</strong></p>
                            <p class="mb-3">
                                {{ $ptkform->education->education_name }}
                            </p>
                        </div>

                        <div class="col-4">
                            <p class="text-dark mb-0"><strong>Jurusan</strong></p>
                            <p class="mb-3">
                                {{ $ptkform->major->major_name }}
                            </p>
                        </div>

                        <div class="col-4">
                            <p class="text-dark mb-0"><strong>Pengalaman</strong></p>
                            <?php echo $ptkform->responsibility; ?>
                        </div>

                        <div class="col-4">
                            <p class="text-dark mb-0"><strong>Persyaratan Khusus</strong></p>
                            <?php echo $ptkform->special_conditions; ?>
                        </div>
                    </div>
                </div>

                <div class="border-top mt-7 pt-7">
                    <h3 class="fw-semibold">Dasar Permintaan Tenaga Kerja</h3>
                    <div class="row">
                        <div class="row">
                            <div class="col-4">
                                <p class="text-dark mb-0"><strong>Dasar Permintaan</strong></p>
                                <p class="mb-3">
                                    {{ $ptkform->request_basis }}
                                </p>
                            </div>

                            <div class="col-4">
                                <p class="text-dark mb-0"><strong>Keperluan Permintaan</strong></p>
                                <p class="mb-3">
                                    {{ $ptkform->request_basis_for }}
                                </p>
                            </div>

                            <div class="col-4">
                                <p class="text-dark mb-0"><strong>Lain-lain</strong></p>
                                <?php echo $ptkform->general_others; ?>
                            </div>
                        </div>
                    </div>
                </div>

                @if (Auth::user()->role == 'Admin')
                    <div class="border-top mt-7 pt-7">
                        <div class="row">
                            <div class="col-12 mb-3">
                                Surabaya, {{ date('d M Y') }}
                            </div>
                            <div class="col-6">
                                Diketahui <br><br><br><br><br><br><br><br>


                                PM/GM
                                <p>{{ date('Y-m-d') }}</p>
                            </div>

                            <div class="col-6">
                                Disetujui <br><br><br><br><br><br><br><br>


                                Director
                                <p>{{ date('Y-m-d') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
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
                        <input type="hidden" name="date_end" value="31-12-2099" class="form-control" />
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
