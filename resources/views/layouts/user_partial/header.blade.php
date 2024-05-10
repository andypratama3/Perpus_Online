<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <a href="{{ route('index') }}" class="logo"><img src="{{ asset('assets_user/img/logo1.jpeg') }}" alt="" class="img-fluid"></a>
        <h4 class="logo me-auto"><a href="{{ route('index') }}">PERPUSTAKAAN <br> BPMP KALTIM</a></h4>
        <!-- Uncomment below if you prefer to use an image logo -->

      <nav id="navbar" class="navbar order-last order-lg-0">
          <ul>
              <li><a class="{{ Request::routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}">Home</a></li>
              <li><a href="{{ route('buku.index') }}" class="{{ Request::routeIs('buku.index') ? 'active' : '' }}">Buku</a></li>
                <li><a href="courses.html" class="{{ Request::routeIs('index') ? 'active' : '' }}">Jurnal</a></li>
                <li><a href="{{ route('wishlist.index') }}" class="{{ Request::routeIs('wishlist.*') ? 'active' : '' }}">Karya </a></li>

          {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}
          <li><a href="{{ route('contact.index') }}">Kontak</a></li>
          <li><a href="{{ route('login') }}">Login</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="{{ route('buku.index') }}" class="get-started-btn">Get Started</a>

    </div>
  </header><!-- End Header -->
