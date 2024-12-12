<?php

public function detailUserMenu2($kduser){
    $users = User::all();
    $menusChecked = collect();
    $menus = collect();
    $parents = Menu::whereNull('parent')->with('usermenu')->get();
    /*foreach ($parents as $parent) {
        $kdmenuList = [];
        $unmenulist = null;

        $usermenu = UserMenu::where('kduser', $kduser)->where('kdmenu', $parent->kdmenu)->first();

        if ($usermenu && $usermenu->uraks) {
            $kdmenuList[] = [
                'kdmenu' => $parent->kdmenu,
                'uraks' => $usermenu->uraks,
                'urupd' => $usermenu->urupd,
                'urdel' => $usermenu->urdel,
                'urnew' => $usermenu->urnew
            ];
        }
        if ($usermenu && !$usermenu->uraks) {
            $unmenulist[] = [
                'kdmenu' => $parent->kdmenu,
                'uraks' => $usermenu->uraks,
                'urupd' => $usermenu->urupd,
                'urdel' => $usermenu->urdel,
                'urnew' => $usermenu->urnew
            ];
            $menus->push([
                'label' => $parent->nmmenu,
                'kdmenu' =>  $unmenulist
            ]);
        }

        foreach (Menu::where('parent', $parent->kdmenu)->get() as $child) {
            $usermenu2 = UserMenu::where('kduser', $kduser)->where('kdmenu', $child->kdmenu)->first();

            if ($usermenu2 && $usermenu2->uraks) {
                $kdmenuList[] = [
                    'kdmenu' => $child->kdmenu,
                    'uraks' => $usermenu2->uraks,
                    'urupd' => $usermenu2->urupd,
                    'urdel' => $usermenu2->urdel,
                    'urnew' => $usermenu2->urnew
                ];
            }
        }

        if (!empty($kdmenuList)) {
            $menusChecked->push([
                'label' => $parent->nmmenu,
                'kdmenu' => $kdmenuList
            ]);
        }
    }
    return view('user-menu.detail-user-menu', compact('users', 'menusChecked', 'menus', 'kduser'));*/
    $menusChecked = collect();
    $menus = collect();
    $parents = Menu::whereNull('parent')->with('usermenu')->get();
    foreach ($parents as $parent) {
        $usermenu = UserMenu::where('kduser', $kduser)->where('kdmenu', $parent->kdmenu)->where('uraks', 1)->first();
        if ($usermenu) {
            $kdmenuList = [];
            $unmenulist = null;
            $kdmenuList[] = [
                'kdmenu' => $parent->kdmenu,
                'uraks' => $usermenu->uraks,
                'urnew' => $usermenu->urnew,
                'uredt' => $usermenu->uredt,
                'urdel' => $usermenu->urdel,
            ];
            $childs = Menu::where('parent', $parent->kdmenu)->get();
            foreach ($childs as $child) {
                $usermenu2 = UserMenu::where('kduser', $kduser)->where('kdmenu', $child->kdmenu)->where('uraks', 1)->first();
                if ($usermenu2) {
                    $kdmenuList[] = [
                        'kdmenu' => $child->kdmenu,
                        'uraks' => $usermenu2->uraks,
                        'urnew' => $usermenu2->urnew,
                        'uredt' => $usermenu2->uredt,
                        'urdel' => $usermenu2->urdel,
                    ];
                }
                $usermenu0 = UserMenu::where('kduser', $kduser)->where('kdmenu', $child->kdmenu)->where('uraks', 0)->first();
                if ($usermenu0) {
                    $unmenulist[] = [
                        'kdmenu' => $child->kdmenu,
                        'uraks' => $usermenu0->uraks,
                        'urnew' => $usermenu0->urnew,
                        'uredt' => $usermenu0->uredt,
                        'urdel' => $usermenu0->urdel,
                    ];
                }
            }
            $menusChecked->push([
                'label' => $parent->nmmenu,
                'kdmenu' =>  $kdmenuList
            ]);
            $menus->push([
                'label' => $parent->nmmenu,
                'kdmenu' =>  $unmenulist
            ]);
        }
    }
    dd($menus);
    $menus2 = $menusChecked->pluck('kdmenu')->flatten()->toArray();
    $menus0 = $menus->pluck('kdmenu')->flatten()->toArray();
    $othermenu = Menu::whereNotIn('kdmenu', $menus2)->whereNotIn('kdmenu', $menus0)->with('children') ->orderBy('lvl')->get();

    return view('user-menu.detail-user-menu', compact('users', 'menusChecked', 'menus', 'othermenu', 'kduser'));
}
    ?>

