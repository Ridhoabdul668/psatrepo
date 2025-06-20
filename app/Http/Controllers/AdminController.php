<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function profile()
    {
        $idPegawai = session('id');
        $pegawai = DB::table('tb_pegawai')->where('id', $idPegawai)->first();
        return view('admin.profile', compact('pegawai'));
    }
    public function pegawai()
    {
        $pegawai = DB::table('tb_pegawai')->get();
        return view('admin.pegawai', compact('pegawai'));
    }
    public function index()
    {
        $pegawai = DB::table('tb_pegawai')
        ->select('nama', 'jabatan', 'email','alamat')
        ->get();

        return view('admin.index',['pegawai' => $pegawai]);
    }

    public function create()
    {
        return view('admin.tambah');
    }

    public function store(Request $request)
    {
        DB::table('tb_pegawai')->insert([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'email' => $request->email,
            'alamat' => $request->alamat

        ]);

        $idPegawai = DB::getPdo()->lastInsertId();

        DB::table('tb_login')->insert([
            'pegawai_id' => $idPegawai,
            'kata_sandi' => $request->kata_sandi 
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

        return redirect('/admin/pegawai')->with('success', 'Pegawai berhasil diupdate.');
    }

    public function destroy($id)
    {
        DB::table('tb_login')->where('pegawai_id', $id)->delete();
        DB::table('tb_pegawai')->where('id', $id)->delete();

        return redirect('/admin/pegawai')->with('success', 'Pegawai berhasil dihapus.');
    }
}
