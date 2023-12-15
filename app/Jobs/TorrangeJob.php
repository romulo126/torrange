<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Service\Bot\BjSher\TorrentService;
use Illuminate\Support\Facades\Cache;

class TorrangeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $id;
    private $type;

    /**
     * Create a new job instance.
     */
    public function __construct($id, $type)
    {
        $this->id = $id;
        $this->type = $type;
    }

    /**
     * Execute the job.
     */
    public function handle(TorrentService $torentService): void
    {
        try {
            $lifeTime = 60*60*24*5;

            Cache::remember("torrange_{$this->id}_{$this->type}", $lifeTime, function () use ($torentService) {
                return $torentService->get($this->id, $this->type);
            });
        } catch (Exception $e) {
            Log::error($e->getMessage(), [$e]);
        }
    }

    public function failed(Exception $exception)
    {
        Log::error("Job Torrange falhou: " . $exception->getMessage());
    }
}
