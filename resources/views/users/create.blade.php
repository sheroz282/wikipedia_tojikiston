@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="rounded p-4">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Добавит пользователя</h6>
                    <form method="post" action="{{ route('users.store') }}" novalidate>
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                   id="name" placeholder="Имя пользователя" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label>Имя пользователя</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                   id="email" placeholder="email" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label>Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" id="password" placeholder="Пароль" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label>Пароль</label>
                        </div>

                        <div class="form-floating mb-4">
                            <p>Выберите роли</p>
                            <select class="form-select" name="roles" aria-label="Default select example">
                                @foreach($roles as $role)
                                    <div class="form-check form-check-inline">
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    </div>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-grid mt-0">
                            <input type="submit" name="send" value="Добавить" class="btn btn-primary py-3 w-100 mb-1">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
