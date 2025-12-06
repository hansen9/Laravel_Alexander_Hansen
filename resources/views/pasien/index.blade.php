<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pasien</title>
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
    <div class="container-lg mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Daftar Pasien</h2>
            <a href="/pasien/create" class="btn" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; color: white;">+ Tambah Pasien</a>
        </div>

        <!-- Filter by Rumah Sakit -->
        <div class="card mb-4 p-3">
            <form method="GET" action="/pasien" class="d-flex gap-3 align-items-end">
                <div class="flex-grow-1">
                    <label for="rsFilter" class="form-label mb-2">Filter berdasarkan Rumah Sakit:</label>
                    <select id="rsFilter" name="RSID" class="form-select" onchange="this.form.submit()">
                        <option value="">Semua Rumah Sakit</option>
                        @foreach ($rumahSakit as $rs)
                            <option value="{{ $rs->id }}" {{ request('RSID') == $rs->id ? 'selected' : '' }}>
                                {{ $rs->namaRS }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @if (request('RSID'))
                    <a href="/pasien" class="btn btn-outline-secondary">Reset Filter</a>
                @endif
            </form>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div id="alertContainer"></div>

        @if ($pasien->count() > 0)
            <div class="table-responsive card">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Rumah Sakit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasien as $p)
                            <tr id="row-{{ $p->id }}">
                                <td>{{ ($pasien->currentPage() - 1) * 10 + $loop->iteration }}</td>
                                <td>{{ $p->namaPasien }}</td>
                                <td>{{ $p->alamat }}</td>
                                <td>{{ $p->noTlp }}</td>
                                <td>{{ $p->rumahSakit->namaRS ?? '-' }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="/pasien/{{ $p->id }}" class="btn btn-info btn-sm text-white">Lihat</a>
                                        <a href="/pasien/{{ $p->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="{{ $p->id }}" data-name="{{ $p->namaPasien }}">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $pasien->links() }}
            </div>
        @else
            <div class="alert alert-info text-center" role="alert">
                <p>Tidak ada data pasien. <a href="/pasien/create">Tambah pasien baru</a></p>
            </div>
        @endif

        <div class="d-flex gap-2 justify-content-center mt-5">
            <a href="/dashboard" class="btn btn-secondary">Dashboard</a>
            <a href="/pasien" class="btn" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; color: white;">Daftar Pasien</a>
            <a href="/rumah-sakit" class="btn btn-secondary">Daftar Rumah Sakit</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');

                if (confirm(`Apakah Anda yakin ingin menghapus pasien "${name}"?`)) {
                    fetch(`/pasien/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ||
                                           document.querySelector('input[name="_token"]')?.value,
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const row = document.getElementById(`row-${id}`);
                            row.style.opacity = '0.5';
                            setTimeout(() => {
                                row.remove();
                                showAlert('Pasien berhasil dihapus!', 'success');
                            }, 300);
                        } else {
                            showAlert(data.message || 'Gagal menghapus pasien', 'danger');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showAlert('Terjadi kesalahan saat menghapus pasien', 'danger');
                    });
                }
            });
        });

        function showAlert(message, type) {
            const alertContainer = document.getElementById('alertContainer');
            const alert = document.createElement('div');
            alert.className = `alert alert-${type} alert-dismissible fade show`;
            alert.innerHTML = `
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            alertContainer.appendChild(alert);
            setTimeout(() => alert.remove(), 5000);
        }
    </script>
</body>
</html>
