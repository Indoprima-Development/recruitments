@extends('default')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('package/dist/libs/quill/dist/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('package/dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    <style>
        :root {
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --primary-subtle: #eff6ff;
            --primary-border: #bfdbfe;
            --secondary: #64748b;
            --success: #10b981;
            --danger: #ef4444;
            --border-color: #e2e8f0;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --bg-card: #ffffff;
            --radius-md: 0.75rem;
            --radius-lg: 1rem;
        }

        .create-wizard-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01);
            overflow: hidden;
        }

        /* Stepper Navigation */
        .stepper-header {
            background: #f8fafc;
            border-bottom: 1px solid var(--border-color);
            padding: 1.25rem 1.5rem;
        }

        .stepper-list {
            display: flex;
            justify-content: space-between;
            align-items: center;
            list-style: none;
            margin: 0;
            padding: 0;
            position: relative;
        }

        .stepper-list::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 5%;
            right: 5%;
            height: 3px;
            background: var(--border-color);
            z-index: 1;
            transform: translateY(-50%);
        }

        .stepper-item {
            position: relative;
            z-index: 2;
            text-align: center;
            flex: 1;
        }

        .stepper-btn {
            background: #ffffff;
            border: 2px solid var(--border-color);
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1rem;
            color: var(--secondary);
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
        }

        .stepper-label {
            display: block;
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--text-muted);
            margin-top: 0.4rem;
            transition: all 0.3s;
        }

        .stepper-item.active .stepper-btn {
            background: var(--primary);
            border-color: var(--primary);
            color: #ffffff;
            box-shadow: 0 0 0 5px rgba(37, 99, 235, 0.15);
            transform: scale(1.1);
        }

        .stepper-item.active .stepper-label {
            color: var(--primary);
            font-weight: 700;
        }

        .stepper-item.completed .stepper-btn {
            background: var(--success);
            border-color: var(--success);
            color: #ffffff;
        }

        .stepper-item.completed .stepper-label {
            color: var(--success);
        }

        /* Wizard Step Content */
        .step-content {
            display: none;
            padding: 2rem 2.5rem;
            animation: fadeIn 0.3s ease-in-out;
        }

        .step-content.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Section Banner */
        .section-intro-card {
            background: linear-gradient(135deg, #eff6ff 0%, #f0fdf4 100%);
            border: 1px solid #bfdbfe;
            border-radius: var(--radius-md);
            padding: 1.25rem 1.5rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .section-intro-icon {
            width: 48px;
            height: 48px;
            background: var(--primary);
            color: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.25);
        }

        .form-label {
            font-size: 0.875rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.4rem;
        }

        .form-control, .form-select {
            border: 1.5px solid var(--border-color);
            border-radius: 0.6rem;
            padding: 0.7rem 1rem;
            font-size: 0.925rem;
            color: var(--text-main);
            transition: all 0.2s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        .form-control.is-invalid, .form-select.is-invalid {
            border-color: var(--danger);
            background-image: none;
        }

        .invalid-feedback-custom {
            color: var(--danger);
            font-size: 0.8rem;
            margin-top: 0.25rem;
            font-weight: 500;
            display: none;
        }

        /* Quill */
        .ql-toolbar.ql-snow {
            border-top-left-radius: 0.6rem;
            border-top-right-radius: 0.6rem;
            border-color: var(--border-color);
            background: #f8fafc;
        }

        .ql-container.ql-snow {
            border-bottom-left-radius: 0.6rem;
            border-bottom-right-radius: 0.6rem;
            border-color: var(--border-color);
            min-height: 160px;
            font-family: inherit;
            font-size: 0.95rem;
        }

        /* Experience Box */
        .experience-card {
            background: #f8fafc;
            border: 1px solid var(--border-color);
            border-radius: 0.6rem;
            padding: 1rem 1.25rem;
            margin-bottom: 0.85rem;
            position: relative;
            transition: all 0.2s;
        }

        .experience-card:hover {
            border-color: var(--primary-border);
            background: #ffffff;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .btn-remove-exp {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #fee2e2;
            color: var(--danger);
            border: none;
            border-radius: 6px;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-remove-exp:hover {
            background: var(--danger);
            color: white;
        }

        .btn-add-exp {
            background: var(--primary-subtle);
            border: 2px dashed var(--primary-border);
            color: var(--primary);
            padding: 0.75rem 1.25rem;
            border-radius: 0.6rem;
            font-weight: 600;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.2s;
        }

        .btn-add-exp:hover {
            background: #dbeafe;
            border-color: var(--primary);
        }

        /* Live Preview Card */
        .preview-box {
            background: #ffffff;
            border: 1.5px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
        }

        .preview-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.35rem 0.75rem;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 600;
            background: #eff6ff;
            color: var(--primary);
        }

        /* Footer Navigation */
        .stepper-footer {
            background: #f8fafc;
            border-top: 1px solid var(--border-color);
            padding: 1.25rem 2.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <!-- Header Page -->
        <div class="row mb-4 align-items-center">
            <div class="col-md-8">
                <h3 class="fw-bold text-dark mb-1">
                    <i class="ti ti-briefcase text-primary me-2"></i>Tambah Vacancy / Lowongan Kerja
                </h3>
                <p class="text-muted mb-0">Isi formulir bertahap di bawah ini untuk membuka lowongan posisi baru.</p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="{{ route('ptkforms.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                    <i class="ti ti-arrow-left me-1"></i> Kembali ke Daftar
                </a>
            </div>
        </div>

        @if (isset($errors) && $errors->any())
            <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm" role="alert">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <i class="ti ti-alert-circle fs-5"></i>
                    <strong>Mohon periksa kembali isian formulir:</strong>
                </div>
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Main Stepper Card -->
        <div class="create-wizard-card">
            <!-- Stepper Header -->
            <div class="stepper-header">
                <ul class="stepper-list">
                    <li class="stepper-item active" data-step="1">
                        <button type="button" class="stepper-btn" onclick="goToStep(1)">1</button>
                        <span class="stepper-label">1. Posisi & Struktur</span>
                    </li>
                    <li class="stepper-item" data-step="2">
                        <button type="button" class="stepper-btn" onclick="goToStep(2)">2</button>
                        <span class="stepper-label">2. Tanggung Jawab</span>
                    </li>
                    <li class="stepper-item" data-step="3">
                        <button type="button" class="stepper-btn" onclick="goToStep(3)">3</button>
                        <span class="stepper-label">3. Kualifikasi & Syarat</span>
                    </li>
                    <li class="stepper-item" data-step="4">
                        <button type="button" class="stepper-btn" onclick="goToStep(4)">4</button>
                        <span class="stepper-label">4. Publikasi & Review</span>
                    </li>
                </ul>
            </div>

            {!! Form::open([
                'route' => 'ptkforms.store',
                'id' => 'formptk',
                'autocomplete' => 'off',
            ]) !!}

            <!-- STEP 1: Posisi & Organisasi -->
            <div class="step-content active" id="step-1">
                <div class="section-intro-card">
                    <div class="section-intro-icon">
                        <i class="ti ti-building-skyscraper"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1 text-dark">Informasi Posisi & Penempatan</h5>
                        <p class="text-muted small mb-0">Tentukan jabatan, status kepegawaian, struktur divisi/departemen, dan lokasi kerja.</p>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">Job Title / Posisi <span class="text-danger">*</span></label>
                        <select class="form-select" id="jobtitle_id" name="jobtitle_id" required>
                            <option value="" disabled selected>-- Pilih Posisi / Job Title --</option>
                            @foreach ($jobtitles as $j)
                                <option value="{{ $j->id }}" data-section="{{ $j->section_id }}">{{ $j->jobtitle_name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback-custom">Posisi wajib dipilih.</div>
                        <div class="small text-muted mt-1">Pilih posisi yang akan dibuka lowongannya.</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status Kepegawaian <span class="text-danger">*</span></label>
                        <select class="form-select" id="status_pegawai" name="status_pegawai" required>
                            <option value="" disabled selected>-- Pilih Status --</option>
                            <option value="Staff" selected>Staff</option>
                            <option value="Non Staff">Non Staff</option>
                            <option value="Internship">Internship</option>
                            <option value="Apprenticeship">Apprenticeship</option>
                            <option value="Graduate Development Program">Graduate Development Program</option>
                            <option value="Assistant Manager">Assistant Manager</option>
                        </select>
                        <div class="invalid-feedback-custom">Status kepegawaian wajib dipilih.</div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Divisi <span class="text-danger">*</span></label>
                        <select id="division_id" class="form-select" name="division_id" required>
                            <option value="" disabled selected>-- Pilih Divisi --</option>
                            @foreach ($divisions as $d)
                                <option value="{{ $d->id }}">{{ $d->division_name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback-custom">Divisi wajib dipilih.</div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Departemen <span class="text-danger">*</span></label>
                        <select id="department_id" class="form-select" name="department_id" required>
                            <option value="" disabled selected>-- Pilih Departemen --</option>
                            @foreach ($departments as $d)
                                <option value="{{ $d->id }}" data-division="{{ $d->division_id }}">{{ $d->department_name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback-custom">Departemen wajib dipilih.</div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Section / Bagian <span class="text-danger">*</span></label>
                        <select id="section_id" class="form-select" name="section_id" required>
                            <option value="" disabled selected>-- Pilih Section --</option>
                            @foreach ($sections as $s)
                                <option value="{{ $s->id }}" data-department="{{ $s->department_id }}">{{ $s->section_name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback-custom">Section wajib dipilih.</div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Lokasi Penempatan</label>
                        <select class="form-select" name="location_id" id="location_id">
                            <option value="" selected>Semua Area / Fleksibel</option>
                            @foreach ($locations as $loc)
                                <option value="{{ $loc->id }}">{{ $loc->location_name }}</option>
                            @endforeach
                        </select>
                        <div class="small text-muted mt-1">Lokasi penempatan kerja karyawan.</div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Tanggal Estimasi Masuk Kerja <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="date_startwork" id="date_startwork" value="{{ date('Y-m-d') }}" required>
                        <div class="invalid-feedback-custom">Tanggal mulai kerja wajib diisi.</div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Jumlah Kebutuhan (Headcount)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="ti ti-users"></i></span>
                            <input type="number" class="form-control" name="jumlah_kebutuhan_pegawai" id="jumlah_kebutuhan_pegawai" value="1" min="1" placeholder="1">
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 2: Tanggung Jawab & Scope -->
            <div class="step-content" id="step-2">
                <div class="section-intro-card">
                    <div class="section-intro-icon">
                        <i class="ti ti-list-check"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1 text-dark">Tugas & Tanggung Jawab Pekerjaan</h5>
                        <p class="text-muted small mb-0">Tentukan atasan langsung, jumlah bawahan, dan rincian deskripsi tanggung jawab pekerjaan.</p>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">Atasan Langsung (Direct Superior) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="direct_superior" id="direct_superior" placeholder="contoh: Accounting Manager / Section Head" required>
                        <div class="invalid-feedback-custom">Atasan langsung wajib diisi.</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah Bawahan Langsung (Direct Junior)</label>
                        <input type="number" class="form-control" name="direct_junior" id="direct_junior" placeholder="0" value="0" min="0">
                        <div class="small text-muted mt-1">Isi 0 jika posisi tidak memiliki bawahan langsung.</div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Deskripsi Pekerjaan & Tanggung Jawab (Job Responsibilities)</label>
                        <input type="hidden" name="responsibility" id="responsibility">
                        <div id="editor-responsibility" class="responsibility"></div>
                        <div class="small text-muted mt-1">Gunakan poin-poin (bullet list) untuk memudahkan pelamar membaca tugas utama.</div>
                    </div>
                </div>
            </div>

            <!-- STEP 3: Kualifikasi & Persyaratan -->
            <div class="step-content" id="step-3">
                <div class="section-intro-card">
                    <div class="section-intro-icon">
                        <i class="ti ti-school"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1 text-dark">Kualifikasi & Kriteria Kandidat</h5>
                        <p class="text-muted small mb-0">Tetapkan standar pendidikan, jurusan, IPK, jenis kelamin, keahlian khusus, dan pengalaman kerja.</p>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <label class="form-label">Minimal Pendidikan <span class="text-danger">*</span></label>
                        <select class="form-select" name="education_id" id="education_id" required>
                            <option value="" disabled selected>-- Pilih Pendidikan --</option>
                            @foreach ($educations as $d)
                                <option value="{{ $d->id }}">{{ $d->education_name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback-custom">Pendidikan wajib dipilih.</div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Jurusan / Program Studi <span class="text-danger">*</span></label>
                        <select class="form-select" name="major_id" id="major_id" required>
                            <option value="" disabled selected>-- Pilih Jurusan --</option>
                            @foreach ($majors as $d)
                                <option value="{{ $d->id }}">{{ $d->major_name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback-custom">Jurusan wajib dipilih.</div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Minimal IPK (GPA) <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" class="form-control" name="ipk" id="ipk" value="3.00" min="0" max="4.00" placeholder="3.00" required>
                        <div class="invalid-feedback-custom">Minimal IPK wajib diisi angka (contoh: 3.00).</div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label d-block">Preferensi Jenis Kelamin <span class="text-danger">*</span></label>
                        <div class="d-flex gap-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender0" value="0" checked>
                                <label class="form-check-label fw-semibold" for="gender0">Semua Jenis Kelamin (Laki-laki / Perempuan)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender1" value="1">
                                <label class="form-check-label fw-semibold" for="gender1">Laki-laki</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender2" value="2">
                                <label class="form-check-label fw-semibold" for="gender2">Perempuan</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Persyaratan Pengalaman Kerja (Opsional)</label>
                        <div id="pengalamanContainer"></div>
                        <button type="button" id="addPengalaman" class="btn-add-exp mt-2">
                            <i class="ti ti-plus"></i> Tambah Bidang Pengalaman Kerja
                        </button>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Kualifikasi Tambahan / Keahlian Khusus (Requirements)</label>
                        <input type="hidden" name="special_conditions" id="special_conditions">
                        <div id="editor-special_conditions" class="special_conditions"></div>
                        <div class="small text-muted mt-1">Cantumkan syarat bahasa (misal Mandarin HSK 3), keahlian software, sertifikasi, dll.</div>
                    </div>
                </div>
            </div>

            <!-- STEP 4: Justifikasi & Jadwal Publikasi -->
            <div class="step-content" id="step-4">
                <div class="section-intro-card">
                    <div class="section-intro-icon">
                        <i class="ti ti-send"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1 text-dark">Jadwal Publikasi & Finalisasi</h5>
                        <p class="text-muted small mb-0">Tentukan status lowongan, periode aktif di website karir, dan review ringkasan lowongan.</p>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">Status Lowongan</label>
                        <select class="form-select fw-bold text-success" name="status" id="status">
                            <option value="1" selected class="text-success">● Aktif / Open (Ditampilkan di Website Karir)</option>
                            <option value="0" class="text-danger">● Tutup / Closed (Disembunyikan)</option>
                            <option value="2" class="text-warning">● Draft</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Tanggal Buka Lowongan</label>
                        <input type="date" class="form-control" name="date_open_vacancy" id="date_open_vacancy" value="{{ date('Y-m-d') }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Tanggal Tutup Lowongan</label>
                        <input type="date" class="form-control" name="date_closed_vacancy" id="date_closed_vacancy" value="{{ date('Y-m-d', strtotime('+5 years')) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Dasar Permintaan (Basis of Request)</label>
                        <select class="form-select" name="request_basis">
                            <option value="Peningkatan Volume Kerja" selected>Peningkatan Volume Kerja</option>
                            <option value="Pengembangan Struktur Organisasi">Pengembangan Struktur Organisasi</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Alasan Permintaan (Request Type)</label>
                        <select class="form-select" name="request_basis_for">
                            <option value="Pengembangan Struktur Organisasi" selected>Pengembangan Struktur Organisasi</option>
                            <option value="Resign">Penggantian Karyawan (Resign)</option>
                            <option value="Mutasi">Penggantian Karyawan (Mutasi)</option>
                            <option value="Promosi">Promosi</option>
                            <option value="Lainya">Lainnya</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Catatan Tambahan (Additional Remarks)</label>
                        <input type="hidden" name="general_others" id="general_others">
                        <div id="editor-general_others" class="general_others"></div>
                    </div>

                    <!-- Live Summary Preview -->
                    <div class="col-12 mt-4">
                        <label class="form-label fw-bold"><i class="ti ti-eye me-1"></i> Preview Ringkasan Lowongan</label>
                        <div class="preview-box">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <span class="preview-badge mb-2"><i class="ti ti-briefcase"></i> <span id="preview-status-pegawai">Staff</span></span>
                                    <h4 class="fw-bold text-dark mb-1" id="preview-title">Judul Posisi Lowongan</h4>
                                    <p class="text-muted small mb-0" id="preview-dept">Departemen / Divisi</p>
                                </div>
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill fw-bold">
                                    <i class="ti ti-circle-check me-1"></i> Siap Publikasi
                                </span>
                            </div>
                            <div class="row g-2 pt-2 border-top small text-secondary">
                                <div class="col-md-4"><strong>Pendidikan:</strong> <span id="preview-edu">-</span></div>
                                <div class="col-md-4"><strong>Jurusan:</strong> <span id="preview-major">-</span></div>
                                <div class="col-md-4"><strong>Min. IPK:</strong> <span id="preview-ipk">3.00</span></div>
                                <div class="col-md-4"><strong>Lokasi:</strong> <span id="preview-loc">Semua Area</span></div>
                                <div class="col-md-4"><strong>Supervisor:</strong> <span id="preview-sup">-</span></div>
                                <div class="col-md-4"><strong>Periode:</strong> <span id="preview-period">{{ date('d M Y') }} - Seterusnya</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stepper Footer -->
            <div class="stepper-footer">
                <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="btnPrev" onclick="prevStep()" style="display: none;">
                    <i class="ti ti-chevron-left me-1"></i> Sebelumnya
                </button>
                <div class="ms-auto d-flex gap-2">
                    <button type="button" class="btn btn-primary rounded-pill px-4 shadow-sm" id="btnNext" onclick="nextStep()">
                        Selanjutnya <i class="ti ti-chevron-right ms-1"></i>
                    </button>
                    <button type="button" class="btn btn-success rounded-pill px-4 shadow-sm" id="btnSubmit" onclick="confirmSubmit()" style="display: none;">
                        <i class="ti ti-check me-1"></i> Simpan & Publikasikan
                    </button>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('addJs')
    <script src="{{ asset('package/dist/libs/quill/dist/quill.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    <script>
        // Master Data Structures for robust dynamic cascading
        var masterSections = @json($sections);
        var masterDepartments = @json($departments);
        var masterJobtitles = @json($jobtitles);
        var masterFields = @json($fields);

        var currentStep = 1;
        var totalSteps = 4;
        var quillResponsibility, quillSpecial, quillOthers;

        // Initialize Quill Editors
        function initQuillEditors() {
            var toolbarOptions = [
                ['bold', 'italic', 'underline'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['clean']
            ];

            quillResponsibility = new Quill('#editor-responsibility', {
                theme: 'snow',
                placeholder: 'Tuliskan rincian tugas dan tanggung jawab utama...',
                modules: { toolbar: toolbarOptions }
            });

            quillSpecial = new Quill('#editor-special_conditions', {
                theme: 'snow',
                placeholder: 'Tuliskan kualifikasi tambahan, sertifikasi, kemampuan bahasa, dll...',
                modules: { toolbar: toolbarOptions }
            });

            quillOthers = new Quill('#editor-general_others', {
                theme: 'snow',
                placeholder: 'Catatan tambahan terkait lowongan (opsional)...',
                modules: { toolbar: toolbarOptions }
            });

            // Live sync to hidden inputs
            quillResponsibility.on('text-change', function() {
                $('#responsibility').val(quillResponsibility.root.innerHTML);
            });
            quillSpecial.on('text-change', function() {
                $('#special_conditions').val(quillSpecial.root.innerHTML);
            });
            quillOthers.on('text-change', function() {
                $('#general_others').val(quillOthers.root.innerHTML);
            });
        }

        // Stepper Navigation Logic
        function goToStep(step) {
            if (step > currentStep && !validateCurrentStep()) {
                return;
            }
            syncQuillData();
            showStep(step);
        }

        function nextStep() {
            if (validateCurrentStep()) {
                syncQuillData();
                if (currentStep < totalSteps) {
                    showStep(currentStep + 1);
                }
            }
        }

        function prevStep() {
            syncQuillData();
            if (currentStep > 1) {
                showStep(currentStep - 1);
            }
        }

        function showStep(step) {
            $('.step-content').removeClass('active');
            $('#step-' + step).addClass('active');

            $('.stepper-item').removeClass('active');
            for (var i = 1; i <= totalSteps; i++) {
                var item = $('.stepper-item[data-step="' + i + '"]');
                if (i === step) {
                    item.addClass('active').removeClass('completed');
                } else if (i < step) {
                    item.addClass('completed').removeClass('active');
                } else {
                    item.removeClass('active completed');
                }
            }

            currentStep = step;

            // Manage buttons
            if (currentStep === 1) {
                $('#btnPrev').hide();
            } else {
                $('#btnPrev').show();
            }

            if (currentStep === totalSteps) {
                $('#btnNext').hide();
                $('#btnSubmit').show();
                updateLivePreview();
            } else {
                $('#btnNext').show();
                $('#btnSubmit').hide();
            }

            window.scrollTo({ top: $('.create-wizard-card').offset().top - 20, behavior: 'smooth' });
        }

        function syncQuillData() {
            if (quillResponsibility) $('#responsibility').val(quillResponsibility.root.innerHTML);
            if (quillSpecial) $('#special_conditions').val(quillSpecial.root.innerHTML);
            if (quillOthers) $('#general_others').val(quillOthers.root.innerHTML);
        }

        function validateCurrentStep() {
            var isValid = true;
            var currentPanel = $('#step-' + currentStep);

            currentPanel.find('input[required], select[required], textarea[required]').each(function() {
                var field = $(this);
                var val = field.val();
                if (!val || (Array.isArray(val) && val.length === 0) || val.toString().trim() === '') {
                    field.addClass('is-invalid');
                    field.closest('div').find('.invalid-feedback-custom').show();
                    isValid = false;
                } else {
                    field.removeClass('is-invalid');
                    field.closest('div').find('.invalid-feedback-custom').hide();
                }
            });

            if (!isValid) {
                var firstInvalid = currentPanel.find('.is-invalid:first');
                if (firstInvalid.length) {
                    firstInvalid.focus();
                }
                Swal.fire({
                    icon: 'warning',
                    title: 'Lengkapi Data Wajib',
                    text: 'Mohon isi semua bidang bertanda bintang (*) sebelum melanjutkan.',
                    confirmButtonColor: '#2563eb'
                });
            }

            return isValid;
        }

        function updateLivePreview() {
            var title = $('#jobtitle_id option:selected').text();
            if ($('#jobtitle_id').val()) $('#preview-title').text(title);
            
            var dept = $('#department_id option:selected').text();
            var div = $('#division_id option:selected').text();
            if ($('#department_id').val()) $('#preview-dept').text(dept + ' - ' + div);

            $('#preview-status-pegawai').text($('#status_pegawai').val() || 'Staff');
            $('#preview-edu').text($('#education_id option:selected').text() || '-');
            $('#preview-major').text($('#major_id option:selected').text() || '-');
            $('#preview-ipk').text($('#ipk').val() || '3.00');
            $('#preview-loc').text($('#location_id option:selected').text() || 'Semua Area');
            $('#preview-sup').text($('#direct_superior').val() || '-');
            
            var openDate = $('#date_open_vacancy').val();
            var closeDate = $('#date_closed_vacancy').val();
            if (openDate && closeDate) {
                $('#preview-period').text(openDate + ' s/d ' + closeDate);
            }
        }

        function confirmSubmit() {
            syncQuillData();
            if (!validateCurrentStep()) return;

            Swal.fire({
                title: 'Konfirmasi Publikasi Lowongan',
                text: 'Apakah Anda yakin data lowongan sudah lengkap dan siap disimpan?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#10b981',
                cancelButtonColor: '#64748b',
                confirmButtonText: '<i class="ti ti-check me-1"></i> Ya, Publikasikan!',
                cancelButtonText: 'Periksa Lagi'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Menyimpan...',
                        text: 'Mohon tunggu sebentar',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    $('#formptk').submit();
                }
            });
        }

        // Setup Cascading Selects
        function setupCascadingDropdowns() {
            // When Division Changes -> filter Departments
            $('#division_id').on('change', function() {
                var divId = $(this).val();
                var deptSelect = $('#department_id');

                deptSelect.find('option:not(:first)').each(function() {
                    var match = $(this).data('division') == divId;
                    $(this).toggle(match);
                });

                // Reset downstream if not matching
                var selectedDeptOption = deptSelect.find('option:selected');
                if (selectedDeptOption.length && selectedDeptOption.data('division') != divId) {
                    deptSelect.val('');
                    $('#section_id').val('');
                }
            });

            // When Department Changes -> filter Sections
            $('#department_id').on('change', function() {
                var deptId = $(this).val();
                var sectionSelect = $('#section_id');

                sectionSelect.find('option:not(:first)').each(function() {
                    var match = $(this).data('department') == deptId;
                    $(this).toggle(match);
                });

                var selectedSecOption = sectionSelect.find('option:selected');
                if (selectedSecOption.length && selectedSecOption.data('department') != deptId) {
                    sectionSelect.val('');
                }
            });

            // When Section Changes -> filter Job Titles
            $('#section_id').on('change', function() {
                var secId = $(this).val();
                var jobSelect = $('#jobtitle_id');

                jobSelect.find('option:not(:first)').each(function() {
                    var match = $(this).data('section') == secId;
                    $(this).toggle(match);
                });
            });

            // When Job Title is selected directly -> auto-cascade upwards!
            $('#jobtitle_id').on('change', function() {
                var secId = $(this).find('option:selected').data('section');
                if (secId) {
                    var targetSec = masterSections.find(s => s.id == secId);
                    if (targetSec) {
                        var targetDept = masterDepartments.find(d => d.id == targetSec.department_id);
                        if (targetDept) {
                            $('#division_id').val(targetDept.division_id).trigger('change');
                            $('#department_id').val(targetDept.id).trigger('change');
                            $('#section_id').val(targetSec.id);
                        }
                    }
                }
            });
        }

        // Dynamic Experience Add/Remove
        function setupExperienceRepeater() {
            var expIndex = 0;

            $('#addPengalaman').on('click', function() {
                expIndex++;
                var optionsHtml = '<option value="" disabled selected>-- Pilih Bidang --</option>';
                masterFields.forEach(function(f) {
                    optionsHtml += '<option value="' + f.id + '">' + f.field_name + '</option>';
                });

                var expCardHtml = `
                    <div class="experience-card" id="exp-row-${expIndex}">
                        <button type="button" class="btn-remove-exp" onclick="$('#exp-row-${expIndex}').remove()">
                            <i class="ti ti-trash"></i>
                        </button>
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label small mb-1">Bidang Keahlian / Pengalaman</label>
                                <select class="form-select form-select-sm" name="fields[]" required>
                                    ${optionsHtml}
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small mb-1">Minimal Pengalaman (Tahun)</label>
                                <div class="input-group input-group-sm">
                                    <input type="number" name="tahun[]" class="form-control" placeholder="1" min="1" value="1" required>
                                    <span class="input-group-text bg-white text-muted">Tahun</span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                $('#pengalamanContainer').append(expCardHtml);
            });
        }

        $(document).ready(function() {
            initQuillEditors();
            setupCascadingDropdowns();
            setupExperienceRepeater();

            // Real-time invalid remover
            $('input, select').on('input change', function() {
                if ($(this).val()) {
                    $(this).removeClass('is-invalid');
                    $(this).closest('div').find('.invalid-feedback-custom').hide();
                }
            });
        });
    </script>
@endsection
