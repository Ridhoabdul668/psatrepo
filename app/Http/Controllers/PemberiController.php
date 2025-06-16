<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PemberiController extends Controller
{
    public function index()
    {
        $idPemberi = Session::get('id');

        $tugas = DB::table('tb_todo')
            ->join('tb_pegawai', 'tb_todo.tugas_untuk', '=', 'tb_pegawai.id')
            ->where('tugas_dari', $idPemberi)
            ->select('tb_todo.*', 'tb_pegawai.nama as penerima')
            ->get();

        return view('pemberi.index', compact('tugas'));
    }

    public function create()
    {
        $pegawai = DB::table('tb_pegawai')->get();
        return view('pemberi.tambah', compact('pegawai'));
    }

    public function store(Request $request)
    {
        DB::table('tb_todo')->insert([
            'tugas' => $request->tugas,
            'tugas_untuk' => $request->tugas_untuk,
            'tugas_dari' => Session::get('id'),
            'waktu_selesai' => $request->waktu_selesai,
            'keterangan' => $request->keterangan,
            'status' => 'Pending',
        ]);

        return redirect('/pemberi')->with('success', 'Tugas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $tugas = DB::table('tb_todo')->where('id', $id)->first();
        $pegawai = DB::table('tb_pegawai')->get();
        return view('pemberi.edit', compact('tugas', 'pegawai'));
    }

    public function update(Request $request, $id)
    {
        DB::table('tb_todo')->where('id', $id)->update([
            'tugas' => $request->tugas,
            'tugas_untuk' => $request->tugas_untuk,
            'waktu_selesai' => $request->waktu_selesai,
            'status' => $request->status,
        ]);

        return redirect('/pemberi')->with('success', 'Tugas berhasil diupdate.');
    }

    public function destroy($id)
    {
        DB::table('tb_todo')->where('id', $id)->delete();
        return redirect('/pemberi')->with('success', 'Tugas berhasil dihapus.');
    }
}
