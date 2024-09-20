<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMART ANILHAS - LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Estilo personalizado pq to com preguiça de usar bootstrap, ps: EU ODEIO FRONT -->
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }
        .auth-card {
            max-width: 400px;
            width: 100%;
            padding: 2rem;
            background: #ffffff;
            border-radius: .5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .auth-card img {
            max-width: 120px;
            height: auto;
        }
        .auth-card .btn {
            width: 100%;
            margin-bottom: 1rem;
        }
        .auth-card .btn i {
            margin-right: 0.5rem;
        }
    </style>

</head>
<body>
    <div class="auth-card">
        <!-- Logo -->
        <div class="text-center mb-4">
            <a href="/">
                <img src="{{ asset('logo.png') }}" alt="Logo">
            </a>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Google -->
            <div class="d-grid mb-3">
                <a class="btn btn-outline-danger d-flex align-items-center justify-content-center" href="{{ $authUrl }}">
                    <i class="fa-brands fa-google"></i>
                    {{ __('Login with Google') }}
                </a>
            </div>

            <!-- Facebook -->
            <div class="d-grid mb-3">
                <a class="btn btn-outline-primary d-flex align-items-center justify-content-center" href="{{ $authUrl }}">
                    <i class="fa-brands fa-facebook"></i>
                    {{ __('Login with Facebook') }}
                </a>
            </div>

            <!-- Linkedin -->
            <div class="d-grid">
                <a class="btn btn-outline-primary d-flex align-items-center justify-content-center" href="{{ $authUrl }}">
                    <i class="fa-brands fa-linkedin"></i>
                    {{ __('Login with LinkedIn') }}
                </a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>