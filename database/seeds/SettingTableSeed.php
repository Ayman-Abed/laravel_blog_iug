<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'logo' => "item/logo1.png",
            'miniLogo' => "item/logo1.png",
            'blog_name' => 'مشروع جامعه',
            'description' => 'مشروع جامعه',
            'address' => 'مشروع جامعه',
            'phone' => '123456789',
        ];

        Setting::create($data);
    }
}
