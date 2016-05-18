<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\PostCategory;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Categories
        $tempKat = [];
        for( $i = 0; $i<3; $i++ ){
            $r = request()->create('/', 'GET', [
                'name' => 'Kategori '.($i+1),
                'seo' => [
                    'permalink' => 'kategori-'.($i+1),
                    'site_title' => 'Kategori '.($i+1),
                ],
            ]);
        	$kat = \App\PostCategory::simpan($r);
            array_push($tempKat, $kat);
        }

        $user = \App\User::first();

        # Post
        for( $i = 0; $i<3; $i++ ){
            $rand = rand(0, 2);
            $r = request()->create('/', 'GET', [
                'post_title' => 'Sample Post '.($i+1),
                'user_id' => $user->id,
                'post_category_id' => $tempKat[$rand]->id,
                'seo' => [
                    'permalink' => 'sample-post-'.($i+1),
                    'site_title' => 'Sample Post'.($i+1),
                ],
            ]);
            \App\Post::simpan($r);
        }
    }
}
