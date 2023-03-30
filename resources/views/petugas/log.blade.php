{{--@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header d-flex">
        <h4 class="card-title">Data Log</h4>
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
                        <th>Nama</th>
                        <th>Level</th>
                        <th>Aksi</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                        <tr>
                            <td>{{ $log->nama }}</td>
                            <td>{{ $log->level }}</td>
                            <td>{{ $log->aksi }}</td>
                            <td>{{ $log->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $logs->links() }}
        </div>
    </div>
</div>
@endsection--}}
