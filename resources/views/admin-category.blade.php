@extends('layouts.app')

@section('content')

    <main class="container">
        <h1>Каталог книг</h1>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <form action="{{ route('category.destroy', ['category' => $category->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                            {{--                            <a href="{{ route('book.edit', ['book' => $book->id]) }}" class="btn btn-secondary">Изменить</a>--}}
                            <a href="{{ route('category.publish', ['category' => $category->id]) }}"
                               class="btn btn-secondary">Опубликовать</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

@endsection
