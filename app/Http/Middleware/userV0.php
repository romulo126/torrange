<?php

namespace App\Http\Middleware;

use App\Users\UsersTemp;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;

class userV0
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            if ($request->hasCookie('token')) {

                $token = $request->cookie('token');
                if ($this->checkToken($token)) {
                    return $next($request);
                }
    
                $cookieDescript = Crypt::decrypt($token, false);
                $partes = explode('|', $cookieDescript);
    
                if ($this->checkToken($partes[1])) {
                    return $next($request);
                }

                if ($this->checkToken($partes[0])) {
                    return $next($request);
                }
            }
        } catch (\Exception $e) {

        }
        

        return redirect(route('web.login'))->withCookie(cookie('token', '', -1));
    }

    private function checkToken(string $token)
    {
        return cache::get($token, false);
    }
}
