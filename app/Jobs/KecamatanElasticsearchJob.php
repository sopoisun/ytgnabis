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
            # products
            Elasticsearch::updateByQuery([
                'index' => 'e-wangi',
                'type'  => 'products',
                'body'  => [
                    "script"    => [
                        "inline"    => "ctx._source.business.kecamatan = update_kecamatan",
                        "params"    => [
                            "update_kecamatan" => [
                                'id'        => $kecamatan->id,
                                'name'      => $kecamatan->name,
                            ],
                        ]
                    ],
                    "query"         => [
                        "nested"    => [
                            "path"  => "business.kecamatan",
                            "query" => [
                                "term" => [
                                    "business.kecamatan.id" => $kecamatan->id
                                ]
                            ]
                        ]
                    ],
                ]
            ]);
            # services
            Elasticsearch::updateByQuery([
                'index' => 'e-wangi',
                'type'  => 'services',
                'body'  => [
                    "script"    => [
                        "inline"    => "ctx._source.business.kecamatan = update_kecamatan",
                        "params"    => [
                            "update_kecamatan" => [
                                'id'        => $kecamatan->id,
                                'name'      => $kecamatan->name,
                            ],
                        ]
                    ],
                    "query"         => [
                        "nested"    => [
                            "path"  => "business.kecamatan",
                            "query" => [
                                "term" => [
                                    "business.kecamatan.id" => $kecamatan->id
                                ]
                            ]
                        ]
                    ],
                ]
            ]);
            # tours
            Elasticsearch::updateByQuery([
                'index' => 'e-wangi',
                'type'  => 'tours',
                'body'  => [
                    "script"    => [
                        "inline"    => "ctx._source.kecamatan = update_kecamatan",
                        "params"    => [
                            "update_kecamatan" => [
                                'id'        => $kecamatan->id,
                                'name'      => $kecamatan->name,
                            ],
                        ]
                    ],
                    "query"         => [
                        "nested"    => [
                            "path"  => "kecamatan",
                            "query" => [
                                "term" => [
                                    "kecamatan.id" => $kecamatan->id
                                ]
                            ]
                        ]
                    ],
                ]
            ]);

            # businesses
            Elasticsearch::updateByQuery([
                'index' => 'e-wangi',
                'type'  => 'businesses',
                'body'  => [
                    "script"    => [
                        "inline"    => "ctx._source.kecamatan = update_kecamatan",
                        "params"    => [
                            "update_kecamatan" => [
                                'id'        => $kecamatan->id,
                                'name'      => $kecamatan->name,
                            ],
                        ]
                    ],
                    "query"         => [
                        "nested"    => [
                            "path"  => "kecamatan",
                            "query" => [
                                "term" => [
                                    "kecamatan.id" => $kecamatan->id
                                ]
                            ]
                        ]
                    ],
                ]
            ]);
        }
    }
}
