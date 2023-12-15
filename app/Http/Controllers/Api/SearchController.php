<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Requests\searchRequest;
use Illuminate\Support\Facades\Cache;
use App\Jobs\SearchJob;

class SearchController extends Controller
{
    public function __invoke(string $search, searchRequest $request): JsonResponse
    {
        try {
            $page = $request->page ?? 1;
            
            $response = Cache::get("search_{$search}_{$page}");
            
            $isInLine = false;

            if (! $response) {
                $isInJob = Cache::get("search_job_{$search}_{$page}");
                if (! $isInJob) {
                    $lifeTime = 60 * 10;
                    Cache::remember("search_job_{$search}_{$page}", $lifeTime, function () {
                        return 1;
                    });
                    
                    SearchJob::dispatch($search, $page);
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
