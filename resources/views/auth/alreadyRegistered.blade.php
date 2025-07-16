<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Already Exists</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --error: #DC2626;
            --warning: #F59E0B;
            --light: #F9FAFB;
            --dark: #111827;
            --gray: #6B7280;
            --blue: #2563EB;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light);
            color: var(--dark);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            line-height: 1.5;
        }

        .alert-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
            padding: 40px;
            width: 100%;
            max-width: 480px;
            text-align: center;
            position: relative;
            overflow: hidden;
            border-left: 6px solid var(--error);
        }

        .alert-icon {
            width: 80px;
            height: 80px;
            background-color: #FEE2E2;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            position: relative;
        }

        .alert-icon svg {
            width: 40px;
            height: 40px;
            color: var(--error);
        }

        h1 {
            color: var(--dark);
            font-weight: 700;
            margin-bottom: 16px;
            font-size: 24px;
        }

        .alert-message {
            color: var(--gray);
            margin-bottom: 24px;
            font-size: 16px;
            line-height: 1.6;
        }

        .highlight {
            font-weight: 600;
            color: var(--dark);
            background-color: #F3F4F6;
            padding: 4px 8px;
            border-radius: 4px;
            display: inline-block;
            margin: 4px 0;
            font-family: 'Courier New', monospace;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 32px;
        }

        .btn {
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: 500;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-primary {
            background-color: var(--blue);
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background-color: #1D4ED8;
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.2);
        }

        .btn-secondary {
            background-color: white;
            color: var(--blue);
            border: 1px solid #E5E7EB;
        }

        .btn-secondary:hover {
            background-color: #F9FAFB;
            border-color: #D1D5DB;
        }

        .solution-section {
            background-color: #FEFCE8;
            border-radius: 8px;
            padding: 16px;
            margin: 24px 0;
            text-align: left;
        }

        .solution-section h3 {
            color: var(--dark);
            font-size: 16px;
            margin-top: 0;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .solution-section ul {
            margin: 0;
            padding-left: 20px;
            color: var(--gray);
        }

        .solution-section li {
            margin-bottom: 8px;
        }

        @media (max-width: 480px) {
            .alert-container {
                padding: 32px 24px;
            }

            h1 {
                font-size: 22px;
            }
        }
        .logo {
            height: 48px;
        }
    </style>
</head>
<body>
    <div class="alert-container">
        <img src="{{ asset('photo/white-logo.png') }}" alt="PT. Indoprima Gemilang" class="logo">

        <div class="alert-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>

        <h1>Account Already Registered</h1>

        <div class="alert-message">
            The <span class="highlight">{{$user->email}}</span> or
            <span class="highlight">{{$user->ktp}}</span> is already associated with an existing account.
        </div>

        <div class="solution-section">
            <h3>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="16" x2="12" y2="12"></line>
                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                </svg>
                What you can do next
            </h3>
            <ul>
                <li>Try logging in if this is your account</li>
                <li>Reset your password if you've forgotten it</li>
                <li>Use a different email address to register</li>
                <li>Contact support if you believe this is an error</li>
            </ul>
        </div>

        <div class="action-buttons">
            <a href="{{url('auth/login')}}" class="btn btn-primary">Go to Login Page</a>
            <a href="{{url('auth/reset-password')}}" class="btn btn-secondary">Reset Password</a>
        </div>
    </div>
</body>
</html>
