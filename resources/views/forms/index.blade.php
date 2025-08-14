@extends('default')

@section('content2')
    <!-- Futuristic Profile Container -->
    <div class="futuristic-profile-container">
        <!-- Glass Profile Card -->
        <div class="glass-profile-card">
            <!-- Profile Header with Gradient -->
            <div class="profile-header-gradient">
                <div class="profile-avatar-hologram">
                    @if ($users->photo != null)
                        <img src="{{ asset($users->photo) }}" alt="Profile" class="avatar-image-glowing">
                    @else
                        <div class="avatar-hologram-placeholder">
                            <i class="ph ph-user"></i>
                        </div>
                    @endif
                    <div class="hologram-effect"></div>
                </div>

                <div class="profile-info-digital">
                    <h1 class="profile-name-neon">{{ $users->name }}</h1>
                    <div class="profile-title-cyber">
                        {{ $ptkformtransactions[0]->ptkform->jobtitle->jobtitle_name ?? '-' }}
                    </div>
                    <div class="profile-contact-tech">
                        <a href="wa.me/{{ $users->no_wa }}" class="contact-link-digital">
                            <i class="ph ph-whatsapp-logo"></i>
                            <span class="digital-text">{{ $users->no_wa }}</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Profile Content with Cyber Elements -->
            <div class="profile-content-grid">
                <!-- CV Section -->
                <div class="cyber-section">
                    <div class="section-icon-cyber">
                        <i class="ph ph-file-text"></i>
                    </div>
                    <div class="section-content-digital">
                        <h3 class="section-title-hud">Curriculum Vitae</h3>
                        @if ($users->cv != null)
                            <a href="{{ url($users->cv) }}" class="download-btn-digital">
                                <span class="btn-text">Download CV</span>
                                <i class="ph ph-download-simple"></i>
                                <span class="digital-border"></span>
                            </a>
                        @else
                            <div class="no-file-alert">
                                <i class="ph ph-warning-circle"></i>
                                <span>No CV uploaded</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Verification Section -->
                <div class="cyber-section">
                    <div class="section-icon-cyber">
                        <i class="ph ph-shield-check"></i>
                    </div>
                    <div class="section-content-digital">
                        <h3 class="section-title-hud">Verification Status</h3>
                        <div class="verified-badge-cyber">
                            <i class="ph ph-check-circle"></i>
                            <span>Verified Account</span>
                            <div class="verification-pulse"></div>
                        </div>
                    </div>
                </div>

                <!-- Export Button -->
                @if (Auth::user()->role == 'ADMIN')
                    <div class="profile-actions-futuristic">
                        <button class="export-btn-cyber" onclick="saveDivAsPDF()">
                            <i class="ph ph-file-pdf"></i>
                            <span>Export Profile</span>
                            <div class="btn-light-effect"></div>
                        </button>
                    </div>
                @endif
            </div>
        </div>

        <!-- Upload Sections with Holographic Effect -->
        <div class="upload-sections-grid">
            <!-- CV Upload -->
            <div class="holographic-upload-card">
                <form method="POST" action="{{ url('datadiris/cv') }}" enctype="multipart/form-data" id="cvForm">
                    @csrf
                    <div class="upload-header-tech">
                        <i class="ph ph-cloud-arrow-up"></i>
                        <h3>Update CV</h3>
                    </div>
                    <div class="upload-body-digital">
                        <label class="file-upload-holographic">
                            <input type="file" name="cv" class="file-input" id="cvInput" accept="application/pdf">
                            <div class="upload-area-futuristic">
                                <i class="ph ph-file-plus"></i>
                                <span>Select file or drag here</span>
                                <small>PDF (Max 2MB)</small>
                                <div class="upload-grid-lines"></div>
                            </div>
                        </label>
                    </div>
                    <button type="submit" class="upload-btn-cyber">
                        Upload CV
                        <div class="btn-cyber-border"></div>
                    </button>
                </form>
            </div>

            <!-- Photo Upload -->
            <div class="holographic-upload-card">
                <form method="POST" action="{{ url('datadiris/photo') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="upload-header-tech">
                        <i class="ph ph-image"></i>
                        <h3>Update Photo</h3>
                    </div>
                    <div class="upload-body-digital">
                        <label class="file-upload-holographic">
                            <input type="file" name="photo" class="file-input" id="photoInput" accept="image/*">
                            <div class="upload-area-futuristic">
                                <i class="ph ph-image-square"></i>
                                <span>Select photo or drag here</span>
                                <small>JPG, PNG, JPEG (Max 1MB)</small>
                                <div class="upload-grid-lines"></div>
                            </div>
                        </label>
                    </div>
                    <button type="submit" class="upload-btn-cyber">
                        Upload Photo
                        <div class="btn-cyber-border"></div>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Futuristic Form Container -->
    <div class="futuristic-form-container">
        @include('forms.headbar')

        <div class="form-body-digital">
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


        </div>
    </div>

    <!-- Futuristic CSS Styles -->
    <style>
        /* Futuristic Color Scheme */
        :root {
            --cyber-blue: #00f0ff;
            --cyber-purple: #7b2dff;
            --cyber-pink: #ff2d75;
            --cyber-dark: #0d0d1a;
            --cyber-dark-2: #1a1a2e;
            --cyber-dark-3: #2a2a4a;
            --cyber-text: #e6e6ff;
            --cyber-text-light: #b8b8ff;
            --cyber-success: #00ff9d;
            --cyber-warning: #ffcc00;
            --cyber-danger: #ff2d5a;
        }

        /* Futuristic Profile Container */
        .futuristic-profile-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            font-family: 'Rajdhani', 'Orbitron', sans-serif;
            color: var(--cyber-text);
            background: var(--cyber-dark);
            position: relative;
            overflow: hidden;
        }

        .futuristic-profile-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 20% 30%, rgba(123, 45, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(0, 240, 255, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        /* Glass Profile Card */
        .glass-profile-card {
            background: rgba(13, 13, 26, 0.7);
            border-radius: 16px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
        }

        /* Profile Header with Gradient */
        .profile-header-gradient {
            display: flex;
            align-items: center;
            padding: 2rem;
            background: linear-gradient(135deg, var(--cyber-purple) 0%, var(--cyber-blue) 100%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
        }

        .profile-header-gradient::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.1) 100%);
            transform: translateX(-100%);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            100% {
                transform: translateX(100%);
            }
        }

        /* Holographic Avatar */
        .profile-avatar-hologram {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 2rem;
            border: 4px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 20px rgba(0, 240, 255, 0.3);
            position: relative;
        }

        .avatar-image-glowing {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(1.1) contrast(1.1);
        }

        .avatar-hologram-placeholder {
            width: 100%;
            height: 100%;
            background: rgba(0, 240, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--cyber-blue);
            font-size: 2.5rem;
        }

        .hologram-effect {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at center, rgba(0, 240, 255, 0.3) 0%, transparent 70%);
            animation: pulse 3s infinite alternate;
        }

        @keyframes pulse {
            0% {
                opacity: 0.3;
            }

            100% {
                opacity: 0.7;
            }
        }

        /* Digital Profile Info */
        .profile-info-digital {
            flex: 1;
        }

        .profile-name-neon {
            font-size: 1.8rem;
            margin: 0 0 0.5rem 0;
            color: var(--cyber-text);
            font-weight: 600;
            text-shadow: 0 0 10px rgba(0, 240, 255, 0.5);
            letter-spacing: 1px;
        }

        .profile-title-cyber {
            font-size: 1.1rem;
            color: var(--cyber-blue);
            margin-bottom: 1rem;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .contact-link-digital {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--cyber-text-light);
            text-decoration: none;
            transition: all 0.3s;
            font-weight: 500;
        }

        .contact-link-digital:hover {
            color: var(--cyber-blue);
            text-shadow: 0 0 8px rgba(0, 240, 255, 0.5);
        }

        .contact-link-digital i {
            font-size: 1.2rem;
            color: var(--cyber-blue);
        }

        .digital-text {
            position: relative;
        }

        .digital-text::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--cyber-blue);
            transition: width 0.3s;
        }

        .contact-link-digital:hover .digital-text::after {
            width: 100%;
        }

        /* Profile Content Grid */
        .profile-content-grid {
            padding: 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        /* Cyber Section */
        .cyber-section {
            display: flex;
            margin-bottom: 0;
            padding: 1.5rem;
            background: rgba(26, 26, 46, 0.5);
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .cyber-section:hover {
            border-color: var(--cyber-blue);
            box-shadow: 0 0 20px rgba(0, 240, 255, 0.1);
            transform: translateY(-3px);
        }

        .cyber-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, var(--cyber-purple), var(--cyber-blue));
        }

        .section-icon-cyber {
            width: 48px;
            height: 48px;
            background: rgba(0, 240, 255, 0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.5rem;
            color: var(--cyber-blue);
            font-size: 1.5rem;
            border: 1px solid rgba(0, 240, 255, 0.2);
        }

        .section-content-digital {
            flex: 1;
        }

        .section-title-hud {
            font-size: 1.1rem;
            margin: 0 0 1rem 0;
            color: var(--cyber-text);
            font-weight: 600;
            letter-spacing: 0.5px;
            position: relative;
            display: inline-block;
        }

        .section-title-hud::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 40px;
            height: 2px;
            background: var(--cyber-blue);
        }

        /* Digital Download Button */
        .download-btn-digital {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.8rem 1.5rem;
            background: rgba(0, 240, 255, 0.1);
            color: var(--cyber-blue);
            border: none;
            border-radius: 6px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .download-btn-digital:hover {
            background: rgba(0, 240, 255, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 240, 255, 0.2);
        }

        .digital-border {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            border: 1px solid var(--cyber-blue);
            border-radius: 6px;
            opacity: 0;
            transition: all 0.3s;
        }

        .download-btn-digital:hover .digital-border {
            opacity: 1;
            animation: borderPulse 2s infinite;
        }

        @keyframes borderPulse {
            0% {
                opacity: 0.5;
            }

            50% {
                opacity: 1;
            }

            100% {
                opacity: 0.5;
            }
        }

        /* No File Alert */
        .no-file-alert {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--cyber-warning);
            font-weight: 500;
        }

        /* Cyber Verification Badge */
        .verified-badge-cyber {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.8rem 1.5rem;
            background: rgba(0, 255, 157, 0.1);
            color: var(--cyber-success);
            border-radius: 6px;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .verification-pulse {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: radial-gradient(circle at center, rgba(0, 255, 157, 0.3) 0%, transparent 70%);
            animation: pulse 2s infinite;
        }

        /* Futuristic Profile Actions */
        .profile-actions-futuristic {
            grid-column: 1 / -1;
            text-align: right;
            margin-top: 1rem;
        }

        .export-btn-cyber {
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
            padding: 1rem 2rem;
            background: rgba(123, 45, 255, 0.1);
            color: var(--cyber-text);
            border: 1px solid var(--cyber-purple);
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .export-btn-cyber:hover {
            background: rgba(123, 45, 255, 0.2);
            box-shadow: 0 0 20px rgba(123, 45, 255, 0.3);
            transform: translateY(-3px);
        }

        .btn-light-effect {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: -100%;
            background: linear-gradient(90deg, transparent, rgba(123, 45, 255, 0.3), transparent);
            transition: all 0.6s;
        }

        .export-btn-cyber:hover .btn-light-effect {
            left: 100%;
        }

        /* Holographic Upload Grid */
        .upload-sections-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .holographic-upload-card {
            background: rgba(13, 13, 26, 0.7);
            border-radius: 16px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(0, 240, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            padding: 1.5rem;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .holographic-upload-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 240, 255, 0.2);
            border-color: var(--cyber-blue);
        }

        .holographic-upload-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at center, rgba(0, 240, 255, 0.05) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            100% {
                transform: rotate(360deg);
            }
        }

        /* Tech Upload Header */
        .upload-header-tech {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .upload-header-tech i {
            font-size: 1.8rem;
            color: var(--cyber-blue);
        }

        .upload-header-tech h3 {
            margin: 0;
            font-size: 1.2rem;
            color: var(--cyber-text);
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        /* Futuristic File Upload */
        .file-upload-holographic {
            display: block;
            cursor: pointer;
            position: relative;
            z-index: 1;
        }

        .upload-area-futuristic {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            border: 2px dashed rgba(0, 240, 255, 0.3);
            border-radius: 8px;
            text-align: center;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .upload-grid-lines {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background:
                linear-gradient(90deg, var(--cyber-dark-3) 1px, transparent 1px),
                linear-gradient(180deg, var(--cyber-dark-3) 1px, transparent 1px);
            background-size: 20px 20px;
            opacity: 0.3;
        }

        .file-upload-holographic:hover .upload-area-futuristic {
            border-color: var(--cyber-blue);
            background: rgba(0, 240, 255, 0.05);
        }

        .upload-area-futuristic i {
            font-size: 2rem;
            color: var(--cyber-blue);
            margin-bottom: 1rem;
        }

        .upload-area-futuristic span {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--cyber-text);
        }

        .upload-area-futuristic small {
            color: var(--cyber-text-light);
            font-size: 0.9rem;
        }

        .file-input {
            display: none;
        }

        /* Cyber Upload Button */
        .upload-btn-cyber {
            display: block;
            width: 100%;
            padding: 0.8rem;
            margin-top: 1.5rem;
            background: rgba(0, 240, 255, 0.1);
            color: var(--cyber-blue);
            border: none;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .upload-btn-cyber:hover {
            background: rgba(0, 240, 255, 0.2);
            box-shadow: 0 0 15px rgba(0, 240, 255, 0.2);
        }

        .btn-cyber-border {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            border: 1px solid var(--cyber-blue);
            border-radius: 6px;
            opacity: 0;
            transition: all 0.3s;
        }

        .upload-btn-cyber:hover .btn-cyber-border {
            opacity: 1;
            animation: borderPulse 2s infinite;
        }

        /* Futuristic Form Container */
        .futuristic-form-container {
            max-width: 1200px;
            margin: 2rem auto;
            background: var(--cyber-dark-2);
            border-radius: 16px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            position: relative;
        }

        .futuristic-form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                linear-gradient(90deg, var(--cyber-dark-3) 1px, transparent 1px),
                linear-gradient(180deg, var(--cyber-dark-3) 1px, transparent 1px);
            background-size: 20px 20px;
            opacity: 0.1;
            pointer-events: none;
        }

        .form-body-digital {
            padding: 2rem;
        }

        /* Cyber Next Button */
        .form-actions-futuristic {
            padding: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: flex-end;
            position: relative;
        }

        .next-btn-cyber {
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
            padding: 1rem 2rem;
            background: rgba(123, 45, 255, 0.2);
            color: var(--cyber-text);
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .next-btn-cyber:hover {
            background: rgba(205, 185, 241, 0.3);
            box-shadow: 0 0 20px rgba(241, 239, 244, 0.3);
            transform: translateX(5px);
        }

        .next-btn-cyber i {
            transition: transform 0.3s;
        }

        .next-btn-cyber:hover i {
            transform: translateX(5px);
        }

        .btn-light-streak {
            position: absolute;
            width: 30px;
            height: 100%;
            top: 0;
            left: -30px;
            background: linear-gradient(90deg, transparent, rgba(123, 45, 255, 0.5), transparent);
            transform: skewX(-20deg);
            transition: all 0.6s;
        }

        .next-btn-cyber:hover .btn-light-streak {
            left: calc(100% + 30px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .profile-header-gradient {
                flex-direction: column;
                text-align: center;
                padding: 2rem 1rem;
            }

            .profile-avatar-hologram {
                margin-right: 0;
                margin-bottom: 1.5rem;
            }

            .cyber-section {
                flex-direction: column;
            }

            .section-icon-cyber {
                margin-right: 0;
                margin-bottom: 1rem;
            }

            .profile-actions-futuristic {
                text-align: center;
            }
        }
    </style>

    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <script>
        function saveDivAsPDF() {
            // Your existing PDF export logic
            console.log("Exporting to PDF...");
            // Implement your PDF export functionality here
        }
    </script>
@endsection


@section('content')
    PT. Indoprima Gemilang
@endsection

@section('addJs')
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script>
        $(document).ready(function() {
            const searchParams = new URLSearchParams(window.location.search);
            var ids = searchParams.get('section')
            $('#pills-' + ids + '-tab').trigger('click');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('cvInput').addEventListener('change', function() {
            const file = this.files[0];
            if (file && file.size > 2 * 1024 * 1024) {
                Swal.fire({
                    icon: 'error',
                    title: 'File terlalu besar!',
                    text: 'Maksimal ukuran file adalah 2 MB.',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Oke, saya ganti'
                });
                this.value = ''; // reset input file
            }
        });

        document.getElementById('photoInput').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                // Cek apakah file bukan image
                if (!file.type.startsWith('image/')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Format tidak valid!',
                        text: 'Hanya boleh mengunggah file gambar.',
                        confirmButtonColor: '#d33'
                    });
                    this.value = '';
                    return;
                }

                // Cek ukuran maksimal 2 MB
                if (file.size > 1 * 1024 * 1024) {
                    Swal.fire({
                        icon: 'error',
                        title: 'File terlalu besar!',
                        text: 'Maksimal ukuran file adalah 1 MB.',
                        confirmButtonColor: '#d33'
                    });
                    this.value = '';
                }
            }
        });
    </script>
@stop
