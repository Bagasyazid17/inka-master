<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topik extends Model
{
	use SoftDeletes;

    protected $table = 'topik';

	protected $fillable  = ['nama_id', 'nama_en'];

	public function subTopik() {
		return $this->hasMany('App\SubTopik');
	}
}
