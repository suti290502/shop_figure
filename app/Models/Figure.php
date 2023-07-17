<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Figure extends Model
{
    protected $primaryKey = 'figure_id';
    protected $table = 'figure';  
    protected $fillable = ['category', 'name', 'description', 'price', 'image', 'quantity'];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function cartItem()
    {
        return $this->hasMany(CartItem::class, 'figure_id');
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'figure_id');
    }

    public function orderFigure()
    {
        return $this->hasMany(OrderFigure::class, 'figure_id');
    }
}
