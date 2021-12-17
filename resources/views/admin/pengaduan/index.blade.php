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
                                @endif
  
                                <div id="hasil">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover mb-4">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%">No</th>
                                                    <th style="width: 15%">No Pengaduan</th>
                                                    <th style="width: 15%">Nama Pelapor</th>
                                                    <th style="width: 15%">No. HP. Pelapor</th>
                                                    <th style="width: 75%">Perihal</th>
                                                    <th style="width: 5px">Aksi</th>
                                                </tr>
                                            </thead>
                                                <tbody>
                                                @foreach($pengaduan as $v)
                                                    <tr>
                                                        <td>{{ ($pengaduan ->currentpage()-1) * $pengaduan ->perpage() + $loop->index + 1 }}</td>
                                                        <td>{{ $v->no_pengaduan }}</td>
                                                        <td>{{ $v->nama_pelapor }}</td>
                                                        <td>{{ $v->no_hp_pelapor }}</td>
                                                        <td>{{ $v->perihal }}</td>
                                                        <td class="text-center">
                                                            <ul class="table-controls">
                                                                <li><a type="button" data-toggle="modal" data-target="#exampleModal{{ $v->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text text-primary"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg></a></li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                        </table>

                                        @foreach($pengaduan as $v)
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $v->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">No. Pengaduan : {{ $v->no_pengaduan}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <div class="card">
                                                        <table class="table table-bordered table-hover mb-4">
                                                                <tr>
                                                                    <th colspan='2' style="background: #bae7ff;color:#000000;"><center>DATA PELAPOR</center></th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 15%;color: #1b55e2;">Nama Pelapor</th>
                                                                    <td>{{ $v->nama_pelapor}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 15%;color: #1b55e2;">NIP</th>
                                                                    <td>{{ $v->nip_pelapor}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 15%;color: #1b55e2;">No. HP Pelapor</th>
                                                                    <td>{{ $v->no_hp_pelapor}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 15%;color: #1b55e2;">Alamat Pelapor</th>
                                                                    <td>{{ $v->alamat_pelapor}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 15%;color: #1b55e2;">OPD Pelapor</th>
                                                                    <td>{{ $v->opd_pelapor}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan='2' style="background: #bae7ff;color:#000000;"><center>DATA PENGADUAN</center></th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 15%;color: #1b55e2;">No. Pengaduan</th>
                                                                    <td>{{ $v->no_pengaduan}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 15%;color: #1b55e2;">Perihal</th>
                                                                    <td>{{ $v->perihal}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 15%;color: #1b55e2;">Uraian</th>
                                                                    <td>{{ $v->uraian}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 15%;color: #1b55e2;">Tempat Kejadian</th>
                                                                    <td>{{ $v->tempat_kejadian}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 15%;color: #1b55e2;">Alamat</th>
                                                                    <td>{{ $v->alamat}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 15%;color: #1b55e2;">Tanggal Kejadian</th>
                                                                    <td>{{ $v->tanggal_kejadian}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 15%;color: #1b55e2;">Waktu Kejadian</th>
                                                                    <td>{{ $v->waktu_kejadian}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan='2' style="background: #bae7ff;color:#000000;"><center>DATA PELAKU</center></th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 15%;color: #1b55e2;">Nama Pelaku</th>
                                                                    <td>{{ $v->nama_pelaku}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 15%;color: #1b55e2;">NIP</th>
                                                                    <td>{{ $v->nip}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 15%;color: #1b55e2;">Jabatan</th>
                                                                    <td>{{ $v->jabatan}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 15%;color: #1b55e2;">OPD</th>
                                                                    <td>{{ $v->jabatan}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan='2' style="background: #bae7ff;color:#000000;"><center>LAMPIRAN (FOTO/VIDEO)</center></th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 15%;color: #1b55e2;">Lampiran</th>
                                                                    <td>
                                                                    @if($v->lampiran)
                                                                    <a href="{{ asset('/upload/lampiran/'.$v->lampiran)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download Lampiran</a>
                                                                    @endif
                                                                    </td>
                                                                </tr>
                                                        </table>
                                                    </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Tutup</button>
                                                        @if(Request::segment(1)=='pengaduan_masuk')
                                                            <a href="{{ url('/'.Request::segment(1).'/proses/1/'.$v->id )}}" class="btn btn-success" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-check" style="color:#09854c"></i> PROSES</a>
                                                            <a href="{{ url('/'.Request::segment(1).'/proses/3/'.$v->id )}}" class="btn btn-danger" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-times" style="color:#b83120"></i> TIDAK DI PROSES</a>
                                                        @elseif(Request::segment(1)=='pengaduan_di_proses')
                                                            <a href="{{ url('/'.Request::segment(1).'/proses/2/'.$v->id )}}" class="btn btn-success" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-check" style="color:#09854c"></i> SELESAI DI PROSES</a>
                                                            <a href="{{ url('/'.Request::segment(1).'/proses/3/'.$v->id )}}" class="btn btn-danger" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-times" style="color:#b83120"></i> TIDAK DI PROSES</a>
                                                        @elseif(Request::segment(1)=='pengaduan_selesai_di_proses')
                                                            <a href="{{ url('/'.Request::segment(1).'/proses/1/'.$v->id )}}" class="btn btn-success" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-check" style="color:#09854c"></i> PROSES</a>
                                                            <a href="{{ url('/'.Request::segment(1).'/proses/3/'.$v->id )}}" class="btn btn-danger" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-times" style="color:#b83120"></i> TIDAK DI PROSES</a>
                                                        @elseif(Request::segment(1)=='pengaduan_tidak_di_proses')
                                                            <a href="{{ url('/'.Request::segment(1).'/proses/1/'.$v->id )}}" class="btn btn-success" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-check" style="color:#09854c"></i> PROSES</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                        <div class="float-right">{{ $pengaduan->appends(Request::only('search'))->links() }}</div>
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