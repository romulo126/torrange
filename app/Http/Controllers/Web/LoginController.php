<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;


class LoginController extends Controller
{
    public function __invoke()
    {
        return view('login');
    }
}
