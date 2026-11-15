@extends('admin.layouts.app')

@section('title', 'Add Admin')

@section('content')
<div class="custom-container">
  <h1 class="fs-3 mb-6">Add Admin User</h1>
  <div class="card card-lg">
    <div class="card-body">
      <form action="{{ route('admin.users.store') }}" method="POST">
        @include('admin.users._form', ['user' => null])
      </form>
    </div>
  </div>
</div>
@endsection
