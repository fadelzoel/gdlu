<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'GDLU | STORE')</title>
  <meta name="description" content="@yield('description', 'Shop exclusive streetwear and merchandise. Direct WhatsApp orders.')">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Oswald:wght@400;500;600;700&display=swap" rel="stylesheet">

  {{-- CSS --}}
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

  @include('partials.header')

  @yield('content')

  @include('partials.footer')

  {{-- JS --}}
  <script src="{{ asset('js/script.js') }}"></script>
  @stack('scripts')
</body>
</html>