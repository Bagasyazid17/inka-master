<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
	
use App\Product;
use App\CategoryProduct;

class MasterProduct extends Model
{
	use SoftDeletes;

    protected $table = 'master_product';

	protected $fillable  = ['nama_id', 'nama_en', 'deskripsi'];

	public function categoryProduct() {
		return $this->hasMany('App\CategoryProduct');
	}

	public function product($id){
		$category = CategoryProduct::select('id')->where('master_product_id', $id)->get()->toArray();
		return Product::whereIn('category_product_id', $category)->orderBy('updated_at', 'desc')->take(4)->get();;
	}

	public function productPerLang($id, $lang){
		$category = CategoryProduct::select('id')->where('master_product_id', $id)->get()->toArray();
		return Product::whereIn('category_product_id', $category)->where('bahasa', $lang)->orderBy('updated_at', 'desc')->take(4)->get();;
	}
}
