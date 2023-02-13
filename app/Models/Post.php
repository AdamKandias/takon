<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Post extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ["id"];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function mapel(){
        return $this->belongsTo(Mapel::class);
    }
}
