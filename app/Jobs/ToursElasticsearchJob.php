<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Tour;
use Elasticsearch;
use Log;

class ToursElasticsearchJob extends Job implements ShouldQueue
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
            Log::info("tours elasticsearch run for all");
            $this->forAll();
        }else{
            Log::info("tours elasticsearch run for id ".$this->id);
        }
    }

    public function forAll()
    {
        $tours = Tour::with(['categories', 'kecamatan'])->where('active', 1)->get();

        $docs = [];
        foreach ( $tours as $tour ) {
            $categories = [];
            foreach($tour->categories as $c){
                array_push($categories, [
                    'id'    => $c->id,
                    'name'  => $c->name,
                ]);
            }

            $doc = [
                'index' => 'e-wangi',
                'type'  => 'tours',
                'id'    => $tour->id,
                'body'  => [
                    'id'    => $tour->id,
                    'name'  => $tour->name,
                    'ticket'=> $tour->tiket,
                    'image' => $tour->image_url,
                    'location'  => [
                        'lat'   => $tour->map_lat,
                        'lon'   => $tour->map_long,
                    ],
                    'info'      => $tour->about,
                    'address'   => $tour->address,
                    'kecamatan' => [
                        'id'    => $tour->kecamatan->id,
                        'name'  => $tour->kecamatan->name,
                    ],
                    'categories'=> $categories
                ],
            ];

            $doc = Elasticsearch::index($doc);

            array_push($docs, $doc);
        }

        return $docs;
    }
}
