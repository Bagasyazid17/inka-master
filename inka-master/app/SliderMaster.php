<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
	
class SliderMaster extends Model
{
	use SoftDeletes;

    protected $table = 'slider_master';

	protected $fillable  = ['nama', 'deskripsi'];

	public function slider() {
		return $this->hasMany('App\Slider');
	}
}
