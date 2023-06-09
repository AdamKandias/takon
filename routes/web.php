<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AnswerLikeController;
use App\Http\Controllers\AnswerReportController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentLikeController;
use App\Http\Controllers\CommentReportController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\PostReportController;
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
Route::get("/profile/{user}", [UserController::class, "show"])->name("user.show")->middleware("auth");
Route::view('/profile', 'user.profile')->name("profile")->middleware("auth");
Route::post("/password", [UserController::class, "createPassword"])->name("createPassword")->middleware("auth");
Route::put("/password", [UserController::class, "editPassword"])->name("editPassword")->middleware("auth");
Route::put("/image", [UserController::class, "editImage"])->name("editImage")->middleware("auth", "hasPassword");
Route::get("/rank", [UserController::class, "rank"])->name("rank")->middleware("auth");

// Admin Route
Route::get('/dashboard', [AdminController::class, "index"])->name("dashboard")->middleware("auth", "onlyAdmin");
Route::get('/dashboard/user-show/{user}', [AdminController::class, "userShow"])->name("userShow")->middleware("auth", "onlyAdmin");
Route::post('/dashboard/user-destroy/{user}', [AdminController::class, "userDestroy"])->name("userDestroy")->middleware("auth", "onlyAdmin");
Route::get('/dashboard/reports', [AdminController::class, "reports"])->name("dashboardReports")->middleware("auth", "onlyAdmin");
Route::get('/dashboard/report-show/{linkid}', [AdminController::class, "reportShow"])->name("reportShow")->middleware("auth", "onlyAdmin");
Route::post('/dashboard/report-destroy/{linkid}', [AdminController::class, "reportDestroy"])->name("reportDestroy")->middleware("auth", "onlyAdmin");
Route::put('/dashboard/report-update/{linkid}', [AdminController::class, "reportUpdate"])->name("reportUpdate")->middleware("auth", "onlyAdmin");
Route::get('/dashboard/posts', [AdminController::class, "posts"])->name("dashboardPosts")->middleware("auth", "onlyAdmin");
Route::get('/dashboard/post-show/{post}', [AdminController::class, "postShow"])->name("postShow")->middleware("auth", "onlyAdmin");
Route::post('/dashboard/post-destroy/{post}', [AdminController::class, "postDestroy"])->name("postDestroy")->middleware("auth", "onlyAdmin");
Route::get('/dashboard/answers', [AdminController::class, "answers"])->name("dashboardAnswers")->middleware("auth", "onlyAdmin");
Route::get('/dashboard/answer-show/{answer}', [AdminController::class, "answerShow"])->name("answerShow")->middleware("auth", "onlyAdmin");
Route::post('/dashboard/answer-destroy/{answer}', [AdminController::class, "answerDestroy"])->name("answerDestroy")->middleware("auth", "onlyAdmin");
Route::get('/dashboard/comments', [AdminController::class, "comments"])->name("dashboardComments")->middleware("auth", "onlyAdmin");
Route::get('/dashboard/comment-show/{comment}', [AdminController::class, "commentShow"])->name("commentShow")->middleware("auth", "onlyAdmin");
Route::post('/dashboard/comment-destroy/{comment}', [AdminController::class, "commentDestroy"])->name("commentDestroy")->middleware("auth", "onlyAdmin");

// Post Route
Route::get('/home', [PostController::class, "index"])->name("home")->middleware("auth");
Route::get('/ask', [PostController::class, "create"])->name("ask")->middleware("auth", "hasPassword");
Route::post('/ask', [PostController::class, "store"])->name("post.store")->middleware("auth", "hasPassword");
Route::get('/question', [PostController::class, "userPost"])->name("userPost")->middleware("auth", "hasPassword");
Route::get('/question/{post}', [PostController::class, "show"])->name("post.show")->middleware("auth");

// Following Route
Route::get('/following', [FollowController::class, "following"])->name("following")->middleware("auth", "hasPassword");
Route::get('/follower', [FollowController::class, "follower"])->name("follower")->middleware("auth", "hasPassword");
Route::post('/following/{user}', [FollowController::class, "follow"])->name("follow")->middleware("auth", "hasPassword");
Route::delete('/following/{user}', [FollowController::class, "unfollow"])->name("unfollow")->middleware("auth", "hasPassword");

// Friend Route
Route::get('/friends', [FriendController::class, "friends"])->name("friends")->middleware("auth", "hasPassword");

// Answer Route
Route::get('/answer', [AnswerController::class, "userAnswer"])->name("userAnswer")->middleware("auth", "hasPassword");
Route::post('/answer', [AnswerController::class, "store"])->name("answer.store")->middleware("auth", "hasPassword");

// Comment Route
Route::get('/comment', [CommentController::class, "userComment"])->name("userComment")->middleware("auth", "hasPassword");
Route::post('/comment', [CommentController::class, "store"])->name("comment.store")->middleware("auth", "hasPassword");

// Mapel Route
Route::get("/mapel", [MapelController::class, "index"])->name("mapel")->middleware("auth");

// Likes Route
Route::get("/likes", [LikeController::class, "index"])->name("likes")->middleware("auth", "hasPassword");

// Post Like Route
Route::post('/question/{post}/post-like', [PostLikeController::class, "store"])->name("post.like")->middleware("auth", "hasPassword");
Route::delete('/question/{post}/post-like', [PostLikeController::class, "destroy"])->name("post.unlike")->middleware("auth", "hasPassword");

// Answer Like Route
Route::post('/question/{answer}/answer-like', [AnswerLikeController::class, "store"])->name("answer.like")->middleware("auth", "hasPassword");
Route::delete('/question/{answer}/answer-like', [AnswerLikeController::class, "destroy"])->name("answer.unlike")->middleware("auth", "hasPassword");

// Comment Like Route
Route::post('/question/{comment}/comment-like', [CommentLikeController::class, "store"])->name("comment.like")->middleware("auth", "hasPassword");
Route::delete('/question/{comment}/comment-like', [CommentLikeController::class, "destroy"])->name("comment.unlike")->middleware("auth", "hasPassword");

// Post Report Route
Route::post('/question/{post}/post-report', [PostReportController::class, "store"])->name("post.report")->middleware("auth", "hasPassword");
Route::delete('/question/{post}/post-report', [PostReportController::class, "destroy"])->name("post.unreport")->middleware("auth", "hasPassword");

// Answer Report Route
Route::post('/question/{answer}/answer-report', [AnswerReportController::class, "store"])->name("answer.report")->middleware("auth", "hasPassword");
Route::delete('/question/{answer}/answer-report', [AnswerReportController::class, "destroy"])->name("answer.unreport")->middleware("auth", "hasPassword");

// Comment Report Route
Route::post('/question/{comment}/comment-report', [CommentReportController::class, "store"])->name("comment.report")->middleware("auth", "hasPassword");
Route::delete('/question/{comment}/comment-report', [CommentReportController::class, "destroy"])->name("comment.unreport")->middleware("auth", "hasPassword");

Route::get('/notification', [NotificationController::class, "index"])->name("notification")->middleware("auth");
Route::get('/notification/{notification}', [NotificationController::class, "show"])->name("notification.show")->middleware("auth");
Route::delete('/notification/{notification}', [NotificationController::class, "destroy"])->name("notification.destroy")->middleware("auth");
