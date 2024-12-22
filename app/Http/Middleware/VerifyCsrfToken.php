<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'api/*',
        'products', // Add this line to exclude the products route
        'cart/*',   // Add this line to exclude the cart routes
        'order/*',  // Add this line to exclude the order routes
        '/*',
    ];
}