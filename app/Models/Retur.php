<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
      // use HasFactory;
	protected $table = 'retur_tbl';
	protected $fillable =[
        'tanggal',
        'barcode',
        'nama_barang',
        'kategori_id',
        'satuan_id',
        'jumlah',
        'catatan',
        'user_id'
    ];

    public function satuan()
    {
        return $this->belongsTo('App\Models\Satuan');
    }
}
