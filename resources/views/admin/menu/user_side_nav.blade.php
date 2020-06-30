<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">{{ trans('menu.menu') }}</div>
            @if(Auth::user()->can('administer-users'))
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseUsers" aria-expanded="false" aria-controls="pagesCollapseUsers">{{ trans('menu.users') }}
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
            <div class="collapse" id="pagesCollapseUsers" aria-labelledby="headingOne">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('user_list') }}">{{ trans('menu.users') }}</a>
                    <a class="nav-link" href="{{ route('role_list') }}">{{ trans('menu.roles') }}</a>
                    <a class="nav-link" href="{{ route('permission_list') }}">{{ trans('menu.permissions') }}</a>
                </nav>
            </div>
            @endif
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">{{ trans('user.logged_in_as') }}</div>
        @auth
        {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
        @endauth
        @guest
        @lang('user.anonymous')
        @endguest
    </div>
</nav>