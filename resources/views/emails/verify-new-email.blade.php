<h2>Verifikasi Email Baru Anda</h2>

<p>Halo {{ $user->name }},</p>

<p>Anda meminta perubahan email menjadi:</p>
<p><strong>{{ $user->new_email }}</strong></p>

<p>Silakan klik link berikut untuk mengonfirmasi perubahan email:</p>

<p>
    <a href="{{ $verificationUrl }}">
        Verifikasi Email Baru
    </a>
</p>

<p>Link ini berlaku selama 60 menit.</p>
