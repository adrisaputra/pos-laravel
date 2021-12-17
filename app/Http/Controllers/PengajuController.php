<?php

namespace App\Http\Controllers;

use App\Models\Pengaju;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PengajuController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        $title = 'DATA PENGAJU';
		$pengaju = Pengaju::where('group',14)->orderBy('status','DESC')->orderBy('id','DESC')->paginate(25)->onEachSide(1);
		return view('admin.pengaju.index',compact('title','pengaju'));
    }
	
	## Tampilkan Data Search
	public function search(Request $request)
    {
        $title = 'DATA PENGAJU';
        $pengaju = $request->get('search');
		$pengaju = Pengaju::where('group',14)
                    ->where(function ($query) use ($pengaju) {
                        $query->where('name', 'LIKE', '%'.$pengaju.'%')
                            ->orWhere('nama_lengkap', 'LIKE', '%'.$pengaju.'%')
                            ->orWhere('email', 'LIKE', '%'.$pengaju.'%')
                            ->orWhere('no_hp', 'LIKE', '%'.$pengaju.'%');
                    })
                    ->orderBy('status','DESC')->orderBy('id','DESC')->paginate(25)->onEachSide(1);
        
        if($request->input('page')){
            return view('admin.pengaju.index',compact('title','pengaju'));
        } else {
            return view('admin.pengaju.search',compact('title','pengaju'));
        }
    }
	
	## Tampilkan Form Create
	public function create()
    {
        $title = 'TAMBAH DATA PENGAJU';
        $view=view('admin.pengaju.create',compact('title'));
        $view=$view->render();
        return $view;
    }
	
	## Simpan Data
	public function store(Request $request)
    {
		$this->validate($request, [
            'name' => 'required|numeric|digits:18|unique:users',
            'email' => 'required|email|unique:users',
            'no_hp' => 'required|numeric',
            'password' => 'required|string|min:8|confirmed'
        ]);

		$input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['no_hp'] = $request->no_hp;
        $input['password'] = Hash::make($request->password);
        $input['group'] = 14;
        $input['status'] = 1;
        
        Pengaju::create($input);
		
		return redirect('/pengaju')->with('status','Data Tersimpan');

    }
	
	## Tampilkan Form Edit
    public function edit(Pengaju $pengaju)
    {
        $title = 'UBAH DATA PENGAJU';
        $view=view('admin.pengaju.edit', compact('title','pengaju'));
        $view=$view->render();
		return $view;
    }
	
	## Edit Data
    public function update(Request $request, Pengaju $pengaju)
    {
        if($request->password){
            $this->validate($request, [
                'email' => 'required|email',
                'nama_lengkap' => 'required',
                'no_hp' => 'required|numeric',
                'alamat' => 'required',
                'status' => 'required',
                'password' => 'required|string|min:8|confirmed'
            ]);
        } else {
            $this->validate($request, [
                'email' => 'required|email',
                'nama_lengkap' => 'required',
                'no_hp' => 'required|numeric',
                'alamat' => 'required',
                'status' => 'required'
            ]);
        }
         
		if($request->password){
            $pengaju->name = $request->name;
            $pengaju->nama_lengkap = $request->nama_lengkap;
            $pengaju->email = $request->email;
            $pengaju->password = Hash::make($request->password);
            $pengaju->no_hp = $request->no_hp;
            $pengaju->alamat = $request->alamat;
            $pengaju->group = 14;
            $pengaju->status = $request->status;
		} else {
            $pengaju->name = $request->name;
            $pengaju->nama_lengkap = $request->nama_lengkap;
            $pengaju->email = $request->email;
            $pengaju->no_hp = $request->no_hp;
            $pengaju->alamat = $request->alamat;
            $pengaju->group = 14;
            $pengaju->status = $request->status;
        }

        $pengaju->save();
        
		return redirect('/pengaju')->with('status', 'Data Berhasil Diubah');
    }

    ## Hapus Data
    public function delete(Pengaju $pengaju)
    {
        $pathToYourFile = public_path('upload/foto/'.$pengaju->foto);
        if(file_exists($pathToYourFile))
        {
            unlink($pathToYourFile);
        }
        
        $pengaju->delete();

		return redirect('/pengaju')->with('status', 'Data Berhasil Dihapus');
    }

    
}
