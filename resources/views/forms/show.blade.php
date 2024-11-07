@extends('default')

@section('addCss')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
@endsection

@section('content2')
    <div class="container-fluid" id="contentToSave">
        <div class="card overflow-hidden border-1 border-primary">
            <div class="card-body p-0">
                <img src="{{ asset('photo/header.png') }}" alt="" class="img-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-4 order-lg-1 order-2">
                        <div class="d-flex align-items-center justify-content-around m-4">
                            <div class="text-center text-muted">
                                <i class="ti ti-file fs-6 d-block mb-2"></i>
                                <p class="mb-0 fs-4">
                                    <a class="btn btn-sm btn-primary" href="{{url($users->cv)}}">
                                        CV
                                    </a>
                                </p>
                            </div>
                            <div class="text-center text-muted">
                                <i class="ti ti-circle-check fs-6 d-block mb-2"></i>
                                <p class="mb-0 fs-4"><b>{{ $ptkformtransactions[0]->ptkform->jobtitle->jobtitle_name ?? "-" }}</b></p>
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
                            <div class="text-center text-muted">
                                <i class="ti ti-circle-check fs-6 d-block mb-2"></i>
                                <p class="mb-0 fs-4">
                                    <b>
                                        @if($ptkformtransactions[0]->join != null)
                                        JOIN
                                        @elseif($ptkformtransactions[0]->mcu)
                                        MCU
                                        @elseif($ptkformtransactions[0]->finalisasi != null)
                                        FINALISASI
                                        @elseif($ptkformtransactions[0]->interview_direksi != null)
                                        INTERVIEW DIREKSI
                                        @elseif($ptkformtransactions[0]->interview_user != null)
                                        INTERVIEW USER
                                        @elseif($ptkformtransactions[0]->psikotest != null)
                                        PSIKOTEST
                                        @elseif($ptkformtransactions[0]->interview_hc != null)
                                        INTERVIEW HC
                                        @elseif($ptkformtransactions[0]->cv_review != null)
                                        CV REVIEW
                                        @else
                                        APPLY
                                        @endif
                                    </b>
                                </p>
                            </div>

                            <div class="text-center text-muted">
                                <i class="ti ti-printer fs-6 d-block mb-2"></i>
                                <p class="mb-0 fs-4">
                                    <button class="btn btn-sm btn-primary" onclick="saveDivAsPDF()">Save as PDF</button>
                                </p>
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
                        <h5 class="text-primary"><b>Riwayat Lamaran</b></h5>
                        <hr>
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>Jobtitle</th>
                                    <th>Score</th>
                                    <th>CV</th>
                                    <th>Technical</th>
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
                                @foreach ($ptkformtransactions as $ptkformtransaction)
                                <tr>
                                    <td>{{ $ptkformtransaction->ptkform->jobtitle->jobtitle_name ?? "-" }}</td>
                                    <td>{{$ptkformtransaction->score_candidate ?? 0}}</td>
                                    <td>{{ $ptkformtransaction->cv_review != null ? substr($ptkformtransaction->cv_review,0,10) : '-' }}</td>
                                    <td>{{$ptkformtransaction->score_technical_test ?? "-"}}</td>
                                    <td>{{ $ptkformtransaction->interview_hc != null ? substr($ptkformtransaction->interview_hc,0,10) : '-' }}</td>
                                    <td>{{ $ptkformtransaction->psikotest != null ? substr($ptkformtransaction->psikotest,0,10) : '-' }}</td>
                                    <td>{{ $ptkformtransaction->interview_user != null ? substr($ptkformtransaction->interview_user,0,10) : '-' }}</td>
                                    <td>{{ $ptkformtransaction->interview_direksi != null ? substr($ptkformtransaction->interview_direksi,0,10) : '-' }}</td>
                                    <td>{{ $ptkformtransaction->finalisasi != null ? substr($ptkformtransaction->finalisasi,0,10) : '-' }}</td>
                                    <td>{{ $ptkformtransaction->mcu != null ? substr($ptkformtransaction->mcu,0,10) : '-' }}</td>
                                    <td>{{ $ptkformtransaction->join != null ? substr($ptkformtransaction->join,0,10) : '-' }}</td>
                                </tr>
                                @endforeach
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

@section('addJs')
<script>
    function saveDivAsPDF() {
        const element = document.getElementById('contentToSave');
        html2pdf(element, {
            margin: 1,
            filename: '{{ $users->name }}.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
        });
    }
</script>
@endsection
