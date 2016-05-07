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
    	$restoran = Category::simpan($r);

        $r = request()->create('/', 'GET', [
            'name' => 'Hotel',
            'seo' => [
                'permalink' => 'hotel',
                'site_title' => 'Hotel',
            ],
        ]);
    	$hotel = Category::simpan($r);

        $r = request()->create('/', 'GET', [
            'name' => 'Kafe',
            'seo' => [
                'permalink' => 'kafe',
                'site_title' => 'Kafe',
            ],
        ]);
    	$cafe = Category::simpan($r);

    	# Businesses
        $r = request()->create('/', 'GET', [
    		'name' 		=> 'Restoran Bajak Laut',
    		'address' 	=> 'Jl. Ahmad Yani No. 65, Kec. Banyuwangi, Jawa Timur',
    		'map_lat' 	=> '-8222512',
    		'map_long' 	=> '114367814',
    		'phone'		=> '0859-0415-0105',
            'seo' => [
                'permalink' => 'restoran-bajak-laut',
                'site_title' => 'Restoran Bajak Laut',
            ],
    	]);
    	$bajakLaut = Business::simpan($r) ;
    	$bajakLaut->addCategory($restoran);

        $r = request()->create('/', 'GET', [
            'name' 		=> 'Smile Every Day (SE)',
            'address' 	=> 'Jl. Ahmad Yani No. 103, Kec. Banyuwangi, Jawa Timur',
            'map_lat' 	=> '-8219884427536580',
            'map_long' 	=> '11436858773231500',
            'phone'		=> '',
            'seo' => [
                'permalink' => 'smile-every-day-se',
                'site_title' => 'Smile Every Day (SE)',
            ],
    	]);
    	$se = Business::simpan($r) ;
    	$se->addCategory($cafe);

        $r = request()->create('/', 'GET', [
            'name' 		=> 'Cak Wang',
            'address' 	=> 'Jl. Adi Sucipto No 32, Kec. Banyuwangi, Jawa Timur',
            'map_lat' 	=> '-8230375480555220',
            'map_long' 	=> '11436355590820300',
            'phone'		=> '',
            'seo' => [
                'permalink' => 'cak-wang',
                'site_title' => 'Cak Wang',
            ],
    	]);
    	$cakWang = Business::simpan($r) ;
    	$cakWang->addCategory($cafe);

        $r = request()->create('/', 'GET', [
            'name' 		=> 'Hotel Slamet',
            'address' 	=> 'Jl. Kapten Piere Tendean No.89 Karangrejo Kec. Banyuwangi Kabupaten Banyuwangi, Jawa Timur',
            'map_lat' 	=> '-8216981552982290s',
            'map_long' 	=> '11437511086463900',
            'phone'		=> '',
            'seo' => [
                'permalink' => 'hotel-slamet',
                'site_title' => 'Hotel Slamet',
            ],
    	]);
    	$hotelSlamet = Business::simpan($r) ;
    	$hotelSlamet->addCategory($hotel);
    	$hotelSlamet->addCategory($restoran);
    	$hotelSlamet->addCategory($cafe);

    	# ProductCategory
        $r = request()->create('/', 'GET', [
            'name' => 'Makanan'
            'seo' => [
                'permalink' => 'makanan',
                'site_title' => 'Makanan',
            ],
    	]);
    	$makanan = ProductCategory::simpan($r);

        $r = request()->create('/', 'GET', [
            'name' => 'Minuman'
            'seo' => [
                'permalink' => 'minuman',
                'site_title' => 'Minuman',
            ],
    	]);
    	$minuman = ProductCategory::simpan($r);

        $r = request()->create('/', 'GET', [
            'name' => 'Snack'
            'seo' => [
                'permalink' => 'snack',
                'site_title' => 'Snack',
            ],
    	]);
    	$snack = ProductCategory::simpan($r);

        $r = request()->create('/', 'GET', [
            'name' => 'Kamar Hotel'
            'seo' => [
                'permalink' => 'kamar-hotel',
                'site_title' => 'Kamar Hotel',
            ],
    	]);
    	$kamarHotel = ProductCategory::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::create($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);

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
    	BusinessProduct::simpan($r);
    }
}
