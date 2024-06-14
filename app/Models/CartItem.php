<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'cart_id',
        'product_id',
        'name',
        'image',
        'price',
        'quantity',
        'total',
    ];


    

}
