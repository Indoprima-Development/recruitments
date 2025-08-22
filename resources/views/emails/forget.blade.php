<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Indoprima Gemilang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }

        .header {
            background: #007bff;
            padding: 20px;
            text-align: center;
            color: #fff;
        }

        .header img {
            max-width: 150px;
        }

        .content {
            padding: 20px;
            text-align: center;
        }

        .content p {
            font-size: 16px;
            color: #333;
            margin: 0 0 20px;
        }

        .button-container {
            text-align: center;
            margin: 20px 0;
        }

        .button-container a {
            text-decoration: none;
            background: #28a745;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
        }

        .button-container a:hover {
            background: #218838;
        }

        .footer {
            padding: 10px;
            background: #f4f4f9;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <img src="http://ixp1.indoprimagemilang.com:81/recruitments/public/package/dist/images/logos/logo.png"
                alt="Logo">
        </div>
        <div class="content">
            <h3>Hi {{ $data['name'] }},</h3>
            <p>
                Silahkan klik link berikut untuk melakukan reset password.
            </p>
            <div class="button-container">
                <a
                    href="{{url('auth/forget-password-from-link')}}?token={{ $data['body'] }}">Forget Password</a>
            </div>
        </div>
        <div class="footer">
            &copy; {{date('Y')}} PT. Indoprima Gemilang. Semua Hak Dilindungi.
        </div>
    </div>
</body>

</html>
