<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
	
class ProductData extends Model
{
	use SoftDeletes;

    protected $table = 'product_data';

	protected $fillable  = ['product_id', 'label', 'value'];

	public function product() {
		return $this->belongsTo('App\Product');
	}
}
