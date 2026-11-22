@php
  $shopName = config('shop.name');
  $waUrl = 'https://wa.me/' . config('shop.whatsapp');
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', $shopName . ' | STORE')</title>
  <meta name="description" content="Shop exclusive streetwear and merchandise. Direct WhatsApp orders.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Oswald:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/shop-extra.css') }}">
  @stack('styles')
</head>
<body>
  <!-- Header -->
  <header class="header">
    <div class="header-container">
      <a href="{{ route('shop.home') }}" class="logo">{{ $shopName }}</a>

      <nav>
        <ul class="nav-links">
          <li><a href="#products" data-filter="all">Shop</a></li>
          <li><a href="#products" data-filter="new">New Arrivals</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>

      <a href="{{ $waUrl }}" target="_blank" rel="noopener" class="whatsapp-btn">
        @include('shop.icons.whatsapp')
        Contact Us
      </a>

      <button class="mobile-menu-btn" onclick="toggleMobileMenu()" aria-label="Toggle menu">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>

    <div class="mobile-menu" id="mobileMenu">
      <a href="#products" data-filter="all">Shop</a>
      <a href="#products" data-filter="new">New Arrivals</a>
      <a href="#contact">Contact</a>
      <a href="{{ $waUrl }}" target="_blank" rel="noopener" class="mobile-whatsapp">
        @include('shop.icons.whatsapp')
        Contact via WhatsApp
      </a>
    </div>
  </header>

  @yield('content')

  <!-- Footer -->
  <footer class="footer" id="contact">
    <div class="footer-container">
      <div class="footer-grid">
        <div class="footer-brand">
          <a href="{{ route('shop.home') }}" class="logo">MERCH GALLERY</a>
          <p>Premium streetwear for the bold and fearless. Every piece tells a story.</p>
          <div class="social-links">
            <a href="{{ config('shop.instagram') ?: '#' }}" aria-label="Instagram">
              @include('shop.icons.instagram', ['class' => 'icon'])
            </a>
            <a href="{{ config('shop.twitter') ?: '#' }}" aria-label="Twitter">
              @include('shop.icons.twitter', ['class' => 'icon'])
            </a>
            <a href="{{ $waUrl }}" target="_blank" rel="noopener" aria-label="WhatsApp">
              @include('shop.icons.whatsapp', ['class' => 'icon'])
            </a>
          </div>
        </div>

        <div class="footer-section">
          <h4>Shop</h4>
          <ul>
            <li><a href="#products" data-filter="all">All Products</a></li>
            @foreach (collect(\App\Models\Product::CATEGORIES)->take(3) as $slug => $label)
              <li><a href="#products" data-filter="{{ $slug }}">{{ $label }}</a></li>
            @endforeach
          </ul>
        </div>

        <div class="footer-section">
          <h4>Info</h4>
          <ul>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Size Guide</a></li>
            <li><a href="#">Shipping</a></li>
            <li><a href="#">Returns</a></li>
          </ul>
        </div>

        <div class="footer-section">
          <h4>Contact</h4>
          <ul>
            <li><a href="{{ $waUrl }}" target="_blank" rel="noopener">WhatsApp</a></li>
            <li><a href="mailto:{{ config('shop.email') }}">Email Us</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
          </ul>
        </div>
      </div>

      <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} {{ $shopName }}. All rights reserved.</p>
        <p>Order via WhatsApp for fastest service</p>
      </div>
    </div>
  </footer>

  <script src="{{ asset('js/shop.js') }}"></script>
  @stack('scripts')
</body>
</html>
