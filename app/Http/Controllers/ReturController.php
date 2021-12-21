<?php

namespace App\Http\Controllers;

use App\Models\Retur;   //nama model
use App\Models\Barang;   //nama model
use App\Models\Supplier;   //nama model
use App\Imports\ReturImport;     // Import data Pegawai
use Maatwebsite\Excel\Facades\Excel; // Excel Library
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class ReturController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        $title = 'DATA RETUR';
        $retur = Retur::orderBy('id','DESC')->paginate(25)->onEachSide(1);
		return view('admin.retur.index',compact('title','retur'));
    }

	## Tampilkan Data Search
	public function search(Request $request)
    {
        $title = 'DATA RETUR';
        $retur = $request->get('search');
        $retur = Retur::where(function ($query) use ($retur) {
                                    $query->where('barcode', 'LIKE', '%'.$retur.'%')
                                        ->orWhere('nama_barang', 'LIKE', '%'.$retur.'%');
                                })->orderBy('id','DESC')->paginate(25)->onEachSide(1);
        
        if($request->input('page')){
            return view('admin.retur.index',compact('title','retur'));
        } else {
            return view('admin.retur.search',compact('title','retur'));
        }
    }
	
    ## Tampilkan Form Create
    public function create()
    {
        $title = 'TAMBAH DATA RETUR';
        $barang = Barang::get();
		$view=view('admin.retur.create',compact('title','barang'));
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
        
        $barang = Barang::where('barcode',$request->barcode)->first();
		$input['nama_barang'] = $barang->nama_barang;
		$input['kategori_id'] = $barang->kategori_id;
		$input['satuan_id'] = $barang->satuan_id;
        
		$input['jumlah'] = str_replace(".", "", $request->jumlah);
		$input['catatan'] = $request->catatan;
		$input['user_id'] = Auth::user()->id;
		
        Retur::create($input);
		
		return redirect('/retur')->with('status','Data Tersimpan');
    }

    ## Tampilkan Form Edit
    public function edit(Retur $retur)
    {
        $title = 'UBAH DATA RETUR';
        $barang = Barang::get();
        $view=view('admin.retur.edit', compact('title','retur','barang'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, Retur $retur)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'barcode' => 'required',
            'jumlah' => 'required'
        ]);

        $retur->fill($request->all());
        $barang = Barang::where('barcode',$request->barcode)->first();
		$retur->nama_barang = $barang->nama_barang;
		$retur->kategori_id = $barang->kategori_id;
		$retur->satuan_id = $barang->satuan_id;
        
		$retur->jumlah = str_replace(".", "", $request->jumlah);
		$retur->user_id = Auth::user()->id;
    	$retur->save();
		
		return redirect('/retur')->with('status', 'Data Berhasil Diubah');
    }

    ## Hapus Data
    public function delete(Retur $retur)
    {
        $retur->delete();
        return redirect('/retur')->with('status', 'Data Berhasil Dihapus');
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
		$file->move('upload/file_retur',$nama_file);
 
		// import data
		Excel::import(new ReturImport, public_path('upload/file_retur/'.$nama_file));
 
        return redirect('/retur')->with('status', 'Data Barang Berhasil Diimport');
	}
}
