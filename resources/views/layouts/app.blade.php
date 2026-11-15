<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Dashboard') - GDLU Admin</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800&display=swap" />
  
  <!-- Libs CSS (Sesuaikan path jika perlu) -->
  <link rel="stylesheet" href="{{ asset('admin-assets/css/theme.css') }}" />
  
  @stack('styles')
</head>
<body>
  <!-- Vertical Sidebar -->
  <div>
    @include('admin.partials.sidebar')

    <!-- Main Content -->
    <div id="content" class="position-relative h-100">
      @include('admin.partials.topbar')
      
      <!-- container untuk isi halaman -->
      <div class="custom-container">
        @yield('content')
      </div>
    </div>
  </div>

  <!-- Libs JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Theme JS -->
  <script src="{{ asset('admin-assets/js/main.js') }}"></script>
  
  @stack('scripts')
</body>
</html>