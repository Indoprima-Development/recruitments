<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_transaction extends Model
{
    use HasFactory;

	public function project()
	{
		return $this->belongsTo('App\Models\Project');
	}
}
