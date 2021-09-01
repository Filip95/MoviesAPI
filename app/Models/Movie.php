<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['title','genre', 'director', 'imageUrl' , 'duration', 'releaseDate'];
    public static function search($title = null, $take = null, $skip = null){
        $query= self::query();

        if($title){
            $query->where('title LIKE "%' . $title . '%"');
        }

        if($take != null && $skip != null){
            $query->take($take)->skip($skip);
        }

    return $query->get();

    }
}
