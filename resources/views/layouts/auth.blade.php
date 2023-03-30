<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Applikasi Pelaporan Pengaduan Masyarakat</title>
    <link rel="stylesheet" href="{{ asset('assets/template/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/assets/css/pages/auth.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/icons/icon-kabupaten.png') }}" type="image/x-icon">
</head>

<body>
    <div id="auth">
        <div class="row h-100 d-flex justify-content-center">
            <div class="col-md-6">
                <div id="auth-left">
                    <div class="mb-3">
                        <a href="/">
                            <img src="{{ asset('assets/icons/icon-kabupaten.png') }}" alt="Logo" width="50px"><span class="auth-title fs-3 fw-bold text-info"> AYO LAPOR!</span>
                        </a>
                    </div>

                    @yield('content')

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
