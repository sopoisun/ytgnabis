<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Business;
use App\BusinessProduct;
use App\ProductCategory;

class SeoContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Categories
        $r = request()->create('/', 'GET', [
            'name' => 'Restoran',
            'seo' => [
                'permalink' => 'restoran',
                'site_title' => 'Restoran',
            ],
        ]);
    	$restoran = \App\Category::simpan($r);

        $r = request()->create('/', 'GET', [
            'name' => 'Hotel',
            'seo' => [
                'permalink' => 'hotel',
                'site_title' => 'Hotel',
            ],
        ]);
    	$hotel = \App\Category::simpan($r);

        $r = request()->create('/', 'GET', [
            'name' => 'Kafe',
            'seo' => [
                'permalink' => 'kafe',
                'site_title' => 'Kafe',
            ],
        ]);
    	$cafe = \App\Category::simpan($r);

    	# Businesses
        $r = request()->create('/', 'GET', [
    		'name' 		=> 'Restoran Bajak Laut',
    		'address' 	=> 'Jl. Ahmad Yani No. 65, Kec. Banyuwangi, Jawa Timur',
    		'map_lat' 	=> '-8.222535748888834',
    		'map_long' 	=> '114.36782318766632',
    		'phone'		=> '0859-0415-0105',
            'seo' => [
                'permalink' => 'restoran-bajak-laut',
                'site_title' => 'Restoran Bajak Laut',
            ],
            'categories' => [
                $restoran->id,
            ]
    	]);
    	$bajakLaut = \App\Business::simpan($r);

        $r = request()->create('/', 'GET', [
            'name' 		=> 'Smile Every Day (SE)',
            'address' 	=> 'Jl. Ahmad Yani No. 103, Kec. Banyuwangi, Jawa Timur',
            'map_lat' 	=> '-8.219764299163641',
            'map_long' 	=> '114.36863321478882',
            'phone'		=> '',
            'seo' => [
                'permalink' => 'smile-every-day-se',
                'site_title' => 'Smile Every Day (SE)',
            ],
            'categories' => [
                $cafe->id,
            ]
    	]);
    	$se = \App\Business::simpan($r);

        $r = request()->create('/', 'GET', [
            'name' 		=> 'Cak Wang',
            'address' 	=> 'Jl. Adi Sucipto No 32, Kec. Banyuwangi, Jawa Timur',
            'map_lat' 	=> '-8.230425248723444',
            'map_long' 	=> '114.36355847533264',
            'phone'		=> '',
            'seo' => [
                'permalink' => 'cak-wang',
                'site_title' => 'Cak Wang',
            ],
            'categories' => [
                $cafe->id,
            ]
    	]);
    	$cakWang = \App\Business::simpan($r);

        $r = request()->create('/', 'GET', [
            'name' 		=> 'Hotel Slamet',
            'address' 	=> 'Jl. Kapten Piere Tendean No.89 Karangrejo Kec. Banyuwangi Kabupaten Banyuwangi, Jawa Timur',
            'map_lat' 	=> '-8.217205203868481',
            'map_long' 	=> '114.37510270293274',
            'phone'		=> '',
            'seo' => [
                'permalink' => 'hotel-slamet',
                'site_title' => 'Hotel Slamet',
            ],
            'categories' => [
                $hotel->id,
                $restoran->id,
                $cafe->id,
            ]
    	]);
    	$hotelSlamet = \App\Business::simpan($r);

    	# ProductCategory
        $r = request()->create('/', 'GET', [
            'name' => 'Makanan',
            'seo' => [
                'permalink' => 'makanan',
                'site_title' => 'Makanan',
            ],
    	]);
    	$makanan = \App\ProductCategory::simpan($r);

        $r = request()->create('/', 'GET', [
            'name' => 'Minuman',
            'seo' => [
                'permalink' => 'minuman',
                'site_title' => 'Minuman',
            ],
    	]);
    	$minuman = \App\ProductCategory::simpan($r);

        $r = request()->create('/', 'GET', [
            'name' => 'Snack',
            'seo' => [
                'permalink' => 'snack',
                'site_title' => 'Snack',
            ],
    	]);
    	$snack = \App\ProductCategory::simpan($r);

        $r = request()->create('/', 'GET', [
            'name' => 'Kamar Hotel',
            'seo' => [
                'permalink' => 'kamar-hotel',
                'site_title' => 'Kamar Hotel',
            ],
    	]);
    	$kamarHotel = \App\ProductCategory::simpan($r);

    	# BusinessProduct
    	// Bajak Laut
        $r = request()->create('/', 'GET', [
            'business_id' => $bajakLaut->id,
            'name' => 'Nasi Goreng',
            'price' => 15000,
            'image_url' => '',
            'product_category_id' => $makanan->id,
            'seo' => [
                'permalink' => 'nasi-goreng-101',
                'site_title' => 'Nasi Goreng',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $bajakLaut->id,
            'name' => 'Nasi Goreng Hijau',
            'price' => 18000,
            'image_url' => '',
            'product_category_id' => $makanan->id,
            'seo' => [
                'permalink' => 'nasi-goreng-hijau-102',
                'site_title' => 'Nasi Goreng Hijau',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $bajakLaut->id,
            'name' => 'Ayam Berbeque',
            'price' => 25000,
            'image_url' => '',
            'product_category_id' => $makanan->id,
            'seo' => [
                'permalink' => 'ayam-berbeque-103',
                'site_title' => 'Ayam Berbeque',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $bajakLaut->id,
            'name' => 'Jus Mangga',
            'price' => 10000,
            'image_url' => '',
            'product_category_id' => $minuman->id,
            'seo' => [
                'permalink' => 'jus-mangga-104',
                'site_title' => 'Jus Mangga',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $bajakLaut->id,
            'name' => 'Jus Melon',
            'price' => 15000,
            'image_url' => '',
            'product_category_id' => $minuman->id,
            'seo' => [
                'permalink' => 'jus-melon-105',
                'site_title' => 'Jus Melon',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $bajakLaut->id,
            'name' => 'Kentang Goreng',
            'price' => 12000,
            'image_url' => '',
            'product_category_id' => $snack->id,
            'seo' => [
                'permalink' => 'kentang-goreng-106',
                'site_title' => 'Kentang Goreng',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

    	// SE
        $r = request()->create('/', 'GET', [
            'business_id' => $se->id,
            'name' => 'Nasi Goreng',
            'price' => 12000,
            'image_url' => '',
            'product_category_id' => $makanan->id,
            'seo' => [
                'permalink' => 'nasi-goreng-107',
                'site_title' => 'Nasi Goreng',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $se->id,
            'name' => 'Kentang Goreng',
            'price' => 8000,
            'image_url' => '',
            'product_category_id' => $snack->id,
            'seo' => [
                'permalink' => 'kentang-goreng-108',
                'site_title' => 'Kentang Goreng',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $se->id,
            'name' => 'Jus Alphukat',
            'price' => 10000,
            'image_url' => '',
            'product_category_id' => $minuman->id,
            'seo' => [
                'permalink' => 'jus-alphukat-109',
                'site_title' => 'Jus Alphukat',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $se->id,
            'name' => 'Jus Melon',
            'price' => 10000,
            'image_url' => '',
            'product_category_id' => $minuman->id,
            'seo' => [
                'permalink' => 'jus-melon-110',
                'site_title' => 'Jus Melon',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $se->id,
            'name' => 'Es Cream Montain',
            'price' => 15000,
            'image_url' => '',
            'product_category_id' => $snack->id,
            'seo' => [
                'permalink' => 'es-cream-montain-111',
                'site_title' => 'Es Cream Montain',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $se->id,
            'name' => 'Es Capucino',
            'price' => 8000,
            'image_url' => '',
            'product_category_id' => $minuman->id,
            'seo' => [
                'permalink' => 'es-capucino-112',
                'site_title' => 'Es Capucino',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

    	// Cak Wang
        $r = request()->create('/', 'GET', [
            'business_id' => $cakWang->id,
            'name' => 'Es Jeruk',
            'price' => 8000,
            'image_url' => '',
            'product_category_id' => $minuman->id,
            'seo' => [
                'permalink' => 'es-Jeruk-113',
                'site_title' => 'Es Jeruk',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $cakWang->id,
            'name' => 'Jus Mangga',
            'price' => 12000,
            'image_url' => '',
            'product_category_id' => $minuman->id,
            'seo' => [
                'permalink' => 'jus-mangga-114',
                'site_title' => 'Jus Mangga',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $cakWang->id,
            'name' => 'Kopi Tubruk',
            'price' => 9000,
            'image_url' => '',
            'product_category_id' => $minuman->id,
            'seo' => [
                'permalink' => 'kopi-tubruk-115',
                'site_title' => 'Kopi Tubruk',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $cakWang->id,
            'name' => 'Singkong Keju',
            'price' => 13000,
            'image_url' => '',
            'product_category_id' => $snack->id,
            'seo' => [
                'permalink' => 'singkong-keju-116',
                'site_title' => 'Singkong Keju',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $cakWang->id,
            'name' => 'Pisang Crispy',
            'price' => 12000,
            'image_url' => '',
            'product_category_id' => $snack->id,
            'seo' => [
                'permalink' => 'pisang-crispy-117',
                'site_title' => 'Pisang Crispy',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $cakWang->id,
            'name' => 'Capucino Hangat',
            'price' => 10000,
            'image_url' => '',
            'product_category_id' => $minuman->id,
            'seo' => [
                'permalink' => 'capucino-hangat-118',
                'site_title' => 'Capucino Hangat',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

    	// Hotel Slamet
        $r = request()->create('/', 'GET', [
            'business_id' => $hotelSlamet->id,
            'name' => 'Nasi Goreng',
            'price' => 15000,
            'image_url' => '',
            'product_category_id' => $makanan->id,
            'seo' => [
                'permalink' => 'nasi-goreng-119',
                'site_title' => 'Nasi Goreng',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $hotelSlamet->id,
            'name' => 'Ayam Bakar',
            'price' => 35000,
            'image_url' => '',
            'product_category_id' => $makanan->id,
            'seo' => [
                'permalink' => 'ayam-bakar-120',
                'site_title' => 'Ayam Bakar',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $hotelSlamet->id,
            'name' => 'Ikan Bakar',
            'price' => 30000,
            'image_url' => '',
            'product_category_id' => $makanan->id,
            'seo' => [
                'permalink' => 'ikan-bakar-121',
                'site_title' => 'ikan Bakar',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $hotelSlamet->id,
            'name' => 'Mie Goreng',
            'price' => 10000,
            'image_url' => '',
            'product_category_id' => $makanan->id,
            'seo' => [
                'permalink' => 'mie-goreng-122',
                'site_title' => 'Mie Goreng',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $hotelSlamet->id,
            'name' => 'Jus Jambu',
            'price' => 12000,
            'image_url' => '',
            'product_category_id' => $minuman->id,
            'seo' => [
                'permalink' => 'jus-jambu-123',
                'site_title' => 'Jus Jambu',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $hotelSlamet->id,
            'name' => 'Jus Alphukat',
            'price' => 12000,
            'image_url' => '',
            'product_category_id' => $minuman->id,
            'seo' => [
                'permalink' => 'jus-alphukat-124',
                'site_title' => 'Jus Alphukat',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $hotelSlamet->id,
            'name' => 'Es Teh',
            'price' => 8000,
            'image_url' => '',
            'product_category_id' => $minuman->id,
            'seo' => [
                'permalink' => 'es-teh-125',
                'site_title' => 'Es Teh',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $hotelSlamet->id,
            'name' => 'Es Susu',
            'price' => 9000,
            'image_url' => '',
            'product_category_id' => $minuman->id,
            'seo' => [
                'permalink' => 'es-susu-126',
                'site_title' => 'Es Susu',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $hotelSlamet->id,
            'name' => 'Kamar Ekonomi',
            'price' => 250000,
            'image_url' => '',
            'product_category_id' => $kamarHotel->id,
            'seo' => [
                'permalink' => 'kamar-ekonomi-127',
                'site_title' => 'Kamar Ekonomi',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $hotelSlamet->id,
            'name' => 'Kamar Bisnis',
            'price' => 350000,
            'image_url' => '',
            'product_category_id' => $kamarHotel->id,
            'seo' => [
                'permalink' => 'kamar-bisnis-128',
                'site_title' => 'Kamar Bisnis',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);

        $r = request()->create('/', 'GET', [
            'business_id' => $hotelSlamet->id,
            'name' => 'Kamar VIP',
            'price' => 500000,
            'image_url' => '',
            'product_category_id' => $kamarHotel->id,
            'seo' => [
                'permalink' => 'kamar-vip-129',
                'site_title' => 'Kamar VIP',
            ],
    	]);
    	\App\BusinessProduct::simpan($r);
    }
}
