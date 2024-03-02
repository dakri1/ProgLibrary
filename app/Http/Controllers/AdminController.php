<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function notPublishedBooks()
    {
        $books = Book::where('is_published', false)->get();
        return view('admin', ['books' => $books]);
    }

    public function notPublishedCategories()
    {
        $categories = Category::where('is_published', false)->get();
        return view('admin-category', ['categories' => $categories]);
    }

    public function makeCategoryPublished(Category $category)
    {
        $category->update(['is_published' => true]);
        return redirect()->route('admin-category');
    }

    public function makeBookPublished(Book $book)
    {
        $book->update(['is_published' => true]);
        return redirect()->route('notPublishedBooks');
    }

}
