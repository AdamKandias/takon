<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostLike;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function store(Post $post)
    {
        PostLike::create(["post_id" => $post->id, "user_id" => Auth::user()->id]);
        return redirect()->back();
    }

    public function destroy(Post $post)
    {
        PostLike::where("post_id", $post->id)->where("user_id", Auth::user()->id)->delete();
        return redirect()->back();
    }
}
