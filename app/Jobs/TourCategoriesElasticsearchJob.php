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
            $this->forOne();
        }
    }

    public function forAll()
    {
        $categories = TourCategory::where('active', 1)->get();

        $docs = [];
        foreach ( $categories as $category ) {
            $doc = [
                'index' => env('ES_INDEX'),
                'type'  => 'tour-categories',
                'id'    => $category->id,
                'body'  => [
                    'id'    => $category->id,
                    'name'  => $category->name,
                    'name_for_sort' => str_replace(" ", "", $category->name),
                ],
            ];

            $doc = Elasticsearch::index($doc);

            array_push($docs, $doc);
        }

        return $docs;
    }

    public function forOne()
    {
        $category = TourCategory::find($this->id);

        $doc = [
            'index' => env('ES_INDEX'),
            'type'  => 'tour-categories',
            'id'    => $category->id,
            'body'  => [
                'id'    => $category->id,
                'name'  => $category->name,
                'name_for_sort' => str_replace(" ", "", $category->name),
            ],
        ];

        $doc = Elasticsearch::index($doc);

        if( !$doc['created'] ){
            // do update to relations
            # tours
            Elasticsearch::updateByQuery([
                'index' => env('ES_INDEX'),
                'type'  => 'tours',
                'body'  => [
                    "script"    => [
                        "inline"    => "for (int i=0; i<ctx._source.categories.size(); i++) { item = ctx._source.categories[i]; if (item['id'] == s_id) { ctx._source.categories[i] = update_category; } };",
                        "params"    => [
                            "s_id"  => $category->id,
                            "update_category" => [
                                "id"    => $category->id,
                                "name"  => $category->name,
                            ],
                        ]
                    ],
                    "query"     => [
                        "bool"  => [
                            "must" => [
                                "match" => [
                                    "categories.id" => 1
                                ]
                            ]
                        ]
                    ],
                ]
            ]);
        }

        return $doc;
    }
}
