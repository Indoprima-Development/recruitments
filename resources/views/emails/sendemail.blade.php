<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Indoprima Gemilang</title>
    <style>
        /* General Resets */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
            border: 0;
            outline: none;
            text-decoration: none;
        }

        /* Main Styles */
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f1f5f9;
            margin: 0;
            padding: 0;
            width: 100% !important;
            color: #334155;
            -webkit-font-smoothing: antialiased;
        }

        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #f1f5f9;
            padding-bottom: 40px;
        }

        .main-table {
            background-color: #ffffff;
            margin: 0 auto;
            width: 100%;
            max-width: 600px;
            border-spacing: 0;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            overflow: hidden;
        }

        .header {
            padding: 40px 0 20px 0;
            text-align: center;
            background-color: #ffffff;
            border-bottom: 1px solid #f1f5f9;
        }

        .content {
            padding: 40px 40px;
            text-align: center;
        }

        h3 {
            color: #1e293b;
            font-size: 24px;
            font-weight: 700;
            margin: 0 0 20px 0;
            letter-spacing: -0.5px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            margin: 0 0 24px 0;
            color: #475569;
        }

        .btn-container {
            margin: 32px 0;
        }

        .btn {
            background-color: #2563eb;
            /* Modern Blue */
            color: #ffffff;
            padding: 14px 32px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            display: inline-block;
            box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);
            transition: background-color 0.2s;
        }

        .btn:hover {
            background-color: #1d4ed8;
        }

        .footer {
            background-color: #f8fafc;
            padding: 24px;
            text-align: center;
            font-size: 12px;
            color: #94a3b8;
            border-top: 1px solid #f1f5f9;
        }

        /* Responsive */
        @media screen and (max-width: 600px) {
            .content {
                padding: 30px 20px;
            }

            .header {
                padding: 30px 0 10px 0;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <table class="main-table" role="presentation">
            <!-- Header -->
            <tr>
                <td class="header">
                    <img src="http://ixp1.indoprimagemilang.com:81/recruitments/public/package/dist/images/logos/logo.png"
                        alt="Indo Prima Gemilang" width="160" style="display: block; margin: 0 auto;">
                </td>
            </tr>

            <!-- Content -->
            <tr>
                <td class="content">
                    <h3>Hi {{ $data['name'] }},</h3>
                    <p>
                        Terima kasih telah membuat akun di Recruitment System PT Indoprima Gemilang! Kami senang Anda
                        bergabung
                        bersama kami.
                    </p>
                    <p>Untuk menyelesaikan pembuatan akun Anda dan mulai menjelajahi peluang karir, silakan verifikasi
                        alamat email Anda dengan mengklik tombol di bawah ini:</p>

                    <div class="btn-container">
                        <a href="https://career.indoprimagemilang.com/emails/konfirmation?token={{ $data['body'] }}"
                            class="btn">
                            Konfirmasi Email
                        </a>
                    </div>
                </td>
            </tr>

            <!-- Footer -->
            <tr>
                <td class="footer">
                    &copy; {{ date('Y') }} PT. Indoprima Gemilang. Semua Hak Dilindungi.
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
