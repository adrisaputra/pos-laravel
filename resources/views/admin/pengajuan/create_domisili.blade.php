@extends('admin/pengajuan/create')
@section('create_domisili')

<input type="hidden" class="form-control" name="nama_layanan" value="{{ $layanan->nama_layanan }}" >
<input type="hidden" class="form-control" name="layanan_id" value="{{ Request::segment(3) }}" >

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KTP') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KTP" name="ktp" value="{{ old('ktp') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('ktp')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('ktp') }}</div>@endif
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
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Surat Pengantar dari RT') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Surat Pengantar dari RT" name="surat_pengantar_rt" value="{{ old('surat_pengantar_rt') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('surat_pengantar_rt')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('surat_pengantar_rt') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Surat permohonan yang menunjukkan keabsahan dokumen dan data (ditandatangani di atas materai Rp10.000).') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Surat permohonan yang menunjukkan keabsahan dokumen dan data (ditandatangani di atas materai Rp10.000)." name="surat_permohonan" value="{{ old('surat_permohonan') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('surat_permohonan')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('surat_permohonan') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Surat kuasa jika pengurusan Surat Domisili diwakilkan dengan materai Rp10.000.') }}</label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Surat kuasa jika pengurusan Surat Domisili diwakilkan dengan materai Rp10.000." name="surat_kuasa" value="{{ old('surat_keterangsurat_kuasaan_terdaftar') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('surat_kuasa')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('surat_kuasa') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Kelurahan/Desa') }}<span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <select class="form-control" name="eksekutor">
            <option value="">- Pilih Kelurahan/Desa -</option>
            <option value="3" @if(old('group')=="3") selected @endif>Kelurahan Sikeli</option>
            <option value="4" @if(old('group')=="4") selected @endif>Desa Baliara</option>
            <option value="5" @if(old('group')=="5") selected @endif>Desa Baliara Selatan</option>
            <option value="6" @if(old('group')=="6") selected @endif>Desa Baliara Kepulauan</option>
            <option value="7" @if(old('group')=="7") selected @endif>Desa Rahantari</option>
        </select>
        @if ($errors->has('eksekutor')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('eksekutor') }}</div>@endif
    </div>
</div>
									
@endsection