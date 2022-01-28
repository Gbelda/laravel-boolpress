<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function getRouteKeyName(){
        return 'slug';
    }

    protected $fillable = ['title', 'slug', 'content', 'image', 'post_date', 'category_id', 'tags'];

    public function category(){

        return $this->belongsTo(Category::class);

    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
