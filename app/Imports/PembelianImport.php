<?php

namespace App\Imports;

use App\Models\Pembelian;
use App\Models\Barang;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PembelianImport implements ToCollection, WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $barang = Barang::where('barcode',$row[1])->first();
            
            Pembelian::create([
                'tanggal' => Date::excelToDateTimeObject($row[0]),
                'barcode' => $row[1],
                'nama_barang' => $barang->nama_barang, 
                'kategori_id' => $barang->kategori_id, 
                'satuan_id' => $barang->satuan_id, 
                'supplier_id' => $row[2],
                'jumlah' => str_replace(".", "", $row[3]), 
                'catatan' => str_replace(".", "", $row[4]),
                'user_id' => Auth::user()->id
            ]);

        }
    }
}
