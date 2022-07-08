<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes;

    protected $table = 'document';

	protected $fillable  = ['nama', 'link', 'karir_id'];

	public function karir() {
		return $this->belongsTo('App\Karir');
	}
}
