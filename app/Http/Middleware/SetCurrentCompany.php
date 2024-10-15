<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;

// class SetCurrentCompany
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
//      */
//     public function handle(Request $request, Closure $next): Response
//     {
//         return $next($request);
//     }
// }
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SetCurrentCompany
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            app()->instance('currentCompanyId', Auth::user()->company_id);
        }

        return $next($request);
    }
}
