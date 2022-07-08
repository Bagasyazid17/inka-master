<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHasSubTopik extends Model
{
    protected $table = 'user_has_sub_topik';
    public $timestamps = false;

	protected $fillable  = ['user_id', 'sub_topik_id'];

	public function subTopik() {
		return $this->belongsTo('App\SubTopik');
	}

	public function user() {
		return $this->belongsTo('App\User');
	}
}
