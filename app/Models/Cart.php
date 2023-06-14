<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $primaryKey = 'cart_id';

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function cartItem()
    {
        return $this->hasMany(CartItem::class, 'cart_id');
    }
}

