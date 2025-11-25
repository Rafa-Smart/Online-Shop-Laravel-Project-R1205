<h2>Login</h2>

@if(session('error'))
    <div style="color:red">{{ session('error') }}</div>
@endif

@if(session('success'))
    <div style="color:green">{{ session('success') }}</div>
@endif

<form action="{{ route('login.store') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Email"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <a href="{{ route('google.redirect') }}">
    <button type="button">Login dengan Google</button>
</a>

    <button type="submit">Login</button>
</form>
