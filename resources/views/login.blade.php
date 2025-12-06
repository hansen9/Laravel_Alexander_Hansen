<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="card" style="width: 100%; max-width: 400px;">
        <div class="card-body p-5">
            <h1 class="card-title text-center mb-4">Login</h1>

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="/login" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input
                        type="text"
                        class="form-control"
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        placeholder="Masukkan username"
                        required
                    >
                </div>

                <button type="submit" class="btn w-100 fw-semibold" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; color: white;">Login</button>
            </form>

            <p class="text-muted text-center mt-3 small">Demo: Gunakan username <strong>admin</strong></p>
        </div>
    </div>
</body>
</html>
