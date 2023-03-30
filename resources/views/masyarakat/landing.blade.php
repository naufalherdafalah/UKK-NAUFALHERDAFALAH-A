@extends('layouts.master')
@section('content')
    <div class="">
        <div class="card">
            <div class="card-body py-4 px-4 d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl">
                        <img src="{{ asset('assets/template/assets/images/faces/1.jpg') }}" alt="Face 1">
                    </div>
                    <div class="ms-3 name">
                        <h5 class="font-bold">{{ Auth::guard('masyarakat')->user()->nama }}</h5>
                        <h6 class="text-muted mb-0">{{ Auth::guard('masyarakat')->user()->username }}</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="ms-3 name">
                        <h5 class="font-bold">Total aduan Anda : {{ $totalAduan }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center" style="height: 55vh">
                        <div class="col">
                            <h4>Halo, Selamat datang di <br> Aplikasi Pelaporan Pengaduan Masyarakat <u class="text-info">Kecamatan Cisarua.</u></h4>
                        </div>
                        <div class="col">
                            <img src="{{ asset('assets/vectors/masyarakat-vector.svg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
