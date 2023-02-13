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
        return view('post.home', ["topRank" => User::topRank(), "posts" =>  Post::orderBy('created_at', 'desc')->take(10)->get()]);
    }

    public function create()
    {
        if(Auth::user()->password == null){
            return redirect()->route("profile")->with("status", "Harap membuat password terlebih dahulu!");
        }

        return view('post.create', ["mapel" => Mapel::fetchAll()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "question" => "required",
            "mapel_id" => "required",
        ]);

        Post::create([
            "question" => $request->question,
            "mapel_id" => $request->mapel_id,
            "user_id" => Auth::user()->id,
        ]);

        return redirect()->route("home")->with("status", "Pertanyaan berhasil diposting!");
    }
}
