@extends('default')

@section('addCss')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        :root {
            --primary-color: #3a7bd5;
            --secondary-color: #00d2ff;
            --card-bg: #ffffff;
            --text-dark: #2c3e50;
            --text-light: #7f8c8d;
            --border-color: #e0e6ed;
        }

        .profile-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 20px 20px;
        }

        .profile-photo-container {
            width: 150px;
            height: 150px;
            margin: -75px auto 1rem;
            border: 5px solid white;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .profile-photo {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .candidate-name {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .candidate-position {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 1rem;
        }

        .profile-card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .profile-card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .profile-card-body {
            padding: 1.5rem;
        }

        .info-table {
            width: 100%;
        }

        .info-table tr td {
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--border-color);
            vertical-align: top;
        }

        .info-table tr:last-child td {
            border-bottom: none;
        }

        .info-label {
            font-weight: 500;
            color: var(--text-light);
            width: 30%;
        }

        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .status-badge-primary {
            background-color: #e3f2fd;
            color: var(--primary-color);
        }

        .status-badge-success {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .status-badge-warning {
            background-color: #fff8e1;
            color: #ff8f00;
        }

        .action-btn {
            border-radius: 20px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s;
        }

        .action-btn i {
            margin-right: 0.5rem;
        }

        .timeline-table {
            width: 100%;
        }

        .timeline-table th, .timeline-table td {
            padding: 0.75rem;
            text-align: center;
            border: 1px solid var(--border-color);
        }

        .timeline-table th {
            background-color: #f8f9fa;
            font-weight: 600;
        }

        .section-title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 1.5rem;
            position: relative;
        }

        .section-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 50px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
@endsection

@section('content2')
    <div class="container-fluid" id="contentToSave">
        <!-- Profile Header -->
        <div class="profile-header text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="profile-photo-container">
                            @if ($users->photo != null)
                                <img src="{{ asset($users->photo) }}" alt="Candidate Photo" class="profile-photo">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center h-100">
                                    <i class="fas fa-user fa-3x text-muted"></i>
                                </div>
                            @endif
                        </div>
                        <h1 class="candidate-name">{{ $users->name }}</h1>
                        <p class="candidate-position">
                            {{ $ptkformtransactions[0]->ptkform->jobtitle->jobtitle_name ?? "-" }}
                        </p>

                        <div class="d-flex justify-content-center gap-3 mb-4 no-print">
                            @if($users->cv != null)
                            <a href="{{url($users->cv)}}" class="action-btn btn btn-light">
                                <i class="fas fa-file-pdf"></i> View CV
                            </a>
                            @else
                            <button class="action-btn btn btn-light" disabled>
                                <i class="fas fa-exclamation-circle"></i> CV Not Uploaded
                            </button>
                            @endif

                            <button onclick="saveDivAsPDF()" class="action-btn btn btn-light">
                                <i class="fas fa-download"></i> Save as PDF
                            </button>

                            <a target="_blank" href="https://wa.me/{{ $users->no_wa }}" class="action-btn btn btn-light">
                                <i class="fab fa-whatsapp"></i> Contact
                            </a>
                        </div>

                        <div class="mb-3">
                            @php
                                $statusClass = 'status-badge-primary';
                                $statusText = 'APPLY';

                                if($ptkformtransactions[0]->join != null) {
                                    $statusClass = 'status-badge-success';
                                    $statusText = 'JOINED';
                                } elseif($ptkformtransactions[0]->mcu) {
                                    $statusClass = 'status-badge-warning';
                                    $statusText = 'MEDICAL CHECKUP';
                                } elseif($ptkformtransactions[0]->finalisasi != null) {
                                    $statusClass = 'status-badge-success';
                                    $statusText = 'FINALIZED';
                                } elseif($ptkformtransactions[0]->interview_direksi != null) {
                                    $statusClass = 'status-badge-primary';
                                    $statusText = 'DIRECTOR INTERVIEW';
                                } elseif($ptkformtransactions[0]->interview_user != null) {
                                    $statusClass = 'status-badge-primary';
                                    $statusText = 'USER INTERVIEW';
                                } elseif($ptkformtransactions[0]->psikotest != null) {
                                    $statusClass = 'status-badge-primary';
                                    $statusText = 'PSYCHOTEST';
                                } elseif($ptkformtransactions[0]->interview_hc != null) {
                                    $statusClass = 'status-badge-primary';
                                    $statusText = 'HC INTERVIEW';
                                } elseif($ptkformtransactions[0]->cv_review != null) {
                                    $statusClass = 'status-badge-primary';
                                    $statusText = 'CV REVIEWED';
                                }
                            @endphp
                            <span class="status-badge {{ $statusClass }}">
                                {{ $statusText }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Application Timeline -->
            <div class="profile-card">
                <div class="profile-card-header">
                    <h5 class="mb-0">Application Timeline</h5>
                </div>
                <div class="profile-card-body">
                    <div class="table-responsive">
                        <table class="timeline-table">
                            <thead>
                                <tr>
                                    <th>Position</th>
                                    <th>Score</th>
                                    <th>CV Review</th>
                                    <th>Technical</th>
                                    <th>HC Interview</th>
                                    <th>Psikotest</th>
                                    <th>User Interview</th>
                                    <th>Director Interview</th>
                                    <th>Finalization</th>
                                    <th>MCU</th>
                                    <th>Join</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ptkformtransactions as $ptkformtransaction)
                                <tr>
                                    <td>{{ $ptkformtransaction->ptkform->jobtitle->jobtitle_name ?? "-" }}</td>
                                    <td>{{ $ptkformtransaction->score_candidate ?? 0 }}</td>
                                    <td>{{ $ptkformtransaction->cv_review != null ? substr($ptkformtransaction->cv_review,0,10) : '-' }}</td>
                                    <td>{{ $ptkformtransaction->score_technical_test ?? "-" }}</td>
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

            <div class="row">
                <!-- Personal Information -->
                <div class="col-md-6">
                    <div class="profile-card">
                        <div class="profile-card-header">
                            <h5 class="mb-0">Personal Information</h5>
                        </div>
                        <div class="profile-card-body">
                            <table class="info-table">
                                <tr>
                                    <td class="info-label">Birth Place/Date</td>
                                    <td>{{ $datadiri->tempat_lahir ?? '-' }}, {{ $datadiri->tanggal_lahir ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="info-label">Address</td>
                                    <td>{{ $datadiri->alamat ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="info-label">Phone</td>
                                    <td>{{ $datadiri->no_hp ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="info-label">Blood Type</td>
                                    <td>{{ $datadiri->golongan_darah ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="info-label">ID Number</td>
                                    <td>{{ $datadiri->ktp ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="info-label">Vehicle</td>
                                    <td>{{ $datadiri->kendaraan ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="info-label">Gender</td>
                                    <td>
                                        @if ($datadiri)
                                            {{ $datadiri->gender == 1 ? 'Male' : 'Female' }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="info-label">House Status</td>
                                    <td>{{ $datadiri->status_rumah ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="info-label">WhatsApp</td>
                                    <td>{{ $datadiri->no_wa ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="info-label">Religion</td>
                                    <td>{{ $datadiri->agama ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="info-label">Height</td>
                                    <td>{{ $datadiri->tinggi_badan ?? '-' }} cm</td>
                                </tr>
                                <tr>
                                    <td class="info-label">Weight</td>
                                    <td>{{ $datadiri->berat_badan ?? '-' }} kg</td>
                                </tr>
                                <tr>
                                    <td class="info-label">Driver License</td>
                                    <td>{{ $datadiri->sim ?? '-' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Education -->
                <div class="col-md-6">
                    <div class="profile-card">
                        <div class="profile-card-header">
                            <h5 class="mb-0">Formal Education</h5>
                        </div>
                        <div class="profile-card-body">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Level</th>
                                            <th>Institution</th>
                                            <th>Major</th>
                                            <th>Graduation</th>
                                            <th>GPA</th>
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
                    </div>

                    <div class="profile-card mt-4">
                        <div class="profile-card-header">
                            <h5 class="mb-0">Non-Formal Education</h5>
                        </div>
                        <div class="profile-card-body">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Level</th>
                                            <th>Institution</th>
                                            <th>Field</th>
                                            <th>Start</th>
                                            <th>End</th>
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
                    </div>

                    <div class="profile-card mt-4">
                        <div class="profile-card-header">
                            <h5 class="mb-0">Skills & Hobbies</h5>
                        </div>
                        <div class="profile-card-body">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Skill/Hobby</th>
                                            <th>Level</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datakemampuans as $datakemampuan)
                                            <tr>
                                                <td>Skill</td>
                                                <td>{{ $datakemampuan->kemampuan }}</td>
                                                <td>{{ $datakemampuan->level }}</td>
                                            </tr>
                                        @endforeach

                                        @foreach ($dataolahragas as $dataolahraga)
                                            <tr>
                                                <td>Hobby</td>
                                                <td>{{ $dataolahraga->olahraga }}</td>
                                                <td>{{ $dataolahraga->level }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Family -->
                <div class="col-12">
                    <div class="profile-card">
                        <div class="profile-card-header">
                            <h5 class="mb-0">Family Members</h5>
                        </div>
                        <div class="profile-card-body">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Relationship</th>
                                            <th>Name</th>
                                            <th>Birth Place/Date</th>
                                            <th>Occupation</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datakeluargas as $datakeluarga)
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
                </div>

                <!-- Work Experience -->
                <div class="col-12">
                    <div class="profile-card">
                        <div class="profile-card-header">
                            <h5 class="mb-0">Work Experience</h5>
                        </div>
                        <div class="profile-card-body">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Company</th>
                                            <th>Initial Position</th>
                                            <th>Final Position</th>
                                            <th>Initial Salary</th>
                                            <th>Final Salary</th>
                                            <th>Start</th>
                                            <th>End</th>
                                            <th>Reason for Leaving</th>
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
        </div>
    </div>
@endsection

@section('addJs')
<script>
    function saveDivAsPDF() {
        const element = document.getElementById('contentToSave');
        html2pdf(element, {
            margin: 1,
            filename: '{{ $users->name }}_Profile.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
        });
    }
</script>
@endsection
