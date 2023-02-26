<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\AnswerLike;
use Illuminate\Support\Facades\Auth;

class AnswerLikeController extends Controller
{
    public function store(Answer $answer)
    {
        AnswerLike::create(["answer_id" => $answer->id, "user_id" => Auth::user()->id]);
        return redirect()->back();
    }

    public function destroy(Answer $answer)
    {
        AnswerLike::where("answer_id", $answer->id)->where("user_id", Auth::user()->id)->delete();
        return redirect()->back();
    }
}
