<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar Rumah Sakit</title>
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
            <h2>Daftar Rumah Sakit</h2>
            <a href="/rumah-sakit/create" class="btn" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; color: white;">+ Tambah Rumah Sakit</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div id="alertContainer"></div>

        @if ($rumahSakit->count() > 0)
            <div class="table-responsive card">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Rumah Sakit</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rumahSakit as $rs)
                            <tr id="row-{{ $rs->id }}">
                                <td>{{ ($rumahSakit->currentPage() - 1) * 10 + $loop->iteration }}</td>
                                <td>{{ $rs->namaRS }}</td>
                                <td>{{ $rs->alamat }}</td>
                                <td>{{ $rs->email }}</td>
                                <td>{{ $rs->tlp }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="/rumah-sakit/{{ $rs->id }}" class="btn btn-info btn-sm text-white">Lihat</a>
                                        <a href="/rumah-sakit/{{ $rs->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="{{ $rs->id }}" data-name="{{ $rs->namaRS }}">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $rumahSakit->links() }}
            </div>
        @else
            <div class="alert alert-info text-center" role="alert">
                <p>Tidak ada data rumah sakit. <a href="/rumah-sakit/create">Tambah rumah sakit baru</a></p>
            </div>
        @endif

        <div class="d-flex gap-2 justify-content-center mt-5">
            <a href="/dashboard" class="btn btn-secondary">Dashboard</a>
            <a href="/pasien" class="btn btn-secondary">Daftar Pasien</a>
            <a href="/rumah-sakit" class="btn" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; color: white;">Daftar Rumah Sakit</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.delete-btn').on('click', function() {
                const id = $(this).data('id');
                const name = $(this).data('name');

                if (confirm(`Apakah Anda yakin ingin menghapus "${name}"?`)) {
                    $.ajax({
                        url: `/rumah-sakit/${id}`,   // endpoint with ID
                        type: 'DELETE',             // HTTP method
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                        },
                        success: function(data) {
                            if (data.success) {
                                const row = $(`#row-${id}`);
                                row.css('opacity', '0.5');
                                setTimeout(() => {
                                    row.remove();
                                    showAlert('Rumah Sakit berhasil dihapus!', 'success');
                                }, 300);
                            } else {
                                showAlert(data.message || 'Gagal menghapus rumah sakit', 'danger');
                            }
                        },
                        error: function(xhr) {
                            console.error('Error:', xhr);
                            showAlert('Terjadi kesalahan saat menghapus rumah sakit', 'danger');
                        }
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
