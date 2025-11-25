<h2>Register</h2>

@if(session('success'))
    <div style="color:green">{{ session('success') }}</div>
@endif

@if ($errors->any())
    <div style="color:red">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="{{ route('register.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Nama" value="{{ old('name') }}"><br>
    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"><br>
    <input type="password" name="password" placeholder="Password"><br>

    <button type="submit">Register</button>
</form>

<a href="{{ route('google.redirect') }}">Register dengan Google</a>
