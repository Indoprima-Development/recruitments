@extends('default')

@section('content2')
    <div class="container-fluid">
        <div class="card overflow-hidden border-1 border-primary">
            <div class="card-body p-0">
                <img src="{{ asset('photo/header.png') }}" alt="" class="img-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-4 order-lg-1 order-2">
                        <div class="d-flex align-items-center justify-content-around m-4">
                            <div class="text-center text-primary">
                                <i class="ti ti-circle-check fs-6 d-block mb-2"></i>
                                <h4 class="mb-0 fw-semibold lh-1">90</h4>
                                <p class="mb-0 fs-4"><b>Score</b></p>
                            </div>
                            <div class="text-center text-primary">
                                <i class="ti ti-circle-check fs-6 d-block mb-2"></i>
                                <h4 class="mb-0 fw-semibold lh-1">90</h4>
                                <p class="mb-0 fs-4"><b>CV</b></p>
                            </div>
                            <div class="text-center">
                                <i class="ti ti-circle-check fs-6 d-block mb-2"></i>
                                <h4 class="mb-0 fw-semibold lh-1">OK</h4>
                                <p class="mb-0 fs-4">HC</p>
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
                                        @if ($users->photo != null)
                                            <img src="{{ asset($users->photo) }}" alt="" class="w-100 h-100">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h5 class="fs-5 mb-0 fw-semibold">{{ $users->name }}</h5>
                                <p class="mb-0 fs-4">
                                    <a target="_blank" href="wa.me/{{ $users->no_wa }}">
                                        {{ $users->no_wa }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 order-last">
                        <div class="d-flex align-items-center justify-content-around m-4">
                            <div class="text-center">
                                <i class="ti ti-circle-check fs-6 d-block mb-2"></i>
                                <h4 class="mb-0 fw-semibold lh-1">OK</h4>
                                <p class="mb-0 fs-4">Psikotes</p>
                            </div>
                            <div class="text-center">
                                <i class="ti ti-circle-check fs-6 d-block mb-2"></i>
                                <h4 class="mb-0 fw-semibold lh-1">90</h4>
                                <p class="mb-0 fs-4">User</p>
                            </div>
                            <div class="text-center">
                                <i class="ti ti-circle-check fs-6 d-block mb-2"></i>
                                <h4 class="mb-0 fw-semibold lh-1">90</h4>
                                <p class="mb-0 fs-4">Director</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow-none border-1 border-primary">
                    <div class="card-body row text-center">
                        <h5>Riwayat Lamaran</h5>
                        <hr>
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>Jobtitle</th>
                                    <th>Score</th>
                                    <th>CV</th>
                                    <th>HC</th>
                                    <th>Psikotes</th>
                                    <th>User</th>
                                    <th>Director</th>
                                    <th>Finalisasi</th>
                                    <th>MCU</th>
                                    <th>Join</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6">
                <div class="card shadow-none border-1 border-primary">
                    <div class="card-body row">
                        <h5>Data Diri</h5>
                        <hr>
                        <table class="table table-sm">
                            <tr>
                                <td>Tempat, Tanggal Lahir</td>
                                <td>{{ $datadiri->tempat_lahir ?? '-' }},
                                    {{ $datadiri->tanggal_lahir ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>{{ $datadiri->alamat ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td>{{ $datadiri->no_hp ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Golongan Darah</td>
                                <td>{{ $datadiri->golongan_darah ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>{{ $datadiri->ktp ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Kendaraan yang Dipakai</td>
                                <td>{{ $datadiri->kendaraan ?? '-' }}</td>
                            </tr>

                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>
                                    @if ($datadiri)
                                        {{ $datadiri->gender == 1 ? 'Laki-laki' : 'Perempuan' }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Status Rumah</td>
                                <td>{{ $datadiri->status_rumah ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>No. Wa</td>
                                <td>{{ $datadiri->no_wa ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>{{ $datadiri->agama ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Tinggi Badan</td>
                                <td>{{ $datadiri->tinggi_badan ?? '-' }}</td>
                            </tr>

                            <tr>
                                <td>Berat Badan</td>
                                <td>{{ $datadiri->berat_badan ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>SIM</td>
                                <td>{{ $datadiri->sim ?? '-' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6">

                <div class="card shadow-none border-1 border-primary">
                    <div class="card-body row">
                        <h5>Pendidikan Formal</h5>
                        <hr>
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>Tingkat</th>
                                    <th>Instansi</th>
                                    <th>Jurusan</th>
                                    <th>Lulus</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datapendidikanformals as $datapendidikanformal)
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

                <div class="card shadow-none border-1 border-primary">
                    <div class="card-body row">
                        <h5>Pendidikan Informal</h5>
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>Jenis</th>
                                    <th>Tingkat</th>
                                    <th>Instansi</th>
                                    <th>Jurusan</th>
                                    <th>Mulai</th>
                                    <th>Akhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datapendidikannonformals as $datapendidikannonformal)
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

                <div class="card shadow-none border-1 border-primary">
                    <div class="card-body row">
                        <h5>Kemampuan dan Hobi</h5>
                        <hr>
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>Jenis</th>
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
            </div>

            <div class="col-lg-12">
                <div class="card shadow-none border-1 border-primary">
                    <div class="card-body row">
                        <h5>Keluarga</h5>
                        <hr>
                        <table class="table table-bordered table-sm">
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
                                        <td>{{ $datakeluarga->tempat_lahir_keluarga }},
                                            {{ $datakeluarga->tanggal_lahir_keluarga }}</td>
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
                <div class="card shadow-none border-1 border-primary">
                    <div class="card-body row">
                        <h5>Pengalaman Kerja</h5>
                        <hr>
                        <table class="table table-bordered table-sm">
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
            </div>
        </div>
    </div>
@stop
