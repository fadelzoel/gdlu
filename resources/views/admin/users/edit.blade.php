@extends('admin.layouts.app')

@section('title', 'Edit Admin')

@section('content')
<div class="custom-container">
  <h1 class="fs-3 mb-6">Edit Admin User</h1>
  <div class="card card-lg">
    <div class="card-body">
      <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @method('PUT')
        @include('admin.users._form', ['user' => $user])
      </form>
    </div>
  </div>
</div>
@endsection
