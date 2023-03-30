<?php

namespace App\Http\Controllers;

use App\Models\Logging;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->latest()->paginate(5);
        return view('pengaduan.index', compact('pengaduans'));
    }

    public function indexPetugas()
    {
        $pengaduans = Pengaduan::latest()->with('getDataMasyarakat', 'getDataTanggapan')->paginate(5);
        return view('pengaduan.indexPetugas', compact('pengaduans'));
    }

    public function pengaduanLanding()
    {
        $pengaduanPending = Pengaduan::where('status', '0')->whereAkses('public')->with('getDataMasyarakat')->get();
        $pengaduanProses = Pengaduan::where('status', 'Proses')->whereAkses('public')->with('getDataMasyarakat', 'getDataTanggapan')->get();
        $pengaduanSelesai = Pengaduan::where('status', 'Selesai')->whereAkses('public')->with('getDataMasyarakat')->get();
        $totalAduan = Pengaduan::count();

        return view('welcome', compact('pengaduanPending', 'pengaduanProses', 'pengaduanSelesai', 'totalAduan'));
    }

    public function create()
    {
        return view('pengaduan.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'tgl_pengaduan' => 'required',
            'isi_laporan' => 'required',
            'foto' => 'image|mimes:png,jpg',
            'nik' => 'required',
            'akses' =>'required',
            'kategori' =>'required'
        ]);


        if ($request->file('foto')) {
            $fileImage = hexdec(uniqid()) . "." . $request->foto->extension();
            Image::make($request->file('foto'))->save('assets/images/' . $fileImage);
            $pengaduanImage = 'assets/images/' . $fileImage;

            $validateData['foto'] = $pengaduanImage;
            $validateData['status'] = "0";

            Pengaduan::create($validateData);
        } else {
            $validateData['foto'] = "-";
            $validateData['status'] = "0";

            Pengaduan::create($validateData);
        }

        $createLog = new Logging;
        $createLog->nama = Auth::guard('masyarakat')->user()->nama;
        $createLog->level = 'Masyarakat';
        $createLog->aksi = 'Membuat aduan';
        $createLog->save();

        return redirect()->route('pengaduan.index')->with('success', 'Berhasil menambahkan pengaduan.');
    }

    public function edit($id)
    {
        $pengaduan = Pengaduan::find($id);
        if ($pengaduan->status == 'Selesai') {
            return back()->with('error', 'Status pengaduan sudah selesai.');
        }
        return view('pengaduan.edit', compact('pengaduan'));
    }

    public function update(Request $request, $id)
    {
        if ($request->file('foto')) {
            $fileImage = hexdec(uniqid()) . "." . $request->foto->extension();
            Image::make($request->file('foto'))->save('assets/images/' . $fileImage);
            $pengaduanImage = 'assets/images/' . $fileImage;

            $data = Pengaduan::findOrFail($id);
            $data->tgl_pengaduan = $request->tgl_pengaduan;
            $data->isi_laporan = $request->isi_laporan;
            $data->foto = $pengaduanImage;
            $data->akses = $request->akses;
            $data->kategori = $request->kategori;
            $data->update();
        } else {
            $data = Pengaduan::findOrFail($id);
            $data->tgl_pengaduan = $request->tgl_pengaduan;
            $data->isi_laporan = $request->isi_laporan;
            $data->foto = $request->foto_lama;
            $data->akses = $request->akses;
            $data->kategori = $request->kategori;
            $data->update();
        }

        $createLog = new Logging;
        $createLog->nama = Auth::guard('masyarakat')->user()->nama;
        $createLog->level = 'Masyarakat';
        $createLog->aksi = 'Mengubah aduan';
        $createLog->save();

        return redirect()->route('pengaduan.index')->with('success', 'Berhasil mengubah pengaduan.');
    }

    public function delete($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $tanggapan = Tanggapan::where('id_pengaduan', $id);
        if ($pengaduan && $tanggapan) {
            $pengaduan->delete();
            $tanggapan->delete();
            if (Auth::guard('masyarakat')->user()) {

                $createLog = new Logging;
                $createLog->nama = Auth::guard('masyarakat')->user()->nama;
                $createLog->level = 'Masyarakat';
                $createLog->aksi = 'Menghapus aduan';
                $createLog->save();

                return redirect()->route('pengaduan.index')->with('success', 'Berhasil menghapus pengaduan.');
            }

            $createLog = new Logging;
            $createLog->nama = Auth::guard('petugas')->user()->nama;
            $createLog->level = Auth::guard('petugas')->user()->level;;
            $createLog->aksi = 'Menghapus aduan';
            $createLog->save();

            return redirect()->route('pengaduan.indexPetugas')->with('success', 'Berhasil menghapus pengaduan.');
        }
        return redirect()->route('pengaduan.index')->with('error', 'Gagal menghapus pengaduan.');
    }
}
