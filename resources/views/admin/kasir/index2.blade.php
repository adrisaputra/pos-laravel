@extends('admin/layout')
@section('konten')
<script type="text/javascript" src="https://code.jquery.com/jquery-1.10.0.min.js"></script>
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
					         <form action="{{ url('/'.Request::segment(1)) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
								{{ csrf_field() }}
								<div class="widget-content widget-content-area">
									<div class="row">
										<div class="col-xl-8 col-md-12 col-sm-12 col-12">
										  <a type="button" class="btn mb-2 mr-1 btn-info" data-toggle="modal" data-target="#exampleModal">Cari Barang</a>
										</div>
										<div class="col-xl-4 col-md-12 col-sm-12 col-12">
											<div class="input-group" >
											  <input type="text" name="barcode" style="height: calc(1.5em + 1.4rem + -8px)" class="form-control" placeholder="Masukkan Barcode" aria-label="Masukkan Barcode" autofocus>
											</div>
										</div>
									</div>
								</div>
							</form>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Cari Barang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="search" style="height: calc(1.5em + 1.4rem + -8px)" class="form-control" placeholder="Masukkan Nama Barang" aria-label="Masukkan Nama Barang" id="search" onkeyup="tampil()">
                                                <br>
                                                <div id="hasil">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-hover mb-4">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 60px">No</th>
                                                                    <th>Barcode</th>
                                                                    <th>Nama Barang</th>
                                                                    <th>Harga Jual (Rp)</th>
                                                                    <th>Diskon (%)</th>
                                                                    <th>Stok</th>
                                                                    <th style="width: 150px">Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-content widget-content-area" style="padding-top: 0px;">
                                
                                {{-- @if ($message = Session::get('status'))
                                    <div class="alert alert-info mb-4" role="alert"> 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </button> <h4 style="color: #ffffff;"><i class="icon fa fa-check"></i> Berhasil !</h4>
                                        {{ $message }}
                                    </div>          
                                @endif --}}

                                <div id="hasil">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover mb-4">
                                            <thead>
                                                <tr>
                                                    <th style="width: 60px">No</th>
                                                    <th>Barcode</th>
                                                    <th>Nama Barang</th>
                                                    <th>Harga</th>
                                                    <th>Diskon</th>
                                                    <th>Jumlah</th>
                                                    <th>Total</th>
                                                    <th style="width: 150px">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
				                            @php $total = 0; @endphp
                                            @foreach($kasir as $v)
                                                <tr>
                                                    <td style="width: 5%">{{ $loop->index + 1 }}</td>
                                                    <td style="width: 10%"><b>{{ $v->barcode }}<b></td>
                                                    <td style="width: 30%"><b>{{ $v->nama_barang }}<b></td>
                                                    <td style="width: 15%"><b>{{ number_format($v->harga, 0, ',', '.') }}<b></td>
                                                    <td style="width: 10%"><b>{{ number_format($v->diskon, 0, ',', '.') }}<b>
                                                    <td style="width: 15%">
                                                        <input type="hidden" class="form-control" value="{{ $v->id }}" id="id{{ $v->id }}">
                                                        <input type="hidden" class="form-control" value="{{ $v->harga }}" id="harga{{ $v->id }}">
                                                        @php 
                                                            $barang = DB::table('barang_tbl')
                                                                        ->where('barcode',$v->barcode)
                                                                        ->first();
                                                            $pembelian = DB::table('pembelian_tbl')
                                                                        ->select(DB::raw("SUM(jumlah) as total_pembelian"))
                                                                        ->where('barcode',$v->barcode)
                                                                        ->first();
                                                            $retur = DB::table('retur_tbl')
                                                                        ->select(DB::raw("SUM(jumlah) as total_retur"))
                                                                        ->where('barcode',$v->barcode)
                                                                        ->first();
                                                        @endphp   
                                                        <input type="hidden" class="form-control" value="{{ ($barang->stok_awal + $pembelian->total_pembelian)-$retur->total_retur }}" id="stok{{ $v->id }}">
                                                        <input type="text" class="form-control" value="{{ $v->jumlah }}" name="jumlah[]" id="jumlah{{ $v->id }}" onkeyup="ubah_jumlah{{ $v->id }}();findTotal();" required>
                                                        <input type="hidden" name="qty" id="qty{{ $v->id }}" value="{{ $v->total }}"/>
                                                    </td>
                                                    <td style="width: 20%"><span style="font-size:16px;"><b id="total{{ $v->id }}">{{ number_format($v->harga * $v->jumlah,0,",",".") }}</b></span></td>
                                                    <td class="text-center" style="width: 5%">
                                                        <ul class="table-controls">
                                                            <li><a href="{{ url('/'.Request::segment(1).'/hapus/'.$v->id ) }}" data-toggle="tooltip" data-placement="top" title="Delete" onclick="kasirn confirm('Anda Yakin ?');"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <script>
                                                    function ubah_jumlah{{ $v->id }}()
                                                    {
                                                        harga = document.getElementById("harga{{ $v->id }}").value;
                                                        jumlah = document.getElementById("jumlah{{ $v->id }}").value;
                                                        stok = document.getElementById("stok{{ $v->id }}").value;
                                                        stok = parseInt(stok);
                                                        id = document.getElementById("id{{ $v->id }}").value;
                                                        total_all = convertToRupiah(harga * jumlah); 
                                                        total_all2 = harga * jumlah;	
                                                        if(jumlah>stok){
                                                            document.getElementById("total{{ $v->id }}").textContent=total_all;
                                                            document.getElementById("total{{ $v->id }}").style.color='red';
                                                        } else {
                                                            document.getElementById("total{{ $v->id }}").textContent=total_all;
                                                            document.getElementById("total{{ $v->id }}").style.color='black';
                                                        }
                                                        document.getElementById("qty{{ $v->id }}").value=total_all2;

                                                        url = "{{ url('/kasir/edit2') }}"
                                                        $.ajax({
                                                            url:""+url+"/"+id+"/"+jumlah+"",
                                                            method:"GET",  
                                                            data:{
                                                                id : id,
                                                                jumlah: jumlah
                                                            },                              
                                                            success: function( data ) {
                                                                console.log(data);
                                                            }
                                                        });
                                                    }
                                                </script>
				                            @php $total =  ($v->harga *  $v->jumlah) + $total; @endphp
                                            @endforeach
                                            <script type="text/javascript">
                                                function findTotal(){
                                                    var arr = document.getElementsByName('qty');
                                                    var tot=0;
                                                    for(var i=0;i<arr.length;i++){
                                                        if(parseInt(arr[i].value))
                                                            tot += parseInt(arr[i].value);
                                                    }
                                                    total_all = convertToRupiah(tot);
                                                    document.getElementById('total_all').textContent = total_all;
                                                    document.getElementById('total_all2').textContent = total_all;
                                                }
                                            </script>
                                            <tr>
                                                <th colspan="6"><center>TOTAL</center></th>
                                                <th colspan="2" class="col-md-3"><span style="color: #28a745;text-align: right;font-size:18px;font-weight:bold"><b id="total_all">{{ number_format($total,0,",",".") }}</b></span></th>
                                            </tr>
                                            </tbody>
                                        </table>
                                        
										<div align="right"><a type="button" class="btn mb-2 mr-1 btn-info" data-toggle="modal" data-target="#bayar">BAYAR</a></div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">BAYAR</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                            <br>
                                                            <table class="table table-bordered table-hover mb-4">
                                                            <tr>
                                                                <th><center>JENIS PEMBAYARAN</center></th>
                                                                <th><span style="color: #28a745;text-align: right;font-size:18px;font-weight:bold"><b id="total_all2">{{ number_format($total,0,",",".") }}</b></span></th>
                                                            </tr>
                                                            <tr>
                                                                <th><center>Bayar</center></th>
                                                                <th><input type="text" name="search" style="height: calc(1.5em + 1.4rem + -8px)" class="form-control" placeholder="Masukkan Nama Barang" aria-label="Masukkan Nama Barang" id="search" onkeyup="tampil()"></th>
                                                            </tr>
                                                            <tr>
                                                                <th><center>TAGIHAN</center></th>
                                                                <th><span style="color: #28a745;text-align: right;font-size:18px;font-weight:bold"><b id="total_all2">{{ number_format($total,0,",",".") }}</b></span></th>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
<script>
    function convertToRupiah(angka){
        var rupiah = '';    
        var angkarev = angka.toString().split('').reverse().join('');
        
        for(var i = 0; i < angkarev.length; i++) 
        if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
        
        return rupiah.split('',rupiah.length-1).reverse().join('');
    }

    function tampil(){
        search = document.getElementById("search").value;
        url = "{{ url('/kasir/search') }}"
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