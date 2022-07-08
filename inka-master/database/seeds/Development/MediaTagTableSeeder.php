<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\MediaTag;

class MediaTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('media_tag')->delete();

        $mediaTags = array(
            ['media_id' => 1,
            'nama' => 'upacara'],

            ['media_id' => 1,
            'nama' => 'hut'],
            
            ['media_id' => 1,
            'nama' => '34'],
            
            ['media_id' => 2,
            'nama' => 'jalan'],
            
            ['media_id' => 2,
            'nama' => 'sehat'],
            
            ['media_id' => 2,
            'nama' => 'hut'],
            
            ['media_id' => 2,
            'nama' => '34'],
            
            ['media_id' => 3,
            'nama' => 'lomba'],
            
            ['media_id' => 3,
            'nama' => 'bulutangkis'],
            
            ['media_id' => 3,
            'nama' => 'hut'],
            
            ['media_id' => 3,
            'nama' => '34'],
            
            ['media_id' => 4,
            'nama' => 'jalan'],
            
            ['media_id' => 4,
            'nama' => 'sehat'],
            
            ['media_id' => 4,
            'nama' => 'hut'],
            
            ['media_id' => 4,
            'nama' => '34'],
            
            ['media_id' => 4,
            'nama' => 'finish'],
            
            ['media_id' => 5,
            'nama' => 'donor'],
            
            ['media_id' => 5,
            'nama' => 'darah'],
            
            ['media_id' => 5,
            'nama' => 'hut'],
            
            ['media_id' => 5,
            'nama' => '34'],
            
            ['media_id' => 6,
            'nama' => 'kereta'],
            
            ['media_id' => 6,
            'nama' => 'penumpang'],
            
            ['media_id' => 6,
            'nama' => 'listrik'],
            
            ['media_id' => 6,
            'nama' => 'krl'],
            
            ['media_id' => 6,
            'nama' => 'kfw'],
            
            ['media_id' => 7,
            'nama' => 'kereta'],
            
            ['media_id' => 7,
            'nama' => 'penumpang'],
            
            ['media_id' => 7,
            'nama' => 'diesel'],
            
            ['media_id' => 7,
            'nama' => 'krdi'],
            
            ['media_id' => 7,
            'nama' => 'ac'],
            
            ['media_id' => 8,
            'nama' => 'kereta'],
            
            ['media_id' => 8,
            'nama' => 'penumpang'],
            
            ['media_id' => 8,
            'nama' => 'bangladesh'],
            
            ['media_id' => 9,
            'nama' => 'kereta'],
            
            ['media_id' => 9,
            'nama' => 'penumpang'],
            
            ['media_id' => 9,
            'nama' => 'eksekutif'],
            
        );
            
        foreach ($mediaTags as $mediaTag)
        {
            MediaTag::create($mediaTag);
        }
        
        Model::reguard();
    }
}
