<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\BusinessesElasticsearchJob;

class BusinessesElasticsearch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'elasticsearch:businesses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read data businesses for elasticsearch';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("businesses elasticsearch run...");
        dispatch(new BusinessesElasticsearchJob());
    }
}
