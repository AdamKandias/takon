<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follow;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

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

        Notification::create(["body" => Auth::user()->name . " telah mengikuti anda!", "category" => "follow", "link_id" => Auth::user()->id, "user_id" => $user->id]);
        
        Auth::user()->following($user);
        return redirect()->back();
    }

    public function unfollow(User $user)
    {
        Follow::where("following_user_id", Auth::user()->id)->where("followed_user_id", $user->id)->delete();
        return redirect()->back();
    }
}
