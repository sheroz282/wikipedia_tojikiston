@extends('layouts.app')
@section('title-page')
    Роли для пользователья
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
                            <a href="{{ url('roles/create') }}">
                                <button type="button" class="btn btn-primary float-start p-sm-3 border-0">
                                    Добавить роль
                                </button>
                            </a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid pt-0 px-4">
        <div class="text-center rounded p-4 pt-0">
            <div class="table-responsive">
                <table class="table text-start align-middle text-dark">
                    <thead style="color: #718096;">
                    <tr>
                        <th>Название рол</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a href="{{ url('/roles/edit/' . $role->id) }}" data-toggle="modal" data-bs-target="#roleModal">
                                    <i class="fa"><img src="{{ asset('images/edit.svg') }}" alt="editor"></i>
                                </a>
                                <form method="POST" action="{{ url('/roles/delete/' . $role->id) }}"
                                      style="display: inline-block">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn"><i class="fa"><img
                                                src="{{ asset('images/delete.svg') }}" alt="deleted"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
                <div class="d-flex justify-content-left">
                    {{ $roles->onEachSide(1)->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
