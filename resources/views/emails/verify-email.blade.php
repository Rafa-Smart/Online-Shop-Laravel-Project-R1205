<h2>Halo {{ $user->name }}!</h2>
<p>Terima kasih sudah mendaftar.</p>
<p>Klik link di bawah untuk verifikasi akun:</p>

<a href="{{ route('email.verify', $user->verification_token) }}">
    Verifikasi Email Anda
</a>
