<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Google Web Fonts -->
    <link href="{{ asset('css/roboto-font-family.css') }}" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('css/assets/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tempusdominus/tempusdominus-bootstrap-4.css') }}" rel="stylesheet"/>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Styles -->
    <script src="{{asset('js/tinymce.min.js')}}"></script>
</head>
<body>
<div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner"
         class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Загружается...</span>
        </div>
    </div>
    <!-- Spinner End -->
{{--    @include('layouts.menu')--}}
{{--    @include('layouts.app')--}}
    @yield('main')
</div>

<!-- JavaScript Libraries -->
<script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/js/lib/chart/chart.min.js') }}"></script>
<script src="{{ asset('/js/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('/js/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('/js/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/js/lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('/js/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('/js/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('/js/main.js') }}"></script>
</body>
</html>
