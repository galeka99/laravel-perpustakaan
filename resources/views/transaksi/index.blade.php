@extends('layout.master')
@section('content')
  <div class="container p-3">
    <a href="{{ url('/transaksi/tambah') }}" class="btn btn-sm btn-primary mb-3">Tambah Transaksi</a>
    <div class="table-responsive">
      <table class="table table-bordered table-striped text-center">
        <thead class="thead-dark">
          <tr>
            <th>No</th>
            <th>Kode Transaksi</th>
            <th>Nama Peminjam</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($transactions as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->kode_transaksi }}</td>
              <td><a href="{{ url('/transaksi/peminjam/'.$item->id_peminjam) }}">{{ $item->peminjam->nama_peminjam }}</a></td>
              <td><a href="{{ url('/transaksi/buku/'.$item->id_buku) }}">{{ $item->buku->judul }}</a></td>
              <td>{{ date('D, d F Y', strtotime($item->tgl_peminjaman)) }}</td>
              <td>{{ date('D, d F Y', strtotime($item->tgl_pengembalian)) }}</td>
            </tr>
          @endforeach
        </tbody>
        <caption>
          <span>Jumlah Transaksi: <strong>{{ $total }}</strong></span>
        </caption>
      </table>
    </div>
  </div>
@endsection
