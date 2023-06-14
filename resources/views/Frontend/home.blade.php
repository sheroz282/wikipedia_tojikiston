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
                <input type="search" class="email_bt" placeholder="Поиск..." name="search">
                <button class="subscribe_bt" type="submit"><a>ПОИСК</a></button>
            </form>
        </div>
    </div>
</div>
<!-- banner section end-->
<!-- marketing section start-->
<div class="marketing_section layout_padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="job_section">
                    <h1 class="jobs_text">Высокие горы таджикистана</h1>
                    <p class="dummy_text">В Таджикистане горы занимают 93% территории страны - альпинизм стремительно
                        развивается, с каждым годом привлекая все больше туристов.
                        Высочайшая вершина в республике, самая высокая точка бывшего Советского Союза - пик Исмоила
                        Сомони (7495 метров) - находится на Памире.</p>
                    <div class="apply_bt"><a href="{{ route('infoTJK') }}" style="border-radius: 20px;">Подробнее</a></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="image_1 padding_0">
                    <img src="{{asset('css/Frontend/images/Tajikistan-Peak_Communism.jpg')}}" style="border-radius: 25px;">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- marketing section end-->
<!-- Industrial section start-->
<div class="marketing_section layout_padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="image_1 padding_0">
                    <img src="{{ asset('css/Frontend/images/gissar.jpg') }}" style="border-radius: 25px;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="job_section_2">
                    <h1 class="jobs_text">Гиссарская крепость</h1>
                    <p class="dummy_text">Город Гиссар находится в западной части Гиссарской долины, в 20 км от столицы
                        Таджикистана – Душанбе. Гиссарской крепости – одного из самых известных исторических сооружений
                        в Центральной Азии. Ее построили 2500 лет назад из жженного кирпича, а главные ворота – арк –
                        соорудили в XVI веке – в те времена крепость служила резиденцией эмира Бухары.</p>
                    <div class="apply_bt"><a href="{{ route('hissarFortress') }}" style="border-radius: 20px;">Подробнее</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Industrial section end-->
<!-- Corporate section start-->
<div class="marketing_section layout_padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="job_section">
                    <h1 class="jobs_text">«Чил духтарон»</h1>
                    <p class="dummy_text">В южной части Таджикистана, в Муминабаде находится древнее и очень красивое
                        место, которое получило в своё время необычное поэтическое название – Чил духтарон («Долина
                        Сорока Девушек»). </p>
                    <p class="dummy_text">Главной её достопримечательностью являются необычные скалы пирамидальной
                        формы. Они горделиво возвышаются над долиной, напоминая гордых стройных девушек. Высота скал
                        доходит до 60 метров.</p>
                    <div class="apply_bt"><a href="{{ route('chilDuhtaron') }}" style="border-radius: 20px;">Подробнее</a></div>
                </div>
            </div>
            <div class="col-md-6 padding_0">
                <div class="image_1">
                    <img style="max-width: 95%; border-radius: 25px;" src="{{ asset('css/Frontend/images/40dukhtaron.jpg') }}">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Corporate section end-->
<!-- Government section start-->
<div class="marketing_section layout_padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 padding_0" style="padding-left: 15px;">
                <div class="image_1"><img src="{{asset('css/Frontend/images/choykhona.jpg')}}" style="border-radius:25px"></div>
            </div>
            <div class="col-md-6">
                <div class="job_section_2">
                    <h1 class="jobs_text">«Чайхона»</h1>
                    <p class="dummy_text">Жители Таджикистана зачастую предпочитают наслаждаться своей чайной традицией
                        в местных заведениях, которые называются «чайхона», т. е. «чайный дом» или «чайная комната».
                        Чайхона - это место, где мужчины всех возрастов могут собраться вместе и обсудить последние
                        новости, либо насущные проблемы в своей жизни.</p>
                    <div class="apply_bt"><a href="{{ route('chaihona') }}" style="border-radius: 20px;">Подробнее</a></div>
                </div>
            </div>
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
