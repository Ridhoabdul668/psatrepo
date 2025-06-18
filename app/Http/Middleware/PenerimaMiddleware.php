<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PenerimaMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Session::get('role') !== 'staf,karyawan') {
            return redirect('/login')->with('error', 'Akses ditolak.');
        }

        return $next($request);
    }
}
