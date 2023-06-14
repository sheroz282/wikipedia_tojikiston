@extends('Frontend.layouts.app')

@section('content')


    <style>
        .banner_section {
            display: none !important;
        }
    </style>
    <div class="services_section" style="margin-top: 6%;">
        <div class="container">
            <h1 class="services_text">СПИСОК СТАТЬЯ</h1>
        </div>
    </div>
    <div class="Recurments_section_2">
        <div class="container">
            <div style="padding-bottom:50px">
                    @for($i=0; $i<count($articles); $i++)
                    <div class="row padding_top_0">
                        <div class="col-sm-2">
                            <div class="one_text"><a href="#" class="active">{{ ++$id }}</a></div>
                        </div>
                        <div class="col-sm-8">
                            <h1 class="software_text" style="padding-top: 25px">{{ $articles[$i]->title }}</h1>
                        </div>
{{--                        <div class="col-sm-2" style="padding-top: 8px;">--}}
{{--                            <a class="apply_now" href="{{ url( 'article/'.$article->id) }}"--}}
{{--                               style="padding-top: 8px;padding-left: 8px;">Просмотр статья</a>--}}
{{--                        </div>--}}
                    </div>
                    @endfor
            </div>
        </div>
    </div>
@endsection
