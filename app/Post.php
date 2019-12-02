<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'category_id', 'thumbnail', 'title', 'description', 'content',
    ];

    public function categoryPost()
    {
        return $this->belongsTo('App\CategoryPost');
    }
}
