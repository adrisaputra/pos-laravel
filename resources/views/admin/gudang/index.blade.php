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
											  <input type="text" name="search" style="height: calc(1.5em + 1.4rem + -8px)" class="form-control" placeholder="Masukkan Pencarian" aria-label="Masukkan Pencarian" id="search" onkeyup="tampil()">
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
                                                    <th>Kode Produk</th>
                                                    <th>Nama Produk</th>
                                                    <th>Tersedia</th>
                                                    <th>Stok Minimal</th>
                                                    <th>Stok Maksimal</th>
                                                    <th>Status Stok</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($gudang as $v)
                                            @php
                                            $percent = round(($v->in_stok / $v->full_stok) * 100);
                                            $color = 'grey';
                                            $stock_color = '';
                                            if($v->in_stok < $v->min_stok) $stock_color = 'red-text';
                                                if ($percent < 33) $color='bg-danger' ; elseif ($percent < 66) $color='bg-warning' ; else $color='bg-success' ; @endphp <tr>
                                                    <td>{{ ($gudang->currentpage() - 1) * $gudang->perpage() + $loop->index + 1 }}</td>
                                                    <td>{{ $v->barang->barcode }}</td>
                                                    <td>{{ $v->barang->nama_barang }}</td>
                                                    <td class="{{ $stock_color }}"><b>{{ $v->in_stok }}</b></td>
                                                    <td>{{ $v->min_stok }}</td>
                                                    <td>{{ $v->full_stok }}</td>
                                                    <td>
                                                        <div class="progress br-30" style="height: 25px;">
                                                            <div class="progress-bar {{ $color }}" role="progressbar" style="width: {{ $percent }}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">{{ $percent }}%</div>
                                                        </div>
                                                    </td>
                                                    </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="float-right">{{ $gudang->appends(Request::only('search'))->links() }}</div>
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
    url = "{{ url('/gudang/search') }}"
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