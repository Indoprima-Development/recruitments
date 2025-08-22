<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Reset Password Terkirim</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9fafb;
            color: #1f2937;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
            padding: 40px;
            max-width: 500px;
            text-align: center;
        }
        .icon {
            width: 80px;
            height: 80px;
            background: #d1fae5;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 20px;
        }
        .icon svg {
            width: 40px;
            height: 40px;
            color: #10b981;
        }
        h1 {
            font-size: 24px;
            color: #4f46e5;
            margin-bottom: 15px;
        }
        p {
            color: #6b7280;
            font-size: 16px;
            margin-bottom: 20px;
        }
        .email {
            font-weight: 600;
            background: #f3f4f6;
            padding: 4px 8px;
            border-radius: 6px;
            display: inline-block;
        }
        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }
        .btn-primary {
            background: #4f46e5;
            color: white;
        }
        .btn-primary:hover {
            background: #4338ca;
        }
        .note {
            font-size: 14px;
            color: #6b7280;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        </div>
        <h1>Email Terkirim!</h1>
        <p>Kami telah mengirimkan link reset password ke email Anda:</p>
        <p class="email">{{ $email ?? 'Alamat email Anda' }}</p>

        <p class="note">Silakan cek inbox Anda. Jika tidak ada, periksa folder spam/junk.</p>

        <a href="{{ url('/') }}" class="btn btn-primary">Kembali ke Halaman Utama</a>
    </div>
</body>
</html>
