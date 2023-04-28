<?php

namespace App\Http\Controllers;

use App\Models\Barang;   //nama model
use App\Models\Gudang;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class GudangController extends Controller
{
    ## Tampikan Data
    public function index()
    {
        $title = "Gudang";
        $gudang = Gudang::whereHas('barang', function ($barang) {
                    $barang->where('status', 1);
        })
            ->orderBy('id', 'DESC')->paginate(25)->onEachSide(1);
        return view('admin.gudang.index', compact('title', 'gudang'));
    }

    ## Tampilkan Data Search
    public function search(Request $request)
    {
        $title = "Gudang";
        $gudang = $request->get('search');
        $gudang = Gudang::whereHas('barang', function ($query) use ($gudang) {
            return $query->where('status', 1)
                ->where('nama_barang', 'LIKE', '%' . $gudang . '%')
                ->orWhere('barcode', 'LIKE', '%' . $gudang . '%');
        })
            ->orderBy('id', 'DESC')->paginate(25)->onEachSide(1);

        if($request->input('page')){
            return view('admin.gudang.index',compact('title','gudang'));
        } else {
            return view('admin.gudang.search',compact('title','gudang'));
        }
    }
}
