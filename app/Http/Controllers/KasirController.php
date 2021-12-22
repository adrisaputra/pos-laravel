<?php

namespace App\Http\Controllers;

use App\Models\Kasir;   //nama model
use App\Models\Barang;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class KasirController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        $title = 'DATA TRANSAKSI';
        $kasir = Kasir::whereNull('status')->orderBy('id','DESC')->get();
		return view('admin.kasir.index2',compact('title','kasir'));
    }

	## Tampilkan Data Search
	public function search(Request $request)
    {
        $title = 'DATA TRANSAKSI';
        $barang = $request->get('search');
        $barang = Barang::where(function ($query) use ($barang) {
                                    $query->where('barcode', 'LIKE', '%'.$barang.'%')
                                        ->orWhere('nama_barang', 'LIKE', '%'.$barang.'%');
                                })->orderBy('id','DESC')->limit(10)->get();
        return view('admin.kasir.search',compact('title','barang'));
    }
	
    public function nomor_invoice(){
    	$n="";
    	$last = Kasir::select('nomor_invoice')
                        ->where('tanggal',date("Y-m-d"))
                        ->orderBy('nomor_invoice', 'DESC')
                        ->get();

    	foreach($last as $v){
    		$n = $v->nomor_invoice;
			$n = substr($n, 12);  
    		$n = $n+1;
    	}
    	
    	if(strlen($n)==0){
    		$n="INV-".date('Ymd')."000001";
    	}if(strlen($n)==1){
    		$n="INV-".date('Ymd')."00000".$n;
    	}else if (strlen($n)==2){
    		$n="INV-".date('Ymd')."0000".$n;
    	}else if (strlen($n)==3){
    		$n="INV-".date('Ymd')."000".$n;
    	}else if (strlen($n)==4){
    		$n="INV-".date('Ymd')."00".$n;
    	}else if (strlen($n)==5){
    		$n="INV-".date('Ymd')."0".$n;
    	}else if (strlen($n)==6){
    		$n;
    	}
		
    	return $n;
    }

    ## Simpan Data
    public function store(Request $request)
    {
        $barang = Barang::where('barcode', $request->barcode)->first();

        $jumlah_transaksi = Kasir::where('barcode', $request->barcode)->whereNull('status')->count();
        $transaksi = Kasir::where('barcode', $request->barcode)->whereNull('status')->first();

        if($jumlah_transaksi == 0){
		    // $input['nomor_invoice'] = $this->nomor_invoice();
            $input['barcode'] = $barang->barcode;
            $input['nama_barang'] = $barang->nama_barang;
            $input['harga'] = $barang->harga_jual;
            $input['jumlah'] = 1;
            $input['diskon'] = $barang->diskon;
            $input['total'] = $barang->harga_jual*1;
            $input['tanggal'] = date('Y-m-d');
            $input['waktu'] = date('H:i:s');
            $input['user_id'] = Auth::user()->id;

            Kasir::create($input);
        } else {
            $kasir = Kasir::where('barcode',$request->barcode)->whereNull('status')->first();

            $kasir2 = Kasir::find($kasir->id);
            $kasir2->jumlah = $kasir->jumlah+1;
            $kasir2->diskon = $kasir->diskon;
            $kasir2->total = $kasir->harga*($kasir->jumlah+1);
            $kasir2->tanggal = date('Y-m-d');
            $kasir2->waktu = date('H:i:s');
            $kasir2->user_id = Auth::user()->id;
            $kasir2->save();
        }
		
		
		return redirect('/kasir')->with('status','Data Tersimpan');
    }

    ## Edit Data
    public function update(Request $request, Kasir $kasir)
    {
        $kasir->fill($request->all());
        $kasir->total = $kasir->harga*$request->jumlah;
		$kasir->user_id = Auth::user()->id;
    	$kasir->save();
		
		return redirect('/kasir')->with('status', 'Data Berhasil Diubah');
    }

    public function update2($id, $jumlah)
    {
        $kasir = Kasir::find($id);
        $kasir->jumlah = $jumlah; 
        $kasir->total = $kasir->harga * $kasir->jumlah;
        $kasir->save();
    }

    ## Hapus Data
    public function delete(Kasir $kasir)
    {
        $kasir->delete();
        return redirect('/kasir')->with('status', 'Data Berhasil Dihapus');
    }

} 
