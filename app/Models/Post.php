<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Post extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ["id"];
    protected $keyType = 'string';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function mapel(){
        return $this->hasOne(Mapel::class, 'id', 'mapel_id');
    }

    public function answer()
    {
        return $this->hasOne(Answer::class);
    }
}
