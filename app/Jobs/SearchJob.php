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


class SearchJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $search;
    private $page;

    /**
     * Create a new job instance.
     */
    public function __construct($serch, $page) {
        $this->search = $serch;
        $this->page = $page;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $lifeTime = 60*60*24;

            Cache::remember("search_{$this->search}_{$this->page}", $lifeTime, function () {
                return BotHelpesrsServices::SearchService(1, $this->search, $this->page);
            });

            sleep(5);
        } catch (Exception $e) {
            Log::error($e->getMessage(), [$e]);
        }
    }

    public function failed(Exception $exception)
    {
        Log::error("Job Search falhou: " . $exception->getMessage());
    }
}
