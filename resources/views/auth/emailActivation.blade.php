<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aktivasi Akun Tertunda</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --error: #ef4444;
            --warning: #f59e0b;
            --light: #f8fafc;
            --dark: #0f172a;
            --gray: #64748b;
            --blue: #3b82f6;
            --blue-hover: #2563eb;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            color: var(--dark);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            overflow-x: hidden;
        }

        .alert-container {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08), 0 0 0 1px rgba(255, 255, 255, 0.4) inset;
            padding: 48px 40px;
            width: 100%;
            max-width: 500px;
            text-align: center;
            position: relative;
            transform: translateY(20px);
            opacity: 0;
            animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes slideUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .alert-icon {
            width: 88px;
            height: 88px;
            background: linear-gradient(135deg, #eff6ff 0%, #bfdbfe 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 28px;
            box-shadow: 0 8px 16px rgba(59, 130, 246, 0.15);
            animation: pulse 2.5s infinite ease-in-out;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4);
            }

            70% {
                transform: scale(1.05);
                box-shadow: 0 0 0 15px rgba(59, 130, 246, 0);
            }

            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0);
            }
        }

        .alert-icon svg {
            width: 44px;
            height: 44px;
            color: var(--blue);
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-4px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        h1 {
            color: var(--dark);
            font-weight: 700;
            margin-bottom: 16px;
            font-size: 28px;
            letter-spacing: -0.5px;
        }

        .alert-message {
            color: var(--gray);
            margin-bottom: 32px;
            font-size: 16px;
            line-height: 1.6;
        }

        .highlight {
            font-weight: 600;
            color: var(--blue);
            background-color: #eff6ff;
            padding: 4px 10px;
            border-radius: 6px;
            display: inline-block;
            margin: 4px;
            font-family: inherit;
            border: 1px solid #bfdbfe;
            word-break: break-all;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .btn {
            padding: 14px 24px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: none;
            width: 100%;
        }

        .btn-primary {
            background-color: var(--blue);
            color: white;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .btn-primary:hover {
            background-color: var(--blue-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(59, 130, 246, 0.4);
        }

        .btn-outline {
            background-color: transparent;
            color: var(--gray);
            border: 2px solid #e2e8f0;
        }

        .btn-outline:hover {
            background-color: #f8fafc;
            color: var(--dark);
            border-color: #cbd5e1;
            transform: translateY(-2px);
        }

        .btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none !important;
            box-shadow: none !important;
        }

        .footer-note {
            margin-top: 24px;
            font-size: 14px;
            color: #94a3b8;
        }

        .logo {
            height: 40px;
            margin-bottom: 24px;
            opacity: 0.8;
            filter: brightness(0) invert(0);
        }

        @media (max-width: 480px) {
            .alert-container {
                padding: 32px 24px;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    @include('sweetalert::alert')
    <div class="alert-container">
        <!-- Optional Logo -->
        <!-- <img src="{{ asset('photo/white-logo.png') }}" alt="Logo" class="logo"> -->

        <div class="alert-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
        </div>

        <h1>Aktivasi Akun Tertunda</h1>

        <div class="alert-message">
            Email <span class="highlight">{{ $user->email ?? 'anda' }}</span> belum diaktifkan.<br>
            Silakan periksa kotak masuk atau folder <b>Spam</b> Anda untuk instruksi menyelesaikannya.
        </div>

        <div class="action-buttons">
            <form action="{{ route('resendActivationEmail') }}" method="POST" id="resendForm" style="margin: 0;">
                @csrf
                <input type="hidden" name="email" value="{{ $user->email ?? '' }}">
                <button type="submit" class="btn btn-primary" id="resendBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M21 2v6h-6"></path>
                        <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path>
                    </svg>
                    Kirim Ulang Email Aktivasi
                </button>
            </form>

            <a href="{{ url('auth/login') }}" class="btn btn-outline">
                Kembali ke Halaman Login
            </a>
        </div>

        <div class="footer-note">
            Butuh bantuan lain? Silakan hubungi tim dukungan kami.
        </div>
    </div>

    <script>
        document.getElementById('resendForm').addEventListener('submit', function(e) {
            const emailValue = document.querySelector('input[name="email"]').value;
            if (!emailValue) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Data Email tidak ditemukan.',
                });
                return;
            }

            const btn = document.getElementById('resendBtn');
            btn.disabled = true;
            btn.innerHTML = `
                <svg class="animate-spin" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="animation: spin 1s linear infinite;">
                    <path d="M21 12a9 9 0 11-6.219-8.56"></path>
                </svg>
                Mengirim Proses...
            `;
        });
    </script>
    <style>
        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</body>

</html>
