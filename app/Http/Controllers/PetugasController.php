<?php

namespace App\Http\Controllers;

use App\Models\Logging;
use App\Models\Petugas;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    public function landing()
    {
        $totalAduan = Pengaduan::count();
        $aduanProses = Pengaduan::where('status', 'Proses')->count();
        $aduanSelesai = Pengaduan::where('status', 'Selesai')->count();
        $totalMasyarakat = Masyarakat::count();

        return view('petugas.landing', compact('totalAduan', 'aduanProses', 'aduanSelesai', 'totalMasyarakat'));
    }

    public function index()
    {
        $petugass = Petugas::latest()->paginate(10);
        return view('petugas.index', compact('petugass'));
    }

    public function create()
    {
        if (Auth::guard('petugas')->user()->level == 'Petugas') {
            return back()->with('error', 'Anda tidak memiliki akses.');
        }

        return view('petugas.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
            'level' => 'required',
        ]);
        $validateData['password'] = bcrypt($validateData['password']);

        Petugas::create($validateData);

        $createLog = new Logging;
        $createLog->nama = Auth::guard('petugas')->user()->nama;
        $createLog->level = Auth::guard('petugas')->user()->level;
        $createLog->aksi = 'Membuat petugas';
        $createLog->save();

        return redirect()->route('petugas.index')->with('success', 'Berhasil menambahkan petugas.');
    }

    public function edit($id)
    {
        if (Auth::guard('petugas')->user()->level == 'Petugas') {
            return back()->with('error', 'Anda tidak memiliki akses.');
        }

        $petugas = Petugas::findOrFail($id);

        return view('petugas.edit', compact('petugas'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'password' =>'required',
            'telp' =>'required',
            'level' =>'required',
        ]);
        $validateData['password'] = bcrypt($validateData['password']);

        $petugas = Petugas::findOrFail($id);
        $petugas->update($validateData);

        $createLog = new Logging;
        $createLog->nama = Auth::guard('petugas')->user()->nama;
        $createLog->level = Auth::guard('petugas')->user()->level;
        $createLog->aksi = 'Mengubah petugas';
        $createLog->save();

        return redirect()->route('petugas.index')->with('success', 'Berhasil mengubah petugas.');
    }

    public function delete($id)
    {
        if (Auth::guard('petugas')->user()->level == 'Petugas') {
            return back()->with('error', 'Anda tidak memiliki akses.');
        }

        $petugas = Petugas::findOrFail($id);
        $tanggapans = Tanggapan::where('id_petugas', $petugas->id)->get();
        foreach ($tanggapans as $tanggapan) {
            $tanggapan->delete();
        }
        $petugas->delete();

        $createLog = new Logging;
        $createLog->nama = Auth::guard('petugas')->user()->nama;
        $createLog->level = Auth::guard('petugas')->user()->level;
        $createLog->aksi = 'Menghapus petugas';
        $createLog->save();

        return redirect()->route('petugas.index')->with('success', 'Berhasil menghapus petugas.');
    }

    public function logging()
    {
        $logs = Logging::paginate(100);

        return view('petugas.log', compact('logs'));
    }
}
