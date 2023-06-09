<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnswerReport extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;
    protected $keyType = 'string';
    protected $primaryKey = 'answer_id';

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function answer(): HasOne
    {
        return $this->hasOne(Answer::class, 'id', 'answer_id');
    }
}
