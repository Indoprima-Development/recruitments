<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qna extends Model
{
    use HasFactory;

	public function exam()
	{
		return $this->belongsTo('App\Models\Exam');
	}

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

	public function qnaTransaction()
	{
		return $this->hasOne('App\Models\Qna_transaction')->where('user_id', auth()->id());
	}
}
