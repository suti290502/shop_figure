<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'figure_id', 'quantity'];

    public function figure()
    {
        return $this->belongsTo(Figure::class, 'figure_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
