@extends('layouts.dashboard-admin')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                    <h1>List Level</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">Create Level</button>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="modal fade" id="createModal" role="dialog" data-keyboard="false" data-backdrop="static"
             aria-hidden="true">
            <form action="{{ route('user-menu/store-level') }}" method="POST">
            @csrf
            @include('user-menu.list-level-form-create')
            </form>
        </div>
    </section>
    <section class="content-header">
        <div class="container-fluid">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-2">
                            Pilih Level
                        </div>
                        <div class="col-sm-6">
                            <select name="kdlevel" class="form-select form-control" id="levelSelect">
                                <option value="">-- Pilih Level --</option>
                                @foreach($levels as $level)
                                    <option value="{{$level->kdlevel}}" {{ $level->kdlevel == $selectlevel ? 'selected' : '' }}>
                                        {{$level->nmlevel}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-primary" onclick="redirectToLevel()">Select</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('user-menu/update-level') }}" method="POST">
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
                                <input type="hidden" value="{{$selectlevel}}" name="kdlevel">
                                <table class="table table-hover table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Menu</th>
                                        <th>Akses</th>
                                        <th>Create</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($menus as $menu)
                                        @php
                                            $access = $levelmenu[$menu->kdmenu] ?? null;
                                        @endphp
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="form-check-input check-all-row"
                                                       onclick="toggleRowCheckboxes(this)">
                                            </td>
                                            <td>{!! !$menu->parent ? $menu->nmmenu : "&emsp; $menu->nmmenu" !!}</td>
                                            <td>
                                                <input name="updMenu[uraks-{{$menu->kdmenu}}]" class="form-check-input row-checkbox"
                                                       type="checkbox" {{ $access && $access->uraks ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <input name="updMenu[urnew-{{$menu->kdmenu}}]" class="form-check-input row-checkbox"
                                                       type="checkbox" {{ $access && $access->urnew ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <input name="updMenu[uredt-{{$menu->kdmenu}}]" class="form-check-input row-checkbox"
                                                       type="checkbox" {{ $access && $access->uredt ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <input name="updMenu[urdel-{{$menu->kdmenu}}]" class="form-check-input row-checkbox"
                                                       type="checkbox" {{ $access && $access->urdel ? 'checked' : '' }}>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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

@section('custom-script')
    <script>
        function redirectToLevel() {
            const selectedLevel = document.getElementById('levelSelect').value;
            if (selectedLevel) {
                window.location.href = `/user-menu/list-level?kdlevel=${selectedLevel}`;
            } else {
                alert("Silakan pilih level terlebih dahulu.");
            }
        }
    </script>
    <script>
        function toggleRowCheckboxes(checkAllBox) {
            const row = checkAllBox.closest('tr');
            const checkboxes = row.querySelectorAll('.row-checkbox');

            checkboxes.forEach(checkbox => {
                checkbox.checked = checkAllBox.checked;
            });
        }
    </script>
@endsection
