@extends('layouts.app')

@section('content')
    <section class="container my-4">
        <h2>Категории</h2>
        <ul class="list-group">
            <li class="list-group-item">Жанр 1</li>
            <li class="list-group-item">Жанр 2</li>
            <li class="list-group-item">Жанр 3</li>
            <!-- Add more categories if needed -->
        </ul>
    </section>
    <main class="container">
        <h1>Каталог книг</h1>
        <div class="row">
            @foreach($books as $book)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://cdn1.ozone.ru/s3/multimedia-7/6499906663.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">Краткое описание книги 1.</p>
                            <a href="{{ route('detail', ['book' => $book->id]) }}" class="btn btn-primary">Подробнее</a>
                            <form action="{{ route('book.destroy', ['book' => $book->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                            <a href="{{ route('book.edit', ['book' => $book->id]) }}" class="btn btn-secondary">Изменить</a>
                            <form action="{{ route('book.publish', ['book' => $book->id]) }}" method="post">
                                @csrf
                                <input type="submit" value="Опубликовать">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            {{--        <div class="col-md-4 mb-4">--}}
            {{--            <div class="card">--}}
            {{--                <img src="https://main-cdn.sbermegamarket.ru/big1/hlr-system/134/982/115/610/614/14/600004679561b0.jpeg" class="card-img-top" alt="...">--}}
            {{--                <div class="card-body">--}}
            {{--                    <h5 class="card-title">Название книги 2</h5>--}}
            {{--                    <p class="card-text">Краткое описание книги 2.</p>--}}
            {{--                    <a href="#" class="btn btn-primary">Подробнее</a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            {{--        <div class="col-md-4 mb-4">--}}
            {{--            <div class="card">--}}
            {{--                <img src="book1.jpg" class="card-img-top" alt="...">--}}
            {{--                <div class="card-body">--}}
            {{--                    <h5 class="card-title">Название книги 1</h5>--}}
            {{--                    <p class="card-text">Краткое описание книги 1.</p>--}}
            {{--                    <a href="#" class="btn btn-primary">Подробнее</a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            {{--        <div class="col-md-4 mb-4">--}}
            {{--            <div class="card">--}}
            {{--                <img src="book1.jpg" class="card-img-top" alt="...">--}}
            {{--                <div class="card-body">--}}
            {{--                    <h5 class="card-title">Название книги 1</h5>--}}
            {{--                    <p class="card-text">Краткое описание книги 1.</p>--}}
            {{--                    <a href="#" class="btn btn-primary">Подробнее</a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            {{--        <div class="col-md-4 mb-4">--}}
            {{--            <div class="card">--}}
            {{--                <img src="book1.jpg" class="card-img-top" alt="...">--}}
            {{--                <div class="card-body">--}}
            {{--                    <h5 class="card-title">Название книги 1</h5>--}}
            {{--                    <p class="card-text">Краткое описание книги 1.</p>--}}
            {{--                    <a href="#" class="btn btn-primary">Подробнее</a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            {{--        <div class="col-md-4 mb-4">--}}
            {{--            <div class="card">--}}
            {{--                <img src="book1.jpg" class="card-img-top" alt="...">--}}
            {{--                <div class="card-body">--}}
            {{--                    <h5 class="card-title">Название книги 1</h5>--}}
            {{--                    <p class="card-text">Краткое описание книги 1.</p>--}}
            {{--                    <a href="#" class="btn btn-primary">Подробнее</a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            {{--        <div class="col-md-4 mb-4">--}}
            {{--            <div class="card">--}}
            {{--                <img src="book1.jpg" class="card-img-top" alt="...">--}}
            {{--                <div class="card-body">--}}
            {{--                    <h5 class="card-title">Название книги 1</h5>--}}
            {{--                    <p class="card-text">Краткое описание книги 1.</p>--}}
            {{--                    <a href="#" class="btn btn-primary">Подробнее</a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            {{--        <div class="col-md-4 mb-4">--}}
            {{--            <div class="card">--}}
            {{--                <img src="book1.jpg" class="card-img-top" alt="...">--}}
            {{--                <div class="card-body">--}}
            {{--                    <h5 class="card-title">Название книги 1</h5>--}}
            {{--                    <p class="card-text">Краткое описание книги 1.</p>--}}
            {{--                    <a href="#" class="btn btn-primary">Подробнее</a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            <!-- Добавьте больше блоков card для других книг -->
        </div>
    </main>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">© 2021 Название сайта</span>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
