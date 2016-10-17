<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\ProductsElasticsearchJob;

class ProductsElasticsearch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'elasticsearch:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read data products for elasticsearch';

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
        $this->info("products elasticsearch run...");
        dispatch(new ProductsElasticsearchJob());
    }
}
