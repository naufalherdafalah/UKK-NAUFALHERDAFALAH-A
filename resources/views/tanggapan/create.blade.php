@extends('layouts.master')
@section('content')
    <div class="d-flex justify-content-between">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Beri Tanggapan</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('tanggapan.store', $pengaduan->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="basicInput">Tanggal</label>
                                <input name="tgl_tanggapan" type="date" class="form-control" id="basicInput">
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Status</label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" value="Proses" type="radio" name="status" id="status1" checked>
                                        <label class="form-check-label" for="status1">
                                            Proses
                                        </label>
                                    </div>
                                    <div class="form-check ms-4">
                                        <input class="form-check-input" value="Selesai" type="radio" name="status" id="status2">
                                        <label class="form-check-label" for="status2">
                                            Selesai
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Tanggapan</label>
                                <textarea name="tanggapan" class="form-control" cols="30" rows="2"></textarea>
                                <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id }}">
                                <input type="hidden" name="id_petugas" value="{{ Auth::guard('petugas')->user()->id }}">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                                <a href="{{ route('tanggapan.index') }}" class="btn btn-outline-danger">Kembali</a>
                                <button type="submit" class="btn btn-danger">Tanggapi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Pengaduan</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <img src="{{ asset($pengaduan->foto) }}" alt="">
                        <p class="mt-3">{{ $pengaduan->isi_laporan }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
