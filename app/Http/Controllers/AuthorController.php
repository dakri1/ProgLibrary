<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    private const AUTHOR_VALIDATOR = [
        'name' => 'required|max:30',
    ];
    public function author()
    {
        return view('author-create');

    }

    public function createAuthor(Request $request, Author $author)
    {
        $validation = $request->validate(self::AUTHOR_VALIDATOR);
        $author->create(['name' => $validation['name']]);
        return redirect()->route('home');
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
