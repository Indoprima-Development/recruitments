<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobtitle extends Model
{
    use HasFactory;

	public function section()
	{
		return $this->belongsTo('App\Models\Section');
	}
}
