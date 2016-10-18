<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Elasticsearch;

class ElasticsearchDataHierarchy extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $functionName;
    protected $dataObj;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($functionName, $dataObj)
    {
        $this->functionName = $functionName;
        $this->dataObj      = $dataObj;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $function = $this->functionName;
        $this->$function();
    }

    /* chain of business */
    public function products_business()
    {
        Elasticsearch::updateByQuery([
            'index' => 'e-wangi',
            'type'  => 'products',
            'body'  => [
                "script"    => [
                    "inline"    => "ctx._source.business = update_business",
                    "params"    => [
                        "update_business" => [
                            'id'        => $this->dataObj->id,
                            'name'      => $this->dataObj->name,
                            'address'   => $this->dataObj->address,
                            'location'  => [
                                'lat'   => $this->dataObj->map_lat,
                                'lon'   => $this->dataObj->map_long,
                            ],
                            'kecamatan' => [
                                'id'    => $this->dataObj->kecamatan->id,
                                'name'  => $this->dataObj->kecamatan->name,
                            ],
                        ],
                    ]
                ],
                "query"         => [
                    "nested"    => [
                        "path"  => "business",
                        "query" => [
                            "term" => [
                                "business.id" => $this->dataObj->id
                            ]
                        ]
                    ]
                ],
            ]
        ]);
    }

    public function services_business()
    {
        Elasticsearch::updateByQuery([
            'index' => 'e-wangi',
            'type'  => 'services',
            'body'  => [
                "script"    => [
                    "inline"    => "ctx._source.business = update_business",
                    "params"    => [
                        "update_business" => [
                            'id'        => $this->dataObj->id,
                            'name'      => $this->dataObj->name,
                            'address'   => $this->dataObj->address,
                            'location'  => [
                                'lat'   => $this->dataObj->map_lat,
                                'lon'   => $this->dataObj->map_long,
                            ],
                            'kecamatan' => [
                                'id'    => $this->dataObj->kecamatan->id,
                                'name'  => $this->dataObj->kecamatan->name,
                            ],
                        ],
                    ]
                ],
                "query"         => [
                    "nested"    => [
                        "path"  => "business",
                        "query" => [
                            "term" => [
                                "business.id" => $this->dataObj->id
                            ]
                        ]
                    ]
                ],
            ]
        ]);
    }
    /* end chain of business*/

    /* chain of kecamatan */
    public function businesses_kecamatan()
    {
        Elasticsearch::updateByQuery([
            'index' => 'e-wangi',
            'type'  => 'businesses',
            'body'  => [
                "script"    => [
                    "inline"    => "ctx._source.kecamatan = update_kecamatan",
                    "params"    => [
                        "update_kecamatan" => [
                            'id'        => $this->dataObj->id,
                            'name'      => $this->dataObj->name,
                        ],
                    ]
                ],
                "query"         => [
                    "nested"    => [
                        "path"  => "kecamatan",
                        "query" => [
                            "term" => [
                                "kecamatan.id" => $this->dataObj->id
                            ]
                        ]
                    ]
                ],
            ]
        ]);
    }

    public function tours_kecamatan()
    {
        Elasticsearch::updateByQuery([
            'index' => 'e-wangi',
            'type'  => 'tours',
            'body'  => [
                "script"    => [
                    "inline"    => "ctx._source.kecamatan = update_kecamatan",
                    "params"    => [
                        "update_kecamatan" => [
                            'id'        => $this->dataObj->id,
                            'name'      => $this->dataObj->name,
                        ],
                    ]
                ],
                "query"         => [
                    "nested"    => [
                        "path"  => "kecamatan",
                        "query" => [
                            "term" => [
                                "kecamatan.id" => $this->dataObj->id
                            ]
                        ]
                    ]
                ],
            ]
        ]);
    }

    public function products_business_kecamatan()
    {
        Elasticsearch::updateByQuery([
            'index' => 'e-wangi',
            'type'  => 'products',
            'body'  => [
                "script"    => [
                    "inline"    => "ctx._source.business.kecamatan = update_kecamatan",
                    "params"    => [
                        "update_kecamatan" => [
                            'id'        => $this->dataObj->id,
                            'name'      => $this->dataObj->name,
                        ],
                    ]
                ],
                "query"         => [
                    "nested"    => [
                        "path"  => "business.kecamatan",
                        "query" => [
                            "term" => [
                                "business.kecamatan.id" => $this->dataObj->id
                            ]
                        ]
                    ]
                ],
            ]
        ]);
    }

    public function services_business_kecamatan()
    {
        Elasticsearch::updateByQuery([
            'index' => 'e-wangi',
            'type'  => 'services',
            'body'  => [
                "script"    => [
                    "inline"    => "ctx._source.business.kecamatan = update_kecamatan",
                    "params"    => [
                        "update_kecamatan" => [
                            'id'        => $this->dataObj->id,
                            'name'      => $this->dataObj->name,
                        ],
                    ]
                ],
                "query"         => [
                    "nested"    => [
                        "path"  => "business.kecamatan",
                        "query" => [
                            "term" => [
                                "business.kecamatan.id" => $this->dataObj->id
                            ]
                        ]
                    ]
                ],
            ]
        ]);
    }
    /* end chain of kecamatan */
}
