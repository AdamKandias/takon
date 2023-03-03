<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Notification;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function store(Request $request)
    {
        $currentPost = Post::find($request->post_id);

        if (empty($currentPost)) {
            return redirect()->back()->with("status", "Terjadi kesalahan saat menambah komentar, pertanyaan tidak ditemukan!");
        }
        
        if ($currentPost->user_id == Auth::user()->id){
            return redirect()->back()->with("status", "Anda tidak bisa menjawab pertanyaan anda sendiri!");
        }

        $validatedData = $request->validate([
            "answer" => "required|min:8",
            "image" => "image|max:1024",
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('answer-image');
        }

        $validatedData['post_id'] = $request->post_id;
        $validatedData['user_id'] = Auth::user()->id;

        $answer = Answer::create($validatedData);

        User::pointIncrease();

        User::roleSynchronization();

        Notification::create(["body" => "Pertanyaan anda telah dijawab oleh " . $answer->user->name, "category" => "answer", "link_id" => $currentPost->id, "user_id" => $currentPost->user_id]);

        return redirect()->route("post.show", $validatedData['post_id'])->with("status-success", "Jawaban berhasil terkirim!");
    }

    public function userAnswer()
    {
        return view("post.answer", ["answers" => Answer::where("user_id", Auth::user()->id)->latest()->simplePaginate(10), "topRank" => User::topRank()]);
    }
}
