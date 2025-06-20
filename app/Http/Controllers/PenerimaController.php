<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PenerimaController extends Controller
{
    public function index()
    {
        $idPenerima = Session::get('id');

        $tugas = DB::table('tb_todo')
            ->where('tugas_untuk', $idPenerima)
            ->get();

        return view('penerima.index', compact('tugas'));
    }

   public function edit($id)
{
    $tugas = DB::table('tb_todo')->where('id', $id)->first();
    return view('penerima.edit', compact('tugas'));
}

public function update(Request $request, $id)
{
    DB::table('tb_todo')->where('id', $id)->update([
        'status' => $request->status,
    ]);

    return redirect('/penerima')->with('success', 'Status tugas diperbarui.');
}

}
