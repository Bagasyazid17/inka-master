<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Berita;
use App\Product;

class MobileViewController extends Controller
{
    public function berita($id){
    	$berita = Berita::find($id);
        $berita->view_count += 1;
        $berita->save();
    	return view('app.mobile.berita', compact('berita'));
    }

    public function product($id){
        $product = Product::find($id);
        return view('app.mobile.product', compact('product'));
    }
}