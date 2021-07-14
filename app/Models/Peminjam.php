<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;

    protected $table = 'peminjam';
    protected $fillable = ['kode_peminjam', 'nama_peminjam', 'foto_peminjam', 'tgl_lahir', 'alamat', 'jenis_id'];

    public function telepon()
    {
        return $this->hasOne(Telepon::class, 'id_peminjam', 'id');
    }

    public function jenis()
    {
        return $this->belongsTo(JenisPeminjam::class, 'jenis_id', 'id');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_peminjam', 'id');
    }

    public function buku()
    {
        return $this->belongsToMany(Buku::class, 'transaksis', 'id_peminjam', 'id_buku');
    }
}
