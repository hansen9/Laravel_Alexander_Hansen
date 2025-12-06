<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Rumah Sakit</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-gradient mb-0 ps-4 pe-4">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 text-white">Sistem Manajemen Pasien</span>
            <div class="d-flex align-items-center gap-3">
                <span class="text-white small">{{ session('user') }}</span>
                <form action="/logout" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn btn-light btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-sm mt-5 mb-5">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h2 class="mb-4">Tambah Rumah Sakit</h2>

                <form action="/rumah-sakit" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="namaRS" class="form-label">Nama Rumah Sakit</label>
                        <input type="text" class="form-control @error('namaRS') is-invalid @enderror" id="namaRS" name="namaRS" value="{{ old('namaRS') }}" required>
                        @error('namaRS')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tlp" class="form-label">Telepon</label>
                        <input type="text" class="form-control @error('tlp') is-invalid @enderror" id="tlp" name="tlp" value="{{ old('tlp') }}" required>
                        @error('tlp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn flex-grow-1" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; color: white;">Simpan</button>
                        <a href="/rumah-sakit" class="btn btn-secondary flex-grow-1">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
