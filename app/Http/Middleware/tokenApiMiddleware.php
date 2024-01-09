<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class tokenApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $token = $request->header('token'); 
            if ($token) {
                if ($token = '1d5sv1da5v1d') {
                    return $next($request);
                }
            }
            
        } catch (\Exception $e) {
           
        }

        return redirect(route('web.login'));
    }
}
