<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
	use SoftDeletes;
	
    protected $table = 'contact';

	protected $fillable  = ['sub_topik_id', 'nama', 'email', 'telepon', 'content', 'reply', 'replied_by', 'replied_at'];

	public function subTopik() {
		return $this->belongsTo('App\SubTopik');
	}

	public function repliedBy() {
		return $this->belongsTo('App\User', 'replied_by');
	}
}
