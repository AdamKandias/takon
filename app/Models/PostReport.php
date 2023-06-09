<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostReport extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;
    protected $keyType = 'string';
    protected $primaryKey = 'post_id';

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function post(): HasOne
    {
        return $this->hasOne(Post::class, 'id', 'post_id');
    }
}
