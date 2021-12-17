<?php

namespace App\Http\Controllers;

use App\Models\Layanan;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class LayananController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        $title = 'DATA LAYANAN';
        $layanan = Layanan::orderBy('id','DESC')->paginate(25)->onEachSide(1);
		return view('admin.layanan.index',compact('title','layanan'));
    }

	## Tampilkan Data Search
	public function search(Request $request)
    {
        $title = 'DATA LAYANAN';
        $layanan = $request->get('search');
        $layanan = Layanan::where('nama_layanan', 'LIKE', '%'.$layanan.'%')->orderBy('id','DESC')->paginate(25)->onEachSide(1);
        
        if($request->input('page')){
            return view('admin.layanan.index',compact('title','layanan'));
        } else {
            return view('admin.layanan.search',compact('title','layanan'));
        }
    }
	
    ## Tampilkan Form Create
    public function create()
    {
        $title = 'TAMBAH DATA LAYANAN';
		$view=view('admin.layanan.create',compact('title'));
        $view=$view->render();
        return $view;
    }

    ## Simpan Data
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_layanan' => 'required',
            'keterangan' => 'required',
            'persyaratan' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png|max:500'
        ]);

		$input['nama_layanan'] = $request->nama_layanan;
		$input['keterangan'] = $request->keterangan;
		$input['persyaratan'] = $request->persyaratan;

        if($request->file('gambar')){
			$input['gambar'] = time().'.'.$request->gambar->getClientOriginalExtension();
			$request->gambar->move(public_path('upload/layanan'), $input['gambar']);
    	}	

		$input['user_id'] = Auth::user()->id;
		
        Layanan::create($input);
		
		return redirect('/layanan')->with('status','Data Tersimpan');
    }

    ## Tampilkan Form Edit
    public function edit(Layanan $layanan)
    {
        $title = 'UBAH DATA LAYANAN';
        $view=view('admin.layanan.edit', compact('title','layanan'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, Layanan $layanan)
    {
        $this->validate($request, [
            'nama_layanan' => 'required',
            'keterangan' => 'required',
            'persyaratan' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png|max:500'
        ]);

        if($request->file('gambar') && $layanan->gambar){
            $pathToYourFile = public_path('upload/layanan/'.$layanan->gambar);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        $layanan->fill($request->all());
        
        if($request->file('gambar')){
            $filename = time().'.'.$request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('upload/layanan'), $filename);
            $layanan->gambar = $filename;
		}

		$layanan->user_id = Auth::user()->id;
    	$layanan->save();
		
		return redirect('/layanan')->with('status', 'Data Berhasil Diubah');
    }

    ## Hapus Data
    public function delete(Layanan $layanan)
    {
        $pathToYourFile = public_path('upload/layanan/'.$layanan->gambar);
        if(file_exists($pathToYourFile))
        {
            unlink($pathToYourFile);
        }

        $layanan->delete();
       
        return redirect('/layanan')->with('status', 'Data Berhasil Dihapus');
    }
}
