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
        'http://localhost/manufacturers/patch/4',
        'http://localhost/manufacturers/patch/5',
        'http://localhost/manufacturers/patch/6',
        'http://localhost/manufacturers/patch/7',
        'http://localhost/manufacturers/patch/8',
        'http://localhost/manufacturers/patch/9',
        'http://localhost/auth'
    ];
}
