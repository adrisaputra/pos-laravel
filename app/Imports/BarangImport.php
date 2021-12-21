<?php

namespace App\Imports;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Satuan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class BarangImport implements ToCollection, WithStartRow
{
   
    public function startRow(): int
    {
        return 2;
    }
    
    public function collection(Collection $rows)
    {

        foreach ($rows as $row) 
        {
            $count_kategori = Kategori::where('nama_kategori',$row[2])->count();
            $kategori = Kategori::where('nama_kategori',$row[2])->first();

            if($count_kategori>0){
                $kategori = $kategori->id;
            } else {
                $kategori = NULL;
            }

            $count_satuan = Satuan::where('nama_satuan',$row[3])->count();
            $satuan = Satuan::where('nama_satuan',$row[3])->first();

            if($count_satuan>0){
                $satuan = $satuan->id;
            } else {
                $satuan = NULL;
            }
            
            Barang::create([
                'barcode' => $row[0],
                'nama_barang' => $row[1], 
                'kategori_id' => $kategori, 
                'satuan_id' => $satuan, 
                'diskon' => $row[4], 
                'stok_awal' => str_replace(".", "", $row[5]), 
                'harga_beli' => str_replace(".", "", $row[6]), 
                'harga_jual' => str_replace(".", "", $row[7]), 
                'user_id' => Auth::user()->id
            ]);

        }

    }
}
