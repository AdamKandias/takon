<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MapelController;
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
Route::post("/password", [UserController::class, "createPassword"])->name("createPassword")->middleware("auth");
Route::put("/password", [UserController::class, "editPassword"])->name("editPassword")->middleware("auth");
Route::put("/image", [UserController::class, "editImage"])->name("editImage")->middleware("auth", "hasPassword");

// Admin Route
Route::get('/dashboard', [UserController::class, "dashboard"])->name("dashboard")->middleware("auth", "onlyAdmin");

// Post Route
Route::get('/home', [PostController::class, "index"])->name("home")->middleware("auth");
Route::get('/ask', [PostController::class, "create"])->name("ask")->middleware("auth", "hasPassword");
Route::post('/ask', [PostController::class, "store"])->name("post.store")->middleware("auth", "hasPassword");
Route::get('/question/{post}', [PostController::class, "show"])->name("post.show")->middleware("auth");

// Answer Route
Route::post('/answer', [AnswerController::class, "store"])->name("answer.store")->middleware("auth", "hasPassword");

// Answer Route
Route::post('/comment', [CommentController::class, "store"])->name("comment.store")->middleware("auth", "hasPassword");

// Mapel Route
Route::get("/mapel", [MapelController::class, "index"])->name("mapel")->middleware("auth");