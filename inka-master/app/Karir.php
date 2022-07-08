<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
	
class Karir extends Model
{
	use SoftDeletes;

    protected $table = 'karir';

	protected $fillable  = ['nama', 'content', 'content_index', 'mulai', 'selesai'];

	public function document() {
		return $this->hasMany('App\Document');
	}
}
