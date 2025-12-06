<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pasien</title>
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
            <h2>Detail Pasien</h2>

            <div class="detail-item">
                <div class="detail-label">Nama Pasien</div>
                <div class="detail-value">{{ $pasien->namaPasien }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Alamat</div>
                <div class="detail-value">{{ $pasien->alamat }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Nomor Telepon</div>
                <div class="detail-value">{{ $pasien->noTlp }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Rumah Sakit</div>
                <div class="detail-value">{{ $pasien->rumahSakit->namaRS ?? '-' }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Dibuat Pada</div>
                <div class="detail-value">{{ $pasien->created_at->format('d/m/Y H:i') }}</div>
            </div>

            <div class="button-group">
                <a href="/pasien/{{ $pasien->id }}/edit" class="btn btn-warning">Edit</a>
                <a href="/pasien" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</body>
</html>
