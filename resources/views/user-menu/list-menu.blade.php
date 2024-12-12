@extends('layouts.dashboard-admin')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                    <h1>List Menu</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">Create Menu</button>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="modal fade" id="createModal" role="dialog" data-keyboard="false" data-backdrop="static"
             aria-hidden="true">
            <form action="{{ route('user-menu/store-menu') }}" method="POST">
            @csrf
            @include('user-menu.list-menu-form-create')
            </form>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('user-menu/update-menu') }}" method="POST">
                        @csrf
                        <div class="card card-success card-outline">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6">
                                        <h3 class="card-title">List Menu</h3>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button type="submit" class="btn btn-sm btn-success">Update</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body overflow-x p-0">
                                <div class="col-12 p-2 text-center">
                                    <div class="row">
                                        <span class="text-bold col-3">KDMENU</span>
                                        <span class="text-bold col-3">NMMENU</span>
                                        <span class="text-bold col-3">PARENT</span>
                                        <span class="text-bold col-3">LINK</span>
                                    </div>
                                </div>
                                    @foreach($data as $dt)
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-3">
                                                    <input name="kdmenu[]" type="hidden" value="{{$dt->kdmenu}}">
                                                    <input type="text" class="form-control m-2" value="{{$dt->kdmenu}}" disabled>
                                                </div>
                                                <div class="col-3">
                                                    <input name="nmmenu[]" type="text" class="form-control m-2" value="{{$dt->nmmenu}}">
                                                    <input name="parent[]" type="text" class="form-control" value="{{$dt->parent}}" hidden>
                                                    <input name="link[]" type="text" class="form-control" value="{{$dt->link}}" hidden>
                                                </div>
                                            </div>
                                            @if ($dt->children->isNotEmpty())
                                                @foreach ($dt->children as $child)
                                                    <div class="row p-2">
                                                        <div class="col-3">
                                                            <input name="kdmenu[]" type="hidden" value="{{$child->kdmenu}}">
                                                            <input type="text" class="form-control" value="{{$child->kdmenu}}" disabled>
                                                        </div>
                                                        <div class="col-3">
                                                            <input name="nmmenu[]" type="text" class="form-control" value="{{$child->nmmenu}}">
                                                        </div>
                                                        <div class="col-3">
                                                            <input name="parent[]" type="text" class="form-control" value="{{$child->parent}}">
                                                        </div>
                                                        <div class="col-3">
                                                            <input name="link[]" type="text" class="form-control" value="{{$child->link}}">
                                                        </div>
                                                    </div>
                                                    @if ($child->children->isNotEmpty())
                                                        @foreach ($child->children as $subChild)
                                                            <div class="row p-2 ml-3">
                                                                <div class="col-3">
                                                                    <input name="kdmenu[]" type="hidden" value="{{$subChild->kdmenu}}">
                                                                    <input type="text" class="form-control" value="{{$subChild->kdmenu}}" disabled>
                                                                </div>
                                                                <div class="col-3">
                                                                    <input name="nmmenu[]" type="text" class="form-control" value="{{$subChild->nmmenu}}">
                                                                </div>
                                                                <div class="col-3">
                                                                    <input name="parent[]" type="text" class="form-control" value="{{$subChild->parent}}">
                                                                </div>
                                                                <div class="col-3">
                                                                    <input name="link[]" type="text" class="form-control" value="{{$subChild->link}}">
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                        <hr class="m-4">
                                    @endforeach
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-6">
                                    </div>
                                    <div class="col-6 text-right">
                                        <button class="btn btn-sm btn-primary">Update</button>
                                    </div>
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
