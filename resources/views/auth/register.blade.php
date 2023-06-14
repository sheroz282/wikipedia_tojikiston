@extends('layouts.header')

@section('main')
    <div class="container-fluid position-relative d-flex p-0">
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="#" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>WIKIPEDIA</h3>
                            </a>
                            <h6>{{ __('Регистрация') }}</h6>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input id="name" type="text"
                                       class="form-control @error('name') is-invalid @enderror" name="name"
                                       value="{{ old('name') }}" required autocomplete="name" autofocus
                                       placeholder="Имя пользователя">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="name">{{ __('Имя пользователя') }}</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="email">{{ __('E-Mail Адрес') }}</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="new-password" placeholder="Пароль">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="password">{{ __('Пароль') }}</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required autocomplete="new-password"
                                       placeholder="Подтвердите пароль">
                                <label for="password-confirm">{{ __('Подтвердите пароль') }}</label>
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
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Забыли пароль?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <button type="submit" class="btn btn-primary py-3 w-100 mb-1">
                                    {{ __('Зарегистрироваться') }}
                                </button>
                            </div>
                        </form>
                        <p class="text-center mb-0">У вас уже есть аккаунт? <a href="{{ route('login') }}">Войти</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
