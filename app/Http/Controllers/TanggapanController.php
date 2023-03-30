<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Logging;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    public function index()
    {
        $tanggapans = Tanggapan::latest()->with('getDataPetugas', 'getDataPengaduan', 'getDataMasyarakat')->paginate(5);
        return view('tanggapan.index', compact('tanggapans'));
    }

    public function create($id_pengaduan)
    {
        $pengaduan = Pengaduan::findOrFail($id_pengaduan);
        if ($pengaduan->status == 'Selesai' || $pengaduan->status == 'Proses') {
            return back()->with('error', 'Tanggapan sudah tersedia.');
        }

        return view('tanggapan.create', compact('pengaduan'));
    }

    public function store(Request $request, $id_pengaduan)
    {
        $request->validate([
            'id_pengaduan' => 'required',
            'tgl_tanggapan' => 'required',
            'tanggapan' => 'required',
            'id_petugas' => 'required',
        ]);

        $updateStatus = Pengaduan::findOrFail($id_pengaduan);
        if ($request->status == 'Selesai') {
            $updateStatus->tgl_selesai = Carbon::now();
        }
        $updateStatus->status = $request->status;
        $updateStatus->update();

        $data = new Tanggapan;
        $data->id_pengaduan = $id_pengaduan;
        if ($request->status == 'Selesai') {
            $data->tgl_tanggapan = Carbon::now();
        }
        $data->tgl_tanggapan = $request->tgl_tanggapan;
        $data->tanggapan = $request->tanggapan;
        $data->id_petugas = $request->id_petugas;
        $data->save();

        $createLog = new Logging;
        $createLog->nama = Auth::guard('petugas')->user()->nama;
        $createLog->level = Auth::guard('petugas')->user()->level;
        $createLog->aksi = 'Membuat tanggapan';
        $createLog->save();

        return redirect()->route('tanggapan.index')->with('success', 'Berhasil menambahkan tanggapan.');
    }

    public function edit($id)
    {
        $tanggapan = Tanggapan::findOrFail($id);
        $pengaduan = Pengaduan::findOrFail($tanggapan->id_pengaduan);
        return view('tanggapan.edit', compact('tanggapan', 'pengaduan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pengaduan' => 'required',
            'tgl_tanggapan' => 'required',
            'tanggapan' => 'required',
            'id_petugas' => 'required',
        ]);

        $updateStatus = Pengaduan::findOrFail($request->id_pengaduan);
        if ($updateStatus->status == 'Proses' && $request->status == 'Selesai') {
            $updateStatus->tgl_selesai = Carbon::now();
        } elseif ($updateStatus->status == 'Selesai' && $request->status == 'Proses') {
            $updateStatus->tgl_selesai = null;
        }
        $updateStatus->status = $request->status;
        $updateStatus->update();

        $data = Tanggapan::findOrFail($id);
        $data->tgl_tanggapan = $request->tgl_tanggapan;
        $data->tanggapan = $request->tanggapan;
        $data->id_petugas = $request->id_petugas;
        $data->update();

        $createLog = new Logging;
        $createLog->nama = Auth::guard('petugas')->user()->nama;
        $createLog->level = Auth::guard('petugas')->user()->level;
        $createLog->aksi = 'Mengubah tanggapan';
        $createLog->save();

        return redirect()->route('tanggapan.index')->with('success', 'Berhasil mengubah tanggapan.');
    }

    public function delete($id)
    {
        $tanggapan = Tanggapan::findOrFail($id);
        $tanggapanIdentik = Tanggapan::findOrFail($tanggapan->id_pengaduan);
        $pengaduan = Pengaduan::findOrFail($tanggapan->id_pengaduan);

        if ($tanggapan && $pengaduan) {
            $tanggapan->delete();
            $tanggapanIdentik->delete();
            $pengaduan->delete();

            $createLog = new Logging;
            $createLog->nama = Auth::guard('petugas')->user()->nama;
            $createLog->level = Auth::guard('petugas')->user()->level;
            $createLog->aksi = 'Menghapus tanggapan';
            $createLog->save();

            return redirect()->route('tanggapan.index')->with('success', 'Berhasil menghapus tanggapan.');
        }
        return back()->with('error', 'Gagal menghapus tanggapan.');
    }

    public function generatePDF()
    {

        if (Auth::guard('petugas')->user()->level == 'Petugas') {
            return back()->with('error', 'Anda tidak memiliki akses.');
        }

        $admin = Auth::guard('petugas')->user()->nama;
        $tanggapans = Tanggapan::latest()->with('getDataPetugas', 'getDataPengaduan')->get();

        $data = [
            'judul' => 'Generate Tanggapan dan Pengaduan',
            'admin' => $admin,
            'tanggapans' => $tanggapans,
        ];

        $pdf = Pdf::loadView('tanggapan.generate_pdf', $data)->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
