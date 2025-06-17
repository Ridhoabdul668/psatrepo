<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PemberiController;
use App\Http\Controllers\PenerimaController;

Route::get('/', function () {
    return view('login');
});

Route::get('/login', [AuthController::class, 'showLogin']); // untuk tampilkan form login
Route::post('/login', [AuthController::class, 'login']);    // untuk proses login
Route::get('/logout', [AuthController::class, 'logout']);

// Route::get('/admin', function () {
//     return "Selamat datang, Admin!";
// });

// Route::get('/pemberi', function () {
//     return "Halo Pemberi Tugas!";
// });

// Route::get('/penerima', function () {
//     return "Halo Penerima Tugas!";
// });


//Route pemberi
Route::middleware('checkRole:pemberi')->group(function () {
    Route::get('/pemberi', [PemberiController::class, 'index']);
    Route::get('/pemberi/tambah', [PemberiController::class, 'create']);
    Route::post('/pemberi/simpan', [PemberiController::class, 'store']);
    Route::get('/pemberi/edit/{id}', [PemberiController::class, 'edit']);
    Route::post('/pemberi/update/{id}', [PemberiController::class, 'update']);
    Route::get('/pemberi/hapus/{id}', [PemberiController::class, 'destroy']);
});

//route penerima
Route::middleware('checkRole:penerima')->group(function () {
    Route::get('/penerima', [PenerimaController::class, 'index']);
    Route::get('/penerima/edit/{id}', [PenerimaController::class, 'edit']);
    Route::post('/penerima/update/{id}', [PenerimaController::class, 'update']);
});


//route admin
Route::middleware('checkRole:admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/tambah', [AdminController::class, 'create']);
    Route::post('/admin/simpan', [AdminController::class, 'store']);
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('/admin/update/{id}', [AdminController::class, 'update']);
    Route::get('/admin/hapus/{id}', [AdminController::class, 'destroy']);
    Route::get('/admin/show/{id}', [AdminController::class, 'show']);

});