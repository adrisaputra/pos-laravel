<?php

namespace App\Http\Controllers;

use App\Models\Kategori;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        $title = 'DATA KATEGORI';
        $kategori = Kategori::orderBy('id','DESC')->paginate(25)->onEachSide(1);
		return view('admin.kategori.index',compact('title','kategori'));
    }

	## Tampilkan Data Search
	public function search(Request $request)
    {
        $title = 'DATA KATEGORI';
        $kategori = $request->get('search');
        $kategori = Kategori::where('nama_kategori', 'LIKE', '%'.$kategori.'%')->orderBy('id','DESC')->paginate(25)->onEachSide(1);
        
        if($request->input('page')){
            return view('admin.kategori.index',compact('title','kategori'));
        } else {
            return view('admin.kategori.search',compact('title','kategori'));
        }
    }
	
    ## Tampilkan Form Create
    public function create()
    {
        $title = 'TAMBAH DATA KATEGORI';
		$view=view('admin.kategori.create',compact('title'));
        $view=$view->render();
        return $view;
    }

    ## Simpan Data
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required'
        ]);

		$input['nama_kategori'] = $request->nama_kategori;
		$input['user_id'] = Auth::user()->id;
		
        Kategori::create($input);
		
		return redirect('/kategori')->with('status','Data Tersimpan');
    }

    ## Tampilkan Form Edit
    public function edit(Kategori $kategori)
    {
        $title = 'UBAH DATA KATEGORI';
        $view=view('admin.kategori.edit', compact('title','kategori'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, Kategori $kategori)
    {
        $this->validate($request, [
            'nama_kategori' => 'required'
        ]);

        $kategori->fill($request->all());
		$kategori->user_id = Auth::user()->id;
    	$kategori->save();
		
		return redirect('/kategori')->with('status', 'Data Berhasil Diubah');
    }

    ## Hapus Data
    public function delete(Kategori $kategori)
    {
        $kategori->delete();
        return redirect('/kategori')->with('status', 'Data Berhasil Dihapus');
    }
}
