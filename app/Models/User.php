<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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

        $roles = Role::all()->latest()->get();

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

    public static function topRank()
    {
        return User::orderBy("point", "desc")->take(5)->get();
    }
}
