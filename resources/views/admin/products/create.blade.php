@extends('admin.layouts.app')

@section('title', 'Add Product')

@section('content')
<div class="custom-container">
  <h1 class="fs-3 mb-6">Add Product</h1>
  <div class="card card-lg">
    <div class="card-body">
      <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.products._form', ['product' => null])
      </form>
    </div>
  </div>
</div>
@endsection
