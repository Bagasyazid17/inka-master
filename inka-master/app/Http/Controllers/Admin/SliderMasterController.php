<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SliderMaster;

class SliderMasterController extends Controller
{
    /**
    * Display folder name which includes blade 
    *
    * @return folder name
    */
    private $view = 'admin.slider_master';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliderMaster = SliderMaster::all();

        return view($this->view.'.'.__FUNCTION__, compact('sliderMaster'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sliderMaster = [];

        return view($this->view.'.'.__FUNCTION__, compact('sliderMaster'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'deskripsi' => 'required|max:255'
        ]);

        $sliderMaster = new SliderMaster($request->except('_method', '_token'));
        $sliderMaster->save();

        return redirect()->route('slider-master.index')
            ->with('gambar','Data Master Slider baru berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sliderMaster = SliderMaster::find($id);
        
        return view($this->view.'.'.__FUNCTION__, compact('sliderMaster'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'deskripsi' => 'required|max:255'
        ]);

        $sliderMaster = SliderMaster::find($id);
        $sliderMaster->save();
        
        return redirect()->route('slider-master.index')
            ->with('success','Data Master Slider berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sliderMaster = SliderMaster::find($id);
        $sliderMaster->delete();
        
        return redirect()->route('slider-master.index')
                ->with('success', 'Data Master Slider berhasil dihapus');
    }
}
