<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
	
class MediaTag extends Model
{
    protected $table = 'media_tag';

	protected $fillable  = ['media_id', 'nama'];

	public function media() {
		return $this->belongsTo('App\Media');
	}
}
