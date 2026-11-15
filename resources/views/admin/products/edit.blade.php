@extends('admin.layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="custom-container">
  <h1 class="fs-3 mb-6">Edit Product</h1>
  <div class="card card-lg">
    <div class="card-body">
      <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.products._form', ['product' => $product])
      </form>
    </div>
  </div>
</div>
@endsection
