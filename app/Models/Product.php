<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'manufacturer',
        'price',
        'photo',
        'category_id',
        'status_id',
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id')->first()->name;
    }
    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id')->first()->name;
    }
}
