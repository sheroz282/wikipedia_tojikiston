@extends('layouts.app')
@section('title-page')
    Доступы для роли
@endsection

@section('subtitle')
    <div class="container-fluid pt-4 px-4">
        <div class="text-center rounded pb-0 p-4">
            <div class="cl-2">
                <ul class="navbar-main-submenu">
                    <a href="{{ route('roles.index') }}" class="role-hover" style="color: var(--bs-light)">
                        <li class="align-content-center" style="padding: 15px 15px; border-bottom: 1px solid">
                            Роли
                        </li>
                    </a>
                    <a href="{{ route('accesses.index') }}" class="role-hover" style="color: var(--bs-light)">
                        <li class="align-content-center" style="padding: 15px 15px; border-bottom: 1px solid">
                            Доступы
                        </li>
                    </a>
                    <li style="display: flex; justify-content: flex-end; width: 90%;">
                        @if(auth()->user()->hasRole('Admin'))
                            <button type="button" class="btn btn-primary float-start p-sm-3 border-0"
                                    data-bs-toggle="modal" data-bs-target="#storePriceModal">
                                Добавить доступ
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
                            <form method="post" action="{{ route('accesses.store') }}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="name" placeholder="Название доступ" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                    <label>Названия доступ</label>
                                </div>
                                <div class="form-floating mb-3 d-flex justify-content-between">
                                    <div class="d-grid mt-3" style="width: 49%">
                                        <span onclick="history.go(0);" class="btn --secondary py-3 w-100 mb-1" style=" border: 1px solid #E2E8F0">Отмена</span>
                                    </div>
                                    <div class="d-grid mt-3" style="width: 49%">
                                        <input type="submit" name="send" value="Добавить" class="btn btn-primary py-3 w-100 mb-1">
                                    </div>
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
    <div class="container-fluid px-4">
        <div class=" text-center rounded p-4">
            <div class="table-responsive">
                <table class="table text-start align-middle mb-0 text-dark">
                    <thead style="color: #718096;">
                    <tr>
                        <th scope="col">Действия</th>
                        <th scope="col">Название доступ</th>
                        <th scope="col">Описание доступ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($accesses as $access)
                        <tr>
                            <td>{{$access['name']}}</td>
                            <td>{{$access['guard_name']}}</td>
                            <td>
                                <a class="btn" href="{{ url('/accesses/edit/' . $access['id']) }}">
                                    <i class="fa"><img src="{{ asset('images/edit.svg') }}" alt="editor"></i>
                                </a>
                                <form method="POST" action="{{ url('/accesses/delete/'.$access['id']) }}" style="display: inline-block">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                    <button class="btn"><i class="fa"><img src="{{ asset('images/delete.svg') }}" alt="deleted"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-left">
                    {{ $accesses->onEachSide(1)->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
