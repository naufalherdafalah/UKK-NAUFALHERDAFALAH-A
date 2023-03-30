@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="d-flex card-header">
            <h4 class="card-title">Data Tanggapan</h4>
            <a href="{{ route('generate.pdf') }}" class="btn btn-danger ms-auto">
                <img src="{{ asset('assets/bootstrap-icons/printer.svg') }}" width="20px" alt="">
                Generate Laporan
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
                            <th>Tanggal Tanggapan</th>
                            <th>Id Pengaduan</th>
                            <th>Nama Petugas</th>
                            <th>Nama Pelapor</th>
                            <th>Tanggapan</th>
                            <th>Status</th>
                            <th style="width: 150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tanggapans as $tanggapan)
                            <tr>
                                <td>{{ $tanggapans->firstItem() + $loop->index }}</td>
                                <td>{{ $tanggapan->tgl_tanggapan }}</td>
                                <td>{{ $tanggapan->id_pengaduan }}</td>
                                <td>{{ $tanggapan->getDataPetugas->nama }}</td>
                                <td>{{ $tanggapan->getDataPengaduan->getDataMasyarakat->nama }}</td>
                                <td>{{ $tanggapan->tanggapan }}</td>
                                <td>
                                    {!! 
                                        $tanggapan->getDataPengaduan->status == "0" ? '<span class="badge text-bg-secondary">Pending</span>' :
                                        ($tanggapan->getDataPengaduan->status == "Proses" ? '<span class="badge text-bg-warning">Proses</span>' : '<span class="badge text-bg-success">Selesai</span>')
                                    !!}
                                </td>
                                <td>
                                    <a class="text-decoration-none" >
                                        <button type="button" class="btn btn-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#modal{{ $loop->index }}">
                                            <img src="{{ asset('assets/bootstrap-icons/eye.svg') }}" width="20px" alt="">
                                        </button>
                                    </a>
                                    <a class="text-decoration-none" href="/petugas/tanggapan/edit/{{ $tanggapan->id }}">
                                        <button type="button" class="btn btn-warning btn-sm">
                                            <img src="{{ asset('assets/bootstrap-icons/pencil-square.svg') }}" width="20px" alt="">
                                        </button>
                                    </a>
                                    <a class="text-decoration-none" href="/petugas/tanggapan/delete/{{ $tanggapan->id }}" onclick="return confirm('Are you sure to delete?')">
                                        <button type="button" class="btn btn-danger btn-sm">
                                            <img src="{{ asset('assets/bootstrap-icons/trash.svg') }}" width="20px" alt="">
                                        </button>
                                    </a>
                                </td>
                            </tr>

                            {{-- Modal --}}
                            <div class="modal fade" id="modal{{ $loop->index }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Detail Pengaduan</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset($tanggapan->getDataPengaduan->foto) }}" alt="" class="w-100">
                                            <p>{{ $tanggapan->getDataPengaduan->isi_laporan }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary"
                                                data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Close</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
                {{ $tanggapans->links() }}
            </div>
        </div>
    </div>
@endsection