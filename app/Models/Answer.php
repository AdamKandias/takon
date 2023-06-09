<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];
    protected $keyType = 'string';

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            if (!empty($model->image)) {
                Storage::delete($model->image);
            }
        });
    }

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

    public function reports()
    {
        return $this->hasMany(AnswerReport::class);
    }

    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where('answer', 'like', '%' . $search . '%');
        }
    }
}
