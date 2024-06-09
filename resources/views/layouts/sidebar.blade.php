<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
      </ul>
      @if(auth()->user()->roleId === 1 || auth()->user()->roleId === 4)
      <h6 class="sidebar-heading d-flex justify content between align-items-center px-3 mt-4 mb-1 text-muted"><span>Office Menu</span></h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/pengajuan-barang*') ? 'active' : '' }}" href="/dashboard/pengajuan-barang">
            <span data-feather="clipboard" class="align-text-bottom"></span>
            Pengajuan Barang
          </a>
        </li>
      </ul>
      @endIf
      @if(auth()->user()->roleId === 1 || auth()->user()->roleId === 2)
      <h6 class="sidebar-heading d-flex justify content between align-items-center px-3 mt-4 mb-1 text-muted"><span>Manager Menu</span></h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/pengajuan-manager*') ? 'active' : '' }}" href="/dashboard/pengajuan-manager">
            <span data-feather="clipboard" class="align-text-bottom"></span>
            Pengajuan Barang
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/history-manager*') ? 'active' : '' }}" href="/dashboard/history-manager">
            <span data-feather="check-square" class="align-text-bottom"></span>
            Histroy Pengajuan Barang
          </a>
        </li>
      </ul>
      @endIf
      @if(auth()->user()->roleId === 1 || auth()->user()->roleId === 3)
      <h6 class="sidebar-heading d-flex justify content between align-items-center px-3 mt-4 mb-1 text-muted"><span>Finance Menu</span></h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/pengajuan-finance*') ? 'active' : '' }}" href="/dashboard/pengajuan-finance">
            <span data-feather="clipboard" class="align-text-bottom"></span>
            Pengajuan Barang
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/history-finance*') ? 'active' : '' }}" href="/dashboard/history-finance">
            <span data-feather="check-square" class="align-text-bottom"></span>
            Histroy Pengajuan Barang
          </a>
        </li>
      </ul>
      @endIf
      @if(auth()->user()->roleId === 1)
      <h6 class="sidebar-heading d-flex justify content between align-items-center px-3 mt-4 mb-1 text-muted"><span>Admin Menu</span></h6>

      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/role*') ? 'active' : '' }}" href="/dashboard/role">
            <span data-feather="refresh-ccw" class="align-text-bottom"></span>
            Manage Role
          </a>
        </li>
      </ul>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/user*') ? 'active' : '' }}" href="/dashboard/user">
            <span data-feather="users" class="align-text-bottom"></span>
            Manage User
          </a>
        </li>
      </ul>
      @endIf
    </div>
  </nav>