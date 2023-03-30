@extends('layouts.auth')
@section('content')

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session ('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session ('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ( request()->is('login') )
        <h1 class="fs-5 text-secondary">Login
            <div class="align-items-center text-center mb-0 me-3 my-2">
                <p style="font-size:20px"><strong>Aplikasi Pelaporan Pengaduan Masyarakat Kecamatan Cisarua</strong></p>
              </div>
              <div class="align-items-center text-center">
                  <p class="font-size:20px mb-0 me-3">login untuk melanjutkan</p>
              </div>
        </h1>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group position-relative has-icon-left mb-2">
                <input name="username" type="text" class="form-control form-control-lg" placeholder="Username">
                <div class="form-control-icon">
                    <img width="25px" src="{{ asset('assets/bootstrap-icons/person.svg') }}" alt="">
                </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-2">
                <input name="password" type="password" class="form-control form-control-lg" placeholder="Password">
                <div class="form-control-icon">
                    <img width="25px" src="{{ asset('assets/bootstrap-icons/key.svg') }}" alt="">
                </div>
            </div>
            <button class="btn btn-success btn-block btn-lg shadow-lg mt-3">Login</button>
        </form>
        <div class="text-center mt-2 text-lg fs-5">
            <p class='text-gray-600'>Belum memiliki akun? <a href="{{ route('register') }}" class="font-bold text-danger">Register</a>.</p>
            <p class='text-gray-600'><a href="{{ route('petugas.login') }}" class="font-bold text-danger">Login sebagai petugas</a></p>
        </div>
    @endif
    @if ( request()->is('petugas/login') )
        <h1 class="fs-5 text-secondary">Login Petugas</h1>

        <form action="{{ route('petugas.login') }}" method="POST">
            @csrf
            <div class="form-group position-relative has-icon-left mb-2">
                <input name="username" type="text" class="form-control form-control-lg" placeholder="Username">
                <div class="form-control-icon">
                    <img width="25px" src="{{ asset('assets/bootstrap-icons/person.svg') }}" alt="">
                </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-2">
                <input name="password" type="password" class="form-control form-control-lg" placeholder="Password">
                <div class="form-control-icon">
                    <img width="25px" src="{{ asset('assets/bootstrap-icons/key.svg') }}" alt="">
                </div>
            </div>
            <button class="btn btn-success btn-block btn-lg shadow-lg mt-3">Login</button>
        </form>
        <div class="text-center mt-2 text-lg fs-5">
            <p class='text-gray-600'><a href="{{ route('login') }}" class="font-bold text-danger">Login sebagai masyarakat</a></p>
        </div>
    @endif

@endsection
