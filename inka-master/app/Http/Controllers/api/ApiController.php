<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;

use App\Berita;
use App\Galeri;
use App\Media;
use App\MasterProduct;
use App\Product;
use App\CategoryProduct;
use App\SliderMaster;
use App\Contact;

use App\SubTopik;
use App\Topik;

class ApiController extends Controller
{
    public function beritaList(Request $request){
    	if ($request->total) {
    		$berita = Berita::where('status', 1)->orderBy('created_at', 'desc')->take($request->total)->get();
    	}
    	else{
    		$berita = Berita::where('status', 1)->orderBy('created_at', 'desc')->get();
    	}

    	for ($i=0; $i < sizeof($berita); $i++) { 
    		$berita[$i]->content = preg_replace('/\s+/',' ',preg_replace('/[\r\n]+|&nbsp;/',' ',strip_tags($berita[$i]->content)));
    		$berita[$i]->webView = route('mobile.berita', $berita[$i]->id);
            $berita[$i]->thumbnail = str_replace('kcfinder/upload', 'kcfinder/upload/.thumbs', $berita[$i]->thumbnail);
    	}

    	return response()->json($berita);
    }

    public function beritaShow(Request $request){
    	$berita = [];
    	if ($request->berita) {
    		$berita = Berita::find($request->berita);
    	}
		$berita->content = preg_replace('/\s+/',' ',preg_replace('/[\r\n]+|&nbsp;/',' ',strip_tags($berita->content)));
    	$berita->webView = route('mobile.berita', $request->berita);
    	return response()->json($berita);
    }

    public function productList(Request $request){
    	$product = Product::where('is_catalogue', 0)->where('bahasa', 'id')->orderBy('created_at', 'desc');
    	if ($request->total) {
    		$product = $product->take($request->total);
    	}
    	$product = $product->get();

    	for ($i=0; $i < sizeof($product); $i++) { 
    		$product[$i]->thumbnail = $product[$i]->getThumbnail($product[$i]->content);
    		$product[$i]->content = preg_replace('/\s+/',' ',preg_replace('/[\r\n]+|&nbsp;/',' ',strip_tags($product[$i]->content)));
    		$product[$i]->webView = route('mobile.product', $product[$i]->id);
    	}

    	return response()->json($product);
    }

    public function productMaster(Request $request){
    	$masterProduct = MasterProduct::all();
    	return response()->json($masterProduct);
    }

    public function productPerMaster(Request $request){
        $masterProduct = MasterProduct::all();
        $result = [];
        for ($i=0; $i < sizeof($masterProduct); $i++) { 
            $masterProduct[$i]->product = $masterProduct[$i]->productPerLang($masterProduct[$i]->id, 'id');
            for ($j=0; $j < sizeof($masterProduct[$i]->product); $j++) {
                $masterProduct[$i]->product[$j]->thumbnail = $masterProduct[$i]->product[$j]->getThumbnail($masterProduct[$i]->product[$j]->content);
                $masterProduct[$i]->product[$j]->content = preg_replace('/\s+/',' ',preg_replace('/[\r\n]+|&nbsp;/',' ',strip_tags($masterProduct[$i]->product[$j]->content)));
                $masterProduct[$i]->product[$j]->webView = route('mobile.product', $masterProduct[$i]->product[$j]->id);
            }
            $index = str_replace(' ', '_', $masterProduct[$i]->nama_id);
            $result[$index] = $masterProduct[$i];
        }

        return response()->json($masterProduct);
        // return response()->json($result);
    }

