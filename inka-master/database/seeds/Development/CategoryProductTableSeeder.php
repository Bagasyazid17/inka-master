<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\CategoryProduct;

class CategoryProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('category_product')->delete();

        $categoryProducts = array(
            ['nama_id' => 'Kereta Penumpang', 'nama_en' => 'Passenger', 'master_product_id' => 1],
            ['nama_id' => 'Kereta Bergerak', 'nama_en' => 'Passenger', 'master_product_id' => 1],
            ['nama_id' => 'Gerbong Barang', 'nama_en' => 'Passenger', 'master_product_id' => 1],
            ['nama_id' => 'Produk Lainnya', 'nama_en' => 'Passenger', 'master_product_id' => 1],
            ['nama_id' => 'Part Katalog Bogie', 'nama_en' => 'Passenger', 'master_product_id' => 3],
            ['nama_id' => 'Coach', 'nama_en' => 'Coach', 'master_product_id' => 6],
        );
            
        foreach ($categoryProducts as $categoryProduct)
        {
            CategoryProduct::create($categoryProduct);
        }
        
        Model::reguard();
    }
}
