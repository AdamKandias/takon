<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
        return view('post.home', ["topRank" => User::topRank(), "posts" =>  Post::with("reports")->search($request["search"])->orderBy('created_at', 'desc')->simplePaginate(10)]);
    }

    public function create()
    {
        return view('post.create', ["mapel" => Mapel::fetchAll()]);
    }

    public function store(Request $request)
    {
        if (Auth::user()->point < 5) {
            return redirect()->back()->with("status", "Poin anda tidak cukup!");
        }

        $validatedData = $request->validate([
            "question" => "required",
            "image" => "image|max:1024",
            "mapel_id" => "required",
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-image');
        }

        $validatedData['user_id'] = Auth::user()->id;

        Post::create($validatedData);

        User::pointDecrease();

        User::roleSynchronization();

        return redirect()->route("home")->with("status", "Pertanyaan berhasil diposting!");
    }

    public function show(Post $post)
    {
        return view("post.show", ["post" => $post]);
    }

    public function userPost(Request $request)
    {
        return view("post.question", ["posts" => Post::where("user_id", Auth::user()->id)->search($request["search"])->latest()->simplePaginate(10), "topRank" => User::topRank()]);
    }
}
