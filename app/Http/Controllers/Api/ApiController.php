<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Elasticsearch;
use DB;

class ApiController extends Controller
{
    public function kecamatans()
    {
        return Elasticsearch::search([
            'index' => env('ES_INDEX'),
            'type'  => 'kecamatans',
            'body'  => [
                'query' => [
                    'match_all' => [],
                ],
                "size"  => 30,
            ]
        ]);
    }

    public function businessCategories()
    {
        return Elasticsearch::search([
            'index' => env('ES_INDEX'),
            'type'  => 'business-categories',
            'body'  => [
                'query' => [
                    'match_all' => [],
                ],
                "size"  => 10,
            ]
        ]);
    }

    public function businesses(Request $request)
    {
        if( !$request->get('category_id') ){
            return;
        }

        $params = [
            'index' => env('ES_INDEX'),
            'type'  => 'businesses',
            'body'  => [
                'query' => [
                    'bool'  => [
                        "must" => [
                            [
                                "match" => [
                                    "categories.id" => $request->get('category_id'),
                                ]
                            ]
                        ]
                    ]
                ],
                'sort'  => [
                    'name_for_sort' => [
                        'order'     => 'asc'
                    ]
                ]
            ],
        ];

        if( $request->get('lat') && $request->get('long') ){
            if( $request->get('ids') ){
                $ids = explode(',', $request->get('ids'));
                $params['body']['query']['bool']['must_not'] = [
                    "terms" => [
                        "id"    => $ids,
                    ]
                ];
            }

            $params['body']['query']['bool']['filter'] = [
                "geo_distance"  => [
                    "distance"  => "1km",
                    "location"  => [
                        "lat"   => $request->get('lat'),
                        "lon"   => $request->get('long'),
                    ]
                ]
            ];
            $params['body']['size'] = 20;
        }else if( $request->get('kecamatan_id') ){
            $page   = $request->get('page') ? $request->get('page') : 1;
            $limit  = 10;
            $offset = ($page - 1) * $limit;

            $params['body']['query']['bool']['must'] = [
                [
                    "match" => [
                        "categories.id" => $request->get('category_id'),
                    ]
                ], [
                    "nested" => [
                        "path"  => "kecamatan",
                        "query" => [
                            "bool" => [
                                "must"  => [
                                    "match" => [
                                        "kecamatan.id" => $request->get('kecamatan_id'),
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ];

            $params['body'] += [
                'from'  => $offset,
                'size'  => $limit,
            ];
        }else{

        }

        return Elasticsearch::search($params);
    }

    public function business(Request $request)
    {
        if( !$request->get('id') ){
            return;
        }

        return Elasticsearch::get([
            'index' => env('ES_INDEX'),
            'type'  => 'businesses',
            'id'    => $request->get('id')
        ]);
    }

    public function business_products(Request $request)
    {
        if( !$request->get('business_id') ){
            return;
        }

        $page   = $request->get('page') ? $request->get('page') : 1;
        $limit  = 10;
        $offset = ($page - 1) * $limit;

        $must = [];

        if( $request->get('keywords') ){
            $keywords = $request->get('keywords');
            $keywords = explode(' ', $keywords);

            foreach($keywords as $keyword){
                $must[] = [
                    'match' => [
                        'name' => $keyword,
                    ]
                ];
            }
        }

        $must[] = [
            'nested' => [
                'path'  => 'business',
                'query' => [
                    'term' => [
                        'business.id' => $request->get('business_id')
                    ]
                ]
            ]
        ];

        $params = [
            'index' => env('ES_INDEX'),
            'type'  => 'products',
            'body'  => [
                'query' => [
                    'bool' => [
                        'must' => $must,
                    ]
                ],
                'sort' => [
                    'name_for_sort' => [
                        'order'     => 'asc'
                    ]
                ],
                'from'  => $offset,
                'size'  => $limit,
            ]
        ];

        return Elasticsearch::search($params);
    }

    public function business_services(Request $request)
    {
        if( !$request->get('business_id') ){
            return;
        }

        $page   = $request->get('page') ? $request->get('page') : 1;
        $limit  = 10;
        $offset = ($page - 1) * $limit;

        $must = [];

        if( $request->get('keywords') ){
            $keywords = $request->get('keywords');
            $keywords = explode(' ', $keywords);

            foreach($keywords as $keyword){
                $must[] = [
                    'match' => [
                        'name' => $keyword,
                    ]
                ];
            }
        }

        $must[] = [
            'nested' => [
                'path'  => 'business',
                'query' => [
                    'term' => [
                        'business.id' => $request->get('business_id')
                    ]
                ]
            ]
        ];

        $params = [
            'index' => env('ES_INDEX'),
            'type'  => 'services',
            'body'  => [
                'query' => [
                    'bool' => [
                        'must' => $must,
                    ]
                ],
                'sort' => [
                    'name_for_sort' => [
                        'order'     => 'asc'
                    ]
                ],
                'from'  => $offset,
                'size'  => $limit,
            ],
        ];

        return Elasticsearch::search($params);
    }

    public function tourCategories()
    {
        return Elasticsearch::search([
            'index' => env('ES_INDEX'),
            'type'  => 'tour-categories',
            'body'  => [
                'query' => [
                    'match_all' => [],
                ],
                "size"  => 10,
            ]
        ]);
    }

    public function tours(Request $request)
    {
        if( !$request->get('category_id') ){
            return;
        }

        $params = [
            'index' => env('ES_INDEX'),
            'type'  => 'tours',
            'body'  => [
                'query' => [
                    'bool'  => [
                        'must' => [
                            [
                                'match' => [
                                    'categories.id' => $request->get('category_id'),
                                ]
                            ]
                        ]
                    ]
                ],
                'sort'  => [
                    'name_for_sort' => [
                        'order' => 'asc'
                    ]
                ]
            ]
        ];

        if( $request->get('lat') && $request->get('long') ){
            if( $request->get('ids') ){
                $ids = explode(',', $request->get('ids'));
                $params['body']['query']['bool']['must_not'] = [
                    "terms" => [
                        "id"    => $ids,
                    ]
                ];
            }

            $params['body']['query']['bool']['filter'] = [
                "geo_distance"  => [
                    "distance"  => "1km",
                    "location"  => [
                        "lat"   => $request->get('lat'),
                        "lon"   => $request->get('long'),
                    ]
                ]
            ];
        }else if( $request->get('kecamatan_id') ){
            $page   = $request->get('page') ? $request->get('page') : 1;
            $limit  = 10;
            $offset = ($page - 1) * $limit;

            $params['body']['query']['bool']['must'] = [
                [
                    "match" => [
                        "categories.id" => $request->get('category_id'),
                    ]
                ], [
                    "nested" => [
                        "path"  => "kecamatan",
                        "query" => [
                            "bool" => [
                                "must"  => [
                                    "match" => [
                                        "kecamatan.id" => $request->get('kecamatan_id'),
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ];

            $params['body'] += [
                'from'  => $offset,
                'size'  => $limit,
            ];
        }else{

        }

        return Elasticsearch::search($params);
    }

    public function tour(Request $request)
    {
        if( !$request->get('id') ){
            return;
        }

        return Elasticsearch::get([
            'index' => env('ES_INDEX'),
            'type'  => 'tours',
            'id'    => $request->get('id')
        ]);
    }

    public function services(Request $request)
    {
        $params = [
            'index' => env('ES_INDEX'),
            'type'  => 'services',
        ];

        if( $request->get('lat') && $request->get('long') ){
            $must = [];
            if( $request->get('keywords') ){
                $keywords = $request->get('keywords');
                $keywords = explode(" ", $keywords);

                $must = [];
                foreach($keywords as $keyword){
                    array_push($must, [
                        'match' => [
                            'name' => $keyword,
                        ]
                    ]);
                }
            }

            $must = count($must) ? $must : [[ 'match_all' => [] ]];

            if( $request->get('ids') ){
                $ids = explode(',', $request->get('ids'));
                array_push($must, [
                    "nested" => [
                        "path"  => "business",
                        "query" => [
                            "bool"  => [
                                "must_not" => [
                                    [
                                        "terms" => [
                                            "business.id"    => $ids,
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]);
            }

            $params['body'] = [
                'query' => [
                    'bool' => [
                        'must' => $must,
                        'filter' => [
                            "nested" => [
                                "path"      => "business",
                                "filter"    => [
                                    "geo_distance"  => [
                                        "distance"  => "1km",
                                        "business.location"  => [
                                            "lat"   => $request->get('lat'),
                                            "lon"   => $request->get('long'),
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ],
                'size' => 0,
                'aggs' => [
                    'group' => [
                        'nested'    => [ 'path' => 'business' ],
                        'aggs'      => [
                            'business'    => [
                                'terms'      => [
                                    'field' => 'business.id'
                                ],
                                'aggs'      => [
                                    'row'   => [
                                        'top_hits'  => [
                                            '_source'   => [
                                                'id', 'name', 'address', 'location', 'kecamatan'
                                            ],
                                            'size'  => 1,
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ];
        }else if( $request->get('kecamatan_id') ){
            $must[] = [
                'nested'    => [
                    'path'  => 'business.kecamatan',
                    'query' => [
                        'bool' => [
                            "must"  => [
                                "match" => [
                                    "business.kecamatan.id" => $request->get('kecamatan_id'),
                                ]
                            ]
                        ]
                    ]
                ]
            ];

            if( $request->get('keywords') ){
                $keywords = $request->get('keywords');
                $keywords = explode(" ", $keywords);

                foreach($keywords as $keyword){
                    array_push($must, [
                        'match' => [
                            'name' => $keyword,
                        ]
                    ]);
                }


            }else{
                $must[] = [ 'match_all' => [] ];
            }

            $page   = $request->get('page') ? $request->get('page') : 1;
            $limit  = 10;
            $offset = ($page - 1) * $limit;

            $params['body'] = [
                'query' => [
                    'bool' => [
                        'must' => $must,
                    ]
                ],
                'sort' => [
                    'name_for_sort' => [
                        'order' => 'asc'
                    ]
                ],
                'from' => $offset,
                'size' => $limit,
            ];

            if( $request->get('not_id') ){
                $params['body']['query']['bool']['must_not'] = [
                    [
                        'term' => [
                            'id' => $request->get('not_id'),
                        ]
                    ]
                ];
            }
        }else{

        }

        if( count($params) > 2 ){
            return Elasticsearch::search($params);
        }

        return;
    }

    public function similiar_services(Request $request)
    {
        if( !$request->get('kecamatan_id') || !$request->get('keywords') || !$request->get('not_id') ){
            return;
        }

        $keywords = $request->get('keywords');
        $keywords = explode(" ", $keywords);

        $should = [];
        foreach($keywords as $keyword){
            array_push($should, [
                'match' => [
                    'name' => $keyword,
                ]
            ]);
        }

        $page   = $request->get('page') ? $request->get('page') : 1;
        $limit  = 10;
        $offset = ($page - 1) * $limit;

        $params = [
            'index' => env('ES_INDEX'),
            'type'  => 'services',
            'body' => [
                'query' => [
                    'filtered' => [
                        'query' => [
                            'bool' => [
                                'should'  => $should,
                                'must_not'  => [
                                    [
                                        'term' => [
                                            'id' => $request->get('not_id'),
                                        ]
                                    ]
                                ]
                            ]
                        ],
                        'filter' => [
                            'bool' => [
                                'must' => [
                                    [
                                        'nested'    => [
                                            'path'  => 'business.kecamatan',
                                            'query' => [
                                                'bool' => [
                                                    "must"  => [
                                                        "match" => [
                                                            "business.kecamatan.id" => $request->get('kecamatan_id'),
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ],
                'sort' => [
                    'name_for_sort' => [
                        'order' => 'asc'
                    ]
                ],
                'from' => $offset,
                'size' => $limit,
            ]
        ];

        return Elasticsearch::search($params);
    }

    public function service(Request $request)
    {
        if( !$request->get('id') ){
            return;
        }

        return Elasticsearch::get([
            'index' => env('ES_INDEX'),
            'type'  => 'services',
            'id'    => $request->get('id')
        ]);
    }

    public function products(Request $request)
    {
        $params = [
            'index' => env('ES_INDEX'),
            'type'  => 'products',
        ];

        if( $request->get('lat') && $request->get('long') ){
            $must = [];
            if( $request->get('keywords') ){
                $keywords = $request->get('keywords');
                $keywords = explode(" ", $keywords);

                $must = [];
                foreach($keywords as $keyword){
                    array_push($must, [
                        'match' => [
                            'name' => $keyword,
                        ]
                    ]);
                }
            }

            $must = count($must) ? $must : [[ 'match_all' => [] ]];

            if( $request->get('ids') ){
                $ids = explode(',', $request->get('ids'));
                array_push($must, [
                    "nested" => [
                        "path"  => "business",
                        "query" => [
                            "bool"  => [
                                "must_not" => [
                                    [
                                        "terms" => [
                                            "business.id"    => $ids,
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]);
            }

            $params['body'] = [
                'query' => [
                    'bool' => [
                        'must' => $must,
                        'filter' => [
                            "nested" => [
                                "path"      => "business",
                                "filter"    => [
                                    "geo_distance"  => [
                                        "distance"  => "1km",
                                        "business.location"  => [
                                            "lat"   => $request->get('lat'),
                                            "lon"   => $request->get('long'),
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ],
                'size' => 0,
                'aggs' => [
                    'group' => [
                        'nested'    => [ 'path' => 'business' ],
                        'aggs'      => [
                            'business'    => [
                                'terms'      => [
                                    'field' => 'business.id'
                                ],
                                'aggs'      => [
                                    'row'   => [
                                        'top_hits'  => [
                                            '_source'   => [
                                                'id', 'name', 'address', 'location', 'kecamatan'
                                            ],
                                            'size'  => 1,
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ];
        }else if( $request->get('kecamatan_id') ){
            $must[] = [
                'nested'    => [
                    'path'  => 'business.kecamatan',
                    'query' => [
                        'bool' => [
                            "must"  => [
                                "match" => [
                                    "business.kecamatan.id" => $request->get('kecamatan_id'),
                                ]
                            ]
                        ]
                    ]
                ]
            ];

            if( $request->get('keywords') ){
                $keywords = $request->get('keywords');
                $keywords = explode(" ", $keywords);

                foreach($keywords as $keyword){
                    array_push($must, [
                        'match' => [
                            'name' => $keyword,
                        ]
                    ]);
                }


            }else{
                $must[] = [ 'match_all' => [] ];
            }

            $page   = $request->get('page') ? $request->get('page') : 1;
            $limit  = 10;
            $offset = ($page - 1) * $limit;

            $params['body'] = [
                'query' => [
                    'bool' => [
                        'must' => $must,
                    ]
                ],
                'sort'  => [
                    'name_for_sort' => [
                        'order' => 'asc'
                    ]
                ],
                'from'  => $offset,
                'size'  => $limit,
            ];

            if( $request->get('not_id') ){
                $params['body']['query']['bool']['must_not'] = [
                    [
                        'term' => [
                            'id' => $request->get('not_id'),
                        ]
                    ]
                ];
            }
        }else{

        }

        if( count($params) > 2 ){
            return Elasticsearch::search($params);
        }

        return;
    }

    public function similiar_products(Request $request)
    {
        if( !$request->get('kecamatan_id') || !$request->get('keywords') || !$request->get('not_id') ){
            return;
        }

        $keywords = $request->get('keywords');
        $keywords = explode(" ", $keywords);

        $should = [];
        foreach($keywords as $keyword){
            array_push($should, [
                'match' => [
                    'name' => $keyword,
                ]
            ]);
        }

        $page   = $request->get('page') ? $request->get('page') : 1;
        $limit  = 10;
        $offset = ($page - 1) * $limit;

        $params = [
            'index' => env('ES_INDEX'),
            'type'  => 'products',
            'body' => [
                'query' => [
                    'filtered' => [
                        'query' => [
                            'bool' => [
                                'should'  => $should,
                                'must_not'  => [
                                    [
                                        'term' => [
                                            'id' => $request->get('not_id'),
                                        ]
                                    ]
                                ],
                            ]
                        ],
                        'filter' => [
                            'bool'  => [
                                'must' => [
                                    [
                                        'nested'    => [
                                            'path'  => 'business.kecamatan',
                                            'query' => [
                                                'bool' => [
                                                    "must"  => [
                                                        "match" => [
                                                            "business.kecamatan.id" => $request->get('kecamatan_id'),
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ],
                ],
                'sort' => [
                    'name_for_sort' => [
                        'order' => 'asc'
                    ]
                ],
                'from' => $offset,
                'size' => $limit,
            ]
        ];

        return Elasticsearch::search($params);
    }

    public function product(Request $request)
    {
        if( !$request->get('id') ){
            return;
        }

        return Elasticsearch::get([
            'index' => env('ES_INDEX'),
            'type'  => 'products',
            'id'    => $request->get('id')
        ]);
    }

    public function map()
    {
        if( request()->get('q') && request()->get('lat') && request()->get('lng') ){
            $q      = request()->get('q');
            $lat    = request()->get('lat');
            $lng    = request()->get('lng');

            return \App\Business::join('business_products', 'businesses.id', '=', 'business_products.business_id')
                ->join('seos', 'businesses.seo_id', '=', 'seos.seo_id')
                ->where('business_products.name', 'like', '%'.$q.'%')
                ->groupBy('businesses.id')
                ->select([
                    'businesses.id', DB::raw('businesses.id as business_id'), 'businesses.name', 'businesses.map_lat',
                    'businesses.map_long', 'seos.permalink',
                    DB::raw("(6371 * ACOS(COS(RADIANS($lat)) * COS(RADIANS(businesses.map_lat)) * COS(
                            RADIANS(businesses.map_long) - RADIANS($lng)) + SIN(RADIANS($lat)) *
                            SIN(RADIANS(businesses.map_lat)))) AS distance "),
                ])
                ->having('distance', '<', '0.5')
                ->get();
        }
    }
}
