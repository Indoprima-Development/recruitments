<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - PT. Indoprima Gelimang</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('package/dist/images/logos/favicon.ico') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('package/dist/css/style.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('package/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('package/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Custom Standalone Styles -->
    <style>
        :root {
            --bs-body-font-family: 'Plus Jakarta Sans', sans-serif;
            --bs-body-bg: #f5f7fa;
        }

        body {
            background-color: var(--bs-body-bg);
            background-image: radial-gradient(#e2e8f0 1px, transparent 1px);
            background-size: 24px 24px;
        }

        .main-container {
            max-width: 1320px;
            margin: 0 auto;
        }

        /* Modern Header */
        .app-header {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.03);
            position: sticky;
            top: 0;
            z-index: 1020;
        }

        /* Utilities */
        .object-fit-cover {
            object-fit: cover;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .transition-all {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Interactive Effects */
        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
        }

        .hover-scale:hover {
            transform: scale(1.02);
        }

        .hover-bg-light:hover {
            background-color: #f8f9fa !important;
        }

        /* Modern Cards */
        .card-modern {
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 20px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.03);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-modern:hover {
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.06);
            transform: translateY(-2px);
        }

        /* Sticky Sidebar */
        .sticky-sidebar {
            z-index: 900;
        }

        @media (min-width: 992px) {
            .sticky-sidebar {
                position: sticky;
                top: 100px;
            }
        }

        /* Form Controls */
        .form-control,
        .form-select {
            border-radius: 12px;
            background-color: #fff;
            border: 1px solid #e2e8f0;
            padding: 0.8rem 1rem;
            font-size: 0.95rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--bs-primary);
            box-shadow: 0 0 0 4px rgba(var(--bs-primary-rgb), 0.1);
            background-color: #fff;
        }

        /* Welcome Banner */
        .welcome-banner {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.85) 0%, rgba(15, 23, 42, 0.9) 100%),
                url('https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            border-radius: 24px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .welcome-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 30px 30px;
            opacity: 0.3;
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')

    <!-- Modern Header -->
    <header class="app-header py-3 mb-4">
        <div class="container-xxl d-flex align-items-center justify-content-between">
            <a href="{{ url('/') }}"
                class="d-flex align-items-center gap-2 text-decoration-none hover-scale transition-all">
                <img src="{{ asset('package/dist/images/logos/favicon.ico') }}" width="42" alt="Logo"
                    class="rounded-3">
                <div>
                    <h6 class="fw-bolder text-dark mb-0 ls-tight">Recruitment Portal</h6>
                    <small class="text-muted d-block" style="font-size: 0.75rem;">PT. Indoprima Gelimang</small>
                </div>
            </a>

            <div class="d-flex align-items-center gap-3">
                <div class="dropdown">
                    <button class="btn btn-light rounded-pill border py-1 px-2 d-flex align-items-center gap-2"
                        data-bs-toggle="dropdown">
                        @if (Auth::user()->photo)
                            <img src="{{ asset(Auth::user()->photo) }}" class="rounded-circle object-fit-cover"
                                width="32" height="32" alt="User">
                        @else
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold"
                                style="width: 32px; height: 32px; font-size: 0.8rem;">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        @endif
                        <span
                            class="d-none d-md-block fw-semibold text-dark fs-3 me-1">{{ Str::limit(Auth::user()->name, 15) }}</span>
                        <i class="ti ti-chevron-down text-muted fs-2"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-4 mt-2 p-2"
                        style="width: 200px;">
                        <li>
                            <div class="dropdown-header text-uppercase fs-2 fw-bold text-primary">Account</div>
                        </li>
                        <li><a class="dropdown-item rounded-2 py-2 mb-1" href="{{ url('/') }}"><i
                                    class="ti ti-home me-2"></i> Home</a></li>
                        @if (Auth::user()->role == 'ADMIN')
                            <li><a class="dropdown-item rounded-2 py-2 mb-1" href="{{ url('home') }}"><i
                                        class="ti ti-layout-dashboard me-2"></i> Admin Page</a></li>
                        @endif
                        <li>
                            <hr class="dropdown-divider my-1">
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item rounded-2 py-2 text-danger"><i
                                        class="ti ti-logout me-2"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-container container-xxl pb-5">

        <!-- Welcome Section -->
        <div class="welcome-banner p-4 p-md-5 mb-5 text-white">
            <div class="welcome-pattern"></div>
            <div class="row align-items-center position-relative z-1">
                <div class="col-lg-7">
                    <span
                        class="badge bg-white bg-opacity-10 border border-white border-opacity-20 text-white mb-3 px-3 py-2 rounded-pill">
                        <i class="ti ti-sparkles me-1"></i> Welcome Back, {{ explode(' ', Auth::user()->name)[0] }}!
                    </span>
                    <h2 class="fw-bolder mb-2 text-white display-6">Assessments Dashboard</h2>
                    <p class="mb-0 text-white-50 fs-5" style="max-width: 600px;">Manage your applications and take
                        recruitment tests.</p>
                </div>
                <div class="col-lg-5 text-end d-none d-lg-block">
                    <!-- Decoration Removed -->
                </div>
            </div>
        </div>

        <div class="row g-4 d-flex align-items-start">
            <!-- Sidebar -->
            <div class="col-lg-3 sticky-sidebar">
                <div class="card-modern p-4 text-center mb-4 border-top border-4 border-primary">
                    <div class="position-relative d-inline-block mb-3 mt-n5">
                        <div class="p-1 bg-white rounded-circle">
                            @if (Auth::user()->photo != null)
                                <img src="{{ asset(Auth::user()->photo) }}"
                                    class="rounded-circle shadow-lg object-fit-cover" width="120" height="120">
                            @else
                                <div class="rounded-circle bg-primary bg-gradient text-white d-flex align-items-center justify-content-center shadow-lg"
                                    style="width: 120px; height: 120px; font-size: 3rem;">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <h5 class="fw-bold text-dark mb-0">{{ Auth::user()->name }}</h5>
                    <p class="text-primary fw-medium small mb-4">{{ Auth::user()->email }}</p>

                    <div class="d-grid gap-2">
                        <a href="{{ url('forms') }}"
                            class="btn btn-outline-primary rounded-pill fw-bold btn-sm py-2 hover-bg-light">
                            <i class="ti ti-user-edit me-2"></i> Manage Profile
                        </a>
                    </div>
                </div>

                <!-- Info Card -->
                <div class="card-modern p-4">
                    <h6 class="fw-bold mb-3">Statistics</h6>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small">Available Tests</span>
                        <span class="fw-bold text-dark">{{ count($data['projects']) }}</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="text-muted small">Status</span>
                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill">Active</span>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="col-lg-9">
                <div class="card-modern shadow-sm overflow-hidden">
                    <div
                        class="card-header bg-white border-bottom py-3 px-4 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold">Available Exams</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="ps-4 text-secondary text-uppercase py-3 small fw-bold">Project Name
                                        </th>
                                        <th class="text-secondary text-uppercase py-3 small fw-bold">Status</th>
                                        <th class="text-end pe-4 text-secondary text-uppercase py-3 small fw-bold">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data['projects'] as $d)
                                        <tr>
                                            <td class="ps-4 py-3">
                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="bg-primary bg-opacity-10 text-primary rounded-3 p-2 me-3">
                                                        <i class="ti ti-briefcase fs-5"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0 fw-semibold">{{ $d->project_name }}</h6>
                                                        <small class="text-muted">Recruitment Batch</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3">
                                                <span
                                                    class="badge bg-success bg-opacity-10 text-success px-3 rounded-pill fw-semibold">Open</span>
                                            </td>
                                            <td class="text-end pe-4 py-3">
                                                <button projectId="{{ EncryptData($d->id) }}"
                                                    class="btn btn-primary btn-sm rounded-pill px-4 fw-medium btnConfirm shadow-sm hover-lift">
                                                    Take Test
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center py-5">
                                                <div class="text-muted">
                                                    <i class="ti ti-clipboard-x display-6 mb-3 d-block opacity-25"></i>
                                                    <h6 class="fw-semibold">No Assessments Available</h6>
                                                    <p class="small">There are no active recruitment tests at the
                                                        moment.</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Simple Footer -->
                <div class="text-center mt-5 py-3 border-top border-light-subtle">
                    <small class="text-muted">&copy; {{ date('Y') }} PT. Indoprima Gelimang. All rights
                        reserved.</small>
                </div>
            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('package/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('package/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('package/dist/js/app.horizontal.init.js') }}"></script>
    <script src="{{ asset('package/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('package/dist/js/sweetalert2@11.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".btnConfirm").click(function() {
                let project_id = $(this).attr('projectId')
                Swal.fire({
                    title: "Ready to Start?",
                    text: "You are about to begin the assessment test.",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#2563eb",
                    cancelButtonColor: "#94a3b8",
                    confirmButtonText: "Yes, Start Now",
                    cancelButtonText: "Cancel",
                    customClass: {
                        popup: 'rounded-4 border-0 shadow-lg',
                        confirmButton: 'rounded-pill px-4',
                        cancelButton: 'rounded-pill px-4'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "{{ url('examination') }}/" + project_id
                    }
                });
            });
        });
    </script>
</body>

</html>
