<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcurementDocument extends Model
{
    protected $table = 'procurement_document';

	protected $fillable  = ['nama', 'link', 'procurement_id'];

	public function procurement() {
		return $this->belongsTo('App\Procurement');
	}
}
