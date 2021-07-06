<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = ['kode', 'judul', 'jml_halaman', 'isbn', 'pengarang', 'tahun_terbit'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_buku', 'id');
    }

    public function peminjam()
    {
        return $this->belongsToMany(Peminjam::class, 'transaksis', 'id_buku', 'id_peminjam');
    }
}
