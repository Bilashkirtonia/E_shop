<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet">
</head>

<body class="g-sidenav-show  bg-gray-200">
    @include('layouts.inc.sidenav')  
   <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    @include('layouts.inc.adminnav')
        <div class="content">
            @yield('content')
        </div>
    @include('layouts.inc.footer')
  </main>

<script src="{{ asset('admin/js/jquery.js') }}"defer></script>
<script src="{{ asset('admin/js/popper.min.js') }}"defer></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"defer></script>
<script src="{{ asset('admin/js/perfect-scrollbar.min.js') }}"defer></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session('status'))
  <script>
      swal("{{ session('status') }}");
  </script>
@endif
@yield('scripts')





</body>
</html>



