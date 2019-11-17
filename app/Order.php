<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'yourname', 'email', 'phone', 'address', 'status_id', 
    ];

    public function orderdetails()
    {
        return $this->hasMany('App\OrderDetail');
    }

    public function products()
    {
        return $this->hasManyThrough('App\Product', 'App\OrderDetail', 'product_id', 'id', 'id');
    }

    public function paymentStatus()
    {
        return $this->belongsTo('App\PaymentStatus', 'payment_id');
    }
}
