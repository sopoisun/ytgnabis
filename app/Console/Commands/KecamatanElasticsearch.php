<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\KecamatanElasticsearchJob;

class KecamatanElasticsearch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'elasticsearch:kecamatans {id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read data kecamatan for elasticsearch';

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
            $this->info("kecamatan elasticsearch run for all");
        }else{
            $this->info("kecamatan elasticsearch run for id ".$this->argument('id'));
        }

        dispatch(new KecamatanElasticsearchJob($this->argument('id')));
    }
}
