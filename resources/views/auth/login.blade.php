@extends('layouts.header')
@section('main')
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center">{{-- style="min-height: 100vh;" --}}
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>WIKIPEDIA</h3>
                            </a>
                            <h6>Авторизация</h6>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input id="floatingInput" type="text" placeholder="Имя пользователя"
                                       class="form-control @error('name') is-invalid @enderror" name="name"
                                       value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="floatingInput">Имя пользователя</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input id="floatingPassword" type="password" placeholder="Пароль"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="floatingPassword">Пароль</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Запомнить меня') }}
                                    </label>
                                </div>
                                <a href>Забыли пароль?</a>
{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Забыли пароль?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Авторизация</button>
                        </form>
                        <p class="text-center mb-0">У вас нет учетной записи? <a href="{{ route('register') }}">Регистрация</a></p>

                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>
@endsection
