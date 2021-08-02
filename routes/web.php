<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function() {
  Route::get('/', [IndexController::class, 'index']);
  Route::view('/login', 'login')->name('login');
  Route::post('/login', [AdminController::class, 'login']);

  Route::view('/register', 'register');
  Route::post('/register', [AdminController::class, 'register']);
});

Route::middleware('auth')->group(function() {
  Route::get('/photo/{id}', [PeminjamController::class, 'lihat_foto']);

  Route::prefix('peminjam')->group(function() {
    Route::get('/', [PeminjamController::class, 'index']);
    Route::post('/', [PeminjamController::class, 'store']);
    Route::get('/tambah', [PeminjamController::class, 'add']);
    Route::get('/{id}', [PeminjamController::class, 'edit']);
    Route::put('/{id}', [PeminjamController::class, 'update']);
    Route::delete('/{id}', [PeminjamController::class, 'delete']);
  });
  
  Route::prefix('transaksi')->group(function() {
    Route::get('/', [TransaksiController::class, 'index']);
    Route::post('/', [TransaksiController::class, 'store']);
    Route::get('/tambah', [TransaksiController::class, 'add']);
    Route::get('/peminjam/{id}', [TransaksiController::class, 'detail_peminjam']);
    Route::get('/buku/{id}', [TransaksiController::class, 'detail_buku']);
  });

  Route::get('/logout', [AdminController::class, 'logout']);
});
