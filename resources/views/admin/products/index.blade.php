@extends('admin.layouts.app')

@section('title', 'Products')

@section('content')
  <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <span class="fw-semibold">All Products</span>
      <button class="btn btn-sm btn-primary" disabled>+ Add Product (Soon)</button>
    </div>
    <div class="card-body">
      <table class="table table-striped table-hover border">
        <thead>
          <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($products as $product)
            <tr>
              <td>
                <img src="{{ asset('image/gallery/' . $product->image) }}" width="50" class="rounded">
              </td>
              <td>{{ $product->name }}</td>
              <td>{{ $product->category }}</td>
              <td>Rp{{ number_format($product->price, 0, ',', '.') }}</td>
              <td>
                @if($product->is_sold_out)
                  <span class="badge bg-danger">Sold Out</span>
                @elseif($product->is_new)
                  <span class="badge bg-success">New</span>
                @else
                  <span class="badge bg-secondary">Active</span>
                @endif
              </td>
              <td>
                <button class="btn btn-sm btn-outline-secondary" disabled>Edit</button>
                <button class="btn btn-sm btn-outline-danger" disabled>Delete</button>
              </td>
            </tr>
          @empty
            <tr><td colspan="6" class="text-center">Belum ada produk.</td></tr>
          @endforelse
        </tbody>
      </table>
      
      <div class="mt-4">
        {{ $products->links() }}
      </div>
    </div>
  </div>
@endsection