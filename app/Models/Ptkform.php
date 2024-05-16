<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ptkform extends Model
{
    use HasFactory;

	public function education()
	{
		return $this->belongsTo('App\Models\Education');
	}

	public function major()
	{
		return $this->belongsTo('App\Models\Major');
	}

	public function division()
	{
		return $this->belongsTo('App\Models\Division');
	}

	public function department()
	{
		return $this->belongsTo('App\Models\Department');
	}

	public function section()
	{
		return $this->belongsTo('App\Models\Section');
	}

	public function jobtitle()
	{
		return $this->belongsTo('App\Models\Jobtitle');
	}
}
