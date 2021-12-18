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
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Barcode  <span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<input type="text" class="form-control" name="barcode" value="{{ old('barcode') }}">
											@if ($errors->has('barcode')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('barcode') }}</div>@endif
										</div>
									</div>
									
									<div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Nama Barang  <span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<input type="text" class="form-control" name="nama_barang" value="{{ old('nama_barang') }}">
											@if ($errors->has('nama_barang')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('nama_barang') }}</div>@endif
										</div>
									</div>
									
									<div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Kategori') }}</label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<select class="form-control basic" name="kategori_id">
												<option value="">- Pilih Kategori-</option>
                                                @foreach($kategori as $v)
												<option value="{{ $v->id }}" @if(old('kategori_id')== $v->id) selected @endif>{{ $v->nama_kategori }}</option>
                                                @endforeach
											</select>
											@if ($errors->has('kategori_id')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('kategori_id') }}</div>@endif
										</div>
									</div>
									
									<div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Satuan') }}<span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<select class="form-control basic" name="satuan_id">
												<option value="">- Pilih Satuan-</option>
                                                @foreach($satuan as $v)
												<option value="{{ $v->id }}" @if(old('satuan_id')== $v->id) selected @endif>{{ $v->nama_satuan }}</option>
                                                @endforeach
											</select>
											@if ($errors->has('satuan_id')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('satuan_id') }}</div>@endif
										</div>
									</div>
									
									<div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Diskon (%)</label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<input type="text" class="form-control" name="diskon" value="{{ old('diskon') }}">
											@if ($errors->has('diskon')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('diskon') }}</div>@endif
										</div>
									</div>
									
									<div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Stok Awal  <span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<input type="text" class="form-control" name="stok_awal" value="{{ old('stok_awal') }}" onkeyup="formatRupiah(this, '.')">
											@if ($errors->has('stok_awal')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('stok_awal') }}</div>@endif
										</div>
									</div>
                                    
									<div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Harga Beli (Rp)  <span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<input type="text" class="form-control" name="harga_beli" value="{{ old('harga_beli') }}" onkeyup="formatRupiah(this, '.')">
											@if ($errors->has('harga_beli')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('harga_beli') }}</div>@endif
										</div>
									</div>
									
									<div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Harga Jual (Rp)  <span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<input type="text" class="form-control" name="harga_jual" value="{{ old('harga_jual') }}" onkeyup="formatRupiah(this, '.')">
											@if ($errors->has('harga_jual')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('harga_jual') }}</div>@endif
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
<script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
<script>
  var konten = document.getElementById("konten");
    CKEDITOR.replace(konten,{
    language:'en-gb'
  });
  CKEDITOR.config.allowedContent = true;
</script>
@endsection