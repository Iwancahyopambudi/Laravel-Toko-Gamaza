<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akun | Gamaza.ID</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f6f8;
            min-height: 100vh;
        }

        .register-card {
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        .register-card .card-body {
            padding: 2.5rem;
        }

        .register-header {
            font-weight: 700;
            color: #333;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .form-control {
            border-radius: 50px;
            padding-left: 45px;
            height: 45px;
        }

        .input-icon {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #6c757d;
        }

        textarea.form-control {
            padding-top: 12px;
            padding-left: 45px;
        }

        .btn-register {
            border-radius: 50px;
            padding: 10px;
            font-weight: 600;
            background: #35e2f5;
            color: #fff;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            background: #1fa4a9;
        }

        .text-small a {
            color: #35e2f5;
            text-decoration: none;
            font-weight: 500;
        }

        .text-small a:hover {
            text-decoration: underline;
        }

        .position-relative {
            margin-bottom: 1rem;
        }

        .alert-danger {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="col-md-6 col-lg-5">

        <div class="card register-card shadow">
            <!-- HEADER -->
            <h4 class="register-header mt-3">Buat Akun Baru</h4>
            <p class="text-center mb-2 small">Daftar untuk mulai berbelanja di Gamaza.ID</p>

            <!-- BODY -->
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Nama -->
                    <div class="position-relative">
                        <i class="fa-solid fa-user input-icon"></i>
                        <input type="text" name="name" class="form-control"
                               placeholder="Nama Lengkap" required>
                    </div>

                    <!-- Email -->
                    <div class="position-relative">
                        <i class="fa-solid fa-envelope input-icon"></i>
                        <input type="email" name="email" class="form-control"
                               placeholder="Email Aktif" required>
                    </div>

                    <!-- No Telepon -->
                    <div class="position-relative">
                        <i class="fa-solid fa-phone input-icon"></i>
                        <input type="tel" name="no_telepon" class="form-control"
                               placeholder="No. Telepon (08xxxxxxxxxx)"
                               pattern="[0-9]+" required>
                    </div>

                    <!-- Alamat -->
                    <div class="position-relative">
                        <i class="fa-solid fa-location-dot input-icon"></i>
                        <textarea name="alamat"
                                  class="form-control"
                                  rows="2"
                                  placeholder="Alamat Lengkap"
                                  required></textarea>
                    </div>

                    <!-- Password -->
                    <div class="position-relative">
                        <i class="fa-solid fa-lock input-icon"></i>
                        <input type="password" name="password" class="form-control"
                               placeholder="Password" required>
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="position-relative mb-4">
                        <i class="fa-solid fa-lock input-icon"></i>
                        <input type="password" name="password_confirmation" class="form-control"
                               placeholder="Konfirmasi Password" required>
                    </div>

                    <button class="btn btn-register w-100 py-2">
                        <i class="fa-solid fa-user-plus me-2"></i> Daftar Sekarang
                    </button>
                </form>

                <p class="text-center mt-4 mb-0 small">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="fw-semibold text-decoration-none">Login di sini</a>
                </p>

            </div>
        </div>

    </div>
</div>

</body>
</html>
