<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'yourname', 'email', 'phone', 'address'
    ];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
