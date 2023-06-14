<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $primaryKey = 'category_id';
    protected $table = 'category'; // Tên bảng tương ứng với Model  
    protected $fillable = ['name'];
    
    public function figure()
    {
        return $this->hasMany(Figure::class, 'category');
    }
}

