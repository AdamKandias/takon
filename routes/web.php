<?php

use App\Http\Controllers\AuthController;
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
Route::post('/login', [AuthController::class, "auth"])->name("auth")->middleware("guest");
Route::post('/logout', [AuthController::class, "logout"])->name("logout")->middleware("auth");

// Post Route
// Route::get('/home', [UserController::class, "index"])->name("home")->middleware("auth");