<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'business_name' => 'Amitech',
            'phone'         => '087755925565',
            'email'         => 'reez4l.aahm3d@gmail.com',
            'facebook'      => '',
            'twitter'       => '',
            'g_plus'        => '',
            'youtube'       => '',
            'instagram'     => '',
            'alamat'        => '',
            'map_latitude'  => '-8.212292045017827',
            'map_longitude' => '114.37672555446625',
            'about_us'      => '<b>About Me</b>',
        ]);
    }
}
