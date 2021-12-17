@extends('admin/pengajuan/create')
@section('create_bpjs_bpu')

<input type="hidden" class="form-control" name="nama_layanan" value="{{ $layanan->nama_layanan }}" >
<input type="hidden" class="form-control" name="layanan_id" value="{{ Request::segment(3) }}" >

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Kategori') }}<span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <select class="form-control" name="kategori" onchange=" if (this.selectedIndex==1){ 
														document.getElementById('1').style.display = 'inline'; 
														document.getElementById('2').style.display = 'none'; 
													} else if (this.selectedIndex==2){
														document.getElementById('1').style.display = 'none'; 
														document.getElementById('2').style.display = 'inline';
													};">
			<option value="">- Pilih -</option>
            <option value="1" @if(old('kategori')=="1") selected @endif>Permohonan Kartu BPJS (BPU)</option>
            <option value="2" @if(old('kategori')=="2") selected @endif>Klaim JHT</option>
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
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KTP/Paspor Peserta') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KTP/Paspor Peserta" name="ktp" value="{{ old('ktp') }}" >
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
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Kartu BPJS') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Kartu BPJS" name="kartu_bpjs" value="{{ old('kartu_bpjs') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('kartu_bpjs')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('kartu_bpjs') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KTP/Paspor Peserta') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KTP/Paspor Peserta" name="ktp2" value="{{ old('ktp2') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('ktp2')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('ktp2') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Kartu Keluarga') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Kartu Keluarga" name="kartu_keluarga" value="{{ old('kartu_keluarga') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('kartu_keluarga')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('kartu_keluarga') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Surat Keterangan Aktif Bekerja') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Surat Keterangan Aktif Bekerja" name="suket_bekerja" value="{{ old('suket_bekerja') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('suket_bekerja')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('suket_bekerja') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Surat Keterangan Berhenti Bekerja Dari Perusahaan') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Surat Keterangan Berhenti Bekerja Dari Perusahaan" name="suket_berhenti_bekerja" value="{{ old('suket_berhenti_bekerja') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('suket_berhenti_bekerja')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('suket_berhenti_bekerja') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Surat Keterangan Pengunduran Diri') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Surat Keterangan Pengunduran Diri" name="suket_pengunduran_diri" value="{{ old('suket_pengunduran_diri') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('suket_pengunduran_diri')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('suket_pengunduran_diri') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Penetapan PHK dari PHI') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Penetapan PHK dari PHI" name="penetapan_phk" value="{{ old('penetapan_phk') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('penetapan_phk')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('penetapan_phk') }}</div>@endif
    </div>
</div>

</span>

@endsection