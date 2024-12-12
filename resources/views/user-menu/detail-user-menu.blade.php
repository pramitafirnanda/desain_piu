@extends('layouts.dashboard-admin')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                    <h1>User Menu</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content-header">
        <div class="container-fluid">
            <div class="card card-success card-outline">
                <form action="{{ route('user-menu/update-user') }}" method="post">
                    @csrf
                <div class="card-body overflow-x p-0">
                    <div class="col-12 p-3">
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label>Kode User</label>
                            </div>
                            <div class="col-md-4">
                                <input name="kduser" value="{{$user->kduser}}" hidden>
                                <input value="{{$user->kduser}}" type="text" class="form-control" disabled>
                            </div>
                            <div class="col-md-2">
                                <label>Nama</label>
                            </div>
                            <div class="col-md-4">
                                <input name="nmuser" value="{{$user->nmuser}}" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label>INITIAL</label>
                            </div>
                            <div class="col-md-4">
                                <input name="initial" value="{{$user->initial}}" type="text" class="form-control" disabled>
                            </div>
                            <div class="col-md-2">
                                <label>Password</label>
                            </div>
                            <div class="col-md-4">
                                <small class="text-danger">*Jika kolom Password diisi, maka password sebelumnya akan diganti.</small>
                                <input name="pwd" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-sm btn-primary">Update User</button>
                </div>
                </form>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 py-3">
                    <form action="{{ route('user-menu/update-user-menu') }}" method="POST">
                        @csrf
                        <input type="hidden" name="kduser" value="{{$user->kduser}}">
                        <div class="card card-success card-outline">
                            <div class="card-body overflow-x p-0">
                                <div class="col-12">
                                    <div class="text-right pt-3">
                                        <button class="btn btn-sm btn-info">Update User Menu</button>
                                    </div>
                                </div>
                                <div class="col-12 p-3">
                                    <div class="row">
                                        <table class="table table-hover table-striped table-sm">
                                            <thead>
                                            <tr>
                                                <th>Menu</th>
                                                <th>Akses</th>
                                                <th>Tambah</th>
                                                <th>Ubah</th>
                                                <th>Hapus</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($menus as $menu)
                                                <tr>
                                                    <td>{!! !$menu->parent ? $menu->nmmenu : "&emsp; $menu->nmmenu" !!}</td>
                                                    <td>
                                                        <input name="updMenu[uraks-{{$menu->kdmenu}}]" class="form-check-input" type="checkbox" {{ $menu->uraks ? 'checked' : '' }}>
                                                    </td>
                                                    <td>
                                                        <input name="updMenu[urnew-{{$menu->kdmenu}}]" class="form-check-input" type="checkbox" {{ $menu->urnew ? 'checked' : '' }}>
                                                    </td>
                                                    <td>
                                                        <input name="updMenu[uredt-{{$menu->kdmenu}}]" class="form-check-input" type="checkbox" {{ $menu->uredt ? 'checked' : '' }}>
                                                    </td>
                                                    <td>
                                                        <input name="updMenu[urdel-{{$menu->kdmenu}}]" class="form-check-input" type="checkbox" {{ $menu->urdel ? 'checked' : '' }}>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-sm btn-info">Update User Menu</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </section

@endsection
