<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\MasterProcurement;

class MasterProcurementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('master_procurement')->delete();

        $masterProcurements = array(
            ['nama' => 'e-Procurement Produksi'],
            ['nama' => 'e-Procurement Non Produksi'],
            ['nama' => 'Pengumuman Lelang'],
        );
            
        foreach ($masterProcurements as $masterProcurement)
        {
            MasterProcurement::create($masterProcurement);
        }
        
        Model::reguard();
    }
}
