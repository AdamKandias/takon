<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function friends(Request $request)
    {
        $following = Auth()->user()->follows->pluck("id");
        $posts = Post::whereIn("user_id", $following)->search($request["search"])->latest()->simplePaginate(10);
        return view("post.friends", ["posts" => $posts, "topRank" => User::topRank()]);
    }
}
