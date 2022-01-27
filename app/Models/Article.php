<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function getRouteKeyName(){
        return 'slug';
    }

    protected $fillable = ['title', 'slug', 'content', 'image', 'post_date'];
}
