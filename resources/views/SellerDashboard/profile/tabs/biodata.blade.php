<div id="content-biodata" class="tab-content active">
    <h3 class="mb-3">Biodata Toko</h3>

    <div class="card p-4 shadow-sm">

        <form action="{{ route('seller.profile.update') }}" method="POST">
            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Nama Toko</label>
                    <input type="text" name="store_name" class="form-control"
                           value="{{ $seller->store_name }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Email</label>
                    <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Nama Pemilik</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ $user->name }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Nomor HP Toko</label>
                    <input type="text" name="phone_number" class="form-control"
                           value="{{ $seller->phone_number }}">
                </div>

                <div class="col-12 mb-3">
                    <label class="fw-bold">Deskripsi Toko</label>
                    <textarea name="description" class="form-control" rows="4">{{ $seller->description }}</textarea>
                </div>

            </div>

            <button class="btn btn-primary mt-2">Simpan Perubahan</button>
        </form>

        <hr class="my-4">

        <h5 class="fw-bold">Keamanan Akun</h5>
        <p class="text-muted">Pastikan kata sandi kamu aman.</p>

        <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalPassword">
            Ubah Password
        </button>

    </div>
</div>
