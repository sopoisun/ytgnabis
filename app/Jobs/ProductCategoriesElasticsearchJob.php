<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ProductCategory;
use Elasticsearch;
use Log;

class ProductCategoriesElasticsearchJob extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
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
        Log::info("product categories elasticsearch run for id ".$this->id);
        $this->forOne();
    }

    public function forOne()
    {
        $category = ProductCategory::find($this->id);

        # businesses
        $doc = Elasticsearch::updateByQuery([
                'index' => 'e-wangi',
                'type'  => 'products',
                'body'  => [
                    "script"    => [
                        "inline"    => "ctx._source.category = update_category",
                        "params"    => [
                            "update_category" => [
                                "id"    => $category->id,
                                "name"  => $category->name,
                            ],
                        ]
                    ],
                    "query"         => [
                        "nested"    => [
                            "path"  => "category",
                            "query" => [
                                "term" => [
                                    "category.id" => $category->id
                                ]
                            ]
                        ]
                    ],
                ]
        ]);

        return $doc;
    }
}
