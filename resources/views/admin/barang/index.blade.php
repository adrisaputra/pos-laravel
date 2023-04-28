@extends('admin/layout')
@section('konten')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
                                          <a type="button" class="btn mb-2 mr-1 btn-info" data-toggle="modal" data-target="#exampleModal">Import Data</a>
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
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md" role="document">
                                    <form method="post" action="{{ url('/'.Request::segment(1).'/import_excel') }}" enctype="multipart/form-data">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{ csrf_field() }}
			
                                            <label>Pilih file excel</label>
                                            <div class="form-group">
                                                <input type="file" name="file" required="required">
                                            </div>
                
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Tutup</button>
                                            <a href="{{ asset('upload/file_barang/import_barang.xlsx') }}" class="btn btn-info">Download Format</a>
                                            <button type="submit" class="btn btn-primary">Import</button>
                                        </div>
                                    </div>
							        </form>
                                </div>
                            </div>

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
                                                    <th>Gambar</th>
                                                    <th>Barcode</th>
                                                    <th>Nama Barang</th>
                                                    <th>Harga Beli (Rp)</th>
                                                    <th>Harga Jual (Rp)</th>
                                                    <th>Diskon (%)</th>
                                                    <th style="width: 150px">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($barang as $v)
                                                <tr>
                                                    
													<input type="hidden" class="form-control" value="{{ $v->id }}" id="id{{ $v->id }}">
                                                    <td>{{ ($barang ->currentpage()-1) * $barang ->perpage() + $loop->index + 1 }}</td>
                                                    <td>
                                                        @if($v->gambar)
                                                            <img src="{{ asset('storage/upload/barang/thumbnail/'.$v->gambar) }}" class="img-circle" alt="User Image" width="100px" height="100px">
                                                        @else
                                                            <img src="{{ asset('upload/barang/dummy-img.png') }}" class="img-circle" alt="User Image" width="100px" height="100px">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <center>
                                                            @if ($v->barcode)
                                                            <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($v->barcode, 'C128', 1.5, 70, [1, 1, 1], true) }}" alt="barcode" /> 
                                                            @endif
                                                        </center>
                                                    </td>
                                                    <td>{{ $v->nama_barang }}</td>
                                                    <td>{{ number_format($v->harga_beli, 0, ',', '.') }}</td>
                                                    <td>{{ number_format($v->harga_jual, 0, ',', '.') }}</td>
                                                    <td>{{ number_format($v->diskon, 0, ',', '.') }}</td>
                                                    <td class="text-center">
                                                        <ul class="table-controls">
                                                            <li><a href="{{ url('/'.Request::segment(1).'/edit/'.$v->id ) }}" data-toggle="tooltip" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                            <li><a title="Delete" class="warning confirm" onclick="DeleteData(this.id)" id="{{ $v->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="float-right">{{ $barang->appends(Request::only('search'))->links() }}</div>
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
    url = "{{ url('/barang/search') }}"
    $.ajax({
        url:""+url+"?search="+search+"",
        success: function(response){
            $("#hasil").html(response);
        }
    });
    return false;
}
</script>
<script>
    function DeleteData(id) {

        $('.widget-content .warning.confirm').on('click', function () {
        swal({
            title: 'Apakah Kamu Yakin?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            padding: '2em'
            }).then(function(result) {
            if (result.value) {
                    swal(
                    'Deleted!',
                    'Data Barang Berhasil Dihapus.',
                    'success'
                    ).then(function() {
						url = "{{ url('/barang/hapus') }}"
                        $.ajax({
                            url:""+url+"/"+id+"",
                            success: function(response){
                                location.reload();
                            }
                        });
					});
                }
            })
        })
    }
</script>
@endsection