@extends('layout.master')
@section('content')
<div class="container p-3">
  <a href="{{ url('/peminjam/tambah') }}" class="btn btn-sm btn-primary mb-3">Tambah Peminjam</a>
  <div class="table-responsive">
    <table class="table table-bordered table-striped text-center">
      <thead class="thead-dark">
        <tr>
          <th>No</th>
          <th>Kode Peminjam</th>
          <th>Nama Peminjam</th>
          <th>Alamat</th>
          <th>Nomor Telepon</th>
          <th>Jenis Peminjam</th>
          <th colspan="2">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($peminjams as $peminjam)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $peminjam->kode_peminjam }}</td>
          <td>{{ $peminjam->nama_peminjam }}</td>
          <td>{{ $peminjam->alamat }}</td>
          <td>{{ $peminjam->telepon->nomor_telepon }}</td>
          <td>{{ $peminjam->jenis->nama }}</td>
          <td><a href="{{ url('/peminjam/'.$peminjam->id) }}" class="btn btn-sm btn-link text-primary">Ubah</a></td>
          <td>
          <form action="{{ url('/peminjam/'.$peminjam->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-sm btn-link text-danger">Hapus</button>
          </form>
          </td>
        </tr>
        @endforeach
      </tbody>
      <caption>
      <span>Jumlah Peminjam: <strong>{{ $total }}</strong></span>
      </caption>
    </table>
  </div>
</div>
@endsection
