<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\Media;

class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('media')->delete();

        $medias = array(
            ['galeri_id' => 1,
            'nama' => 'Upacara HUT INKA Ke-34',
            'type' => 1,
            'link' => '/images/galeri/1511858963 - Upacara HUT INKA Ke-34.jpg'],
            
            ['galeri_id' => 1,
            'nama' => 'Jalan Sehat HUT INKA Ke-34',
            'type' => 1,
            'link' => '/images/galeri/1511859003 - Jalan Sehat HUT INKA Ke-34.jpg'],
            
            ['galeri_id' => 1,
            'nama' => 'Lomba Bulutangkis HUT INKA Ke-34',
            'type' => 1,
            'link' => '/images/galeri/1511859048 - Lomba Bulutangkis HUT INKA Ke-34.jpg'],
            
            ['galeri_id' => 1,
            'nama' => 'Jalan Sehat HUT INKA Ke-34 Finish',
            'type' => 1,
            'link' => '/images/galeri/1511859244 - Jalan Sehat HUT INKA Ke-34 Finish.jpg'],
            
            ['galeri_id' => 1,
            'nama' => 'Aksi Sosial Donor Darah HUT INKA Ke-34',
            'type' => 1,
            'link' => '/images/galeri/1511859180 - Aksi Sosial Donor Darah HUT INKA Ke-34.jpg'],
            
            ['galeri_id' => 2,
            'nama' => 'Kereta Rel Listrik KFW (KRL KFW)',
            'type' => 1,
            'link' => '/images/galeri/1511859436 - Kereta Rel Listrik KFW (KRL KFW).jpg'],
            
            ['galeri_id' => 2,
            'nama' => 'Kereta Rel Diesel Indonesia AC (KRDI AC)',
            'type' => 1,
            'link' => '/images/galeri/1511859483 - Kereta Rel Diesel Indonesia AC (KRDI AC).jpg'],
            
            ['galeri_id' => 2,
            'nama' => 'Kereta Bangladesh',
            'type' => 1,
            'link' => '/images/galeri/1511859522 - Kereta Bangladesh.jpg'],
            
            ['galeri_id' => 2,
            'nama' => 'Kereta Eksekutif (K1)',
            'type' => 1,
            'link' => '/images/galeri/1511859580 - Kereta Eksekutif (K1).jpg'],
            
        );
            
        foreach ($medias as $media)
        {
            Media::create($media);
        }
        
        Model::reguard();
    }
}
