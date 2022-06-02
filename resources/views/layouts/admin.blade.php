<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MediaMart</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/jqvmap/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/daterangepicker/daterangepicker.css')}}">
    {{-- SweetAlert --}}
    <link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/style.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    @yield('css')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset('assets/admin/images/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
        </div>
        @include('admin.blocks.header')
        @include('admin.blocks.slidebar')
        @yield('content')
    </div>
    <script src="{{asset('assets/admin/AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/admin/AdminLTE/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/admin/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/admin/AdminLTE/plugins/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('assets/admin/AdminLTE/plugins/sparklines/sparkline.js')}}"></script>
    {{-- <script src="{{asset('assets/admin/AdminLTE/plugins/jqvmap/jquery.vmap.min.js')}}"></script>x --}}
    {{-- <script src="{{asset('assets/admin/AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script> --}}
    <script src="{{asset('assets/admin/AdminLTE/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <script src="{{asset('assets/admin/AdminLTE/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/admin/AdminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/admin/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <script src="{{asset('assets/admin/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <script src="{{asset('assets/admin/AdminLTE/dist/js/adminlte.min.js')}}"></script>
    <script src="{{asset('assets/admin/AdminLTE/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/admin/AdminLTE/plugins/toastr/toastr.min.js')}}"></script>
    {{-- <script src="{{asset('assets/admin/AdminLTE/dist/js/demo.js')}}"></script> --}}
    {{-- <script src="{{asset('assets/admin/AdminLTE/dist/js/pages/dashboard.js')}}"></script> --}}
    <script>
        $.widget.bridge('uibutton', $.ui.button)
        // SweetAlert
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $(window).on('load',function() {
            setTimeout(() => {
                var _title = $('.title-msg').text();
                var _icon = $('.icon-msg').text();
                if(_title){
                    Toast.fire({
                        icon: _icon,
                        title: _title
                    })
                }
            }, 500);
        })
    </script>
    @yield('js')
</body>
</html>
