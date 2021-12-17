<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    // use HasFactory;
	protected $table = 'layanan_tbl';
	protected $fillable =[
        'nama_layanan',
        'keterangan',
        'persyaratan',
        'gambar',
        'user_id'
    ];
}
