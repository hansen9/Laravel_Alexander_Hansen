<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pasien</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
        }

        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar h1 {
            font-size: 24px;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .logout-btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background 0.3s;
        }

        .logout-btn:hover {
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
            <h2>Tambah Pasien Baru</h2>

            @if ($errors->any())
                <div class="error-message">
                    <ul class="error-list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/pasien" method="POST">
                @csrf

                <div class="form-group">
                    <label for="namaPasien">Nama Pasien *</label>
                    <input
                        type="text"
                        id="namaPasien"
                        name="namaPasien"
                        value="{{ old('namaPasien') }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat *</label>
                    <textarea
                        id="alamat"
                        name="alamat"
                        required
                    >{{ old('alamat') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="noTlp">Nomor Telepon *</label>
                    <input
                        type="text"
                        id="noTlp"
                        name="noTlp"
                        value="{{ old('noTlp') }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="RSID">Rumah Sakit *</label>
                    <select id="RSID" name="RSID" required>
                        <option value="">Pilih Rumah Sakit</option>
                        @foreach ($rumahSakit as $rs)
                            <option value="{{ $rs->id }}" {{ old('RSID') == $rs->id ? 'selected' : '' }}>
                                {{ $rs->namaRS }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/pasien" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
