@extends('layout.master')
@section('content')
  <div class="container p-3">
    @if (request()->has('q'))
      <div class="mb-3">
        <span>Ditemukan {{ $peminjams->total() }} data dengan kata kunci '{{ request()->get('q') }}'</span>
      </div>
    @endif
    <div class="d-flex flex-row gap-2 mb-3">
      <div>
        <form action="{{ url('/peminjam') }}" method="GET">
          <input type="text" name="q" class="form-control form-control-sm" placeholder="Pencarian"
            value="{{ request()->get('q') }}">
        </form>
      </div>
      <a href="{{ url('/peminjam/tambah') }}" class="btn btn-sm btn-primary">Tambah Peminjam</a>
    </div>
    @include('_partial/alert')
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
          @foreach ($peminjams as $peminjam)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $peminjam->kode_peminjam }}</td>
              <td>{{ $peminjam->nama_peminjam }}</td>
              <td>{{ $peminjam->alamat }}</td>
              <td>{{ $peminjam->telepon->nomor_telepon }}</td>
              <td>{{ $peminjam->jenis->nama }}</td>
              <td><a href="{{ url('/peminjam/' . $peminjam->id) }}" class="btn btn-sm btn-link text-primary">Ubah</a>
              </td>
              <td>
                <form action="{{ url('/peminjam/' . $peminjam->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-link text-danger">Hapus</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
        <caption>
          <span>Menampilkan {{ $peminjams->firstItem() }} - {{ $peminjams->lastItem() }} item dari total
            {{ $peminjams->total() }} item</span>
        </caption>
      </table>
      {{ $peminjams->links('_partial/paginator', ['items' => $peminjams]) }}
    </div>
  </div>
@endsection
