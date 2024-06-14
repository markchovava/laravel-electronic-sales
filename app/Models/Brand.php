<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'image',
        'created_at',
        'updated_at',
        
    ];


    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function products(){
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }

}
