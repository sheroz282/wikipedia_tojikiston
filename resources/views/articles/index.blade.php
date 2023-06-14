@extends('layouts.app')
@section('title-page')
    Статья
@endsection

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4" style="display:flex; justify-content: space-around; width: 100%;">
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 bg-secondary rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Все не подтвержденные статья</h6>
{{--                        <h6><a href="{{ route('articles.store') }}">Создать Cтатья</a></h6>--}}
                        <a href="">Показать все</a>
                    </div>
                    @foreach($articlesFalse as $article)
                        <div class="d-flex align-items-center py-2" style="border-bottom: 1px solid #cecece">
                            <div class="w-100 ms-3">
                                <div class="d-flex w-100 align-items-center justify-content-between">
                                    <span>
                                        <a href="{{ url('articles/editFalse/' . $article->id) }}">
                                            {{ $article->title }}
                                        </a>
                                    </span>
                                    <form method="post" action="{{ url('articles/delete/' . $article->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background-color: white; border:none;">
                                            <i class="fa fa-times" style="color: red; border:none;"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-left mt-4">
                        {{ $articlesFalse->onEachSide(1)->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 bg-secondary rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Все подтвержденные статья</h6>
{{--                        <h6><a href="{{ route('articles.store') }}">Создать Cтатья</a></h6>--}}
                        <a href="">Показать все</a>
                    </div>
                    @foreach($articlesTrue as $article)
                        <div class="d-flex align-items-center py-2" style="border-bottom: 1px solid #cecece">
                            <div class="w-100 ms-3">
                                <div class="d-flex w-100 align-items-center justify-content-between">
                                    <span>
                                        <a href="{{ url('articles/editTrue/' . $article->id) }}">
                                            {{ $article->title }}
                                        </a>
                                    </span>
                                    <form method="post" action="{{ url('articles/delete/' . $article->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background-color: white; border:none;">
                                            <i class="fa fa-times" style="color: red; border:none;"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-left mt-4">
                        {{ $articlesTrue->onEachSide(1)->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 bg-secondary rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Все подтвержденные Категория</h6>
{{--                        <h6><a href="{{ route('categories.create') }}">Создать Категория</a></h6>--}}
                        <a href="">Показать все</a>
                    </div>
                    @foreach($categoriesTrue as $category)
                        <div class="d-flex align-items-center py-2" style="border-bottom: 1px solid #cecece">
                            <div class="w-100 ms-3">
                                <div class="d-flex w-100 align-items-center justify-content-between">
                                    <span>
                                        <a href="{{ url('categories/edit/' . $category->id) }}">
                                            {{ $category->title }}
                                        </a>
                                    </span>
                                    <form method="post" action="{{ url('categories/delete/' . $category->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background-color: white; border:none;">
                                            <i class="fa fa-times" style="color: red; border:none;"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-left mt-4">
                        {{ $categoriesTrue->onEachSide(1)->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
            @if(count($categoriesFalse) != 0)
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 bg-secondary rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Все не подтвержденные Категория</h6>
{{--                        <h6><a href="{{ route('categories.create') }}">Создать Категория</a></h6>--}}
                        <a href="">Показать все</a>
                    </div>
                    @foreach($categoriesFalse as $category)
                        <div class="d-flex align-items-center py-2" style="border-bottom: 1px solid #cecece">
                            <div class="w-100 ms-3">
                                <div class="d-flex w-100 align-items-center justify-content-between">
                                    <span>
                                        <a href="{{ url('categories/edit/' . $category->id) }}">
                                            {{ $category->title }}
                                        </a>
                                    </span>
                                    <form method="post" action="{{ url('categories/delete/' . $category->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background-color: white; border:none;">
                                            <i class="fa fa-times" style="color: red; border:none;"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-left mt-4">
                        {{ $categoriesFalse->onEachSide(1)->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

@endsection
