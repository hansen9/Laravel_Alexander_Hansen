<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-gradient mb-0 ps-4 pe-4">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 text-white">Dashboard</span>
            <div class="d-flex align-items-center gap-3">
                <span class="text-white small">Selamat datang, <strong>{{ session('user') }}</strong></span>
                <form action="/logout" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn btn-light btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">Selamat Datang di Dashboard</h2>
                <p class="card-text">Anda telah berhasil login dengan username: <strong>{{ session('user') }}</strong></p>
            </div>
        </div>

        <!-- Info Cards -->
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card border-start border-primary border-5">
                    <div class="card-body">
                        <h5 class="card-title text-primary">📋 Fitur Tersedia</h5>
                        <p class="card-text small">Kelola data pasien dan rumah sakit dengan mudah melalui dashboard ini.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card border-start border-primary border-5">
                    <div class="card-body">
                        <h5 class="card-title text-primary">🏥 Rumah Sakit</h5>
                        <p class="card-text small">Lihat dan kelola daftar rumah sakit yang terdaftar dalam sistem.</p>
                        <a href="/rumah-sakit" class="btn btn-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; color: white;">Buka</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card border-start border-primary border-5">
                    <div class="card-body">
                        <h5 class="card-title text-primary">👨‍⚕️ Pasien</h5>
                        <p class="card-text small">Lihat dan kelola data pasien yang terdaftar di berbagai rumah sakit.</p>
                        <a href="/pasien" class="btn btn-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; color: white;">Buka</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
