<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedJob extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ptkform()
    {
        return $this->belongsTo('App\Models\Ptkform');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
