<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\Karir;

class KarirTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('karir')->delete();

        $karirs = array(
            ['nama' => 'Lowongan Karir 2017 Batch #1',
            'content' => '<div class="row section"><div class="col-sm-12"><div class="type"><div class="text-wrapper cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" id="editor1" spellcheck="false" style="position: relative;" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_59" contenteditable="false"><p>Lowongan Karir Tahun 2017 Periode Januari-Juni.</p><p>PT. INKA membuka kesempatan bagi masyarakat khususnya lulusan SMA/SMK, D3, dan S1 untuk bergabung bersama PT. INKA. Segera daftarkan diri Anda!</p></div></div></div></div>',
            'content_index' => '2',
            'mulai' => '2017-01-01',
            'selesai' => '2017-06-30'],

            ['nama' => 'Lowongan Karir 2017 Batch #2',
            'content' => '<div class="row section"><div class="col-sm-12"><div class="type"><div class="text-wrapper cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" id="editor1" spellcheck="false" style="position: relative;" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_59" contenteditable="false"><p>Lowongan Karir Tahun 2017 Periode Juli-Desember.</p><p>PT. INKA membuka kesempatan bagi masyarakat khususnya lulusan SMA/SMK, D3, dan S1 untuk bergabung bersama PT. INKA. Segera daftarkan diri Anda!</p></div></div></div></div>',
            'content_index' => '2',
            'mulai' => '2017-07-01',
            'selesai' => '2017-12-31'],
            
            ['nama' => 'Lowongan Karir 2017 Batch #3',
            'content' => '<div class="row section"><div class="col-sm-12"><div class="type"><div class="text-wrapper cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" id="editor1" spellcheck="false" style="position: relative;" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_59" contenteditable="false"><p>Lowongan Karir Tahun 2018 Periode Januari-Juni.</p><p>PT. INKA membuka kesempatan bagi masyarakat khususnya lulusan SMA/SMK, D3, dan S1 untuk bergabung bersama PT. INKA. Segera daftarkan diri Anda!</p></div></div></div></div>',
            'content_index' => '2',
            'mulai' => '2018-01-01',
            'selesai' => '2018-06-30'],

            ['nama' => 'Lowongan Karir 2017 Batch #4',
            'content' => '<div class="row section"><div class="col-sm-12"><div class="type"><div class="text-wrapper cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" id="editor1" spellcheck="false" style="position: relative;" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_59" contenteditable="false"><p>Lowongan Karir Tahun 2018 Periode Juli-Desember.</p><p>PT. INKA membuka kesempatan bagi masyarakat khususnya lulusan SMA/SMK, D3, dan S1 untuk bergabung bersama PT. INKA. Segera daftarkan diri Anda!</p></div></div></div></div>',
            'content_index' => '2',
            'mulai' => '2018-07-01',
            'selesai' => '2018-12-31'],
            
            ['nama' => 'Lowongan Karir 2017 Batch #5',
            'content' => '<div class="row section"><div class="col-sm-12"><div class="type"><div class="text-wrapper cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" id="editor1" spellcheck="false" style="position: relative;" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_59" contenteditable="false"><p>Lowongan Karir Tahun 2019 Periode Januari-Juni.</p><p>PT. INKA membuka kesempatan bagi masyarakat khususnya lulusan SMA/SMK, D3, dan S1 untuk bergabung bersama PT. INKA. Segera daftarkan diri Anda!</p></div></div></div></div>',
            'content_index' => '2',
            'mulai' => '2019-01-01',
            'selesai' => '2019-06-30'],

            ['nama' => 'Lowongan Karir 2017 Batch #6',
            'content' => '<div class="row section"><div class="col-sm-12"><div class="type"><div class="text-wrapper cke_editable cke_editable_inline cke_contents_ltr cke_focus cke_show_borders" id="editor1" spellcheck="false" style="position: relative;" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_59" contenteditable="false"><p>Lowongan Karir Tahun 2019 Periode Juli-Desember.</p><p>PT. INKA membuka kesempatan bagi masyarakat khususnya lulusan SMA/SMK, D3, dan S1 untuk bergabung bersama PT. INKA. Segera daftarkan diri Anda!</p></div></div></div></div>',
            'content_index' => '2',
            'mulai' => '2019-07-01',
            'selesai' => '2019-12-31'],
            
        );
            
        foreach ($karirs as $karir)
        {
            Karir::create($karir);
        }
        
        Model::reguard();
    }
}
