<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
	
class ProductGambar extends Model
{
	use SoftDeletes;

    protected $table = 'product_gambar';

	protected $fillable  = ['product_id', 'deskripsi', 'type', 'link'];

	public function product() {
		return $this->belongsTo('App\Product');
	}
}
