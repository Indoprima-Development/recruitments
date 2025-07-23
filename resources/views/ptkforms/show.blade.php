@extends('default')

@section('addCss')
    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #3a86ff;
            --secondary: #3f37c9;
            --dark: #212529;
            --dark-light: #2b2d42;
            --light: #f8f9fa;
            --success: #4cc9f0;
            --warning: #f8961e;
            --danger: #ef233c;
            --gray: #adb5bd;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: #f5f7fa;
            color: #495057;
            line-height: 1.6;
        }

        /* Modern Header */
        .modern-header {
            position: relative;
            height: 280px;
            overflow: hidden;
            border-radius: 0 0 12px 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            /* background: linear-gradient(135deg, var(--primary), var(--secondary)); */
            background-image: url("{{ asset('photo/header.png') }}");
            background-size: cover;
            background-position: center;
        }

        .header-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: flex-end;
            padding: 2rem;
        }

        .status-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: white;
            color: var(--primary);
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Modern Card */
        .modern-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: none;
            overflow: hidden;
        }

        .modern-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .modern-card .card-header {
            background: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            font-weight: 600;
            padding: 1.25rem 1.5rem;
        }

        .modern-card .card-body {
            padding: 1.5rem;
        }

        /* Modern Title */
        .modern-title {
            font-weight: 700;
            color: var(--dark);
            position: relative;
            margin-bottom: 1.5rem;
        }

        .modern-title:after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--primary);
            border-radius: 3px;
        }

        /* Badges */
        .category-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 500;
            margin-right: 8px;
            margin-bottom: 8px;
            background: rgba(67, 97, 238, 0.1);
            color: var(--primary);
        }

        /* Buttons */
        .modern-btn {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s ease;
            border: none;
        }

        .modern-btn-primary {
            background: var(--primary);
            color: white;
        }

        .modern-btn-primary:hover {
            background: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.2);
        }

        .modern-btn-outline {
            background: transparent;
            border: 1px solid var(--primary);
            color: var(--primary);
        }

        .modern-btn-outline:hover {
            background: rgba(67, 97, 238, 0.05);
        }

        /* Table */
        .modern-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .modern-table thead th {
            background: rgba(67, 97, 238, 0.05);
            color: var(--primary);
            font-weight: 600;
            padding: 12px 16px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .modern-table tbody td {
            padding: 12px 16px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .modern-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Rating */
        .rating-container {
            display: flex;
            gap: 5px;
        }

        .rating-container input[type="radio"] {
            display: none;
        }

        .rating-container label {
            color: var(--gray);
            cursor: pointer;
            font-size: 1.25rem;
            transition: all 0.2s ease;
        }

        .rating-container input[type="radio"]:checked~label,
        .rating-container label:hover {
            color: var(--warning);
        }

        /* Modal */
        .modern-modal .modal-content {
            border: none;
            border-radius: 12px;
            overflow: hidden;
        }

        .modern-modal .modal-header {
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1.25rem 1.5rem;
        }

        .modern-modal .modal-title {
            font-weight: 600;
            color: var(--dark);
        }

        /* Signature Section */
        .signature-section {
            border-top: 1px dashed rgba(0, 0, 0, 0.1);
            margin-top: 3rem;
            padding-top: 2rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .modern-header {
                height: 200px;
            }

            .header-overlay {
                padding: 1.5rem;
            }
        }

        /* Utility Classes */
        .text-primary {
            color: var(--primary) !important;
        }

        .bg-light {
            background-color: var(--light) !important;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
@endsection

@section('content2')
    <div class="container-fluid px-0 mb-2">
        <!-- Modern Header -->
        <div class="modern-header mb-5">
            <div class="header-overlay">
                <div class="container-fluid">
                    <div class="d-flex flex-column text-white">
                        <div class="d-flex flex-wrap mb-3">
                            <span class="category-badge bg-white text-primary me-2">
                                {{ $ptkform->division->division_name ?? '-' }}
                            </span>
                            <span class="category-badge bg-white text-primary me-2">
                                {{ $ptkform->department->department_name ?? '-' }}
                            </span>
                            <span class="category-badge bg-white text-primary">
                                {{ $ptkform->section->section_name ?? '-' }}
                            </span>
                        </div>
                        <h1 class="text-white mb-2" style="font-weight: 700; font-size: 2rem;">
                            {{ $ptkform->jobtitle->jobtitle_name ?? '-' }}</h1>
                        <p class="mb-0" style="opacity: 0.9;">Start Date: {{ $ptkform->date_startwork }}</p>
                    </div>
                </div>
            </div>
            <span class="status-badge">
                {{ $ptkform->status == 0 ? 'CLOSED' : 'OPEN' }}
            </span>
        </div>

        <!-- Main Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7">
                    <!-- Job Details Card -->
                    <div class="modern-card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h3 class="modern-title">Job Specification</h3>

                                @if (Auth::check())
                                    <div class="d-flex gap-2">
                                        @if (Auth::user()->role == 'Admin')
                                            <button type="button" class="modern-btn modern-btn-primary"
                                                data-bs-toggle="modal" data-bs-target="#approvalModal">
                                                <i class="ti ti-check me-1"></i> Approve
                                            </button>
                                        @endif

                                        @if (!$isApplied)
                                            <button type="button" class="modern-btn modern-btn-outline"
                                                data-bs-toggle="modal" data-bs-target="#applicationModal">
                                                <i class="ti ti-send me-1"></i> Apply
                                            </button>
                                        @else
                                            <button type="button" class="modern-btn modern-btn-outline" disabled
                                                style="opacity: 0.7;">
                                                <i class="ti ti-check me-1"></i> Applied
                                            </button>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <h5 class="text-uppercase text-muted mb-3"
                                        style="font-size: 0.75rem; letter-spacing: 1px;">DIRECT SUPERIOR</h5>
                                    <p class="mb-0">{{ $ptkform->direct_superior }}</p>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <h5 class="text-uppercase text-muted mb-3"
                                        style="font-size: 0.75rem; letter-spacing: 1px;">DIRECT SUBORDINATES</h5>
                                    <p class="mb-0">{{ $ptkform->direct_junior }}</p>
                                </div>

                                <div class="col-12 mb-4">
                                    <h5 class="text-uppercase text-muted mb-3"
                                        style="font-size: 0.75rem; letter-spacing: 1px;">RESPONSIBILITIES</h5>
                                    <div class="bg-light p-3 rounded">
                                        {!! $ptkform->responsibility !!}
                                    </div>
                                </div>

                                <div class="col-12">
                                    <h5 class="text-uppercase text-muted mb-3"
                                        style="font-size: 0.75rem; letter-spacing: 1px;">REQUEST BASIS</h5>
                                    <p class="mb-3">{{ $ptkform->request_basis }}</p>

                                    <h5 class="text-uppercase text-muted mb-3"
                                        style="font-size: 0.75rem; letter-spacing: 1px;">REQUEST PURPOSE</h5>
                                    <p class="mb-3">{{ $ptkform->request_basis_for }}</p>

                                    <h5 class="text-uppercase text-muted mb-3"
                                        style="font-size: 0.75rem; letter-spacing: 1px;">ADDITIONAL INFO</h5>
                                    <div class="bg-light p-3 rounded">
                                        {!! $ptkform->general_others !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <!-- Requirements Card -->
                    <div class="modern-card h-100">
                        <div class="card-header">
                            <h5 class="mb-0">Requirements</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <h5 class="text-uppercase text-muted mb-3" style="font-size: 0.75rem; letter-spacing: 1px;">
                                    GENDER</h5>
                                <p class="mb-0">
                                    @if ($ptkform->gender == 0)
                                        Male/Female
                                    @elseif($ptkform->gender == 1)
                                        Male
                                    @else
                                        Female
                                    @endif
                                </p>
                            </div>

                            <div class="mb-4">
                                <h5 class="text-uppercase text-muted mb-3" style="font-size: 0.75rem; letter-spacing: 1px;">
                                    EDUCATION</h5>
                                <p class="mb-0">{{ $ptkform->education->education_name }}</p>
                            </div>

                            <div class="mb-4">
                                <h5 class="text-uppercase text-muted mb-3" style="font-size: 0.75rem; letter-spacing: 1px;">
                                    MAJOR</h5>
                                <p class="mb-0">{{ $ptkform->major->major_name }}</p>
                            </div>

                            <div class="mb-4">
                                <h5 class="text-uppercase text-muted mb-3" style="font-size: 0.75rem; letter-spacing: 1px;">
                                    EXPERIENCE</h5>
                                <div class="bg-light p-3 rounded">
                                    @foreach ($ptkfields as $no => $d)
                                    <h6>{{$no+1}}. {{$d->field->field_name}} {{$d->year}} Tahun</h6>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mb-0">
                                <h5 class="text-uppercase text-muted mb-3" style="font-size: 0.75rem; letter-spacing: 1px;">
                                    SPECIAL CONDITIONS</h5>
                                <div class="bg-light p-3 rounded">
                                    {!! $ptkform->special_conditions !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (Auth::check() && Auth::user()->role == 'Admin')
                <!-- Signature Section -->
                <div class="modern-card mt-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <p class="text-muted">Surabaya, {{ date('d M Y') }}</p>
                            </div>

                            <div class="col-md-6 mb-4">
                                <h5 class="text-uppercase text-muted mb-4" style="font-size: 0.75rem; letter-spacing: 1px;">
                                    APPROVED BY</h5>
                                <div style="height: 1px; background: rgba(0, 0, 0, 0.1); margin: 2rem 0;"></div>
                                <h5 class="text-uppercase text-primary">PM/GM</h5>
                                <p class="text-muted">{{ date('Y-m-d') }}</p>
                            </div>

                            <div class="col-md-6 mb-4">
                                <h5 class="text-uppercase text-muted mb-4"
                                    style="font-size: 0.75rem; letter-spacing: 1px;">APPROVED BY</h5>
                                <div style="height: 1px; background: rgba(0, 0, 0, 0.1); margin: 2rem 0;"></div>
                                <h5 class="text-uppercase text-primary">DIRECTOR</h5>
                                <p class="text-muted">{{ date('Y-m-d') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Application Modal -->
    <div class="modal fade modern-modal" id="applicationModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="ti ti-send me-2"></i> Application Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ url('ptkformtransactions') }}" id="formApplication">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="questions" value="{{ $jobtitle->questions }}">

                        <div class="table-responsive">
                            <table class="modern-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (json_decode($jobtitle->questions)->pertanyaan as $index => $question)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $question }}</td>
                                            <td>
                                                @if (json_decode($jobtitle->questions)->type[$index] == 'Rating')
                                                    <div class="rating-container">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <input type="radio"
                                                                id="{{ $i }}-stars-{{ $index }}"
                                                                name="jawaban_{{ $index }}"
                                                                value="{{ $i }}">
                                                            <label
                                                                for="{{ $i }}-stars-{{ $index }}">★</label>
                                                        @endfor
                                                    </div>
                                                @else
                                                    <select name="jawaban_{{ $index }}" class="form-select">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <p class="mt-4">Saya, <strong class="text-primary">{{ Auth::user()->name ?? '' }}</strong>,
                            setuju untuk berpartisipasi dalam seluruh proses seleksi sesuai dengan kebijakan perusahaan.</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="ptkform_id" value="{{ $ptkform->id }}">
                        <button type="button" class="modern-btn modern-btn-outline"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="button" id="btnSubmitApplication" class="modern-btn modern-btn-primary">
                            Submit Application
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Approval Modal -->
    <div class="modal fade modern-modal" id="approvalModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="ti ti-check me-2"></i> PTK Approval</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ url('ptkforms/change-status', $ptkform->id) }}">
                    @csrf
                    <div class="modal-body">
                        <p>By filling this, I <strong class="text-primary">{{ Auth::user()->name ?? '' }}</strong> approve
                            this PTK form</p>
                        <div class="mb-3">
                            <label class="form-label">Vacancy Start Date</label>
                            <input type="date" name="date_start" class="form-control" required>
                            <input type="hidden" name="date_end" value="31-12-2099">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="modern-btn modern-btn-outline"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="modern-btn modern-btn-primary">Approve</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('content')
    PT. Indoprima Gemilang
@endsection

@section('addJs')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scroll animation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Add animation to cards when they come into view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.modern-card').forEach(card => {
            observer.observe(card);
        });
    </script>

    <script>
        $("#btnSubmitApplication").on("click", function() {
            $('#btnSubmitApplication').html("Loading...")
            $('#btnSubmitApplication').prop("disabled", true)
            $('#formApplication').submit()
        });
    </script>
@endsection
