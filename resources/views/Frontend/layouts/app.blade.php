<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Wiki Tajikistan</title>
    <meta name="keywords" content="Википедия Таджикистан">
    <meta name="description" content="Самый лушчие поисковик о Таджикистане">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Frontend/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Frontend/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('css/Frontend/css/responsive.css') }}">
    <!-- favicon -->
    <link rel="icon" href="{{ asset('css/Frontend/images/wiki-tojikiston.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/Frontend/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="{{ asset('css/Frontend/netdna.bootstrapcdn.css') }}">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/Frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesoeet" href="{{ asset('css/Frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/Frontend/jquery.fancybox.min.css')}}" media="screen">
    <script src="{{asset('js/tinymce.min.js')}}"></script>
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
<!-- header section start-->
<div style="position: fixed; width: 100%; z-index: 99999999">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="logo" style="font-weight: bold; font-size:32px;" href="{{ url('/') }}">
        <img src="{{ asset('css/Frontend/images/wiki-tojikiston.png') }}" alt="wiki-tajikistan" style="max-width: 50px">
        TOJIKISTON
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('frontend') }}">ГЛАВНАЯ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('article') }}">СОЗДАТЬ СТАТЬЮ </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categoriesFrontend') }}">КАТЕГОРИЙ</a>
            </li>
        </ul>
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
                <a class="nav-link dropdown-toggle bg-white" data-bs-toggle="dropdown"
                   style="margin: 15px 0 15px 15px;padding: 0 5px 0 0;border-radius: 8px;">
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
</nav>
</div>
<!-- header section start-->

@yield('content')

<!-- copyright section start-->
<div class="copyright_section" style="border-top: 1px solid #e5e4e4; margin-top: 20px; border-radius: 10px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p class="copyright_text">Copyright 2023 Все права защищены.</p>
            </div>
            <div class="col-md-6">
                <p class="cookies_text">Файлы cookie, конфиденциальность и условия</p>
            </div>
        </div>
    </div>
</div>
<!-- copyright section end-->
<!-- Javascript files-->
<script src="{{asset('css/Frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('css/Frontend/js/popper.min.js')}}"></script>
<script src="{{asset('css/Frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('css/Frontend/js/jquery-3.0.0.min.js')}}"></script>
<script src="{{asset('css/Frontend/js/plugin.js')}}"></script>
<!-- sidebar -->
<script src="{{asset('css/Frontend/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('css/Frontend/js/custom.js')}}"></script>
<!-- javascript -->
<script src="{{asset('css/Frontend/js/owl.carousel.js')}}"></script>
<script src="{{asset('css/Frontend/jquery.fancybox.min.js')}}"></script>


<script>
    $(document).ready(function() {
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    })
</script>

</body>
</html>
