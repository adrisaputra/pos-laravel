<?php

namespace App\Http\Controllers;

use App\Models\Barang;   //nama model
use App\Models\Kategori;   //nama model
use App\Models\Satuan;   //nama model
use App\Models\Gudang;   //nama model
use App\Imports\BarangImport;     // Import data Pegawai
use Maatwebsite\Excel\Facades\Excel; // Excel Library
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;
use Image;

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
        $barang = Barang::where(function ($query) use ($barang) {
                                $query->where('barcode', 'LIKE', '%'.$barang.'%')
                                    ->orWhere('nama_barang', 'LIKE', '%'.$barang.'%');
                            })->orderBy('id','DESC')->paginate(25)->onEachSide(1);
        
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
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'min_stok' => 'required',
            'full_stok' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png|max:500',
        ]);

        
        $barang = new Barang();
		$barang->barcode = $request->barcode;
		$barang->nama_barang = $request->nama_barang;
		$barang->kategori_id = $request->kategori_id;
		$barang->satuan_id = $request->satuan_id;
		$barang->harga_beli = str_replace(".", "", $request->harga_beli);
		$barang->harga_jual = str_replace(".", "", $request->harga_jual);

        if ($request->file('gambar')) {
            $barang->gambar = time() . '.' . $request->file('gambar')->getClientOriginalExtension();

            $request->file('gambar')->storeAs('public/upload/barang', $barang->gambar);
            $request->file('gambar')->storeAs('public/upload/barang/thumbnail', $barang->gambar);

            $thumbnailpath = public_path('storage/upload/barang/thumbnail/' . $barang->gambar);
            $img = Image::make($thumbnailpath)->resize(400, 150, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
        }

		$barang->user_id = Auth::user()->id;
        $barang->save();
		
        $gudang = new Gudang();
        $gudang->barang_id = $barang->id;
        $gudang->min_stok = str_replace(".", "", $request->min_stok);
        $gudang->full_stok = str_replace(".", "", $request->full_stok);
        $gudang->save();

		return redirect('/barang')->with('status','Data Tersimpan');
    }

    ## Tampilkan Form Edit
    public function edit(Barang $barang)
    {
        $title = 'UBAH DATA BARANG';
        $kategori = Kategori::get();
        $satuan = Satuan::get();
        $gudang = Gudang::where('barang_id', $barang->id)->first();
        $view=view('admin.barang.edit', compact('title','barang','kategori','satuan','gudang'));
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
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'min_stok' => 'required',
            'full_stok' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png|max:500',
        ]);
        
        if ($barang->gambar && $request->file('gambar') != "") {
            $image_path = public_path() . '/storage/upload/barang/thumbnail/' . $barang->image;
            $image_path2 = public_path() . '/storage/upload/gambar/' . $barang->image;
            unlink($image_path);
            unlink($image_path2);
        }

        $barang->fill($request->all());

        if ($request->file('gambar')) {

            $filename = time() . '.' . $request->file('gambar')->getClientOriginalExtension();

            $request->file('gambar')->storeAs('public/upload/gambar', $filename);
            $request->file('gambar')->storeAs('public/upload/gambar/thumbnail', $filename);

            $thumbnailpath = public_path('storage/upload/gambar/thumbnail/' . $filename);
            $img = Image::make($thumbnailpath)->resize(400, 150, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);

            $barang->image = $filename;
        }

		$barang->harga_beli = str_replace(".", "", $request->harga_beli);
		$barang->harga_jual = str_replace(".", "", $request->harga_jual);
		$barang->user_id = Auth::user()->id;
    	$barang->save();
		
        $gudang = Gudang::where('barang_id', $barang->id)->first();
        $gudang = Gudang::find($gudang->id);
        $gudang->min_stok = str_replace(".", "", $request->min_stok);
        $gudang->full_stok = str_replace(".", "", $request->full_stok);
        $gudang->save();

		return redirect('/barang')->with('status', 'Data Berhasil Diubah');
    }

    ## Hapus Data
    public function delete(Barang $barang)
    {
        $barang->delete();
        return redirect('/barang')->with('status', 'Data Berhasil Dihapus');
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
		$file->move('public/upload/file_barang',$nama_file);

		// import data
		Excel::import(new BarangImport, public_path('upload/file_barang/'.$nama_file));
 
        return redirect('/barang')->with('status', 'Data Barang Berhasil Diimport');
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
