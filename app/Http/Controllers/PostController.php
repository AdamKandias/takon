<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(5);
        $totalPosts = Post::where('user_id', Auth::user()->id)->count();
        // $totalAnswers = Answers::where('user_id', Auth::user()->id)->count();
        return view('post.home', ["topRank" => User::topRank(), "posts" =>  $posts, "totalPosts" => $totalPosts]);
    }

    public function create()
    {
        if (Auth::user()->password == null) {
            return redirect()->route("profile")->with("passwordStatus", "Harap membuat password terlebih dahulu!");
        }

        return view('post.create', ["mapel" => Mapel::fetchAll()]);
    }

    public function store(Request $request)
    {
        if (Auth::user()->point < 5) {
            return redirect()->back()->with("status", "Poin anda tidak cukup!");
        }

        $request->validate([
            "question" => "required",
            "mapel_id" => "required",
        ]);

        Post::create([
            "question" => $request->question,
            "mapel_id" => $request->mapel_id,
            "user_id" => Auth::user()->id,
        ]);

        User::pointDecrease();

        return redirect()->route("home")->with("status", "Pertanyaan berhasil diposting!");
    }

    public function show(Post $post)
    {
        return view("post.show", ["post" => $post]);
    }
}
