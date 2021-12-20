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
										  <a href="{{ url('/'.Request::segment(1).'/create') }}" class="btn mb-2 mr-1 btn-success">Tambah Data</a>
										  <a href="{{ url('/'.Request::segment(1)) }}" class="btn mb-2 mr-1 btn-warning">Refresh</a>
										</div>
										<div class="col-xl-4 col-md-12 col-sm-12 col-12">
											<div class="input-group" >
											  <input type="text" name="search" style="height: calc(1.5em + 1.4rem + -8px)" class="form-control" placeholder="Masukkan Nama Barang" aria-label="Masukkan Nama Barang" id="search" onkeyup="tampil()">
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
                                @endif

                                <div id="hasil">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover mb-4">
                                            <thead>
                                                <tr>
                                                    <th style="width: 60px">No</th>
                                                    <th>Barcode</th>
                                                    <th>Nama Barang</th>
                                                    <th>Tanggal</th>
                                                    <th>Jumlah</th>
                                                    <th style="width: 150px">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($pembelian as $v)
                                                <tr>
                                                    <td>{{ ($pembelian ->currentpage()-1) * $pembelian ->perpage() + $loop->index + 1 }}</td>
                                                    <td>{{ $v->barcode }}</td>
                                                    <td>{{ $v->nama_barang }}</td>
						                            <td>{{ date('d-m-Y', strtotime($v->tanggal)) }}</td>
                                                    <td>{{ number_format($v->jumlah, 0, ',', '.') }}</td>
                                                    <td class="text-center">
                                                        <ul class="table-controls">
                                                            <li><a href="{{ url('/'.Request::segment(1).'/edit/'.$v->id ) }}" data-toggle="tooltip" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                            <li><a href="{{ url('/'.Request::segment(1).'/hapus/'.$v->id ) }}" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Anda Yakin ?');"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="float-right">{{ $pembelian->appends(Request::only('search'))->links() }}</div>
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
    url = "{{ url('/pembelian/search') }}"
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