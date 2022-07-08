<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
	
class Broadcast extends Model
{
	use SoftDeletes;

    protected $table = 'broadcast';

	protected $fillable  = ['judul','content'];
}
