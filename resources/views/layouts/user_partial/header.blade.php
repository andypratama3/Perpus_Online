<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">BPMP KALTIM</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="{{ Request::routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}">Home</a></li>
          <li><a href="about.html" class="{{ Request::routeIs('index') ? 'active' : '' }}">Buku</a></li>
          <li><a href="courses.html" class="{{ Request::routeIs('index') ? 'active' : '' }}">Courses</a></li>
          <li><a href="{{ route('wishlist.index') }}" class="{{ Request::routeIs('wishlist.*') ? 'active' : '' }}">Wishlist</a></li>
          <li><a href="events.html" class="{{ Request::routeIs('index') ? 'active' : '' }}">Events</a></li>
          <li><a href="pricing.html" class="{{ Request::routeIs('index') ? 'active' : '' }}">Pricing</a></li>

          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              {{-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li> --}}
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a href="contact.html">Contact</a></li>
          <li><a href="{{ route('login') }}">Login</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="courses.html" class="get-started-btn">Get Started</a>

    </div>
  </header><!-- End Header -->
