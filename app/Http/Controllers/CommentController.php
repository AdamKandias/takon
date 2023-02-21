<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $currentAnswer = Answer::find($request->answer_id);

        if (empty($currentAnswer)) {
            return redirect()->back()->with("status", "Terjadi kesalahan saat menambah komentar, pertanyaan tidak ditemukan!");
        }

        $validatedData = $request->validate([
            "comment" => "required|min:8",
            "image" => "image|max:1024",
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('comment-image');
        }

        $validatedData['answer_id'] = $currentAnswer->id;
        $validatedData['user_id'] = Auth::user()->id;

        Comment::create($validatedData);

        return redirect()->back()->with("status-success", "Comment berhasil diposting!");
    }
}
