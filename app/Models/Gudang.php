<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
      // use HasFactory;
	protected $table = 'gudang_tbl';
	protected $fillable =[
        'barang_id',
        'in_stok',
        'min_stok',
        'full_stok',
        'user_id'
    ];

    public function barang()
    {
        return $this->belongsTo('App\Models\Barang');
    }
}
