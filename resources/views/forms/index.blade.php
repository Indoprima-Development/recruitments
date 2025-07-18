@extends('default')

@section('content2')
    <div class="cyber-profile-container">
        <!-- Main Profile Card with Holographic Effect -->
        <div class="cyber-card">
            <!-- Holographic Header -->
            <div class="holographic-header">
                <div class="scanline"></div>
                <div class="grid-overlay"></div>
                <div class="energy-pulse"></div>
            </div>

            <!-- Profile Core -->
            <div class="profile-core">
                <!-- Avatar Hexagon -->
                <div class="avatar-holo-container">
                    <div class="hexagon-wrapper">
                        @if ($users->photo != null)
                            <img src="{{ asset($users->photo) }}" alt="Profile" class="holo-avatar">
                        @else
                            <div class="avatar-placeholder">
                                <i class="ph ph-user"></i>
                            </div>
                        @endif
                    </div>
                    <div class="hexagon-glow"></div>
                    <div class="particle-ring"></div>
                </div>

                <!-- Identity Section -->
                <div class="identity-section">
                    <h1 class="cyber-name">{{ $users->name }}</h1>
                    <div class="cyber-id">
                        <span class="id-label">ID:</span>
                        <span class="id-number">{{ substr(md5($users->id), 0, 8) }}</span>
                    </div>

                    <div class="contact-beam">
                        <a href="wa.me/{{ $users->no_wa }}" class="comms-link">
                            <i class="ph ph-chat-centered-dots-fill"></i>
                            <span>Direct Comms</span>
                            <div class="link-trail"></div>
                        </a>
                    </div>
                </div>

                <!-- Data Grid -->
                <div class="data-matrix">
                    <!-- CV Module -->
                    <div class="data-module cv-module">
                        <div class="module-icon">
                            <i class="ph ph-file-text"></i>
                        </div>
                        <div class="module-content">
                            <div class="module-label">CV DATABASE</div>
                            @if ($users->cv != null)
                                <a href="{{ url($users->cv) }}" class="download-beam">
                                    <span class="beam-light"></span>
                                    <span class="beam-text">DOWNLOAD</span>
                                </a>
                            @else
                                <div class="missing-data">
                                    <i class="ph ph-warning"></i>
                                    NO FILE DETECTED
                                </div>
                            @endif
                        </div>
                        <div class="module-glow"></div>
                    </div>

                    <!-- Position Module -->
                    <div class="data-module position-module">
                        <div class="module-icon">
                            <i class="ph ph-badge-check"></i>
                        </div>
                        <div class="module-content">
                            <div class="module-label">CURRENT POSITION</div>
                            <div class="position-value">
                                {{ $ptkformtransactions[0]->ptkform->jobtitle->jobtitle_name ?? '-' }}
                            </div>
                        </div>
                        <div class="status-indicator active"></div>
                    </div>

                    <!-- Verification Module -->
                    <div class="data-module verify-module">
                        <div class="module-icon">
                            <i class="ph ph-shield-check"></i>
                        </div>
                        <div class="module-content">
                            <div class="module-label">VERIFICATION STATUS</div>
                            <div class="verification-badge">
                                <span>IDENTITY CONFIRMED</span>
                                <div class="verification-pulse"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Terminal -->
            <div class="action-terminal">
                <button class="cyber-download" onclick="saveDivAsPDF()">
                    <span class="cyber-text">EXPORT PROFILE</span>
                    <span class="cyber-glitch">EXPORT PROFILE</span>
                    <span class="cyber-tag">SECURE</span>
                </button>
            </div>
        </div>

        <!-- Upload Panels -->
        <div class="upload-array">
            <!-- CV Upload -->
            <div class="upload-panel">
                <form method="POST" action="{{ url('datadiris/cv') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="panel-header">
                        <div class="panel-icon">
                            <i class="ph ph-cloud-arrow-up"></i>
                        </div>
                        <h3>CV UPDATE PROTOCOL</h3>
                    </div>
                    <div class="panel-body">
                        <label class="holographic-upload">
                            <input type="file" name="cv" class="upload-input">
                            <div class="upload-visual">
                                <div class="upload-preview">
                                    <i class="ph ph-file"></i>
                                    <span>SELECT FILE</span>
                                </div>
                                <div class="upload-progress"></div>
                            </div>
                        </label>
                    </div>
                    <button type="submit" class="upload-execute">
                        <span class="execute-text">INITIATE UPLOAD</span>
                        <div class="execute-beam"></div>
                    </button>
                </form>
            </div>

            <!-- Photo Upload -->
            <div class="upload-panel">
                <form method="POST" action="{{ url('datadiris/photo') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="panel-header">
                        <div class="panel-icon">
                            <i class="ph ph-image"></i>
                        </div>
                        <h3>IMAGE CAPTURE</h3>
                    </div>
                    <div class="panel-body">
                        <label class="holographic-upload">
                            <input type="file" name="photo" class="upload-input">
                            <div class="upload-visual">
                                <div class="upload-preview">
                                    <i class="ph ph-camera"></i>
                                    <span>CAPTURE IMAGE</span>
                                </div>
                                <div class="upload-progress"></div>
                            </div>
                        </label>
                    </div>
                    <button type="submit" class="upload-execute">
                        <span class="execute-text">INITIATE UPLOAD</span>
                        <div class="execute-beam"></div>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <style>
        /* Cyberpunk Color Scheme */
        :root {
            --neon-blue: #00f0ff;
            --neon-pink: #ff00e4;
            --matrix-green: #00ff41;
            --cyber-purple: #9d00ff;
            --dark-core: #0a0a1a;
            --dark-surface: #12122b;
            --dark-edge: #1e1e3a;
            --light-text: rgba(255, 255, 255, 0.9);
            --light-muted: rgba(255, 255, 255, 0.6);
            --glass-layer: rgba(255, 255, 255, 0.05);
            --glass-edge: rgba(255, 255, 255, 0.1);
        }

        /* Cyberpunk Font */
        @font-face {
            font-family: 'Cyber';
            src: url('https://assets.codepen.io/605876/Blender-Pro-Bold.otf');
            font-display: swap;
        }

        /* Base Container */
        .cyber-profile-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            font-family: 'Segoe UI', system-ui, sans-serif;
            color: var(--light-text);
        }

        /* Main Cyber Card */
        .cyber-card {
            background: var(--dark-surface);
            border-radius: 16px;
            border: 1px solid var(--glass-edge);
            box-shadow: 0 0 30px rgba(0, 240, 255, 0.1);
            overflow: hidden;
            position: relative;
            margin-bottom: 2rem;
        }

        /* Holographic Header */
        .holographic-header {
            height: 150px;
            background: linear-gradient(135deg, var(--neon-blue) 0%, var(--cyber-purple) 100%);
            position: relative;
            overflow: hidden;
        }

        .scanline {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: repeating-linear-gradient(
                0deg,
                rgba(0, 0, 0, 0.1),
                rgba(0, 0, 0, 0.1) 1px,
                transparent 1px,
                transparent 2px
            );
            animation: scan 3s linear infinite;
        }

        .grid-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image:
                linear-gradient(rgba(0, 240, 255, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 240, 255, 0.1) 1px, transparent 1px);
            background-size: 20px 20px;
        }

        .energy-pulse {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--neon-blue);
            box-shadow: 0 0 10px var(--neon-blue);
            animation: pulse 3s ease-in-out infinite;
        }

        @keyframes scan {
            from { transform: translateY(-100%); }
            to { transform: translateY(100%); }
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.5; width: 0%; left: 50%; }
            50% { opacity: 1; width: 100%; left: 0%; }
        }

        /* Profile Core */
        .profile-core {
            display: flex;
            flex-wrap: wrap;
            padding: 2rem;
            position: relative;
            z-index: 2;
        }

        /* Avatar Hexagon */
        .avatar-holo-container {
            position: relative;
            width: 180px;
            margin-right: 2rem;
            margin-top: -80px;
            z-index: 3;
        }

        .hexagon-wrapper {
            width: 100%;
            height: 180px;
            clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
            background: linear-gradient(135deg, var(--neon-blue) 0%, var(--cyber-purple) 100%);
            padding: 6px;
        }

        .holo-avatar {
            width: 100%;
            height: 100%;
            object-fit: cover;
            clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
            filter: brightness(1.1) contrast(1.1);
        }

        .avatar-placeholder {
            width: 100%;
            height: 100%;
            background: var(--dark-core);
            clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--light-muted);
            font-size: 3rem;
        }

        .hexagon-glow {
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            background: linear-gradient(135deg, var(--neon-blue) 0%, var(--cyber-purple) 100%);
            clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
            z-index: -1;
            opacity: 0.3;
            filter: blur(10px);
            animation: glowPulse 4s ease-in-out infinite;
        }

        .particle-ring {
            position: absolute;
            top: -20px;
            left: -20px;
            right: -20px;
            bottom: -20px;
            border: 2px solid transparent;
            border-top-color: var(--neon-blue);
            border-bottom-color: var(--cyber-purple);
            border-radius: 50%;
            z-index: -2;
            animation: spin 8s linear infinite;
        }

        @keyframes glowPulse {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 0.6; }
        }

        @keyframes spin {
            100% { transform: rotate(360deg); }
        }

        /* Identity Section */
        .identity-section {
            flex: 1;
            min-width: 300px;
            margin-bottom: 2rem;
        }

        .cyber-name {
            font-size: 2.2rem;
            margin: 0 0 0.5rem 0;
            background: linear-gradient(90deg, var(--neon-blue) 0%, var(--light-text) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .cyber-id {
            display: inline-block;
            background: rgba(0, 0, 0, 0.3);
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            border: 1px solid var(--glass-edge);
        }

        .id-label {
            color: var(--neon-blue);
            margin-right: 0.5rem;
        }

        .id-number {
            font-family: monospace;
            letter-spacing: 1px;
        }

        .contact-beam {
            margin-top: 1.5rem;
        }

        .comms-link {
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.8rem 1.5rem;
            background: rgba(0, 240, 255, 0.1);
            border: 1px solid var(--neon-blue);
            border-radius: 8px;
            color: var(--light-text);
            text-decoration: none;
            font-weight: 600;
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
        }

        .comms-link:hover {
            background: rgba(0, 240, 255, 0.2);
            box-shadow: 0 0 15px rgba(0, 240, 255, 0.3);
        }

        .comms-link i {
            font-size: 1.2rem;
            color: var(--neon-blue);
        }

        .link-trail {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 240, 255, 0.3), transparent);
            transform: translateX(-100%);
            transition: transform 0.3s;
        }

        .comms-link:hover .link-trail {
            transform: translateX(100%);
        }

        /* Data Matrix */
        .data-matrix {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            width: 100%;
        }

        .data-module {
            background: rgba(10, 10, 30, 0.5);
            border: 1px solid var(--glass-edge);
            border-radius: 12px;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
        }

        .data-module:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 240, 255, 0.2);
            border-color: var(--neon-blue);
        }

        .module-icon {
            font-size: 1.8rem;
            color: var(--neon-blue);
            margin-bottom: 1rem;
        }

        .module-label {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--light-muted);
            margin-bottom: 0.5rem;
        }

        .download-beam {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            background: rgba(0, 240, 255, 0.1);
            border: 1px solid var(--neon-blue);
            border-radius: 6px;
            color: var(--light-text);
            text-decoration: none;
            font-weight: 600;
            position: relative;
            overflow: hidden;
        }

        .beam-light {
            width: 10px;
            height: 10px;
            background: var(--neon-blue);
            border-radius: 50%;
            margin-right: 0.8rem;
            box-shadow: 0 0 10px var(--neon-blue);
            animation: beamPulse 1.5s infinite;
        }

        .missing-data {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--neon-pink);
            font-weight: 600;
        }

        .position-value {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--light-text);
            position: relative;
            display: inline-block;
        }

        .position-value::after {
            content: "";
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--neon-blue);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s;
        }

        .data-module:hover .position-value::after {
            transform: scaleX(1);
        }

        .status-indicator {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--matrix-green);
            box-shadow: 0 0 10px var(--matrix-green);
        }

        .status-indicator.active {
            animation: statusPulse 2s infinite;
        }

        .verification-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            background: rgba(0, 255, 65, 0.1);
            border: 1px solid var(--matrix-green);
            border-radius: 20px;
            color: var(--matrix-green);
            font-weight: 600;
            font-size: 0.9rem;
            position: relative;
            overflow: hidden;
        }

        .verification-pulse {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 255, 65, 0.2);
            border-radius: 20px;
            z-index: -1;
            animation: pulse 2s infinite;
        }

        .module-glow {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 240, 255, 0.05) 0%, transparent 100%);
            z-index: -1;
        }

        @keyframes beamPulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }

        @keyframes statusPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }

        /* Action Terminal */
        .action-terminal {
            padding: 1.5rem;
            border-top: 1px solid var(--glass-edge);
            background: rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: flex-end;
        }

        .cyber-download {
            --primary-hover: var(--neon-blue);
            --secondary-hover: var(--neon-pink);
            position: relative;
            padding: 0.8rem 2rem;
            color: var(--light-text);
            background: transparent;
            border: none;
            outline: 1px solid var(--neon-blue);
            outline-offset: 3px;
            font-family: 'Cyber', sans-serif;
            text-transform: uppercase;
            letter-spacing: 2px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.5s;
        }

        .cyber-download:hover {
            color: var(--dark-core);
            background: var(--neon-blue);
            outline-color: transparent;
            box-shadow: 0 0 10px var(--neon-blue),
                        0 0 20px var(--neon-blue);
        }

        .cyber-text {
            position: relative;
            z-index: 1;
        }

        .cyber-glitch {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(90deg,
                    transparent 45%,
                    var(--primary-hover) 49%,
                    var(--secondary-hover) 51%,
                    transparent 55%);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .cyber-download:hover .cyber-glitch {
            opacity: 0.7;
            animation: glitch 0.3s infinite;
        }

        .cyber-tag {
            position: absolute;
            right: 10px;
            bottom: 5px;
            font-size: 0.7rem;
            color: var(--neon-blue);
        }

        @keyframes glitch {
            0% { transform: translateX(-5px); }
            20% { transform: translateX(5px); }
            40% { transform: translateX(-5px); }
            60% { transform: translateX(5px); }
            80% { transform: translateX(-5px); }
            100% { transform: translateX(0); }
        }

        /* Upload Array */
        .upload-array {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .upload-panel {
            background: var(--dark-surface);
            border: 1px solid var(--glass-edge);
            border-radius: 12px;
            padding: 1.5rem;
            transition: all 0.3s;
        }

        .upload-panel:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 240, 255, 0.2);
            border-color: var(--neon-blue);
        }

        .panel-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .panel-icon {
            font-size: 1.8rem;
            color: var(--neon-blue);
        }

        .upload-panel h3 {
            margin: 0;
            font-size: 1.2rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            background: linear-gradient(90deg, var(--neon-blue) 0%, var(--light-text) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* Holographic Upload */
        .holographic-upload {
            display: block;
            position: relative;
            width: 100%;
            height: 150px;
            margin-bottom: 1.5rem;
            cursor: pointer;
        }

        .upload-input {
            position: absolute;
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            z-index: -1;
        }

        .upload-visual {
            position: relative;
            width: 100%;
            height: 100%;
            border: 2px dashed var(--glass-edge);
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            overflow: hidden;
        }

        .holographic-upload:hover .upload-visual {
            border-color: var(--neon-blue);
            box-shadow: 0 0 15px rgba(0, 240, 255, 0.1);
        }

        .upload-preview {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.8rem;
            z-index: 1;
        }

        .upload-preview i {
            font-size: 2.5rem;
            color: var(--neon-blue);
        }

        .upload-preview span {
            font-weight: 600;
            color: var(--light-text);
        }

        .upload-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: var(--neon-blue);
            transition: width 0.3s;
        }

        /* Execute Button */
        .upload-execute {
            position: relative;
            width: 100%;
            padding: 1rem;
            background: transparent;
            border: 1px solid var(--neon-blue);
            color: var(--light-text);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
            z-index: 1;
            transition: color 0.3s;
        }

        .upload-execute:hover {
            color: var(--dark-core);
        }

        .execute-beam {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--neon-blue);
            z-index: -1;
            transform: translateY(100%);
            transition: transform 0.3s;
        }

        .upload-execute:hover .execute-beam {
            transform: translateY(0);
        }

        .execute-text {
            position: relative;
            z-index: 2;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .profile-core {
                flex-direction: column;
            }

            .avatar-holo-container {
                margin: -80px auto 2rem auto;
            }

            .identity-section {
                text-align: center;
            }

            .contact-beam {
                justify-content: center;
            }

            .action-terminal {
                justify-content: center;
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
    <div class="cyber-form-card">
        @include('forms.headbar')

        <div class="cyber-form-body">
            <div class="cyber-tab-content" id="pills-tabContent">
                @include('forms.datadiri')
                @include('forms.pendidikan')
                @include('forms.keluarga')
                @include('forms.pengalaman')
                @include('forms.kemampuan')
                @include('forms.organisasi')
                @include('forms.lain')
                @include('forms.pernyataan')
            </div>

            <div class="cyber-form-action">
                <button class="cyber-button-next">
                    <span>NEXT PHASE</span>
                    <i class="ph ph-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>

    <style>
        .cyber-form-card {
            background: var(--dark-surface);
            border-radius: 12px;
            border: 1px solid var(--glass-edge);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .cyber-form-body {
            padding: 2rem;
            background: rgba(10, 10, 30, 0.5);
        }

        .cyber-form-action {
            padding: 1.5rem;
            border-top: 1px solid var(--glass-edge);
            display: flex;
            justify-content: flex-end;
        }

        .cyber-button-next {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.8rem 1.5rem;
            background: linear-gradient(90deg, var(--neon-blue) 0%, var(--cyber-purple) 100%);
            border: none;
            border-radius: 8px;
            color: var(--dark-core);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .cyber-button-next:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 240, 255, 0.3);
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
