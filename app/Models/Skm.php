<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skm extends Model
{
    // use HasFactory;
	protected $table = 'skm_tbl';
	protected $fillable =[
        'nik',
        'skm',
        'user_id'
    ];
}
