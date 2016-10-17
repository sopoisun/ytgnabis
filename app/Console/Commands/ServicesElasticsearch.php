<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\ServicesElasticsearchJob;

class ServicesElasticsearch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'elasticsearch:services';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read data services for elasticsearch';

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
        $this->info("services elasticsearch run...");
        dispatch(new ServicesElasticsearchJob());
    }
}
