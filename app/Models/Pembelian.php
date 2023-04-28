<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
      // use HasFactory;
	protected $table = 'pembelian_tbl';
	protected $fillable =[
        'nomor_transaksi',
        'status',
        'user_id',
        'supplier_id',
        'pembayaran',
        'total',
    ];

    public function detail_pembelian()
    {
        return $this->hasMany(DetailPembelian::class, 'detail_pembelian_id');
    }
}
