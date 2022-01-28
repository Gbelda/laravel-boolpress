<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    public function getRouteKeyName(){
        return 'slug';
    }

    protected $fillable = ['title', 'slug', 'content', 'image', 'post_date', 'category_id', 'tags'];

    public function category():BelongsTo
    { 

        return $this->belongsTo(Category::class);

    }

    public function tags() :BelongsToMany {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Get the user that owns the Article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
