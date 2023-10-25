
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Csrf Token Laravel -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Application @yield('title')</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css')}}">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-bar-rating/css-stars.css')}}" />
        <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}" />
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/demo_2/style.css')}}" />
        <!-- End layout styles -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png')}}" />
        @stack('css')
      </head>

  <body>
    <div class="container-scroller">
      <!-- partial:partials/_horizontal-navbar.html -->
        @include('layouts.dashboard_partial.menu')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            @yield('content')
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
            @include('layouts.dashboard_partial.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('layouts.dashboard_partial.script')
  </body>
</html>
