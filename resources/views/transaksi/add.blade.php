@extends('layout.master')
@section('content')
<div class="container p-3">
  <form action="{{ url('/transaksi') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
      <label for="kode_transaksi">Kode Transaksi</label>
      <input type="text" name="kode" id="kode_transaksi" class="form-control" placeholder="T0001" required>
    </div>
    <div class="form-group mb-3">
      <select name="peminjam" id="peminjam" class="form-select" required>
        <option disabled selected>-- PILIH PEMINJAM --</option>
        @foreach ($peminjams as $item)
            <option value="{{ $item->id }}">{{ $item->nama_peminjam }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group mb-3">
      <select name="buku" id="buku" class="form-select" required>
        <option disabled selected>-- PILIH BUKU --</option>
        @foreach ($books as $item)
            <option value="{{ $item->id }}">{{ $item->judul }} ({{ $item->tahun_terbit }}) - {{ $item->pengarang }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group mb-3 text-end">
    <button type="submit" class="btn btn-success">Tambah Baru</button>
    </div>
  </form>
</div>
@endsection
