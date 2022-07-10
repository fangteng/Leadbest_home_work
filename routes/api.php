<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PostController;

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

Route::get('/article_list', [PostController::class, 'index']);
Route::get('/find_article/{id}', [PostController::class, 'show']);
Route::post('/create', [PostController::class, 'store']);
Route::get('/update', [PostController::class, 'update']);
Route::get('/destroy/{id}', [PostController::class, 'destroy']);
