<?php

namespace Database\Seeders;

use App\Models\Peminjam;
use App\Models\Telepon;
use Illuminate\Database\Seeder;

class PeminjamSeeder extends Seeder
{
    public function run()
    {
        (new Peminjam([
            'kode_peminjam' => 'P0001',
            'nama_peminjam' => 'Galang Ekayudha',
            'tgl_lahir' => '2000-08-10',
            'alamat' => 'Semarang',
            'jenis_id' => 1,
        ]))->save();
        (new Telepon([
            'id_peminjam' => 1,
            'nomor_telepon' => '089656544023',
        ]))->save();
    }
}
