<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\Inspire::class,
        Commands\KecamatanElasticsearch::class,
        Commands\BusinessCategoriesElasticsearch::class,
        Commands\BusinessesElasticsearch::class,
        Commands\TourCategoriesElasticsearch::class,
        Commands\ToursElasticsearch::class,
        Commands\ProductsElasticsearch::class,
        Commands\ServicesElasticsearch::class,
        Commands\ProductCategoriesElasticsearch::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
    }
}
