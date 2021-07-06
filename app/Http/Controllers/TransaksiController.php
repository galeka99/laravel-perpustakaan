<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjam;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transactions = Transaksi::all();
        $total = Transaksi::count();

        return view(
            'transaksi.index',
            ['transactions' => $transactions, 'total' => $total]
        );
    }

    public function add()
    {
        $peminjams = Peminjam::all();
        $books = Buku::all();

        return view(
            'transaksi.add',
            [
                'peminjams' => $peminjams,
                'books' => $books
            ]
        );
    }

    public function store(Request $request)
    {
        $kode_transaksi = $request->post('kode');
        $id_peminjam = $request->post('peminjam');
        $id_buku = $request->post('buku');
        $tgl_pinjam = date('Y-m-d', strtotime(now()));
        $tgl_kembali = date('Y-m-d', strtotime(date_modify(now(), '+15 day')));

        $trx = new Transaksi([
            'kode_transaksi' => $kode_transaksi,
            'id_peminjam' => $id_peminjam,
            'id_buku' => $id_buku,
            'tgl_peminjaman' => $tgl_pinjam,
            'tgl_pengembalian' => $tgl_kembali,
        ]);
        $trx->save();

        return redirect('/transaksi');
    }

    public function detail_peminjam($id)
    {
        $peminjam = Peminjam::find($id);
        if ($peminjam == null) return redirect('/transaksi');

        return view('transaksi.peminjam', ['peminjam' => $peminjam]);
    }

    public function detail_buku($id)
    {
        $buku = Buku::find($id);
        if ($buku == null) return redirect('/transaksi');

        return view('transaksi.buku', ['buku' => $buku]);
    }
}
