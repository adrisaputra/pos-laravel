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
                                <form action="{{ url('/'.Request::segment(1).'/edit/'.$pengaju->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PUT">
									
									<div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('NIK') }}  <span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<input type="text" class="form-control" placeholder="Nama User" value="{{ $pengaju->name }}" disabled>
											<input type="hidden" class="form-control" placeholder="Nama User" name="name" value="{{ $pengaju->name }}" >
                                       				 <input type="hidden" class="form-control" placeholder="Nama User" name="name2" value="{{ $pengaju->name }}" >
											@if ($errors->has('name')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('name') }}</div>@endif
										</div>
									</div>
									
									<div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Nama lengkap') }}  <span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<input type="nama_lengkap" class="form-control" name="nama_lengkap" value="{{ $pengaju->nama_lengkap }}">
											@if ($errors->has('nama_lengkap')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('nama_lengkap') }}</div>@endif
										</div>
									</div>
									
									<div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Email') }}  <span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<input type="email" class="form-control" name="email" value="{{ $pengaju->email }}">
											@if ($errors->has('email')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('email') }}</div>@endif
										</div>
									</div>
									
									<div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('No. HP') }}  <span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<input type="text" class="form-control" name="no_hp" value="{{ $pengaju->no_hp }}">
											@if ($errors->has('no_hp')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('no_hp') }}</div>@endif
										</div>
									</div>
									
									<div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Alamat') }}  <span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<input type="text" class="form-control" name="alamat" value="{{ $pengaju->alamat }}">
											@if ($errors->has('alamat')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('alamat') }}</div>@endif
										</div>
									</div>
									
									<div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Password') }}  <span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<input type="password" class="form-control" name="password">
											@if ($errors->has('password')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('password') }}</div>@endif
										</div>
									</div>
									
									<div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Konfirmasi Password') }}  <span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<input type="password" class="form-control" name="password_confirmation">
											@if ($errors->has('password_confirmation')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('password_confirmation') }}</div>@endif
										</div>
									</div>
									
									<div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Status') }}<span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<select class="form-control" name="status">
												<option value="0" @if($pengaju->status=="0") selected @endif>Tidak Aktif</option>
												<option value="1" @if($pengaju->status=="1") selected @endif>Aktif</option>
											</select>
											@if ($errors->has('status')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('status') }}</div>@endif
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