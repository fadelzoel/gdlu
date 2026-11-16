@extends('layouts.shop')

@section('title', $product->name . ' - ' . config('app.name'))

@section('content')
<div class="container py-5">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('shop.home') }}" class="text-dark">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('shop.catalog') }}" class="text-dark">Catalog</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
    </ol>
  </nav>

  <div class="row g-5">
    <div class="col-md-6">
      <div class="ratio rounded overflow-hidden shadow-sm" style="--bs-aspect-ratio: 125%;">
        @if ($product->image_url)
          <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="object-fit-cover">
        @else
          <div class="img-placeholder"><i class="bi bi-image display-1 text-secondary"></i></div>
        @endif
      </div>
    </div>

    <div class="col-md-6">
      <h1 class="h2 fw-bold">{{ $product->name }}</h1>
      <div class="display-6 fw-bold my-3">{{ $product->formatted_price }}</div>

      <dl class="row mb-4">
        <dt class="col-4 text-secondary fw-normal">Size</dt>
        <dd class="col-8"><span class="badge text-bg-dark">{{ $product->size }}</span></dd>

        @if ($product->color)
          <dt class="col-4 text-secondary fw-normal">Color</dt>
          <dd class="col-8">
            <span class="color-dot" style="background: {{ strtolower($product->color) }}"></span>
            {{ $product->color }}
          </dd>
        @endif

        <dt class="col-4 text-secondary fw-normal">Availability</dt>
        <dd class="col-8">
          @if ($product->quantity <= 0)
            <span class="text-danger fw-semibold">Sold out</span>
          @elseif ($product->quantity <= \App\Models\Product::LOW_STOCK)
            <span class="text-danger fw-semibold">Only {{ $product->quantity }} left</span>
          @else
            <span class="text-success fw-semibold">In stock</span>
            <span class="text-secondary">({{ $product->quantity }} available)</span>
          @endif
        </dd>
      </dl>

      @if ($variants->isNotEmpty())
        <div class="mb-4">
          <div class="small text-secondary mb-2">Also available as:</div>
          <div class="d-flex flex-wrap gap-2">
            @foreach ($variants as $variant)
              <a href="{{ route('shop.show', $variant) }}"
                class="btn btn-outline-dark btn-sm {{ $variant->quantity <= 0 ? 'disabled' : '' }}">
                {{ $variant->size }}{{ $variant->color ? ' · ' . $variant->color : '' }}
              </a>
            @endforeach
          </div>
        </div>
      @endif

      <a href="{{ route('shop.catalog') }}" class="btn btn-outline-dark">
        <i class="bi bi-arrow-left me-1"></i>Back to catalog
      </a>
    </div>
  </div>

  @if ($related->isNotEmpty())
    <hr class="my-5">
    <h2 class="h4 fw-bold mb-4">You may also like</h2>
    <div class="row row-cols-2 row-cols-md-4 g-4">
      @foreach ($related as $item)
        @include('products._card', ['product' => $item])
      @endforeach
    </div>
  @endif
</div>
@endsection
