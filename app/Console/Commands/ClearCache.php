<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class ClearCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:clearall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Limpa todos os caches do redis';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Redis::flushall();
        $this->info('Cache do Redis limpo.');
    }
}
