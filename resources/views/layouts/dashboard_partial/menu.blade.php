<div class="horizontal-menu">
    <nav class="navbar top-navbar col-lg-12 col-12 p-0">
      <div class="container">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="{{ route('dashboard.index') }}">PERPUSTAKAAN BPMP
            {{-- <img src="{{ asset('assets/images/logo.svg') }}" alt="logo" /> --}}
            <span class="font-12 d-block font-weight-light">Kalimantan Timur </span>
          </a>
          <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard.index') }}"><img src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          {{-- <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
              <div class="input-group">
                <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                  <span class="input-group-text" id="search">
                    <i class="mdi mdi-magnify"></i>
                  </span>
                </div>
                <input type="text" class="form-control" id="navbar-search-input" placeholder="Search" aria-label="search" aria-describedby="search" />
              </div>
            </li>
          </ul> --}}
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="image" />
                </div>
                <div class="nav-profile-text">
                    <p class="text-black font-weight-semibold m-0">{{ strtok(Auth::user()->name, ' ') }}</p>

                  <span class="font-13 online-color">online <i class="mdi mdi-chevron-down"></i></span>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                {{-- <a class="dropdown-item" href="#">
                  <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a> --}}
                {{-- <div class="dropdown-divider"></div> --}}
                <a class="dropdown-item swal-logout" href="#">
                    <form action="{{ route('logout') }}" id="logout-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    </form>
                  <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </div>
    </nav>
    <nav class="bottom-navbar">
      <div class="container">
        <ul class="nav page-navigation">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard.index') }}">
              <i class="mdi mdi-compass-outline menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          @can('role:superadmin')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard.master.berita.index') }}">
              <i class="mdi mdi-newspaper menu-icon"></i>
              <span class="menu-title">Berita</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard.category.buku.index') }}">
              <i class="mdi mdi-clipboard-text menu-icon"></i>
              <span class="menu-title">Kategori</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard.buku.index') }}">
              <i class="mdi mdi-clipboard-text menu-icon"></i>
              <span class="menu-title">Buku Literasi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard.views.index') }}">
              <i class="mdi mdi-eye menu-icon"></i>
              <span class="menu-title">View Buku Literasi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard.jurnal.index') }}">
              <i class="mdi mdi-clipboard-text menu-icon"></i>
              <span class="menu-title">Jurnal</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="mdi mdi mdi-account-outline menu-icon"></i>
              <span class="menu-title">User</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="submenu">
              <ul class="submenu-item">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('dashboard.pengaturan.user.index') }}">User</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('dashboard.pengaturan.role.index') }}">Role</a></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('dashboard.pengaturan.task.index') }}">Task</a></a>
                </li>
              </ul>
            </div>
          </li>
          @endcan
          <li class="nav-item float-left">
            <a class="nav-link" href="{{ route('dashboard.master.karya.index') }}">
              <i class="mdi mdi-clipboard-text menu-icon"></i>
              <span class="menu-title">Karya</span>
            </a>
          </li>

        </ul>
      </div>
    </nav>
  </div>
