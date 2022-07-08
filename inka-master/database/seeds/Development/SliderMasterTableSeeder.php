<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\SliderMaster;

class SliderMasterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('slider_master')->delete();

        $sliderMasters = array(
            ['nama' => 'Slider Homepage Bahasa Indonesia',
            'deskripsi' => 'Slider untuk hompage bahasa Indonesia'],

            ['nama' => 'Slider Homepage Bahasa Inggris',
            'deskripsi' => 'Slider untuk hompage bahasa Inggris'],
        );
            
        foreach ($sliderMasters as $sliderMaster)
        {
            SliderMaster::create($sliderMaster);
        }
        
        Model::reguard();
    }
}
