@extends('admin/pengajuan/edit')
@section('edit_domisili')

<input type="hidden" class="form-control" name="nama_layanan" value="{{ $pengajuan->nama_layanan }}" >
<input type="hidden" class="form-control" name="layanan_id" value="{{$pengajuan->layanan_id }}" >

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
        <br><a href="{{ asset('upload/domisili/ktp/'.$pengajuan->ktp)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
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
        <br><a href="{{ asset('upload/domisili/kartu_keluarga/'.$pengajuan->kartu_keluarga)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('kartu_keluarga')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('kartu_keluarga') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Surat Pengantar dari RT') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Surat Pengantar dari RT" name="surat_pengantar_rt" value="{{ old('surat_pengantar_rt') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->surat_pengantar_rt)
        <br><a href="{{ asset('upload/domisili/surat_pengantar_rt/'.$pengajuan->surat_pengantar_rt)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('surat_pengantar_rt')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('surat_pengantar_rt') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Surat permohonan yang menunjukkan keabsahan dokumen dan data (ditandatangani di atas materai Rp10.000).') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Surat permohonan yang menunjukkan keabsahan dokumen dan data (ditandatangani di atas materai Rp10.000)." name="surat_permohonan" value="{{ old('surat_permohonan') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->surat_permohonan)
        <br><a href="{{ asset('upload/domisili/surat_permohonan/'.$pengajuan->surat_permohonan)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('surat_permohonan')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('surat_permohonan') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Surat kuasa jika pengurusan Surat Domisili diwakilkan dengan materai Rp10.000.') }}</label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Surat kuasa jika pengurusan Surat Domisili diwakilkan dengan materai Rp10.000." name="surat_kuasa" value="{{ old('surat_keterangsurat_kuasaan_terdaftar') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->surat_kuasa)
        <br><a href="{{ asset('upload/domisili/surat_kuasa/'.$pengajuan->surat_kuasa)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('surat_kuasa')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('surat_kuasa') }}</div>@endif
    </div>
</div>

@endsection