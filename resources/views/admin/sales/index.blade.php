@extends('admin.layouts.app')

@section('title', 'Sales History')

@section('content')
<div class="custom-container">
  @include('admin.partials.alerts')

  <div class="mb-6">
    <h1 class="fs-3 mb-1">Sales History</h1>
    <p class="text-secondary mb-0">Check past sales. Use the filters to narrow the list.</p>
  </div>

  <!-- Totals for the current filter -->
  <div class="row g-6 mb-6">
    <div class="col-md-4">
      <div class="card card-lg h-100"><div class="card-body">
        <span class="text-secondary">Transactions</span>
        <h3 class="mb-0">{{ number_format($totals['transactions']) }}</h3>
      </div></div>
    </div>
    <div class="col-md-4">
      <div class="card card-lg h-100"><div class="card-body">
        <span class="text-secondary">Items Sold</span>
        <h3 class="mb-0">{{ number_format($totals['items']) }}</h3>
      </div></div>
    </div>
    <div class="col-md-4">
      <div class="card card-lg h-100"><div class="card-body">
        <span class="text-secondary">Revenue</span>
        <h3 class="mb-0">Rp{{ number_format($totals['revenue'], 0, ',', '.') }}</h3>
      </div></div>
    </div>
  </div>

  <div class="card card-lg">
    <div class="card-body">
      <form method="GET" class="row g-2 mb-4 align-items-end">
        <div class="col-md-4">
          <label class="form-label small mb-1">Search</label>
          <input type="search" name="search" value="{{ request('search') }}" class="form-control"
            placeholder="Invoice, customer or product..." />
        </div>
        <div class="col-md-2">
          <label class="form-label small mb-1">From</label>
          <input type="date" name="from" value="{{ request('from') }}" class="form-control" />
        </div>
        <div class="col-md-2">
          <label class="form-label small mb-1">To</label>
          <input type="date" name="to" value="{{ request('to') }}" class="form-control" />
        </div>
        <div class="col-auto">
          <button class="btn btn-white">Filter</button>
          @if (request()->hasAny(['search', 'from', 'to']))
            <a href="{{ route('admin.sales.index') }}" class="btn btn-link">Reset</a>
          @endif
        </div>
      </form>

      <div class="table-responsive">
        <table class="table align-middle text-nowrap mb-0">
          <thead>
            <tr>
              <th>Invoice</th>
              <th>Date</th>
              <th>Customer</th>
              <th>Product</th>
              <th>Qty</th>
              <th>Unit Price</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($sales as $sale)
              <tr>
                <td>{{ $sale->invoice_no }}</td>
                <td>{{ $sale->sold_at->format('d M Y, H:i') }}</td>
                <td>{{ $sale->customer_name }}</td>
                <td>
                  {{ $sale->product_name }}
                  <small class="text-secondary d-block">
                    {{ $sale->size ? 'Size ' . $sale->size : '' }}{{ $sale->color ? ' · ' . $sale->color : '' }}
                  </small>
                </td>
                <td>{{ $sale->quantity }}</td>
                <td>{{ $sale->formatted_unit_price }}</td>
                <td class="fw-semibold">{{ $sale->formatted_total }}</td>
              </tr>
            @empty
              <tr><td colspan="7" class="text-center text-secondary py-5">No sales found.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <div class="mt-4">{{ $sales->links() }}</div>
    </div>
  </div>
</div>
@endsection
