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
                                <form action="{{ url('/'.Request::segment(1).'/edit/'.$user->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PUT">
									
									<div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Nama Pengguna') }}  <span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
                                        @if($user->group=="3")
                                            <input type="text" class="form-control" placeholder="Nama User" value="{{ $user->name }}" disabled>
                                            <input type="hidden" class="form-control" placeholder="Nama User" name="name" value="{{ $user->name }}" >
                                        @else
                                            <input type="text" class="form-control" placeholder="Nama User" name="name" value="{{ $user->name }}" >
                                        @endif
                                        <input type="hidden" class="form-control" placeholder="Nama User" name="name2" value="{{ $user->name }}" >
											@if ($errors->has('name')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('name') }}</div>@endif
										</div>
									</div>
									
									<div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Email') }}  <span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<input type="email" class="form-control" name="email" value="{{ $user->email }}">
											@if ($errors->has('email')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('email') }}</div>@endif
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
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Group') }}<span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<select class="form-control" name="group">
												<option value="1" @if($user->group=="1") selected @endif>Administrator</option>
												<option value="2" @if($user->group=="2") selected @endif>Kecamatan</option>
												<option value="3" @if($user->group=="3") selected @endif>Kelurahan Sikeli</option>
												<option value="4" @if($user->group=="4") selected @endif>Desa Baliara</option>
												<option value="5" @if($user->group=="5") selected @endif>Desa Baliara Selatan</option>
												<option value="6" @if($user->group=="6") selected @endif>Desa Baliara Kepulauan</option>
												<option value="7" @if($user->group=="7") selected @endif>Desa Rahantari</option>
												<option value="8" @if($user->group=="8") selected @endif>DISDUKCAPIL</option>
												<option value="9" @if($user->group=="9") selected @endif>DISTRANSNAKER</option>
												<option value="10" @if($user->group=="10") selected @endif>PMPTSP</option>
												<option value="11" @if($user->group=="11") selected @endif>DINSOS</option>
												<option value="12" @if($user->group=="12") selected @endif>BPJS Ketenagakerjaan</option>
												<option value="13" @if($user->group=="13") selected @endif>BPJS Kesehatan</option>
											</select>
											@if ($errors->has('group')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('group') }}</div>@endif
										</div>
									</div>
									
									<div class="form-group row mb-4">
										<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Status') }}<span class="required" style="color: #dd4b39;">*</span></label>
										<div class="col-xl-9 col-lg-9 col-sm-10">
											<select class="form-control" name="status">
												<option value="0" @if($user->status=="0") selected @endif>Tidak Aktif</option>
												<option value="1" @if($user->status=="1") selected @endif>Aktif</option>
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