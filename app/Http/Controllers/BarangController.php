<?php

namespace App\Http\Controllers;

use App\Models\Barang;   //nama model
use App\Models\Kategori;   //nama model
use App\Models\Satuan;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        $title = 'DATA BARANG';
        $barang = Barang::orderBy('id','DESC')->paginate(25)->onEachSide(1);
		return view('admin.barang.index',compact('title','barang'));
    }

	## Tampilkan Data Search
	public function search(Request $request)
    {
        $title = 'DATA BARANG';
        $barang = $request->get('search');
        $barang = Barang::where('nama_barang', 'LIKE', '%'.$barang.'%')->orderBy('id','DESC')->paginate(25)->onEachSide(1);
        
        if($request->input('page')){
            return view('admin.barang.index',compact('title','barang'));
        } else {
            return view('admin.barang.search',compact('title','barang'));
        }
    }
	
    ## Tampilkan Form Create
    public function create()
    {
        $title = 'TAMBAH DATA BARANG';
        $kategori = Kategori::get();
        $satuan = Satuan::get();
		$view=view('admin.barang.create',compact('title','kategori','satuan'));
        $view=$view->render();
        return $view;
    }

    ## Simpan Data
    public function store(Request $request)
    {
        $this->validate($request, [
            'barcode' => 'required',
            'nama_barang' => 'required',
            'satuan_id' => 'required',
            'stok_awal' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
        ]);

		$input['barcode'] = $request->barcode;
		$input['nama_barang'] = $request->nama_barang;
		$input['kategori_id'] = $request->kategori_id;
		$input['satuan_id'] = $request->satuan_id;
		$input['stok_awal'] = str_replace(".", "", $request->stok_awal);
		$input['harga_beli'] = str_replace(".", "", $request->harga_beli);
		$input['harga_jual'] = str_replace(".", "", $request->harga_jual);
		$input['user_id'] = Auth::user()->id;
		
        Barang::create($input);
		
		return redirect('/barang')->with('status','Data Tersimpan');
    }

    ## Tampilkan Form Edit
    public function edit(Barang $barang)
    {
        $title = 'UBAH DATA BARANG';
        $kategori = Kategori::get();
        $satuan = Satuan::get();
        $view=view('admin.barang.edit', compact('title','barang','kategori','satuan'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, Barang $barang)
    {
        $this->validate($request, [
            'barcode' => 'required',
            'nama_barang' => 'required',
            'satuan_id' => 'required',
            'stok_awal' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
        ]);

        $barang->fill($request->all());
		$barang->stok_awal = str_replace(".", "", $request->stok_awal);
		$barang->harga_beli = str_replace(".", "", $request->harga_beli);
		$barang->harga_jual = str_replace(".", "", $request->harga_jual);
		$barang->user_id = Auth::user()->id;
    	$barang->save();
		
		return redirect('/barang')->with('status', 'Data Berhasil Diubah');
    }

    ## Hapus Data
    public function delete(Barang $barang)
    {
        $barang->delete();
        return redirect('/barang')->with('status', 'Data Berhasil Dihapus');
    }

	## Tampilkan Data Get
	public function get(Request $request)
    {
        $barang = $request->get('search');
        $barang = Barang::where(function ($query) use ($barang) {
                                $query->where('barcode', 'LIKE', '%'.$barang.'%')
                                    ->orWhere('nama_barang', 'LIKE', '%'.$barang.'%');
                            })->orderBy('id','DESC')->limit(5)->get();
        
        $response = array();
            foreach($barang as $v){
                $response[] = array(
                    "id"=>$v->barcode,
                    "text"=>$v->barcode." || ".$v->nama_barang
                );
            }
        
        return response()->json($response); 

    }
	
}
