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
use Illuminate\Support\Arr;


class CategoriaJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data;

    /**
     * Create a new job instance.
     */
    public function __construct($data) {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $lifeTime = 60*60*24;
            $categoria = $this->data['filter_cat'];
            $subCategoria = $this->data['taglist'];
            $page = $this->data['page'];
            Arr::forget($this->data, 'filter_cat');
            
            Cache::remember("search_categoria_{$categoria}_sub_{$subCategoria}_page_{$page}", $lifeTime, function () {
                return BotHelpesrsServices::CategoriaService(1, $this->data);
            });

            sleep(rand(2,5));
        } catch (Exception $e) {
            Log::error($e->getMessage(), [$e]);
        }
    }

    public function failed(Exception $exception)
    {
        Log::error("Job Search falhou: " . $exception->getMessage());
    }
}
