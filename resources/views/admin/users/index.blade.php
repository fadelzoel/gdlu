@extends('admin.layouts.app')

@section('title', 'Admin Users')

@section('content')
<div class="custom-container">
  @include('admin.partials.alerts')

  <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-6">
    <div>
      <h1 class="fs-3 mb-1">Admin Users</h1>
      <p class="text-secondary mb-0">People who can log in to this dashboard.</p>
    </div>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
      <i class="ti ti-plus me-1"></i>Add Admin
    </a>
  </div>

  <div class="card card-lg">
    <div class="card-body">
      <form method="GET" class="row g-2 mb-4">
        <div class="col-md-4">
          <input type="search" name="search" value="{{ request('search') }}" class="form-control"
            placeholder="Search name or email..." />
        </div>
        <div class="col-auto">
          <button class="btn btn-white">Search</button>
          @if (request('search'))
            <a href="{{ route('admin.users.index') }}" class="btn btn-link">Reset</a>
          @endif
        </div>
      </form>

      <div class="table-responsive">
        <table class="table align-middle text-nowrap mb-0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Created</th>
              <th class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($users as $user)
              <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('d M Y') }}</td>
                <td class="text-end">
                  <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-white">Edit</a>
                  <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Delete {{ addslashes($user->name) }}?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr><td colspan="4" class="text-center text-secondary py-5">No users found.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <div class="mt-4">{{ $users->links() }}</div>
    </div>
  </div>
</div>
@endsection
