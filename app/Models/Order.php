<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    // Define the table associated with the model
    protected $table = 'orders';

    // Define the fillable attributes
    protected $fillable = [
        'user_id',
        'status',
        'total_price',
        'shipping_address',
        'billing_address',
        'payment_method',
        'order_date'
    ];

    // Define the relationship with the User model
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Cart model
    public function cartItems(): HasMany
    {
        return $this->hasMany(Cart::class);
    }
}