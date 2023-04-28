<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;   //nama model
use App\Models\Barang;   //nama model
use App\Models\Supplier;   //nama model
use App\Imports\PembelianImport;     // Import data Pegawai
use Maatwebsite\Excel\Facades\Excel; // Excel Library
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        $title = 'DATA PEMBELIAN';
        $pembelian = Pembelian::orderBy('id','DESC')->paginate(25)->onEachSide(1);
		return view('admin.pembelian.index',compact('title','pembelian'));
    }

	## Tampilkan Data Search
	public function search(Request $request)
    {
        $title = 'DATA PEMBELIAN';
        $pembelian = $request->get('search');
        $pembelian = Pembelian::where(function ($query) use ($pembelian) {
                                    $query->where('barcode', 'LIKE', '%'.$pembelian.'%')
                                        ->orWhere('nama_barang', 'LIKE', '%'.$pembelian.'%');
                                })->orderBy('id','DESC')->paginate(25)->onEachSide(1);
        
        if($request->input('page')){
            return view('admin.pembelian.index',compact('title','pembelian'));
        } else {
            return view('admin.pembelian.search',compact('title','pembelian'));
        }
    }
	
    ## Tampilkan Form Create
    public function create()
    {
        $title = 'TAMBAH DATA PEMBELIAN';
        $barang = Barang::get();
        $supplier = Supplier::get();
		$view=view('admin.pembelian.create',compact('title','barang','supplier'));
        $view=$view->render();
        return $view;
    }

    ## Simpan Data
    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'barcode' => 'required',
            'jumlah' => 'required'
        ]);

		$input['tanggal'] = $request->tanggal;
		$input['barcode'] = $request->barcode;
		$input['supplier_id'] = $request->supplier_id;
        
        $barang = Barang::where('barcode',$request->barcode)->first();
		$input['nama_barang'] = $barang->nama_barang;
		$input['kategori_id'] = $barang->kategori_id;
		$input['satuan_id'] = $barang->satuan_id;
        
		$input['jumlah'] = str_replace(".", "", $request->jumlah);
		$input['catatan'] = $request->catatan;
		$input['user_id'] = Auth::user()->id;
		
        Pembelian::create($input);
		
		return redirect('/pembelian')->with('status','Data Tersimpan');
    }

    ## Tampilkan Form Edit
    public function edit(Pembelian $pembelian)
    {
        $title = 'UBAH DATA PEMBELIAN';
        $barang = Barang::get();
        $supplier = Supplier::get();
        $view=view('admin.pembelian.edit', compact('title','pembelian','barang','supplier'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, Pembelian $pembelian)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'barcode' => 'required',
            'jumlah' => 'required'
        ]);

        $pembelian->fill($request->all());
        $barang = Barang::where('barcode',$request->barcode)->first();
		$pembelian->nama_barang = $barang->nama_barang;
		$pembelian->kategori_id = $barang->kategori_id;
		$pembelian->satuan_id = $barang->satuan_id;
        
		$pembelian->jumlah = str_replace(".", "", $request->jumlah);
		$pembelian->user_id = Auth::user()->id;
    	$pembelian->save();
		
		return redirect('/pembelian')->with('status', 'Data Berhasil Diubah');
    }

    ## Hapus Data
    public function delete(Pembelian $pembelian)
    {
        $pembelian->delete();
        return redirect('/pembelian')->with('status', 'Data Berhasil Dihapus');
    }

    public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('upload/file_pembelian',$nama_file);
 
		// import data
		Excel::import(new PembelianImport, public_path('upload/file_pembelian/'.$nama_file));
 
        return redirect('/pembelian')->with('status', 'Data Barang Berhasil Diimport');
	}

}
