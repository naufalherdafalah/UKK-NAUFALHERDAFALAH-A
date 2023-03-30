@extends('layouts.master')
@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Ubah Pengaduan</h4>
        </div>


        <div class="card-body">
            <div class="row">
                <form action="{{ route('pengaduan.update', $pengaduan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="basicInput">Tanggal</label>
                        <input name="tgl_pengaduan" type="date" class="form-control" id="basicInput" value="{{ $pengaduan->tgl_pengaduan }}">
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Foto</label>
                        <img src="{{ asset($pengaduan->foto) }}" alt="" width="100px">
                        <input name="foto" type="file" class="form-control" id="basicInput">
                        <input type="hidden" name="foto_lama" value="{{ $pengaduan->foto }}">
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Isi Laporan</label>
                        <textarea name="isi_laporan" class="form-control" cols="30" rows="2">{{ $pengaduan->isi_laporan }}</textarea>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                        <div class="form-group">
                            <strong>Akses :</strong>
                            <select class="form-select" aria-label="Default select example" name="akses">
                                <option value= "public" @if($pengaduan->akses == 'public') selected @endif>Public</option>
                                <option value="private" @if($pengaduan->akses == 'private') selected @endif>Private</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                                <div class="form-group">
                                    <strong>Kategori :</strong>
                                    <select class="form-select" aria-label="Default select example" name="kategoori">
                                        <option value= "lingkungan" @if($pengaduan->kategori == 'lingkungan') selected @endif>Lingkungan</option>
                                        <option value="sosial" @if($pengaduan->kategori == 'sosial') selected @endif>Sosial</option>
                                        <option value="agama" @if($pengaduan->kategori == 'agama') selected @endif>Agama</option>
                                        </select>
                                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                        <a href="{{ route('pengaduan.index') }}" class="btn btn-outline-danger">Kembali</a>
                        <button type="submit" class="btn btn-succes">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
