<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Каталог книг</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Название сайта</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index') }}">Главная</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Зарегестрироваться</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Войти</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Мои книги</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post" class="form-inline">
                            @csrf
                            <input type="submit" class="btn btn-danger" value="Выход">
                        </form>
                    </li>
                @endauth

            </ul>
        </div>
    </nav>
</header>


{{--<header>--}}
{{--    <div class="logo">--}}
{{--        <img src="logo.png" alt="Логотип">--}}
{{--        <h1>Интернет-магазин книг</h1>--}}
{{--    </div>--}}
{{--    <nav>--}}
{{--        <ul>--}}
{{--            <li><a href="{{ route('index') }}">Главная</a></li>--}}
{{--            <li><a href="{{ route('register') }}">Reigster</a></li>--}}
{{--            <li><a href="{{ route('login') }}">Login</a></li>--}}
{{--            <form action="{{ route('logout') }}" method="post">--}}
{{--                @csrf--}}
{{--                <input type="submit" value="Logout">--}}
{{--            </form>--}}
{{--        </ul>--}}
{{--    </nav>--}}
{{--</header>--}}
@yield('content')
