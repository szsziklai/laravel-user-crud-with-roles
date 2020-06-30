<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <div class="mr-auto">
        <a class="navbar-brand" href="{{ @route('dashboard') }}">{{ config('app.name', 'Laravel') }} @lang('admin_menu.dashboard')</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    </div>
    @include('common.language')
    <!-- Navbar-->
    <ul class="navbar-nav ml-md-0 navbar-right">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ @route('logout') }}">Logout</a>
            </div>
        </li>
    </ul>
</nav>