<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
	
class Media extends Model
{
	use SoftDeletes;

    protected $table = 'media';

	protected $fillable  = ['galeri_id', 'nama', 'type', 'link'];

	public function galeri() {
		return $this->belongsTo('App\Galeri');
	}

	public function mediaTag() {
		return $this->hasMany('App\MediaTag');
	}
}
