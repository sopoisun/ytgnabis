<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\BusinessProduct;
use Elasticsearch;
use Log;

class ProductsElasticsearchJob extends Job implements ShouldQueue
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
            Log::info("products elasticsearch run for all");
            $this->forAll();
        }else{
            Log::info("products elasticsearch run for id ".$this->id);
        }
    }

    public function forAll()
    {
        $products = BusinessProduct::with(['category', 'business.kecamatan'])->where('active', 1)->get();

        $docs = [];
        foreach ( $products as $product ) {
            $doc = [
                'index' => 'e-wangi',
                'type'  => 'products',
                'id'    => $product->id,
                'body'  => [
                    'id'    => $product->id,
                    'name'  => $product->name,
                    'price' => $product->price,
                    'image' => $product->image_url,
                    'business'  => [
                        'id'        => $product->business->id,
                        'name'      => $product->business->name,
                        'address'   => $product->business->address,
                        'location'  => [
                            'lat'   => $product->business->map_lat,
                            'lon'   => $product->business->map_long,
                        ],
                        'kecamatan' => [
                            'id'    => $product->business->kecamatan->id,
                            'name'  => $product->business->kecamatan->name,
                        ],
                    ],
                    'category'=> [
                        'id'    => $product->category->id,
                        'name'  => $product->category->name,
                    ]
                ],
            ];

            $doc = Elasticsearch::index($doc);

            array_push($docs, $doc);
        }

        return $docs;
    }
}
