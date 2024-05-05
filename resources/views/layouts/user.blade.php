<!DOCTYPE html>
<html lang="en">

@include('layouts.user_partial.head')

<body>
  <!-- ======= Header ======= -->
    @include('layouts.user_partial.header')
  <!-- ======= Hero Section ======= -->

  <main id="main" class="main">
    @yield('content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
    @include('layouts.user_partial.footer')
  <!-- End Footer -->

  {{-- <div id="preloader"></div> --}}
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  @include('layouts.user_partial.script')

</body>

</html>
