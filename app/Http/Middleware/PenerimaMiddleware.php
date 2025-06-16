<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PenerimaMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Session::get('role') !== 'penerima') {
            return redirect('/login')->with('error', 'Akses ditolak.');
        }

        return $next($request);
    }
}
