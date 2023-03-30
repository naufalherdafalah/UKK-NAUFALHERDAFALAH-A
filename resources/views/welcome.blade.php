<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}">
    <title>Aplikasi Pelaporan Pengaduan Masyarakat</title>
</head>
<body>
    <nav class="navbar bg-success navbar-expand-lg" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="">
                <img src="{{ asset('assets/icons/icon-kabupaten.png') }}" alt="" width="30px">
                <span>AYO LAPOR!</span>
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item me-2">
                        <a href="/login"><button type="button" class="btn text-white">Login</button></a>
                    </li>
                    <li class="nav-item">
                        <a href="/register"><button type="button" class="btn btn-outline-light">Register</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex align-items-center" style="height: 60vh">
            <div class="col-md-8">
                <h1>Aplikasi Pelaporan Pengaduan Masyarakat <u class="text-info"><span>Kecamatan Cisarua</span></u></h1>
                <p>Layanan Pelaporan Pengaduan Masyarakat Kecamatan Cisarua. Sampaikan laporan Anda langsung kepada Kami.</p>
                <div class="card py-2 text-white text-center col-md-6 bg-success">
                    <h5 class="mb-0">Total Pengaduan : {{ $totalAduan }}</h5>
                </div>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('assets/vectors/landing-vector.svg') }}" alt="">
            </div>
        </div>
        <div class="mt-4" style="height: 40vh">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-white">
                            <img src="{{ asset('assets/bootstrap-icons/pencil-square.svg') }}">
                            Tulis Laporan
                        </div>
                        <div class="card-body text-danger-emphasis">
                            <p>Laporkan keluhan Anda dengan jelas dan lengkap</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{ asset('assets/bootstrap-icons/chat-dots.svg') }}">
                            Proses Tindak Lanjut dan Tanggapan
                        </div>
                        <div class="card-body text-warning-emphasis">
                            <p>Pihak instansi akan menindaklanjuti dan menanggapi laporan Anda</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-white">
                            <img src="{{ asset('assets/bootstrap-icons/check-lg.svg') }}">
                            Selesai
                        </div>
                        <div class="card-body text-success-emphasis">
                            <p>Laporan Anda akan terus ditindaklanjuti hingga selesai</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-md-4 mx-2">
                <div class="card mb-5">
                    <div class="card-header">
                        Pengaduan Belum Ditanggapi
                    </div>
                    <div class="card-body">
                        @forelse ($pengaduanPending as $pengaduan)
                            <div class="card mt-2">
                                <div class="card-body">
                                    <img class="w-100" src="{{ asset($pengaduan->foto) }}" alt="">
                                    <h5 class="card-title">{{ $pengaduan->getDataMasyarakat->nama }} <span class="badge bg-secondary">Pending</span></h5>
                                    <p class="m-0"><strong>Tanggal Pengaduan :</strong> {{ $pengaduan->tgl_pengaduan }}</p>
                                    <p class="card-text">{{ Str::limit($pengaduan->isi_laporan, 150, '...') }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="d-flex justify-content-center">
                                <p>Tidak ada data</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-md-4 mx-2">
                <div class="card mb-5">
                    <div class="card-header">
                        Pengaduan Diproses
                    </div>
                    <div class="card-body">
                        @forelse ($pengaduanProses as $pengaduan)
                            <div class="card mt-2">
                                <div class="card-body">
                                    <img class="w-100" src="{{ asset($pengaduan->foto) }}" alt="">
                                    <h5 class="card-title">{{ $pengaduan->getDataMasyarakat->nama }} <span class="badge bg-warning">{{ $pengaduan->status }}</span></h5>
                                    <p class="m-0"><strong>Tanggal Pengaduan :</strong> {{ $pengaduan->tgl_pengaduan }}</p>
                                    <p class="m-0"><strong>Tanggal Proses :</strong> {{ $pengaduan->getDataTanggapan->tgl_tanggapan }}</p>
                                    <p class="card-text">{{ Str::limit($pengaduan->isi_laporan, 150, '...') }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="d-flex justify-content-center">
                                <p>Tidak ada data</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-md-4 mx-2">
                <div class="card mb-5">
                    <div class="card-header">
                        Pengaduan Selesai
                    </div>
                    <div class="card-body">
                        @forelse ($pengaduanSelesai as $pengaduan)
                            <div class="card mt-2">
                                <div class="card-body">
                                    <img class="w-100" src="{{ asset($pengaduan->foto) }}" alt="">
                                    <h5 class="card-title">{{ $pengaduan->getDataMasyarakat->nama }} <span class="badge bg-success">{{ $pengaduan->status }}</span></h5>
                                    <p class="m-0"><strong>Tanggal Pengaduan :</strong> {{ $pengaduan->tgl_pengaduan }}</p>
                                    <p class="m-0"><strong>Tanggal Proses :</strong> {{ $pengaduan->getDataTanggapan->tgl_tanggapan }}</p>
                                    <p class="m-0"><strong>Tanggal Selesai :</strong> {{ $pengaduan->tgl_selesai }}</p>
                                    <p class="card-text">{{ Str::limit($pengaduan->isi_laporan, 150, '...') }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="d-flex justify-content-center">
                                <p>Tidak ada data</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

   <nav class="navbar bg-dark text-secondary">
        <div class="container justify-content-center">
            <span class="">&copy; Copyright 2023  Allright Reserved.</span>
        </div>
    </nav>

    <script src="{{ asset('assets/bootstrap/js/bootstrap.js') }}"></script>
</body>
</html>
