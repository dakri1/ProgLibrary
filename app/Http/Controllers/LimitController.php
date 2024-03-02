<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Limit;
use App\Models\User;
use Illuminate\Http\Request;

class LimitController extends Controller
{

    public function updateBookLimit()
    {

    }

    public function updateCategoryLimit()
    {

    }

    public function limitPage()
    {
        $users = Book::all()->count();
        dd($users);
        return view('admin-limit', ['users' => $users->user()]);
    }




}
