<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderFigure extends Model
{
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function figure()
    {
        return $this->belongsTo(Figure::class, 'figure_id');
    }
}

