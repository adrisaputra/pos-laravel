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
					         <form action="{{ url('/'.Request::segment(1)) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
								{{ csrf_field() }}
								<div class="widget-content widget-content-area">
									<div class="row">
										<div class="col-xl-8 col-md-12 col-sm-12 col-12">
										  <a type="button" class="btn mb-2 mr-1 btn-info" data-toggle="modal" data-target="#exampleModal">Cari Barang</a>
										</div>
										<div class="col-xl-4 col-md-12 col-sm-12 col-12">
                                            <select class="form-control" name="barcode" id='barcode' style='width: 200px;' onkeyup="tampil()" autofocus >
                                                <option value=''>- Pilih Barang -</option>
                                            </select>
										</div>
                                        
									<button type="submit" class="btn btn-success">Simpan</button>
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
                                            <a href="{{ asset('upload/file_kasir/import_kasir.xlsx') }}" class="btn btn-info">Download Format</a>
                                            <button type="submit" class="btn btn-primary">Import</button>
                                        </div>
                                    </div>
							        </form>
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
                                                    <td style="width: 10%"><b>{{ number_format($v->diskon, 0, ',', '.') }}<b></td>
                                                    <td style="width: 15%">
                                                        <form action="{{ url('/'.Request::segment(1).'/edit/'.$v->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="PUT">
                                                            <input type="text" class="form-control" name="jumlah" value="{{ $v->jumlah }}">
                                                        </form>
                                                    </td>
                                                    <td style="width: 20%"><span style="color: #ff0018;font-size:16px;"><b>{{ number_format($v->total, 0, ',', '.') }}</b></span></td>
                                                    <td class="text-center" style="width: 5%">
                                                        <ul class="table-controls">
                                                            <li><a href="{{ url('/'.Request::segment(1).'/hapus/'.$v->id ) }}" data-toggle="tooltip" data-placement="top" title="Delete" onclick="kasirn confirm('Anda Yakin ?');"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
				                            @php $total =  ($v->harga *  $v->jumlah) + $total; @endphp
                                            @endforeach
                                            <tr>
                                                <th colspan="6"><center>TOTAL</center></th>
                                                <th colspan="2" class="col-md-3"><span style="color: #28a745;text-align: right;font-size:18px;font-weight:bold"><b id="total_all">{{ number_format($total,0,",",".") }}</b></span></th>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
<script>
function convertToRupiah(angka)
{

	var rupiah = '';    
	var angkarev = angka.toString().split('').reverse().join('');
	
	for(var i = 0; i < angkarev.length; i++) 
	  if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	
	return rupiah.split('',rupiah.length-1).reverse().join('');

}
</script>
<script type="text/javascript">
   // CSRF Token
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   $(document).ready(function(){
     $( "#barcode" ).select2({
        ajax: { 
          url: "{{url('barang/get')}}",
          type: "post",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
               _token: CSRF_TOKEN,
               search: params.term // search term
            };
          },
          processResults: function (response) {
            return {
              results: response
            };
          },
          cache: true
        }
     });
   });
</script>
<script>
function tampil(){
    search = document.getElementById("search").value;
    url = "{{ url('/kasir/search') }}"
    $.ajax({
        url:""+url+"?search="+search+"",
        success: function(response){
        $("#hasil").html(response);
        }
    });
    kasirn false;
}
</script>
@endsection