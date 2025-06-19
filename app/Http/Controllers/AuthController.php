<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('.login');
    }

   public function login(Request $request)
{
    $request->validate([
        'pegawai_id' => 'required',
        'kata_sandi' => 'required',
    ]);

    $login = DB::table('tb_login')->where('pegawai_id', $request->pegawai_id)->first();

    // Cek apakah akun ditemukan dan password cocok
    if ($login && $request->kata_sandi === $login->kata_sandi) {
        $pegawai = DB::table('tb_pegawai')->where('id', $login->pegawai_id)->first();

        Session::put('login', true);
        Session::put('nama', $pegawai->nama);
        Session::put('role', $login->role); // GANTI INI
        Session::put('id', $pegawai->id);

        // Redirect berdasarkan role dari tb_login
        switch ($login->role) {
            case 'admin':
                return redirect('/admin');
            case 'ceo':
                return redirect('/ceo');
            case 'staf':
                return redirect('/staf');
            case 'karyawan':
                return redirect('/karyawan');
            case 'pemberi':
                return redirect('/pemberi');
            case 'penerima':
                return redirect('/penerima');
            default:
                return back()->with('error', 'Role tidak dikenali.');
        }
    }

    return back()->with('error', 'Login gagal. Cek kembali ID dan Kata Sandi.');
}
    public function logout()
    {
        Session::flush();
        return redirect('/login')->with('success', 'Anda telah berhasil logout.');
    }
}
