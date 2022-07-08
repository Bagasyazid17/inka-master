<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Product;

class CategoryProduct extends Model
{
	use SoftDeletes;

    protected $table = 'category_product';

	protected $fillable  = ['master_product_id', 'nama_id', 'nama_en', 'deskripsi'];

	public function masterProduct() {
		return $this->belongsTo('App\MasterProduct');
	}

	public function product() {
		return $this->hasMany('App\Product');
	}

	public function limitProduct($id) {
		// return $this->hasMany('App\Product')->take(2);
		return Product::where('category_product_id', $id)->orderBy('created_at', 'desc')->take(5)->get();
	}
}
