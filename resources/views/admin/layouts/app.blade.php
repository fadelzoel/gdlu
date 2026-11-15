<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  @include('admin.partials.head.meta')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Dasher Free - Responsive Bootstrap 5 Admin Dashboard')</title>
  @stack('styles')
  @include('admin.partials.head.links')
</head>

<body>
  <!-- Vertical Sidebar -->
  <div>
    @include('admin.partials.sidebar')

    <!-- Main Content -->
    <div id="content" class="position-relative h-100">
      @include('admin.partials.topbar')
      @yield('content')
    </div>
  </div>

  @include('admin.partials.footer')

  @include('admin.partials.scripts')
  <script src="{{ asset('admin-assets/js/vendors/sidebarnav.js') }}"></script>
  @stack('scripts')
</body>

</html>
