<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
	
class MasterProcurement extends Model
{
	use SoftDeletes;

    protected $table = 'master_procurement';

	protected $fillable  = ['nama'];

	protected static function boot() {
	    parent::boot();

	    static::deleting(function($masterProcurement) {
	        $masterProcurement->procurement()->delete();
	    });
	}

	public function procurement() {
		return $this->hasMany('App\Procurement');
	}

	public function publishedProcurement($value='')
	{
		return $this->hasMany('App\Procurement')->where('status', 1);
	}
}
