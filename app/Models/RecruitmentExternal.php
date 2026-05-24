<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitmentExternal extends Model
{
    use HasFactory;

    protected $table = 'recruitment_externals';

    protected $guarded = ['id'];
}
