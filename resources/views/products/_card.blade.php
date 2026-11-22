@php
  $soldOut = $product->is_sold_out;

  $message = "Hi! I'm interested in buying:\n\n"
    . "*{$product->name}*\n"
    . "Size: {$product->size}\n"
    . ($product->color ? "Color: {$product->color}\n" : '')
    . "Price: {$product->formatted_price}\n\n"
    . "Please let me know if it's available!";

  $buyLink = $soldOut ? '#' : 'https://wa.me/' . config('shop.whatsapp') . '?text=' . rawurlencode($message);
  $buyText = $soldOut ? 'Sold Out' : 'Buy via WhatsApp';
@endphp

<article class="product-card {{ $soldOut ? 'sold-out' : '' }}"
  data-category="{{ $product->category }}" data-new="{{ $product->is_new && !$soldOut ? 1 : 0 }}">
  <div class="product-image-wrapper">
    @if ($product->image_url)
      <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-image" loading="lazy">
    @else
      <div class="product-image product-image-empty">
        <svg class="icon" style="width:40px;height:40px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
          <rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/>
        </svg>
      </div>
    @endif

    @if ($soldOut)
      <span class="product-badge badge-sold-out">Sold Out</span>
    @elseif ($product->is_new)
      <span class="product-badge badge-new">New</span>
    @endif

    <div class="product-overlay">
      <a href="{{ $buyLink }}" target="_blank" rel="noopener" class="buy-btn {{ $soldOut ? 'disabled' : '' }}">
        @unless ($soldOut) @include('shop.icons.whatsapp') @endunless
        {{ $buyText }}
      </a>
    </div>
  </div>

  <div class="product-info">
    <p class="product-category">{{ $product->category_label }}</p>
    <h3 class="product-name">{{ $product->name }}</h3>
    <p class="product-meta">Size {{ $product->size }}@if ($product->color) · {{ $product->color }}@endif</p>
    <div class="product-price">
      <span class="current-price">{{ $product->formatted_price }}</span>
      @if ($product->has_discount)
        <span class="original-price">{{ $product->formatted_original_price }}</span>
      @endif
    </div>

    <div class="mobile-buy-btn">
      <a href="{{ $buyLink }}" target="_blank" rel="noopener" class="{{ $soldOut ? 'disabled' : '' }}">
        @unless ($soldOut) @include('shop.icons.whatsapp') @endunless
        {{ $buyText }}
      </a>
    </div>
  </div>
</article>
