<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon - OPEN -->
        <link rel="shortcut icon" href="{{{ asset('img/RescueApp-logo.png') }}}" />
        <!-- Favicon - CLOSE -->

        <!-- CSRF Token - OPEN -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- CSRF Token - CLOSE -->

        <!-- Title - OPEN -->
        <title> @yield ('title') | {{ config('app.name') }} </title>
        <!-- Title - CLOSE -->

        <!-- Fonts - OPEN -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <!-- Fonts - CLOSE -->

        <!-- Styles - OPEN -->
        <!-- Bootstrap 4.1 -->
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
        <!-- DataTables for Bootstrap 4.1 -->
        <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Bootstrap daterangepicker -->
        <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
        <!-- Octicons -->
        <link href="{{ asset('css/octicons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Own style -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
        <!-- Styles - CLOSE -->

    </head>

    <body>
        <section>
            @include('parts.nav_search')
        </section>

        <section>
            @yield('content')
        </section>

        <section>
            @include('parts.footer')
        </section>
    </body>

    <!-- Scripts - OPEN -->
    <!-- JQuery 3.3.1 -->
    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
    <!-- JQuery for DataTables -->
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <!-- DataTables for Bootstrap 4.1 -->
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Sorting date for DataTables -->
    <script src="{{ asset('js/sortingDate.js') }}"></script>
    <!-- Bootstrap tooltip -->
    <script src="{{ asset('js/pooper.min.js') }}"></script>
    <!-- Bootstrap 4.1 -->
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
    <!-- Dismiss messages in Bootstrap 4.1 -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Bootstrap daterangepicker -->
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/daterangepicker.min.js') }}"></script>
    <!-- Scripts - CLOSE -->

</html>
