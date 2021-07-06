<?php

namespace Database\Seeders;

use App\Models\JenisPeminjam;
use Illuminate\Database\Seeder;

class JenisPeminjamSeeder extends Seeder
{
    public function run()
    {
        (new JenisPeminjam([
            'nama' => 'Mahasiswa',
            'keterangan' => 'Peminjam merupakan mahasiswa',
        ]))->save();
        (new JenisPeminjam([
            'nama' => 'Umum',
            'keterangan' => 'Peminjam berasal dari masyarakat umum',
        ]))->save();
        (new JenisPeminjam([
            'nama' => 'Karyawan',
            'keterangan' => 'Peminjam merupakan karyawan',
        ]))->save();
    }
}
