<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostReportController extends Controller
{
    public function store(Post $post, Request $request)
    {
        PostReport::create(["post_id" => $post->id, "user_id" => Auth::user()->id, "description" => $request->report]);
        return redirect()->back();
    }
    
    public function destroy(Post $post)
    {
        PostReport::where(["post_id" => $post->id, "user_id" => Auth::user()->id])->delete();
        return redirect()->back();
    }
}
