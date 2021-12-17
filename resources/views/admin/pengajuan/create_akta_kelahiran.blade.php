@extends('admin/pengajuan/create')
@section('create_akta_kelahiran')

<input type="hidden" class="form-control" name="nama_layanan" value="{{ $layanan->nama_layanan }}" >
<input type="hidden" class="form-control" name="layanan_id" value="{{ Request::segment(3) }}" >

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Kategori') }}<span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <select class="form-control" name="kategori" onchange=" if (this.selectedIndex==1){ 
														document.getElementById('1').style.display = 'inline'; 
														document.getElementById('2').style.display = 'none'; 
														document.getElementById('3').style.display = 'none'; 
														document.getElementById('4').style.display = 'none'; 
													} else if (this.selectedIndex==2){
														document.getElementById('1').style.display = 'none'; 
														document.getElementById('2').style.display = 'inline';
														document.getElementById('3').style.display = 'none';
														document.getElementById('4').style.display = 'none'; 
													}else if (this.selectedIndex==3){
														document.getElementById('1').style.display = 'none'; 
														document.getElementById('2').style.display = 'none';
														document.getElementById('3').style.display = 'inline';
														document.getElementById('4').style.display = 'none'; 
													}else if (this.selectedIndex==4){
														document.getElementById('1').style.display = 'none'; 
														document.getElementById('2').style.display = 'none';
														document.getElementById('3').style.display = 'none';
														document.getElementById('4').style.display = 'inline'; 
													};">
			<option value="">- Pilih -</option>
            <option value="1" @if(old('kategori')=="1") selected @endif>Akta Kelahiran (Anak Ibu)</option>
            <option value="2" @if(old('kategori')=="2") selected @endif>Akta Kelahiran (Pengangkatan Anak)</option>
            <option value="3" @if(old('kategori')=="3") selected @endif>Akta Kelahiran (Tidak Tercatat)</option>
            <option value="4" @if(old('kategori')=="4") selected @endif>Akta Kelahiran (Tercatat)</option>
        </select>
        @if ($errors->has('kategori')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('kategori') }}</div>@endif
    </div>
</div>
			
@if(old('kategori')=="1")
    <span id='1' style='display:display;'>
@else
    <span id='1' style='display:none;'>
@endif

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Formulir Akta Kelahiran') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Formulir Akta Kelahiran" name="formulir_akta_kelahiran" value="{{ old('formulir_akta_kelahiran') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('formulir_akta_kelahiran')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('formulir_akta_kelahiran') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Suket Lahir dari Dokter/Bidan Penolong') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Suket Lahir dari Dokter/Bidan Penolong" name="suket_lahir" value="{{ old('suket_lahir') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('suket_lahir')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('suket_lahir') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Kartu keluarga') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Kartu keluarga" name="kartu_keluarga" value="{{ old('kartu_keluarga') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('kartu_keluarga')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('kartu_keluarga') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KTP (Suami Istri)') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KTP (Suami Istri)" name="ktp" value="{{ old('ktp') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('ktp')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('ktp') }}</div>@endif
    </div>
</div>

</span>
	
@if(old('kategori')=="2")
    <span id='2' style='display:display;'>
@else
    <span id='2' style='display:none;'>
@endif

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Formulir Pengangkatan Anak') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Formulir Pengangkatan Anak" name="formulir_pengangkatan_anak" value="{{ old('formulir_pengangkatan_anak') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('formulir_pengangkatan_anak')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('formulir_pengangkatan_anak') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Akta Kelahiran Anak') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Akta Kelahiran Anak" name="akta_kelahiran" value="{{ old('akta_kelahiran') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('akta_kelahiran')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('akta_kelahiran') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Kartu keluarga') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Kartu keluarga" name="kartu_keluarga2" value="{{ old('kartu_keluarga2') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('kartu_keluarga2')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('kartu_keluarga2') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KTP Orang Tua Angkat') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KTP Orang Tua Angkat" name="ktp2" value="{{ old('ktp2') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('ktp2')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('ktp2') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Persetujuan Pengadilan') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Persetujuan Pengadilan" name="persetujuan_pengadilan" value="{{ old('persetujuan_pengadilan') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('persetujuan_pengadilan')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('persetujuan_pengadilan') }}</div>@endif
    </div>
</div>

</span>
			
@if(old('kategori')=="3")
    <span id='3' style='display:display;'>
@else
    <span id='3' style='display:none;'>
@endif

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Formulir Akta Kelahiran') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Formulir Akta Kelahiran" name="formulir_akta_kelahiran2" value="{{ old('formulir_akta_kelahiran2') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('formulir_akta_kelahiran2')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('formulir_akta_kelahiran2') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Suket Lahir dari Dokter/Bidan Penolong') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Suket Lahir dari Dokter/Bidan Penolong" name="suket_lahir2" value="{{ old('suket_lahir2') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('suket_lahir2')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('suket_lahir2') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Kartu keluarga') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Kartu keluarga" name="kartu_keluarga3" value="{{ old('kartu_keluarga3') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('kartu_keluarga3')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('kartu_keluarga3') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KTP (Suami istri)') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KTP (Suami istri)" name="ktp3" value="{{ old('ktp3') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('ktp3')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('ktp3') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('SPTJM Suami Istri') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="SPTJM Suami Istri" name="sptjm" value="{{ old('sptjm') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('sptjm')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('sptjm') }}</div>@endif
    </div>
</div>

</span>

@if(old('kategori')=="4")
    <span id='4' style='display:display;'>
@else
    <span id='4' style='display:none;'>
@endif

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Formulir Akta Kelahiran') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Formulir Akta Kelahiran" name="formulir_akta_kelahiran3" value="{{ old('formulir_akta_kelahiran3') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('formulir_akta_kelahiran3')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('formulir_akta_kelahiran3') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Suket Lahir dari Dokter/Bidan Penolong') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Suket Lahir dari Dokter/Bidan Penolong" name="suket_lahir3" value="{{ old('suket_lahir3') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('suket_lahir3')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('suket_lahir3') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Kartu keluarga') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Kartu keluarga" name="kartu_keluarga4" value="{{ old('kartu_keluarga4') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('kartu_keluarga4')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('kartu_keluarga4') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KTP (Suami istri)') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KTP (Suami istri)" name="ktp4" value="{{ old('ktp4') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('ktp4')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('ktp4') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Buku Nikah') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Buku Nikah" name="buku_nikah" value="{{ old('buku_nikah') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('buku_nikah')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('buku_nikah') }}</div>@endif
    </div>
</div>

</span>

@endsection