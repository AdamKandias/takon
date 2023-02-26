<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\AnswerReport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AnswerReportController extends Controller
{
    public function store(Answer $answer, Request $request)
    {
        AnswerReport::create(["answer_id" => $answer->id, "user_id" => Auth::user()->id, "description" => $request->report]);
        return redirect()->back();
    }
    
    public function destroy(Answer $answer)
    {
        AnswerReport::where(["answer_id" => $answer->id, "user_id" => Auth::user()->id])->delete();
        return redirect()->back();
    }
}
