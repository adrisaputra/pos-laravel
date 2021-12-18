<?php

namespace App\Http\Controllers;

use App\Models\User;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {
        if(Auth::user()->group==1){
            
            $user = User::count();
            return view('admin.beranda', compact('user'));
        
        } else if(Auth::user()->group==14){

            $layanan = Layanan::orderBy('id','ASC')->get();
            $pengajuan = Pengajuan::where('status_hapus',0)->count();
            $pengajuan_masuk = Pengajuan::where(function ($query) {
                                    $query->where('status', 0)
                                        ->orWhere('status', 5);
                                })->where('status_hapus',0)->count();
            $pengajuan_di_proses = Pengajuan::where('status',1)->where('status_hapus',0)->count();
            $pengajuan_di_perbaiki = Pengajuan::where('status',2)->where('status_hapus',0)->count();
            $pengajuan_selesai_di_proses = Pengajuan::where(function ($query) {
                                                $query->where('status', 3)
                                                    ->orWhere('status', 6);
                                            })->where('status_hapus',0)->count();
            $pengajuan_tidak_di_proses = Pengajuan::where('status',4)->where('status_hapus',0)->count();
            return view('admin.beranda', compact('layanan','pengajuan','pengajuan_masuk','pengajuan_di_proses','pengajuan_di_perbaiki','pengajuan_selesai_di_proses','pengajuan_tidak_di_proses'));
        
        } else {

            $user = User::count();
            $pengajuan = Pengajuan::where('eksekutor',Auth::user()->group)->where('status_hapus',0)->count();
            $pengajuan_masuk = Pengajuan::where('eksekutor',Auth::user()->group)->
                                where(function ($query) {
                                    $query->where('status', 0)
                                        ->orWhere('status', 5);
                                })->where('status_hapus',0)->count();
            $pengajuan_di_proses = Pengajuan::where('eksekutor',Auth::user()->group)->where('status',1)->where('status_hapus',0)->count();
            $pengajuan_di_perbaiki = Pengajuan::where('eksekutor',Auth::user()->group)->where('status',2)->where('status_hapus',0)->count();
            $pengajuan_selesai_di_proses = Pengajuan::where('eksekutor',Auth::user()->group)
                                            ->where(function ($query) {
                                                $query->where('status', 3)
                                                    ->orWhere('status', 6);
                                            })->where('status_hapus',0)->count();
            $pengajuan_tidak_di_proses = Pengajuan::where('eksekutor',Auth::user()->group)->where('status',4)->where('status_hapus',0)->count();
            return view('admin.beranda', compact('user','pengajuan','pengajuan_masuk','pengajuan_di_proses','pengajuan_di_perbaiki','pengajuan_selesai_di_proses','pengajuan_tidak_di_proses'));
        
        }
        
    }
}
