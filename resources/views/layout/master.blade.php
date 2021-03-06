<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sewa Buku</title>
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</head>
<body>
  @include('layout.navbar')
  @yield('content')
  <script type="text/javascript">
  $('div.alert').not('.alert-important').delay(5000).slideUp(300);
  </script>
</body>
</html>
