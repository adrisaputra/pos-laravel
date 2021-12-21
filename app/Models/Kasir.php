<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    // use HasFactory;
	protected $table = 'transaksi_tbl';
	protected $fillable =[
        'nomor_invoice',
        'barcode',
        'nama_barang',
        'harga',
        'jumlah',
        'diskon',
        'total',
        'tanggal',
        'waktu',
        'status',
        'user_id'
    ];
}
