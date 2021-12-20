<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
      // use HasFactory;
	protected $table = 'satuan_tbl';
	protected $fillable =[
        'nama_satuan',
        'user_id'
    ];

    public function pembelian()
    {
        return $this->hasOne('App\Models\Pembelian');
    }
}
