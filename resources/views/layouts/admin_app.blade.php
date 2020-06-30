<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Dashboard - {{ config('app.name', 'Laravel') }} Admin</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <link href="{{ asset('css/admin.app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/admin.app.js') }}" defer></script>
        <script src="{{ asset('js/admin_base.js') }}" defer></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="app">
            @include('admin.menu.user_top_nav')
            <div id="layoutSidenav">
                <div id="layoutSidenav_nav">
                    @include('admin.menu.user_side_nav')
                </div>
                <div id="layoutSidenav_content">
                    @include('flash::message')
                    <main>
                        <div class="container-fluid">
                            @yield('content')
                        </div>
                    </main>
                    <footer class="py-4 bg-light mt-auto">
                        @include('admin.footer.footer')
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
