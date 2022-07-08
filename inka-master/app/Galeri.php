<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
	
class Galeri extends Model
{
	use SoftDeletes;

    protected $table = 'galeri';

	protected $fillable  = ['nama'];

	public function media() {
		return $this->hasMany('App\Media');
	}
}
