<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\HomeSetting;

class HomeSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('home_setting')->delete();

        $settings = array(
            ['nama' => 'product', 'lang_id' => 'id', 'total_item' => 4, 'column' => 2],
            ['nama' => 'berita', 'lang_id' => 'id', 'total_item' => 6, 'column' => 3],
            ['nama' => 'karir', 'lang_id' => 'id', 'total_item' => 6, 'column' => 3],
            ['nama' => 'product', 'lang_id' => 'en', 'total_item' => 4, 'column' => 2],
        );
            
        foreach ($settings as $setting)
        {
            HomeSetting::create($setting);
        }
        
        Model::reguard();
    }
}
