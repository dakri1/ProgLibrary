<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', ['categories' => $categories, 'books' => Book::where('is_published', true)->get()]);
    }

    public function detail(Book $book)
    {
        $authors = $book->authors()->pluck('name');
        $categories = $book->categories()->pluck('name');
        return view('detail', ['book' => $book, 'authors' => $authors, 'categories' => $categories]);
    }

    public function booksWithCategory(Category $category)
    {
        $categoryId = $category->id;
        $categories = Category::all();

        $books = Book::whereHas('categories', function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        })->get();
        return view('index', ['categories' => $categories, 'books' => $books]);
    }

}
