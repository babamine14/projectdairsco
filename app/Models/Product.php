<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'price',
        'discount_price',
        'badge',
        'short_description',
        'description',
        'material',
        'size_and_fit',
        'care_instructions',
        'rating',
        'reviews_count',
        'stock',
        'colors',
        'sizes',
        'images',
        'is_featured',
        'is_best_seller',
        'is_new_arrival',
    ];

    protected $casts = [
        'colors' => 'array',
        'sizes' => 'array',
        'images' => 'array',
        'price' => 'float',
        'discount_price' => 'float',
        'rating' => 'float',
        'is_featured' => 'boolean',
        'is_best_seller' => 'boolean',
        'is_new_arrival' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
