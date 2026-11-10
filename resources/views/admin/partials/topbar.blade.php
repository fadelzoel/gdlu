<header class="header header-sticky p-0 mb-4">
  <div class="container-fluid border-bottom px-4">
    <button class="header-toggler px-md-0 me-md-3" type="button" onclick="document.querySelector('#sidebar').classList.toggle('show');">
      <svg class="icon icon-lg"><use xlink:href="admin-assets/icons/sprites/free.svg#cil-menu"></use></svg>
    </button>
    
    <div class="d-flex align-items-center ms-auto">
      <div class="dropdown">
        <a class="nav-link py-3" data-coreui-toggle="dropdown" href="#" role="button">
          {{ auth()->user()->name ?? 'Admin' }}
        </a>
        <div class="dropdown-menu dropdown-menu-end pt-0">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="dropdown-item">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</header>