<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class FriendController extends Controller
{
    public function friends()
    {
        $following = Auth()->user()->follows->pluck("id");
        $posts = Post::whereIn("user_id", $following)->latest()->simplePaginate(10);
        return view("post.friends", ["posts" => $posts, "topRank" => User::topRank()]);
    }
}
