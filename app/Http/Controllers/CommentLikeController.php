<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentLike;
use Illuminate\Support\Facades\Auth;

class CommentLikeController extends Controller
{
    public function store(Comment $comment)
    {
        CommentLike::create(["comment_id" => $comment->id, "user_id" => Auth::user()->id]);
        return redirect()->back();
    }

    public function destroy(Comment $comment)
    {
        CommentLike::where("comment_id", $comment->id)->where("user_id", Auth::user()->id)->delete();
        return redirect()->back();
    }
}
