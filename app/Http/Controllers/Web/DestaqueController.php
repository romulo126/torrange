<?php

namespace App\Http\Controllers\Web;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class DestaqueController extends Controller
{
    public function __invoke()
    {
       return view('destaque');
    }
}
