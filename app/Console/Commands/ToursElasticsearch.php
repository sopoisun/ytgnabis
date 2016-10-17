<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\ToursElasticsearchJob;

class ToursElasticsearch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'elasticsearch:tours';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read data tours for elasticsearch';

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
        $this->info("tours elasticsearch run...");
        dispatch(new ToursElasticsearchJob());
    }
}
