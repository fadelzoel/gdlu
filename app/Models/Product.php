<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    public const SIZES = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];

    // slug => label (the slug is used by the store's filter buttons)
    public const CATEGORIES = [
        'hoodies'     => 'Hoodies',
        't-shirts'    => 'T-Shirts',
        'bottoms'     => 'Bottoms',
        'outerwear'   => 'Outerwear',
        'accessories' => 'Accessories',
    ];

    public const LOW_STOCK = 5;

    protected $fillable = [
        'image', 'name', 'category', 'quantity', 'price', 'original_price', 'size', 'color',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'original_price' => 'decimal:2',
        'quantity' => 'integer',
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    // Works for images uploaded from the admin (storage/app/public)
    // and for files that already sit inside /public (e.g. image/gallery/x.jpeg).
    // Returns null when the file can't be found, so the page shows a placeholder.
    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) {
            return null;
        }
        if (file_exists(public_path($this->image))) {
            return asset($this->image);
        }
        if (Storage::disk('public')->exists($this->image)) {
            return asset('storage/' . $this->image);
        }

        return null;
    }

    public function getCategoryLabelAttribute(): string
    {
        return self::CATEGORIES[$this->category] ?? ucfirst($this->category);
    }

    public function getIsSoldOutAttribute(): bool
    {
        return $this->quantity <= 0;
    }

    // "New" badge for items added in the last 14 days
    public function getIsNewAttribute(): bool
    {
        return $this->created_at !== null && $this->created_at->gt(now()->subDays(14));
    }

    public function getHasDiscountAttribute(): bool
    {
        return $this->original_price !== null && $this->original_price > $this->price;
    }

    // Rupiah, e.g. Rp349.000 (change the currency in ONE place)
    public function getFormattedPriceAttribute(): string
    {
        return 'Rp' . number_format($this->price, 0, ',', '.');
    }

    public function getFormattedOriginalPriceAttribute(): ?string
    {
        return $this->original_price === null
            ? null
            : 'Rp' . number_format($this->original_price, 0, ',', '.');
    }
}
