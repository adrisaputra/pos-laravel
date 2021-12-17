@extends('admin/pengajuan/edit')
@section('edit_akta_kematian')

<input type="hidden" class="form-control" name="nama_layanan" value="{{ $pengajuan->nama_layanan }}" >
<input type="hidden" class="form-control" name="layanan_id" value="{{$pengajuan->layanan_id }}" >

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Formulir Akta Kematian ') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Formulir Akta Kematian " name="formulir_akta_kematian" value="{{ old('formulir_akta_kematian') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->formulir_akta_kematian)
        <br><a href="{{ asset('upload/akta_kematian/formulir_akta_kematian/'.$pengajuan->formulir_akta_kematian)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('formulir_akta_kematian')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('formulir_akta_kematian') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KTP') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KTP" name="ktp" value="{{ old('ktp') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->ktp)
        <br><a href="{{ asset('upload/akta_kematian/ktp/'.$pengajuan->ktp)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
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
        <br><a href="{{ asset('upload/akta_kematian/kartu_keluarga/'.$pengajuan->kartu_keluarga)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('kartu_keluarga')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('kartu_keluarga') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Surat Keterangan Kematian dan penguburan dari Kepala Desa') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Surat Keterangan Kematian dan penguburan dari Kepala Desa" name="surat_keterangan_kematian" value="{{ old('surat_keterangan_kematian') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->surat_keterangan_kematian)
        <br><a href="{{ asset('upload/akta_kematian/surat_keterangan_kematian/'.$pengajuan->surat_keterangan_kematian)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('surat_keterangan_kematian')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('surat_keterangan_kematian') }}</div>@endif
    </div>
</div>

@endsection