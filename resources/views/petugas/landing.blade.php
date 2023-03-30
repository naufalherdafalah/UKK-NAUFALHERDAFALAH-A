@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-body py-4 px-4 d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <div class="avatar avatar-xl">
                    <img src="{{ asset('assets/template/assets/images/faces/1.jpg') }}" alt="Face 1">
                </div>
                <div class="ms-3 name">
                    <h5 class="font-bold">{{ Auth::guard('petugas')->user()->nama }}</h5>
                    <h6 class="text-muted">{{ Auth::guard('petugas')->user()->username }}</h6>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <div class="ms-3 name">
                    <h5 class="font-bold">Level Anda sebagai : {{ Auth::guard('petugas')->user()->level }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon red mb-2">
                                <img src="{{ asset('assets/bootstrap-icons/person.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Total Masyarakat</h6>
                            <h6 class="font-extrabold mb-0">{{ $totalMasyarakat }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon purple mb-2">
                                    <img src="{{ asset('assets/bootstrap-icons/megaphone.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Total Aduan</h6>
                                <h6 class="font-extrabold mb-0">{{ $totalAduan }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon green mb-2">
                                    <img src="{{ asset('assets/bootstrap-icons/arrow-clockwise.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Aduan Proses</h6>
                                <h6 class="font-extrabold mb-0">{{ $aduanProses }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <img src="{{ asset('assets/bootstrap-icons/check-square.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Aduan Selesai</h6>
                                <h6 class="font-extrabold mb-0">{{ $aduanSelesai }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
