<?php

namespace App\Http\Controllers;

use App\Models\Profil;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        $title = 'DATA PROFIL';
        $profil = DB::table('profil_tbl')->orderBy('id','DESC')->paginate(10);
		return view('admin.profil.index',compact('title','profil'));
    }

    ## Tampilkan Form Edit
    public function edit(Profil $profil)
    {
        $title = 'UBAH DATA PROFIL';
        $view=view('admin.profil.edit', compact('title','profil'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, Profil $profil)
    {
         $this->validate($request, [
            'nama_toko' => 'required',
            'alamat' => 'required',
            'telp' => 'required|numeric',
            'email' => 'required'
        ]);

		$profil->fill($request->all());
        
    	$profil->save();
		
		return redirect('/profil')->with('status', 'Data Berhasil Diubah');
    }
}
