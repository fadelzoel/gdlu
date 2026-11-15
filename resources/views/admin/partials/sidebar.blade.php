@php
  // Add or remove menu items here. Used by both the desktop and the mobile sidebar.
  $menu = [
    ['label' => 'Dashboard',     'icon' => 'ti-layout-dashboard', 'route' => 'admin.dashboard',     'active' => 'admin.dashboard'],
    ['label' => 'Products',      'icon' => 'ti-shirt',            'route' => 'admin.products.index', 'active' => 'admin.products.*'],
    ['label' => 'Sales History', 'icon' => 'ti-receipt',          'route' => 'admin.sales.index',    'active' => 'admin.sales.*'],
    ['label' => 'Admin Users',   'icon' => 'ti-users',            'route' => 'admin.users.index',    'active' => 'admin.users.*'],
  ];
@endphp

<div id="miniSidebar">
  <div class="brand-logo">
    <a class="d-none d-md-flex align-items-center gap-2" href="{{ route('admin.dashboard') }}">
      <img src="{{ asset('admin-assets/images/brand/logo/logo-icon.svg') }}" alt="" />
      <span class="fw-bold fs-4 site-logo-text">{{ config('app.name') }}</span>
    </a>
  </div>
  <ul class="navbar-nav flex-column">
    @foreach ($menu as $item)
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs($item['active']) ? 'active' : '' }}" href="{{ route($item['route']) }}">
          <span class="nav-icon"><i class="ti {{ $item['icon'] }} fs-4"></i></span>
          <span class="text">{{ $item['label'] }}</span>
        </a>
      </li>
    @endforeach
  </ul>
</div>

<div class="offcanvasNav offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
  aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <a class="d-flex align-items-center gap-2" href="{{ route('admin.dashboard') }}">
      <img src="{{ asset('admin-assets/images/brand/logo/logo-icon.svg') }}" alt="" />
      <span class="fw-bold fs-4 site-logo-text">{{ config('app.name') }}</span>
    </a>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body p-0">
    <ul class="navbar-nav flex-column">
      @foreach ($menu as $item)
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs($item['active']) ? 'active' : '' }}" href="{{ route($item['route']) }}">
            <span class="nav-icon"><i class="ti {{ $item['icon'] }} fs-4"></i></span>
            <span class="text">{{ $item['label'] }}</span>
          </a>
        </li>
      @endforeach
    </ul>
  </div>
</div>
