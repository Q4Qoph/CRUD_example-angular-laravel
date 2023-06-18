<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Http\Controllers\ArticleController;
use App\Http\Resources\ArticleResource;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/articles', function(){
    return ArticleResource::collection(Article::all());
});
Route::get('/article/{id}', function($id) {
    return new ArticleResource(Article::findOrFail($id));
});


Route::get('/articles', function() {
    return ArticleResource::collection(Article::all());
});

Route::put('/article/{id}', [ArticleController::class,'update']);

Route::delete('/article/{id}', [ArticleController::class,'destroy']);

Route::post('/articles', [ArticleController::class,'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
