@extends('layouts.app')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="rounded p-4">
            <div class="bg-secondary rounded p-4">
                <h6 class="mb-4">{{__('Изменить пользователя')}}</h6>
                <form method="post" action="{{ url('users/update/' . $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Имя пользователь</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" required/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Почта</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" required/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Пароль</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" value="" required/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Рол</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="role_id">
                            @foreach($roles as $role)
                                    <option value="{{ $role->id }}" @if(isset($role)) selected @endif>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
