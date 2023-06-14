<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $primaryKey = 'cart_item_id';

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function figure()
    {
        return $this->belongsTo(Figure::class, 'figure_id');
    }
}

