<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    protected $guarded = [
        'id',
        'name',
        'nisn',
        'birhdate',
        'status_id',
        'class_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            if (!empty($model->image)) {
                if (!str_contains($model->image, 'avatar1.png') && !str_contains($model->image, 'avatar2.png') && !str_contains($model->image, 'avatar3.png')) {
                    Storage::delete($model->image);
                }
            }
        });
    }

    protected $keyType = 'string';

    public static function pointDecrease()
    {
        DB::table('users')->where('id', Auth::user()->id)->decrement('point', 5);
        return;
    }

    public static function pointIncrease()
    {
        DB::table('users')->where('id', Auth::user()->id)->increment('point', 10);
        return;
    }

    public static function roleSynchronization()
    {
        $user = User::find(Auth::user()->id);
        $currentPoint = $user->point;
        $currentRole = $user->role->id;
        $correctRole = 1;

        $roles = Role::orderBy("id", "desc")->get();

        foreach ($roles as $role) {
            if ($currentPoint >= $role->minimum_point) {
                $correctRole = $role->id;
                break;
            }
        }

        if ($currentRole == $correctRole) {
            return;
        }

        $user->role_id = $correctRole;
        $user->save();
        return;
    }

    public static function topRank()
    {
        return User::orderBy("point", "desc")->where("status_id", 1)->take(5)->get();
    }

    public static function rank()
    {
        return User::orderBy("point", "desc")->where("status_id", 1)->paginate(10);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'followed_user_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_user_id', 'following_user_id')->withTimestamps();
    }

    public function following(User $user)
    {
        return $this->follows()->save($user);
    }

    public function likesCount()
    {
        $postsLikes = PostLike::where("user_id", Auth::user()->id)->count();
        $answersLikes = AnswerLike::where("user_id", Auth::user()->id)->count();
        $commentsLikes = CommentLike::where("user_id", Auth::user()->id)->count();

        return $postsLikes + $answersLikes + $commentsLikes;
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function unreadNotifications()
    {
        return $this->hasMany(Notification::class)->where("is_read", 0);
    }
}
