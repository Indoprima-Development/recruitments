@extends('default')

@section('addCss')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #4f46e5 0%, #2563eb 100%);
            --glass-bg: rgba(255, 255, 255, 0.95);
            --glass-border: 1px solid rgba(255, 255, 255, 0.5);
            --card-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.1);
            --text-primary: #1e293b;
            --text-secondary: #64748b;
        }

        body {
            background-color: #f1f5f9;
            background-image: radial-gradient(#e2e8f0 1px, transparent 1px);
            background-size: 24px 24px;
        }

        .profile-container {
            max-width: 1200px;
            margin: -80px auto 2rem;
            position: relative;
            z-index: 10;
        }

        .hero-header {
            background: var(--primary-gradient);
            padding-top: 4rem;
            padding-bottom: 8rem;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero-pattern {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.3;
        }

        .user-card {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: var(--card-shadow);
            border: var(--glass-border);
            text-align: center;
            height: 100%;
            transition: transform 0.3s ease;
        }

        .user-card:hover {
            transform: translateY(-5px);
        }

        .avatar-wrapper {
            width: 140px;
            height: 140px;
            margin: -0px auto 1.5rem;
            position: relative;
        }

        .avatar-img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .section-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f1f5f9;
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .section-icon {
            width: 36px;
            height: 36px;
            background: #eff6ff;
            color: #3b82f6;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .info-group {
            margin-bottom: 1rem;
        }

        .info-label {
            font-size: 0.8rem;
            text-transform: uppercase;
            color: var(--text-secondary);
            font-weight: 600;
            margin-bottom: 0.25rem;
            display: block;
        }

        .info-value {
            font-size: 0.95rem;
            color: var(--text-primary);
            font-weight: 500;
        }

        .custom-badge {
            padding: 0.35em 0.8em;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .timeline-item {
            position: relative;
            padding-left: 1.5rem;
            margin-bottom: 1.5rem;
            border-left: 2px solid #e2e8f0;
        }

        .timeline-item:last-child {
            margin-bottom: 0;
        }

        .timeline-dot {
            position: absolute;
            left: -6px;
            top: 0;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #3b82f6;
            border: 2px solid white;
        }

        .table-custom th {
            font-size: 0.75rem;
            text-transform: uppercase;
            color: var(--text-secondary);
            font-weight: 600;
            background: #f8fafc;
        }

        .btn-action {
            width: 100%;
            margin-bottom: 0.5rem;
            border-radius: 12px;
            padding: 0.75rem;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-action:hover {
            transform: translateY(-2px);
        }

        @media print {
            .no-print {
                display: none !important;
            }

            .hero-header {
                padding: 1rem !important;
                background: white !important;
                color: black !important;
            }

            .user-card {
                box-shadow: none;
                border: 1px solid #ccc;
            }

            .profile-container {
                margin-top: 0;
            }

            body {
                background: white;
            }
        }
    </style>
@endsection

@section('content2')
    <!-- Hero Background -->
    <div class="hero-header">
        <div class="hero-pattern"></div>
        <div class="container text-center position-relative z-1">
            <h2 class="fw-bold mb-2">Candidate Profile</h2>
            <p class="opacity-75">Comprehensive data and recruitment history</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container profile-container" id="contentToSave">
        <div class="row g-4">
            <!-- Left Sidebar -->
            <div class="col-lg-4">
                <!-- User Card -->
                <div class="user-card mb-4">
                    <div class="avatar-wrapper">
                        @if ($users->photo)
                            <img src="{{ asset($users->photo) }}" class="avatar-img" alt="User">
                        @else
                            <div class="avatar-img bg-light d-flex align-items-center justify-content-center">
                                <i class="fas fa-user fa-3x text-muted"></i>
                            </div>
                        @endif
                    </div>
                    <h3 class="fw-bold text-dark mb-1">{{ $users->name }}</h3>
                    <p class="text-primary fw-medium mb-3">
                        {{ $ptkformtransactions[0]->ptkform->jobtitle->jobtitle_name ?? 'Applicant' }}
                    </p>

                    <div class="d-flex justify-content-center gap-2 mb-4">
                        @php
                            $status = $ptkformtransactions[0] ?? null;
                            $badges = [
                                'join' => ['JOINED', 'bg-success'],
                                'mcu' => ['MCU', 'bg-warning'],
                                'finalisasi' => ['FINALIZATION', 'bg-info'],
                                'interview_direksi' => ['DIRECTOR IVF', 'bg-primary'],
                                'interview_user' => ['USER IVF', 'bg-primary'],
                                'psikotest' => ['PSYCHOTEST', 'bg-primary'],
                                'interview_hc' => ['HC IVF', 'bg-primary'],
                                'cv_review' => ['CV SCREENING', 'bg-secondary'],
                            ];
                            $currentBadge = ['APPLY', 'bg-secondary'];
                            if ($status) {
                                foreach ($badges as $key => $val) {
                                    if ($status->$key) {
                                        $currentBadge = $val;
                                        break;
                                    }
                                }
                            }
                        @endphp
                        <span class="badge {{ $currentBadge[1] }} px-3 py-2 rounded-pill">{{ $currentBadge[0] }}</span>
                    </div>

                    <div class="d-grid gap-2 no-print">
                        @if ($users->cv)
                            <a href="{{ url($users->cv) }}" target="_blank" class="btn btn-outline-primary btn-action">
                                <i class="fas fa-file-pdf me-2"></i>View CV
                            </a>
                        @endif
                        <button onclick="saveDivAsPDF()" class="btn btn-dark btn-action">
                            <i class="fas fa-download me-2"></i>Download PDF
                        </button>
                        <a href="https://wa.me/{{ $users->no_wa }}" target="_blank"
                            class="btn btn-success btn-action text-white">
                            <i class="fab fa-whatsapp me-2"></i>WhatsApp
                        </a>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="section-card">
                    <div class="section-header">
                        <div class="section-icon"><i class="fas fa-address-card"></i></div>
                        <h4 class="section-title">Contact & Personal</h4>
                    </div>

                    <div class="info-group">
                        <span class="info-label">Email</span>
                        <div class="info-value text-break">{{ $users->email }}</div>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Phone / WhatsApp</span>
                        <div class="info-value">{{ $datadiri->no_hp ?? '-' }} / {{ $datadiri->no_wa ?? '-' }}</div>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Birth Date</span>
                        <div class="info-value">{{ $datadiri->tempat_lahir ?? '' }}, {{ $datadiri->tanggal_lahir ?? '-' }}
                        </div>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Address</span>
                        <div class="info-value">{{ $datadiri->alamat ?? '-' }}</div>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Personal ID (KTP)</span>
                        <div class="info-value">{{ $datadiri->ktp ?? '-' }}</div>
                    </div>
                </div>

                <!-- Other Details -->
                <div class="section-card">
                    <div class="section-header">
                        <div class="section-icon"><i class="fas fa-info-circle"></i></div>
                        <h4 class="section-title">Other Details</h4>
                    </div>
                    <div class="row">
                        <div class="col-6 info-group">
                            <span class="info-label">Gender</span>
                            <div class="info-value">{{ $datadiri && $datadiri->gender == 1 ? 'Male' : 'Female' }}</div>
                        </div>
                        <div class="col-6 info-group">
                            <span class="info-label">Religion</span>
                            <div class="info-value">{{ $datadiri->agama ?? '-' }}</div>
                        </div>
                        <div class="col-6 info-group">
                            <span class="info-label">Height</span>
                            <div class="info-value">{{ $datadiri->tinggi_badan ?? '-' }} cm</div>
                        </div>
                        <div class="col-6 info-group">
                            <span class="info-label">Weight</span>
                            <div class="info-value">{{ $datadiri->berat_badan ?? '-' }} kg</div>
                        </div>
                        <div class="col-6 info-group">
                            <span class="info-label">Blood Type</span>
                            <div class="info-value">{{ $datadiri->golongan_darah ?? '-' }}</div>
                        </div>
                        <div class="col-6 info-group">
                            <span class="info-label">Status Rumah</span>
                            <div class="info-value">{{ $datadiri->status_rumah ?? '-' }}</div>
                        </div>
                    </div>
                    <div class="info-group mt-2">
                        <span class="info-label">Driving License (SIM)</span>
                        <div class="info-value">{{ $datadiri->sim ?? '-' }}</div>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Vehicle</span>
                        <div class="info-value">{{ $datadiri->kendaraan ?? '-' }}</div>
                    </div>
                </div>
            </div>

            <!-- Right Content -->
            <div class="col-lg-8">

                <!-- Recruitment History -->
                <div class="section-card">
                    <div class="section-header">
                        <div class="section-icon"><i class="fas fa-history"></i></div>
                        <h4 class="section-title">Recruitment History</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-custom align-middle">
                            <thead>
                                <tr>
                                    <th>Job Title</th>
                                    <th>Status</th>
                                    <th>Score</th>
                                    <th>Apply Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ptkformtransactions as $trans)
                                    <tr>
                                        <td class="fw-bold">{{ $trans->ptkform->jobtitle->jobtitle_name ?? '-' }}</td>
                                        <td>
                                            @if ($trans->join)
                                                <span class="badge bg-success">Joined</span>
                                            @elseif($trans->mcu)
                                                <span class="badge bg-warning">MCU</span>
                                            @elseif($trans->finalisasi)
                                                <span class="badge bg-info">Finalization</span>
                                            @else
                                                <span class="badge bg-secondary">Processing</span>
                                            @endif
                                        </td>
                                        <td>{{ $trans->score_technical_test ?? '-' }}</td>
                                        <td>{{ $trans->created_at->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Education -->
                <div class="section-card">
                    <div class="section-header">
                        <div class="section-icon"><i class="fas fa-graduation-cap"></i></div>
                        <h4 class="section-title">Education</h4>
                    </div>

                    <h6 class="text-primary fw-bold mb-3"><i class="fas fa-university me-2"></i>Formal</h6>
                    @forelse($datapendidikanformals as $edu)
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <h6 class="fw-bold mb-1">{{ $edu->instansi }}</h6>
                            <p class="mb-1 text-muted small">{{ $edu->tingkat }} - {{ $edu->jurusan }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-light text-dark border">Grad: {{ $edu->lulus_tahun }}</span>
                                <span class="fw-bold text-primary">GPA: {{ $edu->nilai }}</span>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted small fst-italic">No formal education data.</p>
                    @endforelse

                    @if ($datapendidikannonformals->count() > 0)
                        <hr class="my-4">
                        <h6 class="text-primary fw-bold mb-3"><i class="fas fa-certificate me-2"></i>Non-Formal</h6>
                        <div class="table-responsive">
                            <table class="table table-sm table-custom">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Institution</th>
                                        <th>Field</th>
                                        <th>Period</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datapendidikannonformals as $edu)
                                        <tr>
                                            <td>{{ $edu->jenis }}</td>
                                            <td>{{ $edu->instansi }}</td>
                                            <td>{{ $edu->jurusan }}</td>
                                            <td>{{ $edu->date_start }} - {{ $edu->date_end }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

                <!-- Work Experience -->
                <div class="section-card">
                    <div class="section-header">
                        <div class="section-icon"><i class="fas fa-briefcase"></i></div>
                        <h4 class="section-title">Work Experience</h4>
                    </div>

                    @forelse($datapengalamankerjas as $job)
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="d-flex justify-content-between flex-wrap gap-2">
                                <h6 class="fw-bold mb-0">{{ $job->perusahaan }}</h6>
                                <span class="badge bg-light text-dark border">{{ $job->date_start }} -
                                    {{ $job->date_end }}</span>
                            </div>
                            <p class="text-primary small mb-2">{{ $job->jabatan_terakhir }}</p>
                            <div class="d-flex flex-wrap gap-3 small text-muted mb-2">
                                <span><i class="fas fa-money-bill-wave me-1"></i>Last Salary:
                                    {{ $job->gaji_akhir }}</span>
                            </div>
                            <p class="small text-secondary mb-0 bg-light p-2 rounded">reason: {{ $job->alasan_keluar }}
                            </p>
                        </div>
                    @empty
                        <p class="text-muted small fst-italic">No work experience data.</p>
                    @endforelse
                </div>

                <!-- Skills & Org -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="section-card">
                            <div class="section-header">
                                <div class="section-icon"><i class="fas fa-tools"></i></div>
                                <h4 class="section-title">Skills & Hobbies</h4>
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach ($datakemampuans as $skill)
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        {{ $skill->kemampuan }}
                                        <span class="badge bg-primary rounded-pill">{{ $skill->level }}</span>
                                    </li>
                                @endforeach
                                @foreach ($dataolahragas as $hobby)
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        {{ $hobby->olahraga }} (Hobby)
                                        <span class="badge bg-info rounded-pill">{{ $hobby->level }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="section-card">
                            <div class="section-header">
                                <div class="section-icon"><i class="fas fa-users"></i></div>
                                <h4 class="section-title">Organization</h4>
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach ($dataorganisasis as $org)
                                    <li class="list-group-item px-0">
                                        <h6 class="mb-0 small fw-bold">{{ $org->nama_organisasi }}</h6>
                                        <p class="mb-0 small text-muted">{{ $org->jabatan }} ({{ $org->tahun }})</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Family & Data Details -->
                <div class="section-card mt-4">
                    <div class="section-header">
                        <div class="section-icon"><i class="fas fa-users-cog"></i></div>
                        <h4 class="section-title">Family & Extra Details</h4>
                    </div>

                    <h6 class="fw-bold mb-3 small text-uppercase text-secondary">Family Members</h6>
                    <div class="table-responsive mb-4">
                        <table class="table table-sm table-custom table-bordered">
                            <thead>
                                <tr>
                                    <th>Relation</th>
                                    <th>Name</th>
                                    <th>DoB</th>
                                    <th>Job</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datakeluargas as $fam)
                                    <tr>
                                        <td>{{ $fam->status_hubungan }}</td>
                                        <td>{{ $fam->nama_keluarga }}</td>
                                        <td>{{ $fam->tanggal_lahir_keluarga }}</td>
                                        <td>{{ $fam->pekerjaan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if ($datakesehatans->count() > 0)
                        <h6 class="fw-bold mb-3 small text-uppercase text-secondary">Health Records</h6>
                        <ul class="list-group list-group-flush mb-4">
                            @foreach ($datakesehatans as $health)
                                <li class="list-group-item px-0 text-danger">
                                    <i class="fas fa-heartbeat me-2"></i> {{ $health->penyakit }} ({{ $health->tahun }})
                                    - {{ $health->keterangan }}
                                </li>
                            @endforeach
                        </ul>
                    @endif

                </div>

            </div>
        </div>
    </div>
@endsection

@section('addJs')
    <script>
        function saveDivAsPDF() {
            const element = document.getElementById('contentToSave');
            const opt = {
                margin: [0.5, 0.5],
                filename: '{{ $users->name }}_Profile.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2,
                    useCORS: true
                },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                }
            };

            // Hide elements for print
            document.querySelectorAll('.no-print').forEach(el => el.style.display = 'none');

            html2pdf().set(opt).from(element).save().then(() => {
                // Restore elements
                document.querySelectorAll('.no-print').forEach(el => el.style.display = '');
            });
        }
    </script>
@endsection
