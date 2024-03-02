<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    private const CATEGORY_VALIDATOR = [
        'name' => 'required|max:30',
    ];


    public function category()
    {
        return view('category-create');
    }

    public function createCategory(Request $request, Category $category)
    {
        $validation = $request->validate(self::CATEGORY_VALIDATOR);
        $category->create(['name' => $validation['name']]);
        return redirect()->route('home');
    }

    public function makeCategoryPublished(Category $category)
    {
        $category->update(['is_published' => true]);
        return redirect()->route('admin');
    }
}
