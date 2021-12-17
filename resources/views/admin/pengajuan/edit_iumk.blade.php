@extends('admin/pengajuan/edit')
@section('edit_iumk')

<input type="hidden" class="form-control" name="nama_layanan" value="{{ $pengajuan->nama_layanan }}" >
<input type="hidden" class="form-control" name="layanan_id" value="{{ $pengajuan->layanan_id }}" >

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Catatan Perbaikan') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="text" style="background-color: #ffffff !important;color: #4d4d4e;" class="form-control" value="{{ $pengajuan->catatan_perbaikan }}" disabled>
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KTP') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KTP" name="ktp" value="{{ old('ktp') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->ktp)
        <br><a href="{{ asset('upload/iumk/ktp/'.$pengajuan->ktp)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a>
        @endif
        @if ($errors->has('ktp')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('ktp') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Kartu Keluarga') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Kartu Keluarga" name="kartu_keluarga" value="{{ old('kartu_keluarga') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->kartu_keluarga)
        <br><a href="{{ asset('upload/iumk/kartu_keluarga/'.$pengajuan->kartu_keluarga)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a>
        @endif
        @if ($errors->has('kartu_keluarga')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('kartu_keluarga') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Foto Warna 4 x 6') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Foto Warna 4 x 6" name="foto" value="{{ old('foto') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->foto)
        <br><a href="{{ asset('upload/iumk/foto/'.$pengajuan->foto)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a>
        @endif
        @if ($errors->has('foto')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('foto') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Surat Keterangan Tempat Usaha dari Kepala Desa') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Surat Keterangan Tempat Usaha dari Kepala Desa" name="surat_keterangan_dari_desa" value="{{ old('surat_keterangan_dari_desa') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->surat_keterangan_dari_desa)
        <br><a href="{{ asset('upload/iumk/surat_keterangan_dari_desa/'.$pengajuan->surat_keterangan_dari_desa)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a>
        @endif
        @if ($errors->has('surat_keterangan_dari_desa')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('surat_keterangan_dari_desa') }}</div>@endif
    </div>
</div>

@endsection