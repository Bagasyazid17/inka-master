<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

	protected $table = 'page';

	protected $fillable  = ['nama', 'has_sub', 'page_id', 'content', 'content_index'];

	public function menu() {
		return $this->belongsTo('App\Menu');
	}

	public function childPage() {
		return $this->hasMany('App\Page');
	}

	public function parentPage() {
		return $this->belongsTo('App\Page');
	}
}
