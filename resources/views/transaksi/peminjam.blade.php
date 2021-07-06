@extends('layout.master')
@section('content')
  <div class="container p-3">
    <table class="table table-sm table-bordered table-striped">
      <thead class="table-dark text-center">
        <tr>
          <th colspan="2">DETAIL PEMINJAM</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Kode Peminjam</td>
          <td class="fw-bold">{{ $peminjam->kode_peminjam }}</td>
        </tr>
        <tr>
          <td>Nama Peminjam</td>
          <td class="fw-bold">{{ $peminjam->nama_peminjam }}</td>
        </tr>
        <tr>
          <td>Tanggal Lahir</td>
          <td class="fw-bold">{{ date('D, d F Y', strtotime($peminjam->tgl_lahir)) }}</td>
        </tr>
        <tr>
          <td>Telepon</td>
          <td class="fw-bold">{{ $peminjam->telepon->nomor_telepon }}</td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td class="fw-bold">{{ $peminjam->alamat }}</td>
        </tr>
        <tr>
          <td>Jenis</td>
          <td class="fw-bold">{{ $peminjam->jenis->nama }}</td>
        </tr>
      </tbody>
    </table>
    <div class="table-responsive">
      <table class="table table-sm table-bordered table-striped text-center">
        <thead class="table-dark">
          <tr>
            <th colspan="7">BUKU YANG PERNAH DIPINJAM</th>
          </tr>
          <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Judul</th>
            <th>Halaman</th>
            <th>ISBN</th>
            <th>Pengarang</th>
            <th>Tahun Terbit</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($peminjam->buku as $book)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $book->kode }}</td>
              <td>{{ $book->judul }}</td>
              <td>{{ $book->jml_halaman }}</td>
              <td>{{ $book->isbn }}</td>
              <td>{{ $book->pengarang }}</td>
              <td>{{ $book->tahun_terbit }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
