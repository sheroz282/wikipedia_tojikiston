@extends('Frontend.layouts.app')

@section('content')
     <script>
        tinymce.init({
            selector: '#myTextarea',
            plugins: 'advlist autolink lists link image charmap print preview',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            height: 600
        });
    </script>
    <h1 align="center" style="padding-top: 8%;">Создание статье о Таджикистане.</h1>
    <form action="{{ route('articlePost') }}" enctype="multipart/form-data" method="POST" style="display: flex; flex-direction: column; border: 1px solid #c8c2c2; border-radius: 10px; margin: 0 250px 50px 250px;">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInput">Название</label>
                <input type="text" name="title" class="form-control" id="exampleInput"
                       placeholder="Введите название статье" required>
            </div>
            <div class="form-group">
                <label>Виберите категорию</label>
                <br>
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <br>
            <div class="form-group">
                <label for="feature_image">Выберите изображение для поста</label>
                <input type="file" class="form-control"  name="image" id="image" accept=".jpg, .jpeg, .png" required>
{{--                <a href="" class="popup_selector btn btn-primary" data-inputid="feature_image">Обзор</a>--}}
            </div>
            <div class="form-group">
                <label for="feature_image">Введите описание к посту</label>
                <textarea id="myTextarea" name="description">Напишете статья о Таджикистане!</textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Опубликовать</button>
        </div>
    </form>

@endsection
