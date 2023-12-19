<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Service\Bot\BotHelpesrsServices;


class DestaqueJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $search;
    private $page;

    /**
     * Create a new job instance.
     */
    public function __construct() {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $lifeTime = 60*60*12;

            Cache::remember("destaque", $lifeTime, function () {
                return BotHelpesrsServices::DestaqueService(1, $this->search, $this->page);
            });
        } catch (Exception $e) {
            Log::error($e->getMessage(), [$e]);
        }
    }

    public function failed(Exception $exception)
    {
        Log::error("Job Destaque falhou: " . $exception->getMessage());
    }
}
