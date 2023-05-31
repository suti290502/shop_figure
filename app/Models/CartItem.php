<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cart_item';
    protected $primaryKey = 'cart_item_id';

    protected $fillable = [
        'cart_id', 'figure_id', 'quantity'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function figure()
    {
        return $this->belongsTo(Figure::class, 'figure_id');
    }
}
