<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LogController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register',[UserController::class,'store'])->name('user.store');

Route::get('/auth/{login}/{password}',[UserController::class,'auth'])->name('user.auth');

Route::get('/category/{id}/{login}/{password}',[CategoryController::class,'show'])->name('category.show');

Route::post('/category', [CategoryController::class, 'store'])->name('category.store');

Route::post('/log',[LogController::class,'store'])->name('log.store');

Route::get('/log/{id_user}/{login}/{password}',[LogController::class,'show'])->name('log.show');
