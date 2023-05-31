<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Figure extends Model
{
    use HasFactory;

    protected $table = 'figure';
    protected $primaryKey = 'figure_id';

    protected $fillable = [
        'seller_id', 'category', 'name', 'description', 'price', 'image', 'quantity'
    ];

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'figure_id');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'figure_id');
    }
}
