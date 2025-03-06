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

        '/*',
        '/api/login',
        '/api/register',
        '/api/logout',
        '/api/user',
        '/api/user/update',
        '/api/user/delete',
        '/api/user/password',
        '/api/user/password/update',
        '/api/user/password/delete',
        '/api/user/password/forgot',
    ];
}
