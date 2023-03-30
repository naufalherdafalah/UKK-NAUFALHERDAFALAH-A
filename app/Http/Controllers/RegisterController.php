<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegisterMasyarakat()
    {
        return view('auth.register');
    }

    public function registerMasyarakat(Request $request)
    {
        $validateData = $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
        ]);
        $validateData['password'] = bcrypt($request->password);

        Masyarakat::create($validateData);

        return redirect()->route('login')->with('success', 'Registrasi berhasil.');
    }
}
