<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BookController::class, 'index'])->name('index');
Route::get('/detail/{book}', [BookController::class, 'detail'])->name('detail');
Route::get('/category/{category}', [BookController::class, 'booksWithCategory'])->name('book.category');

Auth::routes();

//    Admin Panel
@Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'notPublishedBooks'])
    ->name('notPublishedBooks')->middleware('auth', 'role:admin');

Route::post('/publish/{book}', [\App\Http\Controllers\AdminController::class, 'makeBookPublished'])
    ->name('book.publish')->middleware('role:admin');

@Route::get('/admin/category', [\App\Http\Controllers\AdminController::class, 'notPublishedCategories'])
    ->name('notPublishedCategories')->middleware('role:admin');

@Route::get('/admin/author', [\App\Http\Controllers\AdminController::class, 'notPublishedAuthors'])
    ->name('notPublishedAuthors')->middleware('role:admin');

@Route::post('/publish/category/{category}', [\App\Http\Controllers\AdminController::class, 'makeCategoryPublished'])
    ->name('category.publish')->middleware('role:admin');

@Route::post('/publish/author/{author}', [\App\Http\Controllers\AdminController::class, 'makeAuthorPublished'])
    ->name('author.publish')->middleware('role:admin');

@Route::delete('/home/{book}', [\App\Http\Controllers\HomeController::class, 'destroy'])
    ->name('book.destroy')->middleware('role:admin', 'can:destroy,book');


@Route::get('/limits', [\App\Http\Controllers\LimitController::class, 'limitPage'])
    ->name('limits')->middleware('role:admin');


// Home Panel
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');
@Route::get('/home/create', [\App\Http\Controllers\HomeController::class, 'create'])
    ->name('create')->middleware('auth');
@Route::post('/home', [\App\Http\Controllers\HomeController::class, 'store'])
    ->name('book.store')->middleware('check.post.limit');
@Route::get('/home/{book}/edit', [\App\Http\Controllers\HomeController::class, 'edit'])
    ->name('book.edit')->middleware('can:update,book');
@Route::patch('/home/{book}', [\App\Http\Controllers\HomeController::class, 'update'])
    ->name('book.update')->middleware('can:update,book');
@Route::get('/create/category', [\App\Http\Controllers\CategoryController::class, 'category'])
    ->name('category')->middleware('auth');
@Route::get('/create/author', [\App\Http\Controllers\AuthorController::class, 'author'])
    ->name('author')->middleware('auth');
@Route::post('create/category', [\App\Http\Controllers\CategoryController::class, 'createCategory'])
    ->name('category.create')->middleware('auth');
@Route::post('create/author', [\App\Http\Controllers\AuthorController::class, 'createAuthor'])
    ->name('author.create')->middleware('auth');




