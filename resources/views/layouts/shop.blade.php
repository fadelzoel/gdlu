<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', config('app.name'))</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

  <style>
    body { font-family: 'Poppins', system-ui, sans-serif; background: #fafafa; }
    .hero { background: linear-gradient(135deg, #111827 0%, #374151 100%); color: #fff; }
    .product-card { border: 0; transition: transform .15s ease, box-shadow .15s ease; overflow: hidden; }
    .product-card:hover { transform: translateY(-4px); box-shadow: 0 .75rem 1.5rem rgba(0, 0, 0, .12); }
    .product-card.sold-out { opacity: .65; }
    .color-dot { width: .8rem; height: .8rem; border-radius: 50%; display: inline-block;
                 border: 1px solid rgba(0, 0, 0, .25); vertical-align: middle; }
    .img-placeholder { background: #e9ecef; display: flex; align-items: center; justify-content: center; }
  </style>
  @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100">

  <nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="{{ route('shop.home') }}">
        <i class="bi bi-bag-heart me-1"></i>{{ config('app.name') }}
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#shopNav"
        aria-controls="shopNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="shopNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('shop.home') ? 'active fw-semibold' : '' }}"
              href="{{ route('shop.home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('shop.catalog', 'shop.show') ? 'active fw-semibold' : '' }}"
              href="{{ route('shop.catalog') }}">Catalog</a>
          </li>
        </ul>

        <form action="{{ route('shop.catalog') }}" method="GET" class="d-flex" role="search">
          <input class="form-control me-2" type="search" name="q" value="{{ request('q') }}"
            placeholder="Search clothes..." aria-label="Search">
          <button class="btn btn-dark" type="submit"><i class="bi bi-search"></i></button>
        </form>
      </div>
    </div>
  </nav>

  <main class="flex-grow-1">
    @yield('content')
  </main>

  <footer class="bg-white border-top py-4 mt-5">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
      <span class="text-secondary small">&copy; {{ date('Y') }} {{ config('app.name') }}. College project.</span>
      <a href="{{ route('admin.dashboard') }}" class="small text-secondary text-decoration-none">
        <i class="bi bi-person-lock me-1"></i>Admin
      </a>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>
</html>
