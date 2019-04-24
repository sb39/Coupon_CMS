<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //Table Name
    protected $table = 'orders';
    //Primary Key
    public $primaryKey = 'id';
    //TImestamps
    public $timestamps = true;

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
