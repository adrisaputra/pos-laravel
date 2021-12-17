@extends('admin/layout')
@section('konten')
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing">
                    <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>{{ _($title)}}</h4>
                                    </div>                 
                                </div>
                            </div>
                            <form action="{{ url('/'.Request::segment(1).'/search') }}" method="GET">
								<div class="widget-content widget-content-area">
									<div class="row">
										<div class="col-xl-8 col-md-12 col-sm-12 col-12">
										  <a href="{{ url('/'.Request::segment(1)) }}" class="btn mb-2 mr-1 btn-warning">Refresh</a>
										</div>
										<div class="col-xl-4 col-md-12 col-sm-12 col-12">
											<div class="input-group" >
											  <input type="text" name="search" style="height: calc(1.5em + 1.4rem + -8px)" class="form-control" placeholder="Masukkan Data Pencarian" aria-label="Masukkan Data Pencarian" id="search" onkeyup="tampil()">
											  <!-- <div class="input-group-append">
												<input class="btn btn-primary" type="submit" name="submit" value="Cari">
											  </div> -->
											</div>
										</div>
									</div>
								</div>
							</form>
                            <div class="widget-content widget-content-area" style="padding-top: 0px;">
                                
                                @if ($message = Session::get('status'))
                                    <div class="alert alert-info mb-4" role="alert"> 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </button> <h4 style="color: #ffffff;"><i class="icon fa fa-check"></i> Berhasil !</h4>
                                        {{ $message }}
                                    </div>          
                                @elseif($message = Session::get('status2'))
                                    <div class="alert alert-danger mb-4" role="alert"> 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </button> <h4 style="color: #ffffff;"><i class="icon fa fa-times"></i> Batal !</h4>
                                        {{ $message }}
                                    </div>   
                                @elseif($message = Session::get('status3'))
                                    <div class="alert alert-success mb-4" role="alert"> 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </button> <h4 style="color: #ffffff;"><i class="icon fa fa-check"></i> Berhasil !</h4>
                                        {{ $message }}
                                    </div>   
                                @endif
  
                                <div id="hasil">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover mb-4">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%">No</th>
                                                    @if(Auth::user()->group!=14)
                                                        <th style="width: 15%">NIK</th>
                                                        <th style="width: 20%">Nama</th>
                                                        <th style="width: 15%">No. HP/WhatsApp</th>
                                                    @endif
                                                    <th style="width: 30%">Layanan</th>
                                                    @if(Auth::user()->group==14)  
                                                        <th style="width: 40%">Yang menindaklanjuti</th>
                                                    @endif
                                                    @if(Request::segment(1)=='pengajuan_masuk')
                                                        <th style="width: 15%">Jenis Pengajuan</th>
                                                    @endif

                                                    @if(Request::segment(1)=='pengajuan_selesai_di_proses')
                                                        <th style="width: 15%">Status Download</th>
                                                    @endif
                                                        <th style="width: 5%">Aksi</th>
                                                </tr>
                                            </thead>
                                                <tbody>
                                                @foreach($pengajuan as $v)
                                                    <tr>
                                                        <td>{{ ($pengajuan ->currentpage()-1) * $pengajuan ->perpage() + $loop->index + 1 }}</td>
                                                        @if(Auth::user()->group!=14)
                                                            <td>{{ $v->nik }}</td>
                                                            <td>{{ $v->nama }}</td>
                                                            <td>{{ $v->no_hp }}</td>
                                                        @endif
                                                        <td>
                                                            @if($v->layanan_id==7)
                                                                @if($v->kategori==1)
                                                                    Permohonan Kartu BPJS (BPU)
                                                                @else
                                                                    Klaim JHT
                                                                @endif
                                                            @elseif($v->layanan_id==9)
                                                                @if($v->kategori==1)
                                                                    Kartu Keluarga (Baru)
                                                                @elseif($v->kategori==2)
                                                                    Kartu Keluarga (Hilang)
                                                                @elseif($v->kategori==3)
                                                                    Kartu Keluarga (Perkawinan)
                                                                @elseif($v->kategori==4)
                                                                    Kartu Keluarga (Perubahan Data)
                                                                @elseif($v->kategori==5)
                                                                    Kartu Keluarga (Pindah Datang)
                                                                @else
                                                                    Kartu Keluarga (Rusak)
                                                                @endif
                                                            @elseif($v->layanan_id==10)
                                                                @if($v->kategori==1)
                                                                    Akta Kelahiran (Anak Ibu)
                                                                @elseif($v->kategori==2)
                                                                    Akta Kelahiran (Pengangkatan Anak)
                                                                @elseif($v->kategori==3)
                                                                    Akta Kelahiran (Tidak Tercatat)
                                                                @else
                                                                    Akta Kelahiran (Tercatat)
                                                                @endif
                                                            @else
                                                                {{ $v->nama_layanan }}
                                                            @endif
                                                            
                                                        </td>
                                                        @if(Auth::user()->group==14)  
                                                            <td>
                                                                @if($v->eksekutor==2)
                                                                    Kecamatan Kabaena Barat
                                                                @elseif($v->eksekutor==3)
                                                                    Kelurahan Sikeli
                                                                @elseif($v->eksekutor==4)
                                                                    Desa Baliara
                                                                @elseif($v->eksekutor==5)
                                                                    Desa Baliara Selatan
                                                                @elseif($v->eksekutor==6)
                                                                    Desa Baliara Kepulauan
                                                                @elseif($v->eksekutor==7)
                                                                    Desa Rahantari
                                                                @elseif($v->eksekutor==8)
                                                                    DISDUKCAPIL
                                                                @elseif($v->eksekutor==9)
                                                                    DISTRANSNAKER
                                                                @elseif($v->eksekutor==10)
                                                                    PMPTSP
                                                                @elseif($v->eksekutor==11)
                                                                    DINSOS
                                                                @elseif($v->eksekutor==12)
                                                                    BPJS Ketenagakerjaan
                                                                @elseif($v->eksekutor==13)
                                                                    BPJS Kesehatan
                                                                @endif
                                                            </td>
                                                        @endif
                                                        @if(Request::segment(1)=='pengajuan_masuk')
                                                        <td>
                                                            @if($v->status==0)
                                                                <span class="badge badge-danger">Pengajuan Baru</span>
                                                            @else
                                                                <span class="badge badge-info">Pengajuan Telah Di Perbaiki</span>
                                                            @endif
                                                        </td>
                                                        @endif
                                                        
                                                        @if(Request::segment(1)=='pengajuan_selesai_di_proses')
                                                            <td>
                                                                @if($v->status==3)
                                                                    <span class="badge badge-danger">Belum Di Download</span>
                                                                @else
                                                                    <span class="badge badge-success">Sudah Di Download</span>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                            @if(Auth::user()->group==14)
                                                                @php
                                                                    $count_skm = DB::table('skm_tbl')->where('nik',Auth::user()->name)->count();
                                                                    $count_pengajuan =  DB::table('pengajuan_tbl')->where('nik',Auth::user()->name)->where('status',3)->count();
                                                                @endphp

                                                                @if($count_skm==0)
                                                                    <a href="" data-toggle="modal" data-target="#survey{{ $v->id }}" class="btn btn-info btn-flat btn-sm">Download PDF</a>  
                                                                @else   
                                                                    <a href="{{ url('/pengajuan_selesai_di_proses/download/'.$v->id) }}" target="_blank" class="btn btn-info btn-flat btn-sm">Download PDF</a>       
                                                                @endif
                                                            @else
                                                                <a href="{{ asset('upload/hasil/'.$v->hasil)}}" target="_blank" class="btn btn-info btn-flat btn-sm"> Download PDF</a>
                                                            @endif
                                                            </td>
                                                        @else
                                                            <td class="text-center">
                                                                <ul class="table-controls">
                                                                    <li><a type="button" data-toggle="modal" data-target="#exampleModal{{ $v->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text text-primary"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg></a></li>
                                                                </ul>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                        </table>

                                        @foreach($pengajuan as $v)
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $v->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">No. Pengajuan : {{ $v->no_pengajuan}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered table-hover mb-4">
                                                                <tr>
                                                                    <th colspan='2' style="background: #bae7ff;color:#000000;"><center>DATA PENGAJU</center></th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 30%;color: #1b55e2;">NIK</th>
                                                                    <td>{{ $v->nik}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 30%;color: #1b55e2;">Nama</th>
                                                                    <td>{{ $v->nama}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 30%;color: #1b55e2;">No. HP/WhatsApp</th>
                                                                    <td>{{ $v->no_hp}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 30%;color: #1b55e2;">Alamat</th>
                                                                    <td>{{ $v->alamat}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 30%;color: #1b55e2;">Layanan</th>
                                                                    <td>
                                                                    @if($v->layanan_id==7)
                                                                        @if($v->kategori==1)
                                                                            Permohonan Kartu BPJS (BPU)
                                                                        @else
                                                                            Klaim JHT
                                                                        @endif
                                                                    @elseif($v->layanan_id==9)
                                                                        @if($v->kategori==1)
                                                                            Kartu Keluarga (Baru)
                                                                        @elseif($v->kategori==2)
                                                                            Kartu Keluarga (Hilang)
                                                                        @elseif($v->kategori==3)
                                                                            Kartu Keluarga (Perkawinan)
                                                                        @elseif($v->kategori==4)
                                                                            Kartu Keluarga (Perubahan Data)
                                                                        @elseif($v->kategori==5)
                                                                            Kartu Keluarga (Pindah Datang)
                                                                        @else
                                                                            Kartu Keluarga (Rusak)
                                                                        @endif
                                                                    @elseif($v->layanan_id==10)
                                                                        @if($v->kategori==1)
                                                                            Akta Kelahiran (Anak Ibu)
                                                                        @elseif($v->kategori==2)
                                                                            Akta Kelahiran (Pengangkatan Anak)
                                                                        @elseif($v->kategori==3)
                                                                            Akta Kelahiran (Tidak Tercatat)
                                                                        @else
                                                                            Akta Kelahiran (Tercatat)
                                                                        @endif
                                                                    @else
                                                                        {{ $v->nama_layanan }}
                                                                    @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 30%;color: #1b55e2;">Instansi Yang Menindaklanjuti</th>
                                                                    <td>
                                                                        @if($v->eksekutor==2)
                                                                            Kecamatan Kabaena Barat
                                                                        @elseif($v->eksekutor==3)
                                                                            Kelurahan Sikeli
                                                                        @elseif($v->eksekutor==4)
                                                                            Desa Baliara
                                                                        @elseif($v->eksekutor==5)
                                                                            Desa Baliara Selatan
                                                                        @elseif($v->eksekutor==6)
                                                                            Desa Baliara Kepulauan
                                                                        @elseif($v->eksekutor==7)
                                                                            Desa Rahantari
                                                                        @elseif($v->eksekutor==8)
                                                                            DISDUKCAPIL
                                                                        @elseif($v->eksekutor==9)
                                                                            DISTRANSNAKER
                                                                        @elseif($v->eksekutor==10)
                                                                            PMPTSP
                                                                        @elseif($v->eksekutor==11)
                                                                            DINSOS
                                                                        @elseif($v->eksekutor==12)
                                                                            BPJS Ketenagakerjaan
                                                                        @elseif($v->eksekutor==13)
                                                                            BPJS Kesehatan
                                                                        @endif

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan='2' style="background: #bae7ff;color:#000000;"><center>PERSYARATAN PENGAJUAN</center></th>
                                                                </tr>

                                                                @if($v->layanan_id==1)
                                                                    @include('admin.pengajuan.detail_iumk')
                                                                @elseif($v->layanan_id==2)
                                                                    @include('admin.pengajuan.detail_sekretariat')
                                                                @elseif($v->layanan_id==4)
                                                                    @include('admin.pengajuan.detail_akta_kematian')
                                                                @elseif($v->layanan_id==5)
                                                                    @include('admin.pengajuan.detail_ahli_waris')
                                                                @elseif($v->layanan_id==6)
                                                                    @include('admin.pengajuan.detail_domisili')
                                                                @elseif($v->layanan_id==7)
                                                                    @include('admin.pengajuan.detail_bpjs_bpu')
                                                                @elseif($v->layanan_id==9)
                                                                    @include('admin.pengajuan.detail_kartu_keluarga')
                                                                @elseif($v->layanan_id==10)
                                                                    @include('admin.pengajuan.detail_akta_kelahiran')
                                                                @elseif($v->layanan_id==11)
                                                                    @include('admin.pengajuan.detail_kia')
                                                                @elseif($v->layanan_id==12)
                                                                    @include('admin.pengajuan.detail_pacak_kapal')
                                                                @elseif($v->layanan_id==13)
                                                                    @include('admin.pengajuan.detail_pencaker')
                                                                @elseif($v->layanan_id==14)
                                                                    @include('admin.pengajuan.detail_pernikahan')
                                                                @endif
                                                               
                                                                @if($v->status==2 || $v->status==5)
                                                                    <tr>
                                                                        <th colspan='2' style="background: #bae7ff;color:#000000;"><center>CATATAN PERBAIKAN</center></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 30%;color: #1b55e2;">Catatan Perbaikan</th>
                                                                        <td>{{ $v->catatan_perbaikan}}</td>
                                                                    </tr>
                                                                @elseif($v->status==3)
                                                                    <tr>
                                                                        <th colspan='2' style="background: #bae7ff;color:#000000;"><center>HASIL DOKUMEN</center></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 30%;color: #1b55e2;">Hasil Dokumen</th>
                                                                        <td><a href="{{ asset('upload/hasil/'.$v->hasil)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
                                                                    </tr>
                                                                @endif
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Tutup</button>
                                                        @if(Auth::user()->group!=1 && Auth::user()->group!=14)
                                                            @if(Request::segment(1)=='pengajuan_masuk')
                                                                <a href="{{ url('/'.Request::segment(1).'/proses/1/'.$v->id )}}" class="btn btn-success" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-check" style="color:#09854c"></i> PROSES</a>
                                                                <a type="button" data-toggle="modal" data-target="#perbaikan{{ $v->id }}" class="btn btn-info" ><i class="fa fa-check" style="color:#1a78c3"></i> PERBAIKI</a>
                                                                <a href="{{ url('/'.Request::segment(1).'/proses/4/'.$v->id )}}" class="btn btn-danger" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-times" style="color:#b83120"></i> TIDAK DI PROSES</a>
                                                            @elseif(Request::segment(1)=='pengajuan_di_proses')
                                                                <a type="button" data-toggle="modal" data-target="#selesai{{ $v->id }}" class="btn btn-success"><i class="fa fa-check" style="color:#09854c"></i> SELESAI DI PROSES</a>
                                                                <a type="button" data-toggle="modal" data-target="#perbaikan{{ $v->id }}" class="btn btn-info" ><i class="fa fa-check" style="color:#1a78c3"></i> PERBAIKI</a>
                                                                <a href="{{ url('/'.Request::segment(1).'/proses/4/'.$v->id )}}" class="btn btn-danger" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-times" style="color:#b83120"></i> TIDAK DI PROSES</a>
                                                            @elseif(Request::segment(1)=='pengajuan_selesai_di_proses')
                                                                <a href="{{ url('/'.Request::segment(1).'/proses/1/'.$v->id )}}" class="btn btn-success" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-check" style="color:#09854c"></i> PROSES</a>
                                                                <a type="button" data-toggle="modal" data-target="#perbaikan{{ $v->id }}" class="btn btn-info" ><i class="fa fa-check" style="color:#1a78c3"></i> PERBAIKI</a>
                                                                <a href="{{ url('/'.Request::segment(1).'/proses/4/'.$v->id )}}" class="btn btn-danger" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-times" style="color:#b83120"></i> TIDAK DI PROSES</a>
                                                            @elseif(Request::segment(1)=='pengajuan_tidak_di_proses')
                                                                <a href="{{ url('/'.Request::segment(1).'/proses/1/'.$v->id )}}" class="btn btn-success" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-check" style="color:#09854c"></i> PROSES</a>
                                                            @endif
                                                        @elseif(Auth::user()->group==14)
                                                            @if(Request::segment(1)=='pengajuan_di_perbaiki')
                                                                <a href="{{ url('/'.Request::segment(1).'/perbaiki/'.$v->id ) }}" class="btn btn-info" ><i class="fa fa-check" style="color:#1a78c3"></i> PERBAIKI</a>
                                                            @else

                                                            @endif                                                        
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Perbaikan -->
                                        <div class="modal fade" id="perbaikan{{ $v->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Masukkan Catatan Perbaikan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </button>
                                                    </div>
                                                    <form action="{{ url('/'.Request::segment(1).'/edit/'.$v->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="PUT">
									
                                                        <div class="modal-body">
                                                            <div class="form-group row mb-4">
                                                                <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Catatan Perbaikan') }}  <span class="required" style="color: #dd4b39;">*</span></label>
                                                                <div class="col-xl-9 col-lg-9 col-sm-10">
                                                                    <input type="hidden" class="form-control" name="id" value="{{ $v->id }}">
                                                                    <input type="hidden" class="form-control" name="status" value="2">
                                                                    <textarea class="form-control" name="catatan_perbaikan" value="{{ old('catatan_perbaikan') }}" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Tutup</button>
                                                            <button type="submit" class="btn btn-info" ><i class="fa fa-check" style="color:#1a78c3"></i> PERBAIKI</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Selesai -->
                                        <div class="modal fade" id="selesai{{ $v->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">File {{ $v->nama_layanan }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </button>
                                                    </div>
                                                    <form action="{{ url('/'.Request::segment(1).'/edit/'.$v->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="PUT">
									
                                                        <div class="modal-body">
                                                            <div class="form-group row mb-4">
                                                                <label class="col-xl-12 col-sm-3 col-sm-2 col-form-label">{{ __('Masukkan File '.$v->nama_layanan) }}  <span class="required" style="color: #dd4b39;">*</span></label>
                                                                <div class="col-xl-12 col-lg-9 col-sm-10">
                                                                    <input type="hidden" class="form-control" name="id" value="{{ $v->id }}">
                                                                    <input type="hidden" class="form-control" name="status" value="3">
                                                                    <input type="file" class="form-control" placeholder="Gambar" name="hasil" required>
											                        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png,pdf)</i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Tutup</button>
                                                            <button type="submit" class="btn btn-success" ><i class="fa fa-check" style="color:#09854c"></i> SELESAI DI PROSES</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Selesai -->
                                        <div class="modal fade" id="survey{{ $v->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">File {{ $v->nama_layanan }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </button>
                                                    </div>
                                                    <form action="{{ url('/'.Request::segment(1).'/edit/'.$v->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="PUT">
									
                                                        <div class="modal-body">
                                                            <div class="form-group row mb-4">
                                                                <div class="col-xl-12 col-lg-12 col-sm-12">
                                                                    <center><b><p style="font-size:14px">Pilihlah Survey Penilaian Anda Tentang Sistem Ini Untuk melanjutkan download PDF !!!</p></center></b>                                                                
                                                                </div><br><br><br>
                                                                <div class="col-xl-4 col-lg-4 col-sm-4">
                                                                    <center><a href="{{ url('skm/3/'.$v->id)}}"><img src="{{ asset('assets/img/puas.png') }}" style="width:50%"></a><br>
                                                                    Memuaskan
                                                                </div>
                                                                <div class="col-xl-4 col-lg-4 col-sm-4">
                                                                   <center><a href="{{ url('skm/2/'.$v->id)}}"><img src="{{ asset('assets/img/cukup.png') }}" style="width:50%"></a><br>
                                                                    Cukup
                                                                </div>
                                                                <div class="col-xl-4 col-lg-4 col-sm-4">
                                                                    <center><a href="{{ url('skm/1/'.$v->id)}}"><img src="{{ asset('assets/img/kurang.png') }}" style="width:50%"></a><br>
                                                                    Kurang</center>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Tutup</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                        <div class="float-right">{{ $pengajuan->appends(Request::only('search'))->links() }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
<script>
function tampil(){
    search = document.getElementById("search").value;
    url = "{{ url('/'.Request::segment(1).'/search') }}"
    $.ajax({
        url:""+url+"?search="+search+"",
        success: function(response){
        $("#hasil").html(response);
        }
    });
    return false;
}
</script>
@endsection