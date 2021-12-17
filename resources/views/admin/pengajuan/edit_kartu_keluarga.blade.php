@extends('admin/pengajuan/edit')
@section('edit_kartu_keluarga')

<input type="hidden" class="form-control" name="nama_layanan" value="{{ $pengajuan->nama_layanan }}" >
<input type="hidden" class="form-control" name="layanan_id" value="{{$pengajuan->layanan_id }}" >
<input type="hidden" class="form-control" name="kategori" value="{{$pengajuan->kategori }}" >

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Catatan Perbaikan') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="text" style="background-color: #ffffff !important;color: #4d4d4e;" class="form-control" value="{{ $pengajuan->catatan_perbaikan }}" disabled>
    </div>
</div>
			
@if($pengajuan->kategori==1)

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Formulir Permohonan') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Formulir Permohonan" name="surat_permohonan" value="{{ old('surat_permohonan') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->surat_permohonan)
        <br><a href="{{ asset('upload/kk_baru/surat_permohonan/'.$pengajuan->surat_permohonan)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('surat_permohonan')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('surat_permohonan') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Suket dan Pernyataan Domisili Kades/Lurah, Camat disertai saksi2') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Suket dan Pernyataan Domisili Kades/Lurah, Camat disertai saksi2" name="pernyataan_domisili" value="{{ old('pernyataan_domisili') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->pernyataan_domisili)
        <br><a href="{{ asset('upload/kk_baru/pernyataan_domisili/'.$pengajuan->pernyataan_domisili)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('pernyataan_domisili')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('pernyataan_domisili') }}</div>@endif
    </div>
</div>

@elseif($pengajuan->kategori==2)

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Surat Keterangan Hilang dari Kepala Desa atau Lurah atau Kepolisian') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Surat Keterangan Hilang dari Kepala Desa atau Lurah atau Kepolisian" name="surat_keterangan_hilang" value="{{ old('surat_keterangan_hilang') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->surat_keterangan_hilang)
        <br><a href="{{ asset('upload/kk_hilang/surat_keterangan_hilang/'.$pengajuan->surat_keterangan_hilang)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('surat_keterangan_hilang')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('surat_keterangan_hilang') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KTP') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KTP" name="ktp" value="{{ old('ktp') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->ktp)
        <br><a href="{{ asset('upload/kk_hilang/ktp/'.$pengajuan->ktp)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('ktp')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('ktp') }}</div>@endif
    </div>
</div>

@elseif($pengajuan->kategori==3)

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KK Lama (suami istri)') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KK Lama (suami istri)" name="kartu_keluarga_lama" value="{{ old('kartu_keluarga_lama') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->kartu_keluarga_lama)
        <br><a href="{{ asset('upload/kk_perkawinan/kartu_keluarga_lama/'.$pengajuan->kartu_keluarga_lama)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('kartu_keluarga_lama')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('kartu_keluarga_lama') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Formulir KK (F.1-01)') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Formulir KK (F.1-01)" name="formulir_kk" value="{{ old('formulir_kk') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->formulir_kk)
        <br><a href="{{ asset('upload/kk_perkawinan/formulir_kk/'.$pengajuan->formulir_kk)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('formulir_kk')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('formulir_kk') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KTP Suami dan Istri') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KTP Suami dan Istri" name="ktp" value="{{ old('ktp') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->ktp)
        <br><a href="{{ asset('upload/kk_perkawinan/ktp/'.$pengajuan->ktp)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('ktp')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('ktp') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Surat Nikah/Akta Nikah') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Surat Nikah/Akta Nikah" name="surat_nikah" value="{{ old('surat_nikah') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->surat_nikah)
        <br><a href="{{ asset('upload/kk_perkawinan/surat_nikah/'.$pengajuan->surat_nikah)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('surat_nikah')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('surat_nikah') }}</div>@endif
    </div>
</div>

@elseif($pengajuan->kategori==4)

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KK Lama') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KK Lama" name="kartu_keluarga_lama" value="{{ old('kartu_keluarga_lama') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->kartu_keluarga_lama)
        <br><a href="{{ asset('upload/kk_perubahan_data/kartu_keluarga_lama/'.$pengajuan->kartu_keluarga_lama)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('kartu_keluarga_lama')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('kartu_keluarga_lama') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KTP/Keterangan lahir dari bidan/kades/lurah') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KTP/Keterangan lahir dari bidan/kades/lurah" name="ktp" value="{{ old('ktp') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->ktp)
        <br><a href="{{ asset('upload/kk_perubahan_data/ktp/'.$pengajuan->ktp)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('ktp')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('ktp') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Surat keterangan kematian dari desa/lurah bagi anggota keluarga yang meninggal') }}</label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Surat keterangan kematian dari desa/lurah bagi anggota keluarga yang meninggal" name="akta_kematian" value="{{ old('akta_kematian') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->akta_kematian)
        <br><a href="{{ asset('upload/kk_perubahan_data/akta_kematian/'.$pengajuan->akta_kematian)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('akta_kematian')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('akta_kematian') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Keterangan dari desa/lurah anak keberapa bagi anggota keluarga yang keluar/masuk') }}</label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Keterangan dari desa/lurah anak keberapa bagi anggota keluarga yang keluar/masuk" name="surat_keterangan_dari_desa" value="{{ old('surat_keterangan_dari_desa') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->surat_keterangan_dari_desa)
        <br><a href="{{ asset('upload/kk_perubahan_data/surat_keterangan_dari_desa/'.$pengajuan->surat_keterangan_dari_desa)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('surat_keterangan_dari_desa')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('surat_keterangan_dari_desa') }}</div>@endif
    </div>
</div>

@elseif($pengajuan->kategori==5)

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KK Lama (Pindah antar desa/Kelurahan dan antar kecamatan)') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KK Lama (Pindah antar desa/Kelurahan dan antar kecamatan)" name="kartu_keluarga_lama" value="{{ old('kartu_keluarga_lama3') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->kartu_keluarga_lama)
        <br><a href="{{ asset('upload/kk_pindah_datang/kartu_keluarga_lama/'.$pengajuan->kartu_keluarga_lama)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('kartu_keluarga_lama')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('kartu_keluarga_lama') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('SKP WNI') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="SKP WNI" name="skp_wni" value="{{ old('skp_wni') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->skp_wni)
        <br><a href="{{ asset('upload/kk_pindah_datang/skp_wni/'.$pengajuan->skp_wni)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('skp_wni')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('skp_wni') }}</div>@endif
    </div>
</div>

@elseif($pengajuan->kategori==6)

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KK yang rusak') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KK yang rusak" name="kartu_keluarga_lama" value="{{ old('kartu_keluarga_lama') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->kartu_keluarga_lama)
        <br><a href="{{ asset('upload/kk_rusak/kartu_keluarga_lama/'.$pengajuan->kartu_keluarga_lama)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('kartu_keluarga_lama')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('kartu_keluarga_lama') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KTP') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KTP" name="ktp" value="{{ old('ktp') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if($pengajuan->ktp)
        <br><a href="{{ asset('upload/kk_rusak/ktp/'.$pengajuan->ktp)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Lihat File</a>
        @endif
        @if ($errors->has('ktp')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('ktp') }}</div>@endif
    </div>
</div>

@endif

@endsection