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
use Illuminate\Support\Facades\Cache;
use App\Service\Bot\BotHelpesrsServices;

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
    public function handle(): void
    {
        try {
            $lifeTime = 60*60*24;

            Cache::remember("torrange_{$this->id}_{$this->type}", $lifeTime, function () {
                return BotHelpesrsServices::torrentService(1, $this->id, $this->type);
            });

            sleep(rand(2,5));
        } catch (Exception $e) {
            Log::error($e->getMessage(), [$e]);
        }
    }

    public function failed(Exception $exception)
    {
        Log::error("Job Torrange falhou: " . $exception->getMessage());
    }
}
