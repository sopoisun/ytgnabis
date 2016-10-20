<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Category;
use Elasticsearch;
use Log;

class BusinessCategoriesElasticsearchJob extends Job implements ShouldQueue
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
            Log::info("business categories elasticsearch run for all");
            $this->forAll();
        }else{
            Log::info("business categories elasticsearch run for id ".$this->id);
            $this->forOne();
        }
    }

    public function forAll()
    {
        $categories = Category::where('active', 1)->get();

        $docs = [];
        foreach ( $categories as $category ) {
            $doc = [
                'index' => 'e-wangi',
                'type'  => 'business-categories',
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
        $category = Category::find($this->id);

        $doc = [
            'index' => 'e-wangi',
            'type'  => 'business-categories',
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
            # businesses
            Elasticsearch::updateByQuery([
                'index' => 'e-wangi',
                'type'  => 'businesses',
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
