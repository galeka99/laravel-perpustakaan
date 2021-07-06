<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['kode_transaksi', 'id_peminjam', 'id_buku', 'tgl_peminjaman', 'tgl_pengembalian'];

    public function peminjam()
    {
        return $this->belongsTo(Peminjam::class, 'id_peminjam', 'id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku', 'id');
    }
}
