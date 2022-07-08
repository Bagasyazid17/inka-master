<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;
use App\CategoryProduct;
use App\MasterProduct;

class ProductController extends Controller
{
    /**
    * Display folder name which includes blade 
    *
    * @return folder name
    */
    private $view = 'admin.product';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function getBetween($content,$start,$end){
        $r = explode($start, $content);
        if (isset($r[1])){
            $r = explode($end, $r[1]);
            return $r[0];
        }
        return '';
    }

    private function getImage($content){
        $start = "<div class=\"image-wrapper\"><img src=\"";
        $end = "\"><div class=\"image-caption\"><i>";
        return $this->getBetween($content, $start, $end);
    }

    public function index($isCatalogue)
    {
        $product = Product::where('is_catalogue', $isCatalogue)->get();

        return view($this->view.'.'.__FUNCTION__, compact('product', 'isCatalogue'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($isCatalogue)
    {
        $product = [];
        $masterProduct = MasterProduct::pluck('nama_id', 'id');
        $categoryProduct = CategoryProduct::pluck('nama_id', 'id');

        return view($this->view.'.'.__FUNCTION__, compact('product','categoryProduct', 'masterProduct', 'isCatalogue'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $isCatalogue)
    {
        $this->validate($request, [
            'category_product_id' => 'numeric',
            'bahasa' => 'required',
            'nama' => 'required|max:255',
            'content' => 'required',
            'content_index' => 'required|numeric'
        ]);

        $product = new Product($request->except('_method', '_token'));
        $product->is_catalogue = $isCatalogue;
        $product->save();

        return redirect()->route('product.index', ['isCatalogue' => $isCatalogue])
            ->with('success','Data Product baru berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($isCatalogue, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($isCatalogue, $id)
    {
        $product = Product::find($id);
        $masterProduct = MasterProduct::pluck('nama_id', 'id');
        $masterProductId = $product->categoryProduct;
        if ($masterProductId) {
            $masterProductId = $masterProductId->masterProduct;
            if ($masterProductId) {
                $masterProductId = $masterProductId->id;
                $categoryProduct = CategoryProduct::where('master_product_id', $masterProductId)->pluck('nama_id', 'id');
            }
            else{
                $categoryProduct = [];
            }
        }
        else{
            $categoryProduct = [];
        }
        
        return view($this->view.'.'.__FUNCTION__, compact('product', 'masterProduct', 'categoryProduct', 'isCatalogue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $isCatalogue, $id)
    {
        $this->validate($request, [
            // 'category_product_id' => 'numeric',
            'bahasa' => 'required',
            'nama' => 'required|max:255',
            'content' => 'required',
            'content_index' => 'required'
        ]);
        
        $product = Product::find($id);
        $product->fill($request->except('_method','_token'));
        $product->is_catalogue = $isCatalogue;
        $product->save();

        return redirect()->route('product.index', ['isCatalogue' => $isCatalogue])
            ->with('success','Data Product berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($isCatalogue, $id)
    {
        // ProductData::where('product_id', $id)->delete();
        // ProductGambar::where('product_id', $id)->delete();
        Product::find($id)->delete();
        
        return redirect()->route('product.index', ['isCatalogue' => $isCatalogue])
                ->with('success', 'Data Product berhasil dihapus');
    }

    public function trash($isCatalogue)
    {
        $product = Product::onlyTrashed()->where('is_catalogue', $isCatalogue)->get();

        return view($this->view.'.trash', compact('product', 'isCatalogue'));
    }

    public function restore($isCatalogue, $id)
    {
        Product::withTrashed()->where('id', $id)->restore();
        
        return redirect()->route('product.trash', ['isCatalogue' => $isCatalogue])->with('success','Data Product berhasil dikembalikan');;
    }

    public function permanentlyDelete($isCatalogue, $id)
    {
        Product::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('product.trash', ['isCatalogue' => $isCatalogue])->with('success','Data Product berhasil dihapus secara permanen');;
    }
}
