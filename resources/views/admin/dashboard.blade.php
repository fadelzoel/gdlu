@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="custom-container">
  @include('admin.partials.alerts')

  <div class="mb-6">
    <h1 class="fs-3 mb-1">Dashboard</h1>
    <p class="text-secondary mb-0">Overview of your clothing shop.</p>
  </div>

  <!-- Stat cards -->
  <div class="row g-6 mb-6">
    <div class="col-xl-3 col-md-6">
      <div class="card card-lg h-100">
        <div class="card-body d-flex align-items-center gap-4">
          <div class="icon-shape icon-lg bg-primary-subtle text-primary-emphasis rounded-circle">
            <i class="ti ti-shirt fs-3"></i>
          </div>
          <div>
            <span class="text-secondary">Products</span>
            <h3 class="mb-0">{{ $totalProducts }}</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card card-lg h-100">
        <div class="card-body d-flex align-items-center gap-4">
          <div class="icon-shape icon-lg bg-success-subtle text-success-emphasis rounded-circle">
            <i class="ti ti-cash fs-3"></i>
          </div>
          <div>
            <span class="text-secondary">Total Revenue</span>
            <h3 class="mb-0">Rp{{ number_format($totalRevenue, 0, ',', '.') }}</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card card-lg h-100">
        <div class="card-body d-flex align-items-center gap-4">
          <div class="icon-shape icon-lg bg-info-subtle text-info-emphasis rounded-circle">
            <i class="ti ti-receipt fs-3"></i>
          </div>
          <div>
            <span class="text-secondary">Transactions</span>
            <h3 class="mb-0">{{ $totalSales }}</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card card-lg h-100">
        <div class="card-body d-flex align-items-center gap-4">
          <div class="icon-shape icon-lg bg-danger-subtle text-danger-emphasis rounded-circle">
            <i class="ti ti-alert-triangle fs-3"></i>
          </div>
          <div>
            <span class="text-secondary">Low Stock</span>
            <h3 class="mb-0">{{ $lowStockCount }}</h3>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row g-6">
    <!-- Recent sales -->
    <div class="col-xl-8">
      <div class="card card-lg h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0">Recent Sales</h5>
            <a href="{{ route('admin.sales.index') }}" class="btn btn-sm btn-white">View all</a>
          </div>
          <div class="table-responsive">
            <table class="table align-middle text-nowrap mb-0">
              <thead>
                <tr>
                  <th>Invoice</th>
                  <th>Product</th>
                  <th>Customer</th>
                  <th>Total</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($recentSales as $sale)
                  <tr>
                    <td>{{ $sale->invoice_no }}</td>
                    <td>{{ $sale->product_name }} <span class="text-secondary">x{{ $sale->quantity }}</span></td>
                    <td>{{ $sale->customer_name }}</td>
                    <td>{{ $sale->formatted_total }}</td>
                    <td>{{ $sale->sold_at->format('d M Y') }}</td>
                  </tr>
                @empty
                  <tr><td colspan="5" class="text-center text-secondary py-5">No sales yet.</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Low stock -->
    <div class="col-xl-4">
      <div class="card card-lg h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0">Low Stock</h5>
            <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-white">Manage</a>
          </div>
          <ul class="list-unstyled mb-0 d-flex flex-column gap-3">
            @forelse ($lowStock as $product)
              <li class="d-flex justify-content-between align-items-center">
                <div>
                  <div>{{ $product->name }}</div>
                  <small class="text-secondary">Size {{ $product->size }}{{ $product->color ? ' · ' . $product->color : '' }}</small>
                </div>
                <span class="badge text-danger-emphasis bg-danger-subtle">{{ $product->quantity }} left</span>
              </li>
            @empty
              <li class="text-secondary">All products are well stocked.</li>
            @endforelse
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
