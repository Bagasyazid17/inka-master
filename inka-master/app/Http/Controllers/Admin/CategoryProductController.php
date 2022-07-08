<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\CategoryProduct;
use App\MasterProduct;

class CategoryProductController extends Controller
{
    /**
    * Display folder name which includes blade 
    *
    * @return folder name
    */
    private $view = 'admin.category_product';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryProduct = CategoryProduct::all();

        return view($this->view.'.'.__FUNCTION__, compact('categoryProduct'));
    }

    public function listCategory($id){
        return CategoryProduct::where('master_product_id', $id)->get()->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryProduct = [];
        $masterProduct = MasterProduct::pluck('nama_id', 'id');

        return view($this->view.'.'.__FUNCTION__, compact('categoryProduct','masterProduct'));
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
            'master_product_id' => 'required|integer',
            'deskripsi' => 'max:255'
        ]);

        $category = new CategoryProduct($request->except('_method', '_token'));
        $category->save();

        return redirect()->route('category-product.index')
            ->with('success','Data Category product baru berhasil ditambahkan');
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
        $categoryProduct = CategoryProduct::find($id);
        $masterProduct = MasterProduct::pluck('nama_id', 'id');
        
        return view($this->view.'.'.__FUNCTION__, compact('categoryProduct', 'masterProduct'));
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
            'master_product_id' => 'required|integer',
            'deskripsi' => 'max:255'
        ]);

        $category = CategoryProduct::find($id);
        $category->fill($request->except('_method','_token'))->save();

        return redirect()->route('category-product.index')
            ->with('success','Data Category product berhasil diperbarui');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoryProduct::find($id)->delete();

        return redirect()->route('category-product.index')
                ->with('success', 'Data Category Product berhasil dihapus');
    }
}
