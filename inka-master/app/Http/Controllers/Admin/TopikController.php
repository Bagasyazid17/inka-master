<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Topik;
use App\SubTopik;

class TopikController extends Controller
{
    /**
    * Display folder name which includes blade 
    *
    * @return folder name
    */
    private $view = 'admin.topik';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topik = Topik::all();
        return view($this->view.'.'.__FUNCTION__, compact('topik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topik = [];

        return view($this->view.'.'.__FUNCTION__, compact('topik'));
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

        $topik = new Topik($request->except('_method', '_token'));
        $topik->save();

        return redirect()->route('topik.index')
            ->with('success','Data Topik baru berhasil ditambahkan');
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
        $topik = Topik::find($id);
        
        return view($this->view.'.'.__FUNCTION__, compact('topik'));
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

        $topik = Topik::find($id);
        $topik->fill($request->except('_method','_token'))->save();

        return redirect()->route('topik.index')
            ->with('success','Data Topik berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubTopik::where('topik_id', $id)->delete();
        Topik::find($id)->delete();
        
        return redirect()->route('topik.index')
                ->with('success', 'Data Topik berhasil dihapus');
    }
}
