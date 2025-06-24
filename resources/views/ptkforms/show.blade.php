@extends('default')

@section('addCss')
<style>
    :root {
        --neon-blue: #00f7ff;
        --neon-purple: #7b2cbf;
        --cyber-dark: #0a0a1a;
        --cyber-darker: #050510;
        --matrix-green: #00ff41;
        --hacker-pink: #ff009d;
        --cyber-yellow: #f5d742;
        --glass: rgba(255, 255, 255, 0.05);
    }

    body {
        font-family: 'Rajdhani', 'Orbitron', sans-serif;
        background-color: var(--cyber-darker);
        color: #e2e8f0;
        background-image:
            radial-gradient(circle at 15% 50%, rgba(0, 247, 255, 0.05) 0%, transparent 25%),
            radial-gradient(circle at 85% 30%, rgba(123, 44, 191, 0.05) 0%, transparent 25%);
        overflow-x: hidden;
    }

    /* Cyberpunk Header */
    .cyber-header {
        position: relative;
        height: 300px;
        overflow: hidden;
        border-bottom: 2px solid var(--neon-blue);
        box-shadow: 0 0 30px rgba(0, 247, 255, 0.2);
    }

    .cyber-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(0, 247, 255, 0.1), rgba(123, 44, 191, 0.1));
    }

    .header-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: grayscale(50%) contrast(120%);
    }

    .status-badge {
        position: absolute;
        bottom: 20px;
        right: 20px;
        background: rgba(0, 0, 0, 0.7);
        color: var(--neon-blue);
        padding: 8px 16px;
        border-radius: 4px;
        font-family: 'Orbitron', sans-serif;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        border: 1px solid var(--neon-blue);
        box-shadow: 0 0 15px var(--neon-blue);
        text-shadow: 0 0 10px var(--neon-blue);
    }

    /* Cyber Card */
    .cyber-card {
        background: rgba(10, 10, 26, 0.7);
        backdrop-filter: blur(10px);
        border-radius: 8px;
        border: 1px solid var(--neon-blue);
        box-shadow: 0 0 20px rgba(0, 247, 255, 0.1);
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .cyber-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(
            90deg,
            transparent,
            rgba(0, 247, 255, 0.1),
            transparent
        );
        transition: all 0.6s ease;
    }

    .cyber-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 25px rgba(0, 247, 255, 0.3);
    }

    .cyber-card:hover::before {
        left: 100%;
    }

    /* Cyber Title */
    .cyber-title {
        font-family: 'Orbitron', sans-serif;
        font-weight: 700;
        color: var(--neon-blue);
        text-shadow: 0 0 10px var(--neon-blue);
        letter-spacing: 1px;
        position: relative;
        display: inline-block;
    }

    .cyber-title::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 100%;
        height: 2px;
        background: var(--neon-blue);
        box-shadow: 0 0 10px var(--neon-blue);
    }

    /* Cyber Badge */
    .cyber-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 4px;
        font-family: 'Orbitron', sans-serif;
        font-weight: 500;
        letter-spacing: 1px;
        margin-right: 10px;
        margin-bottom: 10px;
        background: rgba(0, 0, 0, 0.5);
        border: 1px solid;
        text-transform: uppercase;
        font-size: 0.8rem;
    }

    /* Cyber Button */
    .cyber-btn {
        position: relative;
        padding: 12px 24px;
        border: none;
        background: rgba(0, 0, 0, 0.5);
        color: var(--neon-blue);
        font-family: 'Orbitron', sans-serif;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        border: 1px solid var(--neon-blue);
        box-shadow: 0 0 15px var(--neon-blue);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .cyber-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(
            90deg,
            transparent,
            rgba(0, 247, 255, 0.3),
            transparent
        );
        transition: all 0.6s ease;
    }

    .cyber-btn:hover {
        background: rgba(0, 247, 255, 0.1);
        color: white;
        text-shadow: 0 0 10px var(--neon-blue);
    }

    .cyber-btn:hover::before {
        left: 100%;
    }

    /* Cyber Table */
    .cyber-table {
        background: rgba(10, 10, 26, 0.5);
        border: 1px solid var(--neon-blue);
    }

    .cyber-table th {
        background: rgba(0, 247, 255, 0.1);
        color: var(--neon-blue);
        font-family: 'Orbitron', sans-serif;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .cyber-table td {
        border-color: rgba(0, 247, 255, 0.2);
    }

    /* Star Rating */
    .cyber-rating {
        direction: rtl;
        display: inline-flex;
    }

    .cyber-rating input[type="radio"] {
        display: none;
    }

    .cyber-rating label {
        font-size: 1.5rem;
        color: #2d3748;
        cursor: pointer;
        text-shadow: 0 0 5px var(--neon-blue);
        transition: all 0.3s ease;
    }

    .cyber-rating input[type="radio"]:checked ~ label,
    .cyber-rating label:hover,
    .cyber-rating label:hover ~ label {
        color: var(--cyber-yellow);
        text-shadow: 0 0 10px var(--cyber-yellow);
    }

    /* Cyber Modal */
    .cyber-modal .modal-content {
        background: var(--cyber-dark);
        border: 1px solid var(--neon-blue);
        box-shadow: 0 0 30px var(--neon-blue);
    }

    .cyber-modal .modal-header {
        border-bottom: 1px solid var(--neon-blue);
    }

    .cyber-modal .modal-title {
        color: var(--neon-blue);
        font-family: 'Orbitron', sans-serif;
        letter-spacing: 2px;
    }

    /* Signature Section */
    .signature-section {
        border-top: 1px dashed var(--neon-blue);
        margin-top: 3rem;
        padding-top: 2rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .cyber-header {
            height: 200px;
        }

        .cyber-title {
            font-size: 1.5rem;
        }
    }

    /* Animation */
    @keyframes scanline {
        0% { transform: translateY(-100%); }
        100% { transform: translateY(100%); }
    }

    .scanlines {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(
            to bottom,
            transparent 50%,
            rgba(0, 247, 255, 0.05) 51%
        );
        background-size: 100% 4px;
        pointer-events: none;
        z-index: 9999;
        animation: scanline 4s linear infinite;
    }
</style>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&family=Rajdhani:wght@400;500;700&display=swap" rel="stylesheet">
@endsection

@section('content2')
<div class="scanlines"></div>

<div class="container-fluid py-4">
    <!-- Cyber Header -->
    <div class="cyber-header mb-5">
        <img src="{{ asset('photo/header.png') }}" class="header-image" alt="Cyber Header">
        <span class="status-badge">
            {{ $ptkform->status == 0 ? 'CLOSED' : 'OPEN' }}
        </span>
    </div>

    <!-- Main Content -->
    <div class="row">
        <div class="col-lg-8">
            <!-- Job Title Card -->
            <div class="cyber-card p-4 mb-4">
                <div class="d-flex flex-wrap mb-3">
                    <span class="cyber-badge" style="border-color: var(--neon-blue); color: var(--neon-blue);">
                        {{ $ptkform->division->division_name ?? '-' }}
                    </span>
                    <span class="cyber-badge" style="border-color: var(--neon-purple); color: var(--neon-purple);">
                        {{ $ptkform->department->department_name ?? '-' }}
                    </span>
                    <span class="cyber-badge" style="border-color: var(--matrix-green); color: var(--matrix-green);">
                        {{ $ptkform->section->section_name ?? '-' }}
                    </span>
                </div>

                <h1 class="cyber-title mb-4">{{ $ptkform->jobtitle->jobtitle_name ?? '-' }}</h1>

                <div class="d-flex align-items-center flex-wrap gap-3">
                    <span class="d-flex align-items-center gap-2">
                        <i class="ti ti-calendar fs-5" style="color: var(--neon-blue);"></i>
                        <strong>START DATE:</strong> {{ $ptkform->date_startwork }}
                    </span>

                    @if (Auth::check())
                    <div class="ms-auto d-flex gap-3">
                        @if (Auth::user()->role == 'Admin')
                        <button type="button" class="cyber-btn" data-bs-toggle="modal" data-bs-target="#approvalModal">
                            <i class="ti ti-check me-2"></i> APPROVE
                        </button>
                        @endif

                        @if (!$isApplied)
                        <button type="button" class="cyber-btn" style="border-color: var(--matrix-green); color: var(--matrix-green); box-shadow: 0 0 15px var(--matrix-green);"
                            data-bs-toggle="modal" data-bs-target="#applicationModal">
                            <i class="ti ti-send me-2"></i> APPLY
                        </button>
                        @else
                        <button type="button" class="cyber-btn" style="border-color: var(--hacker-pink); color: var(--hacker-pink); box-shadow: 0 0 15px var(--hacker-pink);" disabled>
                            <i class="ti ti-check me-2"></i> APPLIED
                        </button>
                        @endif
                    </div>
                    @endif
                </div>
            </div>

            <!-- Job Description Card -->
            <div class="cyber-card p-4 mb-4">
                <h3 class="cyber-title mb-4"><i class="ti ti-notebook me-2"></i> JOB SPECIFICATION</h3>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <h5 class="text-uppercase" style="color: var(--neon-blue);">DIRECT SUPERIOR</h5>
                        <p>{{ $ptkform->direct_superior }}</p>
                    </div>

                    <div class="col-md-6 mb-4">
                        <h5 class="text-uppercase" style="color: var(--neon-blue);">DIRECT SUBORDINATES</h5>
                        <p>{{ $ptkform->direct_junior }}</p>
                    </div>

                    <div class="col-12 mb-4">
                        <h5 class="text-uppercase" style="color: var(--neon-blue);">RESPONSIBILITIES</h5>
                        {!! $ptkform->responsibility !!}
                    </div>

                    <div class="col-12">
                        <h5 class="text-uppercase" style="color: var(--neon-blue);">REQUEST BASIS</h5>
                        <p>{{ $ptkform->request_basis }}</p>

                        <h5 class="text-uppercase mt-3" style="color: var(--neon-blue);">REQUEST PURPOSE</h5>
                        <p>{{ $ptkform->request_basis_for }}</p>

                        <h5 class="text-uppercase mt-3" style="color: var(--neon-blue);">ADDITIONAL INFO</h5>
                        {!! $ptkform->general_others !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Requirements Card -->
            <div class="cyber-card p-4 h-100">
                <h3 class="cyber-title mb-4"><i class="ti ti-checklist me-2"></i> REQUIREMENTS</h3>

                <div class="mb-4">
                    <h5 class="text-uppercase" style="color: var(--neon-blue);">GENDER</h5>
                    <p>
                        @if ($ptkform->gender == 0)
                            MALE/FEMALE
                        @elseif($ptkform->gender == 1)
                            MALE
                        @else
                            FEMALE
                        @endif
                    </p>
                </div>

                <div class="mb-4">
                    <h5 class="text-uppercase" style="color: var(--neon-blue);">EDUCATION</h5>
                    <p>{{ $ptkform->education->education_name }}</p>
                </div>

                <div class="mb-4">
                    <h5 class="text-uppercase" style="color: var(--neon-blue);">MAJOR</h5>
                    <p>{{ $ptkform->major->major_name }}</p>
                </div>

                <div class="mb-4">
                    <h5 class="text-uppercase" style="color: var(--neon-blue);">EXPERIENCE</h5>
                    {!! $ptkform->responsibility !!}
                </div>

                <div class="mb-4">
                    <h5 class="text-uppercase" style="color: var(--neon-blue);">SPECIAL CONDITIONS</h5>
                    {!! $ptkform->special_conditions !!}
                </div>
            </div>
        </div>
    </div>

    @if (Auth::check() && Auth::user()->role == 'Admin')
    <!-- Signature Section -->
    <div class="cyber-card p-4 mt-4">
        <div class="row">
            <div class="col-12 mb-3">
                <p class="text-uppercase">Surabaya, {{ date('d M Y') }}</p>
            </div>

            <div class="col-md-6 mb-4">
                <h5 class="text-uppercase mb-4" style="color: var(--neon-blue);">APPROVED BY</h5>
                <div style="height: 1px; background: var(--neon-blue); margin: 2rem 0;"></div>
                <h5 class="text-uppercase" style="color: var(--neon-blue);">PM/GM</h5>
                <p class="text-muted">{{ date('Y-m-d') }}</p>
            </div>

            <div class="col-md-6 mb-4">
                <h5 class="text-uppercase mb-4" style="color: var(--neon-blue);">APPROVED BY</h5>
                <div style="height: 1px; background: var(--neon-blue); margin: 2rem 0;"></div>
                <h5 class="text-uppercase" style="color: var(--neon-blue);">DIRECTOR</h5>
                <p class="text-muted">{{ date('Y-m-d') }}</p>
            </div>
        </div>
    </div>
    @endif
</div>

<!-- Application Modal -->
<div class="modal fade cyber-modal" id="applicationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="ti ti-send me-2"></i> APPLICATION FORM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ url('ptkformtransactions') }}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="questions" value="{{ $jobtitle->questions }}">

                    <div class="table-responsive">
                        <table class="table cyber-table">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>QUESTION</th>
                                    <th>ANSWER</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (json_decode($jobtitle->questions)->pertanyaan as $index => $question)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $question }}</td>
                                    <td>
                                        @if (json_decode($jobtitle->questions)->type[$index] == 'Rating')
                                        <div class="cyber-rating">
                                            @for ($i = 5; $i >= 1; $i--)
                                            <input type="radio" id="{{ $i }}-stars-{{ $index }}"
                                                   name="jawaban_{{ $index }}" value="{{ $i }}">
                                            <label for="{{ $i }}-stars-{{ $index }}">★</label>
                                            @endfor
                                        </div>
                                        @else
                                        <select name="jawaban_{{ $index }}" class="form-select bg-dark text-light border-secondary">
                                            <option value="Yes">YES</option>
                                            <option value="No">NO</option>
                                        </select>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <p class="mt-4">I, <strong style="color: var(--neon-blue);">{{ Auth::user()->name ?? '' }}</strong>, AGREE TO PARTICIPATE IN THE ENTIRE SELECTION PROCESS ACCORDING TO COMPANY POLICY.</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="ptkform_id" value="{{ $ptkform->id }}">
                    <button type="button" class="cyber-btn" data-bs-dismiss="modal">CANCEL</button>
                    <button type="submit" class="cyber-btn" style="border-color: var(--matrix-green); color: var(--matrix-green); box-shadow: 0 0 15px var(--matrix-green);">
                        SUBMIT
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Approval Modal -->
<div class="modal fade cyber-modal" id="approvalModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="ti ti-check me-2"></i> PTK APPROVAL</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ url('ptkforms/change-status', $ptkform->id) }}">
                @csrf
                <div class="modal-body">
                    <p>BY FILLING THIS, I <strong style="color: var(--neon-blue);">{{ Auth::user()->name ?? '' }}</strong> APPROVE THIS PTK FORM</p>
                    <div class="mb-3">
                        <label class="form-label">VACANCY START DATE</label>
                        <input type="date" name="date_start" class="form-control bg-dark text-light border-secondary" required>
                        <input type="hidden" name="date_end" value="31-12-2099">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="cyber-btn" data-bs-dismiss="modal">CANCEL</button>
                    <button type="submit" class="cyber-btn">APPROVE</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('addJs')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Add glitch effect randomly
    function glitchEffect() {
        const elements = document.querySelectorAll('.cyber-title, .cyber-btn');
        elements.forEach(el => {
            if (Math.random() > 0.9) {
                el.style.textShadow = `0 0 10px ${Math.random() > 0.5 ? 'var(--neon-blue)' : 'var(--hacker-pink)'}`;
                setTimeout(() => {
                    el.style.textShadow = '';
                }, 100);
            }
        });
    }

    setInterval(glitchEffect, 3000);

    // Add terminal typing effect
    const cyberTitles = document.querySelectorAll('.cyber-title');
    cyberTitles.forEach(title => {
        const text = title.innerText;
        title.innerHTML = '';

        let i = 0;
        const typing = setInterval(() => {
            if (i < text.length) {
                title.innerHTML += text.charAt(i);
                i++;
            } else {
                clearInterval(typing);
            }
        }, 50);
    });
</script>
@endsection
