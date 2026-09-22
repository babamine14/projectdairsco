<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'customer_name',
        'customer_email',
        'customer_phone',
        'shipping_address',
        'province',
        'city',
        'district',
        'postal_code',
        'shipping_method',
        'shipping_cost',
        'payment_method',
        'payment_status',
        'order_status',
        'coupon_code',
        'discount_amount',
        'subtotal',
        'total',
        'notes',
    ];

    protected $casts = [
        'shipping_cost' => 'float',
        'discount_amount' => 'float',
        'subtotal' => 'float',
        'total' => 'float',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