    public function productPerMasterV2(Request $request){
        $masterProduct = MasterProduct::all();
        $result = [];
        for ($i=0; $i < sizeof($masterProduct); $i++) { 
            $masterProduct[$i]->product = $masterProduct[$i]->productPerLang($masterProduct[$i]->id, 'id');
            for ($j=0; $j < sizeof($masterProduct[$i]->product); $j++) {
                $masterProduct[$i]->product[$j]->thumbnail = $masterProduct[$i]->product[$j]->getThumbnail($masterProduct[$i]->product[$j]->content);
                $masterProduct[$i]->product[$j]->content = preg_replace('/\s+/',' ',preg_replace('/[\r\n]+|&nbsp;/',' ',strip_tags($masterProduct[$i]->product[$j]->content)));
                $masterProduct[$i]->product[$j]->webView = route('mobile.product', $masterProduct[$i]->product[$j]->id);
            }
            $index = str_replace(' ', '_', $masterProduct[$i]->nama_id);
            $result[$index] = $masterProduct[$i];
        }

        // return response()->json($masterProduct);
        return response()->json($result);
    }

    public function productCategory(Request $request){
    	$category = [];
    	
    	if ($request->master_product) {
    		$category = CategoryProduct::where('master_product_id', $request->master_product);
    		$category = $category->get();
    	}

    	// for ($i=0; $i < sizeof($category); $i++) { 
    	// 	$category[$i]->product = $category[$i]->limitProduct($category[$i]->id);

    	// 	for ($j=0; $j < sizeof($category[$i]->product); $j++) {
	    // 		$category[$i]->product[$j]->thumbnail = $category[$i]->product[$j]->getThumbnail($category[$i]->product[$j]->content);
	    // 		$category[$i]->product[$j]->content = preg_replace('/\s+/',' ',preg_replace('/[\r\n]+|&nbsp;/',' ',strip_tags($category[$i]->product[$j]->content)));
     //            $category[$i]->product[$j]->webView = route('mobile.product', $category[$i]->product[$j]->id);
     //        }
    	// }

    	return response()->json($category);
    }

    public function productPerCategory(Request $request){
    	$product = [];
    	if ($request->category_product) {
    		$product = Product::where('category_product_id', $request->category_product)->where('bahasa', 'id')->get();
    	}

    	for ($i=0; $i < sizeof($product); $i++) { 
    		$product[$i]->thumbnail = $product[$i]->getThumbnail($product[$i]->content);
    		$product[$i]->content = preg_replace('/\s+/',' ',preg_replace('/[\r\n]+|&nbsp;/',' ',strip_tags($product[$i]->content)));
    		$product[$i]->webView = route('mobile.product', $product[$i]->id);
    	}

    	return response()->json($product);
    }

    public function productShow(Request $request){
    	$product = [];
    	if ($request->product) {
    		//select('id', 'nama', 'is_catalogue', 'bahasa', 'content', 'created_at', 'updated_at')->
    		$product = Product::with('categoryProduct')->find($request->product);
    	}
    	$product->thumbnail = $product->getThumbnail($product->content);
    	$product->content = preg_replace('/\s+/',' ',preg_replace('/[\r\n]+|&nbsp;/',' ',strip_tags($product->content)));
    	$product->webView = route('mobile.product', $request->product);
    	return response()->json($product);
    }

    public function galeryList(Request $request){
    	$galery = Galeri::orderBy('created_at', 'desc');
    	if ($request->total) {
    		$galery = $galery->take($request->total);
    	}
    	$galery = $galery->get();

    	return response()->json($galery);
    }

    public function galeryShow(Request $request){
    	$media = Media::where('galeri_id', $request->galery)->get();

    	return response()->json($media);
    }

    public function contact(Request $request){
    	$validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'sub_topik_id' => 'required|integer',
            'content' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(array('status' => 'Error', 'message' => 'Parameter request tidak sesuai format.', 'informations' => $validator->errors()->toArray()), 400);
        }

        $contact = new Contact($request->except('_method', '_token'));
        $contact->save();

        return response()->json(array('status' => 'Success', 'message' => 'Pesan telah disimpan!'));
    }

    public function topik(Request $request){
        $topik = Topik::with('subTopik')->get();
        return response()->json($topik);
    }

    public function subTopik(Request $request){
        $subTopik = SubTopik::where('topik_id', $request->topik)->get();
        return response()->json($subTopik);
    }
}
