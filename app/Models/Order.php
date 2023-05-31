<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'customer_id', 'figure_id', 'quantity', 'payments', 'order_date', 'status'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function figure()
    {
        return $this->belongsTo(Figure::class, 'figure_id');
    }
}
