<?php

use Illuminate\Database\Seeder;
use App\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Page
        $r = request()->create('/', 'GET', [
            'page_title' => 'Home',
            'show_in_menu' => 1,
            'seo' => [
                'permalink' => '/',
                'site_title' => 'Home',
                'controller' => 'HomeController',
                'function' => 'index',
            ],
        ]);
        \App\Page::simpan($r);

        $r = request()->create('/', 'GET', [
            'page_title' => 'Map',
            'show_in_menu' => 1,
            'seo' => [
                'permalink' => 'map',
                'site_title' => 'Map',
                'controller' => 'MapPageController',
                'function' => 'index',
            ],
        ]);
        \App\Page::simpan($r);

        $r = request()->create('/', 'GET', [
            'page_title' => 'Produk',
            'show_in_menu' => 1,
            'seo' => [
                'permalink' => 'produk',
                'site_title' => 'Produk',
                'controller' => 'ProductPageController',
                'function' => 'index',
            ],
        ]);
        \App\Page::simpan($r);

        $r = request()->create('/', 'GET', [
            'page_title' => 'Bisnis',
            'show_in_menu' => 1,
            'seo' => [
                'permalink' => 'bisnis',
                'site_title' => 'Bisnis',
                'controller' => 'BisnisPageController',
                'function' => 'index',
            ],
        ]);
        \App\Page::simpan($r);

        $r = request()->create('/', 'GET', [
            'page_title' => 'Blog',
            'show_in_menu' => 1,
            'seo' => [
                'permalink' => 'blog',
                'site_title' => 'Blog',
                'controller' => 'BlogController',
                'function' => 'index',
            ],
        ]);
        \App\Page::simpan($r);

        $r = request()->create('/', 'GET', [
            'page_title' => 'Contact',
            'show_in_menu' => 1,
            'seo' => [
                'permalink' => 'contact',
                'site_title' => 'Contact',
                'controller' => 'ContactController',
                'function' => 'index',
            ],
        ]);
        \App\Page::simpan($r);

        $r = request()->create('/', 'GET', [
            'page_title' => 'Disclaimer',
            'isi' => '<p>Ini isi disclaimer</p>',
            'show_in_menu' => 0,
            'seo' => [
                'permalink' => 'disclaimer',
                'site_title' => 'Disclaimer',
                'controller' => 'PageController',
                'function' => 'index',
            ],
        ]);
        \App\Page::simpan($r);
    }
}
