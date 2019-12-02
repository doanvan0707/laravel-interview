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
        'yourname', 'phone', 'email',
    ];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
