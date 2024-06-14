<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'status',
        'order_ref',
        'products_quantity',
        'products_total',
        'delivery_name',
        'delivery_fee',
        'order_total',
        'message',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function order_items(){
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }
    public function delivery_order(){
        return $this->hasOne(DeliveryOrder::class, 'order_id', 'id');
    }
    
}
