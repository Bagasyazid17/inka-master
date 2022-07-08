<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomePageElement extends Model
{
    protected $table = 'home_page';

	protected $fillable  = ['nama'];
}
