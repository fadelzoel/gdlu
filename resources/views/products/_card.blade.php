@php $soldOut = $product->quantity <= 0; @endphp

<div class="col">
  <a href="{{ route('shop.show', $product) }}"
    class="card product-card h-100 text-decoration-none shadow-sm {{ $soldOut ? 'sold-out' : '' }}">

    <div class="position-relative">
      <div class="ratio" style="--bs-aspect-ratio: 125%;">
        @if ($product->image_url)
          <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="object-fit-cover" loading="lazy">
        @else
          <div class="img-placeholder"><i class="bi bi-image fs-1 text-secondary"></i></div>
        @endif
      </div>

      @if ($soldOut)
        <span class="badge text-bg-dark position-absolute top-0 start-0 m-2">Sold out</span>
      @elseif ($product->quantity <= \App\Models\Product::LOW_STOCK)
        <span class="badge text-bg-danger position-absolute top-0 start-0 m-2">Only {{ $product->quantity }} left</span>
      @endif
    </div>

    <div class="card-body">
      <h6 class="card-title text-dark mb-1">{{ $product->name }}</h6>
      <div class="small text-secondary mb-2">
        Size {{ $product->size }}
        @if ($product->color)
          · <span class="color-dot" style="background: {{ strtolower($product->color) }}"></span> {{ $product->color }}
        @endif
      </div>
      <div class="fw-bold text-dark">{{ $product->formatted_price }}</div>
    </div>
  </a>
</div>
