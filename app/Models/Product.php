<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'original_price',
        'category',
        'image',
        'is_new',
        'is_sold_out',
    ];

    protected $casts = [
        'price'          => 'integer',
        'original_price' => 'integer',
        'is_new'         => 'boolean',
        'is_sold_out'    => 'boolean',
    ];
}