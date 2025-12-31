<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('code') - @yield('title')</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --bg-color: #ffffff;
            --text-heading: #0f172a;
            --text-body: #64748b;
            --card-bg: rgba(255, 255, 255, 0.9);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-body);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        /* Subtle modern background pattern */
        body::before {
            content: '';
            position: absolute;
            width: 140%;
            height: 140%;
            background-image:
                radial-gradient(at 0% 0%, rgba(37, 99, 235, 0.03) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(37, 99, 235, 0.03) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(37, 99, 235, 0.03) 0px, transparent 50%),
                radial-gradient(at 0% 100%, rgba(37, 99, 235, 0.03) 0px, transparent 50%);
            top: -20%;
            left: -20%;
            z-index: -1;
            animation: rotateBg 30s linear infinite;
        }

        @keyframes rotateBg {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .logo-container {
            position: absolute;
            top: 40px;
            left: 40px;
            z-index: 20;
        }

        .logo {
            height: 40px;
            width: auto;
        }

        .error-card {
            background: var(--card-bg);
            padding: 4rem 3rem;
            border-radius: 24px;
            text-align: center;
            position: relative;
            z-index: 10;
            box-shadow:
                0 0 0 1px rgba(0, 0, 0, 0.03),
                0 20px 40px -10px rgba(0, 0, 0, 0.08);
            /* Soft sophisticated shadow */
            max-width: 500px;
            width: 100%;
            backdrop-filter: blur(20px);
            animation: floatUp 0.8s cubic-bezier(0.2, 0.8, 0.2, 1);
        }

        .error-code {
            font-size: 7rem;
            font-weight: 800;
            line-height: 1;
            margin: 0;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 0.5rem;
            letter-spacing: -3px;
        }

        .error-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-heading);
            margin: 0 0 1rem;
            letter-spacing: -0.5px;
        }

        .error-message {
            font-size: 1.05rem;
            line-height: 1.6;
            margin-bottom: 2.5rem;
            color: var(--text-body);
        }

        .home-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 14px 28px;
            background-color: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
        }

        .home-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(37, 99, 235, 0.3);
        }

        .home-btn svg {
            margin-right: 8px;
            width: 18px;
            height: 18px;
        }

        @keyframes floatUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 640px) {
            .logo-container {
                top: 20px;
                left: 20px;
            }

            .error-card {
                padding: 3rem 1.5rem;
                max-width: 90%;
            }

            .error-code {
                font-size: 5rem;
            }
        }
    </style>
</head>

<body>
    <div class="logo-container">
        <!-- Modern Colored Logo -->
        <img src="http://ixp1.indoprimagemilang.com:81/recruitments/public/package/dist/images/logos/logo.png"
            alt="Company Logo" class="logo">
    </div>

    <div class="error-card">
        <h1 class="error-code">@yield('code')</h1>
        <h2 class="error-title">@yield('title')</h2>
        <p class="error-message">@yield('message')</p>

        <a href="{{ url('/') }}" class="home-btn">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Dashboard
        </a>
    </div>
</body>

</html>
