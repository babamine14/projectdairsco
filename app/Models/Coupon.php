<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'code',
        'description',
        'discount_percent',
        'min_order_amount',
        'is_active',
    ];

    protected $casts = [
        'discount_percent' => 'integer',
        'min_order_amount' => 'float',
        'is_active' => 'boolean',
    ];
}
