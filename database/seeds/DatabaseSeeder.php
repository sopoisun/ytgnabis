<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Business;
use App\BusinessProduct;
use App\ProductCategory;
use App\User;
use App\Member;

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

        # Member
        Member::create([
            'name' => 'Foo',
            'email' => 'foo@gmail.com',
            'password' => bcrypt('administrator'),
        ]);

        // Basic roles data
        Role::insert([
            ['name' => 'Super User', 'key' => 'superuser'],
        ]);

        // Basic permissions data
        Permission::insert([
            ['name' => 'Baca bisnis', 'key' => 'business.read'],
            ['name' => 'Tambah bisnis', 'key' => 'business.create'],
            ['name' => 'Ubah bisnis', 'key' => 'business.update'],
            ['name' => 'Hapus bisnis', 'key' => 'business.delete'],

            ['name' => 'Baca kategory bisnis', 'key' => 'business_category.read'],
            ['name' => 'Tambah kategory bisnis', 'key' => 'business_category.create'],
            ['name' => 'Ubah kategory bisnis', 'key' => 'business_category.update'],
            ['name' => 'Hapus kategory bisnis', 'key' => 'business_category.delete'],

            ['name' => 'Baca produk', 'key' => 'product.read'],
            ['name' => 'Tambah produk', 'key' => 'product.create'],
            ['name' => 'Ubah produk', 'key' => 'product.update'],
            ['name' => 'Hapus produk', 'key' => 'product.delete'],

            ['name' => 'Baca kategori produk', 'key' => 'product_category.read'],
            ['name' => 'Tambah kategori produk', 'key' => 'product_category.create'],
            ['name' => 'Ubah kategori produk', 'key' => 'product_category.update'],
            ['name' => 'Hapus kategori produk', 'key' => 'product_category.delete'],

            ['name' => 'Baca member', 'key' => 'member.read'],
            ['name' => 'Tambah member', 'key' => 'member.create'],
            ['name' => 'Ubah member', 'key' => 'member.update'],
            ['name' => 'Hapus member', 'key' => 'member.delete'],

            ['name' => 'Baca user', 'key' => 'user.read'],
            ['name' => 'Tambah user', 'key' => 'user.create'],
            ['name' => 'Ubah user', 'key' => 'user.update'],
            ['name' => 'Hapus user', 'key' => 'user.delete'],

            ['name' => 'Baca role', 'key' => 'role.read'],
            ['name' => 'Tambah role', 'key' => 'role.create'],
            ['name' => 'Ubah role', 'key' => 'role.update'],
            ['name' => 'Hapus role', 'key' => 'role.delete'],

            ['name' => 'Baca permission', 'key' => 'permission.read'],
            ['name' => 'Tambah permission', 'key' => 'permission.create'],
            ['name' => 'Ubah permission', 'key' => 'permission.update'],
            ['name' => 'Hapus permission', 'key' => 'permission.delete'],
        ]);

        $superuser = App\Role::where('key', 'superuser')->first();
        $superuser->addPermission('business.read');
        $superuser->addPermission('business.create');
        $superuser->addPermission('business.update');
        $superuser->addPermission('business.delete');

        $superuser->addPermission('business_category.read');
        $superuser->addPermission('business_category.create');
        $superuser->addPermission('business_category.update');
        $superuser->addPermission('business_category.delete');

        $superuser->addPermission('product.read');
        $superuser->addPermission('product.create');
        $superuser->addPermission('product.update');
        $superuser->addPermission('product.delete');

        $superuser->addPermission('product_category.read');
        $superuser->addPermission('product_category.create');
        $superuser->addPermission('product_category.update');
        $superuser->addPermission('product_category.delete');

        $superuser->addPermission('member.read');
        $superuser->addPermission('member.create');
        $superuser->addPermission('member.update');
        $superuser->addPermission('member.delete');

        $superuser->addPermission('user.read');
        $superuser->addPermission('user.create');
        $superuser->addPermission('user.update');
        $superuser->addPermission('user.delete');

        $superuser->addPermission('role.read');
        $superuser->addPermission('role.create');
        $superuser->addPermission('role.update');
        $superuser->addPermission('role.delete');

        $superuser->addPermission('permission.read');
        $superuser->addPermission('permission.create');
        $superuser->addPermission('permission.update');
        $superuser->addPermission('permission.delete');

        $user->assignRole('superuser');
    }
}
