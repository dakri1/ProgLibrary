<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthorController extends Controller
{

    private const AUTHOR_VALIDATOR = [
        'name' => 'required|max:30',
    ];

    public function author()
    {
        Session::put('url', url()->previous());
        return view('author-create');

    }

    public function createAuthor(Request $request, Author $author)
    {
        $validation = $request->validate(self::AUTHOR_VALIDATOR);
        $author->create(['name' => $validation['name']]);
        return redirect(Session::get('url'));
    }

    public function makeAuthorPublished(Author $author)
    {
        $author->update(['is_published' => true]);
        return redirect()->route('admin-author');
    }

    public function destroyAuthor(Author $author)
    {
        $author->delete();
        return redirect()->back();
    }
}
