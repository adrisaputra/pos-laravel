<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembelian extends Model
{
    protected $table = 'detail_pembelian_tbl';
	protected $fillable =[
        'pembelian_id',
        'barang_id',
        'jumlah',
        'harga',
    ];
    
    public function pembelian()
    {
        return $this->belongsTo('App\Models\Pembelian');
    }
    
    public function barang()
    {
        return $this->belongsTo('App\Models\Barang');
    }

}
