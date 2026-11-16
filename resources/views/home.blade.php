@extends('layouts.shop')

@section('title', config('app.name') . ' - Clothing Online Shop')

@section('content')
  <!-- Hero -->
  <section class="hero py-5">
    <div class="container py-4 py-lg-5">
      <div class="row align-items-center">
        <div class="col-lg-7">
          <span class="badge rounded-pill text-bg-light mb-3">New arrivals</span>
          <h1 class="display-4 fw-bold mb-3">Wear it your way.</h1>
          <p class="lead text-white-50 mb-4">
            Fresh styles for every day. Browse the latest pieces straight from our stock.
          </p>
          <a href="{{ route('shop.catalog') }}" class="btn btn-light btn-lg px-4">
            Shop now <i class="bi bi-arrow-right ms-1"></i>
          </a>
        </div>
        <div class="col-lg-5 d-none d-lg-block text-center">
          <i class="bi bi-handbag" style="font-size: 9rem; opacity: .25;"></i>
        </div>
      </div>
    </div>
  </section>

  <div class="container">
    <!-- Shop by size -->
    <section class="py-4">
      <div class="d-flex flex-wrap align-items-center gap-2">
        <span class="fw-semibold me-2">Shop by size:</span>
        @foreach (\App\Models\Product::SIZES as $size)
          <a href="{{ route('shop.catalog', ['size' => $size]) }}"
            class="btn btn-outline-dark btn-sm rounded-pill px-3">{{ $size }}</a>
        @endforeach
      </div>
    </section>

    <!-- Latest products (from the database) -->
    <section class="pb-4">
      <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
          <h2 class="h3 fw-bold mb-1">Latest arrivals</h2>
          <p class="text-secondary mb-0">Newest items in stock.</p>
        </div>
        <a href="{{ route('shop.catalog') }}" class="text-dark">View all <i class="bi bi-arrow-right"></i></a>
      </div>

      @if ($latest->isEmpty())
        <div class="text-center text-secondary py-5">
          <i class="bi bi-box-seam fs-1 d-block mb-2"></i>
          No products yet. Check back soon!
        </div>
      @else
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
          @foreach ($latest as $product)
            @include('products._card', ['product' => $product])
          @endforeach
        </div>
      @endif
    </section>
  </div>
@endsection
  