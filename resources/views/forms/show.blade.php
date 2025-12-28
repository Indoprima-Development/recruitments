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
            background-color: #f8fafc;
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
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 40px;
        }

        .hero-pattern {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.2;
        }

        .user-card {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 2.5rem 2rem;
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.7);
            text-align: center;
            /* height: 100%; REMOVED */
            position: relative;
            overflow: hidden;
        }

        .user-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 100px;
            background: linear-gradient(to bottom, rgba(79, 70, 229, 0.1), transparent);
            z-index: 0;
        }

        .user-card>* {
            position: relative;
            z-index: 1;
        }

        .avatar-wrapper {
            width: 150px;
            height: 150px;
            margin: 0 auto 1.5rem;
            position: relative;
        }

        .avatar-img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 6px solid white;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }

        .avatar-wrapper:hover .avatar-img {
            transform: scale(1.05);
        }

        .section-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(226, 232, 240, 0.8);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .section-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.025);
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f1f5f9;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--text-primary);
            margin: 0;
            letter-spacing: -0.025em;
        }

        .section-icon {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
            color: #2563eb;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            box-shadow: 0 4px 6px -2px rgba(59, 130, 246, 0.2);
        }

        .info-group {
            margin-bottom: 1.25rem;
            background: #f8fafc;
            padding: 1rem;
            border-radius: 12px;
            border: 1px solid #f1f5f9;
        }

        .info-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            color: var(--text-secondary);
            font-weight: 700;
            letter-spacing: 0.05em;
            margin-bottom: 0.25rem;
            display: block;
        }

        .info-value {
            font-size: 1rem;
            color: var(--text-primary);
            font-weight: 600;
            word-break: break-word;
        }

        .timeline-item {
            position: relative;
            padding-left: 2rem;
            margin-bottom: 2rem;
            border-left: 2px solid #e2e8f0;
        }

        .timeline-item:last-child {
            margin-bottom: 0;
            border-left-color: transparent;
        }

        .timeline-dot {
            position: absolute;
            left: -6px;
            top: 0;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #2563eb;
            border: 2px solid white;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.2);
        }

        .btn-action {
            width: 100%;
            margin-bottom: 0.75rem;
            border-radius: 12px;
            padding: 0.875rem;
            font-weight: 600;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 12px -3px rgba(0, 0, 0, 0.1);
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

            .user-card,
            .section-card {
                box-shadow: none;
                border: 1px solid #ccc;
                page-break-inside: avoid;
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
            <h1 class="fw-bold mb-2 text-white display-5">Candidate Profile</h1>
            <p class="section-subtitle opacity-75 fs-5">Comprehensive data analytics & recruitment history</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container profile-container" id="contentToSave">
        <div class="row g-4">
            <!-- Left Sidebar -->
            <div class="col-lg-4">
                <!-- User Card - Sticky optimized -->
                <div class="position-sticky" style="top: 100px;">
                    <div class="user-card mb-4">
                        <div class="avatar-wrapper">
                            @if ($users->photo)
                                <img src="{{ asset($users->photo) }}" class="avatar-img" alt="User">
                            @else
                                <div
                                    class="avatar-img bg-light d-flex align-items-center justify-content-center text-secondary">
                                    <i class="fas fa-user fa-4x"></i>
                                </div>
                            @endif
                        </div>
                        <h3 class="fw-bold text-dark mb-1">{{ $users->name }}</h3>
                        <p class="text-primary fw-bold mb-3 fs-5">
                            {{ $ptkformtransactions[0]->ptkform->jobtitle->jobtitle_name ?? 'Applicant' }}
                        </p>

                        <div class="d-flex justify-content-center flex-wrap gap-2 mb-4">
                            @php
                                $status = $ptkformtransactions[0] ?? null;
                                // Simple logic for badge, expandable as needed
                                $badgeClass = 'bg-secondary';
                                $badgeText = 'APPLICANT';
                                if ($status) {
                                    if ($status->join) {
                                        $badgeClass = 'bg-success';
                                        $badgeText = 'JOINED';
                                    } elseif ($status->mcu) {
                                        $badgeClass = 'bg-warning text-dark';
                                        $badgeText = 'MCU PHASE';
                                    } elseif ($status->finalisasi) {
                                        $badgeClass = 'bg-info text-dark';
                                        $badgeText = 'FINALIZATION';
                                    } elseif ($status->interview_user || $status->interview_direksi) {
                                        $badgeClass = 'bg-primary';
                                        $badgeText = 'INTERVIEW';
                                    } elseif ($status->psikotest) {
                                        $badgeClass = 'bg-primary';
                                        $badgeText = 'PSYCHOTEST';
                                    }
                                }
                            @endphp
                            <span
                                class="badge {{ $badgeClass }} px-3 py-2 rounded-pill shadow-sm">{{ $badgeText }}</span>
                        </div>

                        <div class="d-grid gap-2 no-print">
                            @if ($users->cv)
                                <a href="{{ url($users->cv) }}" target="_blank" class="btn btn-outline-primary btn-action">
                                    <i class="fas fa-file-pdf me-2"></i>View CV Document
                                </a>
                            @endif
                            <button onclick="saveDivAsPDF()" class="btn btn-dark btn-action">
                                <i class="fas fa-download me-2"></i>Download Profile PDF
                            </button>
                            <a href="https://wa.me/{{ $users->no_wa }}" target="_blank"
                                class="btn btn-success btn-action text-white">
                                <i class="fab fa-whatsapp me-2"></i>Contact via WhatsApp
                            </a>
                        </div>
                    </div>

                    <!-- Compact Contact Info -->
                    <div class="section-card">
                        <div class="section-header mb-3">
                            <div class="section-icon" style="width: 32px; height: 32px; font-size: 1rem;"><i
                                    class="fas fa-id-card"></i></div>
                            <h5 class="section-title fs-6">Quick Contact</h5>
                        </div>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-3 d-flex align-items-center">
                                <i class="fas fa-envelope text-muted me-3" style="width: 20px;"></i>
                                <span class="fw-medium text-break">{{ $users->email }}</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="fas fa-phone text-muted me-3" style="width: 20px;"></i>
                                <span class="fw-medium">{{ $datadiri->no_hp ?? '-' }}</span>
                            </li>
                            <li class="d-flex align-items-start">
                                <i class="fas fa-map-marker-alt text-muted me-3 mt-1" style="width: 20px;"></i>
                                <span class="fw-medium">{{ $datadiri->alamat ?? '-' }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Right Content -->
            <div class="col-lg-8">
                <!-- Recruitment Journey -->
                <div class="section-card">
                    <div class="section-header">
                        <div class="section-icon"><i class="fas fa-rocket"></i></div>
                        <div>
                            <h4 class="section-title">Recruitment Journey</h4>
                            <small class="text-muted">Track candidate progress and milestones</small>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light text-uppercase small text-muted">
                                <tr>
                                    <th class="py-3 ps-3">Position Applied</th>
                                    <th class="py-3">Current Stage</th>
                                    <th class="py-3">Tech Score</th>
                                    <th class="py-3 pe-3 text-end">Applied Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($ptkformtransactions as $trans)
                                    <tr>
                                        <td class="ps-3">
                                            <div class="fw-bold text-dark">
                                                {{ $trans->ptkform->jobtitle->jobtitle_name ?? '-' }}</div>
                                            <small
                                                class="text-muted">{{ $trans->ptkform->division->division_name ?? '' }}</small>
                                        </td>
                                        <td>
                                            @if ($trans->join)
                                                <span
                                                    class="badge bg-success-subtle text-success border border-success px-3 py-2 rounded-pill">JOINED</span>
                                            @elseif($trans->mcu)
                                                <span
                                                    class="badge bg-warning-subtle text-warning border border-warning px-3 py-2 rounded-pill">MCU
                                                    Phase</span>
                                            @elseif($trans->finalisasi)
                                                <span
                                                    class="badge bg-info-subtle text-info border border-info px-3 py-2 rounded-pill">Finalization</span>
                                            @else
                                                <span
                                                    class="badge bg-secondary-subtle text-secondary border border-secondary px-3 py-2 rounded-pill">Processing</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($trans->score_technical_test)
                                                <span class="fw-bold text-dark">{{ $trans->score_technical_test }}</span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td class="text-end pe-3">
                                            <div class="fw-medium">{{ $trans->created_at->format('d M Y') }}</div>
                                            <small class="text-muted">{{ $trans->created_at->diffForHumans() }}</small>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">No recruitment history found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Personal Information Grid -->
                <div class="section-card">
                    <div class="section-header">
                        <div class="section-icon"><i class="fas fa-user-circle"></i></div>
                        <h4 class="section-title">Personal Information</h4>
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-6 col-md-4">
                            <div class="info-group h-100">
                                <span class="info-label">Full Name</span>
                                <div class="info-value">{{ $users->name }}</div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="info-group h-100">
                                <span class="info-label">Birth Place & Date</span>
                                <div class="info-value">{{ $datadiri->tempat_lahir ?? '' }},
                                    {{ $datadiri->tanggal_lahir ?? '-' }}</div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="info-group h-100">
                                <span class="info-label">Religion</span>
                                <div class="info-value">{{ $datadiri->agama ?? '-' }}</div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="info-group h-100">
                                <span class="info-label">Gender</span>
                                <div class="info-value">{{ $datadiri && $datadiri->gender == 1 ? 'Male' : 'Female' }}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="info-group h-100">
                                <span class="info-label">Identity Number (KTP)</span>
                                <div class="info-value">{{ $datadiri->ktp ?? '-' }}</div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="info-group h-100">
                                <span class="info-label">Status Rumah</span>
                                <div class="info-value">{{ $datadiri->status_rumah ?? '-' }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-top">
                        <h6 class="fw-bold text-uppercase small text-secondary mb-3">Physical Attributes & License</h6>
                        <div class="row g-3">
                            <div class="col-6 col-md-3">
                                <div class="p-3 bg-light rounded text-center">
                                    <small class="d-block text-muted text-uppercase fw-bold mb-1"
                                        style="font-size: 0.7rem;">Height</small>
                                    <span class="fs-5 fw-bold text-dark">{{ $datadiri->tinggi_badan ?? '-' }} <span
                                            class="fs-6 text-muted">cm</span></span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="p-3 bg-light rounded text-center">
                                    <small class="d-block text-muted text-uppercase fw-bold mb-1"
                                        style="font-size: 0.7rem;">Weight</small>
                                    <span class="fs-5 fw-bold text-dark">{{ $datadiri->berat_badan ?? '-' }} <span
                                            class="fs-6 text-muted">kg</span></span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="p-3 bg-light rounded text-center">
                                    <small class="d-block text-muted text-uppercase fw-bold mb-1"
                                        style="font-size: 0.7rem;">Blood Type</small>
                                    <span class="fs-5 fw-bold text-dark">{{ $datadiri->golongan_darah ?? '-' }}</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="p-3 bg-light rounded text-center">
                                    <small class="d-block text-muted text-uppercase fw-bold mb-1"
                                        style="font-size: 0.7rem;">SIM</small>
                                    <span class="fs-5 fw-bold text-dark">{{ $datadiri->sim ?? '-' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Education -->
                <div class="section-card">
                    <div class="section-header">
                        <div class="section-icon"><i class="fas fa-graduation-cap"></i></div>
                        <h4 class="section-title">Education Background</h4>
                    </div>

                    @forelse($datapendidikanformals as $edu)
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <div>
                                    <h5 class="fw-bold mb-1 text-dark">{{ $edu->instansi }}</h5>
                                    <span class="text-primary fw-medium">{{ $edu->tingkat }} in
                                        {{ $edu->jurusan }}</span>
                                </div>
                                <span class="badge bg-light text-dark border align-self-start mt-1">Graduated:
                                    {{ $edu->lulus_tahun }}</span>
                            </div>
                            <div class="d-inline-flex align-items-center bg-blue-50 text-blue-700 px-3 py-1 rounded-pill"
                                style="background-color: #eff6ff; color: #1d4ed8;">
                                <i class="fas fa-star me-2 fs-6"></i>
                                <span class="fw-bold small">GPA: {{ $edu->nilai }}</span>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-light border-0 d-flex align-items-center" role="alert">
                            <i class="fas fa-info-circle me-2 text-muted"></i>
                            <div class="text-muted">No formal education history available.</div>
                        </div>
                    @endforelse
                </div>

                <!-- Experience -->
                <div class="section-card">
                    <div class="section-header">
                        <div class="section-icon"><i class="fas fa-briefcase"></i></div>
                        <h4 class="section-title">Work Experience</h4>
                    </div>

                    @forelse($datapengalamankerjas as $job)
                        <div class="timeline-item">
                            <div class="timeline-dot"
                                style="background-color: #0ea5e9; box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.2);"></div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="fw-bold text-dark mb-0">{{ $job->perusahaan }}</h5>
                                <span class="badge bg-light text-dark border">{{ $job->date_start }} -
                                    {{ $job->date_end }}</span>
                            </div>
                            <p class="text-primary fw-bold mb-2">{{ $job->jabatan_terakhir }}</p>

                            <div class="p-3 bg-light rounded dash-border" style="border: 1px dashed #e2e8f0;">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-money-bill-wave text-success me-2"></i>
                                    <span class="small fw-bold text-muted text-uppercase me-2">Last Salary:</span>
                                    <span class="fw-bold text-dark">{{ $job->gaji_akhir }}</span>
                                </div>
                                <div>
                                    <span class="small fw-bold text-muted text-uppercase d-block mb-1">Reason for
                                        leaving:</span>
                                    <p class="mb-0 small fst-italic text-secondary">"{{ $job->alasan_keluar }}"</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-light border-0 d-flex align-items-center" role="alert">
                            <i class="fas fa-info-circle me-2 text-muted"></i>
                            <div class="text-muted">No work experience listed.</div>
                        </div>
                    @endforelse
                </div>

                <div class="row">
                    <!-- Skills -->
                    <div class="col-md-6">
                        <div class="section-card h-100">
                            <div class="section-header">
                                <div class="section-icon bg-purple-50 text-purple-600"
                                    style="background-color: #f3e8ff; color: #9333ea;"><i class="fas fa-tools"></i></div>
                                <h4 class="section-title">Skills & Expertise</h4>
                            </div>
                            <div class="d-flex flex-wrap gap-2">
                                @forelse ($datakemampuans as $skill)
                                    <span
                                        class="badge bg-white text-dark border px-3 py-2 rounded-pill d-flex align-items-center gap-2">
                                        {{ $skill->kemampuan }}
                                        <span class="badge bg-primary rounded-circle"
                                            style="font-size: 0.6rem;">{{ $skill->level }}</span>
                                    </span>
                                @empty
                                    <span class="text-muted small">No skills listed</span>
                                @endforelse
                            </div>

                            <h6 class="mt-4 mb-3 fw-bold small text-uppercase text-secondary">Hobbies</h6>
                            <div class="d-flex flex-wrap gap-2">
                                @forelse ($dataolahragas as $hobby)
                                    <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill">
                                        {{ $hobby->olahraga }}
                                    </span>
                                @empty
                                    <span class="text-muted small">No hobbies listed</span>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- Organization -->
                    <div class="col-md-6">
                        <div class="section-card h-100">
                            <div class="section-header">
                                <div class="section-icon bg-orange-50 text-orange-600"
                                    style="background-color: #ffedd5; color: #ea580c;"><i class="fas fa-users"></i></div>
                                <h4 class="section-title">Organization</h4>
                            </div>
                            <ul class="list-group list-group-flush">
                                @forelse ($dataorganisasis as $org)
                                    <li class="list-group-item px-0 border-0 mb-3 bg-transparent">
                                        <div class="d-flex align-items-center mb-1">
                                            <div class="me-3 rounded-circle bg-light d-flex align-items-center justify-content-center"
                                                style="width: 32px; height: 32px;">
                                                <i class="fas fa-sitemap text-muted small"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-bold text-dark">{{ $org->nama_organisasi }}</h6>
                                                <small class="text-muted">{{ $org->jabatan }} &bull;
                                                    {{ $org->tahun }}</small>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="text-muted small">No organization history.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Family & Data Details -->
                <div class="section-card mt-4">
                    <div class="section-header">
                        <div class="section-icon"><i class="fas fa-users-cog"></i></div>
                        <h4 class="section-title">Family Data</h4>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-sm small mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th>Relation</th>
                                    <th>Name</th>
                                    <th>Birth Date</th>
                                    <th>Occupation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datakeluargas as $fam)
                                    <tr>
                                        <td class="fw-bold">{{ $fam->status_hubungan }}</td>
                                        <td>{{ $fam->nama_keluarga }}</td>
                                        <td>{{ $fam->tanggal_lahir_keluarga }}</td>
                                        <td>{{ $fam->pekerjaan }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">No family data available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
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
            const opt = {
                margin: [0.3, 0.3],
                filename: '{{ $users->name }}_Profile_Recruitment.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2,
                    logging: true,
                    useCORS: true,
                    letterRendering: true
                },
                jsPDF: {
                    unit: 'in',
                    format: 'a4',
                    orientation: 'portrait'
                }
            };

            // Pre-process for print
            document.querySelectorAll('.no-print').forEach(el => el.style.display = 'none');
            element.style.background = 'white'; // Ensure background is white for PDF

            html2pdf().set(opt).from(element).save().then(() => {
                // Post-process
                document.querySelectorAll('.no-print').forEach(el => el.style.display = '');
                element.style.background = ''; // Revert
            });
        }
    </script>
@endsection
```
