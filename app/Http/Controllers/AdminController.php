<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Answer;
use App\Models\Follow;
use App\Models\Comment;
use App\Models\PostLike;
use App\Models\AnswerLike;
use App\Models\PostReport;
use App\Models\CommentLike;
use App\Models\AnswerReport;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\CommentReport;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::with('class')->where('status_id', '!=', '2')->get();
        return view("admin.dashboard", compact('users'));
    }

    public function userShow(User $user)
    {
        return $user->load('role', 'class', 'follows', 'followers');
    }

    public function userDestroy(User $user)
    {
        Notification::where('user_id', $user->id)->delete();
        Follow::where('following_user_id', $user->id)->delete();
        CommentLike::where('comment_id', $user->id)->delete();
        CommentReport::where('user_id', $user->id)->delete();
        AnswerLike::where('answer_id', $user->id)->delete();
        AnswerReport::where('user_id', $user->id)->delete();
        PostLike::where('post_id', $user->id)->delete();
        PostReport::where('user_id', $user->id)->delete();
        $user->posts()->each(function ($post) {
            if (!empty($post->answer)) {
                $post->answer->comments()->each(function ($comment) {
                    $comment->like()->delete();
                    $comment->reports()->delete();
                });
                $post->answer->comments()->delete();
                $post->answer->like()->delete();
                $post->answer->reports()->delete();
                $post->answer->delete();
            }
            $post->like()->delete();
            $post->reports()->delete();
            $post->delete();
        });
        $comments = Comment::where('user_id', $user->id)->get();
        $comments->each(function ($comment) {
            $comment->like()->delete();
            $comment->reports()->delete();
            $comment->delete();
        });
        $answers = Answer::where('user_id', $user->id)->get();
        $answers->each(function ($answer) {
            $answer->comments()->each(function ($comment) {
                $comment->like()->delete();
                $comment->reports()->delete();
            });
            $answer->comments()->delete();
            $answer->like()->delete();
            $answer->reports()->delete();
            $answer->delete();
        });
        $user->delete();

        return redirect()->back()->with('status', "Successfully Delete $user->name");
    }

    public function reports()
    {
        $postsReports = PostReport::with('post')->select('post_id', DB::raw('MIN(description) as description'))->groupBy('post_id')->get();
        $answersReports = AnswerReport::with('answer')->select('answer_id', DB::raw('MIN(description) as description'))->groupBy('answer_id')->get();
        $commentsReports = CommentReport::with('comment')->select('comment_id', DB::raw('MIN(description) as description'))->groupBy('comment_id')->get();

        $reports = $postsReports->concat($answersReports)->concat($commentsReports);
        return view("admin.reports", compact('reports'));
    }

    public function reportShow($linkid)
    {
        $type = request()->query('type');
        $report = null;

        if ($type === 'post') {
            $report = PostReport::where('post_id', $linkid)->get();
            $report->load('user', 'post.mapel');
        } elseif ($type === 'answer') {
            $report = AnswerReport::where('answer_id', $linkid)->get();
            $report->load('user', 'answer.post.mapel');
        } elseif ($type === 'comment') {
            $report = CommentReport::where('comment_id', $linkid)->get();
            $report->load('user', 'comment.answer.post.mapel');
        }
        return $report;
    }

    public function reportDestroy($linkid)
    {
        $type = request()->query('type');

        Notification::where('link_id', $linkid)->delete();

        if ($type === 'post') {
            $post = Post::with('answer')->where('id', $linkid)->first();
            $postReports = PostReport::where('post_id', $linkid)->get();
            $postReports->each(function ($postReport) {
                $postReport->delete();
            });
            $post->answer->comments()->each(function ($comment) {
                $comment->like()->delete();
                $comment->reports()->delete();
            });
            $post->answer->comments()->delete();
            $post->answer->like()->delete();
            $post->answer->reports()->delete();
            $post->answer->delete();
            $post->like()->delete();
            $post->reports()->delete();
            $post->delete();
        } elseif ($type === 'answer') {
            $answer = Answer::with('comments')->where('id', $linkid)->first();
            $answerReports = AnswerReport::where('answer_id', $linkid)->get();
            $answerReports->each(function ($answerReport) {
                $answerReport->delete();
            });
            $answer->comments()->each(function ($comment) {
                $comment->like()->delete();
                $comment->reports()->delete();
            });
            $answer->comments()->delete();
            $answer->like()->delete();
            $answer->reports()->delete();
            $answer->delete();
        } elseif ($type === 'comment') {
            $comments = Comment::where('id', $linkid)->get();
            $commentReports = CommentReport::where('comment_id', $linkid)->get();
            $commentReports->each(function ($commentReport) {
                $commentReport->delete();
            });
            $comments->each(function ($comment) {
                $comment->like()->delete();
                $comment->reports()->delete();
                $comment->delete();
            });
        }

        return redirect()->back()->with('status', "Successfully Delete That " . ucfirst($type));
    }

    public function reportUpdate($linkid)
    {
        $type = request()->query('type');

        Notification::where('link_id', $linkid)->delete();

        if ($type === 'post') {
            $postReports = PostReport::where('post_id', $linkid)->get();
            $postReports->each(function ($postReport) {
                $postReport->delete();
            });
        } elseif ($type === 'answer') {
            $answerReports = AnswerReport::where('answer_id', $linkid)->get();
            $answerReports->each(function ($answerReport) {
                $answerReport->delete();
            });
        } elseif ($type === 'comment') {
            $commentReports = CommentReport::where('comment_id', $linkid)->get();
            $commentReports->each(function ($commentReport) {
                $commentReport->delete();
            });
        }

        return redirect()->back()->with('status', "Successfully Approve That " . ucfirst($type));
    }

    public function posts()
    {
        $posts = Post::with('user', 'mapel', 'reports')->has('reports', '<', 3)->latest()->get();
        return view("admin.posts", compact('posts'));
    }

    public function postShow(Post $post)
    {
        return $post->load('user', 'mapel', 'reports');
    }

    public function postDestroy(Post $post)
    {
        Notification::where('link_id', $post->id)->delete();
        if (!empty($post->answer)) {
            if (!empty($post->answer->comments())) {
                $post->answer->comments()->each(function ($comment) {
                    $comment->like()->delete();
                    $comment->reports()->delete();
                });
            }
            $post->answer->comments()->delete();
            $post->answer->like()->delete();
            $post->answer->reports()->delete();
            $post->answer->delete();
        }
        $post->like()->delete();
        $post->reports()->delete();
        $post->delete();

        return redirect()->back()->with('status', "Successfully Delete The Post");
    }

    public function answers()
    {
        $answers = Answer::with('user', 'like', 'reports')->has('reports', '<', 3)->latest()->get();
        return view("admin.answers", compact('answers'));
    }

    public function answerShow(Answer $answer)
    {
        return $answer->load('user', 'like', 'reports');
    }

    public function answerDestroy(Answer $answer)
    {
        Notification::where('link_id', $answer->id)->delete();
        if (!empty($answer->comments())) {
            $answer->comments()->each(function ($comment) {
                $comment->like()->delete();
                $comment->reports()->delete();
            });
            $answer->comments()->delete();
        }
        $answer->like()->delete();
        $answer->reports()->delete();
        $answer->delete();

        return redirect()->back()->with('status', "Successfully Delete The Answer");
    }

    public function comments()
    {
        $comments = Comment::with('user', 'like', 'reports')->has('reports', '<', 3)->latest()->get();
        return view("admin.comments", compact('comments'));
    }

    public function commentShow(Comment $comment)
    {
        return $comment->load('user', 'like', 'reports');
    }

    public function commentDestroy(Comment $comment)
    {
        Notification::where('link_id', $comment->id)->delete();
        $comment->like()->delete();
        $comment->reports()->delete();
        $comment->delete();

        return redirect()->back()->with('status', "Successfully Delete The Comment");
    }
}
