<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentReport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentReportController extends Controller
{
    public function store(Comment $comment, Request $request)
    {
        CommentReport::create(["comment_id" => $comment->id, "user_id" => Auth::user()->id, "description" => $request->report]);
        return redirect()->back();
    }
    
    public function destroy(Comment $comment)
    {
        CommentReport::where(["comment_id" => $comment->id, "user_id" => Auth::user()->id])->delete();
        return redirect()->back();
    }
}
