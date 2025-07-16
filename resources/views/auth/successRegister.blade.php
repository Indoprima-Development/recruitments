<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Berhasil | Konfirmasi Email</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --success: #10b981;
            --light: #f9fafb;
            --dark: #1f2937;
            --gray: #6b7280;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light);
            color: var(--dark);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            line-height: 1.6;
        }

        .success-container {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            padding: 40px;
            width: 100%;
            max-width: 500px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .success-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(90deg, var(--primary), var(--success));
        }

        .success-icon {
            width: 100px;
            height: 100px;
            background-color: #d1fae5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            position: relative;
            animation: bounce 0.6s ease;
        }

        .success-icon svg {
            width: 50px;
            height: 50px;
            color: var(--success);
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-20px);
            }

            60% {
                transform: translateY(-10px);
            }
        }

        h1 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 15px;
            font-size: 28px;
        }

        p {
            color: var(--gray);
            margin-bottom: 30px;
            font-size: 16px;
        }

        .email-highlight {
            font-weight: 600;
            color: var(--dark);
            background-color: #f3f4f6;
            padding: 2px 6px;
            border-radius: 4px;
            display: inline-block;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 500;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background-color: #4338ca;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
        }

        .btn-outline {
            background-color: white;
            color: var(--primary);
            border: 1px solid var(--primary);
        }

        .btn-outline:hover {
            background-color: #f5f3ff;
            transform: translateY(-2px);
        }

        .email-image {
            margin: 30px auto;
            max-width: 200px;
            opacity: 0.9;
        }

        .check-spam {
            font-size: 14px;
            color: var(--gray);
            margin-top: 20px;
            font-style: italic;
        }

        @media (max-width: 600px) {
            .success-container {
                padding: 30px 20px;
            }

            h1 {
                font-size: 24px;
            }
        }
        .logo {
            height: 48px;
        }
    </style>
</head>

<body>
    <div class="success-container">
        <img src="{{ asset('photo/white-logo.png') }}" alt="PT. Indoprima Gemilang" class="logo">
        
        <div class="success-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>

        <h1>Registration Successful!</h1>

        <p>
            Thank you for registering. We have sent a confirmation email to
            <span class="email-highlight">{{ $email }}</span>.
            Please check your email inbox to complete the registration process.
        </p>

        <img src="https://cdn-icons-png.flaticon.com/512/3178/3178158.png" alt="Email Illustration" class="email-image">

        <p class="check-spam">
            If you don't see our email, please check your spam or junk mail folder.
        </p>

        <div class="action-buttons">
            <a href="{{ url('/') }}" class="btn btn-outline">Back ke home</a>
        </div>
    </div>
</body>

</html>
