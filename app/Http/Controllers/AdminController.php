<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function tugas()
    {
        $pegawai = DB::table('tb_pegawai')->where('id', session('id'))->first(); // hanya satu orang

        $tugas = DB::table('tb_todo')
            ->where('tugas_untuk', $pegawai->id)
            ->get();

        return view('admin.tugas', compact('pegawai', 'tugas'));
    }


    public function data(){
           $pegawai = DB::table('tb_pegawai')->get();
    return view('admin.data', compact('pegawai'));
    }


   public function profile(){
    $pegawai = DB::table('tb_pegawai')->where('id', session('id'))->first();
    return view('admin.profile', compact('pegawai'));
}

    public function index()
    {
        $pegawai = DB::table('tb_pegawai')->where('id', session('id'))->first();
        return view('admin.index', compact('pegawai'));
    }

    public function create()
    {
        return view('admin.tambah');
    }

   public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'jabatan' => 'required',
        'email' => 'required|email|unique:tb_pegawai,email',
        'no_hp' => 'required|unique:tb_pegawai,no_hp',
        'alamat' => 'required',
        'kata_sandi' => 'required|min:3'
    ]);

    // Simpan ke tb_pegawai
    DB::table('tb_pegawai')->insert([
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
        'email' => $request->email,
        'no_hp' => $request->no_hp,
        'alamat' => $request->alamat,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    $idPegawai = DB::getPdo()->lastInsertId();

    // Simpan ke tb_login
    DB::table('tb_login')->insert([
        'pegawai_id' => $idPegawai,
        'kata_sandi' => $request->kata_sandi, // bisa pakai bcrypt()
        'role' => $request->jabatan, // atau bisa disesuaikan
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect('/admin')->with('success', 'Pegawai berhasil ditambahkan.');
}


    public function show($id)
{
    $pegawai = DB::table('tb_pegawai')->where('id', $id)->first();

    $tugas = DB::table('tb_todo')
        ->where('tugas_untuk', $id)
        ->get();

    return view('admin.show', compact('pegawai', 'tugas'));
}


    public function edit($id)
    {
        $pegawai = DB::table('tb_pegawai')->where('id', $id)->first();
        return view('admin.edit', compact('pegawai'));
    }

    public function update(Request $request, $id)
    {
        DB::table('tb_pegawai')->where('id', $id)->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan
        ]);

        DB::table('tb_login')->where('pegawai_id', $id)->update([
            'kata_sandi' => $request->kata_sandi
        ]);

        return redirect('/admin')->with('success', 'Pegawai berhasil diupdate.');
    }

    public function destroy($id)
    {
        DB::table('tb_login')->where('pegawai_id', $id)->delete();
        DB::table('tb_pegawai')->where('id', $id)->delete();

        return redirect('/admin')->with('success', 'Pegawai berhasil dihapus.');
    }
}
