@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>Добавление нового автора</h1>
        <form method="post" action="{{ route('author.create')}}">
            @csrf
            <div class="form-group">
                <label for="title">Author</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">add</button>
        </form>
    </div>
@endsection
