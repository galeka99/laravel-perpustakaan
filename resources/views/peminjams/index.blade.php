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
            <th>Foto Peminjam</th>
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
              <td>
                @if ($peminjam->foto_peminjam)
                <button class="btn btn-sm btn-link text-secondary" onclick="showPhoto('{{ $peminjam->foto_peminjam }}')">Lihat Foto</button> 
                @else
                -
                @endif
              </td>
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
    <div id="foto-modal" class="modal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Foto Peminjam</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <img id="foto-peminjam" src="" alt="" class="w-100">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    function showPhoto(id) {
      const imageElement = document.querySelector('img#foto-peminjam');
      imageElement.setAttribute('src', `{{ url('photo') }}/${id}`);
      $('#foto-modal').modal('show');
    }
    </script>
  </div>
@endsection
