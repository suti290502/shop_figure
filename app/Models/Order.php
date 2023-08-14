<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';

    
    public function orderFigure()
    {
        return $this->hasMany(OrderFigure::class, 'order_id');
    }
}
