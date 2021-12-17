<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;   //nama model
use App\Models\Layanan;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;
class PengajuanController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        if(Auth::user()->group==1){

            if(request()->segment(1)=='pengajuan_masuk'){
                $title = 'DATA PENGAJUAN MASUK';
                $pengajuan = Pengajuan::where(function ($query) {
                                $query->where('status', 0)
                                    ->orWhere('status', 5);
                            })->where('status_hapus',0)->orderBy('id','DESC')->paginate(25)->onEachSide(1);
    
            } else if(request()->segment(1)=='pengajuan_di_proses'){
                $title = 'DATA PENGAJUAN DI PROSES';
                $pengajuan = Pengajuan::where('status',1)->where('status_hapus',0)->orderBy('id','DESC')->paginate(25)->onEachSide(1);
    
            } else if(request()->segment(1)=='pengajuan_di_perbaiki'){
                $title = 'DATA PENGAJUAN DI PERBAIKI';
                $pengajuan = Pengajuan::where('status',2)->where('status_hapus',0)->orderBy('id','DESC')->paginate(25)->onEachSide(1);
    
            } else if(request()->segment(1)=='pengajuan_selesai_di_proses'){
                $title = 'DATA PENGAJUAN SELESAI DI PROSES';
                $pengajuan = Pengajuan::where(function ($query) {
                                $query->where('status', 3)
                                    ->orWhere('status', 6);
                            })->where('status_hapus',0)->orderBy('id','DESC')->paginate(25)->onEachSide(1);
    
            } else if(request()->segment(1)=='pengajuan_tidak_di_proses'){
                $title = 'DATA PENGAJUAN TIDAK DI PROSES';
                $pengajuan = Pengajuan::where('status',4)
                ->where('status_hapus',0)->orderBy('id','DESC')->paginate(25)->onEachSide(1);
            }

        } else if(Auth::user()->group==14){

            if(request()->segment(1)=='pengajuan_masuk'){
                $title = 'DATA PENGAJUAN MASUK';
                $pengajuan = Pengajuan::
                            where(function ($query) {
                                $query->where('status', 0)
                                    ->orWhere('status', 5);
                            })->where('user_id',Auth::user()->id)->where('status_hapus',0)->orderBy('id','DESC')->paginate(25)->onEachSide(1);
    
            } else if(request()->segment(1)=='pengajuan_di_proses'){
                $title = 'DATA PENGAJUAN DI PROSES';
                $pengajuan = Pengajuan::where('status',1)->where('user_id',Auth::user()->id)->where('status_hapus',0)->orderBy('id','DESC')->paginate(25)->onEachSide(1);
    
            } else if(request()->segment(1)=='pengajuan_di_perbaiki'){
                $title = 'DATA PENGAJUAN DI PERBAIKI';
                $pengajuan = Pengajuan::where('status',2)->where('user_id',Auth::user()->id)->where('status_hapus',0)->orderBy('id','DESC')->paginate(25)->onEachSide(1);
    
            } else if(request()->segment(1)=='pengajuan_selesai_di_proses'){
                $title = 'DATA PENGAJUAN SELESAI DI PROSES';
                $pengajuan = Pengajuan::where(function ($query) {
                                $query->where('status', 3)
                                    ->orWhere('status', 6);
                            })->where('user_id',Auth::user()->id)->where('status_hapus',0)->orderBy('id','DESC')->paginate(25)->onEachSide(1);
    
            } else if(request()->segment(1)=='pengajuan_tidak_di_proses'){
                $title = 'DATA PENGAJUAN TIDAK DI PROSES';
                $pengajuan = Pengajuan::where('status',4)->where('user_id',Auth::user()->id)->where('status_hapus',0)->orderBy('id','DESC')->paginate(25)->onEachSide(1);
            }

        } else {

            if(request()->segment(1)=='pengajuan_masuk'){
                $title = 'DATA PENGAJUAN MASUK';
                $pengajuan = Pengajuan::where(function ($query) {
                                $query->where('status', 0)
                                    ->orWhere('status', 5);
                            })->where('eksekutor',Auth::user()->group)->where('status_hapus',0)->orderBy('id','DESC')->paginate(25)->onEachSide(1);
    
            } else if(request()->segment(1)=='pengajuan_di_proses'){
                $title = 'DATA PENGAJUAN DI PROSES';
                $pengajuan = Pengajuan::where('status',1)->where('eksekutor',Auth::user()->group)->where('status_hapus',0)->orderBy('id','DESC')->paginate(25)->onEachSide(1);
    
            } else if(request()->segment(1)=='pengajuan_di_perbaiki'){
                $title = 'DATA PENGAJUAN DI PERBAIKI';
                $pengajuan = Pengajuan::where('status',2)->where('eksekutor',Auth::user()->group)->where('status_hapus',0)->orderBy('id','DESC')->paginate(25)->onEachSide(1);
    
            } else if(request()->segment(1)=='pengajuan_selesai_di_proses'){
                $title = 'DATA PENGAJUAN SELESAI DI PROSES';
                $pengajuan = Pengajuan::where(function ($query) {
                                $query->where('status', 3)
                                    ->orWhere('status', 6);
                            })->where('eksekutor',Auth::user()->group)->where('status_hapus',0)->orderBy('id','DESC')->paginate(25)->onEachSide(1);
    
            } else if(request()->segment(1)=='pengajuan_tidak_di_proses'){
                $title = 'DATA PENGAJUAN TIDAK DI PROSES';
                $pengajuan = Pengajuan::where('status',4)->where('eksekutor',Auth::user()->group)->where('status_hapus',0)->orderBy('id','DESC')->paginate(25)->onEachSide(1);
            }

        }

		return view('admin.pengajuan.index',compact('title','pengajuan'));
    }

	## Tampilkan Data Search
	public function search(Request $request)
    {
        $pengajuan = $request->get('search');

        if(Auth::user()->group==1){

            if(request()->segment(1)=='pengajuan_masuk'){
                $title = 'DATA PENGAJUAN MASUK';
                $pengajuan = Pengajuan::
                            where(function ($query) {
                                $query->where('status', 0)
                                    ->orWhere('status', 5);
                            })
                            ->where('status_hapus',0)
                            ->where(function ($query) use ($pengajuan) {
                                $query->where('nik', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('no_hp', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('alamat', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama_layanan', 'LIKE', '%'.$pengajuan.'%');
                            })
                            ->orderBy('id','DESC')->paginate(25)->onEachSide(1);
    
            } else if(request()->segment(1)=='pengajuan_di_proses'){
                $title = 'DATA PENGAJUAN DI PROSES';
                $pengajuan = Pengajuan::where('status',1)
                            ->where('status_hapus',0)
                            ->where(function ($query) use ($pengajuan) {
                                $query->where('nik', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('no_hp', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('alamat', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama_layanan', 'LIKE', '%'.$pengajuan.'%');
                            })
                            ->orderBy('id','DESC')->paginate(25)->onEachSide(1);
    
            } else if(request()->segment(1)=='pengajuan_di_perbaiki'){
                $title = 'DATA PENGAJUAN DI PERBAIKI';
                $pengajuan = Pengajuan::where('status',2)
                            ->where('status_hapus',0)
                            ->where(function ($query) use ($pengajuan) {
                                $query->where('nik', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('no_hp', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('alamat', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama_layanan', 'LIKE', '%'.$pengajuan.'%');
                            })
                            ->orderBy('id','DESC')->paginate(25)->onEachSide(1);
    
            } else if(request()->segment(1)=='pengajuan_selesai_di_proses'){
                $title = 'DATA PENGAJUAN SELESAI DI PROSES';
                $pengajuan = Pengajuan::where(function ($query) {
                                $query->where('status', 3)
                                    ->orWhere('status', 6);
                            })
                            ->where('status_hapus',0)
                            ->where(function ($query) use ($pengajuan) {
                                $query->where('nik', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('no_hp', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('alamat', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama_layanan', 'LIKE', '%'.$pengajuan.'%');
                            })
                            ->orderBy('id','DESC')->paginate(25)->onEachSide(1);
    
            } else if(request()->segment(1)=='pengajuan_tidak_di_proses'){
                $title = 'DATA PENGAJUAN TIDAK DI PROSES';
                $pengajuan = Pengajuan::where('status',4)
                            ->where('status_hapus',0)
                            ->where(function ($query) use ($pengajuan) {
                                $query->where('nik', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('no_hp', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('alamat', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama_layanan', 'LIKE', '%'.$pengajuan.'%');
                            })
                            ->orderBy('id','DESC')->paginate(25)->onEachSide(1);
            }

        } else if(Auth::user()->group==14){
        
            if(request()->segment(1)=='pengajuan_masuk'){
                $title = 'DATA PENGAJUAN MASUK';
                $pengajuan = Pengajuan::
                            where(function ($query) {
                                $query->where('status', 0)
                                    ->orWhere('status', 5);
                            })
                            ->where('user_id',Auth::user()->id)
                            ->where('status_hapus',0)
                            ->where(function ($query) use ($pengajuan) {
                                $query->where('nik', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('no_hp', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('alamat', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama_layanan', 'LIKE', '%'.$pengajuan.'%');
                            })
                            ->orderBy('id','DESC')->paginate(25)->onEachSide(1);
    
            } else if(request()->segment(1)=='pengajuan_di_proses'){
                $title = 'DATA PENGAJUAN DI PROSES';
                $pengajuan = Pengajuan::where('status',1)
                            ->where('status_hapus',0)
                            ->where('user_id',Auth::user()->id)
                            ->where(function ($query) use ($pengajuan) {
                                $query->where('nik', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('no_hp', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('alamat', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama_layanan', 'LIKE', '%'.$pengajuan.'%');
                            })
                            ->orderBy('id','DESC')->paginate(25)->onEachSide(1);
    
            } else if(request()->segment(1)=='pengajuan_di_perbaiki'){
                $title = 'DATA PENGAJUAN DI PERBAIKI';
                $pengajuan = Pengajuan::where('status',2)
                            ->where('status_hapus',0)
                            ->where('user_id',Auth::user()->id)
                            ->where(function ($query) use ($pengajuan) {
                                $query->where('nik', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('no_hp', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('alamat', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama_layanan', 'LIKE', '%'.$pengajuan.'%');
                            })
                            ->orderBy('id','DESC')->paginate(25)->onEachSide(1);
    
            } else if(request()->segment(1)=='pengajuan_selesai_di_proses'){
                $title = 'DATA PENGAJUAN SELESAI DI PROSES';
                $pengajuan = Pengajuan::where(function ($query) {
                                $query->where('status', 3)
                                    ->orWhere('status', 6);
                            })
                            ->where('user_id',Auth::user()->id)
                            ->where('status_hapus',0)
                            ->where(function ($query) use ($pengajuan) {
                                $query->where('nik', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('no_hp', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('alamat', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama_layanan', 'LIKE', '%'.$pengajuan.'%');
                            })
                            ->orderBy('id','DESC')->paginate(25)->onEachSide(1);
    
            } else if(request()->segment(1)=='pengajuan_tidak_di_proses'){
                $title = 'DATA PENGAJUAN TIDAK DI PROSES';
                $pengajuan = Pengajuan::where('status',4)
                            ->where('status_hapus',0)
                            ->where('user_id',Auth::user()->id)
                            ->where(function ($query) use ($pengajuan) {
                                $query->where('nik', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('no_hp', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('alamat', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama_layanan', 'LIKE', '%'.$pengajuan.'%');
                            })
                            ->orderBy('id','DESC')->paginate(25)->onEachSide(1);
            }

        } else {

            if(request()->segment(1)=='pengajuan_masuk'){
                $title = 'DATA PENGAJUAN MASUK';
                $pengajuan = Pengajuan::
                            where(function ($query) {
                                $query->where('status', 0)
                                    ->orWhere('status', 5);
                            })
                            ->where('status_hapus',0)
                            ->where('eksekutor',Auth::user()->group)
                            ->where(function ($query) use ($pengajuan) {
                                $query->where('nik', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('no_hp', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('alamat', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama_layanan', 'LIKE', '%'.$pengajuan.'%');
                            })
                            ->orderBy('id','DESC')->paginate(25)->onEachSide(1);
    
            } else if(request()->segment(1)=='pengajuan_di_proses'){
                $title = 'DATA PENGAJUAN DI PROSES';
                $pengajuan = Pengajuan::where('status',1)
                            ->where('status_hapus',0)
                            ->where('eksekutor',Auth::user()->group)
                            ->where(function ($query) use ($pengajuan) {
                                $query->where('nik', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('no_hp', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('alamat', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama_layanan', 'LIKE', '%'.$pengajuan.'%');
                            })
                            ->orderBy('id','DESC')->paginate(25)->onEachSide(1);
    
            } else if(request()->segment(1)=='pengajuan_di_perbaiki'){
                $title = 'DATA PENGAJUAN DI PERBAIKI';
                $pengajuan = Pengajuan::where('status',2)
                            ->where('status_hapus',0)
                            ->where('eksekutor',Auth::user()->group)
                            ->where(function ($query) use ($pengajuan) {
                                $query->where('nik', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('no_hp', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('alamat', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama_layanan', 'LIKE', '%'.$pengajuan.'%');
                            })
                            ->orderBy('id','DESC')->paginate(25)->onEachSide(1);
    
            } else if(request()->segment(1)=='pengajuan_selesai_di_proses'){
                $title = 'DATA PENGAJUAN SELESAI DI PROSES';
                $pengajuan = Pengajuan::where(function ($query) {
                                $query->where('status', 3)
                                    ->orWhere('status', 6);
                            })
                            ->where('status_hapus',0)
                            ->where('eksekutor',Auth::user()->group)
                            ->where(function ($query) use ($pengajuan) {
                                $query->where('nik', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('no_hp', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('alamat', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama_layanan', 'LIKE', '%'.$pengajuan.'%');
                            })
                            ->orderBy('id','DESC')->paginate(25)->onEachSide(1);
    
            } else if(request()->segment(1)=='pengajuan_tidak_di_proses'){
                $title = 'DATA PENGAJUAN TIDAK DI PROSES';
                $pengajuan = Pengajuan::where('status',4)
                            ->where('status_hapus',0)
                            ->where('eksekutor',Auth::user()->group)
                            ->where(function ($query) use ($pengajuan) {
                                $query->where('nik', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('no_hp', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('alamat', 'LIKE', '%'.$pengajuan.'%')
                                    ->orWhere('nama_layanan', 'LIKE', '%'.$pengajuan.'%');
                            })
                            ->orderBy('id','DESC')->paginate(25)->onEachSide(1);
            }

        }

        
        
        
        if($request->input('page')){
            return view('admin.pengajuan.index',compact('title','pengajuan'));
        } else {
            return view('admin.pengajuan.search',compact('title','pengajuan'));
        }
    }

	## Tampilkan Form Edit
    public function create(Layanan $layanan)
    {
        $title = 'BUAT PENGAJUAN';

        switch($layanan->id){
            case 1  : $view=view('admin.pengajuan.create_iumk', compact('title','layanan')); break;
            case 2  : $view=view('admin.pengajuan.create_sekretariat', compact('title','layanan')); break;
            case 4  : $view=view('admin.pengajuan.create_akta_kematian', compact('title','layanan')); break;
            case 5  : $view=view('admin.pengajuan.create_ahli_waris', compact('title','layanan')); break;
            case 6  : $view=view('admin.pengajuan.create_domisili', compact('title','layanan')); break;
            case 7  : $view=view('admin.pengajuan.create_bpjs_bpu', compact('title','layanan')); break;
            case 9  : $view=view('admin.pengajuan.create_kartu_keluarga', compact('title','layanan')); break;
            case 10  : $view=view('admin.pengajuan.create_akta_kelahiran', compact('title','layanan')); break;
            case 11  : $view=view('admin.pengajuan.create_kia', compact('title','layanan')); break;
            case 12 : $view=view('admin.pengajuan.create_pacak_kapal', compact('title','layanan')); break;
            case 13 : $view=view('admin.pengajuan.create_pencaker', compact('title','layanan')); break;
            case 14 : $view=view('admin.pengajuan.create_pernikahan', compact('title','layanan')); break;
        }
        
        $view=$view->render();
        return $view;
    }

    ## Simpan Data
    public function store(Request $request)
    {
        if($request->layanan_id==1){
            $this->validate($request, [
                'ktp' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'kartu_keluarga' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'foto' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'surat_keterangan_dari_desa' => 'required|mimes:jpg,jpeg,png,pdf|max:3000'
            ]);
        } else if($request->layanan_id==2){
            $this->validate($request, [
                'surat_pengantar_rt' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'ktp' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'kartu_keluarga' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'akta_pendirian' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'surat_keterangan_terdaftar' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'bukti_lunas_pbb' => 'required|mimes:jpg,jpeg,png,pdf|max:3000'
            ]);
        } else if($request->layanan_id==4){
            $this->validate($request, [
                'formulir_akta_kematian' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'ktp' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'kartu_keluarga' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'surat_keterangan_kematian' => 'required|mimes:jpg,jpeg,png,pdf|max:3000'
            ]);
        } else if($request->layanan_id==5){
            $this->validate($request, [
                'skaw' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'akta_kematian' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'buku_akta_nikah' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'akta_kelahiran' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'kartu_keluarga' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'ktp' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'buku_lunas_pbb' => 'required|mimes:jpg,jpeg,png,pdf|max:3000'
            ]);
        } else if($request->layanan_id==6){
            $this->validate($request, [
                'ktp' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'kartu_keluarga' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'surat_pengantar_rt' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'surat_permohonan' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'eksekutor' => 'required',
            ]);
        } else if($request->layanan_id==7){
            if($request->kategori==1){
                $this->validate($request, [
                    'ktp' => 'required|mimes:jpg,jpeg,png,pdf|max:3000'
                ]);
            } else {
                $this->validate($request, [
                    'kartu_bpjs' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'ktp2' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'kartu_keluarga' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'suket_bekerja' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'suket_berhenti_bekerja' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'suket_pengunduran_diri' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'penetapan_phk' => 'required|mimes:jpg,jpeg,png,pdf|max:3000'
                ]);
            }
        } else if($request->layanan_id==9){
            if($request->kategori==1){
                $this->validate($request, [
                    'surat_permohonan' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'pernyataan_domisili' => 'required|mimes:jpg,jpeg,png,pdf|max:3000'
                ]);
            } else if($request->kategori==2){
                $this->validate($request, [
                    'surat_keterangan_hilang' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'ktp' => 'required|mimes:jpg,jpeg,png,pdf|max:3000'
                ]);
            } else if($request->kategori==3){
                $this->validate($request, [
                    'kartu_keluarga_lama' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'formulir_kk' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'ktp2' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'surat_nikah' => 'required|mimes:jpg,jpeg,png,pdf|max:3000'
                ]);
            } else if($request->kategori==4){
                $this->validate($request, [
                    'kartu_keluarga_lama2' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'ktp3' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'akta_kematian2' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'surat_keterangan_dari_desa2' => 'mimes:jpg,jpeg,png,pdf|max:3000'
                ]);
            } else if($request->kategori==5){
                $this->validate($request, [
                    'kartu_keluarga_lama3' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'skp_wni' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                ]);
            } else {
                $this->validate($request, [
                    'kartu_keluarga_lama4' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'ktp4' => 'required|mimes:jpg,jpeg,png,pdf|max:3000'
                ]);
            }
        } else if($request->layanan_id==10){
            if($request->kategori==1){
                $this->validate($request, [
                    'formulir_akta_kelahiran' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'suket_lahir' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'kartu_keluarga' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'ktp' => 'required|mimes:jpg,jpeg,png,pdf|max:3000'
                ]);
            } else if($request->kategori==2){
                $this->validate($request, [
                    'formulir_pengangkatan_anak' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'akta_kelahiran' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'kartu_keluarga2' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'ktp2' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'persetujuan_pengadilan' => 'required|mimes:jpg,jpeg,png,pdf|max:3000'
                ]);
            } else if($request->kategori==3){
                $this->validate($request, [
                    'formulir_akta_kelahiran2' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'suket_lahir2' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'kartu_keluarga3' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'ktp3' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'sptjm' => 'required|mimes:jpg,jpeg,png,pdf|max:3000'
                ]);
            } else {
                $this->validate($request, [
                    'formulir_akta_kelahiran3' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'suket_lahir3' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'kartu_keluarga4' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'ktp4' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                    'buku_nikah' => 'required|mimes:jpg,jpeg,png,pdf|max:3000'
                ]);
            } 
        } else if($request->layanan_id==11){
            $this->validate($request, [
                'kartu_keluarga' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'akta_kelahiran' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'foto' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'ktp' => 'required|mimes:jpg,jpeg,png,pdf|max:3000'
            ]);
        } else if($request->layanan_id==12){
            $this->validate($request, [
                'ktp' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'keterangan_jual_beli_kapal' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'foto_kapal' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'surat_permohonan' => 'required|mimes:jpg,jpeg,png,pdf|max:3000'
            ]);
        } else if($request->layanan_id==13){
            $this->validate($request, [
                'ijazah_terakhir' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'transkrip_nilai' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'foto' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'sertifikat' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'ktp' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'berat_badan' => 'required|numeric',
                'tinggi_badan' => 'required|numeric',
                'tujuan_perusahaan' => 'required'
            ]);
        } else if($request->layanan_id==14){
            $this->validate($request, [
                'ktp' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
                'surat_pernyataan' => 'required|mimes:jpg,jpeg,png,pdf|max:3000'
            ]);
        }
        
		$input['no_pengajuan'] = date('YmdHis').Auth::user()->id;
		$input['nik'] = Auth::user()->name;
		$input['nama'] = Auth::user()->nama_lengkap;
		$input['no_hp'] = Auth::user()->no_hp;
		$input['alamat'] = Auth::user()->alamat;

        if($request->layanan_id==1){
            $folder = "iumk";
            $input['eksekutor'] = 2;
        } else if($request->layanan_id==2){
            $folder = "sekretariat";
            $input['eksekutor'] = 2;
        } else if($request->layanan_id==4){
            $folder = "akta_kematian";
            $input['eksekutor'] = 8;
        } else if($request->layanan_id==5){
            $folder = "ahli_waris";
            $input['eksekutor'] = 2;
        } else if($request->layanan_id==6){
            $folder = "domisili";
            $input['eksekutor'] = $request->eksekutor;
        } else if($request->layanan_id==7){
            if($request->kategori==1){
                $folder = "bpjs_bpu";
            } else {
                $folder = "bpjs_jht";
            }
            $input['eksekutor'] = 9;
        } else if($request->layanan_id==9){
            if($request->kategori==1){
                $folder = "kk_baru";
            } else if($request->kategori==2){
                $folder = "kk_hilang";
            } else if($request->kategori==3){
                $folder = "kk_perkawinan";
            } else if($request->kategori==4){
                $folder = "kk_perubahan_data";
            } else if($request->kategori==5){
                $folder = "kk_pindah_datang";
            } else {
                $folder = "kk_rusak";
            }
            $input['eksekutor'] = 8;
        } else if($request->layanan_id==10){
            if($request->kategori==1){
                $folder = "akta_kelahiran_anak_ibu";
            } else if($request->kategori==2){
                $folder = "akta_kelahiran_pengangkatan_anak";
            } else if($request->kategori==3){
                $folder = "akta_kelahiran_tidak_tercatat";
            } else {
                $folder = "akta_kelahiran_tercatat";
            }
            $input['eksekutor'] = 8;
        } else if($request->layanan_id==11){
            $folder = "kia";
            $input['eksekutor'] = 8;
        } else if($request->layanan_id==12){
            $folder = "pacak_kapal";
            $input['eksekutor'] = 2;
        } else if($request->layanan_id==13){
            $folder = "pencaker";
            $input['eksekutor'] = 9;
        } else if($request->layanan_id==14){
            $folder = "pernikahan";
            $input['eksekutor'] = 2;
        }

        if($request->file('ktp')){
            $input['ktp'] = $input['no_pengajuan'].'.'.$request->ktp->getClientOriginalExtension();
            $request->ktp->move(public_path('upload/'.$folder.'/ktp'), $input['ktp']);
        }	

        if($request->file('ktp2')){
            $input['ktp'] = $input['no_pengajuan'].'.'.$request->ktp2->getClientOriginalExtension();
            $request->ktp2->move(public_path('upload/'.$folder.'/ktp'), $input['ktp']);
        }	

        if($request->file('ktp3')){
            $input['ktp'] = $input['no_pengajuan'].'.'.$request->ktp3->getClientOriginalExtension();
            $request->ktp3->move(public_path('upload/'.$folder.'/ktp'), $input['ktp']);
        }	

        if($request->file('ktp4')){
            $input['ktp'] = $input['no_pengajuan'].'.'.$request->ktp4->getClientOriginalExtension();
            $request->ktp4->move(public_path('upload/'.$folder.'/ktp'), $input['ktp']);
        }	

        if($request->file('kartu_keluarga')){
            $input['kartu_keluarga'] = $input['no_pengajuan'].'.'.$request->kartu_keluarga->getClientOriginalExtension();
            $request->kartu_keluarga->move(public_path('upload/'.$folder.'/kartu_keluarga'), $input['kartu_keluarga']);
        }	

        if($request->file('kartu_keluarga2')){
            $input['kartu_keluarga'] = $input['no_pengajuan'].'.'.$request->kartu_keluarga2->getClientOriginalExtension();
            $request->kartu_keluarga2->move(public_path('upload/'.$folder.'/kartu_keluarga'), $input['kartu_keluarga']);
        }	

        if($request->file('kartu_keluarga3')){
            $input['kartu_keluarga'] = $input['no_pengajuan'].'.'.$request->kartu_keluarga3->getClientOriginalExtension();
            $request->kartu_keluarga3->move(public_path('upload/'.$folder.'/kartu_keluarga'), $input['kartu_keluarga']);
        }	

        if($request->file('kartu_keluarga4')){
            $input['kartu_keluarga'] = $input['no_pengajuan'].'.'.$request->kartu_keluarga4->getClientOriginalExtension();
            $request->kartu_keluarga4->move(public_path('upload/'.$folder.'/kartu_keluarga'), $input['kartu_keluarga']);
        }	

        if($request->file('kartu_keluarga_lama')){
            $input['kartu_keluarga_lama'] = $input['no_pengajuan'].'.'.$request->kartu_keluarga_lama->getClientOriginalExtension();
            $request->kartu_keluarga_lama->move(public_path('upload/'.$folder.'/kartu_keluarga_lama'), $input['kartu_keluarga_lama']);
        }	

        if($request->file('kartu_keluarga_lama2')){
            $input['kartu_keluarga_lama'] = $input['no_pengajuan'].'.'.$request->kartu_keluarga_lama2->getClientOriginalExtension();
            $request->kartu_keluarga_lama2->move(public_path('upload/'.$folder.'/kartu_keluarga_lama'), $input['kartu_keluarga_lama']);
        }	

        if($request->file('kartu_keluarga_lama3')){
            $input['kartu_keluarga_lama'] = $input['no_pengajuan'].'.'.$request->kartu_keluarga_lama3->getClientOriginalExtension();
            $request->kartu_keluarga_lama3->move(public_path('upload/'.$folder.'/kartu_keluarga_lama'), $input['kartu_keluarga_lama']);
        }	

        if($request->file('kartu_keluarga_lama4')){
            $input['kartu_keluarga_lama'] = $input['no_pengajuan'].'.'.$request->kartu_keluarga_lama4->getClientOriginalExtension();
            $request->kartu_keluarga_lama4->move(public_path('upload/'.$folder.'/kartu_keluarga_lama'), $input['kartu_keluarga_lama']);
        }	

        if($request->file('foto')){
            $input['foto'] = $input['no_pengajuan'].'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('upload/'.$folder.'/foto'), $input['foto']);
        }	

        if($request->file('surat_keterangan_dari_desa')){
            $input['surat_keterangan_dari_desa'] = $input['no_pengajuan'].'.'.$request->surat_keterangan_dari_desa->getClientOriginalExtension();
            $request->surat_keterangan_dari_desa->move(public_path('upload/'.$folder.'/surat_keterangan_dari_desa'), $input['surat_keterangan_dari_desa']);
        }	
        
        if($request->file('surat_keterangan_dari_desa2')){
            $input['surat_keterangan_dari_desa'] = $input['no_pengajuan'].'.'.$request->surat_keterangan_dari_desa2->getClientOriginalExtension();
            $request->surat_keterangan_dari_desa2->move(public_path('upload/'.$folder.'/surat_keterangan_dari_desa'), $input['surat_keterangan_dari_desa']);
        }	
        
        if($request->file('ijazah_terakhir')){
            $input['ijazah_terakhir'] = $input['no_pengajuan'].'.'.$request->ijazah_terakhir->getClientOriginalExtension();
            $request->ijazah_terakhir->move(public_path('upload/'.$folder.'/ijazah_terakhir'), $input['ijazah_terakhir']);
        }	

        if($request->file('transkrip_nilai')){
            $input['transkrip_nilai'] = $input['no_pengajuan'].'.'.$request->transkrip_nilai->getClientOriginalExtension();
            $request->transkrip_nilai->move(public_path('upload/'.$folder.'/transkrip_nilai'), $input['transkrip_nilai']);
        }	

        if($request->file('sertifikat')){
            $input['sertifikat'] = $input['no_pengajuan'].'.'.$request->sertifikat->getClientOriginalExtension();
            $request->sertifikat->move(public_path('upload/'.$folder.'/sertifikat'), $input['sertifikat']);
        }	

        if($request->file('formulir_akta_kematian')){
            $input['formulir_akta_kematian'] = $input['no_pengajuan'].'.'.$request->formulir_akta_kematian->getClientOriginalExtension();
            $request->formulir_akta_kematian->move(public_path('upload/'.$folder.'/formulir_akta_kematian'), $input['formulir_akta_kematian']);
        }	

        if($request->file('surat_keterangan_kematian')){
            $input['surat_keterangan_kematian'] = $input['no_pengajuan'].'.'.$request->surat_keterangan_kematian->getClientOriginalExtension();
            $request->surat_keterangan_kematian->move(public_path('upload/'.$folder.'/surat_keterangan_kematian'), $input['surat_keterangan_kematian']);
        }	

        if($request->file('surat_pengantar_rt')){
            $input['surat_pengantar_rt'] = $input['no_pengajuan'].'.'.$request->surat_pengantar_rt->getClientOriginalExtension();
            $request->surat_pengantar_rt->move(public_path('upload/'.$folder.'/surat_pengantar_rt'), $input['surat_pengantar_rt']);
        }	

        if($request->file('akta_pendirian')){
            $input['akta_pendirian'] = $input['no_pengajuan'].'.'.$request->akta_pendirian->getClientOriginalExtension();
            $request->akta_pendirian->move(public_path('upload/'.$folder.'/akta_pendirian'), $input['akta_pendirian']);
        }	

        if($request->file('surat_keterangan_terdaftar')){
            $input['surat_keterangan_terdaftar'] = $input['no_pengajuan'].'.'.$request->surat_keterangan_terdaftar->getClientOriginalExtension();
            $request->surat_keterangan_terdaftar->move(public_path('upload/'.$folder.'/surat_keterangan_terdaftar'), $input['surat_keterangan_terdaftar']);
        }	

        if($request->file('bukti_lunas_pbb')){
            $input['bukti_lunas_pbb'] = $input['no_pengajuan'].'.'.$request->bukti_lunas_pbb->getClientOriginalExtension();
            $request->bukti_lunas_pbb->move(public_path('upload/'.$folder.'/bukti_lunas_pbb'), $input['bukti_lunas_pbb']);
        }	

        if($request->file('skaw')){
            $input['skaw'] = $input['no_pengajuan'].'.'.$request->skaw->getClientOriginalExtension();
            $request->skaw->move(public_path('upload/'.$folder.'/skaw'), $input['skaw']);
        }	

        if($request->file('akta_kematian')){
            $input['akta_kematian'] = $input['no_pengajuan'].'.'.$request->akta_kematian->getClientOriginalExtension();
            $request->akta_kematian->move(public_path('upload/'.$folder.'/akta_kematian'), $input['akta_kematian']);
        }	

        if($request->file('akta_kematian2')){
            $input['akta_kematian'] = $input['no_pengajuan'].'.'.$request->akta_kematian2->getClientOriginalExtension();
            $request->akta_kematian2->move(public_path('upload/'.$folder.'/akta_kematian'), $input['akta_kematian']);
        }	

        if($request->file('buku_akta_nikah')){
            $input['buku_akta_nikah'] = $input['no_pengajuan'].'.'.$request->buku_akta_nikah->getClientOriginalExtension();
            $request->buku_akta_nikah->move(public_path('upload/'.$folder.'/buku_akta_nikah'), $input['buku_akta_nikah']);
        }	

        if($request->file('akta_kelahiran')){
            $input['akta_kelahiran'] = $input['no_pengajuan'].'.'.$request->akta_kelahiran->getClientOriginalExtension();
            $request->akta_kelahiran->move(public_path('upload/'.$folder.'/akta_kelahiran'), $input['akta_kelahiran']);
        }	

        if($request->file('buku_lunas_pbb')){
            $input['buku_lunas_pbb'] = $input['no_pengajuan'].'.'.$request->buku_lunas_pbb->getClientOriginalExtension();
            $request->buku_lunas_pbb->move(public_path('upload/'.$folder.'/buku_lunas_pbb'), $input['buku_lunas_pbb']);
        }	

        if($request->file('kartu_bpjs')){
            $input['kartu_bpjs'] = $input['no_pengajuan'].'.'.$request->kartu_bpjs->getClientOriginalExtension();
            $request->kartu_bpjs->move(public_path('upload/'.$folder.'/kartu_bpjs'), $input['kartu_bpjs']);
        }	
        
        if($request->file('suket_bekerja')){
            $input['suket_bekerja'] = $input['no_pengajuan'].'.'.$request->suket_bekerja->getClientOriginalExtension();
            $request->suket_bekerja->move(public_path('upload/'.$folder.'/suket_bekerja'), $input['suket_bekerja']);
        }	
        
        if($request->file('suket_berhenti_bekerja')){
            $input['suket_berhenti_bekerja'] = $input['no_pengajuan'].'.'.$request->suket_berhenti_bekerja->getClientOriginalExtension();
            $request->suket_berhenti_bekerja->move(public_path('upload/'.$folder.'/suket_berhenti_bekerja'), $input['suket_berhenti_bekerja']);
        }	
        
        if($request->file('suket_pengunduran_diri')){
            $input['suket_pengunduran_diri'] = $input['no_pengajuan'].'.'.$request->suket_pengunduran_diri->getClientOriginalExtension();
            $request->suket_pengunduran_diri->move(public_path('upload/'.$folder.'/suket_pengunduran_diri'), $input['suket_pengunduran_diri']);
        }	
        
        if($request->file('penetapan_phk')){
            $input['penetapan_phk'] = $input['no_pengajuan'].'.'.$request->penetapan_phk->getClientOriginalExtension();
            $request->penetapan_phk->move(public_path('upload/'.$folder.'/penetapan_phk'), $input['penetapan_phk']);
        }	
        
        if($request->file('surat_permohonan')){
            $input['surat_permohonan'] = $input['no_pengajuan'].'.'.$request->surat_permohonan->getClientOriginalExtension();
            $request->surat_permohonan->move(public_path('upload/'.$folder.'/surat_permohonan'), $input['surat_permohonan']);
        }	
        
        if($request->file('surat_kuasa')){
            $input['surat_kuasa'] = $input['no_pengajuan'].'.'.$request->surat_kuasa->getClientOriginalExtension();
            $request->surat_kuasa->move(public_path('upload/'.$folder.'/surat_kuasa'), $input['surat_kuasa']);
        }	
        
        if($request->file('keterangan_jual_beli_kapal')){
            $input['keterangan_jual_beli_kapal'] = $input['no_pengajuan'].'.'.$request->keterangan_jual_beli_kapal->getClientOriginalExtension();
            $request->keterangan_jual_beli_kapal->move(public_path('upload/'.$folder.'/keterangan_jual_beli_kapal'), $input['keterangan_jual_beli_kapal']);
        }	
        
        if($request->file('foto_kapal')){
            $input['foto_kapal'] = $input['no_pengajuan'].'.'.$request->foto_kapal->getClientOriginalExtension();
            $request->foto_kapal->move(public_path('upload/'.$folder.'/foto_kapal'), $input['foto_kapal']);
        }	
        
        if($request->file('pernyataan_domisili')){
            $input['pernyataan_domisili'] = $input['no_pengajuan'].'.'.$request->pernyataan_domisili->getClientOriginalExtension();
            $request->pernyataan_domisili->move(public_path('upload/'.$folder.'/pernyataan_domisili'), $input['pernyataan_domisili']);
        }	
        
        if($request->file('surat_keterangan_hilang')){
            $input['surat_keterangan_hilang'] = $input['no_pengajuan'].'.'.$request->surat_keterangan_hilang->getClientOriginalExtension();
            $request->surat_keterangan_hilang->move(public_path('upload/'.$folder.'/surat_keterangan_hilang'), $input['surat_keterangan_hilang']);
        }	
        
        if($request->file('formulir_kk')){
            $input['formulir_kk'] = $input['no_pengajuan'].'.'.$request->formulir_kk->getClientOriginalExtension();
            $request->formulir_kk->move(public_path('upload/'.$folder.'/formulir_kk'), $input['formulir_kk']);
        }	
        
        if($request->file('surat_nikah')){
            $input['surat_nikah'] = $input['no_pengajuan'].'.'.$request->surat_nikah->getClientOriginalExtension();
            $request->surat_nikah->move(public_path('upload/'.$folder.'/surat_nikah'), $input['surat_nikah']);
        }	
        
        if($request->file('skp_wni')){
            $input['skp_wni'] = $input['no_pengajuan'].'.'.$request->skp_wni->getClientOriginalExtension();
            $request->skp_wni->move(public_path('upload/'.$folder.'/skp_wni'), $input['skp_wni']);
        }	
        
        if($request->file('formulir_akta_kelahiran')){
            $input['formulir_akta_kelahiran'] = $input['no_pengajuan'].'.'.$request->formulir_akta_kelahiran->getClientOriginalExtension();
            $request->formulir_akta_kelahiran->move(public_path('upload/'.$folder.'/formulir_akta_kelahiran'), $input['formulir_akta_kelahiran']);
        }	
        
        if($request->file('formulir_akta_kelahiran2')){
            $input['formulir_akta_kelahiran'] = $input['no_pengajuan'].'.'.$request->formulir_akta_kelahiran2->getClientOriginalExtension();
            $request->formulir_akta_kelahiran2->move(public_path('upload/'.$folder.'/formulir_akta_kelahiran'), $input['formulir_akta_kelahiran']);
        }	
        
        if($request->file('formulir_akta_kelahiran3')){
            $input['formulir_akta_kelahiran'] = $input['no_pengajuan'].'.'.$request->formulir_akta_kelahiran3->getClientOriginalExtension();
            $request->formulir_akta_kelahiran3->move(public_path('upload/'.$folder.'/formulir_akta_kelahiran'), $input['formulir_akta_kelahiran']);
        }	
        
        if($request->file('suket_lahir')){
            $input['suket_lahir'] = $input['no_pengajuan'].'.'.$request->suket_lahir->getClientOriginalExtension();
            $request->suket_lahir->move(public_path('upload/'.$folder.'/suket_lahir'), $input['suket_lahir']);
        }	
        
        if($request->file('suket_lahir2')){
            $input['suket_lahir'] = $input['no_pengajuan'].'.'.$request->suket_lahir2->getClientOriginalExtension();
            $request->suket_lahir2->move(public_path('upload/'.$folder.'/suket_lahir'), $input['suket_lahir']);
        }	
        
        if($request->file('suket_lahir3')){
            $input['suket_lahir'] = $input['no_pengajuan'].'.'.$request->suket_lahir3->getClientOriginalExtension();
            $request->suket_lahir3->move(public_path('upload/'.$folder.'/suket_lahir'), $input['suket_lahir']);
        }	
        
        if($request->file('formulir_pengangkatan_anak')){
            $input['formulir_pengangkatan_anak'] = $input['no_pengajuan'].'.'.$request->formulir_pengangkatan_anak->getClientOriginalExtension();
            $request->formulir_pengangkatan_anak->move(public_path('upload/'.$folder.'/formulir_pengangkatan_anak'), $input['formulir_pengangkatan_anak']);
        }	
        
        if($request->file('persetujuan_pengadilan')){
            $input['persetujuan_pengadilan'] = $input['no_pengajuan'].'.'.$request->persetujuan_pengadilan->getClientOriginalExtension();
            $request->persetujuan_pengadilan->move(public_path('upload/'.$folder.'/persetujuan_pengadilan'), $input['persetujuan_pengadilan']);
        }	
        
        if($request->file('sptjm')){
            $input['sptjm'] = $input['no_pengajuan'].'.'.$request->sptjm->getClientOriginalExtension();
            $request->sptjm->move(public_path('upload/'.$folder.'/sptjm'), $input['sptjm']);
        }	
        
        if($request->file('buku_nikah')){
            $input['buku_nikah'] = $input['no_pengajuan'].'.'.$request->buku_nikah->getClientOriginalExtension();
            $request->buku_nikah->move(public_path('upload/'.$folder.'/buku_nikah'), $input['buku_nikah']);
        }	
        
        if($request->file('surat_pernyataan')){
            $input['surat_pernyataan'] = $input['no_pengajuan'].'.'.$request->surat_pernyataan->getClientOriginalExtension();
            $request->surat_pernyataan->move(public_path('upload/'.$folder.'/surat_pernyataan'), $input['surat_pernyataan']);
        }	
        
        $input['berat_badan'] = $request->berat_badan;
        $input['tinggi_badan'] = $request->tinggi_badan;
        $input['tujuan_perusahaan'] = $request->tujuan_perusahaan;
        $input['nama_layanan'] = $request->nama_layanan;
        $input['layanan_id'] = $request->layanan_id;
        $input['kategori'] = $request->kategori;
		$input['tanggal'] = date('Y-m-d');
		$input['user_id'] = Auth::user()->id;
		
        Pengajuan::create($input);
		
		return redirect('/pengajuan_masuk')->with('status','Pengajuan Terkirim');
    }

    ## Edit Data
    public function proses($status, Pengajuan $pengajuan)
    {
		$pengajuan->status = $status;
		$pengajuan->admin_id = Auth::user()->id;
    	$pengajuan->save();
		
        if($status==1){
            $status_alert = "status";
            $alert = "Pengajuan Diproses";
        } else if($status==2){
            $status_alert = "status";
            $alert = "Pengajuan Diperbaiki";
        } else if($status==3){
            $status_alert = "status3";
            $alert = "Pengajuan Selesai Diproses";
        }else if($status==4){
            $status_alert = "status2";
            $alert = "Pengajuan Tidak Diproses";
        }

        if(request()->segment(1)=='pengajuan_masuk'){
            return redirect('/pengajuan_masuk')->with($status_alert, $alert);
        } else if(request()->segment(1)=='pengajuan_di_proses'){
		    return redirect('/pengajuan_di_proses')->with($status_alert, $alert);
        } else if(request()->segment(1)=='pengajuan_selesai_di_proses'){
		    return redirect('/pengajuan_selesai_di_proses')->with($status_alert, $alert);
        } else if(request()->segment(1)=='pengajuan_tidak_di_proses'){ 
		    return redirect('/pengajuan_tidak_di_proses')->with($status_alert, $alert);
        }
    }

    ## Tampilkan Form Edit
    public function perbaiki(Pengajuan $pengajuan)
    {
        $title = 'UBAH DATA PENGAJUAN';

        switch($pengajuan->layanan_id){
            case 1 :  $view=view('admin.pengajuan.edit_iumk', compact('title','pengajuan'));break;
            case 2 :  $view=view('admin.pengajuan.edit_sekretariat', compact('title','pengajuan'));break;
            case 4 :  $view=view('admin.pengajuan.edit_akta_kematian', compact('title','pengajuan'));break;
            case 5 :  $view=view('admin.pengajuan.edit_ahli_waris', compact('title','pengajuan'));break;
            case 6  : $view=view('admin.pengajuan.edit_domisili', compact('title','pengajuan')); break;
            case 7  : $view=view('admin.pengajuan.edit_bpjs_bpu', compact('title','pengajuan')); break;
            case 9  : $view=view('admin.pengajuan.edit_kartu_keluarga', compact('title','pengajuan')); break;
            case 10 : $view=view('admin.pengajuan.edit_akta_kelahiran', compact('title','pengajuan')); break;
            case 11 : $view=view('admin.pengajuan.edit_kia', compact('title','pengajuan'));break;
            case 12 : $view=view('admin.pengajuan.edit_pacak_kapal', compact('title','pengajuan')); break;
            case 13 : $view=view('admin.pengajuan.edit_pencaker', compact('title','pengajuan')); break;
            case 14 : $view=view('admin.pengajuan.edit_pernikahan', compact('title','pengajuan')); break;
        }
        
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function edit_pengaju(Request $request, Pengajuan $pengajuan)
    {
        
        if($request->layanan_id==1){
            $this->validate($request, [
                'ktp' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'kartu_keluarga' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'foto' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'surat_keterangan_dari_desa' => 'mimes:jpg,jpeg,png,pdf|max:3000'
            ]);
        } else if($request->layanan_id==2){
            $this->validate($request, [
                'surat_pengantar_rt' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'ktp' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'kartu_keluarga' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'akta_pendirian' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'surat_keterangan_terdaftar' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'bukti_lunas_pbb' => 'mimes:jpg,jpeg,png,pdf|max:3000'
            ]);
        } else if($request->layanan_id==4){
            $this->validate($request, [
                'formulir_akta_kematian' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'ktp' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'kartu_keluarga' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'surat_keterangan_kematian' => 'mimes:jpg,jpeg,png,pdf|max:3000'
            ]);
        } else if($request->layanan_id==5){
            $this->validate($request, [
                'skaw' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'akta_kematian' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'buku_akta_nikah' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'akta_kelahiran' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'kartu_keluarga' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'ktp' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'buku_lunas_pbb' => 'mimes:jpg,jpeg,png,pdf|max:3000'
            ]);
        } else if($request->layanan_id==6){
            $this->validate($request, [
                'ktp' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'kartu_keluarga' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'surat_pengantar_rt' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'surat_permohonan' => 'mimes:jpg,jpeg,png,pdf|max:3000'
            ]);
        } else if($request->layanan_id==7){
            if($request->kategori==1){
                $this->validate($request, [
                    'ktp' => 'mimes:jpg,jpeg,png,pdf|max:3000'
                ]);
            } else {
                $this->validate($request, [
                    'kartu_bpjs' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'ktp' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'kartu_keluarga' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'suket_bekerja' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'suket_berhenti_bekerja' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'suket_pengunduran_diri' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'penetapan_phk' => 'mimes:jpg,jpeg,png,pdf|max:3000'
                ]);
            }
        } else if($request->layanan_id==9){
            if($request->kategori==1){
                $this->validate($request, [
                    'surat_permohonan' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'pernyataan_domisili' => 'mimes:jpg,jpeg,png,pdf|max:3000'
                ]);
            } else if($request->kategori==2){
                $this->validate($request, [
                    'surat_keterangan_hilang' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'ktp' => 'mimes:jpg,jpeg,png,pdf|max:3000'
                ]);
            } else if($request->kategori==3){
                $this->validate($request, [
                    'kartu_keluarga_lama' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'formulir_kk' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'ktp2' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'surat_nikah' => 'mimes:jpg,jpeg,png,pdf|max:3000'
                ]);
            } else if($request->kategori==4){
                $this->validate($request, [
                    'kartu_keluarga_lama2' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'ktp3' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'akta_kematian2' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'surat_keterangan_dari_desa2' => 'mimes:jpg,jpeg,png,pdf|max:3000'
                ]);
            } else if($request->kategori==5){
                $this->validate($request, [
                    'kartu_keluarga_lama3' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'skp_wni' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                ]);
            } else {
                $this->validate($request, [
                    'kartu_keluarga_lama4' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'ktp4' => 'mimes:jpg,jpeg,png,pdf|max:3000'
                ]);
            }
        } else if($request->layanan_id==10){
            if($request->kategori==1){
                $this->validate($request, [
                    'formulir_akta_kelahiran' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'suket_lahir' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'kartu_keluarga' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'ktp' => 'mimes:jpg,jpeg,png,pdf|max:3000'
                ]);
            } else if($request->kategori==2){
                $this->validate($request, [
                    'formulir_pengangkatan_anak' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'akta_kelahiran' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'kartu_keluarga2' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'ktp2' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'persetujuan_pengadilan' => 'mimes:jpg,jpeg,png,pdf|max:3000'
                ]);
            } else if($request->kategori==3){
                $this->validate($request, [
                    'formulir_akta_kelahiran2' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'suket_lahir2' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'kartu_keluarga3' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'ktp3' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'sptjm' => 'mimes:jpg,jpeg,png,pdf|max:3000'
                ]);
            } else {
                $this->validate($request, [
                    'formulir_akta_kelahiran3' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'suket_lahir3' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'kartu_keluarga4' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'ktp4' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                    'buku_nikah' => 'mimes:jpg,jpeg,png,pdf|max:3000'
                ]);
            } 
        } else if($request->layanan_id==11){
            $this->validate($request, [
                'kartu_keluarga' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'akta_kelahiran' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'foto' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'ktp' => 'mimes:jpg,jpeg,png,pdf|max:3000'
            ]);
        } else if($request->layanan_id==12){
            $this->validate($request, [
                'ktp' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'keterangan_jual_beli_kapal' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'foto_kapal' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'surat_permohonan' => 'mimes:jpg,jpeg,png,pdf|max:3000'
            ]);
        } else if($request->layanan_id==13){
            $this->validate($request, [
                'ijazah_terakhir' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'transkrip_nilai' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'foto' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'sertifikat' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'ktp' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'berat_badan' => 'required|numeric',
                'tinggi_badan' => 'required|numeric',
                'tujuan_perusahaan' => 'required'
            ]);
        } else if($request->layanan_id==14){
            $this->validate($request, [
                'ktp' => 'mimes:jpg,jpeg,png,pdf|max:3000',
                'surat_pernyataan' => 'mimes:jpg,jpeg,png,pdf|max:3000',
            ]);
        }

        if($request->layanan_id==1){
            $folder = "iumk";
            $input['eksekutor'] = 2;
        } else if($request->layanan_id==2){
            $folder = "sekretariat";
            $input['eksekutor'] = 2;
        } else if($request->layanan_id==4){
            $folder = "akta_kematian";
            $input['eksekutor'] = 8;
        } else if($request->layanan_id==5){
            $folder = "ahli_waris";
            $input['eksekutor'] = 2;
        } else if($request->layanan_id==6){
            $folder = "domisili";
            $input['eksekutor'] = $request->eksekutor;
        } else if($request->layanan_id==7){
            if($request->kategori==1){
                $folder = "bpjs_bpu";
            } else {
                $folder = "bpjs_jht";
            }
            $input['eksekutor'] = 9;
        } else if($request->layanan_id==9){
            if($request->kategori==1){
                $folder = "kk_baru";
            } else if($request->kategori==2){
                $folder = "kk_hilang";
            } else if($request->kategori==3){
                $folder = "kk_perkawinan";
            } else if($request->kategori==4){
                $folder = "kk_perubahan_data";
            } else if($request->kategori==5){
                $folder = "kk_pindah_datang";
            } else {
                $folder = "kk_rusak";
            }
            $input['eksekutor'] = 8;
        } else if($request->layanan_id==10){
            if($request->kategori==1){
                $folder = "akta_kelahiran_anak_ibu";
            } else if($request->kategori==2){
                $folder = "akta_kelahiran_pengangkatan_anak";
            } else if($request->kategori==3){
                $folder = "akta_kelahiran_tidak_tercatat";
            } else {
                $folder = "akta_kelahiran_tercatat";
            }
            $input['eksekutor'] = 8;
        } else if($request->layanan_id==11){
            $folder = "kia";
            $input['eksekutor'] = 8;
        } else if($request->layanan_id==12){
            $folder = "pacak_kapal";
            $input['eksekutor'] = 2;
        } else if($request->layanan_id==13){
            $folder = "pencaker";
            $input['eksekutor'] = 9;
        } else if($request->layanan_id==14){
            $folder = "pernikahan";
            $input['eksekutor'] = 2;
        }

        ## IUMK
        if($request->file('ktp') && $pengajuan->ktp){
            $pathToYourFile = public_path('upload/'.$folder.'/ktp/'.$pengajuan->ktp);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('kartu_keluarga') && $pengajuan->kartu_keluarga){
            $pathToYourFile = public_path('upload/'.$folder.'/kartu_keluarga/'.$pengajuan->kartu_keluarga);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('foto') && $pengajuan->foto){
            $pathToYourFile = public_path('upload/'.$folder.'/foto/'.$pengajuan->foto);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('surat_keterangan_dari_desa') && $pengajuan->surat_keterangan_dari_desa){
            $pathToYourFile = public_path('upload/'.$folder.'/surat_keterangan_dari_desa/'.$pengajuan->surat_keterangan_dari_desa);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('ijazah_terakhir') && $pengajuan->ijazah_terakhir){
            $pathToYourFile = public_path('upload/'.$folder.'/ijazah_terakhir/'.$pengajuan->ijazah_terakhir);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('transkrip_nilai') && $pengajuan->transkrip_nilai){
            $pathToYourFile = public_path('upload/'.$folder.'/transkrip_nilai/'.$pengajuan->transkrip_nilai);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('sertifikat') && $pengajuan->sertifikat){
            $pathToYourFile = public_path('upload/'.$folder.'/sertifikat/'.$pengajuan->sertifikat);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('formulir_akta_kematian') && $pengajuan->formulir_akta_kematian){
            $pathToYourFile = public_path('upload/'.$folder.'/formulir_akta_kematian/'.$pengajuan->formulir_akta_kematian);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('surat_keterangan_kematian') && $pengajuan->surat_keterangan_kematian){
            $pathToYourFile = public_path('upload/'.$folder.'/surat_keterangan_kematian/'.$pengajuan->surat_keterangan_kematian);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('surat_pengantar_rt') && $pengajuan->surat_pengantar_rt){
            $pathToYourFile = public_path('upload/'.$folder.'/surat_pengantar_rt/'.$pengajuan->surat_pengantar_rt);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('akta_pendirian') && $pengajuan->akta_pendirian){
            $pathToYourFile = public_path('upload/'.$folder.'/akta_pendirian/'.$pengajuan->akta_pendirian);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('surat_keterangan_terdaftar') && $pengajuan->surat_keterangan_terdaftar){
            $pathToYourFile = public_path('upload/'.$folder.'/surat_keterangan_terdaftar/'.$pengajuan->surat_keterangan_terdaftar);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('bukti_lunas_pbb') && $pengajuan->bukti_lunas_pbb){
            $pathToYourFile = public_path('upload/'.$folder.'/bukti_lunas_pbb/'.$pengajuan->bukti_lunas_pbb);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('skaw') && $pengajuan->skaw){
            $pathToYourFile = public_path('upload/'.$folder.'/skaw/'.$pengajuan->skaw);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('akta_kematian') && $pengajuan->akta_kematian){
            $pathToYourFile = public_path('upload/'.$folder.'/akta_kematian/'.$pengajuan->akta_kematian);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('buku_akta_nikah') && $pengajuan->buku_akta_nikah){
            $pathToYourFile = public_path('upload/'.$folder.'/buku_akta_nikah/'.$pengajuan->buku_akta_nikah);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('akta_kelahiran') && $pengajuan->akta_kelahiran){
            $pathToYourFile = public_path('upload/'.$folder.'/akta_kelahiran/'.$pengajuan->akta_kelahiran);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('buku_lunas_pbb') && $pengajuan->buku_lunas_pbb){
            $pathToYourFile = public_path('upload/'.$folder.'/buku_lunas_pbb/'.$pengajuan->buku_lunas_pbb);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('kartu_bpjs') && $pengajuan->kartu_bpjs){
            $pathToYourFile = public_path('upload/'.$folder.'/kartu_bpjs/'.$pengajuan->kartu_bpjs);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('suket_bekerja') && $pengajuan->suket_bekerja){
            $pathToYourFile = public_path('upload/'.$folder.'/suket_bekerja/'.$pengajuan->suket_bekerja);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('suket_berhenti_bekerja') && $pengajuan->suket_berhenti_bekerja){
            $pathToYourFile = public_path('upload/'.$folder.'/suket_berhenti_bekerja/'.$pengajuan->suket_berhenti_bekerja);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('suket_pengunduran_diri') && $pengajuan->suket_pengunduran_diri){
            $pathToYourFile = public_path('upload/'.$folder.'/suket_pengunduran_diri/'.$pengajuan->suket_pengunduran_diri);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('penetapan_phk') && $pengajuan->penetapan_phk){
            $pathToYourFile = public_path('upload/'.$folder.'/penetapan_phk/'.$pengajuan->penetapan_phk);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('surat_permohonan') && $pengajuan->surat_permohonan){
            $pathToYourFile = public_path('upload/'.$folder.'/surat_permohonan/'.$pengajuan->surat_permohonan);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('surat_kuasa') && $pengajuan->surat_kuasa){
            $pathToYourFile = public_path('upload/'.$folder.'/surat_kuasa/'.$pengajuan->surat_kuasa);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('keterangan_jual_beli_kapal') && $pengajuan->keterangan_jual_beli_kapal){
            $pathToYourFile = public_path('upload/'.$folder.'/keterangan_jual_beli_kapal/'.$pengajuan->keterangan_jual_beli_kapal);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('foto_kapal') && $pengajuan->foto_kapal){
            $pathToYourFile = public_path('upload/'.$folder.'/foto_kapal/'.$pengajuan->foto_kapal);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('pernyataan_domisili') && $pengajuan->pernyataan_domisili){
            $pathToYourFile = public_path('upload/'.$folder.'/pernyataan_domisili/'.$pengajuan->pernyataan_domisili);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('surat_keterangan_hilang') && $pengajuan->surat_keterangan_hilang){
            $pathToYourFile = public_path('upload/'.$folder.'/surat_keterangan_hilang/'.$pengajuan->surat_keterangan_hilang);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('kartu_keluarga_lama') && $pengajuan->kartu_keluarga_lama){
            $pathToYourFile = public_path('upload/'.$folder.'/kartu_keluarga_lama/'.$pengajuan->kartu_keluarga_lama);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('formulir_kk') && $pengajuan->formulir_kk){
            $pathToYourFile = public_path('upload/'.$folder.'/formulir_kk/'.$pengajuan->formulir_kk);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('surat_nikah') && $pengajuan->surat_nikah){
            $pathToYourFile = public_path('upload/'.$folder.'/surat_nikah/'.$pengajuan->surat_nikah);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('skp_wni') && $pengajuan->skp_wni){
            $pathToYourFile = public_path('upload/'.$folder.'/skp_wni/'.$pengajuan->skp_wni);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('formulir_akta_kelahiran') && $pengajuan->formulir_akta_kelahiran){
            $pathToYourFile = public_path('upload/'.$folder.'/formulir_akta_kelahiran/'.$pengajuan->formulir_akta_kelahiran);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('suket_lahir') && $pengajuan->suket_lahir){
            $pathToYourFile = public_path('upload/'.$folder.'/suket_lahir/'.$pengajuan->suket_lahir);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('formulir_pengangkatan_anak') && $pengajuan->formulir_pengangkatan_anak){
            $pathToYourFile = public_path('upload/'.$folder.'/formulir_pengangkatan_anak/'.$pengajuan->formulir_pengangkatan_anak);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('persetujuan_pengadilan') && $pengajuan->persetujuan_pengadilan){
            $pathToYourFile = public_path('upload/'.$folder.'/persetujuan_pengadilan/'.$pengajuan->persetujuan_pengadilan);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('sptjm') && $pengajuan->sptjm){
            $pathToYourFile = public_path('upload/'.$folder.'/sptjm/'.$pengajuan->sptjm);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('buku_nikah') && $pengajuan->buku_nikah){
            $pathToYourFile = public_path('upload/'.$folder.'/buku_nikah/'.$pengajuan->buku_nikah);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        if($request->file('surat_pernyataan') && $pengajuan->surat_pernyataan){
            $pathToYourFile = public_path('upload/'.$folder.'/surat_pernyataan/'.$pengajuan->surat_pernyataan);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        $pengajuan->fill($request->all());
        
        ## IUMK
        if($request->file('ktp')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->ktp->getClientOriginalExtension();
            $request->ktp->move(public_path('upload/'.$folder.'/ktp'), $filename);
            $pengajuan->ktp = $filename;
		}

        if($request->file('kartu_keluarga')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->kartu_keluarga->getClientOriginalExtension();
            $request->kartu_keluarga->move(public_path('upload/'.$folder.'/kartu_keluarga'), $filename);
            $pengajuan->kartu_keluarga = $filename;
		}

        if($request->file('foto')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('upload/'.$folder.'/foto'), $filename);
            $pengajuan->foto = $filename;
		}

        if($request->file('surat_keterangan_dari_desa')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->surat_keterangan_dari_desa->getClientOriginalExtension();
            $request->surat_keterangan_dari_desa->move(public_path('upload/'.$folder.'/surat_keterangan_dari_desa'), $filename);
            $pengajuan->surat_keterangan_dari_desa = $filename;
		}

        if($request->file('ijazah_terakhir')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->ijazah_terakhir->getClientOriginalExtension();
            $request->ijazah_terakhir->move(public_path('upload/'.$folder.'/ijazah_terakhir'), $filename);
            $pengajuan->ijazah_terakhir = $filename;
		}

        if($request->file('transkrip_nilai')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->transkrip_nilai->getClientOriginalExtension();
            $request->transkrip_nilai->move(public_path('upload/'.$folder.'/transkrip_nilai'), $filename);
            $pengajuan->transkrip_nilai = $filename;
		}

        if($request->file('sertifikat')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->sertifikat->getClientOriginalExtension();
            $request->sertifikat->move(public_path('upload/'.$folder.'/sertifikat'), $filename);
            $pengajuan->sertifikat = $filename;
		}

        if($request->file('formulir_akta_kematian')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->formulir_akta_kematian->getClientOriginalExtension();
            $request->formulir_akta_kematian->move(public_path('upload/'.$folder.'/formulir_akta_kematian'), $filename);
            $pengajuan->formulir_akta_kematian = $filename;
		}

        if($request->file('surat_keterangan_kematian')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->surat_keterangan_kematian->getClientOriginalExtension();
            $request->surat_keterangan_kematian->move(public_path('upload/'.$folder.'/surat_keterangan_kematian'), $filename);
            $pengajuan->surat_keterangan_kematian = $filename;
		}

        if($request->file('surat_pengantar_rt')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->surat_pengantar_rt->getClientOriginalExtension();
            $request->surat_pengantar_rt->move(public_path('upload/'.$folder.'/surat_pengantar_rt'), $filename);
            $pengajuan->surat_pengantar_rt = $filename;
		}

        if($request->file('akta_pendirian')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->akta_pendirian->getClientOriginalExtension();
            $request->akta_pendirian->move(public_path('upload/'.$folder.'/akta_pendirian'), $filename);
            $pengajuan->akta_pendirian = $filename;
		}

        if($request->file('surat_keterangan_terdaftar')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->surat_keterangan_terdaftar->getClientOriginalExtension();
            $request->surat_keterangan_terdaftar->move(public_path('upload/'.$folder.'/surat_keterangan_terdaftar'), $filename);
            $pengajuan->surat_keterangan_terdaftar = $filename;
		}

        if($request->file('bukti_lunas_pbb')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->bukti_lunas_pbb->getClientOriginalExtension();
            $request->bukti_lunas_pbb->move(public_path('upload/'.$folder.'/bukti_lunas_pbb'), $filename);
            $pengajuan->bukti_lunas_pbb = $filename;
		}

        if($request->file('skaw')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->skaw->getClientOriginalExtension();
            $request->skaw->move(public_path('upload/'.$folder.'/skaw'), $filename);
            $pengajuan->skaw = $filename;
		}

        if($request->file('akta_kematian')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->akta_kematian->getClientOriginalExtension();
            $request->akta_kematian->move(public_path('upload/'.$folder.'/akta_kematian'), $filename);
            $pengajuan->akta_kematian = $filename;
		}

        if($request->file('buku_akta_nikah')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->buku_akta_nikah->getClientOriginalExtension();
            $request->buku_akta_nikah->move(public_path('upload/'.$folder.'/buku_akta_nikah'), $filename);
            $pengajuan->buku_akta_nikah = $filename;
		}

        if($request->file('akta_kelahiran')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->akta_kelahiran->getClientOriginalExtension();
            $request->akta_kelahiran->move(public_path('upload/'.$folder.'/akta_kelahiran'), $filename);
            $pengajuan->akta_kelahiran = $filename;
		}

        if($request->file('buku_lunas_pbb')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->buku_lunas_pbb->getClientOriginalExtension();
            $request->buku_lunas_pbb->move(public_path('upload/'.$folder.'/buku_lunas_pbb'), $filename);
            $pengajuan->buku_lunas_pbb = $filename;
		}

        if($request->file('kartu_bpjs')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->kartu_bpjs->getClientOriginalExtension();
            $request->kartu_bpjs->move(public_path('upload/'.$folder.'/kartu_bpjs'), $filename);
            $pengajuan->kartu_bpjs = $filename;
		}

        if($request->file('suket_bekerja')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->suket_bekerja->getClientOriginalExtension();
            $request->suket_bekerja->move(public_path('upload/'.$folder.'/suket_bekerja'), $filename);
            $pengajuan->suket_bekerja = $filename;
		}

        if($request->file('suket_berhenti_bekerja')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->suket_berhenti_bekerja->getClientOriginalExtension();
            $request->suket_berhenti_bekerja->move(public_path('upload/'.$folder.'/suket_berhenti_bekerja'), $filename);
            $pengajuan->suket_berhenti_bekerja = $filename;
		}

        if($request->file('suket_pengunduran_diri')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->suket_pengunduran_diri->getClientOriginalExtension();
            $request->suket_pengunduran_diri->move(public_path('upload/'.$folder.'/suket_pengunduran_diri'), $filename);
            $pengajuan->suket_pengunduran_diri = $filename;
		}

        if($request->file('penetapan_phk')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->penetapan_phk->getClientOriginalExtension();
            $request->penetapan_phk->move(public_path('upload/'.$folder.'/penetapan_phk'), $filename);
            $pengajuan->penetapan_phk = $filename;
		}

        if($request->file('surat_permohonan')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->surat_permohonan->getClientOriginalExtension();
            $request->surat_permohonan->move(public_path('upload/'.$folder.'/surat_permohonan'), $filename);
            $pengajuan->surat_permohonan = $filename;
		}

        if($request->file('surat_kuasa')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->surat_kuasa->getClientOriginalExtension();
            $request->surat_kuasa->move(public_path('upload/'.$folder.'/surat_kuasa'), $filename);
            $pengajuan->surat_kuasa = $filename;
		}

        if($request->file('keterangan_jual_beli_kapal')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->keterangan_jual_beli_kapal->getClientOriginalExtension();
            $request->keterangan_jual_beli_kapal->move(public_path('upload/'.$folder.'/keterangan_jual_beli_kapal'), $filename);
            $pengajuan->keterangan_jual_beli_kapal = $filename;
		}

        if($request->file('foto_kapal')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->foto_kapal->getClientOriginalExtension();
            $request->foto_kapal->move(public_path('upload/'.$folder.'/foto_kapal'), $filename);
            $pengajuan->foto_kapal = $filename;
		}

        if($request->file('pernyataan_domisili')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->pernyataan_domisili->getClientOriginalExtension();
            $request->pernyataan_domisili->move(public_path('upload/'.$folder.'/pernyataan_domisili'), $filename);
            $pengajuan->pernyataan_domisili = $filename;
		}

        if($request->file('surat_keterangan_hilang')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->surat_keterangan_hilang->getClientOriginalExtension();
            $request->surat_keterangan_hilang->move(public_path('upload/'.$folder.'/surat_keterangan_hilang'), $filename);
            $pengajuan->surat_keterangan_hilang = $filename;
		}

        if($request->file('kartu_keluarga_lama')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->kartu_keluarga_lama->getClientOriginalExtension();
            $request->kartu_keluarga_lama->move(public_path('upload/'.$folder.'/kartu_keluarga_lama'), $filename);
            $pengajuan->kartu_keluarga_lama = $filename;
		}

        if($request->file('formulir_kk')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->formulir_kk->getClientOriginalExtension();
            $request->formulir_kk->move(public_path('upload/'.$folder.'/formulir_kk'), $filename);
            $pengajuan->formulir_kk = $filename;
		}

        if($request->file('surat_nikah')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->surat_nikah->getClientOriginalExtension();
            $request->surat_nikah->move(public_path('upload/'.$folder.'/surat_nikah'), $filename);
            $pengajuan->surat_nikah = $filename;
		}

        if($request->file('skp_wni')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->skp_wni->getClientOriginalExtension();
            $request->skp_wni->move(public_path('upload/'.$folder.'/skp_wni'), $filename);
            $pengajuan->skp_wni = $filename;
		}

        if($request->file('formulir_akta_kelahiran')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->formulir_akta_kelahiran->getClientOriginalExtension();
            $request->formulir_akta_kelahiran->move(public_path('upload/'.$folder.'/formulir_akta_kelahiran'), $filename);
            $pengajuan->formulir_akta_kelahiran = $filename;
		}

        if($request->file('suket_lahir')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->suket_lahir->getClientOriginalExtension();
            $request->suket_lahir->move(public_path('upload/'.$folder.'/suket_lahir'), $filename);
            $pengajuan->suket_lahir = $filename;
		}

        if($request->file('formulir_pengangkatan_anak')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->formulir_pengangkatan_anak->getClientOriginalExtension();
            $request->formulir_pengangkatan_anak->move(public_path('upload/'.$folder.'/formulir_pengangkatan_anak'), $filename);
            $pengajuan->formulir_pengangkatan_anak = $filename;
		}

        if($request->file('persetujuan_pengadilan')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->persetujuan_pengadilan->getClientOriginalExtension();
            $request->persetujuan_pengadilan->move(public_path('upload/'.$folder.'/persetujuan_pengadilan'), $filename);
            $pengajuan->persetujuan_pengadilan = $filename;
		}

        if($request->file('sptjm')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->sptjm->getClientOriginalExtension();
            $request->sptjm->move(public_path('upload/'.$folder.'/sptjm'), $filename);
            $pengajuan->sptjm = $filename;
		}

        if($request->file('buku_nikah')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->buku_nikah->getClientOriginalExtension();
            $request->buku_nikah->move(public_path('upload/'.$folder.'/buku_nikah'), $filename);
            $pengajuan->buku_nikah = $filename;
		}


        if($request->file('surat_pernyataan')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->surat_pernyataan->getClientOriginalExtension();
            $request->surat_pernyataan->move(public_path('upload/'.$folder.'/surat_pernyataan'), $filename);
            $pengajuan->surat_pernyataan = $filename;
		}

        $pengajuan->status = 5;
    	$pengajuan->save();

        $status_alert = "status";
        $alert = "Pengajuan Diperbaiki";

        return redirect('/pengajuan_di_perbaiki')->with($status_alert, $alert);
    }

    ## Edit Data
    public function edit_eksekutor(Request $request, Pengajuan $pengajuan)
    {
        
        ## Hasil
        if($request->file('hasil') && $pengajuan->hasil){
            $pathToYourFile = public_path('upload/hasil/'.$pengajuan->hasil);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
		}

        $pengajuan->fill($request->all());
        
        ## Hasil
        if($request->file('hasil')){
            $filename = $pengajuan->no_pengajuan.'.'.$request->hasil->getClientOriginalExtension();
            $request->hasil->move(public_path('upload/hasil'), $filename);
            $pengajuan->hasil = $filename;
		}

		$pengajuan->admin_id = Auth::user()->id;
    	$pengajuan->save();

        if($pengajuan->status==2){
            $status_alert = "status";
            $alert = "Pengajuan Diperbaiki";
        } else if($pengajuan->status==3){
            $status_alert = "status3";
            $alert = "Pengajuan Selesai Diproses";
        }
		
		if(request()->segment(1)=='pengajuan_masuk'){
            return redirect('/pengajuan_masuk')->with($status_alert, $alert);
        } else if(request()->segment(1)=='pengajuan_di_proses'){
		    return redirect('/pengajuan_di_proses')->with($status_alert, $alert);
        } else if(request()->segment(1)=='pengajuan_selesai_di_proses'){
		    return redirect('/pengajuan_selesai_di_proses')->with($status_alert, $alert);
        } else if(request()->segment(1)=='pengajuan_tidak_di_proses'){ 
		    return redirect('/pengajuan_tidak_di_proses')->with($status_alert, $alert);
        }
    }

    ## Hapus Data
    public function delete(Pengajuan $pengajuan)
    {
        $id = $pengajuan->id;
		$pengajuan->delete();
		
        return redirect('/pengajuan')->with('status', 'Data Berhasil Dihapus');
    }

    ## Download Data
    public function download(Pengajuan $pengajuan)
    {
        if(Auth::user()->group==14){
            $pengajuan->status = 6;
            $pengajuan->save();
        }
        
		return redirect('upload/hasil/'.$pengajuan->hasil);
    }
}
