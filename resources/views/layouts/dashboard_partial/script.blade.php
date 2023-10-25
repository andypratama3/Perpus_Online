<!-- plugins:js -->
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js')}}  "></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('assets/vendors/jquery-bar-rating/jquery.barrating.min.js')}} "></script>
<script src="{{ asset('assets/vendors/chart.js/Chart.min.js')}} "></script>
<script src="{{ asset('assets/vendors/flot/jquery.flot.js')}}   "></script>
<script src="{{ asset('assets/vendors/flot/jquery.flot.resize.js')}}    "></script>
<script src="{{ asset('assets/vendors/flot/jquery.flot.categories.js')}}    "></script>
<script src="{{ asset('assets/vendors/SwetAlert/index.js')}}"></script>
<script src="{{ asset('assets/vendors/flot/jquery.flot.fillbetween.js')}}   "></script>
<script src="{{ asset('assets/vendors/flot/jquery.flot.stack.js')}} "></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('assets/js/off-canvas.js')}}  "></script>
<script src="{{ asset('assets/js/hoverable-collapse.js')}}  "></script>
<script src="{{ asset('assets/js/misc.js')}}    "></script>
<script src="{{ asset('assets/js/settings.js')}}    "></script>
<script src="{{ asset('assets/js/todolist.js')}}    "></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('assets/js/dashboard.js')}}   "></script>

<!-- End custom js for this page -->
<script>
    $(document).ready(function () {
        $(".swal-logout").click(function (e) {
        slug = e.target.dataset.id;
        swal({
                title: 'Yakin ingin keluar?',
                text: 'Anda akan dialihkan ke beranda.',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willLogout) => {
                if (willLogout) {
                    $(`#logout-form`).submit();
                } else {
                    // Do Nothing
                }
            });
        });
    });
</script>
@stack('js')
