<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Users\UsersTemp;
use App\Http\Requests\loginRequest;
use Illuminate\Support\Facades\Cache;
use illuminate\support\Str;
use Illuminate\Support\Facades\Cookie;


class LoginPostController extends Controller
{
    public function __invoke(loginRequest $request)
    {
        $userService = app()->make(UsersTemp::class);
        
        if ($userService->getUsers($request->password, $request->user)) {
            $lifeTime = 60 * 60 * 24 * 2;
    
            $token = str::random(100);

            $cookie = Cookie::make('token', $token, $lifeTime);

            cache::set($token, true, $lifeTime);

            return redirect(route('web.index'))->withCookie($cookie);
        }
        
        return redirect(route('web.login'));
    }
}
