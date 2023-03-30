@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header d-flex">
        <h4 class="card-title">Data Masyarakat</h4>
        <a href="{{ route('petugas.create') }}" class="btn btn-success ms-auto">
            <img src="{{ asset('assets/icons/plus-lg.svg') }}" width="20px" alt="">
            Tambah Petugas
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
                        <th>Nama</th>
                        <th>Username</th>
                        <th>No. Telepon</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($petugass as $petugas)
                        <tr>
                            <td>{{ $petugass->firstItem() + $loop->index }}</td>
                            <td class="text-bold-500">{{ $petugas->nama }}</td>
                            <td>{{ $petugas->username }}</td>
                            <td>{{ $petugas->telp }}</td>
                            <td>{{ $petugas->level }}</td>
                            <td>
                                <a class="text-decoration-none" href="/petugas/petugas/edit/{{ $petugas->id }}">
                                    <button type="button" class="btn btn-warning btn-sm">
                                        <img src="{{ asset('assets/bootstrap-icons/pencil-square.svg') }}" width="20px" alt="">
                                    </button>
                                </a>
                                <a class="text-decoration-none" href="/petugas/petugas/delete/{{ $petugas->id }}" onclick="return confirm('Are you sure to delete?')">
                                    <button type="button" class="btn btn-danger btn-sm">
                                        <img src="{{ asset('assets/bootstrap-icons/trash.svg') }}" width="20px" alt="">
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $petugass->links() }}
        </div>
    </div>
</div>
@endsection
