<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SubFooter;
use App\Footer;

class SubFooterController extends Controller
{
    /**
    * Display folder name which includes blade 
    *
    * @return folder name
    */
    private $view = 'admin.sub_footer';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($footerId)
    {
        $subFooter = SubFooter::where('footer_id', $footerId)->get();
        $footer = Footer::find($footerId);
     
        return view($this->view.'.'.__FUNCTION__, compact('subFooter', 'footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($footerId)
    {
        $subFooter = [];
        $footer = Footer::find($footerId);

        return view($this->view.'.'.__FUNCTION__, compact('subFooter', 'footer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $footerId)
    {
        $this->validate($request, [
            'nama_id' => 'required|max:255',
            'nama_en' => 'required|max:255',
            'link' => 'required|max:255',
        ]);
        $subFooter = new SubFooter($request->except('_method', '_token'));
        $subFooter->footer_id = $footerId;
        $subFooter->save();

        return redirect()->route('sub-footer.index', $footerId)
            ->with('success','Data Sub Footer baru berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($footerId, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($footerId, $id)
    {
        $subFooter = SubFooter::find($id);
        $footer = Footer::find($footerId);
        
        return view($this->view.'.'.__FUNCTION__, compact('subFooter', 'footer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $footerId, $id)
    {
        $this->validate($request, [
            'nama_id' => 'required|max:255',
            'nama_en' => 'required|max:255',
            'link' => 'required|max:255',
        ]);
        $subFooter = SubFooter::find($id);
        $subFooter->fill($request->except('_method','_token'));
        $subFooter->save();

        return redirect()->route('sub-footer.index', $footerId)
            ->with('success','Data Sub Footer berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($footerId, $id)
    {
        SubFooter::find($id)->delete();

        return redirect()->route('sub-footer.index', $footerId)
                ->with('success', 'Data Sub Footer berhasil dihapus');
    }
}
