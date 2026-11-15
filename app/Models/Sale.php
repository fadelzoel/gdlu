<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'invoice_no', 'product_id', 'product_name', 'size', 'color',
        'quantity', 'unit_price', 'total_price', 'customer_name', 'sold_at',
    ];

    protected $casts = [
        'sold_at' => 'datetime',
        'unit_price' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getFormattedTotalAttribute(): string
    {
        return '$' . number_format($this->total_price, 2);
    }

    public function getFormattedUnitPriceAttribute(): string
    {
        return '$' . number_format($this->unit_price, 2);
    }
}
