<?php

namespace App\Http\Controllers\Web;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class SearchController extends Controller
{
    public function __invoke(string $serch = '')
    {
        $data['serch'] = $serch;

        return view('serch', $data);
    }
}
