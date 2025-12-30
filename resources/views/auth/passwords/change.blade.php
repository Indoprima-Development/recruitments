<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Password - Recruitment Portal</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('package/dist/images/logos/favicon.ico') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('package/dist/css/style.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('package/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

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

        .hover-scale:hover {
            transform: scale(1.02);
        }

        .transition-all {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-modern {
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 20px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.03);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
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
                        <li><a class="dropdown-item rounded-2 py-2 mb-1 active" href="{{ route('password.change') }}"><i
                                    class="ti ti-key me-2"></i> Change Password</a></li>
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
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card-modern overflow-hidden">
                    <div class="bg-primary bg-gradient p-4 text-center">
                        <h4 class="mb-0 text-white fw-bold"><i class="ti ti-lock me-2"></i> Ganti Password</h4>
                        <p class="mb-0 text-white-50 small">Amankan akun Anda dengan password baru</p>
                    </div>
                    <div class="p-4 p-md-5">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.change.update') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="current_password" class="form-label fw-semibold text-dark">Password Saat
                                    Ini</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 rounded-start-3 ps-3">
                                        <i class="ti ti-key text-muted"></i>
                                    </span>
                                    <input id="current_password" type="password"
                                        class="form-control border-start-0 ps-2 @error('current_password') is-invalid @enderror"
                                        name="current_password" required autocomplete="current-password"
                                        placeholder="Masukkan password lama">
                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="new_password" class="form-label fw-semibold text-dark">Password Baru</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 rounded-start-3 ps-3">
                                        <i class="ti ti-lock text-muted"></i>
                                    </span>
                                    <input id="new_password" type="password"
                                        class="form-control border-start-0 ps-2 @error('new_password') is-invalid @enderror"
                                        name="new_password" required autocomplete="new-password"
                                        placeholder="Minimal 8 karakter">
                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-5">
                                <label for="new_password_confirmation"
                                    class="form-label fw-semibold text-dark">Konfirmasi Password Baru</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 rounded-start-3 ps-3">
                                        <i class="ti ti-lock-check text-muted"></i>
                                    </span>
                                    <input id="new_password_confirmation" type="password"
                                        class="form-control border-start-0 ps-2" name="new_password_confirmation"
                                        required autocomplete="new-password" placeholder="Ulangi password baru">
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit"
                                    class="btn btn-primary btn-lg rounded-pill fw-bold shadow-sm hover-scale transition-all">
                                    <i class="ti ti-device-floppy me-2"></i> Simpan Password Baru
                                </button>
                                <a href="{{ url()->previous() }}"
                                    class="btn btn-light btn-lg rounded-pill fw-semibold text-muted hover-bg-light mt-2">
                                    Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <p class="text-muted small">
                        <i class="ti ti-shield-check text-success me-1"></i>
                        Password Anda dilindungi dengan enkripsi yang aman.
                    </p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-5 py-3 border-top border-light-subtle">
            <small class="text-muted">&copy; {{ date('Y') }} PT. Indoprima Gelimang. All rights
                reserved.</small>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('package/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('package/dist/js/sweetalert2@11.js') }}"></script>
</body>

</html>
