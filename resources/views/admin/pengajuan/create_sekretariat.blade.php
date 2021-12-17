@extends('admin/pengajuan/create')
@section('create_sekretariat')

<input type="hidden" class="form-control" name="nama_layanan" value="{{ $layanan->nama_layanan }}" >
<input type="hidden" class="form-control" name="layanan_id" value="{{ Request::segment(3) }}" >


<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Surat Pengantar dari RT') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Surat Pengantar dari RT" name="surat_pengantar_rt" value="{{ old('surat_pengantar_rt') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('surat_pengantar_rt')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('surat_pengantar_rt') }}</div>@endif
    </div>
</div>

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
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Akta pendirian/susunan kepengurusan yang telah di sahkan oleh pimpinan setingkat diatas di Parpol/LSM') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Akta pendirian/susunan kepengurusan yang telah di sahkan oleh pimpinan setingkat diatas di Parpol/LSM" name="akta_pendirian" value="{{ old('akta_pendirian') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('akta_pendirian')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('akta_pendirian') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Surat Keterangan Terdaftar') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Surat Keterangan Terdaftar" name="surat_keterangan_terdaftar" value="{{ old('surat_keterangan_terdaftar') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('surat_keterangan_terdaftar')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('surat_keterangan_terdaftar') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Bukti lunas PBB Tahun berjalan') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Bukti lunas PBB Tahun berjalan'" name="bukti_lunas_pbb" value="{{ old('bukti_lunas_pbb') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('bukti_lunas_pbb')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('bukti_lunas_pbb') }}</div>@endif
    </div>
</div>

@endsection