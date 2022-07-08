<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeSetting extends Model
{
    protected $table = 'home_setting';

	protected $fillable  = ['nama', 'total_item', 'column', 'lang_id', 'link'];
}
