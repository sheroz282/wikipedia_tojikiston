@extends('layouts.app')
@section('content')
    <style>
        .tox-notification .tox-notification--in .tox-notification--warning {
            display: none;
        }

        .tox-notification--in .tox-notification--warning {
            display: none;
        }

        .tox-notification--warning {
            display: none;
        }
    </style>
    <script type="text/javascript">
        tinymce.init({
            selector: '#editFalse',
            // plugins: 'advlist autolink lists link image charmap print preview',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            height: 600
        });
    </script>
    <h3 align="center" style="margin-top: 50px">Изменить Не подтвержденное статья</h3>
    {{--    {{ dd($articleFalse) }}--}}
    <form method="post" action="{{ url('articles/updateFalse/' . $articleFalse->id) }}" enctype="multipart/form-data"
          style="display: flex; flex-direction: column; border: 1px solid #c8c2c2; border-radius: 10px; margin: 0 50px 50px 50px;">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInput">Название</label>
                <input type="text" name="title" class="form-control" id="exampleInput"
                       value="{{ $articleFalse->title }}" required>
            </div>
            <br>
            <div class="form-group">
                <label>Категория</label>
                <br>
                <label>Связанное категория <b style="background-color: #202326; color: white">
                        № {{ $articleFalse->category_id }}</b></label>
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->id .". ". $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="feature_image">Картинка</label>
                <br>
                <img src="{{ Storage::url($articleFalse->img) }}" alt="photo">
                <input type="file" class="form-control" name="image" id="image" accept=".jpg, .jpeg, .png">
            </div>
            <br>
            <div class="form-group">
                <label for="feature_image">Описание</label>
                <textarea id="editFalse" name="description">{{ $articleFalse->description }}</textarea>
            </div>
            <br>
            <div class="form-group">
                <label for="feature_image">Дата создание</label>
                <input type="text" class="form-control" name="created_at" value="{{ $articleFalse->created_at }}"
                       required/>
            </div>
            <div class="form-group" style="margin-top: 15px">
                <label for="feature_image">Опубликовать статья</label>
                <input type="checkbox" class="form-check-input" name="status" value="1"/>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Обнавить</button>
        </div>
    </form>
@endsection
