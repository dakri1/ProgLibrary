@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>Создание</h1>
        <form method="post" action="{{ route('book.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Название книги</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                       value="{{ old('title') }}">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Описание книги</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="description" name="content"
                          rows="3">{{ old('content') }}</textarea>
                @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Изображение</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">
                    <select multiple class="form-control" name="categories[]" id="categories">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
