<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    protected $fillable = [
        'name', 'parent_id',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function parent()
    {
        return $this->belongsTo('App\CategoryPost', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\CategoryPost', 'parent_id');
    }
}
