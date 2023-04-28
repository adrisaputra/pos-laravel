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
                                            <a href="{{ asset('upload/file_pembelian/import_pembelian.xlsx') }}" class="btn btn-info">Download Format</a>
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
                                                    <th>Nomor Pre Order</th>
                                                    <th style="width: 20%">User</th>
                                                    <th>Supplier</th>
                                                    <th>Jumlah Produk</th>
                                                    <th>Total Harga (Rp)</th>
                                                    <th>Tanggal PO</th>
                                                    <th style="width: 15%">#aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($pembelian as $v)
                                                @php $i = $loop->iteration; @endphp
                                                <tr role="v" class="odd">
                                                    <td tabindex="0" class="sorting_1">{{ $loop->iteration }}</td>
                                                    <td>{{ $v->nomor_transaksi }}</td>
                                                    <td>{{ $v->user->name }}</td>
                                                    <td>{{ $v->supplier->nama_supplier }}</td>
                                                    <td>{{ $v->purchase_detail->count() }}</td>
                                                    <td>{{ number_format($v->total, 0, ',', '.') }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($v->created_at)) }}</td>
                                                    <td class="p-1">
                                                        @can('ubah-data')
                                                            <a class="btn mb-12 btn waves-effect waves-light blue darken-1 btn-small" href="{{ url('/' . Request::segment(1) . '/confirm/' . $v->id) }}">Konfirmasi</a>
                                                        @endcan
                                                        <a class="btn btn-small waves-effect waves-light red darken-1" onclick="return confirm('Are you sure?')" href="{{ url('/' . Request::segment(1) . '/hapus/' . $v->id) }}">Hapus</a>
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