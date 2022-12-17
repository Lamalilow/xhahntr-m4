<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',

    ];


    public function price()
    {
        return $this->hasOne(Product::class, 'id', 'product_id')->first()->price;
    }
    public function name()
    {
        return $this->hasOne(Product::class, 'id', 'product_id')->first()->name;
    }
    public function photo()
    {
        return $this->hasOne(Product::class, 'id', 'product_id')->first()->photo;
    }
}
