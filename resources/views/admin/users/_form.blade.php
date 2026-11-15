@csrf

<div class="row g-4">
  <div class="col-md-6">
    <label class="form-label" for="name">Name</label>
    <input type="text" id="name" name="name" value="{{ old('name', $user?->name) }}"
      class="form-control @error('name') is-invalid @enderror" required />
    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>

  <div class="col-md-6">
    <label class="form-label" for="email">Email</label>
    <input type="email" id="email" name="email" value="{{ old('email', $user?->email) }}"
      class="form-control @error('email') is-invalid @enderror" required />
    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>

  <div class="col-md-6">
    <label class="form-label" for="password">
      Password @if ($user) <span class="text-secondary">(leave blank to keep current)</span> @endif
    </label>
    <input type="password" id="password" name="password"
      class="form-control @error('password') is-invalid @enderror" @required(!$user) />
    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>

  <div class="col-md-6">
    <label class="form-label" for="password_confirmation">Confirm Password</label>
    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
      @required(!$user) />
  </div>
</div>

<div class="mt-6 d-flex gap-2">
  <button type="submit" class="btn btn-primary">{{ $user ? 'Save Changes' : 'Create Admin' }}</button>
  <a href="{{ route('admin.users.index') }}" class="btn btn-white">Cancel</a>
</div>
