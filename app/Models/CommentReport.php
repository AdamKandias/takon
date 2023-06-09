<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommentReport extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;
    protected $keyType = 'string';
    protected $primaryKey = 'comment_id';

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function comment(): HasOne
    {
        return $this->hasOne(Comment::class, 'id', 'comment_id');
    }
}
