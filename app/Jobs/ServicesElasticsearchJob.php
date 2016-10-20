<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\BusinessService;
use Elasticsearch;
use Log;

class ServicesElasticsearchJob extends Job implements ShouldQueue
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
            Log::info("services elasticsearch run for all");
            $this->forAll();
        }else{
            Log::info("services elasticsearch run for id ".$this->id);
            $this->forOne();
        }
    }

    public function forAll()
    {
        $services = BusinessService::with(['business.kecamatan'])->where('active', 1)->get();

        $docs = [];
        foreach ( $services as $service ) {
            $doc = [
                'index' => 'e-wangi',
                'type'  => 'services',
                'id'    => $service->id,
                'body'  => [
                    'id'    => $service->id,
                    'name'  => $service->name,
                    'name_for_sort' => str_replace(" ", "", $service->name),
                    'price' => $service->price,
                    'image' => $service->image_url,
                    'business'  => [
                        'id'        => $service->business->id,
                        'name'      => $service->business->name,
                        'address'   => $service->business->address,
                        'location'  => [
                            'lat'   => $service->business->map_lat,
                            'lon'   => $service->business->map_long,
                        ],
                        'kecamatan' => [
                            'id'    => $service->business->kecamatan->id,
                            'name'  => $service->business->kecamatan->name,
                        ],
                    ]
                ],
            ];

            $doc = Elasticsearch::index($doc);

            array_push($docs, $doc);
        }

        return $docs;
    }

    public function forOne()
    {
        $service = BusinessService::with(['business.kecamatan'])->find($this->id);

        $doc = [
            'index' => 'e-wangi',
            'type'  => 'services',
            'id'    => $service->id,
            'body'  => [
                'id'    => $service->id,
                'name'  => $service->name,
                'name_for_sort' => str_replace(" ", "", $service->name),
                'price' => $service->price,
                'image' => $service->image_url,
                'business'  => [
                    'id'        => $service->business->id,
                    'name'      => $service->business->name,
                    'address'   => $service->business->address,
                    'location'  => [
                        'lat'   => $service->business->map_lat,
                        'lon'   => $service->business->map_long,
                    ],
                    'kecamatan' => [
                        'id'    => $service->business->kecamatan->id,
                        'name'  => $service->business->kecamatan->name,
                    ],
                ]
            ],
        ];

        return Elasticsearch::index($doc);
    }
}
