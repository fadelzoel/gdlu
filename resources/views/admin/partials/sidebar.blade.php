<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
  <div class="sidebar-header border-bottom">
    <div class="sidebar-brand d-none d-md-flex">
      GDLU <span class="text-success ms-1">ADMIN</span>
    </div>
  </div>
  
  <ul class="sidebar-nav" data-coreui="navigation">
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
        Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}" href="{{ route('admin.products.index') }}">
        Products
      </a>
    </li>
  </ul>
</div>