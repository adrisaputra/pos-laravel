<?php

namespace App\Http\Controllers;

use App\Models\User;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        $title = 'DATA PENGGUNA';
		$user = User::
                where(function ($query) {
                    $query->where('group', 1)
                        ->orWhere('group', 2)
                        ->orWhere('group', 3)
                        ->orWhere('group', 4)
                        ->orWhere('group', 5)
                        ->orWhere('group', 6)
                        ->orWhere('group', 7)
                        ->orWhere('group', 8)
                        ->orWhere('group', 9)
                        ->orWhere('group', 10)
                        ->orWhere('group', 11)
                        ->orWhere('group', 12)
                        ->orWhere('group', 13);
                })
                ->orderBy('id','DESC')->paginate(25)->onEachSide(1);
		return view('admin.user.index',compact('title','user'));
    }
	
	## Tampilkan Data Search
	public function search(Request $request)
    {
        $title = 'DATA PENGGUNA';
        $user = $request->get('search');
                $user = User:: where(function ($query) {
                    $query->where('group', 1)
                        ->orWhere('group', 2)
                        ->orWhere('group', 3)
                        ->orWhere('group', 4)
                        ->orWhere('group', 5)
                        ->orWhere('group', 6)
                        ->orWhere('group', 7)
                        ->orWhere('group', 8)
                        ->orWhere('group', 9)
                        ->orWhere('group', 10)
                        ->orWhere('group', 11)
                        ->orWhere('group', 12)
                        ->orWhere('group', 13);
                })
                ->where('name', 'LIKE', '%'.$user.'%')->orderBy('id','DESC')->paginate(25)->onEachSide(1);
        
        if($request->input('page')){
            return view('admin.user.index',compact('title','user'));
        } else {
            return view('admin.user.search',compact('title','user'));
        }
    }
	
	## Tampilkan Form Create
	public function create()
    {
        $title = 'TAMBAH DATA PENGGUNA';
        $view=view('admin.user.create',compact('title'));
        $view=$view->render();
        return $view;
    }
	
	## Simpan Data
	public function store(Request $request)
    {
		$this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'group' => 'required'
		]);
		
        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['password'] = Hash::make($request->password);
        $input['group'] = $request->group;
        $input['status'] = 1;
        User::create($input);
		
		return redirect('/user')->with('status','Data Tersimpan');

    }
	
	## Tampilkan Form Edit
    public function edit(User $user)
    {
        $title = 'UBAH DATA PENGGUNA';
        $view=view('admin.user.edit', compact('title','user'));
        $view=$view->render();
		return $view;
    }
	
	## Edit Data
    public function update(Request $request, User $user)
    {
        if($request->password){
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'password' => 'required|string|min:8|confirmed'
            ]);
        } else {
            $this->validate($request, [
                'name' => 'required|string|max:255'
            ]);
        }
         
		if($request->password){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->status = $request->status;
            $user->group = $request->group;
		} else {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->group = $request->group;
            $user->status = $request->status;
        }
        $user->save();
        
		return redirect('/user')->with('status', 'Data Berhasil Diubah');
    }

    ## Hapus Data
    public function delete(User $user)
    {
        // $user->status = 0;
        // $user->save();
        
        // $cek_pegawai = Pegawai::where('nip', $user->name)->value('id');
        // $pegawai = Pegawai::find($cek_pegawai);
        // $pegawai->status_hapus = 4;
    	// $pegawai->save();
        $user->delete();

		return redirect('/user')->with('status', 'Data Berhasil Dihapus');
    }

    ## Tampilkan Form Edit
    public function edit_profil()
    {
        $title = "PROFIL";
        $user = DB::table('users')->find(Auth::user()->id);
        $view=view('admin.user.profil', compact('user','title'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update_profil(Request $request, User $user)
    {
        if($request->get('current-password')){
            if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
                $this->validate($request, [
                    'email' => 'required|email',
                    'foto' => 'mimes:jpg,jpeg,png|max:300',
                    'current-password' => 'string|confirmed'
                ]);
            } 
        }
            
        if($request->get('password')){
            if(!(strcmp($request->get('password'), $request->get('password_confirmation'))) == 0){
                if($request->password){
                    $this->validate($request, [
                        'email' => 'required|email',
                        'password' => 'string|min:8|confirmed'
                    ]);
                }
            } 
        }

        if($request->password){
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:8'
            ]);
        } else {
            $this->validate($request, [
                'email' => 'required|email'
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
        
        return redirect('/user/edit_profil')->with('status', 'Data Berhasil Diubah');
    }
}
