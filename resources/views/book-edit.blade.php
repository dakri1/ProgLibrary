@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>Редактирование</h1>
        <form method="post" action="{{ route('book.update', ['book' => $book->id]) }}">
            @csrf
            @method("PATCH")
            <div class="form-group">
                <label for="title">Название книги</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $book->title) }}">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Описание книги</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="description" name="content" rows="3">{{ old('content', $book->content) }}</textarea>
                @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection
