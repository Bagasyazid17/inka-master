<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\Broadcast;

class BroadcastTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('broadcast')->delete();

        $broadcasts = array(
            ['judul' => 'Pemberitahuan Produk Baru Bogie TB398"',
            'content' => 'Produk baru Bogie TB398 akan rilis pada tanggal 1 Januari 2018.'],
        );
            
        foreach ($broadcasts as $broadcast)
        {
            Broadcast::create($broadcast);
        }
        
        Model::reguard();
    }
}
