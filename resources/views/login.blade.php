<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Masuk - Sewa Buku</title>
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <style>
    .full-size {
      min-width: 100vw;
      min-height: 100vh;
    }

  </style>
</head>

<body>
  <main class="full-size d-flex flex-column justify-content-center align-items-center bg-dark">
    <div class="card col-12 col-md-6 col-lg-4 mb-2">
      <div class="card-header text-center text-primary fw-bold text-uppercase">Sewa Buku</div>
      <div class="card-body">
        @include('_partial.alert')
        <form action="{{ url('/login') }}" method="POST">
          @csrf
          <div class="form-group mb-2">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control">
          </div>
          <div class="form-group mb-4">
            <label for="password">Kata Sandi</label>
            <input type="password" id="password" name="password" class="form-control">
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-success">Masuk</button>
          </div>
        </form>
      </div>
      <div class="card-footer text-center">
        <a href="{{ url('/register') }}" class="text-small text-primary">Buat Akun Baru</a>
      </div>
    </div>
  </main>
</body>

</html>
