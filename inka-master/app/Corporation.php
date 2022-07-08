<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
	
class Corporation extends Model
{
	use SoftDeletes;

    protected $table = 'corporation';

	protected $fillable  = ['bahasa', 'nama', 'has_sub', 'corporation_id', 'content', 'content_index', 'status', 'urutan'];

	public function parentCorporation() {
		return $this->belongsTo('App\Corporation');
	}

	public function childCorporation() {
		return $this->hasMany('App\Corporation');
	}
}
