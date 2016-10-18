<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\TourCategory;
use Elasticsearch;
use Log;

class TourCategoriesElasticsearchJob extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id = null)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if( !$this->id ){
            Log::info("tour categories elasticsearch run for all");
            $this->forAll();
        }else{
            Log::info("tour categories elasticsearch run for id ".$this->id);
        }
    }

    public function forAll()
    {
        $categories = TourCategory::where('active', 1)->get();

        $docs = [];
        foreach ( $categories as $category ) {
            $doc = [
                'index' => 'e-wangi',
                'type'  => 'tour-categories',
                'id'    => $category->id,
                'body'  => [
                    'id'    => $category->id,
                    'name'  => $category->name,
                ],
            ];

            $doc = Elasticsearch::index($doc);

            array_push($docs, $doc);
        }

        return $docs;
    }
}
