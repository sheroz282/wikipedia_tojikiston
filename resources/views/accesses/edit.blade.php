@extends('layouts.app')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="rounded p-4">
            <div class="bg-secondary rounded p-4">
                <h6 class="mb-4">{{__('Изменить название доступа')}}</h6>
                <form method="post" action="{{ url('accesses/update/' . $access->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Access Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ $access->name }}" required/>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
