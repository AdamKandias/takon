<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ["id"];
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

    public function mapel()
    {
        return $this->hasOne(Mapel::class, 'id', 'mapel_id');
    }

    public function answer()
    {
        return $this->hasOne(Answer::class);
    }

    public function like()
    {
        return $this->hasMany(PostLike::class);
    }

    public function reports()
    {
        return $this->hasMany(PostReport::class);
    }

    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where('question', 'like', '%' . $search . '%');
        }
    }
}
