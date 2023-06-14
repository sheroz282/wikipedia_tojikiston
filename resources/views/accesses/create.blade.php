@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="rounded p-4">
            <div class="bg-secondary rounded  p-4">
                <h6 class="mb-4">Добавит Доступ</h6>
                <form method="post" action="{{ route('accesses.store') }}" novalidate>
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               id="name" placeholder="Название доступ" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label>Название доступ</label>
                    </div>
                    <div class="d-grid mt-3">
                        <input type="submit" name="send" value="Добавить" class="btn btn-primary py-3 w-100 mb-1">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
