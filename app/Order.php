<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id', 'order_date', 'order_status',
    ];

    public function orderProducts()
    {
        return $this->hasMany('App\OrderProduct');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

}
