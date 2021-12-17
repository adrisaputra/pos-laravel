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
							<form action="{{ url('/'.Request::segment(1).'/edit/'.$layanan->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
							{{ csrf_field() }}
							<input type="hidden" name="_method" value="PUT">
	
                            <div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Nama Layanan  <span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<input type="text" class="form-control" name="nama_layanan" value="{{ $layanan->nama_layanan }}">
											@if ($errors->has('nama_layanan')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('nama_layanan') }}</div>@endif
										</div>
									</div>
									
									<div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Keterangan  <span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<input type="text" class="form-control" name="keterangan" value="{{ $layanan->keterangan }}">
											@if ($errors->has('keterangan')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('keterangan') }}</div>@endif
										</div>
									</div>
									
									<div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Persyaratan  <span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<textarea class="form-control" id="konten" name="persyaratan">{{ $layanan->persyaratan }}</textarea>
											@if ($errors->has('persyaratan')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('persyaratan') }}</div>@endif
										</div>
									</div>
									
									<div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Gambar') }}  <span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<input type="file" class="form-control" placeholder="Gambar" name="gambar" value="{{ $layanan->gambar }}" >
											<span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png)</i></span>
                                            			@if($layanan->gambar)
											<br><img src="{{ asset('upload/layanan/'.$layanan->gambar) }}" width="200px" height="150px">
											@endif
											@if ($errors->has('gambar')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('gambar') }}</div>@endif
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