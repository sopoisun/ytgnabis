<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\ProductCategoriesElasticsearchJob;

class ProductCategoriesElasticsearch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'elasticsearch:product-categories {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read data product categories for elasticsearch';

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
        $this->info("product categories elasticsearch run for id ".$this->argument('id'));

        dispatch(new ProductCategoriesElasticsearchJob($this->argument('id')));
    }
}
