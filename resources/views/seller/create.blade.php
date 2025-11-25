@extends('layouts.head')

@section('title', 'Buka Toko')

@section('content')
<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Buka Toko Baru</h4>
                </div>

                <div class="card-body">

                    <p class="text-muted text-center mb-4">
                        Lengkapi informasi berikut untuk membuka toko.
                    </p>

                    <!-- Error Message -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('seller.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Store Name -->
                        <div class="mb-3">
                            <label for="store_name" class="form-label">Nama Toko <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                name="store_name"
                                id="store_name"
                                class="form-control @error('store_name') is-invalid @enderror"
                                placeholder="Contoh: Toko Maju Jaya"
                                value="{{ old('store_name') }}"
                                required
                            >
                            @error('store_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Nomor HP <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                name="phone_number"
                                id="phone_number"
                                class="form-control @error('phone_number') is-invalid @enderror"
                                placeholder="08xxxxxxxxxx"
                                value="{{ old('phone_number') }}"
                                required
                            >
                            @error('phone_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi Toko</label>
                            <textarea
                                name="description"
                                id="description"
                                class="form-control @error('description') is-invalid @enderror"
                                rows="3"
                                placeholder="Tulis deskripsi toko...">{{ old('description') }}</textarea>
                            <button type="button" class="btn btn-sm btn-secondary mt-2" id="skip-description">Skip</button>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-3">
                            <label class="form-label">Gambar Toko</label>
                            <div class="border p-3 text-center" id="drop-area">
                                <p>Drag & Drop file di sini atau klik tombol pilih file</p>
                                <input type="file" name="img" id="img" class="form-control" accept="image/*">
                            </div>
                            <button type="button" class="btn btn-sm btn-secondary mt-2" id="skip-img">Skip</button>
                            @error('img')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary">Buka Toko Sekarang</button>
                        </div>

                        <!-- Back -->
                        <div class="text-center mt-3">
                            <a href="{{ url('/home') }}" class="text-decoration-none">← Kembali ke Beranda</a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

<script>
    // Skip Description
    document.getElementById('skip-description').addEventListener('click', function() {
        document.getElementById('description').value = '0';
    });

    // Skip Image
    document.getElementById('skip-img').addEventListener('click', function() {
        document.getElementById('img').value = '';
        let input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'img';
        input.value = '0';
        this.closest('form').appendChild(input);
    });

    // Optional: Drag & Drop support
    let dropArea = document.getElementById('drop-area');
    dropArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropArea.classList.add('bg-light');
    });
    dropArea.addEventListener('dragleave', (e) => {
        e.preventDefault();
        dropArea.classList.remove('bg-light');
    });
    dropArea.addEventListener('drop', (e) => {
        e.preventDefault();
        dropArea.classList.remove('bg-light');
        let files = e.dataTransfer.files;
        document.getElementById('img').files = files;
    });
</script>
@endsection
