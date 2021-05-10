<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WriteArticleController;
use App\Http\Controllers\ArticlesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// auth
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

// main
Route::group(['middleware' => 'auth:api'], function(){
    Route::get('users/{user}', [AuthController::class, 'show']);
    Route::post('write-article/{id}', [WriteArticleController::class, 'articlePost']);
    Route::put('articles/{id}', [ArticlesController::class, 'updateArticleById']);
    Route::delete('articles/{id}', [ArticlesController::class, 'deleteArticleById']);
});

Route::get('articles', [ArticlesController::class, 'getAllArticle']);
Route::get('articles/{id}', [ArticlesController::class, 'getArticleById']);