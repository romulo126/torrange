<?php

namespace App\Http\Controllers\Web;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Requests\searchRequest;

class CategoriaController extends Controller
{
    public function __invoke(searchRequest $request, string $categoria, ?string $subCategoria = '')
    {
        $page = $request->page ?? 1;
        $subCategoria = $subCategoria ?? '';
        
        $data = [
            'page' => $page,
            'taglist' => $subCategoria,
            'filter_cat' => $categoria,
        ];
        
        return view('categoria', $data);
    }
}
