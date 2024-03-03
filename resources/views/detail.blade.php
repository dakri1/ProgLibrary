@extends('layouts.app')
@section('content')
<main class="container">
    <h1>{{ $book->title }}</h1>
    <div class="row">
        <div class="col-md-4">
            <img src="https://cdn1.ozone.ru/s3/multimedia-7/6499906663.jpg" alt="Обложка книги" class="img-fluid">
        </div>
        <div class="col-md-8">
            <p>Категории: {{ $categories->implode(', ') }}</p>
            <p>Автор(ы): {{ $authors->implode(', ') }}</p>
            <p>Год публикации: НЕ ЗАБЫТЬ ДОБАВИТЬ</p>
            <p>{{ $book->content }}</p>
            <button class="btn btn-primary">Купить</button>
        </div>
    </div>
</main>
@endsection
