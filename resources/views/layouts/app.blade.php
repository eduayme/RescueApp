<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title> @yield ('title', 'AR') | {{ config('app.name', 'Aplicatiu de Recerques') }} </title>

      <!-- Scripts -->
      <!-- JQuery 3.3.1 -->
      <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
      <!-- JQuery for DataTables -->
      <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
      <!-- DataTables for Bootstrap 4.1 -->
      <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
      <!-- Sorting date for DataTables -->
      <script src="{{ asset('js/sortingDate.js') }}"></script>
      <!-- Bootstrap 4.1 -->
      <script src="{{ asset('js/app.js') }}" type="text/js"></script>
      <!-- Dismiss messages in Bootstrap 4.1 -->
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      <!-- Bootstrap daterangepicker -->
      <script src="{{ asset('js/moment.min.js') }}"></script>
      <script src="{{ asset('js/daterangepicker.min.js') }}"></script>
      <!-- Bootstrap tooltips -->
      <script src="{{ asset('js/pooper.min.js') }}"></script>

      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">

      <!-- Styles -->
      <!-- Bootstrap 4.1 -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
      <!-- DataTables for Bootstrap 4.1 -->
      <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
      <!-- Bootstrap daterangepicker -->
      <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
      <!-- Octicons -->
      <link href="{{ asset('css/octicons.min.css') }}" rel="stylesheet" type="text/css" />
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{{ asset('img/logo.jpg') }}}" />
  </head>

  <body>
      <section>
          @include('parts.nav')
      </section>

      <section>
          @yield('content')
      </section>

      <section>
          @include('parts.footer')
      </section>
  </body>

</html>
