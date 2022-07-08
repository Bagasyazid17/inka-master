<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\Corporation;

class CorporationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('corporation')->delete();

        $corporations = array(
            ['corporation_id' => null,
            'nama' => 'From CEO Desk',
            'has_sub' => 0,
            'bahasa' => 'id',
            'content' => '<div class="row section"><div class="col-sm-12"><div class="type"><div class="text-wrapper cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" id="editor1" spellcheck="false" style="position: relative;" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_59" data-gramm_id="66f22a70-3171-5222-0a91-ec9a119d2f6a" data-gramm="true" data-gramm_editor="true" contenteditable="false"><p><img class=" wp-image-923 alignleft" src="http://www.inka.co.id/wp-content/uploads/2013/12/Agus111-246x300.jpg" alt="Agus11" data-cke-saved-src="http://www.inka.co.id/wp-content/uploads/2013/12/Agus111-246x300.jpg" style="float: left; width: 139px; height: 189px; margin: 5px 10px;"><br></p><p>Puji syukur kita panjatkan kehadirat Allah SWT yang telah memberikan Rahmat dan Karunia Nya kepada kita semua.<br></p><p>Di tahun baru 2017 ini PT INKA (Persero) membawa tema baru “Menjadi Pabrik Kelas Dunia di Tahun 2017” dan “Menuju Pabrik Bebas Debu Dengan Menerapkan 5R (Ringkas, Rapi, Resik, Rawat, Rajin)”. PT INKA (Persero) sendiri mempunyai jargon untuk mewujudkan kebersihan di lingkungan kantor dan <em>workshop</em>, dimana hal tersebut untuk memotivasi seluruh karyawan PT INKA (Persero) agar menjaga kebersihan lingkungan kerja.<br></p><p>Di penghujung tahun 2016 PT INKA (Persero) sudah menerima pencairan dana Penyertaan Modal Negara (PMN). Pembangunan pabrik baru, revitalisasi mesin-mesin lama di <em>workshop</em>, dan revitalisasi bangunan lama menjadi rencana dalam pengelolaan dana tersebut.</p><p>PT INKA (Persero) juga mendapatkan kepercayaan dari pemerintah untuk menjadi besar, untuk menguasai pasar perkeretaapian di Asia Tenggara, Asia Selatan, Asia Tengah dan Afrika.</p><p>Tahun 2017 ini total hampir 450 kereta yang terdiri dari KRL, KRDE, K1, dan K3 harus diselesaikan PT INKA (Persero), maka di tahun 2017 ini tetap jaga tumbuhkan kekompakan, nilai religius serta jangan sombong untuk menuju kemakmuran perusahaan selamanya.</p><p>Tahun 2017 harus lebih baik dari tahun kemarin, harus melakukan <em>improvement</em>membawa perusahaan yang lebih baik dan lebih efisien, menciptakan perusahaan yang makmur serta membangun pabrik kelas dunia dengan INKA bebas debu.<br></p></div></div></div></div>',
            'content_index' => 2,
            'published_at' => null],

            ['corporation_id' => null,
            'nama' => 'Company Profile',
            'has_sub' => 0,
            'bahasa' => 'id',
            'content' => '<div class="row section"><div class="col-sm-12"><div class="type"><div class="text-wrapper cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" id="editor1" spellcheck="false" style="position: relative;" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_59" data-gramm_id="bbc0281b-2ec0-683f-e1fb-6dd6160bafd0" data-gramm="true" data-gramm_editor="true" contenteditable="false"><p style="text-align: justify;"><em><strong></strong></em><img class="aligncenter size-full wp-image-596" src="http://inka.co.id/wp-content/uploads/2013/12/CP.png" alt="CP" data-cke-saved-src="http://inka.co.id/wp-content/uploads/2013/12/CP.png" style="width: 960px; height: 393px;"><br></p><p style="text-align: justify;"><em><strong>WHO WE ARE</strong> </em><br></p><p style="text-align: justify;"><g class="gr_ gr_41 gr-alert gr_gramm gr_inline_cards gr_run_anim Grammar multiReplace" id="41" data-gr-id="41">Established in</g> May <g class="gr_ gr_42 gr-alert gr_gramm gr_inline_cards gr_run_anim Punctuation only-ins replaceWithoutSep" id="42" data-gr-id="42">18th</g> 1981, INKA is the first fully integrated rolling stock and automotive manufacturer in Southeast Asia.&nbsp; Our focus is to deliver <g class="gr_ gr_43 gr-alert gr_spell gr_inline_cards gr_run_anim ContextualSpelling multiReplace" id="43" data-gr-id="43">high quality</g> products and services to our customer.We provide <g class="gr_ gr_40 gr-alert gr_gramm gr_inline_cards gr_run_anim Grammar only-ins doubleReplace replaceWithoutSep" id="40" data-gr-id="40">wide</g> array of products to meet our customer diverse requirements, as well as excellent after sales services to ensure our customer received the best transportation solution. Our <g class="gr_ gr_30 gr-alert gr_spell gr_inline_cards gr_run_anim ContextualSpelling ins-del multiReplace" id="30" data-gr-id="30">proudcts</g> have spread and operated in many countries in the world, such as Bangladesh, <g class="gr_ gr_31 gr-alert gr_spell gr_inline_cards gr_run_anim ContextualSpelling ins-del multiReplace" id="31" data-gr-id="31">Philiphines</g>, Malaysia, Thailand, Singapore and&nbsp; Australia.</p><p style="text-align: justify;"><em><strong>VISION</strong> </em></p><p style="text-align: justify;">To be a world class company in railways and urban transportation in Indonesia</p><p style="text-align: justify;"><em><strong>MISSION</strong></em></p><p style="text-align: justify;">Create an integrated solution for railway and urban transportation with competitive advantages in business and the appropriate of product technology to encourage the development of sustainable transport.</p><p style="text-align: justify;">see our&nbsp; <a style="font-size: 14px;" href="https://youtu.be/M26NPW4Unek">INKA COMPANY PROFILE VIDEO</a><span style="padding: 0; margin: 0; margin-left: 5px;"></span></p><p style="text-align: justify;"><a href="http://www.inka.co.id/wp-content/uploads/2013/12/COMPROF.ppt" rel="">COMPROF</a><br></p></div></div></div></div>',
            'content_index' => 2,
            'published_at' => null],

            ['corporation_id' => null,
            'nama' => 'Organization',
            'has_sub' => 1,
            'bahasa' => 'id',
            'content' => null,
            'content_index' => 2,
            'published_at' => null],
            
            ['corporation_id' => 3,
            'nama' => 'Board of Commisioners',
            'has_sub' => 2,
            'bahasa' => 'id',
            'content' => '<div class="row section"><div class="col-sm-12"><div class="type"><div class="text-wrapper cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" id="editor3" spellcheck="false" style="position: relative;" role="textbox" aria-label="Rich Text Editor, editor3" title="Rich Text Editor, editor3" aria-describedby="cke_1187" data-gramm_id="85232ce4-766a-59a2-97c0-fb0ed3102c67" data-gramm="true" data-gramm_editor="true" contenteditable="false"><td style="background-color: #696969; width: 815px; height: 24px;"><span style="color: #ffffff;">Dr. HARRIS MUNANDAR N, M. A.</span><br></td><tr style="height: 24px;"><td style="width: 815px; height: 24px;">Menjabat sebagai Komisaris Utama PT INKA (Persero) mulai Oktober 2017, beliau saat ini juga menjabat sebagai Sekretaris Jenderal Kementerian Perindustrian. Lahir di Lampung tahun 1959, Meraih Sarjana Administrasi Negara tahun 1989 di STIA LAN RI, Magister Graduate School of International Development Studies tahun 1996 di Nagoya University dan Doktoral Ph.D bidang International Cooperation Studies tahun 2000 dari Nagoya University.<br></td></tr></div><grammarly-btn><div style="z-index: 2; transform: translate(963px, 49.3px);" class="_1BN1N Kzi1t MoE_1 _2DJZN"><div class="_1HjH7"><div title="Protected by Grammarly" class="_3qe6h">&nbsp;</div></div></div></grammarly-btn></div></div></div><div class="row section"><div class="col-sm-12"><div class="type"><div class="text-wrapper cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" id="editor2" spellcheck="false" style="position: relative;" role="textbox" aria-label="Rich Text Editor, editor2" title="Rich Text Editor, editor2" aria-describedby="cke_166" data-gramm_id="e1eeba4d-37ac-4536-832a-1a9afe8335d2" data-gramm="true" data-gramm_editor="true" contenteditable="false"><tr><td style="background-color: #696969; width: 986px;"><span style="color: #ffffff;">Ir. BRAHMANTIO ISDIJOSO, M. S.</span><br></td></tr><td style="width: 986px;">Menjabat sebagai Komisaris PT INKA (Persero) mulai Oktober 2017, saat ini beliau juga sedang menjabat sebagai Direktur Pengelolaan Risiko Keuangan Negara Kementerian Keuangan sejak tanggal 2 April 2015 dimana sebelumnya pernah menjabat sebagai Kepala Bidang Pengelolaan Risiko Fiskal. Lahir di Malang tahun 1965, beliau mendapatkan gelar Master Degree in Agriculture Economics dari Institut Pertanian Bogor pada tahun 1990.<br></td></div><grammarly-btn><div style="z-index: 2; transform: translate(963px, 49.3px);" class="_1BN1N Kzi1t MoE_1 _2DJZN"><div class="_1HjH7"><div title="Protected by Grammarly" class="_3qe6h">&nbsp;</div></div></div></grammarly-btn></div></div></div><div class="row section"><div class="col-sm-12"><div class="type"><div class="text-wrapper cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" id="editor4" spellcheck="false" style="position: relative;" role="textbox" aria-label="Rich Text Editor, editor4" title="Rich Text Editor, editor4" aria-describedby="cke_1363" data-gramm_id="b209fdd4-c446-5e17-8b97-99c88a6c2bab" data-gramm="true" data-gramm_editor="true" contenteditable="false"><p><tr><td style="width: 986px;"><br></td></tr><tr><td style="background-color: #696969; width: 986px;"><span style="color: #ffffff;">Dr. Ir. SAFRI BURHANUDIN, DEA.</span><br></td></tr><td style="width: 986px;">Menjabat sebagai Komisaris PT INKA (Persero) mulai Oktober 2017, beliau juga aktif sebagai Deputi IV Bidang Koordinasi SDM, IPTEK dan Budaya Maritim Kementerian Koordinator Bidang Kemaritiman Republik Indonesia. Lahir di Ujung Pandang tahun 1961, beliau mendapatkan gelar sarjana Bidang Studi Geologi di Universitas Pajajaran lalu dilanjutkan di Universite de Bretagne Occidentale, Prancis pada Bidang Studi Marine Geology tamat pada tahun 1994.<br></td></p></div></div></div></div>',
            'content_index' => 5,
            'published_at' => null],
            
            ['corporation_id' => 3,
            'nama' => 'Board of Directors',
            'has_sub' => 2,
            'bahasa' => 'id',
            'content' => '<div class="row section"><div class="col-sm-12"><div class="type"><div class="text-wrapper cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" id="editor1" spellcheck="false" style="position: relative;" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_59" data-gramm_id="40c2de7d-dc31-f1f4-b320-9312d2e8abbb" data-gramm="true" data-gramm_editor="true" contenteditable="false"><td style="background-color: #696969; width: 986.8px;"><span style="color: #ffffff;">MOHAMAD NUR SODIQ, Ak, M.Si</span></td><tr><td style="width: 986.8px;"><img class="alignleft size-thumbnail wp-image-6036" src="http://www.inka.co.id/wp-content/uploads/2013/12/Alt-1-Direku-SDM-150x150.jpg" alt="" data-cke-saved-src="http://www.inka.co.id/wp-content/uploads/2013/12/Alt-1-Direku-SDM-150x150.jpg" style="width: 150px; height: 150px; float: left; margin: 5px 10px;">Menjabat sebagai Direktur SDM dan Keuangan sejak Agustus 2013. Mengawali karir sebagai Auditor di Badan Pengawasan Keuangan dan Pembangunan (BPKP) dan di beberapa BUMN. Lahir di Magetan tahun 1973 dan menyelesaikan pendidikan Magister Akuntansi dan Akuntan dari STAN.<br></td></tr><p style="text-align: justify;"><span style="font-size: 14px;">&nbsp;</span><br></p></div></div></div></div>',
            'content_index' => 2,
            'published_at' => null],

            ['corporation_id' => 3,
            'nama' => 'Company Profile',
            'has_sub' => 2,
            'bahasa' => 'id',
            'content' => '<div class="row section"><div class="col-sm-12"><div class="type"><div class="text-wrapper cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" id="editor1" spellcheck="false" style="position: relative;" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_59" data-gramm_id="369535fc-6d3a-58df-5fdd-438ee764cf9e" data-gramm="true" data-gramm_editor="true" contenteditable="false"><p style="text-align: justify;"><span style="font-size: 14px;">Struktur organisasi PT. INKA (Persero) disusun sesuai dengan visi dan misi perusahaan yang diemban dengan sasaran jangka panjang untuk dapat diakui sebagai perusahaan kelas dunia yang unggul di Indonesia.</span><br></p><p style="text-align: justify;"><span style="font-size: 14px;">Untuk itu struktur organisasi yang efektif dan efisien diterapkan dengan tujuan agar seluruh bagian yang ada di dalam perusahaan mampu bekerja secara maksimal untuk mencapai tujuan perusahaan.</span></p><p style="text-align: justify;"><a href="http://www.inka.co.id/wp-content/uploads/2013/12/STO-Terbaru-Sep-2017-alt-2-1.jpg" data-cke-saved-href="http://www.inka.co.id/wp-content/uploads/2013/12/STO-Terbaru-Sep-2017-alt-2-1.jpg"><img class="alignleft wp-image-6039 size-full" src="http://www.inka.co.id/wp-content/uploads/2013/12/STO-Terbaru-Sep-2017-alt-2-1.jpg" alt="" data-cke-saved-src="http://www.inka.co.id/wp-content/uploads/2013/12/STO-Terbaru-Sep-2017-alt-2-1.jpg" style="width: 1024px; height: 439px;"></a><br></p></div></div></div></div>',
            'content_index' => 2,
            'published_at' => null],
        );
            
        foreach ($corporations as $corporation)
        {
            Corporation::create($corporation);
        }
        
        Model::reguard();
    }
}
