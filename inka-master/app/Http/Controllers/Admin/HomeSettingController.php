<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\HomeSetting;
use App\Footer;

class HomeSettingController extends Controller
{
	private $view = 'admin.home_setting';

    public function index()
    {
        $homeSetting = [];
        $footer = Footer::all();
        return view($this->view.'.'.__FUNCTION__, compact('homeSetting', 'footer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $homeSetting = HomeSetting::where('lang_id', $id)->get();
        $lang_id = $id;
        
        if($id == 'id'){
        	$bahasa = 'Bahasa Indonesia';
            $option = ['berita' => 'Berita',
            			'product' => 'Produk',
                        'karir' => 'Karir',
            			'survey' => 'Form Survey',];
        }
        elseif($id == 'en'){
            $bahasa = 'Bahasa Inggris';
            $option = ['product' => 'Produk',
                        'survey' => 'Form Survey',];
        }
        

        $column = ['1' => '1 Kolom',
                    '2' => '2 Kolom',
                    '3' => '3 Kolom',
                    '4' => '4 Kolom',
                    '6' => '6 Kolom'];

        return view($this->view.'.'.__FUNCTION__, compact('homeSetting', 'bahasa', 'lang_id', 'option', 'column'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        HomeSetting::where('lang_id', $request->lang_id)->delete();
        
        foreach ($request->nama as $index => $nama) {
        	HomeSetting::create(['nama' => $nama,
                                'total_item' => $request->total_item[$index],
                                'column' => $request->column[$index],
        						'lang_id' => $request->lang_id,
                                'link' => $request->link[$index],
        						]);
        }

        return redirect()->route('home-setting.index')
            ->with('success','Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
