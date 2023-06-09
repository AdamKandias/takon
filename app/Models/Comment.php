<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
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

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

    public function like()
    {
        return $this->hasMany(CommentLike::class);
    }

    public function reports()
    {
        return $this->hasMany(CommentReport::class);
    }

    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where('comment', 'like', '%' . $search . '%');
        }
    }
}
