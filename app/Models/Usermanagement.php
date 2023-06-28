<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usermanagement extends Model
{
    use HasFactory;
    protected $table='user';
    public $primaryKey='id';
    public $timestamps=false;
    protected $fillable = [
        'username', 
        'password',
        'email',
        'address',
        'phone_number',
        'role'
    ];
}
