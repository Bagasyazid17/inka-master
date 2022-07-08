<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Footer;
use App\SubFooter;

class FooterController extends Controller
{
    /**
    * Display folder name which includes blade 
    *
    * @return folder name
    */
    private $view = 'admin.footer';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $footer = Footer::all();
        // return view($this->view.'.'.__FUNCTION__, compact('footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = [];

        return view($this->view.'.'.__FUNCTION__, compact('footer'));
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
            'nama_id' => 'required|max:255',
            'nama_en' => 'required|max:255',
        ]);

        $footer = new Footer($request->except('_method', '_token'));
        $footer->save();

        return redirect()->route('home-setting.index')
            ->with('success','Data Footer baru berhasil ditambahkan');
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
        $footer = Footer::find($id);
        
        return view($this->view.'.'.__FUNCTION__, compact('footer'));
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
            'nama_id' => 'required|max:255',
            'nama_en' => 'required|max:255',
        ]);

        $footer = Footer::find($id);
        $footer->fill($request->except('_method','_token'))->save();

        return redirect()->route('home-setting.index')
            ->with('success','Data Footer berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubFooter::where('footer_id', $id)->delete();
        Footer::find($id)->delete();
        
        return redirect()->route('home-setting.index')
                ->with('success', 'Data Footer berhasil dihapus');
    }
}
