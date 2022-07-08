<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use File;
use App\Slider;
use App\SliderMaster;
use Carbon\Carbon;

class SliderController extends Controller
{
    /**
    * Display folder name which includes blade 
    *
    * @return folder name
    */
    private $view = 'admin.slider';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sliderMasterId)
    {
        $slider = Slider::where('slider_master_id', $sliderMasterId)->orderBy('urutan')->get();
        $sliderMaster = SliderMaster::find($sliderMasterId);

        return view($this->view.'.'.__FUNCTION__, compact('slider', 'sliderMaster'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($sliderMasterId)
    {
        $slider = [];
        $sliderMaster = SliderMaster::find($sliderMasterId);

        return view($this->view.'.'.__FUNCTION__, compact('slider', 'sliderMaster'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $sliderMasterId)
    {
        $this->validate($request, [
            'judul' => 'required|max:255',
            'gambar' => 'required',
            'tagline_1' => 'max:255',
            'tagline_2' => 'max:255',
            'url' => 'max:255'
        ]);
        $slider = new Slider($request->except('_method', '_token'));
        $slider->slider_master_id = $sliderMasterId;

        // $judul  = preg_replace('/[^a-zA-Z0-9\-\._\/\\\\]/','', $request->judul);
        // $ext    = $request->file('gambar')->getClientOriginalExtension();
        // $name   = Carbon::now()->format('Ymd-His').'-'.$judul.'.'.$ext;
        // $path   = '/images/slider/';
        // $request->file('gambar')->move(public_path($path), $name);
        
        // $slider->gambar = $path.$name;

        $slider->urutan = Slider::where('slider_master_id', $sliderMasterId)->pluck('urutan')->max() + 1;

        $slider->save();
        
        return redirect()->route('slider.index', $sliderMasterId)
            ->with('gambar','Data Slider baru berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sliderMasterId, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($sliderMasterId, $id)
    {
        $slider = Slider::find($id);
        $sliderMaster = SliderMaster::find($sliderMasterId);
        
        return view($this->view.'.'.__FUNCTION__, compact('slider', 'sliderMaster'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sliderMasterId, $id)
    {
        $this->validate($request, [
            'judul' => 'required|max:255',
            'tagline_1' => 'max:255',
            'tagline_2' => 'max:255',
            'url' => 'max:255'
        ]);

        $slider = Slider::find($id);
        $slider->fill($request->except('_method','_token'))->save();

        // if($request->gambar != null)
        // {
        //     $judul  = preg_replace('/[^a-zA-Z0-9\-\._\/\\\\]/','', $request->judul);
        //     $ext    = $request->file('gambar')->getClientOriginalExtension();
        //     $name   = Carbon::now()->format('Ymd-His').'-'.$judul.'.'.$ext;
        //     $path   = '/images/slider/';
            
        //     $request->file('gambar')->move(public_path($path), $name);
        //     File::delete(public_path($slider->gambar));
            
        //     $slider->fill($request->except('_method','_token'));
        //     $slider->gambar = $path.$name;
            
        //     $slider->save();
        // }
        
        // else
        // {
        //     $slider->fill($request->except('_method','_token','gambar'))->save();
        // }

        return redirect()->route('slider.index', $sliderMasterId)
            ->with('success','Data Slider berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sliderMasterId, $id)
    {
        $slider = Slider::find($id);
        File::delete(public_path($slider->gambar));

        $slider->delete();
        
        return redirect()->route('slider.index', $sliderMasterId)
                ->with('success', 'Data Slider berhasil dihapus');
    }

    public function urutan($sliderMasterId, $id, $action)
    {
        $slider1 = Slider::find($id);
        $urutan1 = $slider1->urutan;

        if ($action == 'up') {
            $slider2 = Slider::where([
                ['urutan', $urutan1-1],
                ['slider_master_id', $sliderMasterId]
            ])->first();
        }
        else if ($action == 'down'){
            $slider2 = Slider::where([
                ['urutan', $urutan1+1],
                ['slider_master_id', $sliderMasterId]
            ])->first();
        }

        $urutan2 = $slider2->urutan;

        $slider1->urutan = $urutan2;
        $slider2->urutan = $urutan1;

        $slider1->save();
        $slider2->save();

        return response()->json([
            'status' => 'Update Urutan Slider Sukses'
        ]);
    }
}
