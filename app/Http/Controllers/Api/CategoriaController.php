<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Requests\searchRequest;
use Illuminate\Support\Facades\Cache;
use App\Jobs\CategoriaJob;

class CategoriaController extends Controller
{
    public function __invoke(searchRequest $request, string $categoria, ?string $subCategoria = ''): JsonResponse
    {
        try {
            
            $page = $request->page ?? 1;
            $subCategoria = $subCategoria ?? '';
            
            $data = [
                'page' => $page,
                'filter_cat['. $categoria.']' => $categoria,
                'taglist' => $subCategoria,
                'filter_cat' => $categoria,
            ];

            $response = Cache::get("search_categoria_{$categoria}_sub_{$subCategoria}_page_{$page}");
            
            $isInLine = false;

            if (! $response) {
                $isInJob = Cache::get("search_job_categoria_{$categoria}_sub_{$subCategoria}_page_{$page}");
                if (! $isInJob) {
                    $lifeTime = 60 * 10;
                    Cache::remember("search_job_categoria_{$categoria}_sub_{$subCategoria}_page_{$page}", $lifeTime, function () {
                        return 1;
                    });
                    
                    CategoriaJob::dispatch($data);
                }

                $response = 'Você esta na fila aguarde';
                $isInLine = true;
            }
            
            return response()->json([
                'data' => $response,
                'isInLine' => $isInLine
            ], Response::HTTP_OK);
        } catch(Exception $e) {
            return response()->json([
                'menssage' => 'Serviço indisponível'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
