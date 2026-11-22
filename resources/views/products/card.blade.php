@extends('layouts.shop')

@section('content')
  <!-- Hero -->
  <section class="hero">
    <div class="hero-content">
      <span class="hero-badge">New Collection {{ date('Y') }}</span>
      <h1 class="hero-title font-display">Premium<br>style</h1>
      <p class="hero-subtitle">Exclusive designs crafted for those who dare to stand out. Limited drops, unlimited style.</p>
      <a href="#products" class="hero-btn">
        Shop Now
        <svg class="icon-sm" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M5 12h14M12 5l7 7-7 7"/>
        </svg>
      </a>
    </div>
  </section>

  <!-- Main Content -->
  <main class="main" id="products">
    <div class="section-header">
      <h2 class="section-title font-display">Shop Collection</h2>
      <div class="filter-buttons">
        <button type="button" class="filter-btn active" data-filter="all">All</button>
        @foreach (\App\Models\Product::CATEGORIES as $slug => $label)
          <button type="button" class="filter-btn" data-filter="{{ $slug }}">{{ $label }}</button>
        @endforeach
      </div>
    </div>

    <div class="product-grid" id="productGrid">
      @forelse ($products as $product)
        @include('products._card', ['product' => $product])
      @empty
        <div class="no-results">
          <h3>No products yet</h3>
          <p>Check back soon for new drops</p>
        </div>
      @endforelse

      @if ($products->isNotEmpty())
        <div class="no-results" id="noResults" hidden>
          <h3>No products found</h3>
          <p>Try selecting a different category</p>
        </div>
      @endif
    </div>
  </main>
@endsection