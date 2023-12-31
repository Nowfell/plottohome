<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'PlotToHome Admin Panel') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('vendors/jquery-bar-rating/css-stars.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/sweetalert/sweetalert.css') }}" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/admin_style.css') }}" />
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/netliva/src/css/netliva_switch.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/image-uploader/dist/image-uploader.min.css') }}" />
    <link href="{{ asset('vendors/jquery-ui/jquery-ui.css') }}" rel="stylesheet">
    <!-- End layout styles -->
    @stack('header-script')
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>
<body>
    <div class="container-scroller">
        @include('section.admin.sidebar')
      <div class="container-fluid page-body-wrapper">
        @include('section.admin.navbar')
        <div class="main-panel">
            @yield('content')
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('vendors/jquery-bar-rating/jquery.barrating.min.js') }}"></script>
    <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendors/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('vendors/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('vendors/flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('vendors/flot/jquery.flot.fillbetween.js') }}"></script>
    <script src="{{ asset('vendors/flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('vendors/sweetalert/sweetalert.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/misc.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendors/netliva/src/js/netliva_switch.js') }}"></script>
    <script src="{{ asset('vendors/image-uploader/dist/image-uploader.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery-ui/jquery-ui.js') }}"></script>
    <!-- End custom js for this page -->
    @stack('footer-script')
    <script>
        // $(function () {
        //     $('[data-toggle="tooltip"]').tooltip();
        // })
        // toastr.options = {
        //     "closeButton": false,
        //     "debug": false,
        //     "newestOnTop": false,
        //     "progressBar": false,
        //     "positionClass": "toast-top-right",
        //     "preventDuplicates": false,
        //     "onclick": null,
        //     "showDuration": "300",
        //     "hideDuration": "1000",
        //     "timeOut": "0",
        //     "extendedTimeOut": "0",
        //     "showEasing": "swing",
        //     "hideEasing": "linear",
        //     "showMethod": "fadeIn",
        //     "hideMethod": "fadeOut"
        // }
    </script>
  </body>
</html>
