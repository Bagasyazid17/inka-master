<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\MasterProduct;

class MasterProductController extends Controller
{
    /**
    * Display folder name which includes blade 
    *
    * @return folder name
    */
    private $view = 'admin.master_product';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masterProduct = MasterProduct::orderBy('urutan')->get();

        return view($this->view.'.'.__FUNCTION__, compact('masterProduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $masterProduct = [];

        return view($this->view.'.'.__FUNCTION__, compact('masterProduct'));
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
            'icon' => 'nullable|image',
        ]);

        $masterProduct = new MasterProduct($request->except('_method', '_token', 'icon'));
        
        if ($request->file('icon')) {
            $name  = preg_replace('/[^a-zA-Z0-9\-\._\/\\\\]/','_', $request->nama_id);
            $ext    = $request->file('icon')->getClientOriginalExtension();
            $name   = $name.'.'.$ext;
            $path   = '/images/master_product/';
            $request->file('icon')->move(public_path($path), $name);
            
            $masterProduct->icon = $path.$name;
        }
        $masterProduct->urutan = MasterProduct::pluck('urutan')->max() + 1;

        $masterProduct->save();

        return redirect()->route('master-product.index')
            ->with('success','Data Master Product baru berhasil ditambahkan');
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
        $masterProduct = MasterProduct::find($id);
        
        return view($this->view.'.'.__FUNCTION__, compact('masterProduct'));
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
            'icon' => 'nullable|image',
        ]);

        $masterProduct = MasterProduct::find($id);

        if ($request->file('icon') != null) {
            $name  = preg_replace('/[^a-zA-Z0-9\-\._\/\\\\]/','_', $request->nama_id);
            $ext    = $request->file('icon')->getClientOriginalExtension();
            $name   = $name.'.'.$ext;
            $path   = '/images/master_product/';
            $request->file('icon')->move(public_path($path), $name);
            
            $masterProduct->icon = $path.$name;
        }

        $masterProduct->fill($request->except('_method','_token'))->save();

        return redirect()->route('master-product.index')
            ->with('success','Data Master Product berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MasterProduct::find($id)->delete();
        
        return redirect()->route('master-product.index')
                ->with('success', 'Data Master Product berhasil dihapus');
    }

    public function urutan($id, $action)
    {
        $masterProduct1 = MasterProduct::find($id);
        $urutan1 = $masterProduct1->urutan;

        if ($action == 'up') {
            $masterProduct2 = MasterProduct::where([
                ['urutan', $urutan1-1]
            ])->first();
        }
        else if ($action == 'down'){
            $masterProduct2 = MasterProduct::where([
                ['urutan', $urutan1+1]
            ])->first();
        }

        $urutan2 = $masterProduct2->urutan;

        $masterProduct1->urutan = $urutan2;
        $masterProduct2->urutan = $urutan1;

        $masterProduct1->save();
        $masterProduct2->save();

        return response()->json([
            'status' => 'Update Urutan MasterProduct Sukses'
        ]);
    }
}
