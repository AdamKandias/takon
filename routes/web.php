<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Auth Route
Route::get('/', [AuthController::class, "login"])->name("login")->middleware("guest");
Route::post('/', [AuthController::class, "auth"])->name("auth")->middleware("guest");
Route::post('/logout', [AuthController::class, "logout"])->name("logout")->middleware("auth");

// User Route
Route::view('/profile', 'user.profile')->name("profile")->middleware("auth");

// Post Route
Route::get('/home', [PostController::class, "index"])->name("home")->middleware("auth");
Route::get('/ask', [PostController::class, "create"])->name("ask")->middleware("auth");
Route::post('/ask', [PostController::class, "store"])->name("post.store")->middleware("auth");
Route::get('/question/{post}', [PostController::class, "show"])->name("post.show")->middleware("auth");