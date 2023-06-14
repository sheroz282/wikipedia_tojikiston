<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'City Parking') }}</title>
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
    <!--Date Time Range-->
    <link rel="stylesheet" href="{{ asset('css/vanilla-datetimerange-picker.css') }}">
    <script src="{{ asset('js/tinymce.min.js') }}"></script>
    <style>
        .tox-statusbar__branding{
            display: none !important;
        }
        .tox-notifications-container{
            display: none !important;
        }
    </style>
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
    @include('layouts.menu')
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top mt-4 m-5 mb-0 p-3 pt-0 pb-0 rounded-1">
                <a href="#" class="sidebar-toggler flex-shrink-0 ">
                    <i class="fa fa-bars"></i>
                </a>
                <h3 class="text-dark m-0 p-2">
                    @yield('title-page')
                </h3>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="d-none d-lg-inline-flex">Уведомления</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="navbar-nav align-items-center ms-auto">
                        <div class="nav-item">
                            @guest
                                @if (Route::has('login'))
                                    <span class="d-none d-lg-inline-flex">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        {{ __('Вход') }}
                                    </a>
                                </span>
                                @endif
                            @endguest
                        </div>
                        <div class="nav-item dropdown">
                            @guest
                            @else
                                <a class="nav-link dropdown-toggle bg-white" data-bs-toggle="dropdown" style="margin: 15px 0 15px 15px;padding: 0 5px 0 0;border-radius: 8px;">
                                    <img class="rounded-circle me-lg-2" src="{{ asset('images/avatar.jpg') }}"
                                         alt="photo" style="width: 40px; height: 40px;">
                                    <span class="d-none d-lg-inline-flex text-dark">{{ Auth::user()->name }}</span>
                                </a>
                            @endguest
                            <div
                                class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                   class="dropdown-item">{{ __('Выход') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            @yield('subtitle')

            @yield('content')

        </div>
    </div>
</div><div class="container-fluid pt-4 px-4" style="padding-left: 302px !important;padding-top: 20px;">
    <div class="bg-secondary rounded-top p-4">
        <div class="row">
            <div class="col-12 col-sm-6 text-center text-sm-start">
                2023 © <a href="#">WIKIPEDIA TAJIKISTAN</a>, Все права защищены.
            </div>
            <div class="col-12 col-sm-6 text-center text-sm-end">
                Designed By <a href="#">Sheroz Zoidov</a>
            </div>
        </div>
    </div>
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
