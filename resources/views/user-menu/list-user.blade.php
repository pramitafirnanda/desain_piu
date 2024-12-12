@extends('layouts.dashboard-admin')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                    <h1>List User</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal">Create</a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="modal fade" id="createModal" role="dialog" data-keyboard="false" data-backdrop="static"
             aria-hidden="true">
            <form action="{{ route('user-menu/store-user') }}" method="POST">
                @csrf
                @include('user-menu.list-user-form')
            </form>
        </div>
    </section>



    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h3 class="card-title">List User</h3>
                        </div>
                                <div class="card-body overflow-x p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>kduser</th>
                                            <th>nmuser</th>
                                            <th>initial</th>
                                            <th>operation</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$user->kduser}}</td>
                                                <td>{{$user->nmuser}}</td>
                                                <td>{{$user->initial}}</td>
                                                <td>
                                                    <a href="/user-menu/detail-user-menu/{{$user->kduser}}" class="btn btn-info btn-xs">Manage Menu</a>
                                                    <a href="#" data-toggle="modal" data-target="#update_{{$user->id}}" class="btn btn-primary btn-xs">Update User</a>
                                                    {{--<div class="btn-group-vertical">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" >
                                                                <i class="fa fa-bars"></i> <span class="caret"></span>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="/detail-user-menu/{{$user->kduser}}">Mange Menu</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_{{$user->id}}">Edit</a>
                                                            </div>
                                                        </div>
                                                    </div>--}}
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="update_{{$user->id}}" role="dialog" data-keyboard="false" data-backdrop="static"
                                                 aria-hidden="true">
                                                <form action="{{ route('user-menu/update-user') }}" method="POST">
                                                    @csrf
                                                    @include('user-menu.list-user-form')
                                                </form>
                                            </div>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section

@endsection

@section('custom-script')

    <script>
        @foreach($users as $user)
        (function() {
            const passwordText = document.getElementById('password-text-{{ $loop->index }}');
            const togglePassword = document.getElementById('toggle-password-{{ $loop->index }}');
            const password = "{{ $user->pwdD }}";
            let isPasswordVisible = false;

            togglePassword.addEventListener('click', function () {
                if (isPasswordVisible) {
                    // Sembunyikan password
                    passwordText.textContent = ".....";
                    togglePassword.classList.replace("fa-eye-slash", "fa-eye");
                } else {
                    // Tampilkan password
                    passwordText.textContent = password;
                    togglePassword.classList.replace("fa-eye", "fa-eye-slash");
                }
                isPasswordVisible = !isPasswordVisible; // Ganti status
            });
        })();
        @endforeach
    </script>
@endsection
