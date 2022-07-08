<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubFooter extends Model
{
	use SoftDeletes;

    protected $table = 'sub_footer';

	protected $fillable  = ['footer_id', 'nama_id', 'nama_en', 'link'];

	public function footer() {
		return $this->belongsTo('App\Footer');
	}
}
