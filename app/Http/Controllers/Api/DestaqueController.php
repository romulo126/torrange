<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Requests\searchRequest;
use Illuminate\Support\Facades\Cache;
use App\Jobs\DestaqueJob;

class DestaqueController extends Controller
{
    public function __invoke(): JsonResponse
    {
        try {
            
            $response = Cache::get("destaque");
            
            $isInLine = false;

            if (! $response) {
                $isInJob = Cache::get("destaque_job");

                if (! $isInJob) {
                    $lifeTime = 60*10;
                    
                    Cache::remember("destaque_job", $lifeTime, function () {
                        return 'in job';
                    });

                    DestaqueJob::dispatch();
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
