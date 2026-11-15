@csrf

<div class="row g-4">
  <div class="col-md-8">
    <label class="form-label" for="name">Name</label>
    <input type="text" id="name" name="name" value="{{ old('name', $product?->name) }}"
      class="form-control @error('name') is-invalid @enderror" required />
    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>

  <div class="col-md-4">
    <label class="form-label" for="size">Size</label>
    <select id="size" name="size" class="form-select @error('size') is-invalid @enderror" required>
      <option value="">Choose...</option>
      @foreach (\App\Models\Product::SIZES as $size)
        <option value="{{ $size }}" @selected(old('size', $product?->size) === $size)>{{ $size }}</option>
      @endforeach
    </select>
    @error('size') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>

  <div class="col-md-4">
    <label class="form-label" for="quantity">Quantity</label>
    <input type="number" min="0" id="quantity" name="quantity" value="{{ old('quantity', $product?->quantity ?? 0) }}"
      class="form-control @error('quantity') is-invalid @enderror" required />
    @error('quantity') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>

  <div class="col-md-4">
    <label class="form-label" for="price">Price</label>
    <input type="number" min="0" step="0.01" id="price" name="price" value="{{ old('price', $product?->price) }}"
      class="form-control @error('price') is-invalid @enderror" required />
    @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>

  <div class="col-md-4">
    <label class="form-label" for="color">Color <span class="text-secondary">(optional)</span></label>
    <input type="text" id="color" name="color" value="{{ old('color', $product?->color) }}"
      class="form-control @error('color') is-invalid @enderror" />
    @error('color') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>

  <div class="col-12">
    <label class="form-label" for="image">Image <span class="text-secondary">(jpg/png, max 2MB)</span></label>
    @if ($product?->image_url)
      <div class="mb-2">
        <img src="{{ $product->image_url }}" alt="" width="96" class="rounded" />
      </div>
    @endif
    <input type="file" id="image" name="image" accept="image/*"
      class="form-control @error('image') is-invalid @enderror" />
    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>
</div>

<div class="mt-6 d-flex gap-2">
  <button type="submit" class="btn btn-primary">{{ $product ? 'Save Changes' : 'Add Product' }}</button>
  <a href="{{ route('admin.products.index') }}" class="btn btn-white">Cancel</a>
</div>
