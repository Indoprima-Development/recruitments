<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qna_transaction extends Model
{
    use HasFactory;
    protected $guarded = [];

	public function qna()
	{
		return $this->belongsTo('App\Models\Qna');
	}

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}
}
