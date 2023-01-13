<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'http://localhost/manufacturers/put',
        'http://localhost/manufacturers/patch/3',
        'http://localhost/manufacturers/patch/2',
        'http://localhost/manufacturers/patch/1',
        'http://localhost/auth'
    ];
}
