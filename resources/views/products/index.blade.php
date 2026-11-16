@extends('layouts.shop')

@section('title', 'Catalog - ' . config('app.name'))

@section('content')
<div class="container py-5">
  <div class="mb-4">
    <h1 class="h3 fw-bold mb-1">Catalog</h1>
    <p class="text-secondary mb-0">{{ $products->total() }} {{ \Illuminate\Support\Str::plural('item', $products->total()) }} found</p>
  </div>

  <!-- Filters -->
  <form method="GET" action="{{ route('shop.catalog') }}" class="card card-body shadow-sm border-0 mb-4">
    <div class="row g-2 align-items-end">
      <div class="col-md-4">
        <label class="form-label small mb-1" for="q">Search</label>
        <input type="search" id="q" name="q" value="{{ request('q') }}" class="form-control"
          placeholder="e.g. hoodie">
      </div>
      <div class="col-6 col-md-2">
        <label class="form-label small mb-1" for="size">Size</label>
        <select id="size" name="size" class="form-select">
          <option value="">All</option>
          @foreach (\App\Models\Product::SIZES as $size)
            <option value="{{ $size }}" @selected(request('size') === $size)>{{ $size }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-6 col-md-3">
        <label class="form-label small mb-1" for="sort">Sort by</label>
        <select id="sort" name="sort" class="form-select">
          <option value="">Newest</option>
          <option value="price_asc" @selected(request('sort') === 'price_asc')>Price: low to high</option>
          <option value="price_desc" @selected(request('sort') === 'price_desc')>Price: high to low</option>
          <option value="name" @selected(request('sort') === 'name')>Name A-Z</option>
        </select>
      </div>
      <div class="col-md-3 d-flex align-items-center gap-3">
        <div class="form-check mb-0">
          <input class="form-check-input" type="checkbox" name="in_stock" value="1" id="in_stock"
            @checked(request()->boolean('in_stock'))>
          <label class="form-check-label small" for="in_stock">In stock only</label>
        </div>
        <button class="btn btn-dark ms-auto">Apply</button>
        @if (request()->hasAny(['q', 'size', 'sort', 'in_stock']))
          <a href="{{ route('shop.catalog') }}" class="btn btn-link text-secondary p-0">Reset</a>
        @endif
      </div>
    </div>
  </form>

  <!-- Grid (from the database) -->
  @if ($products->isEmpty())
    <div class="text-center text-secondary py-5">
      <i class="bi bi-search fs-1 d-block mb-2"></i>
      No products match your filters.
    </div>
  @else
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
      @foreach ($products as $product)
        @include('products._card', ['product' => $product])
      @endforeach
    </div>

    <div class="mt-5 d-flex justify-content-center">
      {{ $products->links('pagination::bootstrap-5') }}
    </div>
  @endif
</div>
@endsection
