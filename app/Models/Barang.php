<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
      // use HasFactory;
	protected $table = 'barang_tbl';
	protected $fillable =[
        'barcode',
        'nama_barang',
        'kategori_id',
        'satuan_id',
        'diskon',
        'stok_awal',
        'harga_beli',
        'harga_jual',
        'user_id'
    ];
}
