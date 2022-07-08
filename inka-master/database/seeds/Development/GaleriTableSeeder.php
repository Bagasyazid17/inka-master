<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\Galeri;

class GaleriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('galeri')->delete();

        $galeris = array(
            ['nama' => 'Galeri Foto HUT INKA Ke-34'],
            ['nama' => 'Galeri Foto Kereta Penumpang'],
        );
            
        foreach ($galeris as $galeri)
        {
            Galeri::create($galeri);
        }
        
        Model::reguard();
    }
}
