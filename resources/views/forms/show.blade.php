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
                            <p>Tempat, Tanggal Lahir : {{$datadiri->tempat_lahir}}, {{$datadiri->tanggal_lahir}}</p>
                            <p>Alamat : {{$datadiri->alamat}}</p>
                            <p>Telepon : {{$datadiri->no_hp}} </p>
                            <p>Golongan Darah : {{$datadiri->golongan_darah}}</p>
                            <p>NIK : {{$datadiri->ktp}}</p>
                            <p>Jabatan yang Dilamar : -</p>
                            <p>Kendaraan yang Dipakai : {{$datadiri->kendaraan}}</p>
                            <p>Riwayat Kesehatan : -</p>
                        </div>
                        <div class="col-6">
                            <p>Jenis Kelamin : {{$datadiri->gender == 1 ? 'Laki-laki' : 'Perempuan'}}</p>
                            <p>Status Rumah : {{$datadiri->status_rumah}}</p>
                            <p>No. Wa : {{$datadiri->no_wa}}</p>
                            <p>Agama : {{$datadiri->agama}}</p>
                            <p>Tinggi Badan : {{$datadiri->tinggi_badan}}</p>
                            <p>Berat Badan : {{$datadiri->berat_badan}}</p>
                            <p>SIM : {{$datadiri->sim}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card shadow-none border">
                    <div class="card-body row">
                        <h4>Pendidikan Formal</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>tingkat</th>
                                    <th>instansi</th>
                                    <th>jurusan</th>
                                    <th>lulus_tahun</th>
                                    <th>nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datapendidikanformals as $datapendidikanformal)
                                    <tr>
                                        <td>{{ $datapendidikanformal->tingkat }}</td>
                                        <td>{{ $datapendidikanformal->instansi }}</td>
                                        <td>{{ $datapendidikanformal->jurusan }}</td>
                                        <td>{{ $datapendidikanformal->lulus_tahun }}</td>
                                        <td>{{ $datapendidikanformal->nilai }}</td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card shadow-none border">
                    <div class="card-body row">
                        <h4>Pendidikan Informal</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>jenis</th>
                                    <th>tingkat</th>
                                    <th>instansi</th>
                                    <th>jurusan</th>
                                    <th>date_start</th>
                                    <th>date_end</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datapendidikannonformals as $datapendidikannonformal)

                                    <tr>
                                        <td>{{ $datapendidikannonformal->jenis }}</td>
                                        <td>{{ $datapendidikannonformal->tingkat }}</td>
                                        <td>{{ $datapendidikannonformal->instansi }}</td>
                                        <td>{{ $datapendidikannonformal->jurusan }}</td>
                                        <td>{{ $datapendidikannonformal->date_start }}</td>
                                        <td>{{ $datapendidikannonformal->date_end }}</td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card shadow-none border">
                    <div class="card-body row">
                        <h4>Keluarga</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Hubungan</th>
                                    <th>Nama</th>
                                    <th>Tempat,Tanggal Lahir</th>
                                    <th>Pekerjaan</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datakeluargas as $i => $datakeluarga)
                                    <tr>
                                        <td>{{ $datakeluarga->status_hubungan }}</td>
                                        <td>{{ $datakeluarga->nama_keluarga }}</td>
                                        <td>{{ $datakeluarga->tempat_lahir_keluarga }}, {{ $datakeluarga->tanggal_lahir_keluarga }}</td>
                                        <td>{{ $datakeluarga->pekerjaan }}</td>
                                        <td>{{ $datakeluarga->alamat }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card shadow-none border">
                    <div class="card-body row">
                        <h4>Pengalaman Kerja</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Instansi</th>
                                    <th>Jabatan Awal</th>
                                    <th>Jabatan Akhir</th>
                                    <th>Gaji Awal</th>
                                    <th>Gaji Akhir</th>
                                    <th>Mulai</th>
                                    <th>Akhir</th>
                                    <th>Alasan Keluar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datapengalamankerjas as $datapengalamankerja)
                                    <tr>
                                        <td>{{ $datapengalamankerja->perusahaan }}</td>
                                        <td>{{ $datapengalamankerja->jabatan_awal }}</td>
                                        <td>{{ $datapengalamankerja->jabatan_terakhir }}</td>
                                        <td>{{ $datapengalamankerja->gaji_awal }}</td>
                                        <td>{{ $datapengalamankerja->gaji_akhir }}</td>
                                        <td>{{ $datapengalamankerja->date_start }}</td>
                                        <td>{{ $datapengalamankerja->date_end }}</td>
                                        <td>{{ $datapengalamankerja->alasan_keluar }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card shadow-none border">
                    <div class="card-body row">
                        <h4>Kemampuan dan Hobi</h4>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kemampuan</th>
                                    <th>Level</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datakemampuans as $i => $datakemampuan)
                                    <tr>
                                        <td>{{ $datakemampuan->kemampuan }}</td>
                                        <td>{{ $datakemampuan->level }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Hobi</th>
                                    <th>Level</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataolahragas as $i => $dataolahraga)
                                    <tr>
                                        <td>{{ $dataolahraga->olahraga }}</td>
                                        <td>{{ $dataolahraga->level }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
