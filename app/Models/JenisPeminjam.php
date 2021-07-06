<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPeminjam extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'keterangan'];

    public function peminjam()
    {
        return $this->hasMany(Peminjam::class, 'jenis_id', 'id');
    }
}
