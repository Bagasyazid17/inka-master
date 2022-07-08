<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\Menu;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('menu')->delete();

        $menus = array(
            ['nama' => 'Korporasi',
            'bahasa' => 'id',
            'urutan' => 1,
            'built_in' => 1],
            
            ['nama' => 'Produk',
            'bahasa' => 'id',
            'urutan' => 2,
            'built_in' => 1],
            
            // ['nama' => 'Galeri',
            // 'bahasa' => 'id',
            // 'urutan' => 3,
            // 'built_in' => 1],
            
            ['nama' => 'Stakeholder Relation',
            'bahasa' => 'id',
            'urutan' => 4,
            'built_in' => 1],
            
            ['nama' => 'Berita',
            'bahasa' => 'id',
            'urutan' => 5,
            'built_in' => 1],
            
            ['nama' => 'Kontak',
            'bahasa' => 'id',
            'urutan' => 6,
            'built_in' => 1],
            
            ['nama' => 'Corporation',
            'bahasa' => 'en',
            'urutan' => 1,
            'built_in' => 1],
            
            ['nama' => 'Product',
            'bahasa' => 'en',
            'urutan' => 2,
            'built_in' => 1],
            
            ['nama' => 'Gallery',
            'bahasa' => 'en',
            'urutan' => 3,
            'built_in' => 1],
            
            ['nama' => 'Contact Us',
            'bahasa' => 'en',
            'urutan' => 4,
            'built_in' => 1],
            
        );
            
        foreach ($menus as $menu)
        {
            Menu::create($menu);
        }
        
        Model::reguard();
    }
}
