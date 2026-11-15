@extends('admin.layouts.app')

@section('title', 'Products')

@section('content')
<div class="custom-container">
  @include('admin.partials.alerts')

  <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-6">
    <div>
      <h1 class="fs-3 mb-1">Products</h1>
      <p class="text-secondary mb-0">Manage your clothing stock.</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
      <i class="ti ti-plus me-1"></i>Add Product
    </a>
  </div>

  <div class="card card-lg">
    <div class="card-body">
      <form method="GET" class="row g-2 mb-4">
        <div class="col-md-4">
          <input type="search" name="search" value="{{ request('search') }}" class="form-control"
            placeholder="Search product name..." />
        </div>
        <div class="col-auto">
          <button class="btn btn-white">Search</button>
          @if (request('search'))
            <a href="{{ route('admin.products.index') }}" class="btn btn-link">Reset</a>
          @endif
        </div>
      </form>

      <div class="table-responsive">
        <table class="table align-middle text-nowrap mb-0">
          <thead>
            <tr>
              <th>Image</th>
              <th>Name</th>
              <th>Size</th>
              <th>Color</th>
              <th>Quantity</th>
              <th>Price</th>
              <th class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($products as $product)
              <tr>
                <td>
                  @if ($product->image_url)
                    <img src="{{ $product->image_url }}" alt="" width="48" height="48"
                      class="rounded object-fit-cover" />
                  @else
                    <div class="rounded bg-body-secondary d-flex align-items-center justify-content-center"
                      style="width:48px;height:48px">
                      <i class="ti ti-photo text-secondary"></i>
                    </div>
                  @endif
                </td>
                <td>{{ $product->name }}</td>
                <td><span class="badge bg-primary-subtle text-primary-emphasis">{{ $product->size }}</span></td>
                <td>{{ $product->color ?? '—' }}</td>
                <td>
                  @if ($product->quantity <= \App\Models\Product::LOW_STOCK)
                    <span class="badge text-danger-emphasis bg-danger-subtle">{{ $product->quantity }}</span>
                  @else
                    {{ $product->quantity }}
                  @endif
                </td>
                <td>{{ $product->formatted_price }}</td>
                <td class="text-end">
                  <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-white">Edit</a>
                  <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Delete {{ addslashes($product->name) }}?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr><td colspan="7" class="text-center text-secondary py-5">No products found.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <div class="mt-4">{{ $products->links() }}</div>
    </div>
  </div>
</div>
@endsection
