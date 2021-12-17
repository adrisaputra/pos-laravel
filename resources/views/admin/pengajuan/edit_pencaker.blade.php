@extends('admin/pengajuan/edit')
@section('edit_pencaker')

<input type="hidden" class="form-control" name="nama_layanan" value="{{ $pengajuan->nama_layanan }}" >
<input type="hidden" class="form-control" name="layanan_id" value="{{$pengajuan->layanan_id }}" >

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Catatan Perbaikan') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="text" style="background-color: #ffffff !important;color: #4d4d4e;" class="form-control" value="{{ $pengajuan->catatan_perbaikan }}" disabled>
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Ijazah Terakhir') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Ijazah Terakhir" name="ijazah_terakhir" value="{{ old('ijazah_terakhir') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->ijazah_terakhir)
        <br><a href="{{ asset('upload/pencaker/ijazah_terakhir/'.$pengajuan->ijazah_terakhir)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('ijazah_terakhir')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('ijazah_terakhir') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Transkrip Nilai') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Transkrip Nilai" name="transkrip_nilai" value="{{ old('transkrip_nilai') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->transkrip_nilai)
        <br><a href="{{ asset('upload/pencaker/transkrip_nilai/'.$pengajuan->transkrip_nilai)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('transkrip_nilai')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('transkrip_nilai') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Foto Warna 4 x 6') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Foto Warna 4 x 6" name="foto" value="{{ old('foto') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->foto)
        <br><a href="{{ asset('upload/pencaker/foto/'.$pengajuan->foto)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('foto')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('foto') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Sertifikat Keahlian') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Sertifikat Keahlian" name="sertifikat" value="{{ old('sertifikat') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->sertifikat)
        <br><a href="{{ asset('upload/pencaker/sertifikat/'.$pengajuan->sertifikat)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('sertifikat')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('sertifikat') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KTP') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KTP" name="ktp" value="{{ old('ktp') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->ktp)
        <br><a href="{{ asset('upload/pencaker/ktp/'.$pengajuan->ktp)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('ktp')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('ktp') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Berat Badan (Kg)') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="text" class="form-control" placeholder="Berat Badan" name="berat_badan" value="{{ $pengajuan->berat_badan }}" >
        @if ($errors->has('berat_badan')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('berat_badan') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Tinggi Badan (Cm)') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="text" class="form-control" placeholder="Tinggi Badan" name="tinggi_badan" value="{{ $pengajuan->tinggi_badan }}" >
        @if ($errors->has('tinggi_badan')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('tinggi_badan') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Tujuan Perusahaan') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="text" class="form-control" placeholder="Tujuan Perusahaan" name="tujuan_perusahaan" value="{{ $pengajuan->tujuan_perusahaan }}" >
        @if ($errors->has('tujuan_perusahaan')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('tujuan_perusahaan') }}</div>@endif
    </div>
</div>

@endsection