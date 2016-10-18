<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\TourCategoriesElasticsearchJob;

class TourCategoriesElasticsearch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'elasticsearch:tour-categories {id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read data tour categories for elasticsearch';

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
        if( !$this->argument('id') ){
            $this->info("tour categories elasticsearch run for all");
        }else{
            $this->info("tour categories elasticsearch run for id ".$this->argument('id'));
        }

        dispatch(new TourCategoriesElasticsearchJob($this->argument('id')));
    }
}
