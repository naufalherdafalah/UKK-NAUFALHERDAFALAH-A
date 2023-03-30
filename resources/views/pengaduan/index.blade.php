@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header d-flex">
            <h4 class="card-title">Data Pengaduan</h4>
            <a href="{{ route('pengaduan.create') }}" class="btn btn-success ms-auto">
                <img src="{{ asset('assets/icons/plus-lg.svg') }}" width="20px" alt="">
                Tambah Pengaduan
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
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
                <table class="table table-striped table-dark mb-2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Isi Laporan</th>
                            <th>Foto</th>
                            <th>kategori</th>
                            <th>Akses</th>
                            <th>Status</th>
                            <th style="width: 100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengaduans as $pengaduan)
                            <tr>
                                <td>{{ $pengaduans->firstItem() + $loop->index }}</td>
                                <td>{{ $pengaduan->tgl_pengaduan }}</td>
                                <td>{{ $pengaduan->isi_laporan }}</td>
                                <td>
                                    @if ($pengaduan->foto != "-")
                                        <img src="{{ asset($pengaduan->foto) }}" alt="foto aduan" width="100px">
                                    @else
                                        {{ $pengaduan->foto }}
                                    @endif
                                </td>
                                <td>{{ $pengaduan->kategori }}</td>
                                <td>{{ $pengaduan->akses }}</td>
                                <td>
                                    {!!
                                        $pengaduan->status == "0" ? '<span class="badge text-bg-secondary">Pending</span>' :
                                        ($pengaduan->status == "Proses" ? '<span class="badge text-bg-warning">Proses</span>' : '<span class="badge text-bg-success">Selesai</span>')
                                    !!}
                                </td>
                                <td>
                                    <a class="text-decoration-none" href="/pengaduan/edit/{{ $pengaduan->id }}">
                                        <button type="button" class="btn btn-warning btn-sm">
                                            <img src="{{ asset('assets/bootstrap-icons/pencil-square.svg') }}" width="20px" alt="">
                                        </button>
                                    </a>
                                    <a class="text-decoration-none" href="{{ route('pengaduan.delete', $pengaduan->id) }}" onclick="return confirm('Are you sure to delete?')">
                                        <button type="button" class="btn btn-danger btn-sm">
                                            <img src="{{ asset('assets/bootstrap-icons/trash.svg') }}" width="20px" alt="">
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pengaduans->links() }}
            </div>
        </div>
    </div>
@endsection
