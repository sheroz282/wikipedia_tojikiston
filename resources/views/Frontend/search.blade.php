<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Wiki Tajikistan</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Frontend/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Frontend/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('css/Frontend/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('css/Frontend/images/wiki-tojikiston.png') }}" type="image/gif"/>
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/Frontend/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="{{ asset('css/Frontend/netdna.bootstrapcdn.css') }}">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/Frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesoeet" href="{{ asset('css/Frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/Frontend/jquery.fancybox.min.css')}}" media="screen">
    <script src="{{asset('js/tinymce.min.js')}}"></script>
    <!-- CDN Style Css and JS Bootstrap -->
    <link href="{{asset('css/cdn.css_bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="{{asset('css/cdn.bootstrap.bundle.min.js')}}" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<!-- header section start-->
<div style="position: fixed; width: 100%; z-index: 99999999">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="logo" style="font-weight: bold; font-size:32px" href="{{ url('/') }}">
        <img src="{{ asset('css/Frontend/images/wiki-tojikiston.png') }}" alt="wiki-tajikistan" style="max-width: 50px">
        TOJIKISTON
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('frontend') }}">ГЛАВНАЯ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('article') }}">СОЗДАТЬ СТАТЬЮ</a>
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
<!-- banner section start-->
<div>
    <img src="{{ asset('css/Frontend/images/banner3.jpg') }}" max-width="100%" max-height="50%" alt="banner3" class="banner_section">
    <div class="container" style="position:absolute; display:flex; flex-direction:column; margin:20% 20% 20% 9%">
        <h1 class="best_taital" style="font-weight: bold;">WIKIPEDIA TOJIKISTON</h1>
        <div class="box_main">
            <form action="{{ route('getSearch') }}" method="get" class="box_main">
                @csrf
                <input type="search" class="email_bt" placeholder="Поиск..." name="search">
                <button class="subscribe_bt" type="submit">ПОИСК</button>
            </form>
        </div>
    </div>
</div>
<!-- banner section end-->
<script>
    tinymce.init({
        selector: '#myTextarea1',
        plugins: '',
        toolbar: '',
        height: 500
    });
</script>
<div class="services_section">
    <div class="container">
        <h1 class="services_text">Результать поиска</h1>
    </div>
</div>
<div class="Recurments_section_2">
    <div class="container">
        <div style="padding-bottom:50px">
            @for($i=0; $i<count($getSearchResource); $i++)
                <div class="row padding_top_0">
                    <div class="col-sm-2">
                        <div class="one_text"><a href="#" class="active">{{ ++$id }}</a></div>
                    </div>
                    <div class="col-sm-8">
                        <h1 class="software_text" style="padding-top: 25px">{{ $getSearchResource[$i]->title }}</h1>
{{--                        <textarea cols="100" rows="20">--}}
{{--                            {{ $getSearchResource[$i]->description }}--}}
{{--                        </textarea>--}}
                        <div class="form-group">
                            <textarea id="myTextarea1" name="description">
                                {{ $getSearchResource[$i]->description }}
                            </textarea>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>

<!-- copyright section start-->
<div class="copyright_section" style="border-top: 1px solid #e5e4e4; margin-top: 20px; max-height:50px; border-radius: 10px;">
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
    $(document).ready(function () {
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    })
</script>

</body>
</html>
