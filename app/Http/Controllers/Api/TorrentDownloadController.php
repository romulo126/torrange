<?php

namespace App\Http\Controllers\Api;

use App\Service\Bot\BjSher\TorrentDownloadService;
use Exception;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TorrentDownloadController extends Controller
{
    private TorrentDownloadService $torentService;

    public function __construct(TorrentDownloadService $torentService) {
        $this->torentService = $torentService;
    }

    public function __invoke(int $id, Request $request)
    {
        try {
            $file = $this->torentService->get($id, $request->size);
            
            return Storage::disk('local')->download($file);
            
        } catch(Exception $e) {
            return response()->json([
                'data' =>  $e->getMessage()
            ], Response::HTTP_OK);
            
        }
    }
}
