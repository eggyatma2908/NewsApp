<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WriteArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('master');
});

// auth
Route::get('/register', [AuthController::class, 'index'])->name('signup');
Route::get('/login', [AuthController::class, 'index'])->name('login');

// main
Route::get('/my-article', [ArticlesController::class, 'index'])->name('my-article');
Route::get('/articles', [ArticlesController::class, 'index'])->name('articles');
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/write-article', [WriteArticleController::class, 'index'])->name('write-article');
Route::get('/read-article/{id}', [ArticlesController::class, 'readArticle'])->name('read-article');
Route::get('/edit-article/{id}', [ArticlesController::class, 'editArticle'])->name('edit-article');