<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verifikasi Berhasil</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #0d47a1, #1976d2, #42a5f5);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #ffffff;
        }
        body {
    font-family: 'Inter', sans-serif;
    background: radial-gradient(circle at top, #0e1624 0%, #132035 50%, #0e1624 100%);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    color: white;
}

        .container {
            background: rgba(255, 255, 255, 0.12);
            border-radius: 20px;
            padding: 40px 50px;
            backdrop-filter: blur(12px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
            text-align: center;
            max-width: 500px;
            animation: fadeIn 0.9s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
            line-height: 1.4;
        }

        p {
            font-size: 16px;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        a.button {
            display: inline-block;
            padding: 12px 30px;
            background: #ffffff;
            color: #0d47a1;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
            box-shadow: 0 3px 10px rgba(255, 255, 255, 0.2);
        }

        a.button:hover {
            background: #e3f2fd;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.35);
        }

        .checkmark {
            font-size: 60px;
            margin-bottom: 15px;
            animation: pop 0.6s ease-out;
        }

        @keyframes pop {
            0% { transform: scale(0.5); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="checkmark">✔️</div>
        <h2>{{ $message }}</h2>
        <p>Akun Anda telah berhasil diverifikasi. Sekarang Anda dapat melanjutkan ke halaman login dan mulai menggunakan aplikasi.</p>
        <a href="/login" class="button">Masuk Sekarang</a>
    </div>
</body>
</html>
