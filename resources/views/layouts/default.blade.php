<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recruitment - PT. Indoprima Gemilang</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('package/dist/images/logos/favicon.ico') }}" />

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('package/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link id="themeColors" rel="stylesheet" href="{{ asset('package/dist/css/style.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('package/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">

    <style>
        :root {
            --bs-body-bg: #f5f7fa;
            --bs-body-font-family: 'Inter', sans-serif;
            --bs-primary: #3a7bd5;
            --bs-secondary: #00d2ff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bs-body-bg);
            background-image: radial-gradient(#e2e8f0 1px, transparent 1px);
            background-size: 24px 24px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
        }

        /* Glassmorphism */
        .glass-effect {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        /* Modern Card */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s, box-shadow 0.2s;
            background: rgba(255, 255, 255, 0.9);
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: transparent;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
        }

        .left-sidebar {
            background: white;
            border-right: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.02);
            z-index: 1040;
        }

        .sidebar-nav .sidebar-link {
            border-radius: 12px;
            margin-bottom: 5px;
            padding: 12px 16px;
            font-weight: 500;
            color: #5a6a85;
            transition: all 0.3s ease;
        }

        .sidebar-nav .sidebar-link:hover,
        .sidebar-nav .sidebar-link.active {
            background: linear-gradient(135deg, rgba(58, 123, 213, 0.1) 0%, rgba(0, 210, 255, 0.1) 100%);
            color: #3a7bd5;
        }

        .sidebar-nav .sidebar-link i {
            font-size: 1.25rem;
            margin-right: 10px;
        }

        /* Content Area */
        .body-wrapper {
            background: transparent;
            min-height: 100vh;
            padding-top: 80px;
            /* Space for fixed header */
        }

        /* Table Modernization */
        .table thead th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            background-color: #f8fafc;
            color: #64748b;
            border-bottom: 1px solid #e2e8f0;
        }

        .table tbody td {
            vertical-align: middle;
            font-size: 0.9rem;
            border-bottom: 1px solid #f1f5f9;
        }

        /* Buttons */
        .btn {
            border-radius: 8px;
            font-weight: 600;
            padding: 8px 16px;
            transition: all 0.2s;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3a7bd5 0%, #00d2ff 100%);
            border: none;
            box-shadow: 0 4px 6px rgba(58, 123, 213, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 10px rgba(58, 123, 213, 0.4);
        }

        /* Badges */
        .badge {
            border-radius: 6px;
            padding: 6px 10px;
            font-weight: 600;
            font-size: 0.75rem;
        }
    </style>

    @yield('addCss')
</head>

<body>
    @include('sweetalert::alert')

    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('package/dist/images/logos/favicon.ico') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>

    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <!-- Sidebar -->
        @include('layouts.parts.sidebar')

        <!-- Main Content -->
        <div class="body-wrapper">
            <!-- Header -->
            @include('layouts.parts.headbar')

            <div class="container-fluid pt-4">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-4 rounded-3 border-0 shadow-sm"
                        role="alert">
                        <div class="d-flex align-items-center">
                            <i class="ti ti-circle-check fs-5 me-2"></i>
                            <strong>Success!</strong> &nbsp; {{ session('success') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content2')

                @hasSection('content')
                    <section class="datatables">
                        <div class="card @yield('cardClass')">
                            <div class="card-body p-4">
                                <div class="table-responsive">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </section>
                @endif

                <!-- Footer -->
                <div class="py-6 px-6 text-center">
                    <p class="mb-0 fs-2 text-muted">© {{ date('Y') }} PT. Indoprima Gemilang. All rights reserved.
                    </p>
                </div>
            </div>
        </div>

    </div>

    <!-- Mobile Navigation (if needed) -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="mobilenavbar"
        aria-labelledby="offcanvasWithBothOptionsLabel">
        <!-- Re-use sidebar navigation here or include a mobile part -->
        <nav class="sidebar-nav scroll-sidebar">
            <div class="offcanvas-header justify-content-between">
                <img src="{{ asset('package/dist/images/logos/favicon.ico') }}" alt="" class="img-fluid">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body profile-dropdown mobile-navbar" data-simplebar>
                <!-- Content similar to sidebar -->
            </div>
        </nav>
    </div>

    <!-- Modals -->
    @yield('modals')

    <!-- Scripts -->
    <script src="{{ asset('package/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('package/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('package/dist/js/app.init.js') }}"></script>
    <script src="{{ asset('package/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('package/dist/js/custom.js') }}"></script>

    <script src="{{ asset('package/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('package/dist/js/sweetalert2@11.js') }}"></script>

    @yield('addJs')
</body>

</html>
