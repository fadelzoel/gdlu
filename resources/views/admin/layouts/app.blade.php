<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Dashboard') — GDLU Admin</title>

  <!-- Panggil CSS CoreUI dari folder admin-assets -->
  <!-- (Sesuaikan nama file css-nya jika berbeda, misal: style.css, coreui.css, dll) -->
  <link rel="stylesheet" href="{{ asset('admin-assets/css/style.css') }}">
  
</head>
<body>

  <!-- Sidebar -->
  @include('admin.partials.sidebar')

  <!-- Wrapper Utama -->
  <div class="wrapper d-flex flex-column min-vh-100">
    
    <!-- Header -->
    @include('admin.partials.topbar')

    <!-- Content -->
    <div class="body flex-grow-1 px-3">
      <div class="container-lg">
        @yield('content')
      </div>
    </div>
  </div>

  <!-- Panggil JS CoreUI dari folder admin-assets -->
  <!-- (Sesuaikan nama file js-nya jika berbeda) -->
  <script src="{{ asset('admin-assets/js/coreui.bundle.min.js') }}"></script>
  <script src="{{ asset('admin-assets/js/app.js') }}"></script>
  
</body>
</html>