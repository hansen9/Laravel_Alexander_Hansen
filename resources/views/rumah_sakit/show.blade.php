<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Rumah Sakit</title>
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
                <h2 class="mb-4">Detail Rumah Sakit</h2>

                <div class="row mb-4">
                    <div class="col-md-4">
                        <p class="text-muted small fw-semibold mb-1">Nama Rumah Sakit</p>
                        <p class="fs-5">{{ $rumahSakit->namaRS }}</p>
                        <hr class="border-bottom border-1">
                    </div>
                    <div class="col-md-8">
                        <p class="text-muted small fw-semibold mb-1">Alamat</p>
                        <p class="fs-5">{{ $rumahSakit->alamat }}</p>
                        <hr class="border-bottom border-1">
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <p class="text-muted small fw-semibold mb-1">Email</p>
                        <p class="fs-5">{{ $rumahSakit->email }}</p>
                        <hr class="border-bottom border-1">
                    </div>
                    <div class="col-md-6">
                        <p class="text-muted small fw-semibold mb-1">Telepon</p>
                        <p class="fs-5">{{ $rumahSakit->tlp }}</p>
                        <hr class="border-bottom border-1">
                    </div>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <a href="/rumah-sakit/{{ $rumahSakit->id }}/edit" class="btn btn-warning">Edit</a>
                    <form action="/rumah-sakit/{{ $rumahSakit->id }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                    </form>
                    <a href="/rumah-sakit" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
            background: rgba(255, 255, 255, 0.3);
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        .detail-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            margin-bottom: 30px;
            font-size: 24px;
        }

        .detail-item {
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-label {
            color: #667eea;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .detail-value {
            color: #333;
            font-size: 16px;
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.2s;
        }

        .btn-warning {
            background: #ffc107;
            color: #333;
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>Sistem Manajemen Pasien</h1>
        <div class="navbar-right">
            <span>{{ session('user') }}</span>
            <form action="/logout" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="detail-container">
            <h2>Detail Rumah Sakit</h2>

            <div class="detail-item">
                <div class="detail-label">Nama Rumah Sakit</div>
                <div class="detail-value">{{ $rumahSakit->namaRS }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Alamat</div>
                <div class="detail-value">{{ $rumahSakit->alamat }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Email</div>
                <div class="detail-value">{{ $rumahSakit->email }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Nomor Telepon</div>
                <div class="detail-value">{{ $rumahSakit->tlp }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Dibuat Pada</div>
                <div class="detail-value">{{ $rumahSakit->created_at->format('d/m/Y H:i') }}</div>
            </div>

            <div class="button-group">
                <a href="/rumah-sakit/{{ $rumahSakit->id }}/edit" class="btn btn-warning">Edit</a>
                <a href="/rumah-sakit" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</body>
</html>
