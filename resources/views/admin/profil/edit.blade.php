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
							<form action="{{ url('/profil/edit/'.$profil->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
	
								<div class="form-group row mb-4">
									<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Nama Toko</label>
									<div class="col-xl-9 col-lg-9 col-sm-10">
										<input type="text" class="form-control" name="nama_toko" value="{{ $profil->nama_toko }}">
										@if ($errors->has('nama_toko')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('nama_toko') }}</div>@endif
									</div>
								</div>
								
								<div class="form-group row mb-4">
									<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Alamat</label>
									<div class="col-xl-9 col-lg-9 col-sm-10">
										<input type="text" class="form-control" name="alamat" value="{{ $profil->alamat }}">
										@if ($errors->has('alamat')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('alamat') }}</div>@endif
									</div>
								</div>
								
								<div class="form-group row mb-4">
									<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Email</label>
									<div class="col-xl-9 col-lg-9 col-sm-10">
										<input type="text" class="form-control" name="email" value="{{ $profil->email }}">
										@if ($errors->has('email')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('email') }}</div>@endif
									</div>
								</div>
								
								<div class="form-group row mb-4">
									<label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Telepon</label>
									<div class="col-xl-9 col-lg-9 col-sm-10">
										<input type="text" class="form-control" name="telp" value="{{ $profil->telp }}">
										@if ($errors->has('telp')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('telp') }}</div>@endif
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