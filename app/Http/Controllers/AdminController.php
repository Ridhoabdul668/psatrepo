<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function data(){
           $pegawai = DB::table('tb_pegawai')->get();
    return view('admin.data', compact('pegawai'));
    }


    public function profile(){
        return view('admin.profile');
    }
    public function index()
    {
        $pegawai = DB::table('tb_pegawai')->get();
        return view('admin.index', compact('pegawai'));
    }

    public function create()
    {
        return view('admin.tambah');
    }

    public function store(Request $request)
    {
        DB::table('tb_pegawai')->insert([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan
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

        return redirect('/admin')->with('success', 'Pegawai berhasil diupdate.');
    }

    public function destroy($id)
    {
        DB::table('tb_login')->where('pegawai_id', $id)->delete();
        DB::table('tb_pegawai')->where('id', $id)->delete();

        return redirect('/admin')->with('success', 'Pegawai berhasil dihapus.');
    }
}
