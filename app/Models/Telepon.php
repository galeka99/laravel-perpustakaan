<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telepon extends Model
{
    use HasFactory;

    protected $fillable = ['id_peminjam', 'nomor_telepon'];

    public function peminjam()
    {
        return $this->belongsTo(Peminjam::class, 'id_peminjam', 'id');
    }
}
