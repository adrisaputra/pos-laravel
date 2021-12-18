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
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Nama Supplier  <span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<input type="text" class="form-control" name="nama_supplier" value="{{ old('nama_supplier') }}">
											@if ($errors->has('nama_supplier')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('nama_supplier') }}</div>@endif
										</div>
									</div>
									
									<div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Telepon</label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<input type="text" class="form-control" name="telepon" value="{{ old('telepon') }}">
											@if ($errors->has('telepon')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('telepon') }}</div>@endif
										</div>
									</div>
									<div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Alamat</label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}">
											@if ($errors->has('alamat')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('alamat') }}</div>@endif
										</div>
									</div>
									
									<div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Deskripsi</label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<textarea class="form-control" name="deskripsi">{{ old('deskripsi') }}</textarea>
											@if ($errors->has('deskripsi')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('deskripsi') }}</div>@endif
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