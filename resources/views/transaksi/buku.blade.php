@extends('layout.master')
@section('content')
  <div class="container p-3">
    <table class="table table-sm table-bordered table-striped">
      <thead class="table-dark text-center">
        <tr>
          <th colspan="2">DETAIL BUKU</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Kode Buku</td>
          <td class="fw-bold">{{ $buku->kode }}</td>
        </tr>
        <tr>
          <td>Judul</td>
          <td class="fw-bold">{{ $buku->judul }}</td>
        </tr>
        <tr>
          <td>Jumlah Halaman</td>
          <td class="fw-bold">{{ $buku->jml_halaman }} halaman</td>
        </tr>
        <tr>
          <td>ISBN</td>
          <td class="fw-bold">{{ $buku->isbn }}</td>
        </tr>
        <tr>
          <td>Pengarang</td>
          <td class="fw-bold">{{ $buku->pengarang }}</td>
        </tr>
        <tr>
          <td>Tahun Terbit</td>
          <td class="fw-bold">{{ $buku->tahun_terbit }}</td>
        </tr>
      </tbody>
    </table>
    <div class="table-responsive">
      <table class="table table-sm table-bordered table-striped text-center">
        <thead class="table-dark">
          <tr>
            <th colspan="7">RIWAYAT PEMINJAM</th>
          </tr>
          <tr>
            <th>No</th>
            <th>Kode Peminjam</th>
            <th>Nama Peminjam</th>
            <th>Tanggal Lahir</th>
            <th>Nomor Telepon</th>
            <th>Alamat</th>
            <th>Jenis</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($buku->peminjam as $peminjam)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $peminjam->kode_peminjam }}</td>
              <td>{{ $peminjam->nama_peminjam }}</td>
              <td>{{ date('D, d F Y', strtotime($peminjam->tgl_lahir)) }}</td>
              <td>{{ $peminjam->telepon->nomor_telepon }}</td>
              <td>{{ $peminjam->alamat }}</td>
              <td>{{ $peminjam->jenis->nama }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
