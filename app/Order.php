<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id', 'orderDate', 'status_id',
    ];

    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

}
