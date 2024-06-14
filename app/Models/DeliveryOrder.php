<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'fname',
        'lname',
        'address',
        'city',
        'country',
        'phone',
        'email',
    ];


    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
