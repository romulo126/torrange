<?php

namespace App\Http\Controllers\Api;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Jobs\TorrangeJob;

class TorrentController extends Controller
{
    public function __invoke(int $id, Request $request): JsonResponse
    {
        try {
            $response = Cache::get("torrange_{$id}_{$request->type}");
            
            $isInLine = false;

            if (! $response) {
                $isInJob = Cache::get("torrange_job_{$id}_{$request->type}");
                if (! $isInJob) {
                    $lifeTime = 60 * 10;

                    Cache::remember("torrange_job_{$id}_{$request->type}", $lifeTime, function () {
                        return 1;
                    });
                    
                    TorrangeJob::dispatch($id, $request->type);
                }

                $response = 'Você esta na fila aguarde';
                $isInLine = true;
            }
            
            return response()->json([
                'data' => $response,
                'isInLine' => $isInLine
            ], Response::HTTP_OK);
            $response = $this->torentService->get($id, $request->type);
            
            return response()->json([
                'data' => $response
            ], Response::HTTP_OK);
            
        } catch(Exception $e) {
            return response()->json([
                'data' =>  $e->getMessage()
            ], Response::HTTP_OK);
            
        }
    }
}
