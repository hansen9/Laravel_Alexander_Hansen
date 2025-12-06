<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rumah Sakit</title>
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
                <h2 class="mb-4">Edit Rumah Sakit</h2>

                <form action="/rumah-sakit/{{ $rumahSakit->id }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="namaRS" class="form-label">Nama Rumah Sakit</label>
                        <input type="text" class="form-control @error('namaRS') is-invalid @enderror" id="namaRS" name="namaRS" value="{{ old('namaRS', $rumahSakit->namaRS) }}" required>
                        @error('namaRS')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $rumahSakit->alamat) }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $rumahSakit->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tlp" class="form-label">Telepon</label>
                        <input type="text" class="form-control @error('tlp') is-invalid @enderror" id="tlp" name="tlp" value="{{ old('tlp', $rumahSakit->tlp) }}" required>
                        @error('tlp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn flex-grow-1" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; color: white;">Update</button>
                        <a href="/rumah-sakit" class="btn btn-secondary flex-grow-1">Batal</a>
                    </div>
                </form>
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

        .form-container {
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

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
        }

        input, select {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #667eea;
        }

        textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            min-height: 100px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: border-color 0.3s;
        }

        textarea:focus {
            outline: none;
            border-color: #667eea;
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
            transition: transform 0.2s;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
        }

        .error-list {
            list-style: none;
        }

        .error-list li {
            margin-bottom: 5px;
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
        <div class="form-container">
            <h2>Edit Rumah Sakit</h2>

            @if ($errors->any())
                <div class="error-message">
                    <ul class="error-list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/rumah-sakit/{{ $rumahSakit->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="namaRS">Nama Rumah Sakit *</label>
                    <input
                        type="text"
                        id="namaRS"
                        name="namaRS"
                        value="{{ old('namaRS', $rumahSakit->namaRS) }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat *</label>
                    <textarea
                        id="alamat"
                        name="alamat"
                        required
                    >{{ old('alamat', $rumahSakit->alamat) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $rumahSakit->email) }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="tlp">Nomor Telepon *</label>
                    <input
                        type="text"
                        id="tlp"
                        name="tlp"
                        value="{{ old('tlp', $rumahSakit->tlp) }}"
                        required
                    >
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/rumah-sakit" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
