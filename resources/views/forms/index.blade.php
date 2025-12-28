<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recruitment Profile - PT. Indoprima Gelimang</title>

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

        /* Tab Navigation - Clean Pill Style */
        .user-profile-tab {
            background: white;
            padding: 0.5rem;
            border-radius: 16px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(0, 0, 0, 0.04);
            margin-bottom: 1.5rem;
        }

        .user-profile-tab .nav-link {
            color: #64748b;
            border-radius: 12px !important;
            padding: 0.75rem 1.25rem;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s;
            border: 1px solid transparent;
        }

        .user-profile-tab .nav-link:hover {
            background: #f8fafc;
            color: var(--bs-primary);
        }

        .user-profile-tab .nav-link.active {
            background-color: var(--bs-primary) !important;
            color: white !important;
            box-shadow: 0 4px 12px rgba(var(--bs-primary-rgb), 0.3);
            border-color: var(--bs-primary);
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

        .form-floating>label {
            padding-left: 1rem;
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
                        @if ($users->photo)
                            <img src="{{ asset($users->photo) }}" class="rounded-circle object-fit-cover" width="32"
                                height="32" alt="User">
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
                        <i class="ti ti-sparkles me-1"></i> Selamat Datang, Kandidat!
                    </span>
                    <h2 class="fw-bolder mb-2 text-white display-6">Lengkapi Profil Profesional Anda</h2>
                    <p class="mb-0 text-white-50 fs-5" style="max-width: 600px;">Data yang lengkap dan valid akan
                        meningkatkan peluang Anda untuk melanjutkan ke tahap rekrutmen selanjutnya.</p>
                </div>
                <div class="col-lg-5 text-end d-none d-lg-block">
                    <!-- Decoration Removed for Cleaner Look -->
                </div>
            </div>
        </div>

        <div class="row g-4 d-flex align-items-start">
            <!-- Sidebar -->
            <div class="col-lg-3 sticky-sidebar">
                <div class="card-modern p-4 text-center mb-4 border-top border-4 border-primary">
                    <div class="position-relative d-inline-block mb-3 mt-n5">
                        <div class="p-1 bg-white rounded-circle">
                            @if ($users->photo != null)
                                <img src="{{ asset($users->photo) }}" class="rounded-circle shadow-lg object-fit-cover"
                                    width="120" height="120">
                            @else
                                <div class="rounded-circle bg-primary bg-gradient text-white d-flex align-items-center justify-content-center shadow-lg"
                                    style="width: 120px; height: 120px; font-size: 3rem;">
                                    <i class="ti ti-user"></i>
                                </div>
                            @endif
                        </div>
                        <button
                            class="btn btn-sm btn-dark rounded-circle position-absolute bottom-0 end-0 shadow border border-2 border-white"
                            style="width: 36px; height: 36px;" onclick="document.getElementById('photoInput').click()"
                            title="Ubah Foto">
                            <i class="ti ti-camera"></i>
                        </button>
                    </div>

                    <h5 class="fw-bold text-dark mb-0">{{ $users->name }}</h5>
                    <p class="text-primary fw-medium small mb-4">
                        {{ $ptkformtransactions[0]->ptkform->jobtitle->jobtitle_name ?? 'Applicant' }}</p>

                    <!-- Contact Info -->
                    <div class="bg-light rounded-3 p-3 mb-4 text-start">
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <div class="bg-white p-2 rounded-circle shadow-sm text-primary"><i class="ti ti-mail"></i>
                            </div>
                            <div class="overflow-hidden">
                                <small class="text-muted d-block" style="font-size: 10px; uppercase">EMAIL</small>
                                <span class="fw-bold text-dark text-truncate d-block"
                                    style="font-size: 13px;">{{ $users->email }}</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-white p-2 rounded-circle shadow-sm text-success"><i
                                    class="ti ti-brand-whatsapp"></i></div>
                            <div>
                                <small class="text-muted d-block" style="font-size: 10px; uppercase">WHATSAPP</small>
                                <span class="fw-bold text-dark" style="font-size: 13px;">{{ $users->no_wa }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <form method="POST" action="{{ url('datadiris/photo') }}" enctype="multipart/form-data"
                            id="photoForm" class="d-none">
                            @csrf
                            <input type="file" name="photo" id="photoInput" accept="image/*"
                                onchange="document.getElementById('photoForm').submit()">
                        </form>

                        <button class="btn btn-outline-primary rounded-pill fw-bold btn-sm py-2 hover-bg-light"
                            onclick="document.getElementById('cvInput').click()">
                            <i class="ti ti-file-upload me-2"></i> {{ $users->cv ? 'Perbarui CV' : 'Upload CV' }}
                        </button>
                        <form method="POST" action="{{ url('datadiris/cv') }}" enctype="multipart/form-data"
                            id="cvForm" class="d-none">
                            @csrf
                            <input type="file" name="cv" id="cvInput" accept="application/pdf"
                                onchange="document.getElementById('cvForm').submit()">
                        </form>

                        @if ($users->cv)
                            <a href="{{ url($users->cv) }}" target="_blank"
                                class="btn btn-light rounded-pill fw-bold btn-sm py-2 border text-dark">
                                <i class="ti ti-eye me-2"></i> Lihat CV
                            </a>
                        @endif

                        @if (Auth::user()->role == 'ADMIN')
                            <button class="btn btn-dark rounded-pill btn-sm py-2 mt-2" onclick="saveDivAsPDF()">
                                <i class="ti ti-printer me-2"></i> Export PDF
                            </button>
                        @endif
                    </div>
                </div>

                <!-- Progress/Status -->
                <div class="card-modern p-4">
                    <h6 class="fw-bold mb-3">Status Profil</h6>
                    <div class="d-flex justify-content-between mb-1">
                        <small class="fw-medium text-muted">Kelengkapan</small>
                        <small class="fw-bold text-primary">85%</small>
                    </div>
                    <div class="progress bg-light" style="height: 6px; border-radius: 10px;">
                        <div class="progress-bar bg-primary" role="progressbar"
                            style="width: 85%; border-radius: 10px;" aria-valuenow="85" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                    <div class="mt-3 d-flex gap-2 flex-wrap">
                        <span
                            class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-20">Verified
                            Email</span>
                        <span
                            class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-20">Verified
                            Phone</span>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="col-lg-9">
                <!-- Navigation Tabs -->
                <div class="mb-4">
                    @include('forms.headbar')
                </div>

                <!-- Forms Container -->
                <div class="tab-content" id="pills-tabContent">
                    @include('forms.datadiri')
                    @include('forms.pendidikan')
                    @include('forms.keluarga')
                    @include('forms.pengalaman')
                    @include('forms.kemampuan')
                    @include('forms.organisasi')
                    @include('forms.lain')
                    @include('forms.pernyataan')
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <script>
        // PDF Export
        function saveDivAsPDF() {
            window.print();
        }

        // Logic Global Forms
        var dataProvince = [];
        $(document).ready(function() {
            // Province Fetcher
            if ($('#provinces').length > 0) {
                $.getJSON('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json', function(data) {
                    dataProvince = data;
                    var provincesDropdown = $('#provinces');
                    provincesDropdown.empty();
                    provincesDropdown.append($('<option>', {
                        value: '',
                        text: 'Pilih Provinsi'
                    }));

                    $.each(data, function(index, province) {
                        provincesDropdown.append($('<option>', {
                            value: index,
                            text: province.name
                        }));
                    });

                    // Set selected
                    var currentProv = $('#dataProvince').val();
                    if (currentProv && currentProv !== '-') {
                        const foundIndex = data.findIndex(p => p.name === currentProv);
                        if (foundIndex !== -1) provincesDropdown.val(foundIndex);
                    }
                });
            }

            // City Fetcher
            $('#provinces').change(function() {
                var index = $(this).val();
                if (!index) return;
                var provinceId = dataProvince[index].id;
                $('#dataProvince').val(dataProvince[index].name);

                if (provinceId) {
                    $.getJSON(
                        `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`,
                        function(data) {
                            var citiesDropdown = $('#cities');
                            citiesDropdown.empty();
                            citiesDropdown.append($('<option>', {
                                value: '',
                                text: 'Pilih Kota'
                            }));
                            $.each(data, function(index, city) {
                                citiesDropdown.append($('<option>', {
                                    value: city.name,
                                    text: city.name
                                }));
                            });
                        });
                } else {
                    $('#cities').empty().append($('<option>', {
                        value: '',
                        text: 'Pilih Kota'
                    }));
                }
            });

            // Bootstrap Validation
            (function() {
                'use strict'
                var forms = document.querySelectorAll('.needs-validation')
                Array.prototype.slice.call(forms).forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
            })();
        });

        // Pernyataan Logic (Global Context)
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var preview = document.getElementById('previewImgElement');
                    if (!preview) {
                        var container = document.getElementById('imagePreview');
                        if (container) {
                            preview = document.createElement('img');
                            preview.id = 'previewImgElement';
                            preview.className = 'img-fluid rounded-3 shadow-sm border';
                            preview.style.maxHeight = '200px';
                            container.appendChild(preview);
                        }
                    }
                    if (preview) {
                        preview.src = e.target.result;
                        preview.classList.remove('d-none');
                        var container = document.getElementById('imagePreview');
                        if (container) container.classList.remove('d-none');
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // SweetAlert for Pernyataan
        var btnPernyataan = document.getElementById('btnPernyataan');
        if (btnPernyataan) {
            btnPernyataan.addEventListener('click', function() {
                Swal.fire({
                    title: 'Konfirmasi Pernyataan',
                    text: "Saya menyatakan bahwa data yang saya berikan adalah benar dan sesuai kondisi sebenarnya.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: 'var(--bs-primary)',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Simpan',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('formPernyataan').submit();
                    }
                })
            });
        }
    </script>
</body>

</html>
