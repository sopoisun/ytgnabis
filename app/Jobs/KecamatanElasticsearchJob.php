<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Kecamatan;
use Elasticsearch;
use Log;

class KecamatanElasticsearchJob extends Job implements ShouldQueue
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
            Log::info("kecamatan elasticsearch run for all");
            $this->forAll();
        }else{
            Log::info("kecamatan elasticsearch run for id ".$this->id);
            $this->forOne();
        }
    }

    public function forAll()
    {
        $kecamatans = Kecamatan::where('active', 1)->get();

        $docs = [];
        foreach ( $kecamatans as $kecamatan ) {
            $doc = [
                'index' => 'e-wangi',
                'type'  => 'kecamatans',
                'id'    => $kecamatan->id,
                'body'  => [
                    'id'    => $kecamatan->id,
                    'name'  => $kecamatan->name,
                    'location'  => [
                        'lat'   => $kecamatan->map_lat,
                        'lon'   => $kecamatan->map_long,
                    ],
                ],
            ];

            $doc = Elasticsearch::index($doc);

            array_push($docs, $doc);
        }

        return $docs;
    }

    public function forOne()
    {
        $kecamatan = Kecamatan::find($this->id);

        $doc = [
            'index' => 'e-wangi',
            'type'  => 'kecamatans',
            'id'    => $kecamatan->id,
            'body'  => [
                'id'    => $kecamatan->id,
                'name'  => $kecamatan->name,
                'location'  => [
                    'lat'   => $kecamatan->map_lat,
                    'lon'   => $kecamatan->map_long,
                ],
            ],
        ];

        $doc = Elasticsearch::index($doc);

        if( !$doc['created'] ){
            // do update to relations
            # businesses
            dispatch(new ElasticsearchChainData("businesses_kecamatan", $kecamatan));
            # tours
            dispatch(new ElasticsearchChainData("tours_kecamatan", $kecamatan));
            # products
            dispatch(new ElasticsearchChainData("products_business_kecamatan", $kecamatan));
            # services
            dispatch(new ElasticsearchChainData("services_business_kecamatan", $kecamatan));
        }
    }
}
