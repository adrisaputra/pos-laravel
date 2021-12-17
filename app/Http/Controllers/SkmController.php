<?php

namespace App\Http\Controllers;

use App\Models\Skm;   //nama model
use App\Models\Pengajuan;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class SkmController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Simpan Data
    public function store($skm, Pengajuan $pengajuan)
    {
        $count_skm = Skm::where('nik',Auth::user()->name)->count();
        $count_pengajuan =  Pengajuan::where('nik',Auth::user()->name)->where('status',3)->count();

        if($count_skm==0 && $count_pengajuan>0){
            $input['nik'] = Auth::user()->name;
            $input['skm'] = $skm;
            $input['user_id'] = Auth::user()->id;
            
            Skm::create($input);
            
            $pengajuan->status = 6;
            $pengajuan->save();          
        } else {

            Skm::where('nik',Auth::user()->name )->delete();

            $input['nik'] = Auth::user()->name;
            $input['skm'] = $skm;
            $input['user_id'] = Auth::user()->id;
            
            Skm::create($input);
            
            $pengajuan->status = 6;
            $pengajuan->save();    
        }
		
		return redirect('upload/hasil/'.$pengajuan->hasil);
    }

}
