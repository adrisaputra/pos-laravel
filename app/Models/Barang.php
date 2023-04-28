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
        'harga_beli',
        'harga_jual',
        'gambar',
        'user_id'
    ];

    
    public function gudang()
    {
        return $this->hasOne('App\Models\Gudang');
    }


}
