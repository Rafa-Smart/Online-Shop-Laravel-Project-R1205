<div id="content-biodata" class="tab-content active">

    <h3 class="mb-3">Biodata Diri</h3>

    <div class="card p-4 shadow-sm">




        {{-- ====== FORM BIODATA ====== --}}
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf

            <div class="row">

                {{-- ================== NAMA AKUN ================== --}}
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Nama Akun</label>
                    <input type="text" name="fullname" class="form-control"
                           value="{{ $buyer->fullname }}">
                </div>

                {{-- ================== EMAIL (LOCKED) ================== --}}
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                    </div>
                    <small class="text-muted">Email tidak bisa, bubt akun baru saja.</small>
                </div>

                {{-- ================== NAMA LENGKAP ================== --}}
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ $user->name }}">
                </div>

                {{-- ================== NO HP ================== --}}
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Nomor HP</label>
                    <input type="text" name="phone_number" class="form-control"
                           value="{{ $buyer->phone_number }}">
                </div>

            </div>

            <button class="btn btn-primary px-4 mt-2">Simpan Perubahan</button>
        </form>


        <hr class="my-4">


        {{-- ==================== UBAH PASSWORD ==================== --}}
        <h5 class="fw-bold">Keamanan Akun</h5>
        <p class="text-muted">Pastikan kata sandi kamu kuat dan tidak mudah ditebak.</p>

        <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalPassword">
            Ubah Password
        </button>

    </div>
</div>



{{-- ================================= --}}
{{-- MODAL UBAH PASSWORD --}}
{{-- ================================= --}}
<div class="modal fade" id="modalPassword" tabindex="-1">
  <div class="modal-dialog">
    <form action="{{ route('profile.changePassword') }}" method="POST" class="modal-content">
        @csrf

        <div class="modal-header">
            <h5 class="modal-title">Ubah Password</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

            {{-- HANYA TAMPIL JIKA USER SUDAH PUNYA PASSWORD --}}
            @if($user->password)
                <label class="fw-bold">Password Lama</label>
                <input type="password" name="old_password" class="form-control mb-3">
            @endif

            <label class="fw-bold">Password Baru</label>
            <input type="password" name="new_password" class="form-control mb-3" required>

            <label class="fw-bold">Konfirmasi Password Baru</label>
            <input type="password" name="new_password_confirmation" class="form-control" required>

        </div>

        <div class="modal-footer">
            <button class="btn btn-danger">Perbarui Password</button>
        </div>
    </form>
  </div>
</div>
