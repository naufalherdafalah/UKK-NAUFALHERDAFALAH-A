@extends('layouts.master')
@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Petugas</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <form action="{{ route('petugas.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="basicInput">Nama</label>
                        <input name="nama" type="text" class="form-control" id="basicInput" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Username</label>
                        <input name="username" type="text" class="form-control" id="basicInput" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Password</label>
                        <input name="password" type="password" class="form-control" id="basicInput" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Telp</label>
                        <input name="telp" type="number" class="form-control" id="basicInput" placeholder="No. Telepon" required>
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Level</label>
                        <select name="level" name="level" class="form-control" id="basicInput">
                            <option value="Petugas">Petugas</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                        <a href="{{ route('petugas.index') }}" class="btn btn-outline-danger">Kembali</a>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
