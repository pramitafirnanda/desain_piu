<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PIUTANG</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte//plugins/toastr/toastr.min.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.gif') }}">
</head>
<style>
    .bg-auth {
        background-image: linear-gradient( 103.3deg,  rgba(252,225,208,1) 30%, rgba(255,173,214,1) 55.7%, rgba(162,186,245,1) 81.8% );
    }
</style>

<body class="hold-transition login-page bg-auth">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-info">
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card-header text-center">
            <a href="{{ url("/") }}" class="h1"><b>PIUTANG</b></a>
        </div>


            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="{{ route('proses_login') }}" method="POST" id="logForm">
                    @csrf
                    @if ($errors->has('login'))
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('login') }}</strong>
                        </span>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="alert-inner--text">  {{ $errors->first('login') }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="input-group mb-3">
                        <input class="form-control" id="kduser" name="kduser" type="text" placeholder="KODE PENGGUNA" />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input class="form-control" id="pwd" type="pwd" name="pwd" placeholder="PASSWORD" />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 py-3">
                            <button class="btn btn-primary btn-block" type="submit">Login</button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
</div>
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/toastr/toastr.min.js') }}"></script>
<script>
    @if(Session::has('message'));
    var type="{{Session::get('alert-type','info')}}";

    switch(type){
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
</body>

</html>







{{--
<form action="{{ route('proses_login') }}" method="POST">
    @csrf
    <label for="kduser">Kode Pengguna:</label>
    <input type="text" name="kduser" required>

    <label for="pwd">Kata Sandi:</label>
    <input type="password" name="pwd" required>

    <button type="submit">Login</button>

    @if ($errors->has('login'))
        <div>{{ $errors->first('login') }}</div>
    @endif
</form>
--}}
