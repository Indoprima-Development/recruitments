@extends('default')

@section('content2')
    <div class="elegant-profile-container">
        <!-- Main Profile Card -->
        <div class="profile-card">
            <!-- Profile Header -->
            <div class="profile-header">
                <div class="profile-avatar">
                    @if ($users->photo != null)
                        <img src="{{ asset($users->photo) }}" alt="Profile" class="avatar-image">
                    @else
                        <div class="avatar-placeholder">
                            <i class="ph ph-user"></i>
                        </div>
                    @endif
                </div>

                <div class="profile-info">
                    <h1 class="profile-name">{{ $users->name }}</h1>
                    <div class="profile-title">
                        {{ $ptkformtransactions[0]->ptkform->jobtitle->jobtitle_name ?? '-' }}
                    </div>
                    <div class="profile-contact">
                        <a href="wa.me/{{ $users->no_wa }}" class="contact-link">
                            <i class="ph ph-whatsapp-logo"></i>
                            {{ $users->no_wa }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Profile Content -->
            <div class="profile-content">
                <!-- CV Section -->
                <div class="profile-section">
                    <div class="section-icon">
                        <i class="ph ph-file-text"></i>
                    </div>
                    <div class="section-content">
                        <h3 class="section-title">Curriculum Vitae</h3>
                        @if ($users->cv != null)
                            <a href="{{ url($users->cv) }}" class="download-btn">
                                Download CV
                                <i class="ph ph-download-simple"></i>
                            </a>
                        @else
                            <div class="no-file">
                                <i class="ph ph-warning-circle"></i>
                                No CV uploaded
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Verification Section -->
                <div class="profile-section">
                    <div class="section-icon">
                        <i class="ph ph-shield-check"></i>
                    </div>
                    <div class="section-content">
                        <h3 class="section-title">Verification Status</h3>
                        <div class="verified-badge">
                            <i class="ph ph-check-circle"></i>
                            Verified Account
                        </div>
                    </div>
                </div>

                <!-- Export Button -->
                <div class="profile-actions">
                    <button class="export-btn" onclick="saveDivAsPDF()">
                        <i class="ph ph-file-pdf"></i>
                        Export Profile
                    </button>
                </div>
            </div>
        </div>

        <!-- Upload Sections -->
        <div class="upload-sections">
            <!-- CV Upload -->
            <div class="upload-card">
                <form method="POST" action="{{ url('datadiris/cv') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="upload-header">
                        <i class="ph ph-cloud-arrow-up"></i>
                        <h3>Update CV</h3>
                    </div>
                    <div class="upload-body">
                        <label class="file-upload">
                            <input type="file" name="cv" class="file-input">
                            <div class="upload-area">
                                <i class="ph ph-file-plus"></i>
                                <span>Select file or drag here</span>
                                <small>PDF, DOC, DOCX (Max 5MB)</small>
                            </div>
                        </label>
                    </div>
                    <button type="submit" class="upload-btn">
                        Upload CV
                    </button>
                </form>
            </div>

            <!-- Photo Upload -->
            <div class="upload-card">
                <form method="POST" action="{{ url('datadiris/photo') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="upload-header">
                        <i class="ph ph-image"></i>
                        <h3>Update Photo</h3>
                    </div>
                    <div class="upload-body">
                        <label class="file-upload">
                            <input type="file" name="photo" class="file-input">
                            <div class="upload-area">
                                <i class="ph ph-image-square"></i>
                                <span>Select photo or drag here</span>
                                <small>JPG, PNG (Max 2MB)</small>
                            </div>
                        </label>
                    </div>
                    <button type="submit" class="upload-btn">
                        Upload Photo
                    </button>
                </form>
            </div>
        </div>
    </div>

    <style>
        /* Elegant Color Scheme */
        :root {
            --primary: #4361ee;
            --primary-light: #e6f0ff;
            --secondary: #3a0ca3;
            --text-dark: #2b2d42;
            --text-medium: #4a4a6a;
            --text-light: #6c6c8a;
            --border-color: #e0e0f0;
            --background-light: #f8f9ff;
            --white: #ffffff;
            --success: #4cc9a0;
            --warning: #f8961e;
        }

        /* Base Styles */
        .elegant-profile-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            font-family: 'Segoe UI', system-ui, sans-serif;
            color: var(--text-dark);
        }

        /* Profile Card */
        .profile-card {
            background: var(--white);
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        /* Profile Header */
        .profile-header {
            display: flex;
            align-items: center;
            padding: 2rem;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--white) 100%);
            border-bottom: 1px solid var(--border-color);
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 2rem;
            border: 4px solid var(--white);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .avatar-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .avatar-placeholder {
            width: 100%;
            height: 100%;
            background: var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            font-size: 2.5rem;
        }

        .profile-info {
            flex: 1;
        }

        .profile-name {
            font-size: 1.8rem;
            margin: 0 0 0.5rem 0;
            color: var(--text-dark);
            font-weight: 600;
        }

        .profile-title {
            font-size: 1.1rem;
            color: var(--primary);
            margin-bottom: 1rem;
            font-weight: 500;
        }

        .contact-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-medium);
            text-decoration: none;
            transition: all 0.3s;
        }

        .contact-link:hover {
            color: var(--primary);
        }

        .contact-link i {
            font-size: 1.2rem;
            color: var(--primary);
        }

        /* Profile Content */
        .profile-content {
            padding: 2rem;
        }

        .profile-section {
            display: flex;
            margin-bottom: 2rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid var(--border-color);
        }

        .profile-section:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .section-icon {
            width: 48px;
            height: 48px;
            background: var(--primary-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.5rem;
            color: var(--primary);
            font-size: 1.5rem;
        }

        .section-content {
            flex: 1;
        }

        .section-title {
            font-size: 1.1rem;
            margin: 0 0 1rem 0;
            color: var(--text-dark);
            font-weight: 600;
        }

        .download-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1.2rem;
            background: var(--primary);
            color: var(--white);
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
        }

        .download-btn:hover {
            background: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
        }

        .no-file {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--warning);
            font-weight: 500;
        }

        .verified-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1.2rem;
            background: rgba(76, 201, 160, 0.1);
            color: var(--success);
            border-radius: 6px;
            font-weight: 500;
        }

        /* Profile Actions */
        .profile-actions {
            margin-top: 2rem;
            text-align: right;
        }

        .export-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.8rem 1.5rem;
            background: var(--white);
            color: var(--primary);
            border: 1px solid var(--primary);
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }

        .export-btn:hover {
            background: var(--primary);
            color: var(--white);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
        }

        /* Upload Sections */
        .upload-sections {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .upload-card {
            background: var(--white);
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 1.5rem;
            transition: all 0.3s;
        }

        .upload-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .upload-header {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 1.5rem;
        }

        .upload-header i {
            font-size: 1.8rem;
            color: var(--primary);
        }

        .upload-header h3 {
            margin: 0;
            font-size: 1.2rem;
            color: var(--text-dark);
            font-weight: 600;
        }

        .file-upload {
            display: block;
            cursor: pointer;
        }

        .upload-area {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            border: 2px dashed var(--border-color);
            border-radius: 8px;
            text-align: center;
            transition: all 0.3s;
        }

        .file-upload:hover .upload-area {
            border-color: var(--primary);
            background: var(--primary-light);
        }

        .upload-area i {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .upload-area span {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-dark);
        }

        .upload-area small {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .file-input {
            display: none;
        }

        .upload-btn {
            display: block;
            width: 100%;
            padding: 0.8rem;
            margin-top: 1.5rem;
            background: var(--primary);
            color: var(--white);
            border: none;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }

        .upload-btn:hover {
            background: var(--secondary);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .profile-header {
                flex-direction: column;
                text-align: center;
                padding: 2rem 1rem;
            }

            .profile-avatar {
                margin-right: 0;
                margin-bottom: 1.5rem;
            }

            .profile-section {
                flex-direction: column;
            }

            .section-icon {
                margin-right: 0;
                margin-bottom: 1rem;
            }

            .profile-actions {
                text-align: center;
            }
        }
    </style>

    <style>
        .card-hover-scale {
            transition: transform 0.3s ease;
        }

        .card-hover-scale:hover {
            transform: translateY(-5px);
        }

        .bg-success-gradient {
            background: linear-gradient(135deg, #28a745 0%, #5cb85c 100%);
        }

        .bg-warning-gradient {
            background: linear-gradient(135deg, #ffc107 0%, #f0ad4e 100%);
        }

        .bg-danger-gradient {
            background: linear-gradient(135deg, #dc3545 0%, #d9534f 100%);
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
    <div class="elegant-form-card">
        @include('forms.headbar')

        <div class="form-body">
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

            <div class="form-actions">
                <button class="next-btn">
                    Continue
                    <i class="ph ph-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>

    <style>
        .elegant-form-card {
            background: var(--white);
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .form-body {
            padding: 2rem;
        }

        .form-actions {
            padding: 1.5rem;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
        }

        .next-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.8rem 1.5rem;
            background: var(--primary);
            color: var(--white);
            border: none;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }

        .next-btn:hover {
            background: var(--secondary);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
        }
    </style>
@stop

@section('addJs')
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script>
        $(document).ready(function() {
            const searchParams = new URLSearchParams(window.location.search);
            var ids = searchParams.get('section')
            $('#pills-' + ids + '-tab').trigger('click');
        });
    </script>
@stop
