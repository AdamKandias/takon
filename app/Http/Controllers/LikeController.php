<?php

namespace App\Http\Controllers;

use App\Models\AnswerLike;
use App\Models\CommentLike;
use App\Models\PostLike;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function index(Request $request)
    {
        $filter = ucwords(str_replace("-", " ", $request->get("filter", "pertanyaan")));

        if ($filter == "Pertanyaan") {
            $likes = PostLike::where("user_id", Auth::user()->id)->paginate(10);
        } else if ($filter == "Jawaban") {
            $likes = AnswerLike::where("user_id", Auth::user()->id)->paginate(10);
        } else if ($filter == "Komentar") {
            $likes = CommentLike::where("user_id", Auth::user()->id)->paginate(10);
        } else {
            $likes = null;
        }

        return view("post.likes", ["likes" => $likes, "topRank" => User::topRank(), "filter" => $filter]);
    }
}