@extends('layouts.dashboard-admin')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 py-3">
                    <form action="{{ route('user-menu/update-user-menu') }}" method="POST">
                        @csrf
                        <button type="submit">update</button>
                        <input type="hidden" name="kduser" value="{{$kduser}}">
                        <div class="card card-success card-outline">
                            <div class="card-body overflow-x p-0">
                                <div class="col-12 p-3">

                                    {{--<div class="row">
                                        --}}{{--<div class="col-12 col-md-6">
                                            <div class="row">
                                                @foreach($menusChecked as $checkedMenu)
                                                    <div class="col-6">
                                                        <h5>{{ $checkedMenu['label'] }}</h5>
                                                        @foreach($checkedMenu['kdmenu'] as $menu)
                                                            <div class="col pb-3">
                                                                {{ $menu['kdmenu'] }} <br>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="{{ $menu['kdmenu'] }}_uraks" name="permissions[{{ $menu['kdmenu'] }}][uraks]" {{ $menu['uraks'] ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="{{ $menu['kdmenu'] }}_uraks">uraks</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="{{ $menu['kdmenu'] }}_urupd" name="permissions[{{ $menu['kdmenu'] }}][urupd]" {{ $menu['urupd'] ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="{{ $menu['kdmenu'] }}_urupd">urupd</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="{{ $menu['kdmenu'] }}_urdel" name="permissions[{{ $menu['kdmenu'] }}][urdel]" {{ $menu['urdel'] ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="{{ $menu['kdmenu'] }}_urdel">urdel</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="{{ $menu['kdmenu'] }}_urnew" name="permissions[{{ $menu['kdmenu'] }}][urnew]" {{ $menu['urnew'] ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="{{ $menu['kdmenu'] }}_urnew">urnew</label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        <hr>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="row">
                                                @foreach($menus as $checkedMenu)
                                                    <div class="col-6">
                                                        <h5>{{ $checkedMenu['label'] }}</h5>
                                                        @foreach($checkedMenu['kdmenu'] as $menu)
                                                            <div class="col pb-3">
                                                                {{ $menu['kdmenu'] }} <br>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="{{ $menu['kdmenu'] }}_uraks" name="permissions[{{ $menu['kdmenu'] }}][uraks]" {{ $menu['uraks'] ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="{{ $menu['kdmenu'] }}_uraks">uraks</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="{{ $menu['kdmenu'] }}_urupd" name="permissions[{{ $menu['kdmenu'] }}][urupd]" {{ $menu['urupd'] ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="{{ $menu['kdmenu'] }}_urupd">urupd</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="{{ $menu['kdmenu'] }}_urdel" name="permissions[{{ $menu['kdmenu'] }}][urdel]" {{ $menu['urdel'] ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="{{ $menu['kdmenu'] }}_urdel">urdel</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="{{ $menu['kdmenu'] }}_urnew" name="permissions[{{ $menu['kdmenu'] }}][urnew]" {{ $menu['urnew'] ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="{{ $menu['kdmenu'] }}_urnew">urnew</label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        <hr>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>--}}{{--

                                        <div class="col-12 col-md-6">
                                            <div class="row">
                                                @foreach($menusChecked as $checkedMenu)
                                                    --}}{{--<div class="col-6">
                                                        <h5>{{ $checkedMenu['label'] }}</h5>
                                                        @foreach($checkedMenu['kdmenu'] as $menu)
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="updMenu[{{ $menu }}]" id="{{ $menu }}" checked>
                                                                <label class="form-check-label" for="{{ $menu }}">
                                                                    {{ $menu }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                        <hr>
                                                    </div>--}}{{--
                                                    <div class="col-6">
                                                        <h5>{{ $checkedMenu['label'] }}</h5>
                                                        @foreach($checkedMenu['kdmenu'] as $menu)
                                                            <div class="col pb-3">
                                                                {{ $menu['kdmenu'] }} <br>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="{{ $menu['kdmenu'] }}_uraks" name="permissions[{{ $menu['kdmenu'] }}][uraks]" {{ $menu['uraks'] ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="{{ $menu['kdmenu'] }}_uraks">uraks</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="{{ $menu['kdmenu'] }}_urupd" name="permissions[{{ $menu['kdmenu'] }}][urnew]" {{ $menu['urnew'] ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="{{ $menu['kdmenu'] }}_urnew">urnew</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="{{ $menu['kdmenu'] }}_urdel" name="permissions[{{ $menu['kdmenu'] }}][uredt]" {{ $menu['uredt'] ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="{{ $menu['kdmenu'] }}_uredt">uredt</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="{{ $menu['kdmenu'] }}_urnew" name="permissions[{{ $menu['kdmenu'] }}][urdel]" {{ $menu['urdel'] ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="{{ $menu['kdmenu'] }}_urdel">urdel</label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        <hr>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="row">
                                                @foreach($menus as $checkedMenu)
                                                    <div class="col-6">
                                                        <h5>{{ $checkedMenu['label'] }}</h5>
                                                        @foreach($checkedMenu['kdmenu'] as $menu)
                                                            <div class="col pb-3">
                                                                {{ $menu['kdmenu'] }} <br>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="{{ $menu['kdmenu'] }}_uraks" name="permissions[{{ $menu['kdmenu'] }}][uraks]" {{ $menu['uraks'] ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="{{ $menu['kdmenu'] }}_uraks">uraks</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="{{ $menu['kdmenu'] }}_urnew" name="permissions[{{ $menu['kdmenu'] }}][urnew]" {{ $menu['urnew'] ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="{{ $menu['kdmenu'] }}_urupd">urnew</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="{{ $menu['kdmenu'] }}_uredt" name="permissions[{{ $menu['kdmenu'] }}][uredt]" {{ $menu['uredt'] ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="{{ $menu['kdmenu'] }}_urdel">uredt</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="{{ $menu['kdmenu'] }}_urdel" name="permissions[{{ $menu['kdmenu'] }}][urdel]" {{ $menu['urdel'] ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="{{ $menu['kdmenu'] }}_urnew">urdel</label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        <hr>
                                                    </div>
                                                @endforeach
                                                @foreach($othermenu as $menu)
                                                    @if(!$menu->parent)
                                                        <div class="col-6">
                                                            <h5>{{ $menu->nmmenu }}</h5>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="updMenu[{{ $menu->kdmenu }}]" id="{{ $menu->kdmenu }}">
                                                                <label class="form-check-label" for="{{ $menu->kdmenu }}">
                                                                    {{ $menu->kdmenu }}
                                                                </label>
                                                            </div>
                                                            @if($menu->children)
                                                                <div class="ps-3">
                                                                    @foreach($menu->children as $child)
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" name="updMenu[{{ $child->kdmenu }}]" id="{{ $child->kdmenu }}">
                                                                            <label class="form-check-label" for="{{ $child->kdmenu }}">
                                                                                {{ $child->kdmenu }}
                                                                            </label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                            <hr>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>--}}

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
