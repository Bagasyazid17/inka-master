<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubTopik extends Model
{
	use SoftDeletes;

    protected $table = 'sub_topik';

	protected $fillable  = ['topik_id', 'nama_id', 'nama_en', 'email'];

	public function topik() {
		return $this->belongsTo('App\Topik');
	}

	public function contact() {
		return $this->hasMany('App\Contact');
	}
}
