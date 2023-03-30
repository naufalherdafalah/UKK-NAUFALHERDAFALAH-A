@extends('layouts.master')
@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Pengaduan</h4>
        </div>


        <div class="card-body">
            <div class="row">
                <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="basicInput">Tanggal</label>
                        <input name="tgl_pengaduan" type="date" class="form-control" id="basicInput"  required>
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Foto</label>
                        <input name="foto" type="file" class="form-control" id="basicInput" required>
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Isi Laporan</label>
                        <textarea name="isi_laporan" class="form-control" cols="30" rows="2"  required></textarea>
                        <input type="hidden" name="nik" value="{{ Auth::guard('masyarakat')->user()->nik }}">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                        <div class="form-group">
                            <strong>Akses :</strong>
                            <select class="form-select" aria-label="Default select example" name="akses">
                                <option value= "public">Public</option>
                                <option value="private">Private</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                                <div class="form-group">
                                    <strong>Kategori :</strong>
                                    <select class="form-select" aria-label="Default select example" name="kategori">
                                        <option value= "lingkungan">Lingkungan</option>
                                        <option value="sosial">Sosial</option>
                                        <option value="agama">Agama</option>
                                        </select>
                                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                        <a href="{{ route('pengaduan.index') }}" class="btn btn-outline-danger">Kembali</a>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
