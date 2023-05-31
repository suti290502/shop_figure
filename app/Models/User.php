<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'username', 'password', 'email', 'address', 'phone_number', 'role'
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class, 'customer_id');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'customer_id');
    }

    public function figures()
    {
        return $this->hasMany(Figure::class, 'seller_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public $timestamps = false;
}
