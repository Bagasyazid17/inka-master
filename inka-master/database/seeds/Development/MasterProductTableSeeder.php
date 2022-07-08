<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\MasterProduct;

class MasterProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('master_product')->delete();

        $masterProducts = array(
            ['nama_id' => 'Lokomotif', 'nama_en' => 'Lokomotif', 'icon' => '/images/master_product/1.png'],
            ['nama_id' => 'Coach', 'nama_en' => 'Coach', 'icon' => '/images/master_product/2.png'],
            ['nama_id' => 'Multiple Unit', 'nama_en' => 'Multiple Unit', 'icon' => '/images/master_product/3.png'],
            ['nama_id' => 'Wagon', 'nama_en' => 'Wagon', 'icon' => '/images/master_product/4.png'],
            ['nama_id' => 'Special Vehicle', 'nama_en' => 'Special Vehicle', 'icon' => '/images/master_product/5.png'],
            ['nama_id' => 'Product Dev', 'nama_en' => 'Product Dev', 'icon' => '/images/master_product/6.png'],
            ['nama_id' => 'Service & Component', 'nama_en' => 'Service & Component', 'icon' => '/images/master_product/7.png'],
        );
            
        foreach ($masterProducts as $masterProduct)
        {
            MasterProduct::create($masterProduct);
        }
        
        Model::reguard();
    }
}
