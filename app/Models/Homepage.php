<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    use HasFactory;
    protected $table='figure';
    public $primaryKey='figure_id';
    public $timestamps=false;
    protected $fillable = ['category', 'name', 'description', 'price', 'image', 'quantity'];

    public function category(){
        return $this->belongsTo('App\Models\Category','category_id','category_id');
    }
}
