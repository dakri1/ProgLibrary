<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function authorPage()
    {
        $authors = Author::all();
        return view('admin-author', ['authors' => $authors]);
    }

    public function makeAuthorPublished(Author $author)
    {
        $author->update(['is_published' => true]);
        return redirect()->route('admin-author');
    }

    public function deleteAuthor(Author $author)
    {
        $author->delete();
        return redirect()->route('admin-author');
    }
}
