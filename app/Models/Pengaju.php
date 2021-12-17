<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaju extends Model
{
    // use HasFactory;
	protected $table = 'users';
	protected $fillable =[
        'name',
        'nama_lengkap',
        'email',
        'no_hp',
        'alamat',
        'password',
        'group',
        'opd_id',
        'foto',
        'status',
    ];
}
