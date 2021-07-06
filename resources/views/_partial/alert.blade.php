@if (session('alert'))
  <div class="alert alert-{{ session('alert') }} {{ session('important') ? 'alert-important' : '' }}">
    {{ session('message') }}
  </div>
@endif
