<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
	
class Procurement extends Model
{
	use SoftDeletes;

    protected $table = 'procurement';

	protected $fillable  = ['master_procurement_id', 'judul', 'content', 'content_index', 'mulai', 'selesai', 'status'];

	protected $dates = ['deleted_at'];

	public function masterProcurement() {
		return $this->belongsTo('App\MasterProcurement');
	}

	public function document() {
		return $this->hasMany('App\ProcurementDocument');
	}
}
