<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);

Route::view('/home', 'home');
Route::get('/photo/{id}', [PeminjamController::class, 'lihat_foto']);
Route::get('/data_peminjam', [PeminjamController::class, 'peminjam']);
Route::get('/peminjam', [PeminjamController::class, 'index']);
Route::post('/peminjam', [PeminjamController::class, 'store']);
Route::get('/peminjam/tambah', [PeminjamController::class, 'add']);
Route::get('/peminjam-collection', [PeminjamController::class, 'collection']);
Route::get('/peminjam/{id}', [PeminjamController::class, 'edit']);
Route::put('/peminjam/{id}', [PeminjamController::class, 'update']);
Route::delete('/peminjam/{id}', [PeminjamController::class, 'delete']);

Route::prefix('transaksi')->group(function() {
  Route::get('/', [TransaksiController::class, 'index']);
  Route::post('/', [TransaksiController::class, 'store']);
  Route::get('/tambah', [TransaksiController::class, 'add']);
  Route::get('/peminjam/{id}', [TransaksiController::class, 'detail_peminjam']);
  Route::get('/buku/{id}', [TransaksiController::class, 'detail_buku']);
});
