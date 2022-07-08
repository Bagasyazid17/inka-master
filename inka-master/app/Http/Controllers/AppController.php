<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Berita;
use App\CategoryProduct;
use App\Corporation;
use App\Galeri;
use App\HomeSetting;
use App\Karir;
use App\MasterProcurement;
use App\MasterProduct;
use App\Procurement;
use App\Page;
use App\Product;
use App\Slider;
use App\Contact;
use App\Topik;
use App\SubTopik;
use App\Footer;

use Carbon\Carbon;
use Mail;
use App\Mail\ContactMail;

class AppController extends Controller
{
    public function __construct()
    {
        // $this->middleware('setLang');
    }

    public function index(){
        $homeSetting = HomeSetting::where('lang_id', session('lang'))->get();
        $masterProduct = MasterProduct::orderBy('urutan')->get();

        $settingProduct = HomeSetting::select('total_item')->where('lang_id', session('lang'))->where('nama', 'product')->first();
        if($settingProduct) 
            $totalProduct = $settingProduct->total_item;
        else $totalProduct = 0;

        $settingBerita = HomeSetting::select('total_item')->where('lang_id', session('lang'))->where('nama', 'berita')->first();
        if($settingBerita) 
            $totalBerita = $settingBerita->total_item;
        else $totalBerita = 0;        

        $settingKarir = HomeSetting::select('total_item')->where('lang_id', session('lang'))->where('nama', 'karir')->first();
        if($settingKarir) 
            $totalKarir = $settingKarir->total_item;
        else $totalKarir = 0;

        $berita = [];
        $karir = [];
        $product = Product::where('bahasa', session('lang'))->where('is_catalogue', 0)->orderBy('created_at', 'desc')->take($totalProduct)->get();

        if(session('lang') == 'en'){
            $slider = Slider::where('slider_master_id', 2)->orderBy('urutan')->get();
        }
        elseif(session('lang') == 'id'){
            $slider = Slider::where('slider_master_id', 1)->orderBy('urutan')->get();
            $berita = Berita::where('status', 1)->orderBy('created_at', 'desc')->take($totalBerita)->get();
            $karir = Karir::where('status', 1)->orderBy('created_at', 'desc')->take($totalKarir)->get();
        }

        $footer = Footer::all();
        // dd($footer);
    	return view('app.index', compact('product', 'berita', 'slider', 'karir', 'homeSetting', 'masterProduct', 'footer'));
    }

    public function corporationShow($id){
    	$corporation = Corporation::findOrFail($id);
    	return view('app.corporation_show', compact('corporation'));
    }

    public function berita(Request $request){
        $berita = Berita::where('status', 1);
        if ($request->search) {
            $berita = $berita->where('judul', 'like', '%'.$request->search.'%');
        }
        elseif($request->year){
            $berita = $berita->whereYear('created_at', '=', $request->year);
            if ($request->month) {
                $berita = $berita->whereMonth('created_at', '=', $request->month);
            }
        }

        $list = Berita::select('created_at')->groupBy('created_at')->get();
        $year = [];
        for ($i=0; $i < sizeof($list); $i++) { 
            $value = new Carbon($list[$i]->created_at);
            $value = $value->year;
            $year[$value] = $value;
        }

        $month = [1 => 'Januari',
                2 => 'Pebruari',
                3 => 'Maret',
                4 => 'April',
                5 => 'Mei',
                6 => 'Juni',
                7 => 'Juli',
                8 => 'Agustus',
                9 => 'September',
                10 => 'Oktober',
                11 => 'November',
                12 => 'Desember',
                ];
        $berita = $berita->orderBy('created_at', 'desc')->paginate(5);
        $url = preg_replace('/\bpage=([0-9])&\b/', '', $request->fullUrl());
        $berita->setPath($url);
        $popular = Berita::where('status', 1)->orderBy('view_count', 'desc')->take(6)->get();
        return view('app.berita_index', compact('berita', 'popular', 'year', 'month'));
    }

    public function beritaShow($id){
    	$berita = Berita::findOrFail($id);
        $berita->view_count += 1;
        $berita->save();
        $popular = Berita::orderBy('view_count', 'desc')->take(6)->get();
    	return view('app.berita_show', compact('berita', 'popular'));
    }

    public function karir(){
        $karir = Karir::where('status', 1)->orderBy('mulai', 'desc')->get();
        return view('app.karir_index', compact('karir'));
    }

    public function karirShow($id){
        $karir = Karir::findOrFail($id);
        return view('app.karir_show', compact('karir'));
    }

    public function procurementShow($id){
        $masterProcurement = MasterProcurement::findOrFail($id);
        return view('app.procurement_show', compact('masterProcurement'));
    }

    public function galeri(){
        $galeri = Galeri::all();
        return view('app.galeri_index', compact('galeri'));
    }

    public function galeriShow($id){
        $galeri = Galeri::findOrFail($id);
        return view('app.galeri_show', compact('galeri'));
    }

    public function productIndex($id){
        $masterProduct = MasterProduct::findOrFail($id);
        return view('app.product_index', compact('masterProduct'));
    }

    public function productShow($id){
        $product = Product::findOrFail($id);
        return view('app.product_show', compact('product'));
    }

    public function pageShow($id){
        $page = Page::findOrFail($id);
        return view('app.page_show', compact('page'));
    }
    
    public function contact(){
        $topik = Topik::all();
        return view('app.contact', compact('topik'));
    }

    public function contactStore(Request $request){
        $tempTelepon = $request->telepon;
        $request->telepon = (int)$request->telepon;

        $this->validate($request, [
            'sub_topik_id' => 'required|integer',
            'nama' => 'required|string|max:30',
            'email' => 'required|email|max:255',
            'telepon' => 'required|digits_between:5,20',
            'content' => 'required|string|max:255',
        ]);

        $contact = new Contact($request->except('_method', '_token'));
        $contact->save();

        Mail::to('humas@inka.co.id')
            ->queue(new ContactMail($contact->nama, $contact->email, $contact->subTopik->nama_id, $request->content));

        if ($contact->subTopik->email) {
            Mail::to($contact->subTopik->email)
                ->queue(new ContactMail($contact->nama, $contact->email, $contact->subTopik->nama_id, $request->content));
        }

        return redirect()->route('app.contact.index')
                ->with('success', 'Pesan telah terkirim!');
    }

    public function subTopik($id){
        $subTopik = SubTopik::where('topik_id', $id)->get();
        return response()->json($subTopik);
    }

    public function setLang($id){
        session(['lang' => $id]);
        return redirect()->route('app.index');
    }
}
