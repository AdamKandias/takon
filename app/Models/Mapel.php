<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = "mapel";

    public static function fetchAll(){
       return Mapel::all();
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where('question', 'like', '%' . $search . '%');
        }
    }
}
