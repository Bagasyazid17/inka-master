<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
	
class Product extends Model
{
	use SoftDeletes;

    protected $table = 'product';

	protected $fillable  = ['category_product_id', 'bahasa', 'nama', 'content', 'content_index', 'is_catalogue'];

	public function categoryProduct() {
		return $this->belongsTo('App\CategoryProduct');
	}

	public function getThumbnail($content){
		// $start = "<div class=\"image-wrapper\"><img src=\"";
        // $end = "\"><div class=\"image-caption\"><i>";
        $start = 'src="';
        $end = '"';
        $r = explode($start, $content);
        if (isset($r[1])){
            $r = explode($end, $r[1]);
            // return $r[0];
        }
        $thumbnail = str_replace('kcfinder/upload', 'kcfinder/upload/.thumbs', $r[0]);
        return $thumbnail;
	}
}
