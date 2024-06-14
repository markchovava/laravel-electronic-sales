<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'cart_session',
        'ip_address',
        'total',
        'quantity',
    ];


    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function cart_items(){
        return $this->hasMany(CartItem::class, 'cart_id', 'id');
    }


}
