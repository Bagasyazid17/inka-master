<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
	
class Slider extends Model
{
	use SoftDeletes;

    protected $table = 'slider';

	protected $fillable  = ['judul', 'gambar', 'tagline_1', 'tagline_2', 'url'];

	public function sliderMaster() {
		return $this->belongsTo('App\SliderMaster');
	}
}
