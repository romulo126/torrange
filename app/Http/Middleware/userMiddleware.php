<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;
use App\Models\User;

class userMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $token = $request->cookie('token'); 
            if ($token) {
                if ($this->checkToken($token) || $this->checkUserInDatabase($token)) {
                    return $next($request);
                }
            }
        } catch (\Exception $e) {
            \Log::error("Token Middlewar".$e->getMessage());
        }
        $data = [
            'token' => $request->cookie('token'),
            'cooky' => $request->cookie(),
            'all' => $request->all()
        ];
        \Log::error("Token Middlewar". json_encode($data));

        return redirect(route('web.login'))->withCookie(cookie('token', '', -1));
    }

    private function checkToken(string $token)
    {
        $partes = explode('|', $token);
        $keyCache = "user_{$partes[1]}_login";
        $data = cache::get($keyCache, false);
        
        if (empty($data)) {
            return false;
        }
        
        return $data['access_token'] == $partes[0];
    }

    private function checkUserInDatabase(string $token) 
    {
        $partes = explode('|', $token);
        $data = User::select('id')
                    ->where('id', $partes[1])
                    ->where('remember_token', $partes[0])
                    ->first();
        
        return ! empty($data);
    }
}
