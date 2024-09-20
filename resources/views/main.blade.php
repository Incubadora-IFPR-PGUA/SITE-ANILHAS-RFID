<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMART ANILHAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid vh-100 d-flex flex-column justify-content-center align-items-center text-center">
        <!-- Navbar section -->
        <nav class="navbar bg-white rounded p-3 w-100">
            <div class="container-fluid d-flex flex-column align-items-center">
                <a class="navbar-brand d-flex flex-column align-items-center" href="#">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="img-fluid mb-3" style="max-width: 220px; height: auto;">
                    <span class="fs-2 fs-md-1 fw-semibold text-primary">SMART HARPIA</span>
                </a>
                <!-- Menu do login -->
                <ul class="navbar-nav mt-3">
                    <li class="nav-item">
                        <a class="nav-link fs-5 fs-md-4 d-flex align-items-center justify-content-center" href="{{ route('login') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#1E90FF" class="bi bi-lock-fill me-2" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                            </svg>
                            <span class="text-primary">Login</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <img src="{{ asset('incubadora.png') }}" width="160" height="80" alt="Imagem Canto Direito" class="position-absolute bottom-0 end-0 m-3 img-fluid" style="max-width: 150px; height: auto;">
</body>
</html>