@extends('layouts.app')
@section('title-page')
    Пользователи
@endsection

@section('subtitle')
    <div class="container-fluid pt-4 px-4">
        <div class="text-center rounded pb-0 p-4">
            <div class="cl-2">
                <ul class="navbar-main-submenu">
                    <li style="display: flex; justify-content: flex-end; width: 100%;">
                        @if(auth()->user()->hasRole('Admin'))
                            <button type="button" class="btn btn-primary float-start p-sm-3 border-0"
                                    data-bs-toggle="modal" data-bs-target="#storePriceModal">
                                Добавить пользователя
                            </button>
                        @endif
                    </li>
                </ul>
                <!-- Модальное окно -->
                <div class="modal fade" id="storePriceModal" tabindex="-1" aria-labelledby="storePriceModal"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content p-5">
                            <h5 class="modal-title pb-4 text-dark" id="storePriceModalLabel">Добавить</h5>
                            <form method="post" action="{{ route('users.store') }}" novalidate>
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name"
                                           id="name" placeholder="Имя пользователя" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <label>Имя пользователя</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           name="email"
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
                                    <p style="float: left">Выберите роли</p>
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
                <!--end modal window-->
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid pt-0 px-4 mb-auto">
        <div class="text-center rounded pt-0 p-4">
            <div class="table-responsive">
                <table class="table text-start align-middle mb-0 text-dark" id="info-table">
                    <thead style="color: #718096;">
                    <tr>
                        <th scope="col">Имя</th>
                        <th scope="col">Роли</th>
                        <th scope="col">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><img src="{{ asset('images/avatar.jpg') }}" style="border-radius: 50%; padding-right: 15px;" alt="">{{$user->name}}</td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $role)
                                        <span>{{ $role }}</span>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('users/edit/'. $user->id) }}" class="btn">
                                    <i class="fa"><img src="{{ asset('images/edit.svg') }}" alt="editor"></i>
                                </a>
                                <form method="POST" action="{{ url('users/delete/' . $user->id) }}"
                                      style="display: inline-block">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn"><i class="fa"><img
                                                src="{{ asset('images/delete.svg') }}"
                                                alt="deleted"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-left">
                    {{ $users->onEachSide(1)->links('pagination::bootstrap-4') }}
                </div>
{{--                <script src="{{ asset('js/searchFunction.js') }}"></script>--}}
            </div>
        </div>
    </div>
@endsection
