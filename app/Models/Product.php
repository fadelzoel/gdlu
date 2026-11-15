<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public const SIZES = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
    public const LOW_STOCK = 5;

    protected $fillable = ['image', 'name', 'quantity', 'price', 'size', 'color'];

    protected $casts = [
        'price' => 'decimal:2',
        'quantity' => 'integer',
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    // change the currency symbol in ONE place
    public function getFormattedPriceAttribute(): string
    {
        return '$' . number_format($this->price, 2);
    }
}
