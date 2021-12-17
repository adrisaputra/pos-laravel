<?php

namespace App\Http\Controllers;

use App\Models\User;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{

    public function registrasi()
    {
        $title = 'Registrasi';
        return view('admin.registrasi', compact('title'));
    }

    ## Simpan Data
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|numeric|digits:16|unique:users',
            'nama_lengkap' => 'required',
            'no_hp' => 'required|numeric',
            'alamat' => 'required',
            'password' => 'required|string|min:8|confirmed'
        ]);

		$input['name'] = $request->name;
		$input['nama_lengkap'] = $request->nama_lengkap;
        $input['email'] = $request->name."@gmail.com";
        $input['no_hp'] = $request->no_hp;
        $input['alamat'] = $request->alamat;
        $input['password'] = Hash::make($request->password);
        $input['group'] = 14;
        $input['status'] = 1;
        
        User::create($input);

		return redirect('login')->with('status','Registrasi Berhasil, Silahkan Login !');

    }

    ## Edit Data
    public function update(Request $request, User $user)
    {
        

        if($request->password){
            $this->validate($request, [
                'nama_lengkap' => 'required',
                'no_hp' => 'required|numeric',
                'alamat' => 'required',
                'opd_id' => 'required',
                'foto' => 'mimes:jpg,jpeg,png|max:300',
                'password' => 'required|string|min:8|confirmed'
            ]);
        } else {
            $this->validate($request, [
                'nama_lengkap' => 'required',
                'no_hp' => 'required|numeric',
                'alamat' => 'required',
                'opd_id' => 'required',
                'foto' => 'mimes:jpg,jpeg,png|max:300'
            ]);
        }

		$user->fill($request->all());
        if($request->password){
            $user->password = Hash::make($request->password);
        } else {
            $cek_user = User::where('id', Auth::user()->id)->get();
            $cek_user->toArray();
            $user->password = $cek_user[0]->password;
        }
		
		if($request->file('foto') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('upload/foto'), $filename);
            $user->foto = $filename;
		}
		
    	$user->save();
		
		return redirect('/page/akun')->with('status', 'Data Berhasil Diubah');
    }
}
