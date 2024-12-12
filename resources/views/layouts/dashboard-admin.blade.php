<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Dashboard | Admin</title>
    <!-- CSRF Token-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">--}}
    <!-- Font -->
    {{--        <link href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!-- Date -->
    <link href="{{ asset('adminlte/plugins/bootstrap4-datetimepicker/css/bootstrap-datetimepicker.css') }}"
          rel="stylesheet">
    <link href="{{ asset('adminlte/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/css-custom.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.gif') }}">

    <!-- Theme style -->
    <link href="{{ asset('adminlte/dist/css/adminlte.min.css') }}" rel="stylesheet">
    <style>
        .select2-selection__rendered {
            margin: -6px !important;
        }
        .custom-badge{
            /* background-color: #1e75c1; */
            color: #fff;
            padding: 3px;
            border-radius: 5px;
            font-size: 8pt;
            font-weight: 700;
            margin: auto;
        }
    </style>
    @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                {{--<a href="/" class="nav-link">home</a>--}}
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-cog"></i>
                    {{--<span class="badge badge-warning navbar-badge">15</span>--}}
                </a>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                    <a href="/app/admin-account" class="dropdown-item">
                        <i class="fa fa-user"></i> My Account
                    </a>
                    <div class="dropdown-divider"></div>
                    
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link text-center">
            PIUTANG
            {{--<img src="{{URL::asset('adminlte/dist/img/jp_kecil.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
            <span class="brand-text font-weight-light"></span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{URL::asset('adminlte/dist/img/user.png')}}" class="img-circle elevation-2"
                         alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block text-uppercase"></a>
                
                </div>
            </div>


            @include('layouts.left-sidebar')

        </div>
    </aside>
    <div class="content-wrapper">
        @yield('content')
    </div>

</div>

{{--plugin--}}
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
{{--plugin select2 and date--}}
<script src="{{ asset('adminlte/plugins/bootstrap4-moment/moment.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap4-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
{{--plugin toastr--}}
<script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/toastr/toastr.min.js') }}"></script>
{{--theme--}}
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
<script>
    @if(Session::has('message'));
    var type = "{{Session::get('alert-type','info')}}";

    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>

@yield('custom-script')
</body>
</html>
