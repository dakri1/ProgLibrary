<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookAuthor;
use App\Models\BookCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\returnValue;

class HomeController extends Controller
{

    private const BB_VALIDATOR = [
        'title' => 'required|max:60',
        'content' => 'required',
        'categories' => 'required',
        'authors' => 'required'
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['books' => Auth::user()->books]);
    }

    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('book-create', ['categories' => $categories, 'authors' => $authors]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(self::BB_VALIDATOR);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }
        else{
            return redirect()->route('home');
        }
        $categories = $validated['categories'];
        $authors = $validated['authors'];
        unset($validated['authors']);
        unset($validated['categories']);
        $book = Auth::user()->books()->create(['title' => $validated['title'], 'content' => $validated['content'],
            'image' => 'images/' . $imageName]);
        foreach ($categories as $category){
            BookCategory::firstOrCreate([
                'category_id' => $category,
                'book_id' => $book->id,
            ]);
        }
        foreach ($authors as $author) {
            BookAuthor::firstOrCreate([
                'author_id' => $author,
                'book_id' => $book->id,
            ]);
        }
        return redirect()->route('home');
    }

    public function edit(Book $book)
    {
        return view('book-edit', ['book' => $book]);
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate(self::BB_VALIDATOR);
        $book->update(['title' => $validated['title'], 'content' => $validated['content'], 'is_published' => false]);
        return redirect()->route('home');
    }

    public function delete(Book $book)
    {
        return view('book-delete', ['book' => $book]);
    }

    public function destroy(Book $book)
    {
        $book->categories()->detach();
        $book->authors()->detach();
        $book->delete();
        return redirect()->route('home');
    }
}
