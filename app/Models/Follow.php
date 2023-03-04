<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    public function userFollowing()
    {
        return $this->belongsTo(User::class, "followed_user_id", "id");
    }

    public function userFollowed()
    {
        return $this->belongsTo(User::class, "following_user_id", "id");
    }

    public function scopeSearchFollowing($query, $search)
    {
        if ($search) {
            $query->whereHas('userFollowing', function ($query) use ($search) {
                return $query->where('name', 'like', '%' . $search . '%');
            });
        }
    }
    public function scopeSearchFollower($query, $search)
    {
        if ($search) {
            $query->whereHas('userFollowed', function ($query) use ($search) {
                return $query->where('name', 'like', '%' . $search . '%');
            });
        }
    }
}
