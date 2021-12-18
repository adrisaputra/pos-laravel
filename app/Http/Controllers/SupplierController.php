<?php

namespace App\Http\Controllers;

use App\Models\Supplier;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        $title = 'DATA SUPPLIER';
        $supplier = Supplier::orderBy('id','DESC')->paginate(25)->onEachSide(1);
		return view('admin.supplier.index',compact('title','supplier'));
    }

	## Tampilkan Data Search
	public function search(Request $request)
    {
        $title = 'DATA SUPPLIER';
        $supplier = $request->get('search');
        $supplier = Supplier::where('nama_supplier', 'LIKE', '%'.$supplier.'%')->orderBy('id','DESC')->paginate(25)->onEachSide(1);
        
        if($request->input('page')){
            return view('admin.supplier.index',compact('title','supplier'));
        } else {
            return view('admin.supplier.search',compact('title','supplier'));
        }
    }
	
    ## Tampilkan Form Create
    public function create()
    {
        $title = 'TAMBAH DATA SUPPLIER';
		$view=view('admin.supplier.create',compact('title'));
        $view=$view->render();
        return $view;
    }

    ## Simpan Data
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_supplier' => 'required',
            'telepon' => 'numeric'
        ]);

		$input['nama_supplier'] = $request->nama_supplier;
		$input['telepon'] = $request->telepon;
		$input['alamat'] = $request->alamat;
		$input['deskripsi'] = $request->deskripsi;
		$input['user_id'] = Auth::user()->id;
		
        Supplier::create($input);
		
		return redirect('/supplier')->with('status','Data Tersimpan');
    }

    ## Tampilkan Form Edit
    public function edit(Supplier $supplier)
    {
        $title = 'UBAH DATA SUPPLIER';
        $view=view('admin.supplier.edit', compact('title','supplier'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, Supplier $supplier)
    {
        $this->validate($request, [
            'nama_supplier' => 'required',
            'telepon' => 'numeric'
        ]);

        $supplier->fill($request->all());
		$supplier->user_id = Auth::user()->id;
    	$supplier->save();
		
		return redirect('/supplier')->with('status', 'Data Berhasil Diubah');
    }

    ## Hapus Data
    public function delete(Supplier $supplier)
    {
        $supplier->delete();
        return redirect('/supplier')->with('status', 'Data Berhasil Dihapus');
    }
}
