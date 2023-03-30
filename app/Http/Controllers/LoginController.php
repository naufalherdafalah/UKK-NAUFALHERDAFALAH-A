<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginMasyarakat()
    {
        return view('auth.login');
    }

    public function loginMasyarakat(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);


        if (Auth::guard('masyarakat')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('masyarakat.landing');
        }
        return back()->with('error', 'Username atau Password salah.');
    }

    public function showLoginPetugas()
    {
        return view('auth.login');
    }

    public function loginPetugas(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);


        if (Auth::guard('petugas')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('petugas.landing');
        }
        return back()->with('error', 'Username atau Password salah.');
    }

    public function logout()
    {
        Auth::guard('masyarakat')->logout();
        Auth::guard('petugas')->logout();

        return redirect()->route('index')->with('success', 'Logout berhasil.');
    }
}
