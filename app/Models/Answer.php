<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Answer extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];
    protected $keyType = 'string';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function like()
    {
        return $this->hasMany(AnswerLike::class);
    }
}
