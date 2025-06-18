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

        if ($login && $request->kata_sandi === $login->kata_sandi) {
            $pegawai = DB::table('tb_pegawai')->where('id', $login->pegawai_id)->first();

            Session::put('login', true);
            Session::put('nama', $pegawai->nama);
            Session::put('role', $pegawai->jabatan);
            Session::put('id', $pegawai->id);

            // Redirect berdasarkan role
            if ($pegawai->jabatan == 'admin') {
                return redirect('/admin');
            } elseif ($pegawai->jabatan == 'ceo') {
                return redirect('/ceo');
            } elseif ($pegawai->jabatan == 'staf') {
                return redirect('/staf');
            } elseif ($pegawai->jabatan == 'karyawan') {
                return redirect('/karyawan');
            } elseif ($pegawai->jabatan == 'pemberi') {
                return redirect('/pemberi');
            } elseif ($pegawai->jabatan == 'penerima') {
                return redirect('/penerima');
            }
        }

        return back()->with('error', 'Login gagal. Cek kembali ID dan Kata Sandi.');
    }

   public function logout()
{
    session()->flush(); // hapus semua session
    return redirect('/login'); // arahkan ke halaman login
}

    }

