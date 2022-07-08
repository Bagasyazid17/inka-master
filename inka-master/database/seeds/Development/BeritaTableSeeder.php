<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\Berita;

class BeritaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('berita')->delete();

        $beritas = array(
            ['judul' => 'Motivasi Hidup Sehat dan Semangat Kerja Menteri BUMN Rini Soemarno',
            'content' => '<div class="row section"><div class="col-sm-12"><div class="type"><div class="text-wrapper cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" id="editor1" spellcheck="false" style="position: relative;" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_59" data-gramm_id="fb5506f6-f60e-076d-4d09-14917765de2d" data-gramm="true" data-gramm_editor="true" contenteditable="false"><div id="attachment_6147" style="width: 310px" class="wp-caption alignleft"><img class="size-medium wp-image-6147" src="http://www.inka.co.id/wp-content/uploads/2017/11/IMG_2030-300x200.jpg" alt="" data-cke-saved-src="http://www.inka.co.id/wp-content/uploads/2017/11/IMG_2030-300x200.jpg" style="width: 300px; height: 200px; float: left;"><p class="wp-caption-text">Menteri BUMN, Rini Soemarno saat menyempatkan mengunjungi PT INKA (Persero) (7/11). (foto: INKA)</p></div>
<p>Sehari sebelum kunjungan kerja Presiden RI Bapak Ir. Joko widodo, 
pada hari ini (6/11/2017), di Madiun, dalam rangka kegiatan Perhutanan 
Sosial serta penyerahan sertifikat kepada masyarakat, Menteri BUMN RI 
Ibu Rini Soemarno hadir lebih dulu untuk memastikan kesiapan acara 
tersebut.</p>
<p>Dalam kesempatan tersebut, tepatnya hari Minggu (5/11/2017) pukul 
21:00, di ujung kesibukanya dalam menjalankan tugas negara, Ibu Rini 
juga masih berkenan menemui para tokoh perwakilan petani Jawa Timur 
bagian barat yaitu Madiun dan sekitarnya.<br></p>
<p>Dengan sabar Menteri BUMN mendengarkan keluhan para perwakilan petani
 tersebut. Keluhan yang disampaikan diantaranya adalah menyangkut 
masalah kredit modal kerja petani, pupuk serta masalah tata niaga produk
 pangan diantaranya gula.</p>
<p>Terkait masalah kredit dan pupuk, Menteri BUMN langsung merespon 
dengan cepat serta langsung meminta Direksi PT Pupuk Indonesia, melalui 
Bapak Wahyu Kuncoro Deputi Agro Kementran BUMN dan Bapak Imam Aprianto 
Putro Sesmen Kementrian BUMN untuk segera menyelesaikan persoalan sistem
 distribusi dan pembelian pupuk subsidi dan non subsidi.</p>
<p>Terkait masalah kredit, Ibu Rini Soemarno langsung menghadirkan Ibu 
Yessy Kurnia Pemimpin Wilayah BNI Malang dan disepakati bahwa khusus 
petani tebu yang menggunakan kridit komersial agar dipermudah dengan 
sistem Avalis. Begitu pula Direksi BUMN Perkebunan Gula diminta untuk 
menjadi avalis petani dengan tetap mengedepankan asas kehatihatian dan 
tidak melanggar aturan.</p>
<p>Keesokan harinya setelah sholat subuh Senin di pagi buta pukul 04:30,
 Ibu Rini melakukan kunjungan Kerja Ke PT INKA dengan jalan kaki dari 
Hotel Aston dengan jarak tempuh hampir sekitar 5 km. Para Dirut dan 
Direksi BUMN hadir turut serta mendampinginya.</p>
<p>Langkah kaki Ibu Rini yang begitu cepat, kami bersama rombongan 
lainnya berusaha sekuat tenaga untuk bisa mengimbangi rasanya hampir 
tidak bisa. Padahal kami sebenarnya rutin jalan pagi tiap hari.</p>
<p>Sesampainya di Lokasi PT INKA Ibu Rini Menteri BUMN langsung meninjau
 PT INKA sambil menyapa karyawan dan karyawati yang kegiatan operasi 
kerjanya 24 jam di bagi 3 sift. PT INKA adalah Perusahaan BUMN yang saat
 ini memproduksi gerbong kereta api dan lokomotif kereta api.</p>
<p>Setelah melakukan Peninjauan Di Pabrik INKA dilanjutkan makan nasi 
pecel di warung kaki lima. Di sela-sela makan pagi nasi Pecel di pinggir
 jalan warung Kaki lima tersebut kami sempatkan bertanya kepada ibu Rini
 Soemarno Tentang kiat Hidup sehat di tengah2 kesibukanya dalam 
Mengemban Tugas Negara beliau menjawab di Antaranya Adalah :</p>
<p>IHKTIAR DENGAN BENAR DAN IKHLAS SERTA SELALU BERSYUKUR</p>
<p>SEMOGA KITA SEMUA SELALU DI RAHMATI ALLAH. Aamin</p>
<p><a href="http://www.bumntoday.com/read/2017/11/06/3693/Motivasi_Hidup_Sehat_dan_Semangat_Kerja_Menteri_BUMN_Rini_Soemarno">Sumber</a><br></p></div></div></div></div>',
            'content_index' => '2',
            'thumbnail' => '/images/berita/20171127-050116-MotivasiHidupSehatdanSemangatKerjaMenteriBUMNRiniSoemarno.jpg',
            'status' => 0],

            ['judul' => 'Wawancara Esklusif – Rini Soemarno Menjawab',
            'content' => '<div class="row section"><div class="col-sm-12"><div class="type"><div class="center"><div class="video-wrapper"><iframe src="https://www.youtube.com/embed/66AXfo2D1tY" allowfullscreen="" frameborder="0"></iframe></div></div></div></div></div>',
            'content_index' => '1',
            'thumbnail' => '/images/berita/20171127-050338-WawancaraEsklusifRiniSoemarnoMenjawab.png',
            'status' => 0],
            
            ['judul' => 'Penyerahan SK Dewan Komisaris PT INKA',
            'content' => '<div class="row section"><div class="col-sm-12"><div class="type"><div class="text-wrapper cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" id="editor1" spellcheck="false" style="position: relative;" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_59" data-gramm_id="5f5ebdf6-ba98-20fa-9b8f-7694f5f3b1d3" data-gramm="true" data-gramm_editor="true" contenteditable="false">



                <div class="post-entry">
                    <p><img class="size-medium wp-image-6078 alignleft" src="http://www.inka.co.id/wp-content/uploads/2017/10/59e4365f6a40d-300x225.jpg" alt="" data-cke-saved-src="http://www.inka.co.id/wp-content/uploads/2017/10/59e4365f6a40d-300x225.jpg" style="float: left; width: 300px; height: 225px;">Bertempat
 di lantai 6 Kantor Kementerian BUMN, Jalan Medan Merdeka Selatan No 13 
Jakarta Pusat, dilaksanakan penyerahan Salinan Keputusan Menteri Badan 
Usaha Milik Negara Selaku Rapat Umum Pemegang Saham Perusahaan Perseroan
 (Persero) PT Industri Kereta Api Nomor : SK-222/MBU/10/2017 tentang 
Pemberhentian dan Pengangkatan Anggota-Anggota Dewan Komisaris 
Perusahaan Perseroan (Persero) PT Industri Kereta Api.<br></p>
<p>Acara dibuka oleh Asisten Deputi Bidang Usaha Jasa Keuangan, Jasa 
Survei dan Konsultan II Kementerian BUMN Wien Irwanto pukul 09.30 WIB, 
dihadiri oleh Direksi dan Komisaris PT Industri Kereta Api beserta 
Pejabat dan Pegawai Kementerian BUMN.<br></p>
<p>Melalui penyerahan Salinan Keputusan ini, Menteri BUMN Rini M 
Soemarno Selaku Rapat Umum Pemegang Saham Perusahaan Perseroan (Persero)
 PT Industri Kereta Api, mengukuhkan pemberhentian dengan hormat Sdr. M.
 Maksum Machfoedz dan Sdr. Bambang Prihartono sebagai Komisaris yang 
masing-masing diangkat berdasarkan Keputusan Menteri BUMN Nomor: 
SK-176/MBU/2012 tanggal 26 April 2012 jo Nomor: SK-77/MBU/2013 tanggal 4
 Februari 2013, dan Nomor: SK-152/MBU/2012 tanggal 29 Maret 2012 jo 
Nomor: SK-89/MBU/2013 tanggal 4 Februari 2013 terhitung sejak tanggal 26
 April 2017 dan tanggal 26 Maret 2017, dengan ucapan terima kasih atas 
segala sumbangan tenaga dan pikirannya selama memangku jabatan tersebut.</p>
<p>Dalam Salinan Keputusan yang sama, Menteri BUMN memberhentikan dengan
 hormat Sdr. Slamet Seno Adji sebagai Komisaris Utama dan Sdr. Taufik 
Hidayat sebagai Komisaris yang masing-masing diangkat berdasarkan 
Keputusan Menteri BUMN Nomor: SK-59/MBU/2014 tanggal 24 Maret 2014 dan 
Nomor: SK-425/MBU/2012 tanggal 26 November 2012, dengan ucapan terima 
kasih atas segala sumbangan tenaga dan pikirannya selama memangku 
jabatan tersebut serta mengangkat nama-nama dibawah ini sebagai anggota 
Dewan Komisaris Perusahaan Perseroan (Persero) PT Industri Kereta Api:<br>
1. Sdr. Haris Munandar N. sebagai Komisaris Utama;<br>
2. Sdr. Brahmantio Isdijoso sebagai Komisaris;<br>
3. Sdr. Safri Burhanuddin sebagai Komisaris.</p>
<p>“Dengan background pengalaman yang berbeda diharapkan dapat 
memperkuat jajaran Dewan Komisaris PT INKA serta mendukung kemajuan INKA
 di pasar nasional dan internasional. Selanjutnya diharapkan Dewan 
Komisaris dapat menjaga kekompakan dan bekerjasama dengan Direksi untuk 
dapat membawa INKA lebih baik lagi terutama dari kualitas produk dan SDM
 perusahaan”, tutup Wien.</p>
<p><a href="http://bumn.go.id/berita/1-Penyerahan-SK-Dewan-Komisaris-PT-INKA-">Sumber</a></p>

                    
                                    </div></div></div></div></div>',
            'content_index' => '2',
            'thumbnail' => '/images/berita/20171127-050447-PenyerahanSKDewanKomisarisPTINKA.jpg',
            'status' => 0],
            
            ['judul' => 'Kegiatan Rutin Donor Darah INKA',
            'content' => '<div class="row section"><div class="col-sm-12"><div class="type"><div class="text-wrapper cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" id="editor1" spellcheck="false" style="position: relative;" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_59" data-gramm_id="f098f8d3-6a17-f2d9-3aa5-a5d9bb9184f2" data-gramm="true" data-gramm_editor="true" contenteditable="false"><div class="post-entry">
                    <div id="attachment_6206" style="width: 310px" class="wp-caption alignleft"><img class="wp-image-6206 size-medium" src="http://www.inka.co.id/wp-content/uploads/2017/11/IMG_4465-300x200.jpg" alt="" data-cke-saved-src="http://www.inka.co.id/wp-content/uploads/2017/11/IMG_4465-300x200.jpg" style="float: left; width: 300px; height: 200px;"><p class="wp-caption-text">Suasana donor darah PT INKA (Persero) pagi tadi (22/11)</p></div>
<p>Pada hari Selasa (22/11/2017) PT INKA (Persero) kembali mengadakan 
acara donor darah yang ditujukan untuk seluruh karyawan. Acara ini 
merupakan salah satu program dari Divisi Human Capital Bagian 
Kesejahteraan PT INKA yang dilakukan 3 bulan sekali di PT INKA (Persero)
 dan merupakan kerjasama dengan PMI Kota Madiun serta Kabupaten Madiun.</p>
<p>“Tidak hanya karyawan INKA saja yang sebenarnya bisa mengikuti event 
ini, namun apabila dari anak perusahaan seperti IMS yang ingin 
berkontribusi juga, dengan senang hati tetap kami persilahkan” tutur 
Diah selaku panitia kegiatan donor darah di PT INKA (Persero).</p>
<p>Untuk dapat ikut dalam kegiatan donor darah PMI Kabupaten Madiun 
memiliki kriteria berat badan minimal 50 kg, umur di atas 17 tahun, 
untuk wanita yang sedang menstruasi, hamil dan menyusui tidak 
diperbolehkan untuk mengikuti kegiatan donor darah, selain itu untuk 
pegawai yang sedang sakit dan sedang mengkonsumsi obat tidak 
diperbolehkan mengikuti donor darah. Sebelum diambil darah pihak PMI 
juga harus mengecek kesehatan setiap karyawan/karyawati seperti tensi, 
hemoglobin, dan golongan darah.</p>
<p>“Kami akan mengecek dulu tensi atas bawah, Hb (hemoglobin, red.), 
apabila sesuai maka setelah itu baru proses pengambilan darah,” tutur 
Andrian Yudi selaku salah satu anggota PMI Kabupaten Madiun. Setelah 
proses pengambilan darah tersebut maka pihak PMI akan memeriksa 
kesehatan darah tersebut di laboratorium PMI untuk mencegah penularan 
penyakit melalui darah seperti HIV, sifilis, dan penyakit lainnya. 
“Apabila nantinya ternyata ada yang memiliki penyakit tersebut, maka 
sesuai prosedur SOP kami akan langsung sharing ke orangnya masing-masing
 via surat,” terang Andrian.</p>
<p>Karyawan/karyawati menyambut baik terkait adanya acara donor darah 
ini. Hal tersebut dibuktikan dengan banyaknya pegawai INKA yang 
mengikuti acara tersebut. Total pegawai yang hadir adalah sejumlah 156 
orang dengan total pegawai yang bisa diambil darahnya sebanyak 130 
pegawai dan 26 pegawai dinyatakan gagal dikarenakan tensi darah yang 
terlalu rendah/tinggi dan Hb yang tidak sesuai. Banyak pegawai yang 
memang sudah berkali-kali melakukan donor darah melalui event dari PT 
INKA seperti salah satu pegawai PT INKA yang mendonorkan darahnya, 
Supriyono. “Saya sudah 8 kali mengikuti donor darah dan saya merasa 
tambah sehat,” tuturnya.</p>
<p>Tidak sedikit juga pegawai yang baru pertama kali mencoba donor darah
 dan berhasil. Untuk pegawai yang baru mulai mendonorkan darahnya akan 
diberikan kartu donor darah, “Kami menyediakan kartu donor darah untuk 
pegawai yang memang belum pernah melakukan donor darah,” terang Andrian.</p>
<p>Kegiatan donor darah ini nyatanya memang sengaja diselenggarakan 
untuk pegawai INKA, seperti yang diungkapkan oleh Kurniasih selaku 
Manajer Kesejahteraan PT INKA (Persero), “Kegiatan ini diselenggarakan 
di PT INKA guna untuk mempermudah bagi karyawan/karyawati INKA yang 
ingin mendonorkan darahnya,” ungkapnya.</p>
<p>Semoga untuk kedepannya akan semakin banyak insan INKA yang 
berpatisipasi dalam kegiatan positif ini. Untuk manfaatnya sendiri yang 
akan didapatkan ketika rutin menyumbangkan darah yaitu dapat mengurangi 
penyakit jantung, membakar kalori, menurunkan risiko kanker, 
meningkatkan produksi darah, pikiran lebih stabil, menurunkan 
kolesterol, serta selain kita dapat membantu sesama dengan darah kita 
sekaligus merupakan bagian dari pemeriksaan kesehatan. Maka dari itu, 
yuk kita mendonorkan darah kita untuk sesama dan diri kita sendiri!</p>

                    
                                    </div></div></div></div></div>',
            'content_index' => '2',
            'thumbnail' => '/images/berita/20171127-050557-KegiatanRutinDonorDarahINKA.jpg',
            'status' => 0],
            
            ['judul' => 'INKA Dukung Perkembangan UMKM',
            'content' => '<div class="row section"><div class="col-sm-12"><div class="type"><div class="text-wrapper cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" id="editor1" spellcheck="false" style="position: relative;" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_59" data-gramm_id="67c4d813-4274-cfff-5b7e-3185cfdd2d2c" data-gramm="true" data-gramm_editor="true" contenteditable="false">



                <div class="post-entry">
                    <p><img class="size-medium wp-image-6202 alignleft" src="http://www.inka.co.id/wp-content/uploads/2017/11/20171116_203533-300x184.jpg" alt="" data-cke-saved-src="http://www.inka.co.id/wp-content/uploads/2017/11/20171116_203533-300x184.jpg" style="float: left; width: 300px; height: 184px;">Sejalan
 dengan arahan Kementerian BUMN, PT INKA (Persero) kembali mengadakan 
kegiatan pelatihan untuk Mitra Binaan UMKM di Karesidenan Madiun. Acara 
yang bertajuk Pelatihan Pemasaran Produk Mitra Binaan PT INKA (Persero) 
melalui Blanja.com tersebut diselenggarakan tanggal 15 dan 16 November 
2017 di Tawangmangu, Magetan diikuti oleh 42 orang pengusaha UMKM. Dalam
 pelaksanaannya PT INKA (Persero) bekerjasama dalam sinergi BUMN dengan 
Telkom Madiun.<br></p>
<p>Senior Manager Humas, Sekretariat &amp; PKBL PT INKA (Persero), Bp. 
Cholik Mochamad Zamzam mengungkapkan bahwa pelatihan pemasaran kali ini 
PT INKA (Persero) sebagai perusahaan BUMN tidak hanya memberikan modal 
kerja ke mitra binaan saja tetapi juga memberikan pembelajaran bagaimana
 memasarkan produk melalui bisnis online, sehingga pangsa pasarnya 
terbuka dan sangat luas diharapkan usahanya dapat berjalan dan 
berkembang dengan baik.</p>
<p>Pelatihan pemasaran yang diselenggarakan selama 2 hari ini diisi 
dengan sesi materi, sesi tanya jawab &amp; games, dengan harapan seluruh
 peserta dapat mengikuti rangkaian pelatihan dan diharapkan dapat 
mengaplikasikan langsung untuk pemasaran produknya.</p>
<p>Salah satu peserta, Ibu Heny pemilik usaha D’39 Collection 
menyampaikan terimakasih kepada PT INKA (Persero) atas diadakannya 
pelatihan pemasaran ini, semoga produk pakaian lukis dan bordirnya dapat
 merambah pasar luar negeri dengan bisnis online ini.</p>

                    
                                    </div></div></div></div></div>',
            'content_index' => '2',
            'thumbnail' => '/images/berita/20171127-050646-INKADukungPerkembanganUMKM.jpg',
            'status' => 0],
            
            ['judul' => 'INKA Produksi 150 Kereta Penumpang Untuk Bangladesh',
            'content' => '<div class="row section"><div class="col-sm-12"><div class="type"><div class="text-wrapper cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus" id="editor1" spellcheck="false" style="position: relative;" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_59" data-gramm_id="ee252d05-d3a1-63b3-d64f-754454305f3a" data-gramm="true" data-gramm_editor="true" contenteditable="false"><div id="attachment_3900" style="width: 310px" class="wp-caption alignleft"><img class="size-medium wp-image-3900" src="http://www.inka.co.id/wp-content/uploads/2015/12/DSC_3898-300x200.jpg" alt="Proses Pengerjaan Kereta utnuk Bangladesh Railway di Workshop PT INKA (Persero)" data-cke-saved-src="http://www.inka.co.id/wp-content/uploads/2015/12/DSC_3898-300x200.jpg" style="width: 300px; height: 200px; margin: 10px; float: left;"><p class="wp-caption-text">Proses Pengerjaan Kereta utnuk Bangladesh Railway di Workshop PT INKA (Persero)</p></div>
<p>PT INKA (Persero) memenangkan tender pengadaan 100 kereta penumpang <em>Meter Gauge</em> (MG) dan 50 kereta penumpang <em>Broad Gauge</em> (BG) untuk <em>Bangladesh Railway Company</em>.
 Proyek ini dibiayai oleh Asian Development Bank (ADB). Dengan adanya 
proyek ini, INKA kembali berhasil menembus pasar ekspor dalam memasarkan
 produk kereta unggulan Indonesia.</p>
<p>Kebutuhan yang mendesak akan transportasi kereta di Bangladesh 
melatarbelakangi tender ini. Apalagi, kereta yang ada saat ini telah 
beroperasi lebih dari 30 tahun lamanya. Pemerintah Bangladesh berniat 
untuk memenuhi kebutuhan transportasi bagi masyarakatnya.</p>
<p>Saat ini, perkeretaapian Bangladesh memiliki sebanyak 1182 kereta MG.
 Separuhnya telah beroperasi lebih dari 30 tahun lamanya.&nbsp; Untuk kereta 
BG, ada sebanyak 324 kereta dan separuhnya juga telah beroperasi lebih 
dari 30 tahun.&nbsp; Selain itu, beberapa kereta dinilai tidak laik jalan. 
Parahnya lagi, hanya tersedia 18 kereta yang dilengkapi dengan pendingin
 ruangan.</p>
<p>Daerah operasional terbentang dari barat hingga timur negara 
Bangladesh. Kereta BG akan dioperasikan di area barat dan area timur 
untuk kereta MG.</p>
<p>INKA berhasil memenangkan tender ini setelah berkompetisi dengan 
perusahaan-perusahaan kereta negara lain seperti China (CNR Tangshan and
 CSR Nanjing Puzhen) dan India (RITES INDIA). Berkat kesiapan dan Tim 
yang solid, INKA berhasil membuktikan bahwa industri kereta api milik 
anak bangsa mampu bersaing di dunia internasional.</p>
<p>Tender ini merupakan tender kedua setelah INKA memenangkan tender 
pada tahun 2006 untuk 50 kereta BG. Kereta-kereta yang diekspor ke 
Bangladesh antara lain; kereta tidur/ <em>sleeper carriage</em> (<em>WJC TYPE COACHES</em>), kereta penumpang kelas eksekutif/ <em>executive passenger coach</em> (<em>WJCC TYPE COACHES</em>), kereta makan/ <em>dining car</em> (<em>WECDR TYPE COACHES</em>) dan juga kereta pembangkit/ <em>power car</em> (<em>WPC TYPE COACHES</em>).</p>
<p>PT INKA (Persero) memenangkan tender atas pengerjaan proyek pengadaan
 kereta penumpang sebanyak 100 MG dan 50 BG. PT INKA (Persero) telah 
menyiapkan tender ini selama 22 bulan. Dan, kontrak ditandatangani pada 
akhir November 2014 dan diharapkan pengerjaan proyek selesai pada akhir 
Juli 2016. Kereta yang akan disupply antara lain <em>13 Unit MG Air 
Conditioned&nbsp; Sleeper Carriage –WJC; 24 Unit executive passenger cars (MG
 Air Conditioned&nbsp; Chair Car -WJCC); 36 Unit non-AC economy passenger car
 (MG Shovan Carriage (Chair Car)-WEC); 13 Unit dining car (MG Shovan 
Carriage (Chair Car) with pantry and guard brake-WECDR); 8 Unit Power 
car (MG Composite Power Car-WPC); &nbsp;6 Unit MG First Class Sleeper 
carriage (MG First Class Sleeper – WFC. </em></p>
<p>Sedangkan untuk kereta BG antara lain 4 unit kereta tidur/ <em>&nbsp;sleeper carriage (BG Air Conditioned&nbsp; Sleeper Car – WJC); </em>4 Unit<em>
 first class passenger coach (BG Air Conditioned&nbsp; Chair Car – WJCC); 4 
Unit sleeper carriage (BG First Class Sleeper – WFC); 25 Unit Non 
AC-passenger cars (BG Shovan Chair Car – WEC); 8 Unit dining car (BG 
Shovan Chair Car with pantry and guard brake – WECDR); 5 Unit Power car 
(BG Shovon Carriage (Chair Car) and Power Car – WEPC).</em></p>
<p>Kereta buatan PT INKA (Persero) di atas merupakan kereta yang 
didesain khusus sesuai dengan permintaan pihak Bangladesh Railway.&nbsp; 
Tentu saja, desain yang dibuat mengutamakan kenyamanan dan keamanan bagi
 penggunanya.</p>
<p>Material dan komponen yang digunakan telah dibahas sebelumnya pada 
kontrak dan juga merupakan standard internasional, sebagai contoh:</p>
<ol><li><em>Bangladesh Railway Standard Specifications (BRS)</em></li><li><em>British Standard Specification (BS) </em></li><li><em>Deutsche Industrial Norms (DIN) </em></li><li><em>Japanese Industrial Specifications (JIS)</em></li><li><em>Union Internationale Des Chemins De Fer (UIC)</em><br></li></ol></div></div></div></div>',
            'content_index' => '2',
            'thumbnail' => '/images/berita/20171127-050739-INKAProduksi150KeretaPenumpangUntukBangladesh.jpg',
            'status' => 0],
            
            ['judul' => 'Mengenal Sarana Kereta Kelas Ekonomi di Indonesia',
            'content' => '<div class="row section"><div class="col-sm-12"><div class="type"><div class="text-wrapper cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" id="editor1" spellcheck="false" style="position: relative;" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_59" data-gramm_id="acb2e06e-e3d8-c6ed-8203-07a82e469332" data-gramm="true" data-gramm_editor="true" contenteditable="false"><p style="text-align:justify">Angkutan Penumpang Kereta Api ( KA ) di Indonesia pada dasarnya terbagi dalam 3 kelas yaitu :</p><ol><li style="text-align:justify">Kelas 1 atau Eksekutif</li><li style="text-align:justify">Kelas 2 atau Bisnis</li><li style="text-align:justify">Kelas 3 atau Ekonomi</li></ol><p style="text-align:justify">Kelas Ekonomi merupakan kelas paling rendah dan merupakan mandat pemerintah dalam menyelenggarakan angkutan massal yang murah demi kesejahteraan Rakyat. Pengadaan armada kelas ekonomi atau yang biasa disebut dengan K3 pada awalnya dilakukan oleh pemerintah melalui Departemen / Kementrian Perhubungan dan diserahkan kepada operator yaitu PT. Kereta Api (persero) atau PT KA&nbsp; untuk kemudian di operasikan. Pemerintah kemudian memberikan dana subsidi kepada operator agar tiket yang dikenakan kepada penumpang bisa menjadi lebih murah.</p><p style="text-align:justify">Armada kereta ekonomi K3 biasanya dipakai untuk layanan kereta jarak jauh dan menengah serta kereta api lokal jarak pendek. Pada awalnya kereta ekonomi tidak dilengkapi dengan Air Conditioner ( AC ) sehingga terkenal dengan kereta yang sumpek dan panas. Namun dengan adanya kebijakan baru dari pemerintah melalui Kementrian Perhubungan serta kebijakan internal PT KAI maka setelah tahun 2012 semua armada K3 mulai dilengkapi dengan AC dan juga power socket untuk charging gadget sehingga image kereta ekonomi berubah menjadi kereta yang murah namun nyaman.</p><p style="text-align:justify">Sarana kereta ekonomi K3 dalam perjalanannya menggunakan beberapa jenis kereta dan mengalami perkembangan hingga sekarang. Beberapa sarana kereta ekonomi K3 yang sekarang dipakai di Indonesia :</p><ol><li>Kereta ekonomi K3</li></ol><p>Merupakan sarana keretayang sering dipakai untuk layanan KA Ekonomi yang disubsidi atau mendapat PSO ( Public Service Obligation ) dari Pemerintah. KA ini melayani perjalanan jarak jauh, menengah atau lokal dengan harga yang relatif murah dan terjangkau oleh masyarakat.</p><p>Sarana kereta ekonomi pada umumnya terdiri dari 2 tipe yaitu kereta penumpang dengan kode K3 dan Kereta Makan yang dilengkapi tempat duduk penumpang dan generator set pembangkit listrik yang memiliki kode KMP3. Namun beberapa kereta lama mempunyai kereta penumpang yang dilengkapi generator set saja yang mempunyai kode KP3 walau jumlahnya sudah sedikit.</p><ol><li>Kereta Penumpang K3</li></ol><p>Kereta Penumpang ekonomi K3 yang sekarang beroperasi pada umumnya memiliki spesifikasi yaitu :</p><ol><li>Tempat duduk fix yang saling berhadapan</li><li>Tipe kursi yang cenderung tegak</li><li>Kapasitas 106 penumpang</li><li>Formasi tempat duduk 2-3 dan terdiri dari 24 baris</li><li>Tidak dilengkapi dengan Air Conditioner ( AC ) Sentral dan saluran distribusinya</li><li>Mempunyai 2 Toilet di kedua ujung kereta</li></ol><p style="text-align:center"><img data-cke-saved-src="http://www.inka.co.id/wp-content/uploads/2015/09/Denah-K3-AC-1-1024x155.jpg" src="http://www.inka.co.id/wp-content/uploads/2015/09/Denah-K3-AC-1-1024x155.jpg" alt="" style="height:83px; width:550px"></p><p style="text-align: center;">Gambar 1. Susunan tempat duduk kereta penumpang K3<br></p><p style="text-align: center;">(<a data-cke-saved-href="http://hudalogawa.blogspot.com/2015/08/ilmu-kereta-api-layanan-ka-penumpang-di.html" href="http://hudalogawa.blogspot.com/2015/08/ilmu-kereta-api-layanan-ka-penumpang-di.html">Sumber</a>)<br></p><p style="text-align: center;"><img data-cke-saved-src="http://www.inka.co.id/wp-content/uploads/2015/09/K3-interior-300x225.jpg" src="http://www.inka.co.id/wp-content/uploads/2015/09/K3-interior-300x225.jpg" alt="K3-interior" style="height:225px; width:300px"><br></p><p style="text-align: center;">Gambar 2. Interior kereta K3 Saat masih baru<br></p><p>&nbsp;&nbsp;&nbsp;&nbsp; b. Kereta Penumpang, Makan dan Pembangkit KMP3</p><p style="text-align:justify">KMP3 terdiri dari 4 bagian yaitu ruang penumpang yang sekarang dipakai sebagai tempat kru, ruang makan , dapur dan ruang Genset. Genset dipakai untuk mencatu daya listrik keseluruhan kereta dalam satu rangkaian. Kereta KMP3 biasanya terletak di tengah rangkaian, walau ada yang disambung di bagian ujung rangkaian KA.</p><p style="text-align: center;"><br></p><p style="text-align: center;"><img data-cke-saved-src="http://www.inka.co.id/wp-content/uploads/2015/09/interior-KMP3-300x225.jpg" src="http://www.inka.co.id/wp-content/uploads/2015/09/interior-KMP3-300x225.jpg" alt="interior KMP3" style="height:225px; width:300px"><br></p><p style="text-align: center;">Gambar 3. Interior kereta KMP3<br></p><p style="text-align:center">(<a data-cke-saved-href="http://www.kaskus.co.id/post/51fc835e8027cfef3100000b" href="http://www.kaskus.co.id/post/51fc835e8027cfef3100000b">Sumber</a>)</p><p style="text-align:justify">Sarana kereta ekonomi K3 tahun 60-80 an merupakan impor dari Luar negeri. Kemudian semenjak PT.INKA berdiri, Kereta Ekonomi K3 mulai di buat di dalam negeri.</p><p style="text-align:center"><img data-cke-saved-src="http://www.inka.co.id/wp-content/uploads/2015/09/2007.png" src="http://www.inka.co.id/wp-content/uploads/2015/09/2007.png" alt="" style="height:198px; width:303px"></p><p style="text-align:center">Gambar 4. Kereta Ekonomi K3 Buatan PT INKA (Persero) tahun 2007</p><p style="text-align:justify">Pada tahun 2008 dan 2009, PT INKA memproduksi rangkaian kereta ekonomi K3 beserta KMP3 dengan livery baru yaitu warna Hijau-Oranye-Kuning. Untuk layout dan interior masih sama dengan K3 standar sebelumnya serta kapasitas juga sama yaitu 106 Penumpang.</p><p style="text-align:center"><img data-cke-saved-src="http://www.inka.co.id/wp-content/uploads/2015/09/nano.png" src="http://www.inka.co.id/wp-content/uploads/2015/09/nano.png" alt="" style="height:201px; width:310px"></p><p style="text-align:center">Gambar 5. Kereta K3 Produksi PT.INKA tahun 2009 dengan tampilan hijau-oranye-kuning</p><p>2. Kereta ekonomi K3-AC</p><p style="text-align:justify">Pada tahun 2010, Pemerintah melalui Direktorat Jenderal Perkereta-Apian ( Dirjen KA ) Kementrian Perhubungan melakukan peningkatan pelayanan Kereta Ekonomi dengan memesan rangkaian Kereta K3 baru yang dilengkapi dengan AC Sentral kepada PT.INKA. K3-AC ini mempunyai susunan tempat duduk yang berbeda dengan K3 biasa serta mempunyai tipe kereta yang berbeda untuk kereta pembangkitnya serta adanya kereta spesial. Warna cat livery eksterir K3-AC berbeda dengan K3 biasa yaitu warna Putih dengan stripping biru tua-biru muda.</p><p>Kereta ekonomi K3-AC terdiri dari 3 jenis kereta yaitu :</p><p>a. Kereta Penumpang K3-AC Biasa</p><p>Kereta penumpang K3-AC ini mempunyai spesifikasi sebagai berikut :</p><ol><li>Tempat duduk fix yang saling berhadapan</li><li>Tipe kursi yang cenderung tegak</li><li>Kapasitas 80 penumpang</li><li>Formasi tempat duduk 2-2 dan terdiri dari 22 baris</li><li>Dilengkapi dengan 2 buah Air Conditioner ( AC ) Sentral beserta saluran distribusi udara AC.</li><li>Mempunyai 2 Toilet di kedua ujung kereta</li><li>Terdapat papan informasi dan dapat menunjukkan posisi KA</li></ol><p style="text-align:justify">Dengan jumlah penumpang yang lebih sedikit, maka K3-AC terasa lebih longgar dan nyaman dibandingkan kereta ekonomi K3 yang telah dijelaskan sebelumnya.</p><p style="text-align:justify"><img data-cke-saved-src="http://www.inka.co.id/wp-content/uploads/2015/09/Denah-K3-AC-2-1024x155.jpg" src="http://www.inka.co.id/wp-content/uploads/2015/09/Denah-K3-AC-2-1024x155.jpg" alt="" style="height:83px; width:550px"></p><p style="text-align:center">Gambar 5. Susunan Tempat duduk kereta penumpang K3<br>( sumber : <a data-cke-saved-href="http://hudalogawa.blogspot.com/2015/08/ilmu-kereta-api-layanan-ka-penumpang-di.html" href="http://hudalogawa.blogspot.com/2015/08/ilmu-kereta-api-layanan-ka-penumpang-di.html">http://hudalogawa.blogspot.com/2015/08/ilmu-kereta-api-layanan-ka-penumpang-di.html</a> )</p><p style="text-align:center"><img data-cke-saved-src="http://www.inka.co.id/wp-content/uploads/2015/09/2010..jpg" src="http://www.inka.co.id/wp-content/uploads/2015/09/2010..jpg" alt="" style="height:189px; width:285px"></p><p style="text-align:center"><img data-cke-saved-src="http://www.inka.co.id/wp-content/uploads/2015/09/2010.png" src="http://www.inka.co.id/wp-content/uploads/2015/09/2010.png" alt="" style="height:187px; width:286px"></p><p style="text-align:center">Gambar 6. Eksteror dan interior K3-AC “Krakatau” produksi PT INKA (Persero) tahun 2012</p><p>b. Kereta Penumpang K3-AC Spesial dengan fasilitas untuk penyandang difabel</p><p style="text-align:justify">Kereta ini hampir sama dengan K3-AC Biasa baik secara bentuk kursi atau interiornya. Yang membedakan adalah adanya toilet yang luas serta tempat untuk meletakkan kursi roda di ujung yaitu di depan Kursi no.1CD dan 16AB.</p><p>Kereta penumpang K3-AC ini mempunyai spesifikasi sebagai berikut :</p><ol><li>Tempat duduk fix yang saling berhadapan</li><li>Tipe kursi yang cenderung tegak</li><li>Kapasitas 64 penumpang</li><li>Formasi tempat duduk 2-2 dan terdiri dari 16 baris</li><li>Dilengkapi dengan 2 buah Air Conditioner ( AC ) Sentral beserta saluran distribusi udara AC</li><li>Toilet yang lebih besar dan terletak di kedua ujung kereta</li><li>Terdapat jarak yang lebar didepan tempat duduk no 1CD dan 16AB</li><li>Terdapat papan informasi dan dapat menunjukkan posisi KA<br></li></ol><p style="text-align: center;"><img data-cke-saved-src="http://www.inka.co.id/wp-content/uploads/2015/09/Denah-K3-AC-3-1024x155.jpg" src="http://www.inka.co.id/wp-content/uploads/2015/09/Denah-K3-AC-3-1024x155.jpg" alt="" style="height:83px; width:550px"><br></p><p style="text-align: center;">Gambar 7. Susunan tempat duduk kereta K3-AC Spesial Difabel<br></p><p style="text-align:center">(<a data-cke-saved-href="http://hudalogawa.blogspot.com/2015/08/ilmu-kereta-api-layanan-ka-penumpang-di.html" href="http://hudalogawa.blogspot.com/2015/08/ilmu-kereta-api-layanan-ka-penumpang-di.html">Sumber</a>)</p><p>c. Kereta Makan dan pembangkit MP3</p><p style="text-align:justify">Berbeda dengan kereta KMP3, pada kereta MP3 tidak terdapat kursi penumpang dan hanya terdiri dari Ruang Genset, Ruang makan yang menjadi satu dengan ruang dapur serta ruang operator genset dan kamar kru. Genset pada kereta MP3 memiliki kapasitas 2 x 250 kVA atau ada 2 genset yang dapat beroperasi secara paralel dan&nbsp; otomatis apabila kedua genset dibutuhkan saat kebutuhan daya naik ( operasi normal adalah 1 genset) .</p><p style="text-align: center;"><img data-cke-saved-src="http://www.inka.co.id/wp-content/uploads/2015/09/2010...png" src="http://www.inka.co.id/wp-content/uploads/2015/09/2010...png" alt="" style="height:179px; width:298px"><br></p><p style="text-align: center;">Gambar 8. Dapur dan ruang makan di kereta MP3</p><p style="text-align:justify">Kereta ekonomi dalam perkembangannya mengalami berbagai warna cat eksterior atau livery. Warna yang masih dipakai yaitu Coklat – Biru sebagai warna standar yang lama untuk K3 dan Putih – Biru Tua – Biru Muda untuk K3-AC. Namun sekarang telah ditetapkan warna Putih dengan strpping pita orange – biru dangan warna pintu Oranye sebagai standar livery baru untuk semua kereta ekonomi baik K3 biasa maupun K3-AC.</p><p style="text-align:justify"><br></p><p style="text-align: center;"><img src="http://www.inka.co.id/wp-content/uploads/2015/09/2014.jpg" alt="" data-cke-saved-src="http://www.inka.co.id/wp-content/uploads/2015/09/2014.jpg" style="height:194px; width:312px"><br></p><p style="text-align: center;">Gambar 9. Livery baru kereta ekonomi K3<br></p></div></div></div></div>',
            'content_index' => '2',
            'thumbnail' => '/images/berita/20171127-050838-MengenalSaranaKeretaKelasEkonomidiIndonesia.jpg',
            'status' => 0],
            
        );
            
        foreach ($beritas as $berita)
        {
            Berita::create($berita);
        }
        
        Model::reguard();
    }
}
