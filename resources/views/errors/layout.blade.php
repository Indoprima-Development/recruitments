<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('code') - @yield('title')</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Inter:wght@300;500;700&display=swap');

        :root {
            --primary: #00f0ff;
            --secondary: #0066ff;
            --dark: #0a0e17;
            --light: #e0f2fe;
            --accent: #ff00e4;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--dark);
            color: var(--light);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 2rem;
            background-image:
                radial-gradient(circle at 25% 25%, rgba(0, 240, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(255, 0, 228, 0.1) 0%, transparent 50%);
            overflow: hidden;
        }

        .logo-container {
            position: absolute;
            top: 2rem;
            left: 2rem;
        }

        .logo {
            height: 40px;
            filter: drop-shadow(0 0 5px rgba(0, 240, 255, 0.5));
        }

        .error-container {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 800px;
        }

        .error-code {
            font-family: 'Orbitron', sans-serif;
            font-size: 8rem;
            font-weight: bold;
            margin: 0;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 0 10px rgba(0, 240, 255, 0.3);
            animation: pulse 3s ease infinite;
            letter-spacing: 2px;
        }

        .error-title {
            font-size: 2rem;
            margin: 1rem 0;
            font-weight: 500;
            position: relative;
            display: inline-block;
        }

        .error-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            border-radius: 3px;
        }

        .error-message {
            font-size: 1.1rem;
            color: #94a3b8;
            margin-bottom: 2.5rem;
            line-height: 1.6;
        }

        .home-btn {
            position: relative;
            color: var(--dark);
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            padding: 12px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 0 15px rgba(0, 240, 255, 0.5);
            z-index: 1;
        }

        .home-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 20px rgba(0, 240, 255, 0.8);
        }

        .home-btn:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
            z-index: -1;
        }

        .home-btn:hover:before {
            left: 100%;
        }

        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            background: rgba(0, 240, 255, 0.5);
            border-radius: 50%;
            animation: float linear infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        @keyframes float {
            0% { transform: translateY(0) rotate(0deg); opacity: 1; }
            100% { transform: translateY(-100vh) rotate(360deg); opacity: 0; }
        }

        @media (max-width: 768px) {
            .error-code {
                font-size: 5rem;
            }

            .error-title {
                font-size: 1.5rem;
            }

            .error-message {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="logo-container">
        <img src="https://career.indoprimagemilang.com/photo/white-logo.png" alt="Indo Prima Gemilang Logo" class="logo">
    </div>

    <div class="error-container">
        <div class="error-code">@yield('code')</div>
        <h1 class="error-title">@yield('title')</h1>
        <div class="error-message">@yield('message')</div>
        <a href="{{ url('/') }}" class="home-btn">Kembali ke Beranda</a>
    </div>

    <div class="particles" id="particles"></div>

    <script>
        // Create particles
        document.addEventListener('DOMContentLoaded', function() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 20;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');

                // Random properties
                const size = Math.random() * 5 + 2;
                const posX = Math.random() * 100;
                const duration = Math.random() * 10 + 10;
                const delay = Math.random() * 5;
                const opacity = Math.random() * 0.5 + 0.1;

                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${posX}%`;
                particle.style.animationDuration = `${duration}s`;
                particle.style.animationDelay = `${delay}s`;
                particle.style.opacity = opacity;

                // Random color (blue or pink)
                const colors = ['rgba(0, 240, 255, 0.5)', 'rgba(255, 0, 228, 0.5)'];
                particle.style.background = colors[Math.floor(Math.random() * colors.length)];

                particlesContainer.appendChild(particle);
            }
        });
    </script>
</body>
</html>
