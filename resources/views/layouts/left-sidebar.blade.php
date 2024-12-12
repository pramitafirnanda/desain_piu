<!-- resources/views/layouts/dashboard-admin.blade.php -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @foreach ($menus as $menu)
            <li class="nav-item {{ (request()->segment(1) == trim($menu->link, '/')) ? 'menu-open' : '' }}">
                {{--<a href="#" class="nav-link">--}}
                <a href="{{ $menu->link }}" class="nav-link">
                    <p>{{ $menu->nmmenu }}</p>
                    @if ($menu->children->isNotEmpty())
                        <i class="right fas fa-angle-left"></i>
                    @endif
                </a>
                @if ($menu->children->isNotEmpty())
                    <ul class="nav nav-treeview">
                        @foreach ($menu->children as $child)
                            <li class="nav-item" style="padding: 0 15px">
                                <a href="{{ $child->link }}" class="nav-link {{ request()->is(trim($child->link, '/')) ? 'active' : '' }}">
                                    <p>{{ $child->nmmenu }}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>


</nav>
