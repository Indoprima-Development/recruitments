<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ptkformactivity extends Model
{
    use HasFactory;
    protected $guarded = [];

	public function ptkformtransaction()
	{
		return $this->belongsTo('App\Models\Ptkformtransaction');
	}

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}
}
