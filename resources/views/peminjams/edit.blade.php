@extends('layout.master')
@section('content')
<div class="container p-3">
  <form action="{{ url('/peminjam/'.$peminjam->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
      <select name="jenis" id="jenis" class="form-select">
        @foreach ($jenis as $item)
            <option value="{{ $item->id }}" @if ($item->id == $peminjam->jenis_id) selected @endif>{{ $item->nama }} - {{ $item->keterangan }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group mb-3">
      <label for="kode_peminjam">Kode Peminjam</label>
      <input type="text" name="kode" id="kode_peminjam" class="form-control" placeholder="P0001" value="{{ $peminjam->kode_peminjam }}">
    </div>
    <div class="form-group mb-3">
      <label for="nama_peminjam">Nama Peminjam</label>
      <input type="text" name="nama" id="nama_peminjam" class="form-control" placeholder="John Doe" value="{{ $peminjam->nama_peminjam }}">
    </div>
    <div class="form-group mb-3">
      <label for="foto_peminjam">Foto Peminjam</label>
      <input type="file" name="foto" id="foto_peminjam" class="form-control" accept="image/*">
    </div>
    <div class="form-group mb-3">
      <label for="tanggal_lahir">Tanggal Lahir</label>
      <input type="date" name="tanggal" id="tanggal_lahir" class="form-control" value="{{ $peminjam->tgl_lahir }}">
    </div>
    <div class="form-group mb-3">
      <label for="alamat">Alamat</label>
      <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Semarang" value="{{ $peminjam->alamat }}">
    </div>
    <div class="form-group mb-3">
      <label for="telepon">Nomor Telepon</label>
      <input type="text" name="telepon" id="telepon" class="form-control" placeholder="081234567890" value="{{ $peminjam->telepon->nomor_telepon }}">
    </div>
    <div class="form-group mb-3 text-end">
    <button type="submit" class="btn btn-success">Simpan</button>
    </div>
  </form>
</div>
@endsection
