<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Footer extends Model
{
	use SoftDeletes;

    protected $table = 'footer';

	protected $fillable  = ['nama_id', 'nama_en'];

	public function subFooter() {
		return $this->hasMany('App\SubFooter');
	}
}
