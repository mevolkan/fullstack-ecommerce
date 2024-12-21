<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    // Define the table associated with the model
    protected $table = 'order_items';

    // Define the fillable attributes
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price'
    ];

    // Define the relationship with the Order model
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
