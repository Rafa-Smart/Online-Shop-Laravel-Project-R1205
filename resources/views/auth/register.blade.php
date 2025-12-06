<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - KhadafiShop</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

   <style>
    /* ===== GLOBAL ===== */
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

/* ===== CARD REGISTER - SELARAS LOGIN ===== */
.register-card {
    background: rgba(255, 255, 255, 0.10);
    backdrop-filter: blur(20px);
    border-radius: 25px;
    padding: 60px 40px 40px;
    max-width: 410px;
    width: 100%;
    text-align: center;
    border: 1px solid rgba(255,255,255,0.15);
    box-shadow: 0 20px 40px rgba(0,0,0,0.35);
    animation: fadeUp 1.2s ease;
}

/* ANIMASI SAMA DENGAN LOGIN */
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(40px); }
    to { opacity: 1; transform: translateY(0); }
}

/* ===== LOGO ===== */
.register-logo {
    width: 85px;
    margin-bottom: 10px;
    filter: drop-shadow(0 4px 8px rgba(0,0,0,0.4));
}

/* ===== TITLE ===== */
.register-title {
    font-size: 2rem;
    font-weight: 800;
    color: #e2e8f0;
    margin-bottom: 30px;
    letter-spacing: -0.5px;
}

/* ===== INPUT GROUP (SAMA LOGIN) ===== */
.input-group-text {
    background: rgba(255,255,255,0.15);
    border: none;
    color: #dbeafe;
    border-radius: 14px 0 0 14px;
    padding: 14px;
}

.form-control {
    background: rgba(255,255,255,0.05);
    border: none;
    border-radius: 0 14px 14px 0;
    color: white;
    padding: 14px;
}

.form-control::placeholder {
    color: #cbd5e1;
}

.form-control:focus {
    background: rgba(255,255,255,0.10);
    box-shadow: 0 0 0 2px #3b82f6;
    color: white;
}

.input-group {
    margin-bottom: 20px;
}

.password-toggle {
    background: rgba(255,255,255,0.15) !important;
    border-radius: 0 14px 14px 0 !important;
    border: none;
    cursor: pointer;
    color: #cbd5e1;
}

/* ===== BUTTON GOOGLE ===== */
.btn-google {
    background: white;
    color: black;
    border: none;
    width: 100%;
    padding: 12px;
    border-radius: 14px;
    margin-bottom: 20px;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: 0.3s ease;
    box-shadow: 0 4px 12px rgba(255,255,255,0.2);
}

.btn-google:hover {
    background: #f1f5f9;
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(255,255,255,0.25);
}

/* ===== BUTTON REGISTER (PRIMARY) ===== */
.btn-primary {
    background: linear-gradient(135deg, #3b82f6, #1e40af);
    border: none;
    width: 100%;
    padding: 14px;
    border-radius: 14px;
    font-weight: 700;
    letter-spacing: 0.5px;
    transition: 0.3s ease;
    box-shadow: 0 6px 18px rgba(59,130,246,0.4);
}

.btn-primary:hover {
    background: linear-gradient(135deg, #2563eb, #1e3a8a);
    transform: translateY(-3px);
    box-shadow: 0 10px 22px rgba(59,130,246,0.5);
}

/* ===== ALERT ===== */
.alert-success, .alert-error {
    border-radius: 12px;
    padding: 12px 15px;
    margin-bottom: 20px;
    font-size: 0.9rem;
    font-weight: 600;
    text-align: left;
}

.alert-success {
    background-color: #d1fae5;
    color: #065f46;
}

.alert-error {
    background-color: #fee2e2;
    color: #991b1b;
}

/* ===== TEXT & LINK ===== */
p, a {
    color: #dbeafe;
}

a:hover {
    color: #60a5fa;
    text-decoration: underline;
}

/* ===== RESPONSIVE ===== */
@media(max-width: 500px) {
    .register-card {
        padding: 45px 25px 30px;
    }
    .register-title {
        font-size: 1.6rem;
    }
}

   </style>
</head>

<body>

    <div class="register-card">
        <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Logo KhadafiShop" class="register-logo">
        <div class="register-title">Daftar Akun</div>

        <!-- Alert -->
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- REGISTER FORM -->
        <form action="{{ route('register.store') }}" method="POST">
            @csrf

            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" class="form-control" required>
            </div>

            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="form-control" required>
            </div>

            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" name="password" placeholder="Password" class="form-control" id="password" required>
                <span class="input-group-text password-toggle" id="togglePassword">
                    <i class="fas fa-eye"></i>
                </span>
            </div>

            <a href="{{ route('google.redirect') }}" class="btn-google">
                <i class="fab fa-google"></i> Daftar dengan Google
            </a>

            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>

        <p class="mt-4">Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.innerHTML = type === 'password'
                ? '<i class="fas fa-eye"></i>'
                : '<i class="fas fa-eye-slash"></i>';
        });
    </script>

</body>
</html>
