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
							<form action="{{ url('/pengaturan/edit/'.$pengaturan->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
	
								@if ($message = Session::get('status'))
									<div class="alert alert-info mb-4" role="alert"> 
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
										</button> <h4 style="color: #ffffff;"><i class="icon fa fa-check"></i> Berhasil !</h4>
										{{ $message }}
									</div>          
								@endif

					   			<div class="form-group row mb-4">
									<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Nama Aplikasi') }}  <span class="required" style="color: #dd4b39;">*</span></label>
									<div class="col-xl-9 col-lg-9 col-sm-10">
										<input type="nama_aplikasi" class="form-control" name="nama_aplikasi" value="{{ $pengaturan->nama_aplikasi }}">
										@if ($errors->has('nama_aplikasi')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('nama_aplikasi') }}</div>@endif
									</div>
								</div>
									
					   			<div class="form-group row mb-4">
									<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Singkatan Nama Aplikasi') }}  <span class="required" style="color: #dd4b39;">*</span></label>
									<div class="col-xl-9 col-lg-9 col-sm-10">
										<input type="singkatan_nama_aplikasi" class="form-control" name="singkatan_nama_aplikasi" value="{{ $pengaturan->singkatan_nama_aplikasi }}">
										@if ($errors->has('singkatan_nama_aplikasi')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('singkatan_nama_aplikasi') }}</div>@endif
									</div>
								</div>
									
								<div class="form-group row mb-4">
									<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Logo Kecil</label>
									<div class="col-xl-9 col-lg-9 col-sm-10">
										<input type="file" class="form-control" name="logo_kecil" value="{{ $pengaturan->logo_kecil }}">
										<span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png)</i></span>
										@if($pengaturan->logo_kecil)
											<br><img src="{{ asset('upload/pengaturan/'.$pengaturan->logo_kecil) }}" width="50px" height="50px">
										@endif
										@if ($errors->has('logo_kecil')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('logo_kecil') }}</div>@endif
									</div>
								</div>
								
								<div class="form-group row mb-4">
									<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Logo Besar</label>
									<div class="col-xl-9 col-lg-9 col-sm-10">
										<input type="file" class="form-control" name="logo_besar" value="{{ $pengaturan->logo_besar }}">
										<span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png)</i></span>
										@if($pengaturan->logo_besar)
											<br><img src="{{ asset('upload/pengaturan/'.$pengaturan->logo_besar) }}" width="200px" height="50px">
										@endif
										@if ($errors->has('logo_besar')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('logo_besar') }}</div>@endif
									</div>
								</div>
								
								<div class="form-group row mb-4">
									<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Background Login</label>
									<div class="col-xl-9 col-lg-9 col-sm-10">
										<input type="file" class="form-control" name="background_login" value="{{ $pengaturan->background_login }}">
										<span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png)</i></span>
										@if($pengaturan->background_login)
											<br><img src="{{ asset('upload/pengaturan/'.$pengaturan->background_login) }}" width="200px" height="150px">
										@endif
										@if ($errors->has('background_login')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('background_login') }}</div>@endif
									</div>
								</div>
								
								<div class="form-group row mb-4">
									<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Background Sidebar</label>
									<div class="col-xl-9 col-lg-9 col-sm-10">
										<input type="file" class="form-control" name="background_sidebar" value="{{ $pengaturan->background_sidebar }}">
										<span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png)</i></span>
										@if($pengaturan->background_sidebar)
											<br><img src="{{ asset('upload/pengaturan/'.$pengaturan->background_sidebar) }}" width="150px" height="150px">
										@endif
										@if ($errors->has('background_sidebar')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('background_sidebar') }}</div>@endif
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

@endsection