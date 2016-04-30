<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Business;
use App\BusinessProduct;
use App\ProductCategory;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UserTableSeeder::class);

        $user = User::create([
            'name' => 'Ahmad Rizal Afani',
            'email' => 'ahmadrizalafani@gmail.com',
            'password' => bcrypt('administrator'),
        ]);

    	# Categories
    	$restoran = Category::create(['name' => 'Restoran']);
    	$hotel = Category::create(['name' => 'Hotel']);
    	$cafe = Category::create(['name' => 'Kafe']);

    	# Businesses
    	$bajakLaut = Business::create([
    			'name' 		=> 'Restoran Bajak Laut',
    			'address' 	=> 'Jl. Ahmad Yani No. 65, Kec. Banyuwangi, Jawa Timur',
    			'map_lat' 	=> '-8222512',
    			'map_long' 	=> '114367814',
    			'phone'		=> '0859-0415-0105',
    		]) ;
    	$bajakLaut->addCategory($restoran);

    	$se = Business::create([
    			'name' 		=> 'Smile Every Day (SE)',
    			'address' 	=> 'Jl. Ahmad Yani No. 103, Kec. Banyuwangi, Jawa Timur',
    			'map_lat' 	=> '-8219884427536580',
    			'map_long' 	=> '11436858773231500',
    			'phone'		=> '',
    		]) ;
    	$se->addCategory($cafe);

    	$cakWang = Business::create([
    			'name' 		=> 'Cak Wang',
    			'address' 	=> 'Jl. Adi Sucipto No 32, Kec. Banyuwangi, Jawa Timur',
    			'map_lat' 	=> '-8230375480555220',
    			'map_long' 	=> '11436355590820300',
    			'phone'		=> '',
    		]) ;
    	$cakWang->addCategory($cafe);

    	$hotelSlamet = Business::create([
    			'name' 		=> 'Hotel Slamet',
    			'address' 	=> 'Jl. Kapten Piere Tendean No.89 Karangrejo Kec. Banyuwangi Kabupaten Banyuwangi, Jawa Timur',
    			'map_lat' 	=> '-8216981552982290s',
    			'map_long' 	=> '11437511086463900',
    			'phone'		=> '',
    		]) ;
    	$hotelSlamet->addCategory($hotel);
    	$hotelSlamet->addCategory($restoran);
    	$hotelSlamet->addCategory($cafe);

    	# ProductCategory
    	$makanan = ProductCategory::create(['name' => 'Makanan']);
    	$minuman = ProductCategory::create(['name' => 'Minuman']);
    	$snack = ProductCategory::create(['name' => 'Snack']);
    	$kamarHotel = ProductCategory::create(['name' => 'Kamar Hotel']);

    	# BusinessProduct
    	// Bajak Laut
    	BusinessProduct::create([
    			'business_id' => $bajakLaut->id,
    			'name' => 'Nasi Goreng',
    			'price' => 15000,
    			'image_url' => '',
    			'product_category_id' => $makanan->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $bajakLaut->id,
    			'name' => 'Nasi Goreng Hijau',
    			'price' => 18000,
    			'image_url' => '',
    			'product_category_id' => $makanan->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $bajakLaut->id,
    			'name' => 'Ayam Berbeque',
    			'price' => 25000,
    			'image_url' => '',
    			'product_category_id' => $makanan->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $bajakLaut->id,
    			'name' => 'Jus Mangga',
    			'price' => 10000,
    			'image_url' => '',
    			'product_category_id' => $minuman->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $bajakLaut->id,
    			'name' => 'Jus Melon',
    			'price' => 15000,
    			'image_url' => '',
    			'product_category_id' => $minuman->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $bajakLaut->id,
    			'name' => 'Kentang Goreng',
    			'price' => 12000,
    			'image_url' => '',
    			'product_category_id' => $snack->id,
    		]);

    	// SE
    	BusinessProduct::create([
    			'business_id' => $se->id,
    			'name' => 'Nasi Goreng',
    			'price' => 12000,
    			'image_url' => '',
    			'product_category_id' => $makanan->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $se->id,
    			'name' => 'Kentang Goreng',
    			'price' => 8000,
    			'image_url' => '',
    			'product_category_id' => $snack->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $se->id,
    			'name' => 'Jus Alphukat',
    			'price' => 10000,
    			'image_url' => '',
    			'product_category_id' => $minuman->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $se->id,
    			'name' => 'Jus Melon',
    			'price' => 10000,
    			'image_url' => '',
    			'product_category_id' => $minuman->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $se->id,
    			'name' => 'Es Cream Montain',
    			'price' => 15000,
    			'image_url' => '',
    			'product_category_id' => $snack->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $se->id,
    			'name' => 'Es Capucino',
    			'price' => 8000,
    			'image_url' => '',
    			'product_category_id' => $minuman->id,
    		]);

    	// Cak Wang
    	BusinessProduct::create([
    			'business_id' => $cakWang->id,
    			'name' => 'Es Jeruk',
    			'price' => 8000,
    			'image_url' => '',
    			'product_category_id' => $minuman->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $cakWang->id,
    			'name' => 'Jus Mangga',
    			'price' => 12000,
    			'image_url' => '',
    			'product_category_id' => $minuman->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $cakWang->id,
    			'name' => 'Kopi Tubruk',
    			'price' => 9000,
    			'image_url' => '',
    			'product_category_id' => $minuman->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $cakWang->id,
    			'name' => 'Singkong Keju',
    			'price' => 13000,
    			'image_url' => '',
    			'product_category_id' => $snack->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $cakWang->id,
    			'name' => 'Pisang Crispy',
    			'price' => 12000,
    			'image_url' => '',
    			'product_category_id' => $snack->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $cakWang->id,
    			'name' => 'Capucino Hangat',
    			'price' => 10000,
    			'image_url' => '',
    			'product_category_id' => $minuman->id,
    		]);

    	// Hotel Slamet
    	BusinessProduct::create([
    			'business_id' => $hotelSlamet->id,
    			'name' => 'Nasi Goreng',
    			'price' => 15000,
    			'image_url' => '',
    			'product_category_id' => $makanan->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $hotelSlamet->id,
    			'name' => 'Ayam Bakar',
    			'price' => 35000,
    			'image_url' => '',
    			'product_category_id' => $makanan->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $hotelSlamet->id,
    			'name' => 'Ikan Bakar',
    			'price' => 30000,
    			'image_url' => '',
    			'product_category_id' => $makanan->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $hotelSlamet->id,
    			'name' => 'Mie Goreng',
    			'price' => 10000,
    			'image_url' => '',
    			'product_category_id' => $makanan->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $hotelSlamet->id,
    			'name' => 'Jus Jambu',
    			'price' => 12000,
    			'image_url' => '',
    			'product_category_id' => $minuman->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $hotelSlamet->id,
    			'name' => 'Jus Alphukat',
    			'price' => 12000,
    			'image_url' => '',
    			'product_category_id' => $minuman->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $hotelSlamet->id,
    			'name' => 'Es Teh',
    			'price' => 8000,
    			'image_url' => '',
    			'product_category_id' => $minuman->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $hotelSlamet->id,
    			'name' => 'Es Susu',
    			'price' => 9000,
    			'image_url' => '',
    			'product_category_id' => $minuman->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $hotelSlamet->id,
    			'name' => 'Kamar Ekonomi',
    			'price' => 250000,
    			'image_url' => '',
    			'product_category_id' => $kamarHotel->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $hotelSlamet->id,
    			'name' => 'Kamar Bisnis',
    			'price' => 350000,
    			'image_url' => '',
    			'product_category_id' => $kamarHotel->id,
    		]);

    	BusinessProduct::create([
    			'business_id' => $hotelSlamet->id,
    			'name' => 'Kamar VIP',
    			'price' => 500000,
    			'image_url' => '',
    			'product_category_id' => $kamarHotel->id,
    		]);

    }
}
