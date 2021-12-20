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
                            <div class="widget-content widget-content-area" style="padding-top: 0px;">
					   <form action="{{ url('/'.Request::segment(1)) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
								{{ csrf_field() }}
									
									<div class="form-group row mb-4">
										<label class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Tanggal  <span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-10 col-lg-9 col-sm-10">
										<input id="basicFlatpickr" value="{{ date('Y-m-d') }}" name="tanggal" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date..">
											@if ($errors->has('tanggal')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('tanggal') }}</div>@endif
										</div>
									</div>
									
									<div class="form-group row mb-4">
										<label class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Barcode  <span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-10 col-lg-9 col-sm-10">
											<select class="form-control" name="barcode" id='barcode' style='width: 200px;' onkeyup="tampil()">
												<option value=''>- Pilih Barang -</option>
											</select>
											@if ($errors->has('barcode')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('barcode') }}</div>@endif
										</div>
									</div>
									
									<div class="form-group row mb-4">
										<label class="col-xl-2 col-sm-3 col-sm-2 col-form-label">{{ __('Satuan') }}</label>
										<div class="col-xl-10 col-lg-9 col-sm-10">
											<input type="text" class="form-control" name="satuan" value="{{ old('satuan') }}">
										</div>
									</div>
									
									<div class="form-group row mb-4">
										<label class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Supplier</label>
										<div class="col-xl-10 col-lg-9 col-sm-10">
										<select class="form-control basic" name="supplier_id">
												<option value="">- Pilih Supplier-</option>
												@foreach($supplier as $v)
													<option value="{{ $v->id }}" @if(old('supplier_id')== $v->id) selected @endif>{{ $v->nama_supplier }}</option>
												@endforeach
											</select>
											@if ($errors->has('supplier')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('supplier') }}</div>@endif
										</div>
									</div>
                                    
									<div class="form-group row mb-4">
										<label class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Jumlah <span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-10 col-lg-9 col-sm-10">
											<input type="text" class="form-control" name="jumlah" value="{{ old('jumlah') }}" onkeyup="formatRupiah(this, '.')">
											@if ($errors->has('jumlah')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('jumlah') }}</div>@endif
										</div>
									</div>
									
									<div class="form-group row mb-4">
										<label class="col-xl-2 col-sm-3 col-sm-2 col-form-label">{{ __('Catatan') }}</label>
										<div class="col-xl-10 col-lg-9 col-sm-10">
											<input type="text" class="form-control" name="catatan" value="{{ old('catatan') }}">
											@if ($errors->has('catatan')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('catatan') }}</div>@endif
										</div>
									</div>
									
									<button type="submit" class="btn btn-success">Simpan</button>
									<button type="reset" class="btn btn-warning">Reset</button>
									<a href="{{ url('/'.Request::segment(1)) }}" class="btn btn-danger">Kembali</a>
								</form>	
                            </div>
                        </div>
                    </div>
                </div>

            </div>
		
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
<script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
<script>
  var konten = document.getElementById("konten");
    CKEDITOR.replace(konten,{
    language:'en-gb'
  });
  CKEDITOR.config.allowedContent = true;
</script>
@endsection