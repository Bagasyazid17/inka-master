<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\MasterProcurement;

class MasterProcurementController extends Controller
{
    /**
    * Display folder name which includes blade 
    *
    * @return folder name
    */
    private $view = 'admin.master_procurement';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masterProcurement = MasterProcurement::all();

        return view($this->view.'.'.__FUNCTION__, compact('masterProcurement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $masterProcurement = [];

        return view($this->view.'.'.__FUNCTION__, compact('masterProcurement'));
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
            'deskripsi' => 'max:255'
        ]);

        $masterProcurement = new MasterProcurement($request->except('_method', '_token'));
        $masterProcurement->save();

        return redirect()->route('master-procurement.index')
            ->with('success','Data Master Procurement baru berhasil ditambahkan');
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
        $masterProcurement = MasterProcurement::find($id);
        
        return view($this->view.'.'.__FUNCTION__, compact('masterProcurement'));
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
            'deskripsi' => 'max:255'
        ]);

        $masterProcurement = MasterProcurement::find($id);
        $masterProcurement->fill($request->except('_method','_token'))->save();

        return redirect()->route('master-procurement.index')
            ->with('success','Data Master Procurement berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MasterProcurement::find($id)->delete();
        
        return redirect()->route('master-procurement.index')
                ->with('success', 'Data Master Procurement berhasil dihapus');
    }
}
