<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FollowController extends Controller
{
    public function following()
    {
        return view("post.following", ["users" => Follow::where("following_user_id", Auth::user()->id)->latest()->paginate(10), "topRank" => User::topRank()]);
    }

    public function follower()
    {
        return view("post.follower", ["users" => Follow::where("followed_user_id", Auth::user()->id)->latest()->paginate(10), "topRank" => User::topRank()]);
    }

    public function follow(User $user)
    {
        if (Auth::user()->id == $user->id) {
            return redirect()->back()->with("status", "Tidak bisa memfollow akun sendiri!");
        }
        Auth::user()->following($user);
        return redirect()->back();
    }

    public function unfollow(User $user)
    {
        Follow::where("following_user_id", Auth::user()->id)->where("followed_user_id", $user->id)->delete();
        return redirect()->back();
    }
}
