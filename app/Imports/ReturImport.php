<?php

namespace App\Imports;

use App\Models\Retur;
use App\Models\Barang;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ReturImport implements ToCollection, WithStartRow
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
            
            Retur::create([
                'tanggal' => Date::excelToDateTimeObject($row[0]),
                'barcode' => $row[1],
                'nama_barang' => $barang->nama_barang, 
                'kategori_id' => $barang->kategori_id, 
                'satuan_id' => $barang->satuan_id, 
                'jumlah' => str_replace(".", "", $row[2]), 
                'catatan' => str_replace(".", "", $row[3]),
                'user_id' => Auth::user()->id
            ]);

        }
    }
}
