@extends('layout.master')

@section('content')
<div class="container">
  <h2>Data Peminjam</h2>
  <ul>
    @foreach ($peminjam as $orang)
    <li>{{ $orang }}</li>
    @endforeach
  </ul>
</div>
@endsection