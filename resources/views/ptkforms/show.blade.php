@extends('default')

@section('addCss')
    <style>
        .star-rating {
            direction: rtl;
            display: inline-flex;
        }

        .star-rating input[type="radio"] {
            display: none;
        }

        .star-rating label {
            font-size: 2rem;
            color: #ddd;
            cursor: pointer;
        }

        .star-rating input[type="radio"]:checked~label {
            color: #ffc107;
        }

        .star-rating label:hover,
        .star-rating label:hover~label {
            color: #ffc107;
        }
    </style>
@endsection

@section('content2')
    <div class="container-fluid">
        <div class="card rounded-2 overflow-hidden">
            <div class="position-relative">
                <a href="javascript:void(0)"><img src="{{ asset('package/dist/images/blog/blog-img5.jpg') }}"
                        class="card-img-top rounded-0 object-fit-cover" alt="..." height="200"></a>
                <span
                    class="badge bg-light-primary text-dark fs-5 rounded-1 lh-sm mb-9 me-9 py-1 px-2 position-absolute bottom-0 end-0">
                    <b>{{ $ptkform->status == 0 ? 'DIBUAT' : 'DISETUJUI' }}</b>
                </span>

                <img src="{{ asset('package/dist/images/profile/user-5.jpg') }}" alt=""
                    class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40"
                    height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Esther Lindsey">
            </div>

            <div class="card-body p-4">
                <span class="badge bg-light-primary text-dark fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">
                    <b>{{ $ptkform->division->division_name ?? '-' }}</b>
                </span>
                <span class="badge bg-light-success text-dark fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">
                    <b>{{ $ptkform->department->department_name ?? '-' }}</b>
                </span>
                <span class="badge bg-light-warning text-dark fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">
                    <b>{{ $ptkform->section->section_name ?? '-' }}</b>
                </span>

                <h2 class="fs-9 fw-semibold my-4">
                    <b>{{ $ptkform->jobtitle->jobtitle_name ?? '-' }}</b>
                </h2>
                <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center gap-2 btn btn-sm btn-primary">
                        <i class="ti ti-stretching text-white fs-5"></i>
                        Mulai Bekerja :
                        <b>{{ $ptkform->date_startwork }}</b>
                    </div>

                    @if (Auth::check())
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

                            @if (!$isApplied)
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <b>Lamar <i class="ti ti-arrow-big-right-lines"></i></b>
                                </button>
                            @else
                                <button type="button" class="btn btn-secondary" disabled>
                                    Dilamar
                                </button>
                            @endif

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                <b>Persetujuan</b>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                            $dts = json_decode($jobtitle->questions);
                                            ?>

                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Pertanyaan</th>
                                                        <th>Jawaban</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($dts->pertanyaan as $index => $d)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $dts->pertanyaan[$index] }}</td>
                                                            <td>
                                                                @if ($dts->type[$index] == 'Rating')
                                                                    <div>
                                                                        <div class="star-rating">
                                                                            <input type="radio" id="5-stars"
                                                                                name="rating" value="5">
                                                                            <label for="5-stars"
                                                                                class="bi bi-star-fill">★</label>

                                                                            <input type="radio" id="4-stars"
                                                                                name="rating" value="4">
                                                                            <label for="4-stars"
                                                                                class="bi bi-star-fill">★</label>

                                                                            <input type="radio" id="3-stars"
                                                                                name="rating" value="3">
                                                                            <label for="3-stars"
                                                                                class="bi bi-star-fill">★</label>

                                                                            <input type="radio" id="2-stars"
                                                                                name="rating" value="2">
                                                                            <label for="2-stars"
                                                                                class="bi bi-star-fill">★</label>

                                                                            <input type="radio" id="1-star"
                                                                                name="rating" value="1">
                                                                            <label for="1-star"
                                                                                class="bi bi-star-fill">★</label>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <select name="" class="form-select">
                                                                        <option value="Ya">Ya</option>
                                                                        <option value="Tidak">Tidak</option>
                                                                    </select>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            Saya <b>{{ Auth::user()->name }}</b> bersedia untuk mengikuti seluruh rangkaian
                                            seleksi sesuai dengan kebijakan perusahaan.
                                        </div>
                                        <div class="modal-footer">

                                            <form method="POST" action="{{ url('ptkformtransactions') }}">
                                                @csrf
                                                <input type="hidden" name="ptkform_id" value="{{ $ptkform->id }}">
                                                <button type="submit" class="btn btn-primary">Setuju</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card-body border-top border-muted p-4">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card border-1 border-primary">
                            <div class="card-body">
                                <h3 class="fw-semibold">Persyaratan</h3>
                                <div class="row">
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

                                    <p class="text-dark mb-0"><strong>Pendidikan</strong></p>
                                    <p class="mb-3">
                                        {{ $ptkform->education->education_name }}
                                    </p>

                                    <p class="text-dark mb-0"><strong>Jurusan</strong></p>
                                    <p class="mb-3">
                                        {{ $ptkform->major->major_name }}
                                    </p>

                                    <p class="text-dark mb-0"><strong>Pengalaman</strong></p>
                                    <?php echo $ptkform->responsibility; ?>

                                    <p class="text-dark mb-0"><strong>Persyaratan Khusus</strong></p>
                                    <?php echo $ptkform->special_conditions; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="card border-1 border-primary">
                            <div class="card-body">
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

                                    <hr>

                                    <div class="col-12">
                                        <h3 class="fw-semibold">Dasar Permintaan Tenaga Kerja</h3>
                                        <p class="text-dark mb-0"><strong>Dasar Permintaan</strong></p>
                                        <p class="mb-3">
                                            {{ $ptkform->request_basis }}
                                        </p>
                                        <p class="text-dark mb-0"><strong>Keperluan Permintaan</strong></p>
                                        <p class="mb-3">
                                            {{ $ptkform->request_basis_for }}
                                        </p>
                                        <p class="text-dark mb-0"><strong>Lain-lain</strong></p>
                                        <?php echo $ptkform->general_others; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if (Auth::check())
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
                @endif
            </div>
        </div>
    </div>

    <!-- Modal -->
    @if (Auth::check())
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Persetujuan PTK</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ url('ptkforms/change-status', $ptkform->id) }}">
                        @csrf
                        <div class="modal-body">
                            <p>Dengan mengisi ini saya <b class="text-danger">{{ Auth::user()->name }}</b> menyetujui form
                                ptk
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
    @endif
@stop

@section('addJs')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
