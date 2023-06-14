<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $primaryKey = 'feedback_id';

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function figure()
    {
        return $this->belongsTo(Figure::class, 'figure_id');
    }
}

