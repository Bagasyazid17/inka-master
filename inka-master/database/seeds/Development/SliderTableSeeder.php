<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\Slider;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('slider')->delete();

        $sliders = array(
            ['slider_master_id' => 1,
            'judul' => 'Kereta Ekonomi',
            'gambar' => '/images/slider/20171127-053704-slider1.jpg',
            'tagline_1' => 'Lokomotif',
            'tagline_2' => 'Kenyamanan untuk semua lapisan masyarakat',
            'urutan' => 1],

            ['slider_master_id' => 1,
            'judul' => 'Kereta Premium',
            'gambar' => '/images/slider/20171127-053704-slider2.jpg',
            'tagline_1' => 'Kereta Bandara',
            'tagline_2' => 'Kereta Ekonomi rasa Eksekutif',
            'urutan' => 2],
            
            ['slider_master_id' => 1,
            'judul' => 'Kereta Eksekutif',
            'gambar' => '/images/slider/20171127-053704-slider3.jpg',
            'tagline_1' => 'Kereta',
            'tagline_2' => 'Paduan Estetika & Kenyamanan',
            'urutan' => 3],
            
            ['slider_master_id' => 2,
            'judul' => 'Economic Train',
            'gambar' => '/images/slider/20171127-053704-slider1.jpg',
            'tagline_1' => 'Locomotive',
            'tagline_2' => 'Convenience for all society',
            'urutan' => 1],
            
            ['slider_master_id' => 2,
            'judul' => 'Premium Train',
            'gambar' => '/images/slider/20171127-053704-slider2.jpg',
            'tagline_1' => 'Airport Train',
            'tagline_2' => 'Economic Train with a taste of Executive Class',
            'urutan' => 2],
            
            ['slider_master_id' => 2,
            'judul' => 'Executive Train',
            'gambar' => '/images/slider/20171127-053704-slider3.jpg',
            'tagline_1' => 'Train',
            'tagline_2' => 'The Perfect Blend of Aesthetics & Convenience',
            'urutan' => 3],
            
        );
            
        foreach ($sliders as $slider)
        {
            Slider::create($slider);
        }
        
        Model::reguard();
    }
}
