<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | ShopApp</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f6f8;
        }

        .login-card {
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        .login-card .card-body {
            padding: 2.5rem;
        }

        .login-header {
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

        .btn-login {
            border-radius: 50px;
            padding: 10px;
            font-weight: 600;
            background: #35e2f5;
            color: #fff;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
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

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card login-card shadow">
                <div class="card-body">

                    <h4 class="login-header">Login Akun</h4>

                    <!-- Error Message -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="position-relative">
                            <i class="fa-solid fa-envelope input-icon"></i>
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>

                        <div class="position-relative">
                            <i class="fa-solid fa-lock input-icon"></i>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>

                        <button type="submit" class="btn btn-login w-100 mt-3">Login</button>
                    </form>

                    <p class="text-center mt-3 text-small">
                        Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
