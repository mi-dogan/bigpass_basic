<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
//        if ($request->is('qr') || $request->is('qr/*')) {
//            return $request->expectsJson() ? null : route('qr.login');
//        }

        return $request->expectsJson() ? null : ($request->is('qr') || $request->is('qr/*') ? route('qr.login') : route('login'));
    }
}
