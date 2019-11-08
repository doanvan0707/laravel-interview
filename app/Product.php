<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'image', 'description', 'category_id', 'screen', 'system', 'fcamera', 'bcamera', 'price',
        'cpu', 'ram', 'rom', 'smenory', 'pin', 'quantity',
    ];
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }
}
