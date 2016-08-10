<?php

use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kecamatans = [
            ['kecamatan' => 'Banyuwangi'],
            ['kecamatan' => 'Rogojampi'],
            ['kecamatan' => 'Genteng'],
            ['kecamatan' => 'Wongsorejo'],
            ['kecamatan' => 'Giri'],
            ['kecamatan' => 'Kalipuro'],
            ['kecamatan' => 'Glagah'],
            ['kecamatan' => 'Licin'],
            ['kecamatan' => 'Songgon'],
            ['kecamatan' => 'Sempu'],
            ['kecamatan' => 'Singojuruh'],
            ['kecamatan' => 'Kabat'],
            ['kecamatan' => 'Srono'],
            ['kecamatan' => 'Kalibaru'],
            ['kecamatan' => 'Glenmore'],
            ['kecamatan' => 'Tegalsari'],
            ['kecamatan' => 'Gambiran'],
            ['kecamatan' => 'Cluring'],
            ['kecamatan' => 'Muncar'],
            ['kecamatan' => 'Tegaldlimo'],
            ['kecamatan' => 'Purwoharjo'],
            ['kecamatan' => 'Bangorejo'],
            ['kecamatan' => 'Silirangung'],
            ['kecamatan' => 'Pesanggaran'],
        ];

        # Categories
        foreach( $kecamatans as $k ){
            $r = request()->create('/', 'GET', [
                'name' => $k['kecamatan'],
                'seo' => [
                    'permalink' => strtolower($k['kecamatan']),
                    'site_title' => $k['kecamatan'],
                ],
            ]);
        	$kat = \App\Kecamatan::simpan($r);
        }
    }
}
