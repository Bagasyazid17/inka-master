<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('product')->delete();

        $products = array(
            ['category_product_id' => 1,
            'bahasa' => 'id',
            'nama' => 'KERETA  EKONOMI AC (K3 AC)',
            'content' => '<div class="row section"><div class="col-sm-12"><div class="type"><div class="text-wrapper cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" id="editor1" spellcheck="false" style="position: relative;" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_59" data-gramm_id="1f4b9358-a4d4-e751-d3f2-28bf99c9179f" data-gramm="true" data-gramm_editor="true" contenteditable="false"><p><img class="alignnone size-full wp-image-935" alt="K3 AC" src="http://www.inka.co.id/wp-content/uploads/2013/12/K3-AC1.jpg" data-cke-saved-src="http://www.inka.co.id/wp-content/uploads/2013/12/K3-AC1.jpg" style="width: 448px; height: 298px;"><br></p><p><span style="text-decoration: underline;">DATA TEKNIS</span></p><table cellspacing="0" cellpadding="0" border="0"><tbody><tr><td width="169" valign="top">Tahun pembuatan</td><td width="19" valign="top">:</td><td width="294" valign="top">2010</td></tr><tr><td width="169" valign="top">Kecepatan maksimum</td><td width="19" valign="top">:</td><td width="294" valign="top">100 km / jam</td></tr><tr><td width="169" valign="top">Lebar sepur</td><td width="19" valign="top">:</td><td width="294" valign="top">1.067 mm</td></tr><tr><td width="169" valign="top">Beban gandar</td><td width="19" valign="top">:</td><td width="294" valign="top">14 ton</td></tr><tr><td width="169" valign="top">Panjang kereta</td><td width="19" valign="top">:</td><td width="294" valign="top">&nbsp;20.920 mm</td></tr><tr><td width="169" valign="top">Lebar kereta</td><td width="19" valign="top">:</td><td width="294" valign="top">2.990 mm</td></tr><tr><td width="169" valign="top">Tinggi kereta</td><td width="19" valign="top">:</td><td width="294" valign="top">3810 mm</td></tr><tr><td width="169" valign="top">Jarak antar pusat bogie</td><td width="19" valign="top">:</td><td width="294" valign="top">14.000 mm</td></tr><tr><td width="169" valign="top">Berat kosong</td><td width="19" valign="top">:</td><td width="294" valign="top">33 ton</td></tr><tr><td width="169" valign="top">Badan kereta</td><td width="19" valign="top">:</td><td width="294" valign="top">Monocoque, Mild steel</td></tr><tr><td width="169" valign="top">Bogie</td><td width="19" valign="top">:</td><td width="294" valign="top">TB-398</td></tr><tr><td width="169" valign="top">Sistem pengereman</td><td width="19" valign="top">:</td><td width="294" valign="top">UIC 540, Air Brake</td></tr><tr><td width="169" valign="top">Alat perangkai</td><td width="19" valign="top">:</td><td width="294" valign="top">Automatic coupler AAR NO. 10A Contour.</td></tr><tr><td width="169" valign="top">Sistem listrik</td><td width="19" valign="top">:</td><td width="294" valign="top">380VAC, 3 phase, 50Hz, LBS</td></tr></tbody></table><p><b><span style="text-decoration: underline;">&nbsp;</span></b><br></p></div></div></div></div>',
            'content_index' => 2,
            'is_catalogue' => 0],

            ['category_product_id' => null,
            'bahasa' => 'id',
            'nama' => 'BOGIE TB398',
            'content' => '<div class="row section"><div class="col-sm-12"><div class="type"><div class="text-wrapper cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" id="editor1" spellcheck="false" style="position: relative;" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_59" data-gramm_id="7c185216-127d-9764-6743-beb3d09bdc44" data-gramm="true" data-gramm_editor="true" contenteditable="false"><p><b>BOGIE TB398</b><b> </b><br></p><p><img alt="Bogie TB 398" src="http://www.inka.co.id/wp-content/uploads/2013/12/Bogie-TB-398.jpg" data-cke-saved-src="http://www.inka.co.id/wp-content/uploads/2013/12/Bogie-TB-398.jpg" style="width: 407px; height: 336px;"><br></p><p><b>DATA TEKNIS</b></p><tr><td width="223" valign="top">Lebar sepur</td><td width="19" valign="top">:</td><td width="179" valign="top">1,067 mm</td></tr><tr><td width="223" valign="top">Jarak antar pusat roda</td><td width="19" valign="top">:</td><td width="179" valign="top">2.200 mm</td></tr><tr><td width="223" valign="top">Diameter Roda</td><td width="19" valign="top">:</td><td width="179" valign="top">774 mm</td></tr><tr><td width="223" valign="top">Jarak antara tumpuan samping</td><td width="19" valign="top">:</td><td width="179" valign="top">1.980 mm</td></tr><tr><td width="223" valign="top">Berat Bogie Maxs</td><td width="19" valign="top">:</td><td width="179" valign="top">4.700 kg</td></tr><tr><td width="223" valign="top">Beban gandar maxs</td><td width="19" valign="top">:</td><td width="179" valign="top">14 ton</td></tr><tr><td width="223" valign="top">Kecepatan maks.</td><td width="19" valign="top">:</td><td width="179" valign="top">100 km/jam</td></tr><td width="223" valign="top">Sistem rem</td><td width="19" valign="top">:</td><td width="179" valign="top">UIC 540, air brake<br></td></div></div></div></div>',
            'content_index' => 2,
            'is_catalogue' => 1],
        );
            
        foreach ($products as $product)
        {
            Product::create($product);
        }
        
        Model::reguard();
    }
}
