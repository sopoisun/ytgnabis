<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Business;
use Elasticsearch;
use Log;

class BusinessesElasticsearchJob extends Job implements ShouldQueue
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
            Log::info("businesses elasticsearch run for all");
            $this->forAll();
        }else{
            Log::info("businesses elasticsearch run id ".$this->id);
            $this->forOne();
        }
    }

    public function forAll()
    {
        $businesses = Business::with(['categories', 'kecamatan'])->where('active', 1)->get();

        $docs = [];
        foreach ( $businesses as $business ) {
            $categories = [];
            foreach($business->categories as $c){
                array_push($categories, [
                    'id'    => $c->id,
                    'name'  => $c->name,
                ]);
            }

            $doc = [
                'index' => 'e-wangi',
                'type'  => 'businesses',
                'id'    => $business->id,
                'body'  => [
                    'id'    => $business->id,
                    'name'  => $business->name,
                    'image' => $business->image_url,
                    'location'  => [
                        'lat'   => $business->map_lat,
                        'lon'   => $business->map_long,
                    ],
                    'info'      => $business->about,
                    'address'   => $business->address,
                    'kecamatan' => [
                        'id'    => $business->kecamatan->id,
                        'name'  => $business->kecamatan->name,
                    ],
                    'categories'=> $categories
                ],
            ];

            $doc = Elasticsearch::index($doc);

            array_push($docs, $doc);
        }

        return $docs;
    }

    public function forOne()
    {
        $business = Business::with(['categories', 'kecamatan'])->find($this->id);

        $categories = [];
        foreach($business->categories as $c){
            array_push($categories, [
                'id'    => $c->id,
                'name'  => $c->name,
            ]);
        }

        $doc = [
            'index' => 'e-wangi',
            'type'  => 'businesses',
            'id'    => $business->id,
            'body'  => [
                'id'    => $business->id,
                'name'  => $business->name,
                'image' => $business->image_url,
                'location'  => [
                    'lat'   => $business->map_lat,
                    'lon'   => $business->map_long,
                ],
                'info'      => $business->about,
                'address'   => $business->address,
                'kecamatan' => [
                    'id'    => $business->kecamatan->id,
                    'name'  => $business->kecamatan->name,
                ],
                'categories'=> $categories
            ],
        ];

        $doc = Elasticsearch::index($doc);

        if( !$doc['created'] ){
            // do update to relations
            # products
            dispatch(new ElasticsearchDataHierarchy("products_business", $business));
            # services
            dispatch(new ElasticsearchDataHierarchy("services_business", $business));
        }

        return $doc;
    }
}
