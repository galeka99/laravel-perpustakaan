<?php

namespace App\Http\Controllers;

use App\Models\JenisPeminjam;
use App\Models\Peminjam;
use App\Models\Telepon;
use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    function peminjam()
    {
        $peminjam = ['Jessica', 'Maryono', 'Dina', 'Rusli'];
        return view('peminjams.data_peminjam', compact('peminjam'));
    }

    function index()
    {
        $peminjams = Peminjam::all()->sortBy('nama_peminjam');
        $total_peminjam = Peminjam::all()->count();
        return view('peminjams.index', ['peminjams' => $peminjams, 'total' => $total_peminjam]);
    }

    function add()
    {
        $jenis = JenisPeminjam::all();
        return view('peminjams.tambah', ['jenis' => $jenis]);
    }

    function store(Request $request)
    {
        $peminjam = new Peminjam([
            'kode_peminjam' => $request->post('kode'),
            'nama_peminjam' => $request->post('nama'),
            'tgl_lahir' => $request->post('tanggal'),
            'alamat' => $request->post('alamat'),
            'jenis_id' => $request->post('jenis'),
        ]);
        $peminjam->save();
        $peminjam->refresh();
        $telepon = new Telepon([
            'id_peminjam' => $peminjam->id,
            'nomor_telepon' => $request->post('telepon'),
        ]);
        $telepon->save();
        return redirect('/peminjam');
    }

    function edit($id)
    {
        $peminjam = Peminjam::find($id);
        $jenis = JenisPeminjam::all();
        if (!$peminjam) return redirect('/peminjam');
        return view('peminjams.edit', ['peminjam' => $peminjam, 'jenis' => $jenis]);
    }

    function update(Request $request, $id)
    {
        $peminjam = Peminjam::find($id);
        if (!$peminjam) return redirect('/peminjam');
        $peminjam->kode_peminjam = $request->post('kode');
        $peminjam->nama_peminjam = $request->post('nama');
        $peminjam->tgl_lahir = $request->post('tanggal');
        $peminjam->alamat = $request->post('alamat');
        $peminjam->jenis_id = $request->post('jenis');
        $peminjam->telepon->nomor_telepon = $request->post('telepon');
        $peminjam->telepon->save();
        $peminjam->save();

        return redirect('/peminjam');
    }

    function delete($id)
    {
        $peminjam = Peminjam::find($id);
        if (!$peminjam) return redirect('/peminjam');
        $peminjam->delete();

        return redirect('/peminjam');
    }

    function collection()
    {
        $peminjams = Peminjam::all();
        return response()->json([
            'all' => $peminjams,
            'first' => $peminjams->first(),
            'last' => $peminjams->last(),
            'count' => $peminjams->count(),
            'take_2' => $peminjams->take(2),
            'skip_1' => $peminjams->skip(1),
            'pluck' => $peminjams->pluck('nama_peminjam'),
            'where' => $peminjams->where('kode_peminjam', '=', 'P0007'),
            'wherein' => $peminjams->whereIn('kode_peminjam', ['P0003', 'P0007', 'P0010'])
        ], 200);
    }
}
