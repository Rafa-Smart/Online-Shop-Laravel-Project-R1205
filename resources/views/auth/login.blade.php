<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KhadafiShop</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0e1624 0%, #1f2d45 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #1f2937;
        }

        .login-card {
            background: white;
            border-radius: 20px;
            padding: 60px 40px 40px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Logo */
        .login-logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
            margin-bottom: 15px;
        }

        .login-title {
            font-weight: 800;
            color: #0e1624;
            font-size: 1.8rem;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        /* Input fields with icons */
        .input-group-text {
            background: #f3f4f6;
            border-radius: 12px 0 0 12px;
            border: 1px solid #d1d5db;
            color: #0e1624;
        }

        .form-control {
            border-radius: 0 12px 12px 0;
            border-left: none;
            padding: 12px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        /* Show/Hide password button */
        .password-toggle {
            cursor: pointer;
            color: #6b7280;
        }

        /* Buttons */
        .btn-primary {
            background-color: #0e1624;
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #16253c;
        }

        .btn-google {
            background-color: #fff;
            color: #000;
            border: 1px solid #d1d5db;
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s;
        }

        .btn-google:hover {
            background-color: #f1f5f9;
        }

        /* Alert */
        .alert-success, .alert-error {
            border-radius: 12px;
            padding: 12px 15px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
        }

        .alert-error {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .forgot-password {
            display: block;
            margin-bottom: 20px;
            color: #0e1624;
            font-weight: 500;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        @media(max-width: 500px) {
            .login-card {
                padding: 50px 20px 30px;
            }
            .login-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>

    <div class="login-card">
        <!-- Logo & Title -->
        <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Logo KhadafiShop" class="login-logo">
        <div class="login-title">
            KhadafiShop
        </div>

        <!-- Pesan error/success -->
        @if(session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <!-- Form login -->
        <form action="{{ route('login.store') }}" method="POST">
            @csrf
            <!-- Email -->
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                <input type="email" name="email" placeholder="Email" class="form-control" required>
            </div>

            <!-- Password with show/hide -->
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" name="password" placeholder="Password" class="form-control" id="password" required>
                <span class="input-group-text password-toggle" id="togglePassword">
                    <i class="fas fa-eye"></i>
                </span>
            </div>

            <a href="#" class="forgot-password">Lupa password?</a>

            <a href="{{ route('google.redirect') }}" class="btn-google">
                <i class="fab fa-google"></i> Login dengan Google
            </a>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <p class="mt-4">Belum punya akun? <a href="{{ route('register') }}" style="color:#3b82f6; font-weight:600;">Daftar Sekarang</a></p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Show/Hide Password JS -->
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            // toggle type
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle icon
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });
    </script>
</body>
</html>
